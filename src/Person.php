<?php declare(strict_types=1);

namespace spagi\universe;
use DateTimeImmutable;
use spagi\universe\enums\Gender;

class Person
{
    private $id;
    private $name;
    private $lastName;
    private $gender;
    private $dateOfBirth;

    public function __construct(int $id, string $name, string $lastName, string $gender, DateTimeImmutable $dateOfBirth)
    {
        $this->id = $id;
        $this->name = $name;
        $this->lastName = $lastName;
        $this->gender = $gender;
        $this->dateOfBirth = $dateOfBirth;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function getDateOfBirth(): DateTimeImmutable
    {
        return $this->dateOfBirth;
    }

    public function getAgeInDays(): int
    {
        $now = new DateTimeImmutable('now');
        return (int)$this->dateOfBirth->diff($now, true)->format('%a');
    }

    public function isMan(): bool
    {
        $man = Gender::get(Gender::MAN);
        return $man->equalsValue($this->getGender());
    }
}