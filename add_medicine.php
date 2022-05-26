<?php
session_start();
// Store Session Data

?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Medicine</title>
	<link rel="stylesheet" type="text/css" href="all.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
        body{ font: 22px;
			font-family: tiCambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            background-color: rgb(241, 238, 248);
		margin: 4px;}
        .wrapper{ width: 360px; padding: 20px; 
        border: solid 2px;
    margin-left: 35%;}

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
  <a href="med_mod.php">Modify Medicine</a>
  <a href="deletemed.php">Delete Medicine</a>
  <a href="view_medicineE.php">View Medicine</a>
</div>


<center><br><br>
	<h1>Add Medicine</h1>
<hr>
	<form action="add_med.php" style="width: 30%; margin-left:20px;">

		<label>Medicine ID: </label>
		<input type="text" class="form-control" name="medicineID">

		<label>Medicine Name: </label>
		<input type="text" class="form-control" name="medicineName">


		<label>Expiry Date: </label>
		<input type="Date" class="form-control" name="expDate">


		<label>Manufacturer: </label>
		<input type="text"  class="form-control" name="mfdCompany">


		<label>Quantity: </label>
		<input type="number" class="form-control" name="quantity">
	
		<label>MRP: </label>
		<input type="number" class="form-control" name="mrp">

		<label>Branch ID: </label>
		<input type="text" class="form-control" name="branchID">
	
		<label>Category: </label><br>
		<input type="text" class="form-control" name="category">
	
		<label>Description: </label>
		<textarea class="form-control" name="description"></textarea>
	
		<label>Image : </label>
		<input type="text" class="form-control" name="img_path">
		<br>

		<input type="submit" name="submit" class="btn btn-primary" value="Submit">
		<br><br>
		
		<a href="med_mod.php"><input type="button" class="btn btn-primary" name="back" value="Back"></a>
		<input type="reset" class="btn btn-primary" name="reset" value="Clear">
		</form>
</body></center>
</html>








