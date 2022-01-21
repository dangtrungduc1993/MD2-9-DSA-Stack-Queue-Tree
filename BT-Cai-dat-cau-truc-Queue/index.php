<?php
include_once "Node.php";
include_once "Queue.php";
$queue = new Queue();


$queue->enqueue(5);
$queue->enqueue(6);
$queue->enqueue(7);
$queue->enqueue(8);
$queue->enqueue(9);
$queue->dequeue();
$queue->dequeue();
//print_r($queue);
$queue->top();
print_r($queue);



