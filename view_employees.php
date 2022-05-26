<?php
session_start();
require "config.php";

// Store Session Data

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="all.css">
	
	<title>View Employee</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
    <style>
        body{ font: 22px;
			font-family: tiCambria, Cochin, Georgia, Times, 'Times New Roman', serif;
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
  <a href="employee.php">Dash Board</a>
  <a href="EmpSignup.php">Add Employee</a>
  <a href="delete_Emp.php">Delete Employee</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>


<center><BR><BR>
	<h1>Employee List</h1>
	<hr>
	<table border="1" cellpadding="10" cellspacing="0" style="border: solid;border-radius: 5px;padding: 0;">
		<tr>
			<th>Employee ID</th>
			<th>Employee Name</th>
			<th>Branch</th>
            <th>Salary</th>
			<th>Phone No.</th>
			<th>Address</th>
		</tr>
		<?php
$sql =  "SELECT empID,empName,branchID,salary,phoneNo,addr FROM employee";
$result = $mysqli -> query($sql);
while ($row = $result-> fetch_assoc()) 
{
    echo "<tr>";
    echo "<th>" . $row['empID'] ."</th>";
    echo "<th>" . $row['empName'] . "</th>";
    echo "<th>" . $row['branchID'] . "</th>";
    echo "<th>" . $row['salary'] . "</th>";
    echo "<th>" . $row['phoneNo'] . "</th>";
    echo "<th>" . $row['addr'] . "</th>";
    echo "</tr>";
}		
?>
	</table>
	<a href="employee.php"><input type="button" name="backbtn" value="Back"></a>
</body> </center>
</html>