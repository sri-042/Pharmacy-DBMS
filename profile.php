<?php 
require 'config.php';
session_start();
$userName = $_SESSION['userName'];
$sql = "SELECT * FROM customer WHERE userName='$userName'";
$result = $mysqli->query($sql);
$product = $result->fetch_assoc();

$customerName = $product['customerName'];
$emailID = $product['emailID'];
$gender = $product['gender'];
$addr = $product['addr'];
$phoneNo = $product['phoneNo'];

?>
<html>
  <title> Your Profile </title>
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
     
    </div>
  </div>
</nav>
<div class="card" style="width: 18rem; margin-left:40%; margin-top:5px">
  <img class="card-img-top" src="img/login.png" alt="Card image cap"  height="200px">
  <div class="card-body text-center">
    <h5 class="card-title"><?= $userName ?></h5>
  </div>
  <ul class="list-group list-group-flush">
  <li class="list-group-item"><b>Name : </b><?= $customerName ?></li>
    <li class="list-group-item"><b>Phone : </b><?= $phoneNo ?></li>
    <li class="list-group-item"><b>Email : </b><?= $emailID ?></li>
    <li class="list-group-item"><b>Gender : </b><?= $gender ?></li>
  </ul>
  <div class="card-body">
    <a href="online.php" class="card-link">Back</a>
  </div>
</div>