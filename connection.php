<?php
  $conn = new mysqli('localhost', 'u891156230_RodGroup', 'idocument12345', 'u891156230_iDocument');
    if($conn->connect_error){
      die("Fatal Error: Can't connect to database: ". $conn->connect_error);
    }
?>