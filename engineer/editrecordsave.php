<?php 
include ("../config.php");
?>
<html>
<head>
<title>TheLogicDesk | Save</title>
</head>
<body>
<?php
$strSQL = "UPDATE tickets SET ";
$strSQL .="status = '".$_POST["ticketstatus"]."' ";
$strSQL .="WHERE ticket_no = '".$_GET["ticketID"]."' ";
$objQuery = mysqli_query($db, $strSQL);
if($objQuery)
{
	header('location: tickets.php');
	echo "Change made.";
}
else
{
	echo "Error Save [".$strSQL."]";
}
mysqli_close($objConnect);
?>
</body>
</html>