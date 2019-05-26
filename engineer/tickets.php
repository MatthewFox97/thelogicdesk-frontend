<?php 
include('../functions.php');
include('../config.php');

if (!isEngineer()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: ../login.php");
}
?>

<!DOCTYPE html>
<html>
<title>TheLogicDesk | Ticket's</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-left">TheLogicDesk</span>
  <a class="w3-bar-item w3-right" href="home.php?logout='1'" style="color: red;">logout</a>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
    </div>
    <div class="w3-col s8 w3-bar">
    <?php  if (isset($_SESSION['user'])) : ?>
					<strong>Welcome, <?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
					</small>

				<?php endif ?>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="tickets.php" class="w3-bar-item w3-button w3-padding"></i> Assigned Tickets</a>
    <a href="history.php" class="w3-bar-item w3-button w3-padding"></i> Ticket history</a>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>


<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

<!-- Header -->
<header class="w3-container" style="padding-top:22px">
    <h5><b></i> Your assigned ticket's </b></h5>
  </header>
  <body>
<?php
$getusername = $_SESSION['user']['username'];
$strSQL = "SELECT * FROM tickets where username='$getusername' and status='open' ";
$objQuery = mysqli_query($db, $strSQL) or die ("Error Query [".$strSQL."]");
?>
<table width="700" border="1">
<tr>
<th width="91"> <div align="center">ticket_no. </div></th>
<th width="98"> <div align="center">title </div></th>
<th width="97"> <div align="center">description </div></th>
<th width="30"> <div align="center">contact number </div></th>
<th width="30"> <div align="center"> Ticket status </div></th>
<th width="30"> <div align="center">Change Ticket Status </div></th>

</tr>
<?php
while($objResult = mysqli_fetch_array($objQuery))
{
?>
<tr>
<td><div align="center"><?php echo $objResult["ticket_no"];?></div></td>
<td><?php echo $objResult["title"];?></td>
<td><?php echo $objResult["description"];?></td>
<td><div align="center"><?php echo $objResult["contact_num"];?></div></td>
<td><div align="center"><?php echo $objResult["status"];?></div></td>
<td align="center"><a href="editrecord.php?ticketID=<?php echo $objResult["ticket_no"];?>">Change Status</a></td>
</tr>
<?php
}
?>
</table>
<?php
mysqli_close($objConnect);
?>
</body>
</div>

<script>

</body>
</html>
