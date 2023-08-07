<?php

declare(strict_types=1);

namespace rr;

use Spiral\Debug\Exception\DumpException;
use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\HtmlDumper;

if (!\function_exists('\\rr\\dd')) {
    function dd(mixed ...$vars): never
    {
        $exception = new DumpException();
        $dumper = new HtmlDumper();

        foreach ($vars as $var) {
            $exception->addDump($dumper->dump((new VarCloner)->cloneVar($var), true));
        }

        throw $exception;
    }
}
