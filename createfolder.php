<?php  
 require('db_connect.php');

if (isset($_POST['foldername']) and isset($_POST['folder_info'])){
	
// Assigning POST values to variables.
$fname = $_POST['foldername'];
$finfo = $_POST['folder_info'];

// CHECK FOR THE RECORD FROM TABLE
$query = "INSERT INTO `folder` (id,folder_name,folder_description) VALUES ('','$fname','$finfo')";
if(mysqli_query($connection,$query)){
	echo "new folder added!";
	header("location: upload2.php");
	
}else{
    echo "ERROR: Could not able to execute $query. " . mysqli_error($connection);
}

//echo "Invalid Login Credentials";

}
?>