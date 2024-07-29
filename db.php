<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "product_db";
$port = 3306; // This should be an integer

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



// Your code here...


?>
