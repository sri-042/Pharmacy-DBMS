<?php
session_start();
unset($_SESSION['empID']);
unset($_SESSION["loggedemp"]);
header("location: home.php");
exit;
?>