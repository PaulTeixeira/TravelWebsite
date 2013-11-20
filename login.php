	<?php
			include "ui/header.php";
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
				$encPwd = md5($mypassword);
				$sql="SELECT * FROM `users` WHERE `user`='$myusername'";
				$result=mysql_query($sql);
			
			// If result matched $myusername and $mypassword, table row must be 1 row
					if($row = mysql_fetch_array($result))
					{
						if ($row['password']==$encPwd)
						{
						$_SESSION['userid'] =$row['userId'];
						$_SESSION['username'] =$row['user'];
						$_SESSION['agent'] = $row['agent'];
						header("location:index.php");
						}		
					echo "<script> alert('Wrong Password!!')</script>";						
					}
					else
					{
					echo "<script> alert('User doesn't exist!!')</script>";
					}
		}
?>
		<div id='content'>
	<!--master table starts-->
		<form method="get" action="" > 
		
			<table border="0" align="center">
				<th align="center" colspan="2"> Login Here</th>
				<tr align="center">
					<td >User Name</td>
						<td><input type="text" id="form" name="User_Id" ></td>
				</tr>
				<tr align="center">
					<td >Password</td>
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
<?php include "ui/footer.php";?>