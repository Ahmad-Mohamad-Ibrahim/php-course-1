<?php
    $age = 10;

    // a comparison happens between true and each condition in order
    switch(true) {
        case ($age < 5):
            echo "Stay home <br>";
            break; 
        case ($age == 5):
            echo "Go to kindergarden <br>";
            break;
        case ($age > 5):
            echo "Go to grade school <br>";
            break;
    }


?>