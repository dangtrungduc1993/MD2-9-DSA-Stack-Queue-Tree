<?php
include_once "Stack.php";
function convert($number)
{
    $phanDu = $number % 2;
    $thuong = floor($number / 2);
    $stack = new Stack(100);
    while ($thuong > 0) {
        $stack->push($phanDu);
        $phanDu = $thuong % 2;
        $thuong = floor($thuong / 2);
        if ($thuong==0){
            $stack->push(1);
        }
    }
    return implode($stack->getStacks()) ;
}
echo convert(8);