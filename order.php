<?php include "ui/header.php"?>
<script src='javascript/myjs.js'></script>
		<div id='content'>
					<div id='gallery'>
						<div>
							<img id='mainimg' src='' onclick='fillorder();'>
							<div id='price'></div>
						</div>
						<div id='description'></div>
						
					<div id='carosel'>
					<?php
						include "settings/connection.php";
						$results = mysql_query("SELECT * FROM `packages`");

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
					
				<div id='orderform'>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br/>
				Nullam at nulla eros. Praesent tempus eu risus eget hendrerit. Nam facilisis nisi vel commodo <br/>
				vehicula. Morbi euismod est ac dignissim dignissim. Sed pretium commodo felis, quis tempor felis <br/>
				tempor suscipit. Nunc risus nunc, posuere et nibh sed, volutpat iaculis nibh. In quis ultricies dui, <br/>
				at aliquet nibh. Nam tristique ornare ullamcorper. Ut et sem diam. Donec accumsan est a nibh <br/>
				blandit consequat. Suspendisse hendrerit mollis orci eget consequat. In sed euismod ipsum. <br/>
				Ut fermentum tincidunt erat. Ut in risus aliquam, condimentum ligula eget, molestie arcu. <br/>
				Ut semper hendrerit augue, quis mattis dolor sollicitudin at.
				</div>
				
		</div>
<?php include "ui/footer.php"?>