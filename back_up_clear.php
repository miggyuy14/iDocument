<?php

require ('db_connect.php');


$query = "DELETE FROM `back_up`";

	if(mysqli_query($connection,$query)){
	echo "<script type='text/javascript'>alert('back up cleared')</script>";
				echo "<script>window.location='back_up_page.php'</script>";
	
}else{
	echo "<script type='text/javascript'>alert('Something Went Wrong!')</script>";
				echo "<script>window.location='back_up.php'</script>";
	
}

?>