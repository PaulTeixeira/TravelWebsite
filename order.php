<?php include "ui/header.php"?>
<script src='javascript/myjs.js'></script>
		<div id='content'>
					<div id='gallery'>
						<div>
							<img id='mainimg' src='' onclick=''>
							<div id='price'></div>
						</div>
						<div id='description'></div>
						
					<div id='carosel'>
					<?php
						include "settings/connection.php";
						$results = mysql_query("SELECT * FROM `Packages`");

						while($row = mysql_fetch_assoc($results))
						{
						echo "<div id=".$row['PackageId']." class='galleryitem' onclick='changeimg(this.id)' href='#'>";
							echo "<img src='media/packagephotos/".$row['PackageId'].".jpg'>";
							echo "<div class='hidden'>".$row['PkgDesc']."</div>";
							echo "<div class='hidden'>".$row['PkgBasePrice']."</div>";
						echo "</div>";
						}
						echo "<script>changeimg();</script>";
					?>
					</div>
					</div>			
		</div>
<?php include "ui/footer.php"?>