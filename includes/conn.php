<?php
// error_reporting(0);
$host='localhost';
$user='root';
$pass='';
$db='portfolio';
$connect=mysqli_connect($host, $user, $pass, $db) or die("cannot connect beacause: " . mysqli_connect_error());
?>
