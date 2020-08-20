<?php  
 require('db_connect.php');

if (isset($_POST['user_id']) and isset($_POST['user_pass'])){
	
// Assigning POST values to variables.
$username = $_POST['user_id'];
$password = $_POST['user_pass'];


// CHECK FOR THE RECORD FROM TABLE
$query = "SELECT * FROM `user_login` WHERE BINARY username='$username' and BINARY Password='$password'";
$query2= "SELECT * FROM `user_login` WHERE BINARY username='$username' and BINARY Password='$password' and status='deactivated'";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);
$result2 = mysqli_query($connection, $query2) or die(mysqli_error($connection));
$count2 = mysqli_num_rows($result2);
$r = mysqli_fetch_array($result);
if ($count2 == 1){
  echo  "<script type='text/javascript'>alert('User deactivated please contact system administrator!')</script>";
  echo "<script>window.location='logout.php'</script>";}
  else{
if ($count == 1){
session_start();
$_SESSION["loggedin"] = true;
$_SESSION["id"] = $id;
$_SESSION["username"] = $username;
if($r['usertype'] == 'user'){
	header("location: redirecttorules.php");
}else{
	header("location: adminhome.php");
}                        
}
else {
echo "<script type='text/javascript'>alert('Invalid Login Credentials')</script>";
echo "<script>window.location='logout.php'</script>";
}
}
}
?>