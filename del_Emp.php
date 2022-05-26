<?php
require "config.php";

 $empID=  $_GET['empID'];
 $empName = $_GET['empName'];

$sql="DELETE from employee where empID = '$empID' AND empName ='$empName';";
$res = $mysqli->query($sql);
 if ($res){
     echo $empID." ".$empName;
     echo "record was deleted sucessfully";
     header("location: delete_Emp.php");

}
else{
    echo "Error: ". $sql ."<br>". $mysqli->error;
}
?>
	