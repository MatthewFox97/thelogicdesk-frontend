<?php
$servername = "10.10.30.2";
$username = "root";
$password = "root";
$dbname = "thelogicdeskdb";
$objConnect = mysqli_connect($servername, $username, $password) or die("Error Connect to Database");
$objDB = mysqli_select_db($dbname);

// Create connection
$db = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
} 
?>