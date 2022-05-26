<?php
 session_start();
 if(!isset($_SESSION["logged"]))
{
  header("location: login.php");
}
$username = $_SESSION['userName'];
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
require_once 'config.php';


$orderno = $_SESSION['orderno'];
$orderID = "ORD".strval($orderno);

$sql1 = "SELECT * FROM bill WHERE userName = '$username' ";

  $result = $mysqli->query($sql1);  
   ?>
<title>Old Order</title>
<table class="table table-striped">
<tr>
    <th>Bill ID</th>
    <th>Date</th>
    <th>Total Purchase Amount</th>
    <th>BranchID</th>
  </tr>
  <?php while($product  = $result -> fetch_assoc()): 
  // $ordID = $product["orderID"];
  //   $sql2 = "SELECT totalAmt,billID,date FROM bill WHERE orderID = '$ordID'";
  //   $result2 = $mysqli->query($sql2);
    // if($result ->num_rows == 0)
    // {
    //   echo "No orders yet";
    //   exit;
    // }
    // while($product2 = $result2 -> fetch_assoc()):
    ?>
    <tr>
    <td><?= $product['billID'] ?></td>
    <td>
    <?= $product['odate'] ?></td>
    <td><?= $product['totalAmt'] ?></td>
    <td><?= $product['branchID'] ?></td>
  </tr>
  
  <?php endwhile;
?>
        
</table>
<a href="online.php">Back</a>