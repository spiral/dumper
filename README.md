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

## License

The MIT License (MIT). Please see [`LICENSE`](./LICENSE) for more information. Maintained by [SpiralScout](https://spiralscout.com).
