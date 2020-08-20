<?php
	require_once ('db_connect.php');
 // Initialize the session
session_start();
 $finame=$_SESSION['file_name'];
  $_SESSION['email']=$_GET['email'];
 $_SESSION['user_name']=$_GET['usname'];
 $_SESSION['notifi']=$_GET['notif'];
 $notif=$_SESSION['notifi'];
 $shared_user=$_SESSION['user_name'];
 $email=$_SESSION['email'];
 $fipath=$_SESSION['file_path'];

			
			$query = "INSERT INTO user_upload (id,filename,filepath,uploaded_by,shared_by,seen) VALUES ('','$finame','files/$fipath','$shared_user','admin','no')";
			$query2 = "INSERT INTO shared_files (id,file_name,file_path,shared_to) VALUES ('','$finame','files/$fipath','$shared_user')";
			unset($_SESSION['share_filepath']);
			if($notif=="yes"){
			if(mysqli_query($connection, $query) or die(mysqli_error($connection))){
				if(mysqli_query($connection, $query2) or die(mysqli_error($connection))){
				    
    			    $to = "$email";
                    $subject = "File Shared by Admin";
                    $txt = "A document has been shared to you. File name: $finame Please login to www.idocument-auscspasay.com.";
                    
                    
                    mail($to,$subject,$txt);
                    
				echo "<script type='text/javascript'>alert('File Shared Successfully!')</script>";
				echo "<script>window.history.back();</script>";
				}
			}
			}
			if($notif=="no"){
			if(mysqli_query($connection, $query) or die(mysqli_error($connection))){
				if(mysqli_query($connection, $query2) or die(mysqli_error($connection))){
				 
				echo "<script type='text/javascript'>alert('File Shared Successfully!')</script>";
				echo "<script>window.history.back();</script>";
				}
			}
			}else{
				echo "<script type='text/javascript'>alert('Invalid')</script>";
				echo "<script>window.history.back();</script>";
			}
			

?>