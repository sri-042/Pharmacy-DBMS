<?php
require_once 'config.php';
 session_start();
$username = $_SESSION['userName'];
$orderID = $_SESSION['orderno'];

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
$GLOBALS['totalAmt'] = 0;

require_once 'config.php';

$orderID = "ORD".strval($orderID);

$sql = "SELECT SUM(purchaseAmt) FROM orders WHERE orderID = '$orderID'";
$result = $mysqli->query($sql);
if($result->num_rows >= 1){
$row = $result -> fetch_assoc();
$GLOBALS['totalAmt'] = $row['SUM(purchaseAmt)'];}
// $totalAmt = 0;
 ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script><nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container-fluid" style=" background-color: rgba(45, 115, 245, 0.1); padding:10px 10px">
    <a class="navbar-brand px-3" href="#">SS Medicals</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active px-3" aria-current="page" href="online.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle px-3" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Menu
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="profile.php">Your Profile</a></li>
            <li><a class="dropdown-item" href="Oldorder.php">Your Orders</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link active px-3" aria-current="page" href="aboutus.php">About Us</a>
        </li>
        <li class="nav-item">    
        <a href="order.php" class="nav-link px-3"><i class="fa fa-shopping-cart" aria-hidden="true" class="nav-link"></i></a>
        
        </li>
      </ul>
      </div>
  </div>
</nav>
<?php


$sql1 = "SELECT quantity,purchaseAmt,medicineID FROM orders WHERE orderID = '$orderID' AND userName = '$username' ";
if ($mysqli->query($sql1) === TRUE) {
    echo "Query";
  } else {
    echo $mysqli->error;
  }

  $result = $mysqli->query($sql1);
  
   ?>

<form action="payment.php" style=" margin-right:10px">
  <div class="row">
    <div class="col">
  <input type='hidden' name ='totalAmt' value=<?= $GLOBALS['totalAmt'] ?>>
  <span class="input-group-text" name="doctorName" id="inputGroup-sizing-d " >Doctor Name</span>
  <input type="text" class="form-control" name="doctorName" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
  </div>
  <div class ="col" style="margin-top:17px;">
<input type='Submit' class=' btn btn-primary '  value='Confirm Purchase'>
  </div>
  </div>
</form>
<table class="table table-striped">
<tr>
    <th>Medicine Name</th>
    <th>Quantity</th>
    <th>MRP</th>
    <th>Purchase Amt</th>
  </tr>
  <?php while($product  = mysqli_fetch_assoc($result)): ?>
    <tr>
    <td><?php
    $sql2 = "SELECT medicineName,mrp FROM medicine WHERE medicineID = '$product[medicineID]'";
    $result2 = $mysqli->query($sql2);
    $row= $result2->fetch_assoc();
    $product2 = $row['medicineName'] ;
    ?>
    <?= $product2 ?></td>
    <td><?= $product['quantity'] ?></td>
    <td><?= $row['mrp'] ?></td>
    <td><?=  $product['purchaseAmt']?></td>
  </tr>
  <?php endwhile ?>
</table>
<div style="float:right; margin-right: 10px">
<p><h6>Total Purchase Amount : Rs. <?= $GLOBALS['totalAmt'] ?></h6></p>
  </div>
  <a href="online.php">Back</a>








