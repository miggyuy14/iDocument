<?php 

session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">
<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure?');
}
</script>
<style>
  .watermark{
    background:url("scs.png") right bottom no-repeat;
  opacity: 0.5;
  position: fixed;
  width: 100%;
  height: 100%;

} 
</style>
</head>

<body>
    <div class="watermark"></div>
    
  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-info border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">iDOCUMENT</div>
      <div class="list-group list-group-flush">
        <a href="subok.php?foldname=" class="text-dark list-group-item list-group-item-action bg-info">Documents</a>
        <a href="userfiles_view.php" class="text-dark list-group-item list-group-item-action bg-info">User Documents</a>
        <a href="search.php" class="text-dark list-group-item list-group-item-action bg-info">File Search</a>
        <a href="userslist.php" class="text-dark list-group-item list-group-item-action bg-info">Users</a>
        <a href="reports.php" class="text-dark list-group-item list-group-item-action bg-info">System Report</a>
        <a href="terms-conditions.php" class="text-dark list-group-item list-group-item-action bg-info">Terms and Conditions</a>
        <a href="trashbin.php" class="text-dark list-group-item list-group-item-action bg-info">Recycle Bin</a>
        <a href="back_up_page.php" class="text-dark list-group-item list-group-item-action bg-info">Back up</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-secondary border-bottom">
        <button class="btn btn-info" id="menu-toggle">☰ </button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item text-dark">
              <a class="nav-link" href="adminhome.php">Home</a>
            </li>
            <li class="nav-item text-dark">
              <a class="nav-link text-dark"  onClick="return checkDelete()" href="logout.php">Log Out</a>
            </li>
            
          </ul>
        </div>
      </nav>

      <div class="d-flex" id="wrapper">
	
	
	<div class="col-md-8 well">
       <h2>Welcome Admin!</h2>
	<br>
	<h4>Welcome to iDocument</h4>
	<br>
	<h4>Upload and access your file anytime and anywhere!</h4>
	<br>
	<h4>Notifications:</h4>
	<table>
	    <?php	
	    require 'connection.php';
					$row = $conn->query("SELECT * FROM `user_upload` WHERE shared_by='user' AND seen='no' ORDER BY date_uploaded") or die(mysqli_error());
					while($fetch = $row->fetch_array()){
				?>
					<tr>
						<?php 
							$name = explode('/', $fetch['filepath']);
							$name2 = explode('/', $fetch['filename']);
							$id = explode('/', $fetch['id']);
							$folder = explode('/', $fetch['uploaded_by']);
						?>
							
						<td><p><a href="userfiles_view.php">* <?php echo $fetch['filename'];?></a></p> 
                            
						</td>
						<td><p>Uploaded by: <?php echo $fetch['uploaded_by'];?></a></p>
						
						</td>
						
					</tr>
				<?php
					}
					
				?>
	</table>
	
	
	</div>
	</div>
      </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>