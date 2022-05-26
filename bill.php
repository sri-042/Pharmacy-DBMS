<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<?php
session_start();
if(!isset($_POST['submit'])){
echo "<form method ='POST' style='width:50%; margin-left: 10px'>
        <label>Customer Username</label> 
        <input type='text' name='userName' class='form-control'>
        <label>Branch ID</label>
        <input type='text' name='branchID' class='form-control'>
        <br>
        <input type='submit' name='submit' value'OK' class='btn btn-primary'>
    </form>";
 $_SESSION['loggedemp'] = TRUE;
$_SESSION['logged'] = TRUE; 
}
echo "<form method ='POST' style='margin-left:10px'>
    <input type='submit' name='exit' value='EXIT from billing' class='btn btn-primary'>
    </form>";
if(isset($_POST['submit'])){
$_SESSION['branchID'] = $_POST['branchID'];
$username = $_POST['userName'];
$_SESSION['userName'] = $username;
require 'online.php';
require 'payment.php';

}
if(isset($_POST['exit']))
{
unset($_SESSION['userName']);
unset($_SESSION["branchID"]);
unset($_SESSION["logged"]);
header("location: employee.php");
}
?>



