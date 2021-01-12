<?php

session_start();

if(isset($_POST['logout']))
	unset($_SESSION['admin']);

if(!isset($_SESSION['admin']))
  header('Location: admin_login.php');

$con = mysqli_connect("localhost","root","26091999","hall_booking");
if (mysqli_connect_errno())
  die("\nFailed to connect to MySQL: ".mysqli_connect_error());
$qry = "SELECT * FROM halls";
$result = mysqli_query($con,$qry);
$row = mysqli_fetch_all($result,MYSQLI_NUM);
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

.main td,th,table{
  padding-left: 10;
  padding-right: 10;
  text-align: center;
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
  <form method="POST" action="admin2.php"><input class="logout" type="submit" name="logout" value="Logout"></form>
</div>

<div class="main">
  <h1>Edit Halls</h1><hr>
  <table border="5" style="font-family: 'Lato', sans-serif;">
    <tr>
      <th>Hall ID</th>
      <th>Hall Name</th>
      <th>Hall Image</th>
      <th>Action</th>
    </tr>
<?php for($i=0; $i < sizeof($row); $i++){?>
      <tr>
        <td><?php echo($row[$i][0]); ?></td>
        <td><?php echo($row[$i][1]); ?></td>
        <td><img style="border-radius: 0;" src="<?php echo('halls/'.$row[$i][2]); ?>"></td>
        <td><button>Remove</button></td>
      </tr>
<?php } ?>
  </table>

</div>
</body>
</html>