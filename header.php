<?php
session_start();
?>
<html>
<head>
<title>Travel Experts</title>
<link rel='stylesheet' type='text/css' href='site.css'>
<head>
	<body>
		<div id='headbar'>
			<div id='logo'><img src='media/holder.jpg'></div>
			<h1>Travel Experts</h1>
			<div id='tagline'>...we are the experts of travel</div>
		</div>
		</div>
		<div id='sidebar'>
			<ul id='menu'>
				<li><a href='index.php'>Home</a></li>
				<li><a href='order.php'>Order</a></li>
				<li><a href='index.php'>Contact</a></li>
				<li><a href='signup.php'>LogIn</a></li>
				<?php
				//if user is logged in display additional menu options
				if(isset($_SESSION['user']))
				{
				echo "<div style='float: left;font-size: 18;margin:5;'>Administratior Menu</div>";
				echo "<li><a href='index.php'>Add Packages</a></li>";
				echo "<li><a href='signup.php'>Reports</a></li>";
				}
				?>
			</ul>
		</div>