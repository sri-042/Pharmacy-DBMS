<?php
session_start();
unset($_SESSION['userName']);
unset($_SESSION["logged"]);
header("location: home.php");
exit;
?>