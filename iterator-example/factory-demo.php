<?php

require_once 'AnimalList.php';
require_once 'AnimalFactory.php';

$animalList = new AnimalList();
$animalList->add(AnimalFactory::getAnimal(AnimalFactory::DOG));
$animalList->add(AnimalFactory::getAnimal(AnimalFactory::CAT));
$animalList->add(AnimalFactory::getAnimal(AnimalFactory::COW));
$animalList->add(AnimalFactory::getAnimal(AnimalFactory::DUCK));

foreach ($animalList as $animal)
{
    echo "The {$animal->getName()} says {$animal->says()}<br>";
} 