<?php
session_start();
require ('db_connect.php');
$notif=$_POST['notif'];
$user_name=$_SESSION['username'];
$query = "UPDATE `user_login` SET newuser='no' WHERE username = '$user_name'";
$query2 = "UPDATE `user_login` SET notification='yes' WHERE username = '$user_name'";
$query3 = "UPDATE `user_login` SET notification='no' WHERE username = '$user_name'";
if(isset($_POST['notif'])){
if(mysqli_query($connection,$query)){
    if(mysqli_query($connection,$query2)){
	echo "<script type='text/javascript'>alert('Account Successfully Activated!')</script>";
	echo "<script type='text/javascript'>alert('You will recieve email notifications')</script>";
				echo "<script>window.location='newuser_createpass.php'</script>";
    }
}
}else if(!isset($_POST['notif'])){
    if(mysqli_query($connection,$query)){
        if(mysqli_query($connection,$query3)){
	            echo "<script type='text/javascript'>alert('Account Successfully Activated!')</script>";
	            echo "<script type='text/javascript'>alert('You will not recieve email notifications')</script>";
				echo "<script>window.location='newuser_createpass.php'</script>";
    }
}
}

else{
	
	echo "<script type='text/javascript'>alert('Something went wrong!')</script>";
	echo "<script>window.location='userhome.php'</script>";
}
?>