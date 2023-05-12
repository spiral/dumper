<?php

declare(strict_types=1);

namespace Spiral\Debug;

use Symfony\Component\VarDumper\Cloner\Data;
use Symfony\Component\VarDumper\Dumper\HtmlDumper as BaseHtmlDumper;

final class HtmlDumper extends BaseHtmlDumper
{
    public function dump(Data $data, $output = null, array $extraDisplayOptions = []): ?string
    {
        $this->headerIsDumped = false;
        return parent::dump($data, $output, $extraDisplayOptions);
    }
}