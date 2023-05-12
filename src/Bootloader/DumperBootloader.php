<?php

declare(strict_types=1);

namespace Spiral\Debug\Bootloader;

use Spiral\Boot\Bootloader\Bootloader;
use Spiral\Debug\HtmlDumper;
use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\CliDumper;
use Symfony\Component\VarDumper\Dumper\HtmlDumper as BaseHtmlDumper;
use Symfony\Component\VarDumper\VarDumper;

final class DumperBootloader extends Bootloader
{
    public function init(): void
    {
        if (($_SERVER['VAR_DUMPER_FORMAT'] ?? null) !== null) {
            return;
        }

        $htmlDumper = $this->makeHtmlDumper();
        $cliDumper = $this->makeCliDumper();
        $cliDumper->setColors(true);

        VarDumper::setHandler(static function (mixed $var) use ($htmlDumper, $cliDumper): void {
            $cloner = new VarCloner();
            if (\ob_get_level() > 0) {
                $htmlDumper->dump($cloner->cloneVar($var));
                return;
            }

            $cliDumper->dump($cloner->cloneVar($var));
        });
    }

    private function makeHtmlDumper(): BaseHtmlDumper
    {
        return new HtmlDumper(static function (string $line, int $depth, string $indentPad): void {
            if (-1 !== $depth) {
                echo \str_repeat($indentPad, $depth) . $line . "\n";
                return;
            }

            echo $line . "\n";
        });
    }

    private function makeCliDumper(): CliDumper
    {
        if (!\defined('STDERR')) {
            \define('STDERR', \fopen('php://stderr', 'wb'));
        }

        return new CliDumper(\STDERR);
    }
}