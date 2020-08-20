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

$query_recycle = "INSERT INTO `recycle_bin` (filename,filepath,filefolder) VALUES ('$filename','$filepath','$filefolder')";
$query = "DELETE FROM `file` WHERE file_id='$fileid'";

if(mysqli_query($connection,$query_recycle)){
	if(mysqli_query($connection,$query)){
	echo "<script type='text/javascript'>alert('File Moved to Recycle bin!')</script>";
				 echo "<script>window.history.back();</script>";
	}
}else{
	
	echo "<script type='text/javascript'>alert('Something went wrong!')</script>";
	 echo "<script>window.history.back();</script>";
}

?>