<?php

use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\Method;
use Nette\PhpGenerator\Parameter;
use Nette\PhpGenerator\PhpFile;
use Nette\PhpGenerator\PhpNamespace;
use Nette\PhpGenerator\PsrPrinter;
use Psr\Log\LoggerInterface;
use TON\AsyncInterface;
use TON\AsyncResult;
use TON\EventsInterface;
use TON\JoinableInterface;
use TON\TonClientException;
use TON\TonContext;
use TON\TonRequest;

require __DIR__ . '/vendor/autoload.php';

const AUTO_GENERATED_NOTE = 'This file is auto-generated.';
const TON_CLIENT_INTERFACE = 'TonClientInterface';
const TON_CLIENT = 'TonClient';
const TON_CONTEXT = 'TonContext';
const TON_SRC_DIR = 'src/TON';
const TON_NS = 'TON';
const STRUCT_TYPE = 'Struct';
const ENUM_OF_TYPES = 'EnumOfTypes';
const ENUM_OF_CONSTS = 'EnumOfConsts';

function gen_log(string $message)
{
    echo "${message}\n";
}

class ApiIndex
{
    private array $_moduleIndex = [];
    private array $_typeIndex = [];
    private array $_paramTypes = [];
    private array $_returnTypes = [];
    private array $_callbackTypes = [];
    private array $_handleTypes = [];
    private array $_handleRefTypes = [];
    private array $_appRequestTypes = [];
    private array $_dependentReturnTypes = [];
    private array $_callbackFunctions = [];
    private array $_appRequestFunctions = [];
    private array $_handleFunctions = [];

    public function __construct(array $api)
    {
        // Index all types
        foreach ($api['modules'] as $module) {
            $this->_moduleIndex[$module['name']] = $module;
            foreach ($module['types'] as $type) {
                $this->_addModuleType($module, $type);
            }
        }

        // Analyze types
        foreach ($this->_typeIndex as $module_name => $types) {
            foreach ($types as $type_name => $type) {
                if ($type['type'] === STRUCT_TYPE) {
                    foreach ($type['struct_fields'] as $field) {
                        if ($field['type'] === 'Ref' && isset($this->_handleTypes[$field['ref_name']])) {
                            gen_log("Found type referencing handle: {$type['name']}");
                            $this->_handleRefTypes["${module_name}.${type_name}"] = true;
                        }
                    }
                }
            }
        }

        // Index all functions
        foreach ($api['modules'] as $module) {
            foreach ($module["functions"] as $f) {
                $this->_addFunction($module, $f);
            }
        }
    }

    private function _addModuleType(array $module, array $type)
    {
        $module_name = $module['name'];
        if (!isset($this->_typeIndex[$module_name])) {
            $this->_typeIndex[$module_name] = [];
        }
        $type_name = $type['name'];
        $this->_typeIndex[$module_name][$type_name] = $type;
        if (is_enum_of_types($type)) {
            foreach ($type['enum_types'] as $enum_type) {
                $this->_addModuleType($module, $enum_type);
            }
        }
        if (is_handle_type($type)) {
            $this->_handleTypes["${module_name}.${type_name}"] = true;
        }
    }

    private function _addFunction(array $module, array $f)
    {
        $fq_function_name = $module['name'] . '.' . $f['name'];

        foreach ($f['params'] as $param) {
            if ($param['type'] === 'Ref') {
                $this->_paramTypes[$param['ref_name']] = true;
                if (isset($this->_handleRefTypes[$param['ref_name']])) {
                    gen_log("Found function that uses handles: {$module['name']}.{$f['name']}");
                    $this->_handleFunctions[$fq_function_name] = true;
                }
            }
        }

        if (isset($f["result"]) &&
            $f["result"]["type"] === "Generic" &&
            $f["result"]["generic_args"][0]["type"] === "Ref") {

            $return_type = $f["result"]["generic_args"][0]["ref_name"];
            gen_log("Marking type ${return_type} as return type.");
            $this->_returnTypes[$return_type] = true;

            if (isset($this->_handleFunctions[$fq_function_name])) {
                gen_log("Found dependent return type ${return_type}");
                $this->_dependentReturnTypes[$return_type] = true;
            }

            foreach ($f["params"] as $param) {
                if (is_callback_param($param)) {
                    $this->_callbackFunctions["{$module['name']}.{$f['name']}"] = true;
                    $this->_callbackTypes[$return_type] = true;
                    break;
                } else if (is_app_object_param($param)) {
                    $this->_appRequestFunctions["{$module['name']}.{$f['name']}"] = true;
                    $this->_appRequestTypes[$return_type] = true;
                    break;
                }
            }
        }
    }

    public function hasType(string $module_name, string $type_name): bool
    {
        return isset($this->_typeIndex[$module_name]) &&
            isset($this->_typeIndex[$module_name][$type_name]);
    }

    public function getTypeSpec(string $module_name, string $type_name): array
    {
        if (!$this->hasType($module_name, $type_name)) {
            throw new RuntimeException("Type ${module_name}.${type_name} not found.");
        }
        return $this->_typeIndex[$module_name][$type_name];
    }

