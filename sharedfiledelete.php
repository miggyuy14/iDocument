<?php
session_start();
require ('db_connect.php');
$_SESSION['file_id']=$_GET['fileid'];

$fileid=$_SESSION['file_id'];


$query = "DELETE FROM `user_upload` WHERE `id` ='$fileid'";


	if(mysqli_query($connection,$query)){
	echo "<script type='text/javascript'>alert('File Deleted!')</script>";
				echo "<script>window.location='userfiles.php'</script>";
	
}else{
	
	echo "<script type='text/javascript'>alert('Something went wrong!')</script>";
	echo "<script>window.location='userfiles.php'</script>";
}

?>