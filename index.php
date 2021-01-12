<?php
include("head.php");
$qry1 = "SELECT * FROM halls";
$result1 = mysqli_query($con,$qry1);
$row1 = mysqli_fetch_all($result1,MYSQLI_NUM);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
	<link rel="stylesheet" type="text/css" href="my_style.css">
	<script type="text/javascript" src="my_script.js"></script>
</head>

<style>
.i_container {
  position: relative;
  width: 100%;
  background-color: white;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  margin-bottom: 25px;
}

.i_image {
  opacity: 1;
  transition: .5s ease;
  backface-visibility: hidden;
}

.i_middle{
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%)
}

.i_container:hover .i_image {
  opacity: 0.3;
}

.i_container:hover .i_middle {
  opacity: 1;
}

.i_button {
  background-color: #23b81f;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

.i_button:hover {
  opacity: 0.8;
}

/* gallary styling */

div.desc {
  padding: 20px;
  text-align: center;
  border: 1px solid #ccc;
  margin: 0px;
}

.responsive {
  padding: 20px 6px;
  float: left;
  width: 31.99999%;
}

@media only screen and (max-width: 700px) {
  .responsive {
    width: 49.99999%;
    margin: 6px 6px;
  }
}

td,th{
    padding: 5px 15px;";
  }

</style>

<body>

<div style="padding:10 10;">
  <div style="padding: 0 10;font-family:Cambria;font-weight: bolder;font-size: 20px;margin: 0;">
	    <h1>HALLS</h1>
	</div>


<?php
  for($i=0; $i < sizeof($row1); $i++){
    $img_location = "halls/".$row1[$i][2];
    $img_name = $row1[$i][1];
?>

  <div style="box-sizing: border-box;">
	  <div class="responsive">
      <div class="i_container">
  		  <img class="i_image" src="<?php echo($img_location); ?>" alt="<?php echo($img_name); ?>" style="width:100%">
        <div class="desc" style="font-size: 30; font-family: Impact, fantasy;"><?php echo($img_name); ?></div>
        <div class="i_middle">
    		  <button class="i_button" onclick="window.location.href='booking.php?hallno=<?php echo($row1[$i][0]); ?>'"><b>BOOK<b></button>  
        </div>
      </div>
    </div>
  </div>
<?php } 
?>

</div>

<div style="width: 800px;height: 300px;padding-left: 50px;font-family: 'Lato', sans-serif;">
<?php include('allbookings.php'); ?>
</div>

</body>
</html>

