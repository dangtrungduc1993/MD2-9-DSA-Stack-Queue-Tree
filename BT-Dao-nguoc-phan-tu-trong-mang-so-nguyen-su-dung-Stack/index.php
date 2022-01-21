<?php
$arr = [1,2,3,4,5,6,7,8];
$arr2 = [];
for ($i = count($arr) -1; $i >=0; $i--){
    array_push($arr2,$arr[$i]);
}
print_r($arr2);

