<?php 
	include('functions.php');
	if(isset($_POST['Submit'])) 
	{
	setcookie("username",$_POST['user'], time()+3600);
	setcookie("password",md5($_POST['password']), time()+3600);
	}
?>

<html>
	<head>
		<style type = "">	
			body {
				background-color: #FFFFFF;
				font-family: Verdana,Arial,Helvetica,sans-serif;
				font-size: 12px;
			}
			td {
				font-family: Verdana,Arial,Helvetica,sans-serif;
				font-size: 12px;
			}
			h1 {
				font-size: 13px;
				font-weight: bold;
			}
		</style>
		
		<title>Registration</title>
	</head>
	
	<body>
		<h1>REGISTRATION FORM</h1>
		<p>Check the following information before submitting</p>
		
		
	<table cellspacing="0" cellpadding="0" border="0">
			<tbody>
				<tr>
					<td width="100">User Name:</td>
					<td width="300"><input type = "hidden" value = "<?php echo $_COOKIE["username"];?>" name = 'user'><?php echo $_COOKIE["username"];?></td>
				</tr>
				<tr>
					<td width="100">Password:</td>
					<td width="300"><input type = "hidden" value = "<?php echo $_COOKIE["password"];?>" name = 'password'><?php echo $_COOKIE["password"];?></td>
				</tr>
				
		<form action = "" method = "post">			
				<tr>
					<td width="100">First Name:</td>
					<td width="300"><input type = "hidden" value = "<?php echo $_POST['custFirstName'];?>" name = 'custFirstName'><?php echo $_POST['custFirstName'];?></td>
				</tr>
				
				<tr>
					<td width="100">Last Name:</td>
					<td width="300"><input type = "hidden" value = "<?php echo $_POST['custLastName'];?>" name = 'custLastName'><?php echo $_POST['custLastName'];?></td>
				</tr>
				
				<tr>
					<td width="100">Address:</td>
					<td width="300"><input type = "hidden" value = "<?php echo $_POST['custAddress'];?>" name = 'custAddress'><?php echo $_POST['custAddress'];?></td>
				</tr>
				
				<tr>
					<td width="100">Country:</td>
					<td width="300"><input type = "hidden" value = "<?php echo $_POST['custCountry'];?>" name = 'custCountry'><?php echo $_POST['custCountry'];?></td>
				</tr>
				
				<tr>
					<td width="100">Province:</td>
					<td width="300"><input type = "hidden" value = "<?php echo $_POST['custProv'];?>"name = 'custProv'><?php echo $_POST['custProv'];?></td>
				</tr>
				
				<tr>
					<td width="100">City:</td>
					<td width="300"><input type = "hidden" value = "<?php echo $_POST['custCity'];?>" name = 'custCity'><?php echo $_POST['custCity'];?></td>
				</tr>
				
				<tr>
					<td width="100">Postal Code:</td>
					<td width="300"><input type = "hidden" value = "<?php echo $_POST['custPostal'];?>" name = 'custPostal'><?php echo $_POST['custPostal'];?></td>
				</tr>
				
				<tr>
					<td width="100">Home Number:</td>
					<td width="300"><input type = "hidden" value = "<?php echo $_POST['custHomePhone'];?>" name = 'custHomePhone'><?php echo $_POST['custHomePhone'];?></td>
				</tr>
				
				<tr>
					<td width="100">Phone Number:</td>
					<td width="300"><input type = "hidden" value = "<?php echo $_POST['custBusPhone'];?>" name = 'custBusPhone'><?php echo $_POST['custBusPhone'];?></td>
				</tr>
				
				<tr>
					<td width="100">Email:</td>
					<td width="300"><input type = "hidden" value = "<?php echo $_POST['custEmail'];?>" name = 'custEmail'><?php echo $_POST['custEmail'];?></td>
				</tr>
				
				<tr>
					<td><input type = "submit" value = "Submit" name = "submit" onClick = "getForm.submit();"></td>
					<td><input type = "button" value = "Return" onClick = "history.go(-1);return true;"></td>
				</tr>
		</table>
		</form>
	</body>
	
<?php
	if(isset($_POST['submit'])) {
	include "settings/connection.php";
	$sql = "INSERT INTO `users` (`user`,`password`) VALUES ('".$_COOKIE["username"]."','".$_COOKIE["password"]."');";
	$result = mysql_query($sql);
 
		if($result) {
			$result = mysql_insert_array("customers", $_POST, 'submit');
			if($result) echo "SUCCESS";
			header('Location: thankyou.php');
		} else {
			echo "FAIL";
			echo mysql_error();
		}
	
	}
?>
</html>