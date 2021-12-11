<?php
 require "db_connection.php";

$username =$_POST["username"];
$password =$_POST["password"];
 $sql_query = "SELECT username FROM admin WHERE `username` = '$username' AND `password` = '$password' ";

 $result = mysqli_query($conn,$sql_query);
 if(mysqli_num_rows($result) > 0 ){
	header("location: Dash.php");
 }
 else{
 	header("location: error.php");
 }
 ?>