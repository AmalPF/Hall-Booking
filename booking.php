<?php
include("head.php");

$qry1 = "SELECT * FROM halls";
$result = mysqli_query($con,$qry1);
$row = mysqli_fetch_all($result,MYSQLI_NUM);
if(!isset($_GET['hallno']))
	$_GET['hallno']="0";

$qry4 = "SELECT * FROM halls";
$result4 = mysqli_query($con,$qry4);
$row4 = mysqli_fetch_all($result4,MYSQLI_NUM);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booking</title>
	<link rel="stylesheet" type="text/css" href="my_style.css">
	
<style type="text/css">

.b_main {
  margin-left: 140px; /* Same width as the sidebar + left position in px */
  font-size: 28px; /* Increased text to enable scrolling */
  padding: 20px 20px;
}
.sidenav {
  font-family: "Lato", sans-serif;
  height: 200%;
  width: 140px;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
  float: left;
}

.sidenav a {
  padding: 6px 8px 6px 10px;
  text-decoration: none;
  font-size: 18px;
  color: #818181;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
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

tr{
  text-align: center;
}
td,th{
  padding: 15px 15px;
}
tr:hover {background-color:#f5f5f5;}

	</style>
</head>
<body style="float: left;">

<div class="sidenav">
  <a class="a1" href="#" onclick="display_book(1);">Book</a>
  <a class="a2" href="#" onclick="display_book(2);">Bookings</a>
  <a class="a3" href="#" onclick="display_book(3);">Old Bookings</a>
  <a class="a4" href="#" onclick="display_book(4);">My bookings</a>
</div>

<div>

<?php 
include('mybookings.php');
include('history.php');
include('allbookings.php');
include('book.php');
?>
   
</div>

	<script type="text/javascript">
		var opt=0;
		function display_book(opt){
			document.getElementById('book').style.display='none';
			document.getElementById('allbookings').style.display='none';
			document.getElementById('history').style.display='none';
			document.getElementById('mybookings').style.display='none';
			switch(opt){
				case 1: document.getElementById('book').style.display='block';
						break;
				case 2: document.getElementById('allbookings').style.display='block';
						break;
				case 3: document.getElementById('history').style.display='block';
						break;
				case 4: document.getElementById('mybookings').style.display='block';
						break;
			}
		}
		display_book(1);
	</script>

</body>
</html>

<?php
include("footer.html");
?>