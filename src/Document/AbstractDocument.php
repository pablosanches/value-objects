<?php

namespace PabloSanches\ValueObjects\Document;

use PabloSanches\ValueObjects\Mask;

abstract class AbstractDocument
{
    private string $number;

    public function __construct(string $number)
    {
        $this->number = $number;
    }

    public function __toString(): string
    {
        return $this->number;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function getUnmasked(): string
    {
        return strtr($this->number, array(
            '.' => '',
            '-' => '',
            '/' => ''
        ));
    }
}