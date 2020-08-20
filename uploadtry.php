<?php
	require_once 'connection.php';
 // Initialize the session
session_start();
 $folderloc=$_SESSION['folde'];
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

	if(ISSET($_POST['submit'])){
		if($_FILES['upload']['name'] != "") {
			$file = $_FILES['upload'];
			$file_name = $file['name'];
			$file_temp = $file['tmp_name'];
			$name_nospaces= str_replace(' ', '', $file_name);
			$finame_nospaces= str_replace(' ', '', $file_temp);
			$name = explode('.', $file_name);
			
			$path = "files/".$name_nospaces;
			$conn->query("INSERT INTO `file` VALUES('', '$name_nospaces[0]', '$path','$folderloc','')") or die(mysqli_error());
 
			move_uploaded_file($finame_nospaces, $path);
			header("location:upload2.php");
 
		}else{
			echo "<script>alert('Required Field!')</script>";
			echo "<script>window.location='upload2.php'</script>";
		}
	}
?>