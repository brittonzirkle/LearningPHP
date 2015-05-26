<?php

class Vehicle
{
    protected $_make = '';
    protected $_model = '';
    
    public function __construct() 
    {
        $this->_make = '';
        $this->_model = '';
    }

    public function getMake()
    {
        return $this->_make;
    }

    public function setMake($make)
    {
        $this->_make = $make;
    }

    public function getModel()
    {
        return $this->_model;
    }

    public function setModel($model)
    {
        $this->_model = $model;
    }
}