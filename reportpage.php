<!DOCTYPE html>
<html>

<head>
<title>Report Page</title>
<link href="font.css" rel="stylesheet" type="text/css">
</head>

<body>

<div id="table"> 
<table border=1 style="font-family: arial, helvetica;">
	<thead>
		<tr>
			<th>Booking ID</th>
			<th>Itinerary Number</th>
			<th>Start</th>
			<th>End</th>
			<th>Description</th>
			<th>Destination</th>
			<th>Base Price</th>
			<th>Commission</th>
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
		echo "<td>" . $row['BookingDetailId'] . "</td>";
		echo "<td>" . $row['ItineraryNo'] . "</td>";
		echo "<td>" . $row['TripStart'] . "</td>";	
		echo "<td>" . $row['TripEnd'] . "</td>";
		echo "<td>" . $row['Description'] . "</td>";	
		echo "<td>" . $row['Destination'] . "</td>";
		echo "<td>" . $row['BasePrice'] . "</td>";	
		echo "<td>" . $row['AgencyCommission'] . "</td>";			
		echo "</tr>";
	}
?>

	</tbody>
</table>
</div>

</body>

</html>
