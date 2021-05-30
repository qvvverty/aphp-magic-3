<?php
declare(strict_types=1);

include_once 'class/Person.php';
include_once 'class/PeopleList.php';

$person1 = new Person('Stanley', 'Sullivan');
$person1->age = 30;
$personSerialized = serialize($person1);
$personSerialized = str_replace("{s:3:\"age\";i:30;}", "{s:3:\"age\";i:35;}", $personSerialized);
$person1 = unserialize($personSerialized, ['allowed_classes'=>true]);
var_dump($person1);

$person2 = new Person('Samantha', 'Brown');
$person2->salary = 'enough';
$person3 = new Person('Peter', 'Smith');
$person3->pet = 'cat Fluffy';
$person4 = new Person('Sarah', 'Williams');
$crowd = new PeopleList();
$crowd->addPeople($person1, $person2, $person3, $person4);
foreach ($crowd as $person) {
  echo $person;
}
echo 'There are ' . count($crowd) . ' people in crowd.' . PHP_EOL;