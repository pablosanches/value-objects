# valueo-objects
A PHP library to provide some Value Objects.

### Installation
```sh
composer require pablosanches/value-objects
```

### Usage

#### CPF
```php
use PabloSanches\ValueObjects\Document\CPF;

$cpf = CPF::createFromString('123.456.789-10'); // or $cpf = new CPF('123.456.789-10');
if ($cpf->isValid()) {
    echo $cpf->getNumber(); // '123.456.789-10'
    echo $cpf->getNumber(); // '12345678910'
    echo (string) $cpf; // '123.456.789-10'
}
```
#### CNPJ
```php
use PabloSanches\ValueObjects\Document\CNPJ;

$cnpj = CNPJ::createFromString('12.345.678/0001-10'); // or $cnpj = new CNPJ('12.345.678/0001-10');
if ($cnpj->isValid()) {
    echo $cnpj->getNumber(); // '12.345.678/0001-10'
    echo $cnpj->getNumber(); // '12345678000110'
    echo (string) $cnpj; // '12.345.678/0001-10'
}
```
#### EMAIL
```php
use PabloSanches\ValueObjects\Email;
$email = Email::createFromString('sanches.webmaster@gmail.com'); // or $email = new Email('sanches.webmaster@gmail.com');
if ($email->isValid()) {
    echo (string) $email; // sanches.webmaster@gmail.com
}
```