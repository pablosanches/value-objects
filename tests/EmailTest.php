<?php

namespace PabloSanches\ValueObjects\Tests;

use PabloSanches\ValueObjects\Email;

class EmailTest extends TestAbstract
{
    public function testCreateEmailFromString()
    {
        $emailStr = $this->faker->email();
        $email = Email::createFromString($emailStr);
        self::assertInstanceOf(Email::class, $email);
        self::assertEquals($emailStr, (string) $email);
    }

    public function testCreateByInstance()
    {
        $emailStr = $this->faker->email();
        $email = new Email($emailStr);
        self::assertInstanceOf(Email::class, $email);
        self::assertEquals($emailStr, (string) $email);
    }

    public function testInvalidEmail()
    {
        $invalidEmail = 'invalidemail.com';
        $email = Email::createFromString($invalidEmail);
        self::assertFalse($email->isValid());
    }

    public function testValidEmail()
    {
        $validEmail = $this->faker->email();
        $email = Email::createFromString($validEmail);
        self::assertTrue($email->isValid());
    }
}