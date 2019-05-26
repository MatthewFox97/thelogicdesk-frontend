<?php 
include ("../config.php");
?>
<html>
<head>
<title>TheLogicDesk | Save</title></head>
<body>
<?php

$strSQL = "UPDATE tickets SET ";
$strSQL .="title = '".$_POST["txttitle"]."' ";
$strSQL .=",description = '".$_POST["txtdescription"]."' ";
$strSQL .=",contact_num = '".$_POST["txtcontact_num"]."' ";
$strSQL .="WHERE ticket_no = '".$_GET["ticketID"]."' ";
$objQuery = mysqli_query($db, $strSQL);
if($objQuery)
{
  header('location: create.php');
	echo "Changes made.";
}
else
{
	echo "Error Save [".$strSQL."]";
}
mysql_close($objConnect);
?>
</body>
</html>