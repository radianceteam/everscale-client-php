<?php

class TestOptions
{
    public string $version;
    public bool $silent;

    public function validate(): ?string
    {
        if (empty($this->version)) {
            return "Version not specified.";
        }
        return null;
    }

    public function __toString(): string
    {
        return <<<EOT
Version: {$this->version}
Silent: {$this->silent}
EOT;
    }
}

function check_installed_version(TestOptions $options): bool
{
    $version = phpversion('ton_client');
    if (!$version) {
        inform("No extension installed", $options);
        return false;
    }
    inform("Installed version: ${version}", $options);
    $cmp = version_compare($options->version, $version);
    if ($cmp !== 0) {
        inform("Different version installed: ${version}", $options);
        return false;
    }
    return true;
}

function fire_error($message)
{
    error_log($message, 0);
    exit(1);
}

function usage($script_name)
{
    echo <<<EOT
Usage: php ${script_name} 
    -v|--version <VERSION>      Extension version to be checked.
    [-h|--help]                 Show this help.
    [-S|--silent]               Don't print too much.
EOT;
}

function get_options($argv): TestOptions
{
    if (!($options = getopt('hSv:', [
        'help',
        'silent',
        'version:'
    ]))) {
        usage($argv[0]);
        fire_error("Failed to parse options.");
    }

    if (isset($options['h']) || isset($options['help'])) {
        usage($argv[0]);
        exit(0);
    }

    $o = new TestOptions();
    $o->version = isset($options['v']) ? $options['v'] : $options['version'];
    $o->silent = isset($options['S']) || isset($options['silent']);

    $errors = $o->validate();
    if (!empty($errors)) {
        usage($argv[0]);
        fire_error($errors);
    }

    return $o;
}

function inform(string $message, TestOptions $options)
{
    if (!$options->silent) {
        echo "${message}\n";
    }
}

function test(TestOptions $options)
{
    inform("Running tests...", $options);

    foreach ([
                 'ton_create_context',
                 'ton_destroy_context',
                 'ton_request_sync'
             ] as $func) {
        if (!function_exists($func)) {
            fire_error("Function ${func} doesn't exist");
        }
    }

    $json = json_decode(ton_create_context("{}"), true);
    if (!$json) {
        fire_error("Failed to create TON context.");
    }

    $contextId = $json['result'];
    $json = ton_request_sync($contextId, 'client.version', '');
    $response = json_decode($json, true);
    if (!$response || !isset($response['result']) || !isset($response['result']['version'])) {
        fire_error("Invalid response returned by client.version: ${json}.");
    }
    $version = $response['result']['version'];
    inform("Version returned by client.version: ${version}", $options);
    $cmp = version_compare($version, $options->version);
    if ($cmp !== 0) {
        fire_error("Wrong version returned by client.version: ${version}");
    }
    ton_destroy_context($contextId);
}

$options = get_options($argv);

inform(<<<EOT
${options}
EOT
    , $options);

if (check_installed_version($options)) {
    test($options);
}

inform('OK', $options);
