<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Lab5";
// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// create db if not exits
mysqli_query($conn , "CREATE DATABASE IF NOT EXISTS Lab5");
mysqli_select_db($conn, $dbname);
// echo "Connected successfully";

// create table if not exits
$sql = "
CREATE TABLE IF NOT EXISTS `users`  (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
);"
?> 