<?php
require "config.php";
$MedID = $_GET['medicineID'];
$Quant = $_GET['quantity'];
$MRP=$_GET['mrp'];
$BranchID=$_GET['branchID'];
 if(!$MedID and !$MRP and !$Quantity and  $BranchID){
	echo "<script type='text/javascript'>
 	alert('Please enter some data');
 	location='modify_med.php';
 	</script>";
	}
	else{
		/* $sql3 = "UPDATE medicine SET quantity = 40";
		$res = $mysqli -> query($sql3);
		if($res === True)
		{
			echo("<b><center><h2>Updated succesfully</h2></center></b>");
		}
		else{
			echo "Error: ";*/
	

		$sql1 = "SELECT quantity FROM medicine WHERE medicineID = '$MedID' AND branchID = '$BranchID'  ";
		$result1 = $mysqli -> query($sql1);
		$row = $result1 -> fetch_assoc();
		$oldQuant = $row['quantity'];
		$quantity = intval($oldQuant) + $Quant;

			$sql = "UPDATE medicine 	
			SET  mrp = $MRP, quantity = '$quantity', branchID = '$BranchID' 
			WHERE medicineID = '$MedID' AND branchID = '$BranchID' ";
			$res = $mysqli -> query($sql);

			if($res === True)
			{
				echo("<b><center><h2>Updated succesfully</h2></center></b>");
			}
			else{
				echo "Error: ";
		}
		
}