    public function getModuleSpec(string $module_name): array
    {
        if (!isset($this->_moduleIndex[$module_name])) {
            throw new RuntimeException("Module ${module_name} not found.");
        }
        return $this->_moduleIndex[$module_name];
    }

    public function isParamType(array $module, array $type): bool
    {
        return isset($this->_paramTypesreturnTypes["{$module['name']}.{$type['name']}"]);
    }

    public function isReturnType(array $module, array $type): bool
    {
        return isset($this->_returnTypes["{$module['name']}.{$type['name']}"]);
    }

    public function isDependentReturnType(array $module, array $type): bool
    {
        return isset($this->_dependentReturnTypes["{$module['name']}.{$type['name']}"]);
    }

    public function isCallbackType(array $module, array $type): bool
    {
        return isset($this->_callbackTypes["{$module['name']}.{$type['name']}"]);
    }

    public function isAppRequestType(array $module, array $type): bool
    {
        return isset($this->_appRequestTypes["{$module['name']}.{$type['name']}"]);
    }

    public function isHandleType(array $module, array $type): bool
    {
        return isset($this->_handleTypes["{$module['name']}.{$type['name']}"]);
    }

    public function isHandleRefType(array $module, array $type): bool
    {
        return isset($this->_handleRefTypes["{$module['name']}.{$type['name']}"]);
    }

    public function isCallbackFunction(array $module, array $function): bool
    {
        return isset($this->_callbackFunctions["{$module['name']}.{$function['name']}"]);
    }

    public function isAppRequestFunction(array $module, array $function): bool
    {
        return isset($this->_appRequestFunctions["{$module['name']}.{$function['name']}"]);
    }

    public function isHandleFunction(array $module, array $function): bool
    {
        return isset($this->_handleFunctions["{$module['name']}.{$function['name']}"]);
    }

    public function getFunctionsByReturnType(array $module, array $type): array
    {
        $fq_type_name = "{$module['name']}.{$type['name']}";
        return isset($this->_functionsByReturnType[$fq_type_name])
            ? $this->_functionsByReturnType[$fq_type_name]
            : [];
    }
}

function get_php_module_name(array $module): string
{
    return ucfirst($module['name']);
}

function get_php_module_dir(array $module): string
{
    return TON_SRC_DIR . '/' . get_php_module_name($module);
}

function get_module_impl_name(array $module, bool $async = false): string
{
    return ($async ? 'Async' : '') . get_php_module_name($module) . 'Module';
}

function get_module_interface_name(array $module, ?bool $async = false): string
{
    return get_php_module_name($module) . 'Module' . ($async ? 'Async' : '') . 'Interface';
}

function get_php_class_file(array $module, string $type_name, ?bool $async = false): string
{
    $module_dir = get_php_module_dir($module) . '/' . ($async ? 'Async/' : '');
    if (!is_dir($module_dir)) {
        mkdir($module_dir, 0700, true);
    }
    return $module_dir . $type_name . '.php';
}

function get_php_class_name(array $type, ?string $parent_class_name = null, bool $async = false): string
{
    $type_name = ($async ? 'Async' : '') . $type['name'];
    if ($parent_class_name) {
        $type_name = "${parent_class_name}_${type_name}";
    }
    return $type_name;
}

function get_php_namespace_name(array $module, bool $async = false): string
{
    return TON_NS . '\\' . get_php_module_name($module) . ($async ? '\\Async' : '');
}

function get_php_fq_class_name(array $module, string $name, bool $async = false): string
{
    return get_php_namespace_name($module, $async) . '\\' . $name;
}

function get_php_identifier_name(string $name): string
{
    return str_replace(' ', '_',
        preg_replace_callback("|[_+]+(\w)|", function ($v) {
            return strtoupper($v[1]);
        }, $name));
}

function get_php_method_name(string $function_name): string
{
    return get_php_identifier_name($function_name);
}

function get_php_module_method_name(string $module_name): string
{
    return $module_name;
}

function get_php_private_field_name(string $name): string
{
    return '_' . get_php_identifier_name($name);
}

function get_php_getter_name(string $name, bool $bool = false): string
{
    return ($bool ? 'is' : 'get') . ucfirst(get_php_identifier_name($name));
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

function is_php_builtin_type(string $name): bool
{
    switch ($name) {
        case 'int':
        case 'float':
        case 'string':
        case 'array':
        case 'bool':
            return true;
    }
    return false;
}

function get_php_type_name(array $type, ApiIndex $index): string
{
    switch ($type['type']) {
        case 'String':
            return 'string';
        case 'Number':
        case 'BigInt':
            return $type['number_type'] === 'Float' ? 'float' : 'int';
        case 'Boolean':
            return 'bool';
        case 'Array':
            return 'array';
        case 'None':
            return 'void';
        case 'Optional':
            return get_php_type_name($type['optional_inner'], $index);
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
                $ref_type = $index->getTypeSpec($ref[0], $ref[1]);
                if (is_numeric_alias($ref_type)) {
                    return $ref_type['number_type'] === 'Float' ? 'float' : 'int';
                }
                if (is_enum_of_consts($ref_type)) {
                    return 'string';
                }
                return $ref[1];
            }

    }
    return $type['type'];
}

