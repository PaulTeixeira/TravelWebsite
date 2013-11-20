<?php
session_start();
?>
<html>
<head>
<title>Travel Experts</title>
<link rel='stylesheet' type='text/css' href='./css/site.css'>
<head>
	<body>
		<div id='headbar'>
			<div id='logo'><a href='index.php'><img src='./media/websitelogo.png'></a></div>
			<div class="menu">
				<ul>
				<li><a href='index.php'><span>Home</span></a></li>
				<li><a href='order.php'><span>Packages</span></a></li>
				<li><a href='contactpage.php'><span>Contact</span></a></li>
				<?php
				if(isset($_SESSION['agent'])) //if logged in show logout, else show login
				{
					echo "<li><a href='logout.php'>Log Out</a></li>";
				}else
				{
					echo "<li><a href='customer.php'><span>Register</span></a></li>";
					echo "<li><a href='login.php'><span>Log In</span></a></li>";
				}
				?>
				</ul>
			</div>
		</div>