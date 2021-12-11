<?php 
// Include config file
require_once "db_connection.php";
 
// Define variables and initialize with empty values
$clientName = $Email = $contact= $productName =$quantity = "";
$clientName_err = $Email_err= $contact_err= $productName_err = $quantity_err= "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate clientName
    $input_clientName = trim($_POST["clientName"]);
    if(empty($input_clientName)){
        $clientName_err = "Please enter your name.";
    } elseif(!filter_var($input_clientName, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $clientName_err = "Please enter a valid client name.";
    } else{
        $clientName = $input_clientName;
    }
    
    // Validate Email
    $input_Email = trim($_POST["Email"]);
    if(empty($input_Email)){
        $Email_err = "Please enter an email.";     
    } else{
        $Email = $input_Email;
    }
    
    // Validate contact
    $input_contact = trim($_POST["contact"]);
    if(empty($input_contact)){
        $contact_err = "Please enter your contact.";     
    } elseif(!ctype_digit($input_contact)){
        $contact_err = "Please enter a positive integer values.";
    } else{
        $contact = $input_contact;
    }

    // Validate Email
    $input_productName = trim($_POST["productName"]);
    if(empty($input_productName)){
        $productName_err = "Please enter name of the product.";     
    } else{
        $productName = $input_productName;
    }

    // Validate Quantity
    $input_quantity = trim($_POST["quantity"]);
    if(empty($input_quantity)){
        $quantity_err = "Please enter a quantity.";     
    } else{
        $quantity = $input_quantity;
    }


    // Check input errors before inserting in database
    if(empty($clientName_err) && empty($Email_err) && empty($contact_err)&& empty($productName_err)&& empty($quantity_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO clientOrder (clientName, Email, contact, productName, quantity) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssi", $param_clientName, $param_Email, $param_contact,$param_productName, $param_quantity);
            
            // Set parameters
            $param_clientName = $clientName;
            $param_Email = $Email;
            $param_contact = $contact;
            $param_productName=$productName;
            $param_quantity=$quantity;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: mines.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($conn);
}
?> 

 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create Record</h2>
                    <p>Please fill this form and submit to add client order record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Name of Client</label>
                            <input type="text" name="clientName" class="form-control <?php echo (!empty($clientName_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $clientName; ?>">
                            <span class="invalid-feedback"><?php echo $clientName_err;?></span>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="Email" class="form-control <?php echo (!empty($Email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Email; ?>">
                            <span class="invalid-feedback"><?php echo $Email_err;?></span>
                        </div>

                        <div class="form-group">
                            <label>Contact</label>
                            <input type="text" name="contact" class="form-control <?php echo (!empty($contact_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $contact; ?>">
                            <span class="invalid-feedback"><?php echo $contact_err;?></span>
                        </div>

                        <div class="form-group">
                            <label>Name of Product</label>
                            <input type="text" name="productName" class="form-control <?php echo (!empty($productName_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $productName; ?>">
                            <span class="invalid-feedback"><?php echo $productName_err;?></span>
                        </div>

                        <div class="form-group">
                            <label>Quantity</label>
                            <input type="text" name="quantity" class="form-control <?php echo (!empty($quantity_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $quantity; ?>">
                            <span class="invalid-feedback"><?php echo $quantity_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="mines.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>