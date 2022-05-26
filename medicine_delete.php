

<html>
	<head>	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
    <title>Delete Medicine</title>
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
  <a href="add_med.php">Add Medicine</a>
  <a href="med_mod.php">Modify Medicine</a>
  <a href="view_medicineE.php">View Medicine</a>
</div><br><br>
        <center><h2>Deleting medicine</h2><br><br>
<form action="deletemed.php" style="width:30%; margin-left:10px; border: 2px solid black;">
	<label>Medicine Name</label><br>
	<input name="medicineID" class="form-control"><br>
	<label>Branch ID</label><br>
	<input name="branchID" class="form-control"><br><br>
	<input type="submit" name="submit" value="submit">

		<a href="med_mod.php"><input type="button" style="margin-left:10px;" class="btn btn-primary" name="back" value="Back"></a>
		<input type="reset" name="reset" class="btn btn-primary" value="Clear">
		</form>
</center>
</form>
</body>
</html>