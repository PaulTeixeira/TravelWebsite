<?php 
	include('functions.php');
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
		
		<form name = "getForm" action = "" method = "get">
		
		<table cellspacing="0" cellpadding="0" border="0">
			<tbody>
				<tr>
					<td width="100">User Name:</td>
					<td width="300"><input type = "hidden" value = "<?php echo isset($_POST['user']);?>" name = 'user'><?php echo isset($_POST['user']);?></td>
				</tr>
				<tr>
					<td width="100">Password:</td>
					<td width="300"><input type = "hidden" value = "<?php echo isset($_POST['password']);?>" name = 'password'><?php echo isset($_POST['password']);?></td>
				</tr>
		</form>	
		
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
	$db = mysql_connect('localhost', 'root', '');
	mysql_select_db('travelexperts') or die ('Could not connect to database');
	
	if(isset($_GET)){
		$sql = "INSERT INTO `users` (`user`, `password`) VALUES (".$_GET['user'].", ".$_GET['password'].")";
		$result = mysql_query($sql);
		
	if($result) {
			echo "SUCCESS";
			//header('Location: thankyou.php');
			//exit;
		} else {
			echo "FAIL";
			echo mysql_error();
		}
	}
	
	if(isset($_POST['submit'])) {
		$result = mysql_insert_array("customers", $_POST, 'submit');
	}
?>
</html>