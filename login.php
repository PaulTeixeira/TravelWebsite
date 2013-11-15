	<?php include "ui/header.php"?>
	<?php
		
			//session_start();
			// Connect to server and select databse.
			include "settings/connection.php";

		// username and password sent from form 
			if(isset($_GET['subBtn']))
		{
			// username and password sent from form 
				$myusername = $_GET['User_Id']; 
				$mypassword = $_GET['password']; 
			// To Query
				$myusername = mysql_real_escape_string($myusername);
				$mypassword = mysql_real_escape_string($mypassword);
				$sql="SELECT password FROM users WHERE user='$myusername'";
				$result=mysql_query($sql);
				
			// Mysql_num_row is counting table row
				$count=mysql_num_rows($result);
			
			// If result matched $myusername and $mypassword, table row must be 1 row
				if($count == 1)
				{
					
					while($row = mysql_fetch_array($result))
					{
						$dbPwd = $row['password'];
						
					}
					
					$encPwd = md5($mypassword);
					
					if ($dbPwd==$encPwd)
					{		
						$_SESSION['username'] = "user";
						header("location:index.php");
					} else {
						echo "Sorry, wrong password please TRY AGAIN...!!";
					}
				}	
				else
					echo "Sorry, wrong Username or password please TRY AGAIN!!";	
		}
		
?>
		<div id='content'>
	<!--master table starts-->
		<form method="get" action="" > 
		
			<table border="0" align="center">
				<th align="center" colspan="2"> Login Here</th>
				<tr align="center">
					<td >User_Id</td>
						<td><input type="text" id="form" name="User_Id" ></td>
				</tr>
				<tr align="center">
					<td >password</td>
					<td><input type="password" id="form" name="password" </td>
				</tr> 
				<tr >
					<td colspan="2" align="right">
						<input type="submit" value="submit" name="subBtn">
						<input type="reset" value="Clear">
					</td>
				</tr>
			</table>
					<!--master table ends -->
		</div>
<?php include "ui/footer.php"?>