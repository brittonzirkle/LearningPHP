<?php

require_once 'BaseList.php';
require_once 'Vehicle.php';

class VehicleList extends BaseList
{
    public function add($item)
    {
        if ($item instanceof Vehicle)
        {
            array_push($this->_listArray, $item);
        }
        else
        {
            throw new Exception('argument is not proper Vehicle item');
        }
    }
}