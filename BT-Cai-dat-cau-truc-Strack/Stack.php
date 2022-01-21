<?php

class Stack
{
    public $stack;
    public $limit;

    public function __construct($limit)
    {
        $this->stack = [];
        $this->limit = $limit;
    }

    public function isFull()
    {
        return count($this->stack) >= $this->limit;
    }
    public function isEmpty()
    {
        return count($this->stack) == 0;
    }

    public function push($data)
    {
        if (!$this->isFull()){
            array_unshift($this->stack,$data);
        }else{
            return " Mang da day";
        }

    }
    public function pop()
    {
        if (!$this->isEmpty()){
            array_shift($this->stack);
        }else{
            return " Mang trong";
        }
    }
    public function top()
    {
        if (!$this->isEmpty()){
            return $this->stack[0];
        }else{
            return " Mang trong";
        }
    }


}