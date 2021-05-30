<?php
declare(strict_types=1);

class PeopleList implements Countable, Iterator
{
  private array $list = [];
  private int $position = 0;

  public function addPeople(object ...$people): void
  {
    $this->list =  array_merge($this->list, $people);
  }

  public function count(): int
  {
    return count($this->list);
  }

  public function current(): object
  {
    return $this->list[$this->position];
  }

  public function next(): int
  {
    return ++$this->position;
  }

  public function key(): int
  {
    return $this->position;
  }

  public function valid(): bool
  {
    return isset($this->list[$this->position]);
  }

  public function rewind(): void
  {
    $this->position = 0;
  }
}