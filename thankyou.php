<!--By: Sharmaine Roxas -->

<?php
include "ui/header.php";
?>
<div id='content'>

<script language="JavaScript" type="text/javascript">  
    var count = 5;  
    var redirect= "index.php";  
	
    function countDown(){  				//a function which will create a timer then redirect to the index page after registering
		if (count <=0){  
			window.location = redirect; 
		}else {  
			count--;  
			document.getElementById("timer").innerHTML = "This page will redirect in "+count+" seconds."  
			setTimeout("countDown()", 1000)  
		}  
    }  
</script>  
      
    Thank you for registering!  
      
<span id="timer">  

	<script>  
		 countDown();  //will call the countDown() function
	</script>  
</span> 

</div>
<?php include "ui/footer.php";?>