<?php
session_start();
require "config.php";
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="all.css">
	
	<title>View Stock</title>
</head>
<style>
	body{background-color: rgb(241, 238, 248);}
	.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #04AA6D;
  color: white;
}
</style>

<body>
<div class="topnav">
  <a class="active" href="home.php">SS Medicals</a>
  <a href="employee.php">Dash Board</a>
  <a href="add_medicine.php">Add Stock</a>
  <a href="med_mod.php">Modify Stock</a>
  <a href="medicine_delete.php">Delete Stock</a>
</div>

	<h1>Stock of Medicines</h1>
	<hr>
		<table id="display" border="1" cellspacing="0" cellpadding="10" style="border: solid;border-radius: 5px;padding: 0;">
			<tr>
				<th>Medicine ID</th>
        <th>Branch ID</th>
				<th>Medicine Name</th>
				<th>Expiry date</th>
				<th>Available</th>
				<th>Category</th>
				<th>Manufacturer</th>
				<th>MRP</th>
				<th>Description</th>


			</tr>
			<?php
 $med_category=filter_input(INPUT_POST, 'med_category');
 $search=filter_input(INPUT_POST, 'search');


 if($search==NULL){
	$sql = "select * from medicine order by branchID";
	$result = $mysqli->query($sql);
		while ($row = $result -> fetch_array()) 
{
    echo "<tr>";
    echo "<th>" . $row['medicineID'] ."</th>";
    echo "<th>" . $row['branchID'] ."</th>";
    echo "<th>" . $row['medicineName'] . "</th>";
    echo "<th>" . $row['expDate'] . "</th>";
    echo "<th>" . $row['quantity'] . "</th>";
    echo "<th>" . $row['category'] . "</th>";
    echo "<th>" . $row['mfdCompany'] . "</th>";
    echo "<th>" . $row['mrp'] . "</th>";
	echo "<th>" . $row['description'] . "</th>";


    echo "</tr>";
}	
 }
 else{
 $result = mysql_query("select * from stock natural join med_details where $med_category='$search';");
 		while ($row = mysql_fetch_array($result)) 
 {
     echo "<tr>";
     echo "<th>" . $row['Med_ID'] ."</th>";
    echo "<th>" . $row['Med_Name'] . "</th>";
     echo "<th>" . $row['Exp_Date'] . "</th>";
     echo "<th>" . $row['Quantity'] . "</th>";
     echo "<th>" . $row['Category'] . "</th>";
     echo "<th>" . $row['Manufacturer'] . "</th>";
     echo "<th>" . $row['Buying_Price'] . "</th>";
     echo "<th>" . $row['Selling_Price'] . "</th>";
     echo "<th>" . $row['Entry_Date'] . "</th>";
     echo "<th>" . $row['Mfg_Date'] . "</th>";
     echo "<th>" . $row['Batch_no'] . "</th>";
     echo "</tr>";
 }	
 }	
?>
</table>
		<br>
		<a href="employee.php"><input type="button" name="back" value="Back">
</body>
</html>