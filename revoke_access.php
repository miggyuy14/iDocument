<?php
session_start();
require ('db_connect.php');
$_SESSION['shared_id']=$_GET['file'];
$filename=$_GET['filename'];
$id=$_SESSION['shared_id'];
$authen_uname=$_SESSION['share_user'];

$query = "DELETE FROM `user_upload` WHERE uploaded_by='$authen_uname' and id='$id'";
$query2 = "DELETE FROM `shared_files` WHERE file_name='$filename' and shared_to='$authen_uname'";
	if(mysqli_query($connection,$query2)){
	    if(mysqli_query($connection,$query)){
	echo "<script type='text/javascript'>alert('Access Revoked!')</script>";
				echo "<script>window.location='userslist.php'</script>";
	    }
}else{
	header("location: userslist.php");
	echo "<script type='text/javascript'>alert('Something went wrong!')</script>";
	

}
?>