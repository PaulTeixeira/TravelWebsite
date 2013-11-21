<?php
	include "ui/header.php";

	if(!isset($_SESSION["agent"])) header("location:login.php");
	if($_SESSION["agent"]!=1) header("location:login.php");
			
	$packageId;
	
	
	// function to Connect to server,select database and insert into database.
	function insertData($package_entry) 
{
	$cols = array_keys($package_entry);
	$columns ="";
	$columnValues ="";
	$insertSQL = "INSERT INTO packages(";
	//-----------------------------------
	foreach ($cols  as $values)
	{
		$columns .= $values . ",";
		$columnValues .= "'" . $package_entry[$values] . "',";
	
	}
	//-----------------------------------
		$columns = rtrim($columns,",");
		$columnValues = rtrim($columnValues,",");
		
		$insertSQL .= $columns . ") VALUES (" . $columnValues . ")";
		
	//------------------------
		$db = mysql_connect("localhost", "root", "");
		mysql_select_db('travelexperts') or die("Could not connect");
		
		$results = mysql_query($insertSQL);
				
		if($results) 
		{
			$GLOBALS['packageId'] = mysql_insert_id ();
			return true;
		}
		else
		{
			mysql_close ();
			return 0;
		}
	//------------------------	
}	

//Associate array
$package_entry= array(
					"PkgName"=> isset($_POST["PkgName"]) ? $_POST["PkgName"] :	"",
					"PkgStartDate"=>isset($_POST["PkgStartDate"]) ? $_POST["PkgStartDate"] :	"",
					"PkgEndDate"=>isset($_POST["PkgEndDate"]) ? $_POST["PkgEndDate"] :	"",
					"PkgDesc"=>isset($_POST["PkgDesc"]) ? $_POST["PkgDesc"] :	"",
					"PkgBasePrice"=>isset($_POST["PkgBasePrice"]) ? $_POST["PkgBasePrice"] :	"",
					"PkgAgencyCommission"=>isset($_POST["PkgAgencyCommission"]) ? $_POST["PkgAgencyCommission"] :	"",
					);
//declaration				
	$PkgNameErr = $PkgStartDateErr = $PkgEndDateErr = $PkgDescErr = $PkgBasePriceErr =  $PkgAgencyCommissionErr =	"";
	$PkgName = $PkgStartDate = $PkgEndDate = $PkgDesc= $PkgBasePrice =  $PkgAgencyCommission = 	"";


$validate = array();
 $valid = false;
 //checking all the required fields are filled
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	$valid = true;
	
    if (empty($_POST["PkgName"])) 
	{
		$valid = false;
		$PkgNameErr = "Missing";
    }
    else {
        $PkgName  = $_POST["PkgName"];
    }
 
    if (empty($_POST["PkgStartDate"])) 
	{
        $valid = false;
		$PkgStartDateErr = "Missing";
    }
    else {
        $PkgStartDate = $_POST["PkgStartDate"];
    }
 
    if (empty($_POST["PkgEndDate"])) 
	{
        $valid = false;
		$PkgEndDateErr = "Missing";
    }
    else {
        $PkgEndDate = $_POST["PkgEndDate"];
    }
 
    if (empty($_POST["PkgDesc"])) 
	{
        $valid = false;
		$PkgDescErr = "Missing";
	}	
    else {
        $PkgDesc= $_POST["PkgDesc"];
    }
	 if (empty($_POST["PkgBasePrice"])) 
	{
        $valid = false;
		$PkgBasePriceErr = "Missing";
    }
    else {
        $PkgBasePrice= $_POST["PkgBasePrice"];
    }
	 if (empty($_POST["PkgAgencyCommission"])) 
	{
        $valid = false;
		$PkgAgencyCommissionErr = "Missing";
	}
    else {
        $PkgAgencyCommission= $_POST["PkgAgencyCommission"];
    }
 
}
 // initialising array
	$validate["PkgName"]=$PkgName;
 
	$validate["PkgStartDate"]=$PkgStartDate;
 
	$validate["PkgEndDate"]=$PkgEndDate;
 
	$validate["PkgDesc"]=$PkgDesc;
 
	$validate["PkgBasePrice"]=$PkgBasePrice;
 
	$validate["PkgAgencyCommission"]= $PkgAgencyCommission;
 
  
  // setting boundries
	if(isset($_POST["subBtn"]))
	{
		if($valid)
		{
			if($_FILES["file"] ["type"] == "image/jpeg" )
			{
			echo "file is valid";
				if(insertData($validate))
				{
					echo "<script> alert('Package Added')</script>";
					move_uploaded_file($_FILES["file"]["tmp_name"], "media/packagephotos/".$GLOBALS['packageId'].".jpg");
					//unset($package_entry); would like to remove the post after so it clears the feilds here
				}
				else
				{
					echo "<script> alert('Please correct form data.')</script>";
				}
			}else
			{
				echo "<script> alert('Invalid photo type, please use only jpg photos')</script>";
			}
		}
	}	
	
?>
<div id='content'>
		<form method="post" action="" enctype="multipart/form-data"> 
		<!--table starts-->
		<table border="0" align="center"> 
			<tr>
				<th align="center" colspan="2"> Package Entry</th>
			</tr>
			<tr>
				<td >Package Name</td>
					<td><input type="text" name="PkgName" value="<?php echo $package_entry['PkgName'];?>"> <span class="error">* <?php echo $PkgNameErr;?></span> </td>
			</tr>
			<tr>
				<td align="right">Start Date</td>
				<td><input type="date" name="PkgStartDate"	value="<?php echo $package_entry['PkgStartDate'];?>"> <span class="error">* <?php echo $PkgStartDateErr;?></span></td>
			</tr>
			<tr>
				<td align="right">End Date</td>
				<td><input type="date" name="PkgEndDate"	value="<?php echo $package_entry['PkgEndDate'];?>"> <span class="error">* <?php echo $PkgEndDateErr;?></span></td>
			</tr>
			<tr>
				<td align="right">Description</td>
				<td><input type="text" name="PkgDesc"	value="<?php echo $package_entry['PkgDesc'];?>"> <span class="error">* <?php echo $PkgDescErr;?></span>
				</td>
			</tr>
			<tr>
				<td align="right" >Base price</td>
				<td><input type="text" name="PkgBasePrice"	value="<?php echo $package_entry['PkgBasePrice'];?>"> <span class="error">* <?php echo $PkgBasePriceErr;?></span>
				</td>
			</tr>
			<tr>
				<td align="right" >Commission</td>
				<td><input type="text" name="PkgAgencyCommission"	value="<?php echo $package_entry['PkgAgencyCommission'];?>"> <span class="error">* <?php echo $PkgAgencyCommissionErr;?></span>
				</td>
			</tr>
			<tr>
				<td align="right">Upload</td>
				<td>
					<input type="file" name="file">
				</td>
			</tr>
			<tr align="center" >
				<td colspan="2"><input type="submit" value="submit" name="subBtn"></td>
			</tr>
		</table> <!--table ends -->
		</form > 

</div>
<?php include "ui/footer.php";?>