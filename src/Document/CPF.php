<?php

namespace PabloSanches\ValueObjects\Document;

use PabloSanches\ValueObjects\ValueObjectInterface;

final class CPF extends AbstractDocument implements ValueObjectInterface
{
    public static function createFromString(string $str): self
    {
        return new CPF($str);
    }

    public function isValid(): bool
    {
        $number = $this->getUnmasked();

        if (strlen($number) != 11) {
            return false;
        }

        if (preg_match('/(\d)\1{10}/', $number)) {
            return false;
        }

        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $number[$c] * (($t + 1) - $c);
            }

            $d = ((10 * $d) % 11) % 10;

            if ($number[$c] != $d) {
                return false;
            }
        }

        return true;
    }
}