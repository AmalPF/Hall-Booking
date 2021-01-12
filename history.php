<?php
$qry3 = "SELECT * FROM bookings WHERE bdate<CURDATE() ORDER BY bdate DESC, stime";
$result3 = mysqli_query($con,$qry3);
$row3 = mysqli_fetch_all($result3,MYSQLI_NUM);
?>

<div id="history" class="b_main">
	<table border="5" style="font-family: 'Lato', sans-serif;">
		<caption style="text-align: center;font-size: 20px;padding: 10 10;"><b>Old Bookings<b></caption>
		<tr>
			<th>Date</th>
			<th>Starting Time</th>
			<th>Ending Time</th>
			<th>Hall</th>
			<th>Event</th>
			<th>Booked by</th>
		</tr>
<?php for($i=0; $i < sizeof($row3); $i++){
	for($j=0; $j<sizeof($row4); $j++)
		if($row4[$j][0]==$row3[$i][2])
			$hall_name = $row4[$j][1];?>
    	<tr>
    		<td><?php echo($row3[$i][3]); ?></td>
    		<td><?php echo($row3[$i][4]); ?></td>
    		<td><?php echo($row3[$i][5]); ?></td>
    		<td><?php echo($hall_name); ?></td>
    		<td><?php echo($row3[$i][6]); ?></td>
    		<td><?php echo($row3[$i][1]); ?></td>
    	</tr>
<?php } ?>
	</table>
</div>