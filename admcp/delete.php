<?php
session_start();
include'connection.php';
if (isset($_POST['submit']) && $_POST['submit'] == "Delete") {
	$id = $_POST['id'];

	$deletearticle = mysqli_query($conn, "DELETE FROM registered WHERE id= '".$id."' ");
	if ($deletearticle)) {
	
	$_SESSION['successmsg'] = "<p class='alert alert-success'> Input was successfully deleted</p>";
	header("Location: register.php");

	} else {
	$_SESSION['failedmsg'] = "<p class='alert alert-warning'> Input was not deleted</p>";
	header("Location: register.php");
	}

	
}
