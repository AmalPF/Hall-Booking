<?php 

  $flag=0;

  if (isset($_POST['signup'])) {

  	$sql_u = "SELECT * FROM users WHERE uname='$uname'";
  	$sql_e = "SELECT * FROM users WHERE email='$email'";
  	$res_u = $conn->query($sql_u);
  	$res_e = $conn->query($sql_e);

  	if (mysqli_num_rows($res_u) > 0) {
  	  $name_error = "Sorry... username already taken!"; 
      $flag=0;
  	}else if(mysqli_num_rows($res_e) > 0){
  	  $email_error = "Sorry... email already taken!"; 	
      $flag=0;
  	}else if($psw!=$psw2){
      $psw_error = "Please repeat the password correctly!";
      $psw2="";
      $flag = 0;
    }else if(strlen($psw)<8){
      $psw_error = "Please enter a password with minimum 8 characters!";
      $flag = 0;
    }else
      $flag=1;
  }

?>