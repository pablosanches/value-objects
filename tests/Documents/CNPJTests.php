<?php

namespace PabloSanches\ValueObjects\Tests\Documents;

use PabloSanches\ValueObjects\Document\CNPJ;
use PabloSanches\ValueObjects\Tests\TestAbstract;

class CNPJTests extends TestAbstract
{
    public function testCreateCPF()
    {
        $number = $this->faker->cnpj();
        $cpf = CNPJ::createFromString($number);
        self::assertInstanceOf(CNPJ::class, $cpf);
        self::assertEquals($number, $cpf->getNumber());
    }

    public function testCreateFromStringGetUnmasked()
    {
        $number = $this->faker->cnpj();
        $cpf = CNPJ::createFromString($number);
        $unmasked = strtr($number, array(
            '-' => '',
            '.' => '',
            '/' => ''
        ));
        self::assertEquals($unmasked, $cpf->getUnmasked());
    }

    public function testToString()
    {
        $number = $this->faker->cnpj();
        $cpf = new CNPJ($number);
        self::assertEquals($number, (string) $cpf);
    }

    public function testInvalidCpf()
    {
        $number = '123.456.789-10';
        $cpf = new CNPJ($number);
        self::assertFalse($cpf->isValid());
    }

    public function testValidCpf()
    {
        $number = $this->faker->cnpj();
        $cpf = new CNPJ($number);
        self::assertTrue($cpf->isValid());
    }

    public function testCreateCPFRawNumber()
    {
        $number = $this->faker->cnpj(false);
        $cpf = CNPJ::createFromString($number);
        self::assertInstanceOf(CNPJ::class, $cpf);
        self::assertEquals($number, $cpf->getNumber());
    }

    public function testCreateFromStringGetUnmaskedRawNumber()
    {
        $number = $this->faker->cnpj(false);
        $cpf = CNPJ::createFromString($number);
        $unmasked = strtr($number, array(
            '-' => '',
            '.' => '',
            '/' => ''
        ));
        self::assertEquals($unmasked, $cpf->getUnmasked());
    }

    public function testToStringRawNumber()
    {
        $number = $this->faker->cnpj(false);
        $cpf = new CNPJ($number);
        self::assertEquals($number, (string) $cpf);
    }

    public function testValidCpfRawNumber()
    {
        $number = $this->faker->cnpj(false);
        $cpf = new CNPJ($number);
        self::assertTrue($cpf->isValid());
    }
}