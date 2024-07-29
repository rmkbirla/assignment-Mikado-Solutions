<?php

$username = "root";
$password = "password"; 
$dbname = "mysql";


// Create connection
$conn = new mysqli('127.17.0.2', $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Your code here..

?>
