<!DOCTYPE html>
<html>

<head>
<title>Contact Page</title>
</head>

<body>

<table border=1>
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Phone</th>
			<th>Email</th>
			<th>Position</th>
			<th>Agency ID</th>
		</tr>
	</thead>
	<tbody>
</div>
<?php
	$db = mysql_connect("localhost", "root", "");
	mysql_select_db('travelexperts') or die(mysql_error());

	$results = mysql_query("SELECT * FROM agents");

	while($row = mysql_fetch_assoc($results)) {
		echo "<tr>";
		echo "<td>" . $row['AgentId'] . "</td>";
		echo "<td>" . $row['AgtFirstName'] . " " . $row['AgtLastName'] . "</td>";
		echo "<td>" . $row['AgtBusPhone'] . "</td>";
		echo "<td>" . $row['AgtEmail'] . "</td>";
		echo "<td>" . $row['AgtPosition'] . "</td>";
		echo "<td>" . $row['AgencyId'] . "</td>";		
		echo "</tr>";
	}
?>
	</tbody>
</table>


</body>

</html>