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

$preferred_name=$_POST['filename'];
if($folderloc != null){
	if(ISSET($_POST['submit'])){
		if($_FILES['upload']['name'] != "") {
			$file = $_FILES['upload'];
			$file_name = $file['name'];
			$file_temp = $file['tmp_name'];
			$name = explode('.', $preferred_name);
			$path = "files/".$file_name;
			$conn->query("INSERT INTO `file` VALUES('', '$name[0]', '$path','$folderloc','',default,'')") or die(mysqli_error());
 
			move_uploaded_file($file_temp, $path);
			echo "<script>window.history.back();</script>";
 
		}else{
			echo "<script>alert('Required Field!')</script>";
			echo "<script>window.history.back();</script>";
		}
	}
}else{
    echo "<script>alert('Please Select a Folder to upload')</script>";
			echo "<script>window.history.back();</script>";
}
?>