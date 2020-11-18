# TON Client Wrapper for PHP

True async wrapper using [ton_client](https://github.com/radianceteam/ton-client-php-ext/) extension
with multi-threading and blocking queues under the hood.

## Requirements

 - Windows x64
 - PHP version 7.4 x64 Thread Safe (can be downloaded from here: https://windows.php.net/downloads/releases/php-7.4.12-Win32-vc15-x64.zip).
 - Composer (https://getcomposer.org/)

## Installation

1. Unpack PHP distribution into some directory (let's call it `C:\php` for brevity).
2. Copy `lib\ton_client.dll` and `lib\pthreadVC2.dll` into `C:\php`.
3. Copy `ext\php_ton_client.dll` into `C:\php\ext`.
4. Copy `C:\php\php-ini.production` to `C:\php\php.ini`
5. Add the following to `C:\php\php.ini`: 

```
extension="C:\php\ext\php_ton_client.dll"
```

6. Verify that `ton_client` extension is enabled by inspecting output of `php --info`:

```
ton_client

ton_client support => enabled
```

7. Go to `ton-client-php` sources.
8. Run `composer install`.

## Running tests

```
composer test
```

## Re-generate classes

```
composer generate
```

## TODO

 - Remove binaries from the repo, download them from `ton-client-php-ext` GitHub repo (requires some CI/CD setup).
 - Linux and Mac readme.
 - Separate Development/usage readme.
 