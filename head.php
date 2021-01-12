<?php

session_start();

$con = mysqli_connect("localhost","root","","hall_booking");
if (mysqli_connect_errno())
  die("\nFailed to connect to MySQL: ".mysqli_connect_error());

if(isset($_POST['logout'])){
	session_destroy();
	$_SESSION["user"]="Guest";
}

if(isset($_POST['login'])){
  $flag=0;
  $qry2 = "SELECT * FROM users;";
  $result2 = mysqli_query($con,$qry2);
  $row2 = mysqli_fetch_all($result2,MYSQLI_NUM);
  for($i=0;$i<sizeof($row2);$i++)
    if($_POST['name']==$row2[$i][4]&&$_POST['password']==$row2[$i][7]){
      $_SESSION['user'] = $_POST['name'];
      $flag=1;
    }
  if($flag==0)
    echo("<script>alert('Invalid user name or password!');</script>");
}
if(!isset($_SESSION['user']))
	$_SESSION['user']="Guest";

?>

<head>
	<script type="text/javascript">
		function invalid(){
      document.getElementById('id01').style.display='block';
      document.getElementById("error").innerHTML = "Invalid User name or Password!";
    }
	</script>
	<link rel="stylesheet" type="text/css" href="my_style.css">

<style>
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
.h_button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

.h_button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.h_cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.h_imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.h_avatar {
  width: 20%;
  border-radius: 50%;
}

.h_container {
  padding: 16px;
  width: auto;
}

span.h_psw {
  float: right;
  padding-top: 10px 10px;
}

/* The Modal (background) */
.h_modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: .1%;
}

/* Modal Content/Box */
.h_modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 40%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.h_close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.h_close:hover,
.h_close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.h_animate {
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
  span.h_psw {
     display: block;
     float: none;
  }
  .h_cancelbtn {
     width: 100%;
  }
}

/*menu styles*/
ul {
  font-family: sans-serif;
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 15px 20px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #4CAF50;
}
	</style>
</head>

<body style="margin:0;padding:0;border: 0;">
<div style="height:150px;margin:0;background: linear-gradient(to bottom right, #ffff00 0%, #ff9900 90%);">
	<div style="padding: 10 10 10 10;">
		<!--<img src="logo.png" alt="Image Error!" width="50" height="40">-->
		<h1>Hall Booking</h1>
	</div>
	<div>
    <div class="myDIV" style="font-size: 18px;">
		<ul> 
			<li><a href="index.php"><b>Home</b></a></li>
			<li><a href="booking.php"><b>Booking</b></a></li>
      <li><a href="contacts.php"><b>Contact Us</b></a></li>

<li style="float:right;"><button id="login" class="h_cancelbtn h_button" onclick="document.getElementById('id01').style.display='block'" style="width:auto;margin: 8 8 8 0; background-color: #23b81f;"><b>Login</b></button>
<form style="margin: 0 0 0 0;" method="post" action="<?php echo($_SERVER['PHP_SELF']); ?>">
  <button class="h_cancelbtn h_button" id="logout" type="submit" name="logout" style="width:auto; display: none;margin: 8 8 8 0;"><b>Logout</b></button>
</form>
</li>
<li style="float:right;color: yellow;margin: 15 20 10 5;"><?php echo($_SESSION['user']); ?></li>
<li style="float:right;margin: 10 0 5 0;"><img style="border-radius: 50%;width: 30px;height: 30px;" src="login3.jpg"></li>
    </div>

<div id="id01" class="h_modal">
  
  <form class="h_modal-content h_animate" action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post">
    <div class="h_imgcontainer">
      <span class="h_close" onclick="document.getElementById('id01').style.display='none'" title="Close Modal">&times;</span>
      <img src="img_avatar2.png" alt="Avatar" class="h_avatar">
    </div>

    <div class="h_container">
      <p id="error" style="color:red"></p>
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="name" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>
      <span class="h_psw">Forgot <a href="#">password?</a></span>  

      <button class="h_button" type="submit" name="login" onclick="document.getElementById('login').style.display='none';document.getElementById('logout').style.display='block';">Login</button>
      <button style="background-color: #034f84" class="h_button" name="admin" onclick="document.location.href='admin1.php'">Admin Login</button>
    </div>

    <div class="h_container" style="background-color:#f1f1f1">
      <button onclick="document.getElementById('id01').style.display='none'" class="h_cancelbtn h_button">Cancel</button>
  </form>

		<button class="h_cancelbtn h_button" style="width:auto; float: right; background-color: orange;" onclick="document.getElementById('id01').style.display='none';window.location.href='signup.php'">SignUp</button>
    </div>
</div>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

</script>

</body>


<?php

if($_SESSION['user'] == "Guest"){
	echo'<script>document.getElementById("login").style.display = "block";
			document.getElementById("logout").style.display = "none";</script>';
}else{
	echo'<script>document.getElementById("login").style.display = "none";
			document.getElementById("logout").style.display = "block";</script>';
}
if(isset($_SESSION['trigger'])){
  unset($_SESSION['trigger']);
  echo"<script>document.getElementById('id01').style.display='block'</script>";
}

?>