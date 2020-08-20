<?php

require ('db_connect.php');

$id=$_GET['id'];




$query = "DELETE FROM `back_up` WHERE id='$id'";




	if(mysqli_query($connection,$query)){
	echo "<script type='text/javascript'>alert('File Deleted!')</script>";
				echo "<script>window.history.back();</script>";
	}
	



else{
	
	echo "<script type='text/javascript'>alert('Something went wrong!')</script>";
	echo "<script>window.history.back();</script>";
}

?>