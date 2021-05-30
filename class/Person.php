<?php
declare(strict_types=1);

class Person
{
  public string $name;
  public string $surname;
  private array $customProperties = [];

  public function __construct(string $name, $surname)
  {
    $this->name = $name;
    $this->surname = $surname;
  }

  public function __set(string $name, mixed $value): void
  {
    $this->customProperties[$name] = $value;
  }

  public function __get(string $name): mixed
  {
    return $this->customProperties[$name] ?? null;
  }

  public function __isset(string $name): bool
  {
    return isset($this->customProperties[$name]);
  }

  public function __toString(): string
  {
    $info = "Hi, I'm $this->name $this->surname.";
    foreach ($this->customProperties as $propName => $propValue) {
      $info .= " My $propName: $propValue.";
    }
    return $info .= PHP_EOL;
  }
}