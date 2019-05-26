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
$strSQL .="username = '".$_POST["selectengineer"]."' ";
$strSQL .="WHERE ticket_no = '".$_GET["ticketID"]."' ";
$objQuery = mysqli_query($db, $strSQL);
if($objQuery)
{
  header('location: assign.php');
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