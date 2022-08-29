<?php

namespace PabloSanches\ValueObjects\Tests\Documents;

use PabloSanches\ValueObjects\Document\CPF;
use PabloSanches\ValueObjects\Mask;
use PabloSanches\ValueObjects\Tests\AbstractTest;

class CPFTests extends AbstractTest
{
    public function testCreateCPF()
    {
        $number = $this->faker->cpf();
        $cpf = CPF::createFromString($number);
        self::assertInstanceOf(CPF::class, $cpf);
        self::assertEquals($number, $cpf->getNumber());
    }

    public function testCreateFromStringGetUnmasked()
    {
        $number = $this->faker->cpf();
        $cpf = CPF::createFromString($number);
        $unmasked = strtr($number, array(
            '-' => '',
            '.' => '',
            '/' => ''
        ));
        self::assertEquals($unmasked, $cpf->getUnmasked());
    }

    public function testToString()
    {
        $number = $this->faker->cpf();
        $cpf = new CPF($number);
        self::assertEquals($number, (string) $cpf);
    }

    public function testInvalidCpf()
    {
        $number = '123.456.789-10';
        $cpf = new CPF($number);
        self::assertFalse($cpf->isValid());
    }

    public function testValidCpf()
    {
        $number = $this->faker->cpf();
        $cpf = new CPF($number);
        self::assertTrue($cpf->isValid());
    }

    public function testCreateCPFRawNumber()
    {
        $number = $this->faker->cpf(false);
        $cpf = CPF::createFromString($number);
        self::assertInstanceOf(CPF::class, $cpf);
        self::assertEquals($number, $cpf->getNumber());
    }

    public function testCreateFromStringGetUnmaskedRawNumber()
    {
        $number = $this->faker->cpf(false);
        $cpf = CPF::createFromString($number);
        $unmasked = strtr($number, array(
            '-' => '',
            '.' => '',
            '/' => ''
        ));
        self::assertEquals($unmasked, $cpf->getUnmasked());
    }

    public function testToStringRawNumber()
    {
        $number = $this->faker->cpf(false);
        $cpf = new CPF($number);
        self::assertEquals($number, (string) $cpf);
    }

    public function testValidCpfRawNumber()
    {
        $number = $this->faker->cpf(false);
        $cpf = new CPF($number);
        self::assertTrue($cpf->isValid());
    }
}