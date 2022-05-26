<?php 
session_start();

require_once "config.php";

$medicineID = $_GET['medicineID'];
$quantity = $_GET['quantity'];
$mrp = $_GET['mrp'];
$purchaseAmt =$mrp * $quantity;

$branchID = $_SESSION['branchID'];
$orderno = $_SESSION['orderno'];
$orderID = "ORD".$orderno;
$username = $_SESSION['userName'];
echo $username;

$sql = "SELECT * FROM orders WHERE medicineID = '$medicineID' AND orderID = '$orderID' AND branchID = '$branchID'";
$result = $mysqli->query($sql);
if($result->num_rows >=1)
{
  $sql1 ="UPDATE orders SET quantity='$quantity',purchaseAmt ='$purchaseAmt' WHERE medicineID = '$medicineID' AND orderID = '$orderID' AND branchID = '$branchID' ";
  $result1 = $mysqli->query($sql1);
  // $sql2 ="UPDATE orders SET purchaseAmt ='$purchaseAmt' WHERE medicineID = '$medicineID' AND orderID = '$orderID' AND branchID = '$branchID'";
  // $result2 = $mysqli->query($sql2);
  header("location: order.php");
} 
else{
$sql1 = "INSERT INTO orders(orderID,medicineID,quantity,purchaseAmt,userName,branchID) VALUES ('$orderID','$medicineID','$quantity','$purchaseAmt','$username','$branchID')";
if ($mysqli->query($sql1) === TRUE) {
    header("location: order.php");
  } else {
    echo "Error: " . $sql1 . "<br>" . $mysqli->error;
  }
}  
?>