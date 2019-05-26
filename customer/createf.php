<?php

include ("../config.php");
include ('create.php');

$getusername = $_SESSION['user']['username'];
$strSQL = "INSERT INTO tickets(title,status,description,username,contact_num) 
VALUES('$_POST[title]','open','$_POST[description]','$getusername','$_POST[contact_num]')";

$objQuery = mysqli_query($db, $strSQL);

if ($objQuery) {
    header('Location: create.php');
    echo "New record created successfully";
} else {
    echo "Error: " . $strSQL . "<br>" . mysqli_error($objConnect);
}

mysqli_close($objConnect);
?>