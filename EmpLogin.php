<?php
// Check if the user is already logged in, if yes then redirect him to welcome page
session_start();
require_once "config.php";


$username = $password = "";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    
require_once "config.php";
 


$username_err = $password_err = $login_err = "";

if(empty(trim($_POST["empID"])))
{
    $username_err = "Please enter a Employee ID.";
}
else{
    $username = $_POST["empID"];
}
if(empty(trim($_POST["emppwd"])))
{
    $password_err = "Please enter a password";
}
else{
    $password = $_POST["emppwd"];
}

if(empty($username_err) && empty($password_err)){

    $sql = " SELECT * FROM employee WHERE empID='$username' AND emppwd='$password' ";
    $result = $mysqli->query($sql);

    if($result->num_rows == 1)
    {
       $row = $result->fetch_assoc();
       if($row['empID'] == $username && $row['emppwd'] == $password) 
       {      
        $_SESSION['empID'] = $username;  
        $_SESSION['logged'] = TRUE;
        header("Location: employee.php");
        exit;
       }
       else{
        echo "Oops! Something went wrong. Please try again later.";
       }
    }
    else{
        $login_err = "Employee ID or password is wrong";
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
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
<style>
    .wrapper{  width: 360px; padding: 20px; border: solid; margin-left : 38%}
</style>
<header>
<nav class="navbar navbar-expand-lg  my-2" style="background-color: rgba(45, 115, 245, 0.1)">
  <a class="navbar-brand navbar-text text-dark px-3" href="home.php">SS Medicals</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button> 
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav"> 
      <li class="nav-item">
        <a class="nav-link navbar-text text-dark px-3" href="aboutus.php">AboutUs</a>
      </li>
    </ul>
  </div>
</nav>

</header>
<br>
    <div class="wrapper">
    <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
<style>
    #avatar{
        align: center;
    }
    </style>
        <div class="imgcontainer" style="left-padding: 40%; margin-left: 29%;">
    <img src="img\user.png" class="avatar"> </div>
        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="Emplogin.php" method="POST">
            <div class="form-group">
                <label>Employee ID</label>
                <input type="text" name="empID" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>

            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="emppwd" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
           
            </select>
            <div class="form-group" style="margin-top:10px;">
                <input type="submit" name="submit" class="btn btn-primary" value="Login">
            </div>
        </form>
    </div>
</body>
</html>




