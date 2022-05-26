<?php
session_start();
require "sms.php";
// Store Session Data
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="all.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	<title>Modify Medicine</title>
</head>
<style>
	body{background-color: rgb(241, 238, 248);
	margin: 4px;}
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
  <a class="active" href="employee.php">SS Medicals</a>
  <a href="employee.php">Dash Board</a> 
  <a href="add_medicine.php">Add Medicine</a>
  <a href="medicine_delete.php">Delete Medicine</a>
  <a href="view_medicineE.php">View Medicine</a>
</div>
	<?php
	$med_category=filter_input(INPUT_POST, 'med_category');
	$search=filter_input(INPUT_POST, 'search');
	?>
	<div><br><br> <center>
	<h2>Modify existing medicine</h2></center>
	</div>
	<div style="width: 30%; border: solid; margin-left:35%; padding-bottom:1%">
	<form action="modify_med.php" style="margin-left:35px; margin-right:35px " >
	
		<label>Medicine ID</label><br><input name="medicineID" class="form-control"><br>
		<label>Branch ID</label><br><input class="form-control" name="branchID"><br>
		<label>MRP</label><br><input name="mrp" class="form-control"><br>
		<label>Quantity: </label><br><input name="quantity" class="form-control">
		<br>
		<input type="submit" name="submit" value="submit" class="btn btn-primary">
		
			<br>
			<br>
			<a href="employee.php"><input type="button" name="back" class="btn btn-primary" value="Back"></a>
			<input type="reset" name="reset" class="btn btn-primary" value="Clear">
		
		</form>
	</div>
</body>
</html>