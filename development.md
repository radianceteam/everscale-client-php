# TON Client Wrapper for PHP - Development notes

## TON SDK Code generation

Module code is generated from [api.json](https://github.com/tonlabs/TON-SDK/blob/master/tools/api.json) file 
provided by the official TON SDK team.

To run code generator, execute this command:

```shell
composer generate
``` 

## Wrapper upgrade

To update wrapper to the new TON SDK version, download new `api.json` and run `composer generate`,
then ensure that all tests are passing and write new ones for the new functions, if any.

## Releasing

Create new tag and push it. Composer will handle it and will rollout new version on packagist.org.

## Troubleshooting

Fire any question to our [Telegram channel](https://t.me/RADIANCE_TON_SDK).