function get_php_type_module_name(array $type): ?string
{
    if ($type['type'] === 'Optional') {
        return get_php_type_module_name($type['optional_inner']);
    }
    if ($type['type'] && isset($type['ref_name'])) {
        $ref = parse_ref($type['ref_name']);
        if (!empty($ref) && count($ref) == 2) {
            return $ref[0];
        }
    }
    return null;
}

function is_php_private_field_nullable(array $field, ApiIndex $index): bool
{
    return is_php_nullable_type($field) ||
        !is_php_builtin_type(get_php_type_name($field, $index));
}

function add_type_private_fields(array $module, array $type, ClassType $class, ApiIndex $index, PhpNamespace $ns)
{
    foreach ($type['struct_fields'] as $field) {
        $field_name = $field['name'];
        if (empty($field_name)) {
            continue;
        }
        $private_field_name = get_php_private_field_name($field_name);
        $property = $class->addProperty($private_field_name)
            ->setType(get_php_type_name($field, $index))
            ->setNullable(is_php_private_field_nullable($field, $index))
            ->setPrivate();
        if (!empty($field['description'])) {
            $property->addComment($field['description']);
        }
    }
}

function add_type_getters(array $type, ClassType $class, ApiIndex $index)
{
    foreach ($type['struct_fields'] as $field) {
        $field_name = $field['name'];
        if (empty($field_name)) {
            continue;
        }
        $return_type = get_php_type_name($field, $index);
        $getter_name = get_php_getter_name($field_name, $return_type === 'bool');
        $getter = $class->addMethod($getter_name)
            ->setReturnType($return_type)
            ->setReturnNullable(is_php_private_field_nullable($field, $index));
        if (!empty($field['description'])) {
            $getter->addComment($field['description']);
        }
        $private_property_name = get_php_private_field_name($field_name);
        $getter->addBody("return \$this->${private_property_name};");
    }
}

function add_type_setters(array $type, ClassType $class, ApiIndex $index)
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
            ->setType(get_php_type_name($field, $index))
            ->setNullable(is_php_private_field_nullable($field, $index));
        if (!empty($field['description'])) {
            $setter->addComment($field['description']);
        }
        $private_property_name = get_php_private_field_name($field_name);
        $setter->addBody("\$this->${private_property_name} = \$${parameter_name};");
        $setter->addBody("return \$this;");
    }
}

function add_type_constructor(array $module, array $type, ApiIndex $index, ClassType $class)
{
    $constructor = $class->addMethod('__construct');

    $constructor->addParameter('dto', null)
        ->setType('array')
        ->setNullable(true);

    $constructor->addBody('if (!$dto) $dto = [];');
    foreach ($type['struct_fields'] as $field) {
        $field_name = $field['name'];
        if (empty($field_name)) {
            continue;
        }

        $private_field_name = get_php_private_field_name($field_name);
        $field_type_name = get_php_type_name($field, $index);

        if (is_php_builtin_type($field_type_name)) {

            if (is_php_nullable_type($field)) {
                $constructor->addBody("\$this->${private_field_name} = \$dto['${field_name}'] ?? null;");
                continue;
            }

            $default_value = '';
            switch ($field_type_name) {
                case 'int':
                case 'float':
                    $default_value = '0';
                    break;
                case 'string':
                    $default_value = "''";
                    break;
                case 'array':
                    $default_value = '[]';
                    break;
                case 'bool':
                    $default_value = 'false';
                    break;
            }
            $constructor->addBody("\$this->${private_field_name} = \$dto['${field_name}'] ?? ${default_value};");
            continue;
        }

        if ($field_type_name) {
            $type_module_name = get_php_type_module_name($field) ?? $module['name'];
            $type = $index->getTypeSpec($type_module_name, $field_type_name);
            if (is_enum_of_types($type)) {
                $constructor->addBody("\$this->${private_field_name} = isset(\$dto['${field_name}']) ? ${field_type_name}::create(\$dto['${field_name}']) : null;");
            } else if (is_enum_of_consts($type)) {
                $constructor->addBody("\$this->${private_field_name} = \$dto['${field_name}'] ?? null;");
            } else {
                $constructor->addBody("\$this->${private_field_name} = isset(\$dto['${field_name}']) ? new ${field_type_name}(\$dto['${field_name}']) : null;");
            }
        } else {
            $constructor->addBody("\$this->${private_field_name} = \$dto['${field_name}'] ?? null;");
        }
    }
}

