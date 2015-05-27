<?php

require_once 'IAnimal.php';

class Dog implements IAnimal
{
    public function getName()
    {
        return 'dog';
    }

    public function says()
    {
        return 'bark';
    }
}

class Cat implements IAnimal
{
    public function getName()
    {
        return 'cat';
    }

    public function says()
    {
        return 'meow';
    }
}

class Cow implements IAnimal
{
    public function getName()
    {
        return 'cow';
    }

    public function says()
    {
        return 'moo';
    }
}

class Duck implements IAnimal
{
    public function getName()
    {
        return 'duck';
    }

    public function says()
    {
        return 'quack';
    }
}