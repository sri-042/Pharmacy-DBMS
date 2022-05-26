<?php
// Include config file
require_once "config.php";
 ?>

<?php
// Define variables and initialize with empty values
$username = $password = $confirm_password = $addr = $gender = $phoneNo =$customerName = $emailID="";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement

        $username = $_POST["username"];
        $sql = "SELECT userName FROM customer WHERE userName = '$username'";
        $result = $mysqli->query($sql);
        if($result -> num_rows >=1)
        {
            $username_err = "UserName Already Exits!";
        }
        else{
            $username = $_POST['username'];
        }
        }

    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        // Prepare an insert statement
        $addr = $_POST['addr'];
        $gender = $_POST['gender'];
        $phoneNo = $_POST['phoneNo'];
        $customerName = $_POST['customerName'];
        $emailID = $_POST['emailID'];
        $branchID = $_POST['branchID'];
        $sql = "INSERT INTO customer (userName, addr,gender,phoneNo,customerName,emailID,pwd,branchID) VALUES ('$username', '$addr', '$gender','$phoneNo','$customerName','$emailID','$password','$branchID')";
         
        if($mysqli->query($sql) == FALSE)
        {
            echo "oops something went wrong! Try again";
            header("location: signUp.php");
            exit;
        }
        else{
            echo "<center><h2><b>Account Successfully Created</b></h2></center>";

           $to_email = $emailID;
            $subject = "Account Successfully Created";
            $body = "Hi, ".$customerName." your account has been created successfully !!!";
            $headers = "From: pharmacydb2022@gmail.com";
            
            
            if (mail($to_email, $subject, $body, $headers)) {
                echo "Email successfully sent to $to_email...";
                header("location: login.php");
            } 
            else {
                echo "Email sending failed...";
                
            }
        }
    $mysqli->close();
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; border: solid; margin-left : 38%}
    </style>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

<header>
<nav class="navbar navbar-expand-lg  my-2" style="background-color: rgba(45, 115, 245, 0.1)">
  <a class="navbar-brand navbar-text text-dark px-3" href="home.php">SS Medicals</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button> 
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav"> 
      <li class="nav-item">
        <a class="nav-link navbar-text text-dark px-3" href="login2.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link navbar-text text-dark px-3" href="aboutus.php">AboutUs</a>
      </li>
    </ul>
  </div>
</nav>

</header>

    <div class="wrapper">

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class = "row" style="padding-left:0%;">
            <div class = "col">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="customerName" class="form-control">
                </div>
            </div>  
            <div class = "col">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                    <span class="invalid-feedback"><?php echo $username_err; ?></span>
                </div> 
            </div>
        </div>
            <div class = "row">
            <div class = "col">   
            <div class="form-group">
                
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            </div>
            <div class = "col">
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            </div>
            <div class = "row" style="margin-left:0%">
            <div class = "col">
            <div class="form-group" >
            <label>Address</label>
                <textarea type="text" class="form-control" name="addr" id="inputAddress"></textarea>
            </div>
            </div>
            </div>
            <div class = "row" style="margin-left:0%">
            <div class = "col">
            <div class="form-group">
                <label>Gender</label> 
                <select class="custom-select" name="gender">
                <option selected>Open this select menu</option>
                <option value="M">Male</option>
                <option value="F">Female</option>
                <option value="O">Others</option>
                </select>
                </div>
            </div><br>

            </div>

            <div class = "row" style="margin-left:0%">
            <div class = "col">
            <div class="form-group">
                <label>Branch</label> 
                <select class="custom-select" name="branchID">
                <option selected>Open this select menu</option>
                <?php 
            $sql2 = "SELECT branchID From branch";
            $result2 = $mysqli->query($sql2);
 
            while($row = $result2->fetch_assoc()): ?>
                <option value="<?php echo $row['branchID']; ?>"><?php echo $row['branchID']; ?></option>
            <?php endwhile; ?>
                </select>
                </div>
            </div><br>

            </div>
            <div class = "col">
            <div class="form-group">
                <label>PhoneNo</label>
                <input type="tel" pattern="[1-9]{1}[0-9]{9}" class="form-control" name="phoneNo">
            </div>
            </div>
            <div class = "row" style="margin-left:0%">
            <div class = "col"> 
            <div class="form-group">
                <label>EmailID</label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="emailID">
            </div>
            </div>
            </div>
            <div class="row" style="margin-left:4%">
            <div class="form-group" style="margin-top:0%">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
                </div>
            
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
            </div>
        </form>
    </div> 
   
</body>
</html>

 
 
