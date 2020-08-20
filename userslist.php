<?php session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;

}
?>
<!DOCTYPE HTML>
<html>
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
   <link href="css/navtop.css" rel="stylesheet">

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
        <a href="subok.php?foldname=" class="text-dark list-group-item list-group-item-action bg-info">My Documents</a>
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
		<h3 class="text-dark">User List</h3>
		<br />
		<ul class="navtops">
		    <li><a href="register.php" class="btn btn-info">Create New User</a></li>
            <li><a href="deactivated_users.php" class="btn btn-info">Deactivated User</a></li>
            </ul>
		<br />
		<table class="table table-bordered" id="myTable">
			<thead class="thead-dark">
				<tr>
					<th onclick="w3.sortHTML('#myTable', '.item', 'td:nth-child(1)')" style="cursor:pointer">User Name</th>
					<th onclick="w3.sortHTML('#myTable', '.item', 'td:nth-child(2)')" style="cursor:pointer">First Name</th>
					<th onclick="w3.sortHTML('#myTable', '.item', 'td:nth-child(3)')" style="cursor:pointer">Last Name</th>
					<th onclick="w3.sortHTML('#myTable', '.item', 'td:nth-child(4)')" style="cursor:pointer">Email</th>
					
					<th>Action</th>
				</tr>
			</thead>
			<tbody >
				<?php
					require 'connection.php';
					$row = $conn->query("SELECT * FROM `user_login` WHERE usertype = 'user' and status = 'active'") or die(mysqli_error());
					while($fetch = $row->fetch_array()){
				?>
					<tr class="item">
						<?php 
							$name = explode('/', $fetch['username']);
						?>
						<td>
						<p><?php echo $fetch['username']?></p>
						
						<a href="view_shared.php?share=<?php echo $name[0]?>">View file shared</a>
						</td>
						<td>
	
						<p><?php echo $fetch['firstname']?></p>
						
						</td>
						<td>
						
						<p><?php echo $fetch['lastname']?></p>
						

						</td>
						<td>
						
						<p><?php echo $fetch['email']?></p>
						

						</td>
						<td >
						    <center>
						<?php
						$uid=$fetch['id'];
						$uname=$fetch['username'];
						
						?>
						<a onClick="return checkDelete()" href="deactivate.php?id=<?php echo $uid ?>" class="btn btn-danger">Deactivate User</a>
						
						<a href="update.php?id=<?php echo $uid ?>" class="btn btn-info">Update Password</a>
						
						<a onClick="return checkDelete()" href="deleteuser.php?usern=<?php echo "$uname"?>" class="btn btn-danger">Delete User</a>
						</center>
						</td>
					</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
	</div>
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