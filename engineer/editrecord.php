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
<th width="70"> <div align="center"> Ticket Status </div></th>

  </tr>
  <tr>
    <td><div align="center"><input type="text" name="txtticket_no" size="5" value="<?php echo $objResult["ticket_no"];?>"disabled></div></td>
    <td><input type="text" name="txttitle" size="20" value="<?php echo $objResult["title"];?>"disabled></td>
    <td><input type="text" name="txtdescription" size="20" value="<?php echo $objResult["description"];?>"disabled></td>
    <td><div align="center"><input type="text" name="txtcontact_num" size="20" value="<?php echo $objResult["contact_num"];?>"disabled></div></td>
    <td><div align="center"></div><select name="ticketstatus">
  <option value="complete">complete</option>
  <option value="open">open</option>
</select>
</td>    
  </tr>
  </table>
  <input type="submit" name="submit" value="submit">
  <?php
  }
  mysqli_close($objConnect);
  if(isset($_POST['submit'])){
    $selected_val = $_POST['ticketstatus'];  // Storing Selected Value In Variable
    }
  ?>
  </form>
  
</body>
</html>