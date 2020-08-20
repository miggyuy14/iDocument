<?php
$connection = mysqli_connect('localhost', 'u891156230_RodGroup', 'idocument12345');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'u891156230_iDocument');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}