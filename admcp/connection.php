<?php
$servername="localhost";
$username="root";
$password="";
$mydb="bootcamp2019";
$conn=mysqli_connect($servername, $username, $password, $mydb);
if (!$conn) {
die("connection error".mysqli_connect_error());
}
?>