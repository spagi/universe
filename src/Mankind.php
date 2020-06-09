<?php declare(strict_types=1);

namespace spagi\universe;

class Mankind implements \Countable, \Iterator, \ArrayAccess
{
    private $menCount = 0;
    private $values = [];
    private $position = 0;

    private static $instance = null;

    private function __construct() { }

    public function addPerson(Person $person)
    {
        if ($person->isMan()) {
            $this->increaseMenCount();
        }
        $this->offsetSet($person->getId(), $person);
    }

    public function getMenCount(): int
    {
        return $this->menCount;
    }

    public function getMenCountInPercent(): float
    {
        if ($this->count() === 0) {
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

    public function current(): Person
    {
        return $this->values[$this->position];
    }

    public function next(): int
    {
        return $this->position++;
    }

    public function key(): int
    {
        return $this->position;
    }

    public function valid(): bool
    {
        return isset($this->values[$this->position]);
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function offsetExists($offset): bool
    {
        return isset($this->values[$offset]);
    }

    public function offsetGet($offset): Person
    {
        return $this->values[$offset];
    }

    public function offsetSet($offset, $value): void
    {
        if (empty($offset)) {
            $this->values[] = $value;
        } else {
            $this->values[$offset] = $value;
        }
    }

    public function offsetUnset($offset): void
    {
        unset($this->values[$offset]);
    }

    public function count(): int
    {
        return count($this->values);
    }
}