<?php 
require 'connection.php';
session_start();
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
      <div class="sidebar-heading">IDOCUMENT</div>
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
            <h2>TERMS & CONDITIONS</h2>
        
        <h3>Welcome to iDOCUMENT!</h3>
        <p>These Terms & Conditions govern your use of iDocument and provide information about the iDocument Service, outlined below.</p>
        
        <p>1. Upon using iDocument, you agree to its TERMS & CONDITIONS. Otherwise, you may stop using iDocument.</p>
        
        <p>2. The users of iDocument are solely Part-time or Full-time Professors of the School of Computer Studies (SCS) Department and may depend on the Program Chair's approval; </p>
        
        <p>2.1. Unless, otherwise, a request to create a user account from other department will be approved by the Program Chair of the SCS Department.</p>
        
        <p>3. All documents or files that were uploaded to iDocument are considered confidential.</p>
        
        <p>4. All documents or files the were uploaded are not to be shared nor printed, unless, otherwise, stated.</p>
        
        <p>5. All documents or files that were uploaded with user's personal information will not be shared to any third party organization/ groups/ institution.</p>
        
        <p>6. The administrator of iDocument reserves the right to remove certain access to documents or files to users without prior notice to the concerned.</p>
        
        <p>7. The administrator of iDocument reserves the right to deactivate or delete user accounts, without prior notice to the concerned.</p>
        
        <p>8. iDocument is only to be used for documents or files concerning the SCS Department.</p>
        
        <p>9. iDocument is not be used for personal interest.</p>
        </br> 
        
        <h4>Contact Us  </h4>
        <h4>iDocument welcomes comments, questions, concerns, or suggestions. You may contact us or get support by sending an email to idocumentauscs@gmail.com</h4>
        
       
        </div>
        
    </body>
</html>