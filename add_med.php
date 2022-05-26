<?php
require "config.php";
$Med_Name = $_GET['medicineName'];
$medicineID = $_GET['medicineID'];
$Exp_Date = $_GET['expDate'];
$Manufacturer = $_GET['mfdCompany'];
$Quantity = $_GET['quantity'];
$mrp=$_GET['mrp'];
$branchID=$_GET['branchID'];
$category= $_GET['category'];
$desc= $_GET['description'];
$img= $_GET['img_path'];
$sql="INSERT into medicine values ('$medicineID','$Med_Name','$Exp_Date','$Manufacturer','$Quantity','$mrp','$branchID','$category','$desc','$img')";
$result = $mysqli->query($sql);
if ($result == True){
          echo "New record is inserted sucessfully";
          header("location: add_medicine.php");
        }
        else{
          echo "Error: ". $sql ."<br>". $mysqli->error;
        }
        $mysqli->close();
?>