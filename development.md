# TON Client Wrapper for PHP - Development notes

## Testing

Some tests require NodeSE server running locally. 
The easiest way to achieve this is to run it using
 [Docker](https://www.docker.com/products/docker-desktop) image:

```
docker run -d -p8888:80 tonlabs/local-node
```

Given that Docker machine host is `localhost`, set `TON_NETWORK_ADDRESS` environment 
variable to `http://localhost:8888`. Restart shell if needed (on Windows).

Then run tests via Composer script:

```shell
composer test
```

## TON SDK Code generation

Module code is generated from [api.json](https://github.com/tonlabs/TON-SDK/blob/master/tools/api.json) file 
provided by the TON SDK team.

To run code generator, execute this command:

```shell
composer generate
``` 

## Versioning

Package versioning mirrors TON SDK releases. So for example package `1.1.1` works 
with TON SDK binaries of the same version, and contains all the functions from the 
corresponding `api.json`. 

## Wrapper upgrade

To update wrapper to the new TON SDK version, download new `api.json` and run `composer generate`,
then ensure that all tests are passing and write new ones for the new functions, if any.

## Releasing

Create new tag and push it. Composer will handle it and will rollout new version on packagist.org.

## Troubleshooting

Fire any question to our [Telegram channel](https://t.me/RADIANCE_TON_SDK).