# Spiral: Colorful variable dumper
[![Latest Stable Version](https://poser.pugx.org/spiral/dumper/version)](https://packagist.org/packages/spiral/dumper)
[![Build Status](https://travis-ci.org/spiral/dumper.svg?branch=master)](https://travis-ci.org/spiral/dumper)
[![Codecov](https://codecov.io/gh/spiral/dumper/branch/master/graph/badge.svg)](https://codecov.io/gh/spiral/dumper/)
Dumper provides the ability to display the content of any given variable or object in a human readable form. Component support dumping
into various outputs such as STDOUT, STDERR or log. Component support CLI colorization.

## Example
Installation:

```
$ composer require spiral/dumper
```

In your code (works in web and cli SAPIs):

```php
$d = new Spiral\Debug\Dumper();
$d->dump($variable);
```

Dump to Log:

```php
$d = new Spiral\Debug\Dumper($loggerInterface);

$d->dump($variable, Dumper::LOGGER);
```

Dump to STDERR:

```php
$d = new Spiral\Debug\Dumper($loggerInterface);

$d->dump($variable, Dumper::STDERR);
```

Force dump to STDERR with color support:

```php
$d = new Spiral\Debug\Dumper($loggerInterface);
$d->setRenderer(Dumper::STDERR, new Spiral\Debug\Renderer\ConsoleRenderer());

$d->dump($variable, Dumper::STDERR);
```

## Notes
- component does not dump @internal properties
- use `__debugInfo()` to specify custom set of data to display

License:
--------
The MIT License (MIT). Please see [`LICENSE`](./LICENSE) for more information. Maintained by [SpiralScout](https://spiralscout.com).
