<?php
session_start();
require ('db_connect.php');
$_SESSION['file_folder']=$_GET['filefolder'];
$_SESSION['file_paths']=$_GET['filepaths'];
$_SESSION['file_name']=$_GET['file'];
$_SESSION['file_id']=$_GET['fileid'];
$filename=$_SESSION['file_name'];
$filepath=$_SESSION['file_paths'];
$filefolder=$_SESSION['file_folder'];
$fileid=$_SESSION['file_id'];


$query = "DELETE FROM `recycle_bin` WHERE id='$fileid'";

	if(mysqli_query($connection,$query)){
	echo "<script type='text/javascript'>alert('File permanently deleted!')</script>";
				echo "<script>window.location='trashbin.php'</script>";
	
}else{
	header("location: trashbin.php");
	echo "<script type='text/javascript'>alert('Something went wrong!')</script>";
	
}

?>