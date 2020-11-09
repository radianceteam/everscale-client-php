# TON Client Wrapper for PHP

## Requirements

 - Windows x64
 - PHP version 7.4 x64 Thread Safe (can be downloaded from here: https://windows.php.net/downloads/releases/php-7.4.12-Win32-vc15-x64.zip).
 - Composer (https://getcomposer.org/)

## Installation

1. Unpack PHP distribution into some directory (let's call it `C:\php` for brevity).
2. Copy `ton_client.dll` into `C:\php`.
3. Copy `ext\php_ton_client.dll` directory into `C:\php\ext`.
4. Copy `C:\php\php-ini.production` to `C:\php\php.ini`
5. Add the following to `C:\php\php-ini`: `extension="C:\php\ext\php_ton_client.dll"`
6. Verify `ton_client` extension is enabled by inspecting output of `php --info`:

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

## Notes

It's important to note that *only synchronous functions/methods are implemented* due to the sync nature of PHP. 
There is a possibility of making it async by using third-party lib like [Amp](https://github.com/amphp/amp)
but it requires the full SDK implementation in PHP, without `ton_client.dll` calls, which is out of scope currently.
(It may be done in the future versions of the wrapper, and it can't be called a wrapper in such case :)).

## TODO

 - 100% function coverage (sync only).
 - Remove binaries from the repo, download them from `ton-client-php-ext` GitHub repo (requires some CI/CD setup).
 - Linux and Mac readme.
 - Separate Development/usage readme.
