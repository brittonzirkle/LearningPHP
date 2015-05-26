<?php

abstract class BaseList implements Iterator
{
    private $_position = 0;
    protected $_listArray = null;

    public function __construct()
    {
        $this->_listArray = array();
        $this->_position = 0;
    }

    public abstract function add($item);

    // required Iterator functions

    public function current()
    {
        return $this->_listArray[$this->_position];
    }

    public function next()
    {
        $this->_position += 1;
    }

    public function key()
    {
        return $this->_position;
    }

    public function valid()
    {
        return isset($this->_listArray[$this->_position]);
    }

    public function rewind()
    {
        $this->_position = 0;
    }
}