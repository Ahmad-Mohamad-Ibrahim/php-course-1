<?php
    // Server info 
    print ("Server Name is : " . $_SERVER["SERVER_NAME"] . "<br>");
    print ("Server Address is : " . $_SERVER["SERVER_ADDR"] . "<br>");
    print ("Server Port is : " . $_SERVER["SERVER_PORT"] . "<br>");

    // File info
    print ("Filename is : " . basename(__FILE__) .  "<br>" );
    print ("Path of script is : " .__FILE__ . "<br>" );
?>