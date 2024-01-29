<?php

include 'db.php';
$sql = "DELETE FROM users WHERE id = " . $_GET["userId"];
$ret = mysqli_query($conn, $sql);
if(!$ret) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_close($conn);

header("Location: ./index.php");
die;

    
?>