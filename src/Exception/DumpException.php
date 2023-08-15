<?php

declare(strict_types=1);

namespace Spiral\Debug\Exception;

class DumpException extends \Exception
{
    /**
     * @var array<string>
     */
    private array $dumps = [];

    public function __construct(string $message = '', int $code = 500)
    {
        parent::__construct($message, $code);
    }

    public function addDump(string $dump): void
    {
        $this->dumps[] = $dump;
    }

    public function __toString(): string
    {
        return implode(\PHP_EOL, $this->dumps);
    }
}