function add_type_serialization_method(array $type, ClassType $class, bool $add_type_meta_property = false)
{
    $jsonSerialize = $class->addMethod('jsonSerialize');
    if ($add_type_meta_property) {
        $jsonSerialize->addBody("\$result = ['type' => '{$type['name']}'];");
    } else {
        $jsonSerialize->addBody('$result = [];');
    }
    foreach ($type['struct_fields'] ?? [] as $field) {
        $field_name = $field['name'];
        $private_property_name = get_php_private_field_name($field_name);
        $jsonSerialize->addBody("if (\$this->${private_property_name} !== null) \$result['${field_name}'] = \$this->${private_property_name};");
    }
    $jsonSerialize->addBody('return !empty($result) ? $result : new stdClass();');
}

function is_numeric_alias(array $type): bool
{
    return $type['type'] === 'Number' ||
        $type['type'] === 'BigInt';
}

function is_reference_type(array $type): bool
{
    return $type['type'] === 'Ref';
}

function is_struct_type(array $type): bool
{
    return $type['type'] === STRUCT_TYPE;
}

function ends_with($str, $sub): bool
{
    return (substr($str, strlen($str) - strlen($sub)) == $sub);
}

function is_handle_type(array $type): bool
{
    return $type['type'] === 'Number' &&
        $type['number_type'] === 'UInt' &&
        ends_with($type['name'], 'Handle');
}

function is_enum_of_types(array $type): bool
{
    return $type['type'] === ENUM_OF_TYPES;
}

function is_enum_of_consts(array $type): bool
{
    return $type['type'] === ENUM_OF_CONSTS;
}

function add_type_imports(array $module, array $type, ApiIndex $index, PhpNamespace $ns)
{
    foreach ($type['struct_fields'] as $field) {
        $field_name = $field['name'];
        if (empty($field_name)) {
            continue;
        }
        $field_type_name = get_php_type_name($field, $index);
        $field_module_name = get_php_type_module_name($field);
        if ($field_module_name &&
            $field_module_name !== $module['name'] && !
            is_php_builtin_type($field_type_name)) {
            $field_module = $index->getModuleSpec($field_module_name);
            $ns->addUse(get_php_fq_class_name($field_module, $field_type_name));
        }
    }
}

function generate_module_struct_type(array $module, array $type, ApiIndex $index, ClassType $class, PhpFile $file, PhpNamespace $ns, ?string $parent_class = null)
{
    $ns->addUse(JsonSerializable::class)
        ->addUse(stdClass::class);
    $class->addImplement(JsonSerializable::class);

    add_type_imports($module, $type, $index, $ns);
    add_type_private_fields($module, $type, $class, $index, $ns);
    add_type_constructor($module, $type, $index, $class);
    add_type_getters($type, $class, $index);
    add_type_setters($type, $class, $index);
    add_type_serialization_method($type, $class, !empty($parent_class));
}

function generate_enum_of_consts_module_type(array $module, array $type, ApiIndex $index, ClassType $class, PhpFile $file, PhpNamespace $ns)
{
    $class->setFinal(true);

    foreach ($type['enum_consts'] as $const) {
        $constant = $class->addConstant($const['name'], isset($const['value']) ? (int)$const['value'] : $const['name']);
        $comment = $const['description'] ?? $const['summary'] ?? null;
        if ($comment) {
            $constant->addComment($comment);
        }
    }
}

function generate_enum_of_types_module_type(array $module, array $type, ApiIndex $index, ClassType $class, PhpFile $file, PhpNamespace $ns)
{
    $ns->addUse(JsonSerializable::class)
        ->addUse(InvalidArgumentException::class);

    $class->setAbstract(true);
    $class->addImplement(JsonSerializable::class);

    foreach ($type["enum_types"] as $enum_type) {
        generate_module_type($module, $enum_type, $index, $class->getName());
    }

    $factoryMethod = $class->addMethod('create')
        ->setStatic(true)
        ->setReturnType($type['name'])
        ->setReturnNullable(true);

    $factoryMethod->addParameter('dto')
        ->setType('array')
        ->setNullable(true);

    $factoryMethod->addBody("if (\$dto === null) return null;");
    $factoryMethod->addBody("if (!isset(\$dto['type'])) return null;");

    foreach ($type["enum_types"] as $enum_type) {
        $type_name = $enum_type['name'];
        $php_class_name = get_php_class_name($enum_type, $type['name']);
        $factoryMethod->addBody("if (\$dto['type'] === '${type_name}') return new ${php_class_name}(\$dto);");
    }

    $factoryMethod->addBody("throw new InvalidArgumentException(\"Unsupported ${type['name']} type: {\$dto['type']}\");");
}

function generate_type_inner(array $module, array $type, ApiIndex $index, ClassType $class, PhpFile $file, PhpNamespace $namespace, $type_name, ?string $parent_class): void
{
    if (is_struct_type($type)) {
        generate_module_struct_type($module, $type, $index, $class, $file, $namespace, $parent_class);
    } else if (is_enum_of_consts($type)) {
        generate_enum_of_consts_module_type($module, $type, $index, $class, $file, $namespace);
    } else if (is_enum_of_types($type)) {
        generate_enum_of_types_module_type($module, $type, $index, $class, $file, $namespace);
    } else if (is_reference_type($type)) {
        // We can't extend multiple classes, so making a mixin type here.
        [$ref_module_name, $ref_type_name] = parse_ref($type['ref_name']);
        $ref_type = $index->getTypeSpec($ref_module_name, $ref_type_name);
        $mixin = (new ArrayObject($ref_type))->getArrayCopy();
        $mixin['name'] = $type_name;
        generate_type_inner($module, $mixin, $index, $class, $file, $namespace, $type_name, $parent_class);
    }
}

