<?php
require "db_credentials.php";

// create connection
$conn = mysqli_connect(sname,username,password,db);


if($conn === false){
    die("Connection failed: " . mysqli_connect_error());
}

?>

