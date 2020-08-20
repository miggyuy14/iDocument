<?php
session_start();
require 'connection.php';

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
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

  <title>Admin</title>

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
	
	
	<div class="col-md-12 well">
		<h3 class="text-info">Recycle Bin</h3>
		<hr style="border-top:1px dottec #ccc;">
		
		    <a href="clear_recycle_bin.php" class="btn btn-danger">Clear Recycle Bin</a>
           
            
		<br /><br />
		<table class="table table-bordered" id="myTable">
			<thead class="thead-dark">
				<tr>
					<th onclick="w3.sortHTML('#myTable', '.item', 'td:nth-child(1)')" style="cursor:pointer">Name</th>
					<th onclick="w3.sortHTML('#myTable', '.item', 'td:nth-child(2)')" style="cursor:pointer">File Type</th>
					<th onclick="w3.sortHTML('#myTable', '.item', 'td:nth-child(3)')" style="cursor:pointer">Folder Location</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody class="">
				<?php	
					$row = $conn->query("SELECT * FROM `recycle_bin`") or die(mysqli_error());
					while($fetch = $row->fetch_array()){
				?>
					<tr class="item">
						<?php 
							$name2 = explode('/', $fetch['filename']);
							$name = explode('/', $fetch['filepath']);
							$id = explode('/', $fetch['id']);
							$folder = explode('/', $fetch['filefolder']);
							$filefetchtype=$fetch['filepath'];
							$file_part = pathinfo($filefetchtype, PATHINFO_EXTENSION);
						?>
						<td><a  href="preview.php?file=<?php echo $name[1]?>"target="_blank"><?php echo $fetch['filename'];?></a>
						
						</td>
						<td><p><?php echo $file_part?></p>
                            
						</td>
						<td><p><?php echo $folder[0]?></p>
                            
						</td>
						<td>
						<a onClick="return checkDelete()" href="restore.php?fileid=<?php echo $id[0]?>&file=<?php echo $name2[0]?>&filepaths=files/<?php echo $name[1]?>&filefolder=<?php echo $folder[0]?>" class="btn btn-info">Restore File</a>
						<a onClick="return checkDelete()" href="permanent_delete.php?fileid=<?php echo $id[0]?>&file=<?php echo $name2[0]?>&filepaths=files/<?php echo $name[1]?>&filefolder=<?php echo $folder[0]?>" class="btn btn-danger">Delete File</a>
						</td>
					</tr>
				<?php
					}
					
				?>
			</tbody>
		</table>
	</div>
	
	

  
  
</body>


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
  



</html>