<?php

session_start();

if(isset($_POST['login'])){
	$con = mysqli_connect("localhost","root","26091999","hall_booking");
	if (mysqli_connect_errno())
		die("\nFailed to connect to MySQL: ".mysqli_connect_error());

	$flag=0;
  	$qry = "SELECT * FROM admin;";
  	$result = mysqli_query($con,$qry);
  	$row = mysqli_fetch_all($result,MYSQLI_NUM);
  	for($i=0;$i<sizeof($row);$i++){
    	if($_POST['uname']==$row[$i][0]&&$_POST['psw']==$row[$i][1]){
      		$_SESSION['admin'] = true;
      		header("Location: admin1.php");
    	}
    }
  	echo("<script>alert('Invalid user name or password!');</script>");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 30%;
  border-radius: 50%;
  border: solid;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 1mm;
  margin-top: 0;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 40%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
<body>

<div id="id01" class="modal">
  
  <form class="modal-content animate" action="admin_login.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.location.href='admin1.php'" class="close" title="Close Modal">&times;</span>
      <img src="admin_img.png" alt="Admin" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Admin username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Admin Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
        
      <button type="submit" name="login">Login</button>
      <button style="background-color: #ffcc5c; color: black;" onclick="document.location.href='index.php'"><b>Goto home page</b></button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.location.href='admin1.php'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>

</body>
</html>