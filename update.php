<?php
session_start();
$_SESSION['uid']=$_GET['id'];
?>
<!DOCTYPE HTML>
<html>
<head></head>
<body>
<center>
<form method="post" action="updatepass.php">
        <table border="0.5" >
            <tr>
                <td><label>Input New Password</label></td>
                <td><input type="text" name="password"></td>
            </tr>
            
			
            <tr>
				
                <td><input type="submit"></td>
				
            </tr>
        </table>
		</form>
		</center>
		
</body>
</html>