<?php
session_start();
require ('db_connect.php');

$filefolder=$_SESSION['folde'];
$foldid=$_SESSION['foldids'];
$foldfav=$_GET['favo'];
$query_permanent="UPDATE folder SET permanent='yes' WHERE id='$foldid'";
$query_permanentremove="UPDATE folder SET permanent='no' WHERE id='$foldid'";
$query="UPDATE folder SET favorite='yes' WHERE id='$foldid'";
$query2="UPDATE folder SET favorite='no' WHERE id='$foldid'";

if($foldfav=='no'){
if($filefolder != null){
    if(mysqli_query($connection,$query_permanent)){
	if(mysqli_query($connection,$query)){
	echo "<script type='text/javascript'>alert('Marked as Favorite')</script>";
                echo "<script>window.history.back();</script>";
	                }
                }
            
}
else if($filefolder == null){
	
	echo "<script type='text/javascript'>alert('Please select a folder!')</script>";
                echo "<script>window.history.back();</script>";
}
}
else if($foldfav=='yes'){
    if(mysqli_query($connection,$query2)){
        if(mysqli_query($connection,$query_permanentremove)){
	echo "<script type='text/javascript'>alert('Unmarked as Favorite')</script>";
                echo "<script>window.history.back();</script>";
	                }
    }        
    }else{
    	echo "<script type='text/javascript'>alert('Something Went Wrong!')</script>";
                echo "<script>window.history.back();</script>";
}

?>