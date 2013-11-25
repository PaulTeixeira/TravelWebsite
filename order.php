<?php include "ui/header.php"
/* Paul Teixeira */
?>
<script src='javascript/myjs.js'></script>
		<div id='content'>
					<div id='gallery'>
						<div> Please click on photo to order package.
							<img id='mainimg' src='' onclick=''>
							<div id='price'></div>
						</div>
						<div id='description'></div>
						
					<div id='carosel'>
					<?php
						include "settings/connection.php"; //do connection
						$results = mysql_query("SELECT * FROM `Packages`"); //do query

						while($row = mysql_fetch_assoc($results)) //create gallery
						{
						echo "<div id=".$row['PackageId']." class='galleryitem' onclick='changeimg(this.id)' href='#'>";
							echo "<img src='media/packagephotos/".$row['PackageId'].".jpg'>";
							echo "<div class='hidden'>".$row['PkgDesc']."</div>";
							echo "<div class='hidden'>".$row['PkgBasePrice']."</div>";
						echo "</div>";
						}
						echo "<script>changeimg();</script>"; //start first changeimg()
					?>
					</div>
					</div>			
		</div>
<?php include "ui/footer.php"?>