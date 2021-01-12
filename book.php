<?php

if($_SESSION['user']=="Guest"){
	$_SESSION['trigger']=true;
	header('Location: index.php');
}

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// prepare and bind
$stmt1 = $con->prepare("INSERT INTO bookings (`uname`, `hallno`, `bdate`, `stime`, `etime`, `event`) VALUES (?,?,?,?,?,?)");

$uname=$hallname=$hallno=$bdate=$stime=$etime=$event="";
$uname = $_SESSION['user'];
if(isset($_POST['book_'])){
	$hallno = $_POST['hallno']; 
	$sql5 = "SELECT hname FROM halls WHERE hid='$hallno'" ;
  	if($re = $con->query($sql5)){
  		$r = $re->fetch_assoc();
		$hallname = $r['hname'];
  	}
  	
	$bdate = $_POST['bdate'];
	$stime = $_POST['stime'];
	$etime = $_POST['etime'];
	$event = $_POST['event'];
}
include('hall_validation.php');

if($flag){
  $stmt1->bind_param("ssssss", $uname,$hallno,$bdate,$stime,$etime,$event);
  if($stmt1->execute()){
    echo("<script>alert('Successfully Booked the hall!');</script>");
    $uname=$hallname=$hallno=$bdate=$stime=$etime=$event="";
  	}
  }

$stmt1->close();
$con->close(); 
?>

<style type="text/css">

label{
	font-size: 20px;
	font-weight: bold;
}

.btn1{
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100px;
  opacity: 0.9;
}
input[type=reset]{
  background-color: #ffa500;
}
.btn1:hover {
  opacity:2;
}

.input1, input{
	width: 80%;
	padding: 10px;
	margin: 0;
	display: inline-block;
	border: none;
	background: #f1f1f1;
	font-weight: bold;
}

.cell{padding: 0px 0px;}

.cell th{
	width: 10px;
}

.tr1:hover {background-color: transparent;}

</style>

<div id="book" class="b_main">
	<p style="font-size: 30px;font-family:'Impact', fantasy;padding: 0 50px;">Book Halls</p><br>
	<form id="myForm" method="POST" action="<?php echo($_SERVER['PHP_SELF']); ?>">
	<div>
	<table class="table1" border="0" width="80%">
		<div class="id1">
		<tr class="tr1">
		<td class="cell"><span><label>Hall</label></span></th>
		<td class="cell"><select class="input1" name="hallno" form="myForm" value="<?php echo $hallno; ?>">
			<option value="0" selected>--Select Hall--</option>
<?php for($i=0; $i < sizeof($row); $i++){ 
	$hallno=$row[$i][0]; ?>
			<option value="<?php echo($hallno); ?>" <?php echo(($hallno==$_GET['hallno'])?'selected':''); ?>><?php echo($row[$i][1]); ?></option>
<?php } ?>
		</select></td>
		</tr>

		<tr class="tr1">
		<td class="cell"><span><label>Date</label></span></th>
		<td class="cell"><input type="date" name="bdate" min="<?php echo(date('Y-m-d',strtotime('+5 Days'))); ?>" max="<?php echo(date('Y-m-d',strtotime('+3 Months'))); ?>" value="<?php echo $bdate; ?>"></td>

		<tr class="tr1">
		<td class="cell"><span><label>Starting Time</label></span></th>
		<td class="cell"><input type="time" name="stime" min="08:30" max="16:30" value="<?php echo $stime; ?>"></td>

		<tr class="tr1">
		<td class="cell"><span><label>Ending Time</label></span></th>
		<td class="cell"><input type="time" name="etime" min="08:30" max="17:30" value="<?php echo $etime; ?>"></td>

		<tr class="tr1">
		<td class="cell"><span><label>Event</label></span></th>
		<td class="cell"><input class="input1" type="text" name="event" placeholder="Event Details" value="<?php echo $event; ?>" style="width: 80%;border-style: none;margin: 0;"></td>

		<tr class="tr1"><td height="10px;"></td></tr>

		<tr class="tr1">
		<td class="cell" align="right"><input class="btn1" type="submit" value="Book" name="book_"></td>
		<td class="cell"><input class="btn1" type="reset"></td>
		</div>
	</table>

		<div <?php if (isset($hall_error)): ?> class="form_error" <?php endif ?> >
		<?php if (isset($hall_error)): ?>
        	<span><?php echo $hall_error; ?></span><br><br>
      	<?php endif ?>
      	</div>

	</div>
	</form>
</div> 