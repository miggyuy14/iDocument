<?php
	require_once 'connection.php';
 // Initialize the session
session_start();
$username=$_SESSION['username'];
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
$preferred_name=$_POST['filename'];

	if(ISSET($_POST['submit'])){
		if($_FILES['upload']['name'] != "") {
			$file = $_FILES['upload'];
			$file_name = $file['name'];
			$file_temp = $file['tmp_name'];
			$name = explode('.', $preferred_name);
			$path = "files/".$file_name;
			$conn->query("INSERT INTO `user_upload` VALUES('', '$name[0]', '$path','$username','user','no',default )") or die(mysqli_error());
 
			move_uploaded_file($file_temp, $path);
			
                $to = "idocumentauscs@gmail.com";
                $subject = "File Uploaded by $username";
                $txt = "A File has been Uploaded file name: $preferred_name";
                
                
                mail($to,$subject,$txt);
                
			echo "<script>alert('File Uploaded!')</script>";
			echo "<script>window.location='userdownload.php'</script>";
 
		}else{
			echo "<script>alert('Required Field!')</script>";
			echo "<script>window.location='userdownload.php'</script>";
		}
	}
?>