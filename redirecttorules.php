<?php
require 'db_connect.php';
session_start();
$uname = $_SESSION['username'];
$query = "SELECT * FROM `user_login` WHERE usertype='user' and username='$uname'";

$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$r = mysqli_fetch_array($result);
if($r['newuser'] == 'no'){
	echo "<script type='text/javascript'>alert('Login Successful!')</script>";
	echo "<script>window.location='userhome.php'</script>";
}
else if ($r['newuser'] == 'yes'){
echo "<script type='text/javascript'>alert('Hi New User! We would like you to read our terms and conditions! Thank you!')</script>";
				echo "<script>window.location='userrules.php'</script>";
}

 ?>
