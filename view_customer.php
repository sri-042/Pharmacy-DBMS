<?php
session_start();
require "config.php";
// Store Session Data

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="all.css">
	
	<title>View Customer</title>

    <style>
        body{ font: 22px;
			font-family: tiCambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            background-color: rgb(241, 238, 248);}
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
  <a href="addCust.php">Add Customer</a>
  <a href="delete_Cust.php">Delete Customer</a>

</div>


  <center><br><br>
	<h1>Customer List</h1>
	<hr>
	<table border="1" cellpadding="10" cellspacing="0" style="border: solid;border-radius: 5px;padding: 0;">
		<tr>
			<th>Username</th>
			<th>Customer Name</th>
			<th>Gender</th>
			<th>Phone No.</th>
			<th>Address</th>
		</tr>
		<?php
$sql =  "SELECT * FROM customer";
$result = $mysqli -> query($sql);
while ($row = $result-> fetch_assoc()) 
{
    echo "<tr>";
    echo "<th>" . $row['userName'] ."</th>";
    echo "<th>" . $row['customerName'] . "</th>";
    echo "<th>" . $row['gender'] . "</th>";
    echo "<th>" . $row['phoneNo'] . "</th>";
    echo "<th>" . $row['addr'] . "</th>";
    echo "</tr>";
}		
?>
	</table><br>
	<a href="employee.php"><input type="button" name="backbtn" value="Back"></a>
</body> </center>
</html>