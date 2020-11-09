<?php

use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpFile;
use Nette\PhpGenerator\PsrPrinter;
use TON\TonContext;

require __DIR__ . '/vendor/autoload.php';

define('TON_SRC_DIR', 'src/TON');
define('TON_NS', 'TON');

function gen_log(string $message)
{
    echo "${message}\n";
}

function get_php_module_name(array $module): string
{
    return ucfirst($module['name']);
}

function get_php_module_dir(array $module): string
{
    return TON_SRC_DIR . '/' . get_php_module_name($module);
}

function get_module_impl_name(array $module): string
{
    return get_php_module_name($module) . 'Module';
}

function get_php_class_file(array $module, string $type_name): string
{
    return get_php_module_dir($module) . '/' . $type_name . '.php';
}

function get_php_class_name(array $type): string
{
    return $type['name'];
}

function get_php_namespace_name(array $module): string
{
    return TON_NS . '\\' . get_php_module_name($module);
}

function get_php_identifier_name(string $name): string
{
    return preg_replace_callback("|[\s_+]+(\w)|", function ($v) {
        return strtoupper($v[1]);
    }, $name);
}

function get_php_method_name(string $function_name): string
{
    return get_php_identifier_name($function_name);
}

function get_php_private_field_name(string $name): string
{
    return '_' . get_php_identifier_name($name);
}

function get_php_getter_name(string $name): string
{
    return 'get' . ucfirst(get_php_identifier_name($name));
}

function get_php_setter_name(string $name): string
{
    return 'set' . ucfirst(get_php_identifier_name($name));
}

function load_api_json(): array
{
    return json_decode(file_get_contents('./api.json'), true);
}

function parse_ref($ref_spec): array
{
    return explode('.', $ref_spec);
}

function is_unknown_type_name(string $type_name): bool
{
    return 'API' === $type_name || 'Value' === $type_name;
}

function is_php_nullable_type(array $type): bool
{
    return ('Optional' === $type['type']);
}

function get_php_type_name($type): string
{
    switch ($type['type']) {
        case 'String':
            return 'string';
        case 'Number':
            return $type['number_type'] === 'Float' ? 'float' : 'int';
        case 'Boolean':
            return 'bool';
        case 'Array':
            return 'array';
        case 'None':
            return 'void';
        case 'Optional':
            return get_php_type_name($type['optional_inner']);
        case 'Ref':
            if (!isset($type['ref_name'])) {
                gen_log("No ref_name for ${type['name']}");
            } else {
                $ref = parse_ref($type['ref_name']);
                if (empty($ref)) {
                    gen_log("No ref_name for ${type['name']}");
                    return '';
                }
                if (count($ref) == 1) {
                    return is_unknown_type_name($ref[0]) ? '' : $ref[0];
                }
                return $ref[1];
            }

    }
    return $type['type'];
}

function add_type_private_fields(array $type, ClassType $class)
{
    foreach ($type['struct_fields'] as $field) {
        $field_name = $field['name'];
        if (empty($field_name)) {
            continue;
        }
        $private_field_name = get_php_private_field_name($field_name);
        $property = $class->addProperty($private_field_name)
            ->setType(get_php_type_name($field))
            ->setPrivate();
        if (!empty($field['description'])) {
            $property->addComment($field['description']);
        }
    }
}

function add_type_getters(array $type, ClassType $class)
{
    foreach ($type['struct_fields'] as $field) {
        $field_name = $field['name'];
        if (empty($field_name)) {
            continue;
        }
        $getter_name = get_php_getter_name($field_name);
        $getter = $class->addMethod($getter_name)
            ->setReturnType(get_php_type_name($field))
            ->setReturnNullable(is_php_nullable_type($field));
        if (!empty($field['description'])) {
            $getter->addComment($field['description']);
        }
        $private_property_name = get_php_private_field_name($field_name);
        $getter->addBody("return \$this->${private_property_name};");
    }
}

function add_type_setters(array $type, ClassType $class)
{
    foreach ($type['struct_fields'] as $field) {
        $field_name = $field['name'];
        if (empty($field_name)) {
            continue;
        }
        $setter_name = get_php_setter_name($field_name);
        $setter = $class->addMethod($setter_name)
            ->setReturnType('self');
        $parameter_name = get_php_identifier_name($field_name);
        $setter->addParameter($parameter_name)
            ->setType(get_php_type_name($field))
            ->setNullable(is_php_nullable_type($field));
        if (!empty($field['description'])) {
            $setter->addComment($field['description']);
        }
        $private_property_name = get_php_private_field_name($field_name);
        $setter->addBody("\$this->${private_property_name} = \$${parameter_name};");
        $setter->addBody("return \$this;");
    }
}

function add_type_constructor(array $type, ClassType $class)
{
    $constructor = $class->addMethod('__construct');

    $constructor->addParameter('dto', null)
        ->setType('array')
        ->setNullable(true);

    $constructor->addBody('if (!$dto) return;');
    foreach ($type['struct_fields'] as $field) {
        $field_name = $field['name'];
        if (empty($field_name)) {
            continue;
        }
        $private_field_name = get_php_private_field_name($field_name);
        $field_type = get_php_type_name($field);
        switch ($field_type) {
            case 'int':
            case 'float':
            case 'string':
            case 'array':
            case 'bool':
                $constructor->addBody("\$this->${private_field_name} = \$dto['${field_name}'];");
                break;

            default:
                $constructor->addBody("\$this->${private_field_name} = new ${field_type}(\$dto['${field_name}']);");
                break;
        }
    }
}

