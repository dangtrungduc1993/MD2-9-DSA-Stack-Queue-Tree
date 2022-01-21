<?php
include_once "Stack.php";

$stack = new Stack(5);
$stack->push(1);
$stack->push(2);
$stack->push(3);
$stack->push(4);
$stack->push(5);
print_r($stack);
echo  "<br>";
$stack->pop();
$stack->pop();
$stack->pop();
print_r($stack);
echo  "<br>";
$stack->push(8);
$stack->push(9);
print_r($stack);
echo  "<br>";
$stack->isEmpty();
print_r($stack) ;
echo  "<br>";
$stack->pop();
$stack->pop();
$stack->pop();
$stack->pop();
$stack->isEmpty();
print_r($stack) ;







