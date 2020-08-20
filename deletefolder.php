<?php
session_start();
require ('db_connect.php');
$checkpermanent=$_SESSION['permanent'];
$filefolder=$_SESSION['folde'];

$query_filerecycle="INSERT INTO recycle_bin (filename,filepath) SELECT name, filepath FROM file WHERE folder_loc='$filefolder'";
$query_recycle = "DELETE FROM `file` WHERE folder_loc='$filefolder'";
$query = "DELETE FROM `folder` WHERE folder_name='$filefolder'";


if($filefolder != null){
    if($checkpermanent=='no'){

if(mysqli_query($connection,$query_filerecycle)){
if(mysqli_query($connection,$query_recycle)){
	if(mysqli_query($connection,$query)){
	echo "<script type='text/javascript'>alert('Folder deleted and file moved to recycle bin')</script>";
                echo "<script>window.history.back();</script>";
	                }
                }
            }

}else if($checkpermanent=='yes'){
    echo "<script type='text/javascript'>alert('Unable to delete this folder!')</script>";
                echo "<script>window.history.back();</script>";
}
}else if($filefolder == null){
	
	echo "<script type='text/javascript'>alert('Please select a folder!')</script>";
                echo "<script>window.history.back();</script>";
}else{
    	echo "<script type='text/javascript'>alert('Something Went Wrong!')</script>";
                echo "<script>window.history.back();</script>";
}

?>