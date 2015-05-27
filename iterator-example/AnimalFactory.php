<?php

require_once 'IAnimal.php';
require_once 'Animals.php';

class AnimalFactory
{
    const DOG = 'dog';
    const CAT = 'cat';
    const COW = 'cow';
    const DUCK = 'duck';

    public static function getAnimal($animalName)
    {
        $result = null;

        switch ($animalName)
        {
            case self::DOG;
                $result = new Dog();
                break;

            case self::CAT;
                $result = new Cat();
                break;

            case self::COW;
                $result = new Cow();
                break;

            case self::DUCK;
                $result = new Duck();
                break;

            default:
                $result = null;
                break;
        }

        return $result;
    }
}