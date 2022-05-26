<?php
require "config.php";

 $MedID=  $_GET['medicineID'];
 $branchID = $_GET['branchID'];

$sql="DELETE from medicine where medicineID = '$MedID' AND branchID ='$branchID';";
$res = $mysqli->query($sql);
 if ($res){
     echo $MedID." ".$branchID;
     echo "record was deleted sucessfully";
     header("location: medicine_delete.php");

}
else{
    echo "Error: ". $sql ."<br>". $mysqli->error;
}
?>
	