function generate_module_type(array $module, array $type, ApiIndex $index, ?string $parent_class = null)
{
    $type_name = $type['name'];

    if (is_numeric_alias($type)) {
        gen_log("Type ${type_name} is an alias for Number");
        return;
    }

    gen_log("Generate type ${type_name} for module ${module['name']}");

    $file = (new PhpFile())
        ->addComment(AUTO_GENERATED_NOTE)
        ->setStrictTypes();

    $namespace = $file->addNamespace(get_php_namespace_name($module));

    $php_class_name = get_php_class_name($type, $parent_class);
    $class = $namespace->addClass($php_class_name);

    if ($parent_class) {
        $class->setExtends($parent_class);
    }

    generate_type_inner($module, $type, $index, $class, $file, $namespace, $type_name, $parent_class);

    file_put_contents(get_php_class_file($module, $php_class_name),
        (new PsrPrinter())
            ->setTypeResolving(false)
            ->printFile($file));
}

function generate_module_types(array $module, ApiIndex $index)
{
    foreach ($module['types'] as $type) {
        generate_module_type($module, $type, $index);
    }
}

function add_module_constructor(array $module, ClassType $class)
{
    $constructor = $class->addMethod('__construct')
        ->addComment("{$class->getName()} constructor.")
        ->addComment("@param TonContext \$context");

    $constructor->addParameter('context')
        ->setType(TON_CONTEXT);

    $constructor->addBody('$this->_context = $context;');
}

function get_function_return_type(array $type, ApiIndex $index, bool $async = false): string
{
    $return_type = get_php_type_name($type, $index);
    if ($return_type === 'Generic') {
        $return_type = get_php_type_name($type['generic_args'][0], $index);
    }
    if ('void' === $return_type && $async) {
        return 'AsyncResult';
    }
    return ($async ? 'Async' : '') . $return_type;
}

function is_context_param(array $param): bool
{
    return (($param['name'] === 'context' || $param['name'] === '_context')); // TODO: check type?
}

function is_callback_param(array $param): bool
{
    return (($param['type'] === 'Generic' && $param['generic_args'][0]["ref_name"] === 'Request'));
}

function is_app_object_param(array $param): bool
{
    return (($param['type'] === 'Generic' && $param['generic_name'] === 'AppObject'));
}

function add_module_functions(array $module, ClassType $class, PhpNamespace $ns, ApiIndex $index, callable $body_callback = null, bool $async = false)
{
    foreach ($module['functions'] as $function) {
        $function_name = $function['name'] . ($async ? 'Async' : '');
        gen_log("Generate function ${function_name} for module ${module['name']}");
        $return_type = $function['result'];
        if (($index->isCallbackFunction($module, $function) ||
                $index->isAppRequestFunction($module, $function)) && !$async) {
            gen_log("Skipping method ${function_name} for class {$class->getName()}... callbacks can only be used in async version.");
            continue;
        }
        $php_return_type = get_function_return_type($return_type, $index, $async);
        if ($php_return_type === 'AsyncResult') {
            $ns->addUse(AsyncResult::class);
        }
        $method = $class->addMethod(get_php_method_name($function_name))
            ->setReturnNullable(is_php_nullable_type($return_type));
        if ($php_return_type !== 'void') {
            $method->setReturnType($php_return_type);
        }
        if (!empty($function['description'])) {
            $method->addComment($function['description']);
        }
        $params = [];
        $callback_param = null;
        foreach ($function['params'] as $param) {
            if (empty($param['name']) || is_context_param($param)) {
                continue;
            }
            if (is_callback_param($param)) {
                continue;
            }
            if (is_app_object_param($param)) {
                $method->addComment('@param callable $callback Transforms app request to app response.');
                $callback_param = $method->addParameter('callback')->setType('callable');
                continue;
            }
            $php_param_name = get_php_identifier_name($param['name']);
            $php_type_name = get_php_type_name($param, $index);
            if (!is_php_builtin_type($php_type_name)) {
                if ($async) {
                    // Add using for missing param types
                    $ns->addUse(get_php_fq_class_name($module, $php_type_name));
                }
            }
            $paramDescription = $param['description'] ?? $param['summary'] ?? '';
            $method->addComment("@param $php_type_name \$${php_param_name} ${paramDescription}");
            $params[$php_param_name] = $method->addParameter($php_param_name)
                ->setType($php_type_name)
                ->setNullable(is_php_nullable_type($param));
        }
        if ('void' !== $php_return_type) {
            $method->addComment("@return ${php_return_type}");
        }
        if ($body_callback) {
            $body_callback($method, $function, $params, $php_return_type, $callback_param);
        }
    }
}