function add_type_serialization_method(array $type, ClassType $class)
{
    $jsonSerialize = $class->addMethod('jsonSerialize');
    $jsonSerialize->addBody('$result = [];');
    foreach ($type['struct_fields'] as $field) {
        $field_name = $field['name'];
        $private_property_name = get_php_private_field_name($field_name);
        $jsonSerialize->addBody("if (\$this->${private_property_name} !== null) \$result['${field_name}'] = \$this->${private_property_name};");
    }
    $jsonSerialize->addBody('return $result;');
}

function is_simple_type(array $type)
{
    return 'Number' === $type['type'] || 'String' === $type['type'];
}

function is_struct_type(array $type)
{
    return $type['type'] === 'Struct';
}

function generate_module_type(array $module, array $type)
{
    if (!is_struct_type($type)) {
        return;
    }

    $type_name = $type['name'];
    gen_log("Generate type ${type_name} for module ${module['name']}");

    $file = (new PhpFile())
        ->addComment('This file is auto-generated.')
        ->setStrictTypes();

    $namespace = $file
        ->addNamespace(get_php_namespace_name($module))
        ->addUse(JsonSerializable::class);

    $class = $namespace->addClass(get_php_class_name($type))
        ->addImplement(JsonSerializable::class);

    add_type_private_fields($type, $class);
    add_type_constructor($type, $class);
    add_type_getters($type, $class);
    add_type_setters($type, $class);
    add_type_serialization_method($type, $class);

    file_put_contents(get_php_class_file($module, get_php_class_name($type)),
        (new PsrPrinter())
            ->setTypeResolving(false)
            ->printFile($file));
}

function generate_module_types(array $module)
{
    foreach ($module['types'] as $type) {
        generate_module_type($module, $type);
    }
}

function add_module_constructor(array $module, ClassType $class)
{
    $constructor = $class->addMethod('__construct');

    $constructor->addParameter('context')
        ->setType('TonContext');

    $constructor->addBody('$this->_context = $context;');
}

function get_function_return_type(array $type): string
{
    $return_type = get_php_type_name($type);
    if ($return_type === 'Generic') {
        return get_php_type_name($type['generic_args'][0]);
    }
    return $return_type;
}

function add_module_functions(array $module, ClassType $class)
{
    foreach ($module['functions'] as $function) {
        gen_log("Generate function ${function['name']} for module ${module['name']}");
        $return_type = $function['result'];
        $php_return_type = get_function_return_type($return_type);
        $method = $class->addMethod(get_php_method_name($function['name']))
            ->setReturnType($php_return_type)
            ->setReturnNullable(is_php_nullable_type($return_type));
        $params = [];
        foreach ($function['params'] as $param) {
            if (empty($param['name']) ||
                (($param['name'] === 'context' || $param['name'] === '_context'))) {
                continue;
            }
            $php_param_name = get_php_identifier_name($param['name']);
            $params[$php_param_name] = $method->addParameter($php_param_name)
                ->setType(get_php_type_name($param))
                ->setNullable(is_php_nullable_type($param));
        }
        if (!empty($function['description'])) {
            $method->addComment($function['description']);
        }
        if (!empty($params)) {
            $param_names = array_keys($params);
            if ('void' !== $php_return_type) {
                $method->addBody("return new ${php_return_type}(\$this->_context->callFunction('${module['name']}.${function['name']}', \$${param_names[0]}));");
            } else {
                $method->addBody("\$this->_context->callFunction('${module['name']}.${function['name']}', \$${param_names[0]});");
            }
        } else {
            if ('void' !== $php_return_type) {
                $method->addBody("return new ${php_return_type}(\$this->_context->callFunction('${module['name']}.${function['name']}'));");
            } else {
                $method->addBody("\$this->_context->callFunction('${module['name']}.${function['name']}');");
            }
        }

    }
}

function generate_module_impl(array $module)
{
    $impl_name = get_module_impl_name($module);
    gen_log("Generate ${impl_name}");

    $file = (new PhpFile())
        ->addComment('This file is auto-generated.')
        ->setStrictTypes();

    $namespace = $file
        ->addNamespace(get_php_namespace_name($module))
        ->addUse(TonContext::class);

    $class = $namespace->addClass($impl_name);
    if (!empty($module['description'])) {
        $class->addComment($module['description']);
    }

    $class->addProperty('_context')
        ->setType('TonContext')
        ->setPrivate();

    add_module_constructor($module, $class);
    add_module_functions($module, $class);

    file_put_contents(get_php_class_file($module, $impl_name),
        (new PsrPrinter())
            ->setTypeResolving(false)
            ->printFile($file));
}

function generate_module(array $module)
{
    $module_dir = get_php_module_dir($module);
    gen_log("Generate module {$module['name']} code inside ${module_dir}");

    if (!is_dir($module_dir)) {
        mkdir($module_dir);
    }

    generate_module_types($module);
    generate_module_impl($module);
}

function generate_modules()
{
    $api = load_api_json();
    foreach ($api['modules'] as $module) {
        generate_module($module);
    }
}

generate_modules();