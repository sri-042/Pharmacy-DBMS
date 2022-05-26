<?php
require "config.php";

 $userName =  $_GET['userName'];

$sql="DELETE from customer where userName = '$userName';";
$res = $mysqli->query($sql);
 if ($res){
     echo $userName.'  ';
     echo "record was deleted sucessfully";
     header("location: delete_cust.php");
}
else{
    echo "Error: ". $sql ."<br>". $mysqli->error;
}
?>
	