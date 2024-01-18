<?php
    print(nl2br("Array(\n\n"));
    $counter = 1;
    foreach($_SERVER as $key=>$val) {
        print("$counter ");
        print(nl2br("$key => $val\n"));
        $counter++;
    }
    print(nl2br(")\n"));
?>