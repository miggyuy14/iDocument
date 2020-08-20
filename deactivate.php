<?php
require ('db_connect.php');
$_SESSION['user_deac']=$_GET['id'];
$user_deactivate=$_SESSION['user_deac'];
$query = "UPDATE `user_login` SET status='deactivated' WHERE id = '$user_deactivate'";

if(mysqli_query($connection,$query)){
	echo "<script type='text/javascript'>alert('User Deactivated!')</script>";
				echo "<script>window.location='userslist.php'</script>";
	
}else{
	
	echo "<script type='text/javascript'>alert('Something went wrong!')</script>";
	echo "<script>window.location='userslist.php'</script>";
}
?>