<?php include "ui/header.php"?>
		<div id='content'>
<?php //Jan Crisologo
	include "settings/connection.php";
	$results = mysql_query("SELECT * FROM `Agents`");

	while($row = mysql_fetch_assoc($results)) {
		echo "<div class='card'>";
			echo "<div class='name'>".$row['AgtFirstName']." ".$row['AgtLastName']."</div>";
			echo "<div class='phone'>".$row['AgtBusPhone']."</div>";
			echo "<div class='email'>".$row['AgtEmail']."</div>";
			echo "<div class='position'>".$row['AgtPosition']."</div>";
		echo "</div>";
	}
?>

<?php include "ui/footer.php"?>