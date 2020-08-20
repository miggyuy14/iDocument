<?php
session_start();
require ('db_connect.php');


$query = "DELETE FROM `recycle_bin`";

	if(mysqli_query($connection,$query)){
	echo "<script type='text/javascript'>alert('File permanently deleted!')</script>";
				echo "<script>window.location='trashbin.php'</script>";
	
}else{
	header("location: trashbin.php");
	echo "<script type='text/javascript'>alert('Something went wrong!')</script>";
	
}

?>