function generate_module_interface(array $module, ApiIndex $index)
{
    $interface_name = get_module_interface_name($module);
    gen_log("Generate ${interface_name}");

    $file = (new PhpFile())
        ->addComment(AUTO_GENERATED_NOTE)
        ->setStrictTypes();

    $namespace = $file
        ->addNamespace(get_php_namespace_name($module));

    $interface = $namespace->addInterface($interface_name);
    if (!empty($module['description'])) {
        $interface->addComment($module['description']);
    }

    // add async method
    $async_interface_name = get_module_interface_name($module, true);
    $namespace->addUse(get_php_fq_class_name($module, $async_interface_name, true));
    $interface->addMethod('async')
        ->addComment("@return ${async_interface_name} Async version of ${module['name']} module interface.")
        ->setReturnType($async_interface_name);

    add_module_functions($module, $interface, $namespace, $index);

    file_put_contents(get_php_class_file($module, $interface_name),
        (new PsrPrinter())
            ->setTypeResolving(false)
            ->printFile($file));
}

function generate_module_impl(array $module, ApiIndex $index)
{
    $impl_name = get_module_impl_name($module);
    gen_log("Generate ${impl_name}");

    $file = (new PhpFile())
        ->addComment(AUTO_GENERATED_NOTE)
        ->setStrictTypes();

    $namespace = $file
        ->addNamespace(get_php_namespace_name($module))
        ->addUse(TonContext::class);

    $class = $namespace->addClass($impl_name)
        ->addImplement(get_module_interface_name($module));

    if (!empty($module['description'])) {
        $class->addComment($module['description']);
    }

    $class->addProperty('_context')
        ->setType(TON_CONTEXT)
        ->setPrivate();

    add_module_constructor($module, $class);

    // add async method impl
    $async_module_name = get_module_impl_name($module, true);
    $async_module_interface_name = get_module_interface_name($module, true);

    $namespace
        ->addUse(get_php_fq_class_name($module, $async_module_interface_name, true))
        ->addUse(get_php_fq_class_name($module, $async_module_name, true));

    $class->addMethod('async')
        ->setReturnType($async_module_interface_name)
        ->addComment("@return ${async_module_interface_name} Async version of ${module['name']} module interface.")
        ->addBody("return new ${async_module_name}(\$this->_context);");

    add_module_functions($module, $class, $namespace, $index, function (Method $method, array $function, array $params, string $php_return_type) use ($module) {
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
    },);

    file_put_contents(get_php_class_file($module, $impl_name),
        (new PsrPrinter())
            ->setTypeResolving(false)
            ->printFile($file));
}

function generate_module_async_interface(array $module, ApiIndex $index)
{
    $interface_name = get_module_interface_name($module, true);
    gen_log("Generate ${interface_name}");

    $file = (new PhpFile())
        ->addComment(AUTO_GENERATED_NOTE)
        ->setStrictTypes();

    $namespace = $file
        ->addNamespace(get_php_namespace_name($module, true));

    $interface = $namespace->addInterface($interface_name);
    if (!empty($module['description'])) {
        $interface->addComment($module['description']);
    }

    add_module_functions($module, $interface, $namespace, $index, null, true);

    file_put_contents(get_php_class_file($module, $interface_name, true),
        (new PsrPrinter())
            ->setTypeResolving(false)
            ->printFile($file));
}

