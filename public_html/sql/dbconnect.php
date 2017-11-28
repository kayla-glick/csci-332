<?php
$mysqli = new mysqli('127.0.0.1', 'kyleg382_csci332', 'password', 'kyleg382_csci332');
if ($mysqli->connect_errno) {
    echo "Error: Failed to make a MySQL connection, here is why: </br>";
    echo "Errno: " . $mysqli->connect_errno . "</br>";
    echo "Error: " . $mysqli->connect_error . "</br>";
    
    exit;
}
?>