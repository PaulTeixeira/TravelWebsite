<html>	
	<?php

function insertData($bookings_entry) 
{
	$cols = array_keys($bookings_entry);
	$columns ="";
	$columnValues ="";
	$insertSQL = "INSERT INTO `bookings`(";
	//-----------------------------------
	foreach ($cols  as $values)
	{
		$columns .= $values . ",";
		$columnValues .= "'" . $bookings_entry[$values] . "',";
	
	}
	//-----------------------------------
		$columns = rtrim($columns,",");
		$columnValues = rtrim($columnValues,",");
		
		$insertSQL .= $columns . ") VALUES (" . $columnValues . ")";
		
	//------------------------
		$db = mysql_connect("localhost", "root", "");
		mysql_select_db('travelexperts') or die("Could not connect");
		
		$results = mysql_query($insertSQL);
		print_r ($insertSQL);
				
		if($results) 
		{
			return true;
		}
		else
		{
			return false;
		}
	//------------------------	
}	

//Associate array
$bookings_entry= array(
					"BookingDate"=> isset($_POST["BookingDate"]) ? $_POST["BookingDate"] :	"",
					"BookingNo"=>isset($_POST["BookingNo"]) ? $_POST["BookingNo"] :	"",
					"TravelerCount"=>isset($_POST["TravelerCount"]) ? $_POST["TravelerCount"] :	"",
					"CustomerId"=>isset($_POST["CustomerId"]) ? $_POST["CustomerId"] :	"",
					"TripTypeId"=>isset($_POST["TripTypeId"]) ? $_POST["TripTypeId"] :	"",
					"PackageId"=>isset($_POST["PackageId"]) ? $_POST["PackageId"] :	"",
					);
//declaration				
	$BookingDateErr = $BookingNoErr = $TravelerCountErr = $CustomerIdErr = $TripTypeIdErr =  $PackageIdErr =	"";
	$BookingDate = $BookingNo = $TravelerCount = $CustomerId= $TripTypeId =  $PackageId = 	"";


$validate = array();
 $valid = false;
 
 //checking all the required fields are filled
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	$valid = true;
	
    if (empty($_POST["BookingDate"])) 
	{
		$valid = false;
		$BookingDateErr = "Missing";
    }
    else {
        $BookingDate  = $_POST["BookingDate"];
    }
 
    if (empty($_POST["BookingNo"])) 
	{
        $valid = false;
		$BookingNoErr = "Missing";
    }
    else {
        $BookingNo = $_POST["BookingNo"];
    }
 
    if (empty($_POST["TravelerCount"])) 
	{
        $valid = false;
		$TravelerCountErr = "Missing";
    }
    else {
        $TravelerCount = $_POST["TravelerCount"];
    }
 
    if (empty($_POST["CustomerId"])) 
	{
        $valid = false;
		$CustomerIdErr = "Missing";
	}	
    else {
        $CustomerId= $_POST["CustomerId"];
    }
	 if (empty($_POST["TripTypeId"])) 
	{
        $valid = false;
		$TripTypeIdErr = "Missing";
    }
    else {
        $TripTypeId= $_POST["TripTypeId"];
    }
	 if (empty($_POST["PackageId"])) 
	{
        $valid = false;
		$PackageIdErr = "Missing";
	}
    else {
        $PackageId= $_POST["PackageId"];
    }
 
}
 // initialising array
	$validate["BookingDate"]=$BookingDate;
 
	$validate["BookingNo"]=$BookingNo;
 
	$validate["TravelerCount"]=$TravelerCount;
 
	$validate["CustomerId"]=$CustomerId;
 
	$validate["TripTypeId"]=$TripTypeId;
 
	$validate["PackageId"]= $PackageId;
 
  
  // setting boundries
	if(isset($_POST["subBtn"]))
	{
		if($valid)
		{
			if(insertData($validate ))
			{
				print_r($validate);
				print "SUCCESS";
			}
			else
			{
				print "FAIL";
			}
		}
	}
	
	
	
?>	
	<body>
		<form method="POST" action="" > 
		<table border="0" align="center">
			<tr>
				<th align="center" colspan="2"> Bookings</th>
			</tr>
			<tr>
				<td align="right">Booking Date</td>
					<td><input type="date" name="BookingDate" value="<?php echo $bookings_entry['BookingDate'];?>"> <span class="error">* <?php echo $BookingDateErr;?></span> </td>
			</tr>
			<tr>
				<td align="right">Number of booking</td>
				<td><input type="text" name="BookingNo"	value="<?php echo $bookings_entry['BookingNo'];?>"> <span class="error">* <?php echo $BookingNoErr;?></span></td>
			</tr>
			<tr>
				<td align="right">Number of Travellers</td>
				<td><input type="text" name="TravelerCount"	value="<?php echo $bookings_entry['TravelerCount'];?>"> <span class="error">* <?php echo $TravelerCountErr;?></span></td>
			</tr>
			<tr>
				<td align="right">Customer ID</td>
				<td><input type="text" name="CustomerId"	value="<?php echo $bookings_entry['CustomerId'];?>"> <span class="error">* <?php echo $CustomerIdErr;?></span>
				</td>
			</tr>
			<tr>
				<td align="right" >Trip ID</td>
				<td><input type="text" name="TripTypeId"	value="<?php echo $bookings_entry['TripTypeId'];?>"> <span class="error">* <?php echo $TripTypeIdErr;?></span>
				</td>
			</tr>
			<tr>
				<td align="right" >Package ID</td>
				<td><input type="text" name="PackageId"	value="<?php echo $bookings_entry['PackageId'];?>"> <span class="error">* <?php echo $PackageIdErr;?></span>
				</td>
			</tr>
			<tr align="right" >
				<td colspan="2"><input type="submit" value="submit" name="subBtn"></td>
			</tr>
		</table>
		<form > 
	</body>
</html>