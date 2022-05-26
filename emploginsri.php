<?php  
// Initialize the session
session_start();
  
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$empID = $emppwd = "";
$empID_err = $pemppwd_err = $login_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if empID is empty
    if(empty(trim($_POST["empID"]))){
        $empID_err = "Please enter empID.";
    } else{
        $empID = trim($_POST["empID"]);
    }
    
    // Check if emppwd is empty
    if(empty(trim($_POST["emppwd"]))){
        $emppwd_err = "Please enter your password.";
    } else{
        $emppwd = trim($_POST["emppwd"]);
    }
    
    // Validate credentials
    if(empty($empID_err) && empty($emppwd_err)){
        // Prepare a select statement
        $sql = "SELECT empID, emppwd FROM users WHERE empID = $empID";
        $result = $mysqli->query($sql);

    if($result->num_rows == 1)
    {
       $row = $result->fetch_assoc();
       if($row['empID'] == $empID && $row['emppwd'] == $emppwd) 
       {      
        $_SESSION["empID"] = $empID;  
        $_SESSION["loggedemp"] = TRUE;
        header("Location: online.php");
        exit;
       }
       else{
        echo "Oops! Something went wrong. Please try again later.";
       }  
    }
    else{
        $login_err = "Username or password is wrong";
    }
    // Close connection
    $mysqli->close();
}
}
?>  
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

    <style>
        body{ font: 14px sans-serif; 
            background-color: rgb(241, 238, 248);}
        .wrapper{ width: 360px; padding: 20px; 
        border: solid 2px;
    margin-left: 35%;}
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg  my-2" style="background-color: rgba(45, 115, 245, 0.1)">
  <a class="navbar-brand navbar-text text-dark px-3" href="home.php">SS Medicals</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button> 
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav"> 
      <li class="nav-item">
        <a class="nav-link navbar-text text-dark px-3" href="EmpSignup.php">SignUp</a>
      </li>
      <li class="nav-item">
        <a class="nav-link navbar-text text-dark px-3" href="aboutus.php">AboutUs</a>
      </li>
    </ul>
  </div>
</nav>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
<style>
    #avatar{
        align: center;
    }
    </style>
        <div class="imgcontainer" style="left-padding: 40%; margin-left: 29%;">
    <img src="img\user.png" class="avatar">
  </div>

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="" method="POST">
            <div class="form-group">
                <label>Employee ID</label>
                <input type="text" name="empID" class="form-control <?php echo (!empty($empID_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $empID; ?>">
                <span class="invalid-feedback"><?php echo $empID_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="emppwd" class="form-control <?php echo (!empty($emppwd_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $emppwd_err; ?></span>
            </div>
            <div class="form-group">
            <a href="employee.php" type="submit" class="btn btn-primary"> Login</a>
            </div>
 
        </form>
    </div>
</body>
</html> 