<?php

require_once 'config.php';

session_start();
if(!isset($_SESSION["logged"]))
{
  header("location: login.php");
}
if(isset($_SESSION["loggedemp"]))
{
  echo "<form method ='POST'>
    <input type='submit' name='exit' value='EXIT from billing'>
    </form>";
  if(isset($_POST['exit']))
  {
  unset($_SESSION['userName']);
  unset($_SESSION["branchID"]);
  unset($_SESSION["logged"]);
  header("location: employee.php");
  }
}
$branchID = $_SESSION['branchID'];

$orderno = $_SESSION['orderno'];
$orderID = "ORD".strval($orderno);

$doctorName = $_GET['doctorName'];
$totalAmt = $_GET['totalAmt'];


$date = date("Y-m-d");
$username = $_SESSION['userName'];

$sql4 ="UPDATE orders SET doctorName='$doctorName' WHERE orderID = '$orderID'";
$result1 = $mysqli->query($sql4);

$sql5 ="SELECT medicineID,quantity FROM medicine WHERE medicineID IN (SELECT medicineID  FROM orders m WHERE orderID = '$orderID' AND m.medicineID = medicineID )";
$result5 = $mysqli->query($sql5);
while($product = $result5->fetch_assoc()){
if($product['quantity']== 0)
{


            $medicineID = $product['medicineID'];
            $sql8 = "SELECT supplierName,emailID FROM supplier WHERE medicineID='$medicineID'";
            $result = $mysqli->query($sql8);
            while($row = $result->fetch_assoc()){
            $emailID = $row['emailID'];
            $to_email = $emailID;
            $supplierName = $row['supplierName'];
            }
            $subject = "Order Delivery";
            $body = "Hi, ".$supplierName." please send the stock for".$product['medicineID']." !!!";
            $headers = "From: testmaildbmsproj@gmail.com";

            mail($to_email, $subject, $body, $headers);
                
          }         
}
if(isset($_SESSION['billno']))
{
  $billno = $_SESSION['billno'];
}
else{
$billno = 30;
}
$billID = "BILL".strval($billno);


$sql1 = "INSERT INTO bill(billID,totalAmt,userName,odate,branchID) VALUES('$billID','$totalAmt','$username','$date','$branchID')";
$result1 = $mysqli->query($sql1);
if($result1 === TRUE){

$billno =  $billno + 1;
$_SESSION['billno'] = $billno;

$orderno = $orderno + 1;
$_SESSION['orderno'] = $orderno;
}
?>


<html>
  <title> Payment </title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container-fluid" style=" background-color: rgba(45, 115, 245, 0.1); padding:10px 10px">
    <a class="navbar-brand px-3 navbar-text" href="online.php">SS Medicals</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link  px-3 navbar-text" aria-current="page" href="online.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link navbar-text" href="#"></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle px-3 navbar-text" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Menu
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item navbar-text" href="profile.php">Your Profile</a></li>
            <li><a class="dropdown-item navbar-text" href="Oldorder.php">Your Orders</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item navbar-text" href="logout.php">Logout</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link a px-3 navbar-text" aria-current="page" href="aboutus.php">About Us</a>
        </li>
        <li class="nav-item" style="padding-top:5px">    
        <a href="order.php" class="nav-link px-3 "><i class="fa fa-shopping-cart" aria-hidden="true" class="nav-link"></i></a>
        
        </li>
      </ul>
      <form class="d-flex" action="display.php" style="padding-top:15px">
        <input class="form-control me-2 " type="search" name='k' placeholder="Search"  aria-label="Search">
        <button class="btn btn-outline-success "  type="submit">Search</button>
      </form>
      
    </div>
  </div>
</nav>
<p style="text-align: center; margin-top:3%"><img src="https://cdn.jotfor.ms/img/check-icon.png" alt="" width="128" height="128" /></p>
<div style="text-align: center;">
<h1 style="text-align: center;">Thank You!</h1>
<p>

<p style="text-align: center; font-size: 20px;">Your orders have been placed succesfully. Please make the payment and collect it from 
<?php $sql1 = "SELECT branchName FROM branch WHERE branchID = '$branchID'"; 
$result1 = $mysqli->query($sql1);
$row= $result1->fetch_assoc();
$branchName = $row['branchName'];
echo $branchName." Branch"; ?></p>
    <!-- <table class="table table-striped" style="margin-top:2%; width: 50%; height:50%; margin-left:25%">
    <tr>
        <th>No.</th>
        <th>Branch</th>
        <th>Contact Number</th>
    </tr>
    <tr>
        <td>1</td>
        <td>JP Nagar</td>
        <td>755-0982-456 </td>
    </tr>
    <tr>
        <td>2</td>
        <td>Jaynagar</td>
        <td>755-0982-456</td>
    </tr>
    <tr>
        <td>3</td>
        <td>Malleshwaram</td>
        <td>755-0982-789</td>
    </tr>
    <tr>
        <td>4</td>
        <td>Rajajinagar</td>
        <td>755-0982-101</td>
    </tr>
</table> -->

</div>
</body>
</html>