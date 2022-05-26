<!DOCTYPE html>
<html>
<head>
	<title>Employee</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

	<style>
        body{ font: 22px;
			font-family: tiCambria, Cochin, Georgia, Times, 'Times New Roman', serif; margin: 4px;
            background-color: rgb(241, 238, 248); margin: 4px;}
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

</head>
<body>
<div class="topnav">
  <a class="active" href="home.php">SS Medicals</a>
  <a href="EmpLogout.php">Logout</a>

</div><br><br><br>
<div class="wrapper">
<center>
<h1>Welcome</h1>

    <br>
	<form style=>

		<a href="view_customer.php"><input type="button" name="view_customer" value="View Customer"></a>
		<br><br>
    <a href="addCust.php"><input type="button" name="addCust" value="Add customer"></a>
    <br><br>
    <a href="view_employees.php"><input type="button" name="viewEmp" value="View Employee"></a>
    <br><br>
    <a href="EmpSignup.php"><input type="button" name="addEmp" value="Add Employee"></a>
    <br><br>
		<a href="view_medicineE.php"><input type="button" name="view_stock" value="View Stock">
		<br><br>		
    <a href="add_medicine.php"><input type="button" name="add_stock" value="Add Stock"></a>
    <br><br>
		<a href="med_mod.php"><input type="button" name="modify_stock" value="Modify Stock"></a>
    <br><br>
		<a href="deletemed.php"><input type="button" name="delete_stock" value="Delete Stock"></a>
    <br><br>

	</form>
  </center>
		</div>
</body>
</html>