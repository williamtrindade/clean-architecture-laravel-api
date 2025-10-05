<?php

namespace App\Entities;

use InvalidArgumentException;

final class Contact
{
    private ?int $id;
    private string $name;
    private string $phoneNumber;
    private string $email;

    public function __construct(?int $id, string $name, string $phoneNumber, string $email)
    {
        $this->id = $id;
        $this->setName($name);
        $this->setPhoneNumber($phoneNumber);
        $this->setEmail($email);
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }
    public function getEmail(): string
    {
        return $this->email;
    }

    public function setName(string $name): void
    {
        if (trim($name) === '') {
            throw new InvalidArgumentException('O nome nao pode estar vazio.');
        }
        $this->name = $name;
    }

    public function setPhoneNumber(string $phoneNumber): void
    {
        if (!preg_match('/^\+?[0-9]{8,15}$/', $phoneNumber)) {
            throw new InvalidArgumentException('Numero de telefone invalido.');
        }
        $this->phoneNumber = $phoneNumber;
    }

    public function setEmail(string $email): void
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('E-mail invalido.');
        }
        $this->email = $email;
    }
}
