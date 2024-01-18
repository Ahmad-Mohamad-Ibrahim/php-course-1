<?php
$students_arr = [
    "Sara" => 31,
    "John" => 41,
    "Walaa" => 39,
    "Ramy" => 40
];
// Asc by val
print(nl2br("Ascending sort by value : \n"));
// arsort(); //
asort($students_arr);
foreach($students_arr as $key=>$val) {
    print(nl2br("$key => $val\n"));
}
print(nl2br("\n"));

// Dsc by val
print(nl2br("Decending sort by value : \n"));
arsort($students_arr);
foreach($students_arr as $key=>$val) {
    print(nl2br("$key => $val\n"));
}
print(nl2br("\n"));

// Asc by key
print(nl2br("Ascending sort by key : \n"));
ksort($students_arr);
foreach($students_arr as $key=>$val) {
    print(nl2br("$key => $val\n"));
}
print(nl2br("\n"));

// Dsc by key
print(nl2br("\n"));
print(nl2br("Decending sort by key : \n"));
krsort($students_arr);
foreach($students_arr as $key=>$val) {
    print(nl2br("$key => $val\n"));
}



?>