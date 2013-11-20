</body>
<div id='footbar'>
<img src='./media/companylogo.png' height="60%" width="10%"><br/>
Copyright 2013 &copy
</div>
			<?php
				//if user is logged in display additional menu options
				if(isset($_SESSION['username']) and isset($_SESSION['agent']))
				{
				if($_SESSION['username'] and $_SESSION['agent']==true) //user is a agent
				{
				echo "<div id='loginname'>Agent Access: ".$_SESSION['username']." </div>";
				echo "<ul id='adminmenu' class='menu'>";
				echo "<li><a href='packageentry.php'>Add Packages</a></li>";
				echo "<li><a href='report.php'>Reports</a></li>";
				echo "</ul>";
				}
				if($_SESSION['username'] and $_SESSION['agent']==false)//user is a customer
				{
				echo "<div id='loginname'>Welcome back: ".$_SESSION['username']."! </div>";
				}
				}
				?>
</html>