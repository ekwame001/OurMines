<?php

require_once "db_connection.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Admin Login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    

     <!-- Custom styles for this template -->
     <link href="signin.css" rel="stylesheet">

     <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
     </style>   

</head>

<body >
<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Admin Login</h2>

   
      <form action="adminLogin.php" method="POST">
       
    
        <div class="form-group">
          <input type="text" class="form-control" id="floatingInput" name="username" placeholder="Username" required>
        </div>
        <br>
    
        <div class="form-group">
          <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
        </div>
    
        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
         <input type="submit" class="btn btn-primary" value="Login"> 
        <!-- <a href="dashboard.php" class="btn btn-primary ml-2">Login</a> -->
        <a href="mines.php" class="btn btn-secondary ml-2">Cancel</a>
        <!-- <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p> -->
      </form>
    
    
    </div>
    

<?php

?>
</body>
</html>

