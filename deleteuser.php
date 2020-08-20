<?php
session_start();
require ('db_connect.php');
$_SESSION['uname']=$_GET['usern'];
$uname=$_SESSION['uname'];

$query = "DELETE FROM `user_login` WHERE username='$uname'";

if(mysqli_query($connection,$query)){
	header("location: userslist.php");
	echo "<script type='text/javascript'>alert('User Successfully Deleted!')</script>";
	
}else{
	header("location: userslist.php");
	echo "<script type='text/javascript'>alert('Something went wrong!')</script>";
	
}

?>