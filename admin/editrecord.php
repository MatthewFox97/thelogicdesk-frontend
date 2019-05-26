<?php 
include ("../config.php");
?>
<html>
<head>
<title>TheLogicDesk | Edit</title>
</head>
<body>
<form action="editrecordsave.php?ticketID=<?php echo $_GET["ticketID"];?>" name="frmEdit" method="post">
<?php
$strSQL = "SELECT * FROM tickets WHERE ticket_no = '".$_GET["ticketID"]."' ";
$objQuery = mysqli_query($db, $strSQL);
$objResult = mysqli_fetch_array($objQuery);
if(!$objResult)
{
	echo "Did not find ticket_no=".$_GET["ticketID"];
}
else
{
?>
<table width="700" border="1">
  <tr>
<th width="91"> <div align="center">ticket_no. </div></th>
<th width="98"> <div align="center">title </div></th>
<th width="97"> <div align="center">description </div></th>
<th width="70"> <div align="center">contact number </div></th>
<th width="70"> <div align="center">Engineer</div></th>

  </tr>
  <tr>
    <td><div align="center"><input type="text" name="txtticket_no" size="5" value="<?php echo $objResult["ticket_no"];?>" disabled></div></td>
    <td><input type="text" name="txttitle" size="20" value="<?php echo $objResult["title"];?>" disabled></td>
    <td><input type="text" name="txtdescription" size="20" value="<?php echo $objResult["description"];?>" disabled></td>
    <td><div align="center"><input type="text" name="txtcontact_num" size="20" value="<?php echo $objResult["contact_num"];?>" disabled></div></td>
<?php
$result1 = $db->query("select username from users where user_type='engineer'");
    
    echo "<td style='padding: 15px; border-style: groove;'><select id='selectengineer' name='selectengineer'>";

    while ($row1 = $result1->fetch_assoc()) {

                  $username = $row1['username']; 
                  echo '<option value="'.$username.'">';
                  echo ($username);
                 
    }

    echo "</select></td>";  ?></tr>
  </table>
  <input type="submit" name="submitengineer" value="submit">

  <?php
  }
  mysql_close($objConnect);
  ?>
  </form>
  <?php if(isset($_POST['submitengineer'])){
    $selectOption = $_POST['selectengineer'];
    $updateticket= "UPDATE `tickets` SET `username` = '$selectOption'";

    if ($db->query($updateticket)){
        echo "inserted";
    }
    
      
}



?>
</body>
</html>