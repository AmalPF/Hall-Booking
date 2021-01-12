<?php 

  $flag=0;

  if (isset($_POST['book_'])) {

    $sql_h2 = "SELECT * FROM bookings WHERE ((bdate='$bdate' AND hallno='$hallno') AND (('$stime'<=stime AND stime<'$etime') OR ('$stime'<etime AND etime<='$etime')) AND ((stime<='$stime' AND '$stime'<etime) OR (stime<'$etime' AND '$etime'<=etime)));";

  	if(!$res2 = $con->query($sql_h2))
      echo("<script>alert('Donot work');</script>");

  	if (mysqli_num_rows($res2) > 0) {
  	  $hall_error = "Booking not available!"; 
      $flag=0;
  	}else{
      $flag=1;
    }
  }

?>