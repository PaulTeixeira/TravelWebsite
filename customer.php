<?php
include "ui/header.php";
?>
<div id='content'>
		<link rel="STYLESHEET" type="text/css" href="css/reg.css" />
		<script type="text/javascript">
		
			function validateFormOnSubmit(theForm) {						//validates all the input fields
			var reason = "";
			  reason += validateEmpty(theForm.user);
			  reason += validateEmpty(theForm.password);
			  reason += validateEmpty(theForm.custFirstName);
			  reason += validateEmpty(theForm.custLastName);
			  reason += validateEmpty(theForm.custAddress);
			  reason += validateEmpty(theForm.custCity);
			  reason += validateEmpty(theForm.custProv);
			  reason += validatePostal(theForm.custPostal);
			  reason += validateEmpty(theForm.custCountry);
			  reason += validatePhone(theForm.custHomePhone);
			  reason += validatePhone(theForm.custBusPhone);
			  reason += validateEmail(theForm.custEmail);
				  
			  if (reason != "") {
				alert("Some fields need correction:\n" + reason);
				return false;
			  }

			  alert("All fields are filled correctly");
			  return false;
			}
			
			function validateEmpty(fld) {									//validate if the text fields were left empty
				var error = "";
			 
				if (fld.value.length == 0) {
					fld.style.background = 'Yellow'; 
					error = "The required field has not been filled in.\n";
				} else {
					fld.style.background = 'White';
				}
				return error;  
			}

			function validatePostal(fld) {									//validate if postal code is null or has an illegal character and in wrong postal code format XXXXXX
				myRegExp = new RegExp("^[a-z][0-9][a-z]( )?[0-9][a-z][0-9]$","i");
				if (fld.value == "") {
					fld.style.background = 'Yellow';
					error = "You didn't enter your postal code.\n";
				} else if (fld.value != myRegExp && fld.value.length != 6) {
					fld.style.background = 'Yellow';
					error = "Invalid postal code .\n";
				} else {
					fld.style.background = 'White';
				}
				return error;
			}
			
			function trim(s) {												//replaces illegal characters in the email address text field with a null value
				return s.replace(/^\s+|\s+$/, '');
			}
			
			function validateEmail(fld) {
				var error="";
				var tfld = trim(fld.value);                        // value of field with whitespace trimmed off
				var custEmailFilter = /^[^@]+@[^@.]+\.[^@]*\w\w$/ ;
				var illegalChars= /[\(\)\<\>\,\;\:\\\"\[\]]/ ;
			   
				if (fld.value == "") {
					fld.style.background = 'Yellow';
					error = "You didn't enter an email address.\n";
				} else if (!custEmailFilter.test(tfld)) {              //test custEmail for illegal characters
					fld.style.background = 'Yellow';
					error = "Please enter a valid email address.\n";
				} else if (fld.value.match(illegalChars)) {
					fld.style.background = 'Yellow';
					error = "Invalid email address.\n";
				} else {
					fld.style.background = 'White';
				}
				return error;
			}
			
			function validatePhone(fld) {								//test if phone number entered has illegal characters or length is in wrong formal XXX-XXX-XXX
				var error = "";
				var stripped = fld.value.replace(/[\(\)\.\-\ ]/g, '');    

			   if (fld.value == "") {
					error = "You didn't enter a phone number.\n";
					fld.style.background = 'Yellow';
				} else if (isNaN(parseInt(stripped))) {
					error = "The phone number contains illegal characters.\n";
					fld.style.background = 'Yellow';
				} else if (!(stripped.length == 10)) {
					error = "The phone number is the wrong length. Make sure you included an area code.\n";
					fld.style.background = 'Yellow';
				} else {
					fld.style.background = 'White';
				}
				return error;
			}
			</script>
	</head>
	
	<body> 
	<form name="demo" onsubmit="return validateFormOnSubmit(this)" action="confirmReg.php" method = "post">
		<div id = "reg">
		
		<!---This fieldset will collect customer information which will be directed to the database upon submission-->
		
			<fieldset>
				<legend>Register</legend>
				<div class='short_explanation'>* required fields</div>
				
				<label for='username' >User Name*:</label>
				<input type='text' name='user' id='name' maxlength="50" />
				<label for='password' >Password*:</label>
				<input type='password' name='password' id='name' maxlength="50" />
			</fieldset>
		
		<br />
		
			<fieldset >
				<legend>Personal Information</legend>
				<label for='custFirstName' >First Name*: </label>
				<input type='text' name='custFirstName' id='name' maxlength="50" />
				<label for='custLastName' >Last Name*: </label>
				<input type='text' name='custLastName' id='name' maxlength="50" />
				<label for='custAddress' >Address*: </label>
				<input type='text' name='custAddress' id='name' maxlength="50" />
				<label for='custCity' >City*: </label>
				<input type='text' name='custCity' id='name' maxlength="50" />
				<label for='custProv' >Province*: </label>
				<input type='text' name='custProv' id='name' maxlength="50" />
				<label for='custPostal' >Postal*: </label>
				<input type='text' name='custPostal' id='name' maxlength="50" />
				<label for='custCountry' >Country*: </label>
				<input type='text' name='custCountry' id='name' maxlength="50" />
				<label for='custHomePhone' >Home Number: </label>
				<input type='text' name='custHomePhone' id='name' maxlength="50" />
				<label for='custBusPhone' >Phone Number*: </label>
				<input type='text' name='custBusPhone' id='name' maxlength="50" />
				<label for='custEmail' >Email Address*:</label>
				<input type='text' name='custEmail' id='custEmail' maxlength="50" />
				<input type='submit' name='Submit' value='Submit' />		 
			</fieldset>
			
		</div>
	</form> 
</div>
<?php include "ui/footer.php";?>