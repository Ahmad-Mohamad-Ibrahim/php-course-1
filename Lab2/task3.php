<?php
$arr = array();
$arr[0] = 12;
$arr[1] = 45;
$arr[2] = 10;
$arr[3] = 25;
$sum = array_sum($arr);
$avr = $sum / sizeof($arr);

print(nl2br("Array Sum is : $sum\n"));
print(nl2br("Array Aver is : $avr\n"));
print("Array before sorting : ");
foreach($arr as $val) {
    print("$val ");
}
print(nl2br("\n"));
rsort($arr);
print("Array after sorting : ");
foreach($arr as $val) {
    print("$val ");
}
?>