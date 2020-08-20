<?php
session_start();
require ('db_connect.php');

$uid=$_SESSION['uid'];

 

$password = $_POST["password"];

        // Prepare an insert statement
        $query = "UPDATE `user_login` SET Password='$password' WHERE id ='$uid'";
         if(mysqli_query($connection,$query)){
	echo "<script type='text/javascript'>alert('Password Updated!')</script>";
				echo "<script>window.location='userslist.php'</script>";
	
}else{
	
	echo "<script type='text/javascript'>alert('Something went wrong!')</script>";
	echo "<script>window.location='userslist.php'</script>";
}

?>
