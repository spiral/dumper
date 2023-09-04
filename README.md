# Spiral: Colorful variable dumper

[![Latest Stable Version](https://poser.pugx.org/spiral/dumper/version)](https://packagist.org/packages/spiral/dumper)
[![Codecov](https://codecov.io/gh/spiral/dumper/branch/master/graph/badge.svg)](https://codecov.io/gh/spiral/dumper/)

With `spiral/dumper`, developers can easily inspect and analyze variable values during the development process, making it an indispensable tool for debugging and troubleshooting in web and CLI applications.

The component provides a wrapper over the `symfony/var-dumper` library. This component sends dumps directly to the browser within HTTP workers or to the `STDERR` output in other environments. 

<p align="center">
	<a href="https://spiral.dev/docs/basics-debug/3.7/en#spiral-dumper"><b>Documentation</b></a>
</p>


## Usage

Installation:

```bash
composer require spiral/dumper
```

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

## License

The MIT License (MIT). Please see [`LICENSE`](./LICENSE) for more information. Maintained by [SpiralScout](https://spiralscout.com).
