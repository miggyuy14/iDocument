<?php
session_start();
require ('db_connect.php');
$date = date("Y-m-d");
$query_recycle = "INSERT INTO `back_up` (filename,filepath,filefolder,date_uploaded) SELECT name,filepath,folder_loc,'$date' FROM file";

if(mysqli_query($connection,$query_recycle)){


	echo "<script type='text/javascript'>alert('Back up Success!')</script>";
				 echo "<script>window.history.back();</script>";
	
}else{
	
	echo "<script type='text/javascript'>alert('Something went wrong!')</script>";
	 echo "<script>window.history.back();</script>";
}

?>