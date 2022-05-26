<?php
// Check if the user is already logged in, if yes then redirect him to welcome page
session_start();
require_once "config.php";


$username = $password = "";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    
require_once "config.php";
 


$username_err = $password_err = $login_err = "";

if(empty(trim($_POST["username"])))
{
    $username_err = "Please enter a username.";
}
else{
    $username = $_POST["username"];
}
if(empty(trim($_POST["password"])))
{
    $password_err = "Please enter a password";
}
else{
    $password = $_POST["password"];
}

if(empty($username_err) && empty($password_err) && isset($_POST['branchID'])){

    $sql = " SELECT * FROM customer WHERE userName='$username' AND pwd='$password' ";
    $result = $mysqli->query($sql);

    $_SESSION['branchID'] = $_POST['branchID'];
    if($result->num_rows == 1)
    {
       $row = $result->fetch_assoc();
       if($row['userName'] == $username && $row['pwd'] == $password) 
       {      
        $_SESSION['userName'] = $username;  
        $_SESSION['logged'] = TRUE;
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
        <a class="nav-link navbar-text text-dark px-3" href="signUp.php">SignUp</a>
      </li>
      <li class="nav-item">
        <a class="nav-link navbar-text text-dark px-3" href="aboutus.php">AboutUs</a>
      </li>
    </ul>
  </div>
</nav>
</header>
<br>
    <div class="wrapper">
        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="login.php" method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>

            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <label>Branch Name</label>
            <br>
            <select class="form-select form-control" aria-label="Default select example" name="branchID">
            <option selected>Open this select menu</option>
            <?php 
            $sql2 = "SELECT branchID From branch";
            $result2 = $mysqli->query($sql2);
 
            while($row = $result2->fetch_assoc()): ?>
                <option value="<?php echo $row['branchID']; ?>"><?php echo $row['branchID']; ?></option>
            <?php endwhile; ?>
            </select>
            <div class="form-group" style="margin-top:10px;">
                <input type="submit" name="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="signup.php">Sign up now</a>.</p>
        </form>
    </div>
</body>
</html>

