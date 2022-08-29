<?php

namespace PabloSanches\ValueObjects;

interface ValueObjectInterface
{
    public function __toString(): string;

    public static function createFromString(string $str): self;
}