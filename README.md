# Spiral: Colorful variable dumper

[![Latest Stable Version](https://poser.pugx.org/spiral/dumper/version)](https://packagist.org/packages/spiral/dumper)
[![Codecov](https://codecov.io/gh/spiral/dumper/branch/master/graph/badge.svg)](https://codecov.io/gh/spiral/dumper/)

With `spiral/dumper`, developers can easily inspect and analyze variable values during the development process, making it an indispensable tool for debugging and troubleshooting in web and CLI applications.

The component provides a wrapper over the `symfony/var-dumper` library. This component sends dumps directly to the browser within HTTP workers or to the `STDERR` output in other environments. 

<p align="center">
	<a href="https://spiral.dev/docs/basics-debug#spiral-dumper"><b>Documentation</b></a>
</p>


## Installation

Use [Composer](https://getcomposer.org/) to install the package:

```bash
composer require spiral/dumper
```

## Usage

### Symfony VarDumper

In your code:

```php
dump($variable);
```

In an application using **RoadRunner**, you cannot use the `dd()` function. But the package provides an alternative `\rr\dd()` function.
To use it, you need to add `Spiral\Debug\Middleware\DumperMiddleware` in the application, after `ErrorHandlerMiddleware`:

```php
use Spiral\Bootloader\Http\RoutesBootloader as BaseRoutesBootloader;
use Spiral\Debug\Middleware\DumperMiddleware;
use Spiral\Http\Middleware\ErrorHandlerMiddleware;

final class RoutesBootloader extends BaseRoutesBootloader
{
    protected function globalMiddleware(): array
    {
        return [
            ErrorHandlerMiddleware::class,
            DumperMiddleware::class,
            // ...
        ];
    }

    // ...
}
```

### Buggregator

The package provides a built-in integration with the [Buggregator](https://github.com/buggregator) service via
[Trap](https://github.com/buggregator/trap) library.

1. Run a Buggregator server:
    - Full server using Docker:
      ```bash
      docker run --rm --pull always -p 127.0.0.1:8000:8000 -p 127.0.0.1:1025:1025 -p 127.0.0.1:9912:9912 -p 127.0.0.1:9913:9913 ghcr.io/buggregator/server:latest
      ```
    - Mini server using PHP:
      ```bash
      ./vendor/bin/trap
      ```
2. Use `trap()` function instead of `dump()` to send dumps to the Buggregator server:
    ```php
    trap($variable);
    ```

## License

The MIT License (MIT). Please see [`LICENSE`](./LICENSE) for more information. Maintained by [SpiralScout](https://spiralscout.com).
