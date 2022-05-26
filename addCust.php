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
            header("location: addCust.php");
            exit;
        }
        else{
            echo "<h2><b><center>Succesfully added !</center></b></h2>";

        
            $to_email = $emailID;
            $subject = "Account Successfully Created";
            $body = "Hi, ".$customerName." your account has been created successfully !!!";
            $headers = "From: pharmacydb2022@gmail.com";
            
           
           if (mail($to_email, $subject, $body, $headers)) {
                echo "Email successfully sent to $to_email...";
                header("location: employee.php");
            } 
            else {
                echo "Email sending failed...";
                
            }
        }
    $mysqli->close();
}}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Customer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
<style>
        body{ font: 14px sans-serif; 
            background-color: rgb(241, 238, 248);
        margin: 4px;}
        .wrapper{ width: 360px; padding: 20px; margin-left: 35%; border: solid; }  
        .topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #04AA6D;
  color: white;
}
    </style> 
</head>
<body>
<div class="topnav">
  <a class="active" href="home.php">SS Medicals</a>
  <a href="employee.php">Dash Board</a>
  <a href="view_customer.php">View Customer</a>
  <a href="delete_Cust.php">Delete Customer</a>
</div>
<br><br>
<h1 style="margin-left: 40%">Add Customer</h1>
    <div class="wrapper" style="padding-top: 10px; margin-top: 3%">

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
                <textarea type="text" class="form-control" name="addr" id="inputAddr"></textarea>
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
            <div class="form-group">
                <label>Branch ID</label>
                <input type="text" class="form-control"  name="branchID">
            </div>
            </div>
            </div>
            <div class="row" style="margin-left:4%">
            <div class="form-group" style="margin-top:0%">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
                </div>
            </div>
            
        </form>
        <br><br>
        
    </div> 
    <div style="margin-left:15px">
    <a href="employee.php"> Back</a>
    </div>
</body>
</html>

 
 
