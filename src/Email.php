<?php

namespace PabloSanches\ValueObjects;

final class Email implements ValueObjectInterface
{
    private string $email;

    public function __construct($email)
    {
        $this->email = filter_var($email, FILTER_SANITIZE_EMAIL);
    }

    public static function createFromString(string $str): self
    {
        return new Email($str);
    }

    public function __toString(): string
    {
        return $this->email;
    }

    public function isValid(): bool
    {
        returN filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }
}