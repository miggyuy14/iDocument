<?php
session_start();
require 'connection.php';
$_SESSION['folde']=$_GET['foldname'];
$_SESSION['folddis']=$_GET['folddes'];
$_SESSION['foldids']=$_GET['foldid'];
$_SESSION['foldf']=$_GET['favorite'];
$_SESSION['permanent']=$_GET['checkpermanent'];
$_SESSION['move_name']=$_GET['file'];
$_SESSION['move_path']=$_GET['filepath'];
$_SESSION['move_id']=$_GET['fileid'];
$_SESSION['move_to']=$_GET['moveto'];
$permanent=$_SESSION['permanent'];
$fave=$_SESSION['foldf'];
$names=$_SESSION['folde'];
$descip=$_SESSION['folddis'];
$foldid=$_SESSION['foldids'];
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
	
	
	<div class="col-md-8 well">
	    <?php 
	    if($names!=null){
	    ?>
		<h3 class="text-dark"><?php echo "$names"?></h3>
		<h4  class="text-dark"><?php echo "$descip"?></h4>
		<?php
	    }else{
		?>
		<h3 class="text-dark">Please Choose a Folder</h3>
		<?php } ?>
		<hr style="border-top:1px dottec #ccc;">
		

		<table class="table table-bordered" id="myTable">
			<thead class="thead-dark">
				<tr>
					<th onclick="w3.sortHTML('#myTable', '.item', 'td:nth-child(1)')" style="cursor:pointer">Name</th>
					<th onclick="w3.sortHTML('#myTable', '.item', 'td:nth-child(2)')" style="cursor:pointer">File Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody class="">
				<?php	
					$row = $conn->query("SELECT * FROM `file` WHERE folder_loc = '".$names."'") or die(mysqli_error());
					while($fetch = $row->fetch_array()){
				?>
					<tr class="item">
						<?php 
						    $status= explode('/', $fetch['status']);
							$name = explode('/', $fetch['filepath']);
							$name2 = explode('/', $fetch['name']);
							$id = explode('/', $fetch['file_id']);
							$folder = explode('/', $fetch['folder_loc']);
							$filefetchtype=$fetch['filepath'];
							$file_part = pathinfo($filefetchtype, PATHINFO_EXTENSION);
						?>
						<td><a href="preview.php?file=<?php echo $name[1]?>"target="_blank"><?php echo $status[0]?> <?php echo $fetch['name'];?></a>
                            
						</td>
						<td><p><?php echo $file_part?></p>
                            
						</td>
						<td><a href="download.php?file=<?php echo $name[1]?>" class="btn btn-info"><span class="glyphicon glyphicon-download"></span> Download</a>
						<a href="share.php?file=<?php echo $name2[0]?>&filepaths=<?php echo $name[1]?>" class="btn btn-info">Share file</a>
						<a href="#>" data-toggle="modal" data-target="#movefile" class="btn btn-info">Move file</a>
						<a onClick="return checkDelete()" href="deletefile.php?fileid=<?php echo $id[0]?>&file=<?php echo $name2[0]?>&filepaths=files/<?php echo $name[1]?>&filefolder=<?php echo $folder[0]?>" class="btn btn-danger">Delete file</a>
						
						</td>
						
					</tr>
				<?php
					}
					
				?>
			</tbody>
		</table>
	</div>

	<div class="col-md-4">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <div class="file-manager">
                    <h5>Options:</h5>
                   
                    <a href="#" class="file-control" data-toggle="modal" data-target="#newfolder">New Folder</a>
                    <a class="file-control" onClick="return checkDelete()" href="deletefolder.php?foldername=<?php echo "$names"?>&checkperm=<?php echo $permanent?>" class="btn btn-danger">Delete Folder</a>
                    <a class="file-control" onClick="return checkDelete()" href="back_up.php" class="btn btn-info">Back up Files</a>
                    
                    <a class="file-control" onClick="return checkDelete()" href="favorite.php?favo=<?php echo $fave?>" class="btn btn-info">Mark/Unmark as Favorite</a>
                    
                    
                    <div class="hr-line-dashed"></div>
                    <button class="btn btn-info btn-block" data-toggle="modal" data-target="#upload">Upload Files</button>
                    <div class="hr-line-dashed"></div>
                    <h5>Favorites</h5>
				<?php
					require 'connection.php';
					
					$row = $conn->query("SELECT * FROM `folder` WHERE favorite='yes'") or die(mysqli_error());
					while($fetch = $row->fetch_array()){
						
						$namefolder = explode('/', $fetch['folder_name']);
							$description = explode('/', $fetch['folder_description']);
				?>
				
                    <ul class="list folder-list " style="padding: 0" id="myList">
                        <li><a href="subok.php?foldname=<?php echo $fetch['folder_name']?>&folddes=<?php echo $fetch['folder_description']?>&favorite=<?php echo $fetch['favorite']?>&foldid=<?php echo $fetch['id']?>&checkpermanent=<?php echo $fetch['permanent']?>"><i class="fas fa-folder-open"></i> <?php echo $fetch['folder_name'];?></a></li>
                        
                    </ul>
					<?php
				  
					}
					
				?>
                    <div class="hr-line-dashed"></div>
                    
                    <h5>Folders</h5>
                    <input id="myInput" type="text" placeholder="Search..">
					<?php
					require 'connection.php';
					
					$row = $conn->query("SELECT * FROM `folder` WHERE permanent='no'") or die(mysqli_error());
					while($fetch = $row->fetch_array()){
						
						$namefolder = explode('/', $fetch['folder_name']);
							$description = explode('/', $fetch['folder_description']);
							$checkperms = explode('/', $fetch['permanent']);
				?>
				
                    <ul class="list folder-list " style="padding: 0" id="myList">
                        <li><a href="subok.php?foldname=<?php echo $fetch['folder_name']?>&folddes=<?php echo $fetch['folder_description']?>&favorite=<?php echo $fetch['favorite']?>&foldid=<?php echo $fetch['id']?>&checkpermanent=<?php echo $fetch['permanent']?>"><i class="fa fa-folder"></i><span class="glyphicon glyphicon-folder-open"></span> <?php echo $fetch['folder_name'];?></a></li>
                        
                    </ul>
					<?php
				
					}
					
				?>
				</div>
				<div class="hr-line-dashed"></div>
                     <h5 class="tag-title">Recovery</h5>
                    <?php
					require 'connection.php';
					
					$row = $conn->query("SELECT * FROM `folder` WHERE folder_name='Recovered files'") or die(mysqli_error());
					while($fetch = $row->fetch_array()){
						
						$namefolder = explode('/', $fetch['folder_name']);
							$description = explode('/', $fetch['folder_description']);
							$checkperm = explode('/', $fetch['permanent']);
				?>
				
                    <ul class="list folder-list " style="padding: 0" id="myList">
                        <li><a href="subok.php?foldname=<?php echo $fetch['folder_name']?>&folddes=<?php echo $fetch['folder_description']?>&favorite=<?php echo $fetch['favorite']?>&foldid=<?php echo $fetch['id']?>&checkpermanent=<?php echo $checkperm[0]?>"><i class="fa fa-folder"></i><span class="glyphicon glyphicon-folder-open"></span> <?php echo $fetch['folder_name'];?></a></li>
                        
                    </ul>
					<?php
				  
					}
					
				?>
                
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript">
</script>

