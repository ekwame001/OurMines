<?php
// Process delete operation after confirmation
if(isset($_POST["clientID"]) && !empty($_POST["clientID"])){

    // Include database connection file
    require_once "db_connection.php";
    
    // Prepare a delete statement
    $sql = "DELETE FROM clientOrder WHERE clientID = ?";
    
    if($stmt = mysqli_prepare($conn, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_clientID);
        
        // Set parameters
        $param_clientID = trim($_POST["clientID"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            // Records deleted successfully. Redirect to landing page
            header("location: Dash.php");
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($conn);
} else{
    // Check existence of clientID parameter
    if(empty(trim($_GET["clientID"]))){
        // URL doesn't contain clientID parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            wclientIDth: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluclientID">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5 mb-3">Delete Record</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger">
                            <input type="clientID" name="clientID" value="<?php echo trim($_GET["clientID"]); ?>"/>
                            <p>Are you sure you want to delete this client order?</p>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="Dash.php" class="btn btn-secondary">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
