<?php declare(strict_types=1);

namespace spagi\universe;

use ArrayObject;

class Mankind extends ArrayObject
{
    private $menCount = 0;
    private static $instance = null;

    private function __construct()
    {

    }

    public function addPerson(Person $person)
    {
        if ($person->isMan()) {
            $this->increaseMenCount();
        }
        parent::offsetSet($person->getId(), $person);
    }

    public function getMenCount(): int
    {
        return $this->menCount;
    }

    public function getMenCountInPercent(): float
    {
        if ($this->count() !== 0) {
            return 0.00;
        }

        return $this->getMenCount() / $this->count() * 100;
    }

    private function increaseMenCount(): void
    {
        $this->menCount++;
    }

    static public function getInstance(): self
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}