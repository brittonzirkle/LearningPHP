<?php

require_once 'BaseList.php';
require_once 'IAnimal.php';

class AnimalList extends BaseList
{
    public function add($item)
    {
        if ($item instanceof IAnimal)
        {
            array_push($this->_listArray, $item);
        }
        else
        {
            throw new Exception('Argument is not instance of IAnimal');
        }
    }
}