<?php

require ('db_connect.php');
$filename=$_GET['file'];
$filepath=$_GET['filepath'];
$id=$_GET['id'];


$query_recycle = "INSERT INTO `file` (name,filepath,folder_loc,status) VALUES ('$filename','$filepath','Recovered files','back up')";
$query = "DELETE FROM `back_up` WHERE id='$id'";

if(mysqli_query($connection,$query_recycle)){
	if(mysqli_query($connection,$query)){
	echo "<script type='text/javascript'>alert('File Recovered!')</script>";
				echo "<script>window.history.back();</script>";
	}
	
}

else{
	
	echo "<script type='text/javascript'>alert('Something went wrong!')</script>";
	echo "<script>window.history.back();</script>";
}

?>