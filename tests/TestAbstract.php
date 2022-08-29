<?php

namespace PabloSanches\ValueObjects\Tests;

use PHPUnit\Framework\TestCase;

class TestAbstract extends TestCase
{
    protected $faker;

    public function setUp(): void
    {
        $this->faker = \Faker\Factory::create('pt_BR');

        parent::setUp();
    }

    protected static function onlyNumbers($string)
    {
        return preg_replace("/[^0-9]/", '', $string);
    }
}