<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$empID = $emppwd = $confirm_emppwd = $addr = $gender = $phoneNo =$customerName = $emailID="";
$empID_err = $emppwd_err = $confirm_emppwd_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate empID
    if(empty(trim($_POST["empID"]))){
        $empID_err = "Please enter a empID.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["empID"]))){
        $empID_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT empID FROM employee WHERE empID = '$empID'";
        $empID = $_POST["empID"];
        $sql = "SELECT empID FROM employee WHERE empID = '$empID'";
        $result = $mysqli->query($sql);
        if($result -> num_rows >=1)
        {
            $empID_err = "empID Already Exits!";
            $empID = $emppwd = $confirm_emppwd = $addr = $gender = $phoneNo =$customerName = $emailID="";
        }
        else{
            $empID = $_POST['empID'];
        }
        }
            
    // Validate emppwd
    if(empty(trim($_POST["emppwd"]))){
        $emppwd_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["emppwd"])) < 6){
        $emppwd_err = "Password must have atleast 6 characters.";
    } else{
        $emppwd = trim($_POST["emppwd"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_emppwd"]))){
        $confirm_emppwd_err = "Please confirm emppwd.";     
    } else{
        $confirm_emppwd = trim($_POST["confirm_emppwd"]);
        if(empty($emppwd_err) && ($emppwd != $confirm_emppwd)){
            $confirm_emppwd_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($empID_err) && empty($empID_err) && empty($confirm_emppwd_err)){
        $addr = $_POST['addr'];
        $empName = $_POST['empName'];
        $branchID = $_POST['branchID'];
        $gender = $_POST['gender'];
        $salary = $_POST['salary'];
        $phoneNo = $_POST['phoneNo'];
        $emailID = $_POST['emailID'];
        $dob = $_POST['dob'];

        $sql = "INSERT INTO employee (empID,salary, empName,addr,gender,phoneNo,emailID,emppwd,branchID,dob) VALUES ('$empID','$salary','$empName','$addr', '$gender','$phoneNo','$emailID','$emppwd','$branchID','$dob')";

       
         
        if($mysqli->query($sql) == FALSE)
        {
            echo "oops something went wrong! Try again";
            header("location: EmpLogin.php");
            exit;
        }
        else{
            echo "<center><h2><b>Succesfully added !</b></h2></center>";

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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

<style>
        body{ font: 14px sans-serif; 
            background-color: rgb(241, 238, 248); margin: 4px;}
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
        
            </STYLE> 
</head>
<body>
<div class="topnav">
  <a class="active" href="home.php">SS Medicals</a>
  <a href="employee.php">Dash Board</a>
  <a href="view_employees.php">View Employee</a>
  <a href="delete_Emp.php">Delete Employee</a>

</div><br><br>
    <div class="wrapper">
        <h2 style="left-margin=18%;">Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Employee ID</label>
                <input type="text" name="empID" class="form-control <?php echo (!empty($empID_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $empID; ?>">
                <span class="invalid-feedback"><?php echo $empID_err; ?></span>
            </div>    
            <div class="form-group">
            <label>Employee Name</label>
            <input type="text" name="empName" class="form-control <?php echo (!empty($empID_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $empID; ?>">
       
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="emppwd" class="form-control <?php echo (!empty($emppwd_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $emppwd; ?>">
                <span class="invalid-feedback"><?php echo $emppwd_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_emppwd" class="form-control <?php echo (!empty($confirm_emppwd_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_emppwd; ?>">
                <span class="invalid-feedback"><?php echo $confirm_emppwd_err; ?></span>
            </div>
            <div>
            <div class="form-group">
            <label>Address</label>
                <textarea name="addr" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label>Gender</label> 	&nbsp;
                <select class="custom-sel" name="gender">
                <option selected>Select here</option>
                <option value="M">Male</option>
                <option value="F">Female</option>
                <option value="F">Other</option>
                <option value="O">Prefer not to mention</option>
                </select>
                <br><br>
        </div>
        <div>
                <label>Date of birth</label>
                <input type="date" name="dob"  class="form-control">
            </div><br><br>
                <div>
                <label>Phone No</label>
                <input type="tel" name="phoneNo" pattern="[1-9]{1}[0-9]{9}" class="form-control">
            </div>
            <div>
                <br><label>Email ID</label>
                <input type="email" name="emailID" class="form-control">
            </div>
            <div>
                <br><label>Branch ID</label>
                <input type="text" name="branchID" class="form-control">
            </div>
            <div>
                <br><label>Salary</label>
                <input type="number" name="salary" class="form-control">
            </div>
            </div>
            <br>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">

            </div>
        </form>
    </div>    
</body>
</html>