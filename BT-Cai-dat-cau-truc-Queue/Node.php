<?php

class Node
{
    public $value;
    public $next;

    function __construct($value)
    {
        $this->value = $value;
        $this->next = null;
    }

    function readNode()
    {
        return $this->value;
    }
}