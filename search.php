<?php
session_start();
require 'connection.php';
$_SESSION['folde']=$_GET['foldname'];
$names=$_SESSION['folde'];
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<script src="https://www.w3schools.com/lib/w3.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">  
        <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<script language="JavaScript" type="text/javascript">
            function checkDelete(){
                return confirm('Are you sure?');
            }
            </script>
  <link href="css/simple-sidebar.css" rel="stylesheet">

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

	
	<div class="col-md-2"></div>
	<div class="col-md-12 well">
		<h3 class="text-info">Search for files</h3>
		<hr style="border-top:1px dottec #ccc;">
		<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for files.." title="Type in a file name">
		<br /><br />
		<table class="table table-bordered" id="myTable">
		    
    
			<thead class="thead-dark">
				<tr>
					<th onclick="w3.sortHTML('#myTable', '.item', 'td:nth-child(1)')" style="cursor:pointer">File Name</th>
					<th onclick="w3.sortHTML('#myTable', '.item', 'td:nth-child(2)')" style="cursor:pointer">File Type</th>
					<th onclick="w3.sortHTML('#myTable', '.item', 'td:nth-child(3)')" style="cursor:pointer">Date Uploaded</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody class="">
				<?php	
					$row = $conn->query("SELECT * FROM `file`") or die(mysqli_error());
					while($fetch = $row->fetch_array()){
				?>
					<tr class="item">
						<?php 
							$name = explode('/', $fetch['filepath']);
							$name2 = explode('/', $fetch['name']);
							$id = explode('/', $fetch['file_id']);
							$folder = explode('/', $fetch['folder_loc']);
							$date = explode('/', $fetch['date_uploaded']);
							$filefetchtype=$fetch['filepath'];
							$file_part = pathinfo($filefetchtype, PATHINFO_EXTENSION);
						?>
						<td><a href="preview.php?file=<?php echo $name[1]?>"target="_blank"><?php echo $name2[0];?></a>
                            
						</td>
						<td><p><?php echo $file_part?></p>
                            
						</td>					
						<td><p><?php echo $date[0]?></p>
                            
						</td>
						
						<td><a href="download.php?file=<?php echo $name[1]?>" class="btn btn-info"><span class="glyphicon glyphicon-download"></span> Download</a>
						<a href="share.php?file=<?php echo $name2[0]?>&filepaths=<?php echo $name[1]?>" class="btn btn-info"><span class="glyphicon glyphicon-share"> </span> Share file</a>
						<a href="deletefile.php?fileid=<?php echo $id[0]?>&file=<?php echo $name2[0]?>&filepaths=files/<?php echo $name[1]?>&filefolder=<?php echo $folder[0]?>" class="btn btn-info">Delete file</a>
						
						</td>
						
					</tr>
				<?php
					}
					
				?>
			</tbody>
		</table>
	</div>
</div>
</div>
</body>
<script>
//search
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}


</script>
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
