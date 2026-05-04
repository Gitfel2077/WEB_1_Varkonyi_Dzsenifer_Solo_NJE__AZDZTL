<?php
$host = "localhost";       
$user = "root"; 
$pass = ""; 
$db   = "csv_db_6"; 

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>

//oszekotes pls mukodje