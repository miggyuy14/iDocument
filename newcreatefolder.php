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
                    
                   mysqli_close(); 
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