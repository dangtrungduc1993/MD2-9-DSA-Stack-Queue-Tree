<?php
include_once "Stack.php";
include_once "Queue.php";
$str = "abcddcba1";

function kiemTra($str){
    $stack = new Stack(strlen($str));
    $queue = new Queue();
    for ($i = 0; $i < strlen($str) ;$i++){
        $stack->push($str[$i]);
        $queue->enQueue($str[$i]);
    }
    for ($i = 0; $i < strlen($str) ;$i++){
        if ($stack->top() != $queue->deQueue()){
            return "Mang khong doi xung";
        }
    }
    return "Mang doi xung";
}
echo kiemTra($str);