<?php
require 'connection.php';
session_start();
$username=$_SESSION['username'];
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="https://www.w3schools.com/lib/w3.js"></script>
		<link rel="stylesheet" type="text/css" href="css/navbar.css"/>
		<link rel="stylesheet" type="text/css" href="css/navtop.css"/>

		
		<link rel="stylesheet" type="text/css" href="css/fileorg.css"/>
		<script src="js/navbar.js"></script>
		<meta charset="utf-8">
		  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">

		<link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>User</title>

  <!-- Bootstrap core CSS -->
  

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">
<script language="JavaScript" type="text/javascript">
		
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

<body >
<div class="watermark"></div>
   
     <div class="d-flex" id="wrapper">
   
  
		
<div class="bg-info border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">iDOCUMENT</div>
      <div class="list-group list-group-flush">
        <a href="userdownload.php" class="text-dark list-group-item list-group-item-action bg-info">My Documents</a>
        <a href="userfiles.php" class="text-dark list-group-item list-group-item-action bg-info">Shared Documents</a>
        <a href="userterms-conditions.php" class="text-dark list-group-item list-group-item-action bg-info">Terms and Conditions</a>

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
              <a class="nav-link" href="userhome.php">Home</a>
            </li>
            <li class="nav-item text-dark">
              <a class="nav-link text-dark"  onClick="return checkDelete()" href="logout.php">Log Out</a>
            </li>
            
          </ul>
        </div>
      </nav>
	<div class="d-flex" id="wrapper">
	
	
	<div class="col-md-8 well">
	<h2>Welcome <?php echo $username?></h2>
	<br>
	<h4>Welcome to iDocument</h4>
	<br>
	<h4>Access your files anytime and anywhere!</h4>
	</br>
	<h4>Notifications:</h4>
	<table>
	    <?php	
					$row = $conn->query("SELECT * FROM `user_upload` WHERE seen='no' AND shared_by='admin' AND uploaded_by='$username' ORDER BY date_uploaded") or die(mysqli_error());
					while($fetch = $row->fetch_array()){
				?>
					<tr>
						<?php 
							$name = explode('/', $fetch['filepath']);
							$name2 = explode('/', $fetch['filename']);
							$id = explode('/', $fetch['id']);
							$folder = explode('/', $fetch['uploaded_by']);
						?>
						<td><a href="userfiles.php"><p>* <?php echo $fetch['filename'];?>-</p></a> 
                            
						</td>
						<td><p>shared by: <?php echo $fetch['shared_by'];?></p>
						
						</td>
						
					</tr>
				<?php
					}
					
				?>
	</table>
	
	</div>
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