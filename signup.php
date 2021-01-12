<?php

session_start();

// Create connection
$conn = new mysqli("localhost","root","","hall_booking");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// prepare and bind
$stmt1 = $conn->prepare("INSERT INTO users (`fname`,`mname`,`lname`,`uname`,`email`,`phone`,`password`) VALUES (?,?,?,?,?,?,?)");

$fname = $_POST['fname']; 
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$uname = $_POST['uname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$psw = $_POST['psw'];
$psw2 = $_POST['psw2'];

include('username_validation.php');

if($flag){
  $stmt1->bind_param("sssssss", $fname,$mname,$lname,$uname,$email,$phone,$psw);
  if($stmt1->execute()){
    $_SESSION['user'] = $uname;
    echo("<script>window.location.replace('index.php');</script>");
  }
}

$stmt1->close();
$conn->close(); 

?>

<head>
  <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="my_style.css">
<script type="text/javascript">
  
</script>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Full-width input fields */
input[type=text].text1{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=password].pass {
  width: 49.6%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

input[type=text].name {
  width: 33%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* Add a background color when the inputs get focus */
input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for all buttons */
button, .signupbtn {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover, .signupbtn:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.s_container {
  padding: 16px;
}

/* The Modal (background) */
.s_modal {
  display: bold; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: #474e5d;
  padding-top: 20px;
}

/* Modal Content/Box */
.s_modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* Style the horizontal ruler */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
 
/* The Close Button (x) */
.close {
  position: absolute;
  right: 35px;
  top: 15px;
  font-size: 40px;
  font-weight: bold;
  color: #f1f1f1;
}

.close:hover,
.close:focus {
  color: #f44336;
  cursor: pointer;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}

/*error styling*/
.form_error span {
  width: 80%;
  height: 35px;
  margin: 3%;
  font-size: 1.1em;
  color: #D83D5A;
  font-weight: bolder;
}
.form_error input {
  border: 1px solid #D83D5A;
  margin-bottom: 0px;
  border-bottom: 0px;
}
</style>
</head>

<body>

<div id="signup" class="s_modal">

    <form class="s_modal-content" method="POST" action="<?php echo($_SERVER['PHP_SELF']); ?>">
    <div class="s_container">
      <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
      <label for="name"><b>Name</b></label><br>
      <input class="name" type="text" placeholder="First Name" name="fname" value="<?php echo $fname; ?>" required>  
      <input class="name" type="text" placeholder="Middle Name" name="mname" value="<?php echo $mname; ?>"> 
      <input class="name" type="text" placeholder="Last Name" name="lname" value="<?php echo $lname; ?>">  

      <div <?php if (isset($name_error)): ?> class="form_error" <?php endif ?> >
      <label for="uname"><b>User Name</b></label><br>
      <input class="text1" type="text" placeholder="User Name" name="uname" value="<?php echo $uname; ?>" required>  
      <?php if (isset($name_error)): ?>
        <span><?php echo $name_error; ?></span><br><br>
      <?php endif ?>
      </div>

      <div <?php if (isset($email_error)): ?> class="form_error" <?php endif ?> >
      <label for="email"><b>Email</b></label>
      <input class="text1" type="text" placeholder="Enter Email" name="email" value="<?php echo $email; ?>" required>
      <?php if (isset($email_error)): ?>
        <span><?php echo $email_error; ?></span><br><br>
      <?php endif ?>
      </div>


      <label for="phone"><b>Phone Number</b></label>
      <input class="text1" type="text" placeholder="Enter Phone Number" name="phone" value="<?php echo $phone; ?>" required>

      <div <?php if (isset($psw_error)): ?> class="form_error" <?php endif ?> >
      <label for="psw"><b>Password</b></label><br>
      <input class="pass" type="password" placeholder="Enter Password" name="psw"  value="<?php echo $psw; ?>" required>
      <input class="pass" type="password" placeholder="Repeat Password" name="psw2" value="<?php echo $psw2; ?>" required>
      <?php if (isset($psw_error)): ?>
        <span><?php echo $psw_error; ?></span><br><br>
      <?php endif ?>
      </div>

      <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

      <div class="clearfix">
        <button onclick="window.history.go(-1);" class="cancelbtn">Cancel</button>
        <input type="submit" class="signupbtn" name="signup" value="Sign Up">
      </div>
    </div>
    </form>
</div>

</body>