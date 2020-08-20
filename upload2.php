<?php session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
	<link rel="stylesheet" type="text/css" href="css/navbar.css"/>
		<link rel="stylesheet" type="text/css" href="css/navtop.css"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="css/modalnew.css"/>
		
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
		<script src="js/2-create-element.js"></script>
		<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure?');
}
</script>
	</head>
<body>
	<nav>	
		<ul class="navside">
		
  <li><h3><a href="adminhome.php">iDocument</a></h3></li>
  <li><a href="upload2.php">Documents</a></li>
  <li><a href="userfiles_view.php">User Documents</a></li>  
  <li><a href="search.php">File Search</a></li>
  <li><a href="userslist.php">Users</a></li>
  <li><a href="reports.php">System Report</a></li>
  <li><a href="terms-conditions.php">terms and conditions</a></li>
  <li><a href="trashbin.php">Recycle Bin</a></li>
  <li class = "logout"><a onClick="return checkDelete()" href="logout.php">logout</a></li>
</ul>
	</nav>

		<ul class="navtops">
  <li><button id="myBtn" class="btn btn-primary">Create New Folder</button></li>
  


</ul>

	
	<div class="col-md-4"></div>
	<div class="col-md-5 well">
		<h3 class="text-primary">File Folders</h3>
		<hr style="border-top:1px dottec #ccc;">
		<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
	<center>
    <h3>Make a new folder</h3>
	<form id="login-form" method="post" action="newcreatefolder.php" >
        <table border="0.5" >
            <tr>
                <td><label for="foldername">Folder Name</label></td>
                <td><input type="text" name="foldername" id="foldername" maxlength="12" require></td>
            </tr>
            <tr>
                <td><label for="folder_info">Folder Description</label></td>
                <td><input type="text" name="folder_info" id="folder_info" maxlength="12" require></input></td>
            </tr>
			
            <tr>
				
                <td><input type="submit" value="Submit" />
				
            </tr>
        </table>
		</form>
		</center>
  </div>

</div>
		
		<table class="table table-bordered">
			<thead class="alert-warning">
				
			</thead>
			<tbody class="alert-success">
				<ul class="navtops">
				<center>
<?php
					require 'connection.php';
					
					$row = $conn->query("SELECT * FROM `folder`") or die(mysqli_error());
					while($fetch = $row->fetch_array()){
						
				?>
					
						<?php 
							$name = explode('/', $fetch['folder_name']);
							$description = explode('/', $fetch['folder_description']);
							
						?>
						<li>
						<?php 
						$fold = $fetch['folder_name'];
						$description = $fetch['folder_description']
						?>
						</br>
						
						<a href="subok.php?foldname=<?php echo "$fold"?>">
						<img src="folder2.png" width = "70" height = "60"/>
						</a>
						<?php
						echo $fetch['folder_name'];
						?>
						</br>
						<?php
						echo $fetch['folder_description']
						?>
						</li> &nbsp
					
				<?php
				
					}
					
				?>
				</center>
				</ul>
			</tbody>
		</table>
	</div>
	<script>
	// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
	</script>
</body>
</html>