<div class="container">

  <!-- Modal -->
  <div class="modal fade bd-example-modal-lg" id="upload" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
		
          
          <h4 class="modal-title">Upload File</h4>
        </div>
        <div class="modal-body">
          <form class="form-inline" method="POST" action="upload.php" enctype="multipart/form-data">
			<input class="form-control" type="file" name="upload" required/>
            <input class="form-control" type="text" name="filename" placeholder="input file name" required/>
 
			<button type="submit" class="btn btn-success form-control" name="submit"><span class="glyphicon glyphicon-upload"></span>Upload</button>
		</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

<div class="container">

  <!-- Modal -->
  <div class="modal fade" id="newfolder" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
		
          
          <h4 class="modal-title">Create new folder</h4>
        </div>
        <div class="modal-body">
            <?php
require_once "db_connect.php";

$fname = $finfo = "";
$fname_err = $finfo_err =  "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate fname
    if(empty(trim($_POST["foldername"]))){
        $fname_err = "Please enter a folder name.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM folder WHERE folder_name = ?";
        
        if($stmt = mysqli_prepare($connection, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_fname);
            
            // Set parameters
            $param_fname = trim($_POST["foldername"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $fname_err = "This folder name is already taken.";
                    echo "<script type='text/javascript'>alert('Error: Folder name already taken')</script>";
                    echo "<script>window.history.back();</script>";
                   
                } else{
                    $fname = trim($_POST["foldername"]);
                }
            } else{
                        echo "<script type='text/javascript'>alert('Something Went Wrong!')</script>";
                        echo "<script>window.history.back();</script>";
				 
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate finfo
    if(empty(trim($_POST["folder_info"]))){
        $finfo_err = "Please enter a finfo.";     
    } elseif(strlen(trim($_POST["folder_info"])) < 1){
        $finfo_err = "finfo must have atleast 1 characters.";
    } else{
        $finfo = trim($_POST["folder_info"]);
    }
    
   
    
    // Check input errors before inserting in database
    if(empty($fname_err) && empty($finfo_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO folder (folder_name, folder_description) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($connection, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_fname, $param_finfo);
            
            // Set parameters
            $param_fname = $fname;
            $param_finfo = $finfo;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                echo "<script>window.history.back();</script>";
            } else{
                echo "<script type='text/javascript'>alert('<?php echo $finfo_err?>')</script>";
                        echo "<script>window.history.back();</script>";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($connection);
}
	?>
		<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		<div class="form-group <?php echo (!empty($fname_err)) ? 'has-error' : ''; ?>">
                <label>Folder Name</label>
                
                <input type="text" name="foldername" class="form-control" value="<?php echo $fname; ?>" maxlength="40" require>
                <span class="help-block"><?php echo $fname_err; ?></span>
            </div>
            
                <div class="form-group <?php echo (!empty($finfo_err)) ? 'has-error' : ''; ?>">
                <label>Folder Description</label>
                <input type="textarea" name="folder_info" class="form-control" value="<?php echo $finfo; ?>"maxlength="250" require>
                <span class="help-block"><?php echo  $finfo_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-info" value="Submit">
            </div>
            </form>
        
		</div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>
      </div>
      
    </div>
  </div>
  


<div class="container">

  <!-- Modal -->
  <div class="modal fade" id="movefile" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
		
          	<table class="table table-bordered" id="myTable">
			<thead class="thead-dark">
				<tr>
					<th onclick="w3.sortHTML('#myTable', '.item', 'td:nth-child(1)')" style="cursor:pointer">Name</th>
					
					<th>Action</th>
				</tr>
			</thead>
			<tbody class="">
				<?php	
					$row = $conn->query("SELECT * FROM `folder` WHERE permanent='no'") or die(mysqli_error());
					while($fetch = $row->fetch_array()){
				?>
					<tr class="item">
						<?php 
							$namef = explode('/', $fetch['folder_name']);
							$namef2 = explode('/', $fetch['folder_description']);
							$idf = explode('/', $fetch['id']);
							
						?>
						<td><?php echo $fetch['folder_name'];?>
                            
						</td>
						
						<td>
						<a href="movefile.php?moveto=<?php echo $namef[0]?>&fileid=<?php echo $id[0]?>" class="btn btn-info">Move here</a>
						
						
						</td>
						
					</tr>
				<?php
					}
					
				?>
			</tbody>
		</table>
		
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
</div>
</div>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myList li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
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

</body>

</html>
