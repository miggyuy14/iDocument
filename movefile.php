<?php
session_start();
require ('db_connect.php');
$fileid=$_GET['fileid'];
$filefolder=$_GET['moveto'];

$query = "UPDATE file SET folder_loc='$filefolder' WHERE file_id='$fileid'";

if(mysqli_query($connection,$query)){
	
	echo "<script type='text/javascript'>alert('File Moved!')</script>";

                echo "<script>window.history.back();</script>";
	
}else{
	
	echo "<script type='text/javascript'>alert('Something went wrong!')</script>";
	echo "<script>window.history.back();</script>";
	
}

?>