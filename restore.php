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


$query_recycle = "INSERT INTO `file` (file_id,name,filepath,folder_loc,status) VALUES (null,'$filename','$filepath','Recovered files','restored')";

$query = "DELETE FROM `recycle_bin` WHERE id='$fileid'";
$result= mysqli_query($connection,"SELECT * FROM folder WHERE folder_name='$filefolder'") or die(mysqli_error($connection));


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