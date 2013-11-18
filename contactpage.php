<!DOCTYPE html>
<html>

<head>
<title>Contact Page</title>
<link href="font.css" rel="stylesheet" type="text/css">

</head>

<body>

<div id="table">

Testing

<table border=1 style="font-family: arial, helvetica;">
	<thead>
		<tr>
			<th>Name</th>
			<th>Phone</th>
			<th>Email</th>
			<th>Position</th>
		</tr>
	</thead>
	<tbody>

<?php
	$db = mysql_connect("localhost", "root", "");
	mysql_select_db('TravelExperts') or die(mysql_error());

	$results = mysql_query("SELECT * FROM agents");

	while($row = mysql_fetch_assoc($results)) {
		echo "<tr>";
		echo "<td>" . $row['AgtFirstName'] . " " . $row['AgtLastName'] . "</td>";
		echo "<td>" . $row['AgtBusPhone'] . "</td>";
		echo "<td>" . $row['AgtEmail'] . "</td>";
		echo "<td>" . $row['AgtPosition'] . "</td>";
		echo "</tr>";
	}
?>
	</tbody>
</table>
</div>

</body>

</html>