function generate_module_async_type(array $module, array $type, ApiIndex $index)
{
    $type_name = $type['name'];

    if (is_numeric_alias($type)) {
        gen_log("Type ${type_name} is an alias for Number");
        return;
    }

    $php_class_name = get_php_class_name($type);
    $async_php_class_name = get_php_class_name($type, null, true);
    gen_log("Generate type ${async_php_class_name} for module ${module['name']}");

    $file = (new PhpFile())
        ->addComment(AUTO_GENERATED_NOTE)
        ->setStrictTypes();

    $namespace = $file->addNamespace(get_php_namespace_name($module, true))
        ->addUse(TonRequest::class)
        ->addUse(TonClientException::class)
        ->addUse(get_php_fq_class_name($module, $php_class_name));

    $class = $namespace->addClass($async_php_class_name);

    $class->addProperty('_request')
        ->setPrivate()
        ->setType('TonRequest')
        ->setComment('TON request handle.');

    $constructor = $class->addMethod('__construct')
        ->addComment("${async_php_class_name} constructor.")
        ->addComment("@param TonRequest \$request Request handle.")
        ->addBody('$this->_request = $request;');

    $constructor
        ->addParameter('request')
        ->setType('TonRequest');

    $await = $class->addMethod('await')
        ->addComment('Blocks until function execution is finished and returns execution result.')
        ->addComment("@param int \$timeout Await timeout in millis. -1 means no timeout.")
        ->addComment("@return ${type_name} Function execution result.")
        ->addComment("@throws TonClientException Function execution error.")
        ->setReturnType($php_class_name)
        ->addBody("return new ${php_class_name}(\$this->_request->await(\$timeout));");

    $await->addParameter('timeout')
        ->setType('int')
        ->setDefaultValue(-1);

    if ($index->isCallbackType($module, $type) ||
        $index->isAppRequestType($module, $type)) {

        $namespace->addUse(EventsInterface::class);
        $class->addImplement('EventsInterface');

        $namespace->addUse(Generator::class);
        $getEvents = $class->addMethod('getEvents')
            ->addComment('@param int $timeout Timeout in millis. -1 means no timeout.')
            ->setReturnType('Generator');

        $getEvents->addParameter('timeout')
            ->setType('int')
            ->setDefaultValue(-1);

        $event_type_name = ucfirst($module['name']) . 'Event';
        if ($index->hasType($module['name'], $event_type_name)) {
            // module has specific type of events, like, ProcessingEvent
            $namespace->addUse(get_php_fq_class_name($module, $event_type_name));
            $getEvents->addComment("@return Generator generator of {@link ${event_type_name}}");
            $event_type = $index->getTypeSpec($module['name'], $event_type_name);
            if (is_enum_of_types($event_type)) {
                $getEvents->addBody("foreach (\$this->_request->getEvents(\$timeout) as \$event) 
    yield ${event_type_name}::create(\$event);");
            } else {
                $getEvents->addBody("foreach (\$this->_request->getEvents(\$timeout) as \$event) 
    yield new ${event_type_name}(\$event);");
            }
        } else {
            // generating JSON events
            $getEvents->addComment("@return Generator generator of {@link array}");
            $getEvents->addBody("foreach (\$this->_request->getEvents(\$timeout) as \$event) yield \$event;");
        }

        if ($index->isAppRequestType($module, $type)) {
            $namespace->addUse(JoinableInterface::class);
            $class->addImplement('JoinableInterface');
            $class->addMethod('getRequest')
                ->setComment('@return TonRequest')
                ->setReturnType('TonRequest')
                ->setBody('return $this->_request;');
            $constructor->addBody('$this->_request->listen();');
        }
    }

    if ($index->isDependentReturnType($module, $type)) {
        $namespace->addUse(AsyncInterface::class);
        $namespace->addUse(JoinableInterface::class);
        $class->addImplement('AsyncInterface');

        $join = $class->addMethod('join')
            ->addComment('@param JoinableInterface $joinable Another request to join to.')
            ->addComment('@param int $disconnect Disconnect option.')
            ->addComment('@return $this')
            ->setReturnType('self')
            ->addBody('$this->_request->join($joinable->getRequest(), $disconnect);')
            ->addBody('return $this;');

        $join->addParameter('joinable')
            ->setType('JoinableInterface');

        $join->addParameter('disconnect')
            ->setType('int')
            ->setDefaultValue(JoinableInterface::DISCONNECT_AFTER_AWAIT);

        $class->addMethod('disconnect')
            ->addComment('@param JoinableInterface $joinable Request to disconnect from.')
            ->addBody('$this->_request->disconnect($joinable->getRequest());')
            ->addBody('return $this;')
            ->setReturnType('self')
            ->addParameter('joinable')
            ->setType('JoinableInterface');
    }

    file_put_contents(get_php_class_file($module, $class->getName(), true),
        (new PsrPrinter())
            ->setTypeResolving(false)
            ->printFile($file));
}

function generate_module_async_impl(array $module, ApiIndex $index)
{
    $impl_name = get_module_impl_name($module, true);
    gen_log("Generate ${impl_name}");

    $file = (new PhpFile())
        ->addComment(AUTO_GENERATED_NOTE)
        ->setStrictTypes();

    $namespace = $file
        ->addNamespace(get_php_namespace_name($module, true))
        ->addUse(TonContext::class);

    $class = $namespace->addClass($impl_name)
        ->addImplement(get_module_interface_name($module, true));

    if (!empty($module['description'])) {
        $class->addComment($module['description']);
    }

    $class->addProperty('_context')
        ->setType(TON_CONTEXT)
        ->setPrivate();

    add_module_constructor($module, $class);

    add_module_functions($module, $class, $namespace, $index, function (Method $method, array $function, array $params, string $php_return_type, ?Parameter $callback_param) use ($module) {
        $callback_param_def = '';
        if ($callback_param) {
            $callback_param_def = ", \${$callback_param->getName()}";
        }
        if (!empty($params)) {
            $param_names = array_keys($params);
            if ('AsyncResult' !== $php_return_type) {
                $method->addBody("return new ${php_return_type}(\$this->_context->callFunctionAsync('${module['name']}.${function['name']}', \$${param_names[0]}$callback_param_def));");
            } else {
                $method->addBody("return new AsyncResult(\$this->_context->callFunctionAsync('${module['name']}.${function['name']}', \$${param_names[0]}$callback_param_def));");
            }
        } else {
            if ($callback_param_def) {
                $callback_param_def = ", null${callback_param_def}";
            }
            if ('AsyncResult' !== $php_return_type) {
                $method->addBody("return new ${php_return_type}(\$this->_context->callFunctionAsync('${module['name']}.${function['name']}'$callback_param_def));");
            } else {
                $method->addBody("return new AsyncResult(\$this->_context->callFunctionAsync('${module['name']}.${function['name']}'$callback_param_def));");
            }
        }
    }, true);

    file_put_contents(get_php_class_file($module, $impl_name, true),
        (new PsrPrinter())
            ->setTypeResolving(false)
            ->printFile($file));
}

function generate_module_async_types(array $module, ApiIndex $index)
{
    foreach ($module['types'] as $type) {
        if ($index->isReturnType($module, $type)) {
            generate_module_async_type($module, $type, $index);
        }
    }
}

function generate_module(array $module, ApiIndex $index)
{
    $module_dir = get_php_module_dir($module);
    gen_log("Generate module {$module['name']} code inside ${module_dir}");

    if (!is_dir($module_dir)) {
        mkdir($module_dir);
    }

    generate_module_types($module, $index);
    generate_module_interface($module, $index);
    generate_module_impl($module, $index);

    // async
    generate_module_async_types($module, $index);
    generate_module_async_interface($module, $index);
    generate_module_async_impl($module, $index);
}

function add_client_functions(array $modules, ClassType $class, callable $body_callback = null)
{
    foreach ($modules as $module) {
        $return_type = get_module_interface_name($module);
        $method = $class->addMethod(get_php_module_method_name($module['name']))
            ->setReturnType($return_type);
        if (!empty($module['description'])) {
            $method->addComment($module['description']);
        }
        if ($body_callback) {
            $body_callback($method, $module, $return_type);
        }
    }
}

function generate_client_interface(array $api)
{
    $interface_name = TON_CLIENT_INTERFACE;

    gen_log("Generate ${interface_name}");

    $file = (new PhpFile())
        ->addComment(AUTO_GENERATED_NOTE)
        ->setStrictTypes();

    $namespace = $file
        ->addNamespace(TON_NS)
        ->addUse(TonContext::class);

    $modules = $api['modules'];
    foreach ($modules as $module) {
        $namespace->addUse(get_php_fq_class_name($module, get_module_interface_name($module)));
    }

    $interface = $namespace->addInterface($interface_name);

    add_client_functions($modules, $interface);

    file_put_contents(TON_SRC_DIR . '/' . $interface_name . '.php',
        (new PsrPrinter())
            ->setTypeResolving(false)
            ->printFile($file));
}

function generate_client_impl(array $api)
{
    $class_name = TON_CLIENT;

    gen_log("Generate ${class_name}");

    $file = (new PhpFile())
        ->addComment(AUTO_GENERATED_NOTE)
        ->setStrictTypes();

    $namespace = $file
        ->addNamespace(TON_NS)
        ->addUse(TonContext::class)
        ->addUse(JsonSerializable::class)
        ->addUse(LoggerInterface::class);

    $class = $namespace->addClass($class_name)
        ->addImplement(TON_CLIENT_INTERFACE);

    $class->addProperty('_context')
        ->setType(TON_CONTEXT)
        ->setPrivate();

    $constructor = $class->addMethod('__construct');
    $constructor->addParameter('config', null)
        ->setType(JsonSerializable::class)
        ->setNullable(true);
    $constructor->addParameter('logger', null)
        ->setType('LoggerInterface')
        ->setNullable(true);
    $constructor->addBody('$this->_context = new TonContext($config, $logger);');

    $class->addMethod('setLogger')
        ->addBody('$this->_context->setLogger($logger);')
        ->addParameter('logger')
        ->setType('LoggerInterface');

    $modules = $api['modules'];
    foreach ($modules as $module) {
        $module_interface_name = get_module_interface_name($module);
        $module_impl_name = get_module_impl_name($module);
        $namespace->addUse(get_php_fq_class_name($module, $module_interface_name));
        $namespace->addUse(get_php_fq_class_name($module, $module_impl_name));
        $class->addProperty("_${module['name']}")
            ->setType($module_interface_name)
            ->setPrivate();
        $constructor->addBody("\$this->_${module['name']} = new ${module_impl_name}(\$this->_context);");
    }

    add_client_functions($modules, $class, function (Method $method, array $module) {
        $method->addBody("return \$this->_${module['name']};");
    });

    file_put_contents(TON_SRC_DIR . '/' . $class_name . '.php',
        (new PsrPrinter())
            ->setTypeResolving(false)
            ->printFile($file));
}

function generate_client(array $api, ApiIndex $index)
{
    generate_client_interface($api);
    generate_client_impl($api);
}

function generate_modules(array $api, ApiIndex $index)
{
    foreach ($api['modules'] as $module) {
        generate_module($module, $index);
    }
}

function generate()
{
    $api = load_api_json();
    $index = new ApiIndex($api);
    generate_client($api, $index);
    generate_modules($api, $index);
}

generate();
