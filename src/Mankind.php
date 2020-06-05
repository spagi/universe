<?php declare(strict_types=1);

namespace spagi\universe;

use ArrayObject;

class Mankind extends ArrayObject
{
    private $menCount = 0;

    public function addPerson(Person $person)
    {
        parent::offsetSet($person->getId(), $person);
    }

    public function increaseMenCount(): void
    {
        $this->menCount++;
    }

    public function getMenCount(): int
    {
        return $this->menCount;
    }

    public function getMenCountInPercent(): float
    {
        return $this->getMenCount()/$this->count() * 100;
    }
}