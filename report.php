<?php 
	include "ui/header.php";
<div id='content'>
<table border=1 style="font-family: arial, helvetica;">
	<thead>
		<tr>
			<th>Start</th>
			<th>End</th>
			<th>Description</th>
			<th>Base Price</th>
			
		</tr>
	</thead>
	<tbody>
	
<?php
	$db = mysql_connect("localhost", "root", "");
	mysql_select_db('travelexperts') or die(mysql_error());
	//echo 'Testing';
	$results = mysql_query("SELECT * FROM bookingdetails");

	while($row = mysql_fetch_assoc($results)) {
		echo "<tr>";
		//echo "<td>" . $row['BookingDetailId'] . "</td>";
		//echo "<td>" . $row['ItineraryNo'] . "</td>";
		echo "<td>" . $row['TripStart'] . "</td>";	
		echo "<td>" . $row['TripEnd'] . "</td>";
		echo "<td>" . $row['Description'] . "</td>";	
		//echo "<td>" . $row['Destination'] . "</td>";
		echo "<td>" . $row['BasePrice'] . "</td>";	
		//echo "<td>" . $row['AgencyCommission'] . "</td>";			
		echo "</tr>";
	}
?>

	</tbody>
</table>
</div>
<?php include "ui/footer.php";?>
