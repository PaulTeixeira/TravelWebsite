</body>
<div id='footbar'>
Powered by Apex Solutions <br/>
Copyright 2013 &copy
</div>
			<?php
				//if user is logged in display additional menu options
				if(isset($_SESSION['username']))
				{
				echo "<div id='loginname'>Logged in as: ".$_SESSION['username']." </div>";
				echo "<ul id='adminmenu' class='menu'>";
				echo "<li><a href=''><span>Add Packages</span></a></li>";
				echo "<li><a href='logout.php'><span>Log Out</span></a></li>";
				echo "</ul>";
				}
				?>
</html>