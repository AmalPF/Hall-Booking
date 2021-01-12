<?php

session_start();

if(isset($_POST['logout']))
	unset($_SESSION['admin']);

if(!isset($_SESSION['admin']))
  header('Location: admin_login.php');

include("upload.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<style type="text/css">
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 190px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 190px; /* Same as the width of the sidenav */
  font-size: 20px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

img{
	width: 60%;
	border-radius: 50%;
	display: block;
 	margin-left: auto;
 	margin-right: auto;
 	margin-top: 20px;
 	margin-bottom: 30px;
}

.logout{
	display: block;
	margin-left: auto;
	margin-right: auto;
	margin-top: 30px;
	width: auto;
	padding: 10px 18px;
	background-color: #f44336;
	color: white;
	font-weight: bolder;
	border: none;
}

.logout:hover{
	opacity: 0.9;
}

</style>
</head>
<body>

<div class="sidenav">
  <img src="admin.jpg">
  <a href="admin1.php">Add Hall</a>
  <a href="admin2.php">Edit Hall</a>
  <a href="admin3.php">Edit Users</a>
  <a href="admin4.php">Edit Bookings</a>
  <a href="admin5.php">Change Password</a>
  <form method="POST" action="admin1.php"><input class="logout" type="submit" name="logout" value="Logout"></form>
</div>

<div class="main">
  
  <div id="add_hall">
  	<h1>Add New Hall</h1><hr>
  	
  	<form action="admin1.php" method="post" enctype="multipart/form-data">
  		<label>Hall Name:</label>
  		<input type="text" name="hname"><br><br>
    	Select image to upload:
    	<input type="file" name="fileToUpload" id="fileToUpload"><br>
    	<input type="submit" value="Add Hall" name="submit">
		</form>
  </div>

</div>
</body>
</html>