<?php
session_start();

if ($_SESSION['id'] OR $_COOKIE['id']) {

if (array_key_exists('id', $_SESSION) OR array_key_exists("id", $_COOKIE)) {
	$_SESSION = array();
unset($_SESSION);
setcookie("id", "", time() - 60*60);

	header("Location: login.php");
}

}else{
	header("Location: admin.php");
}

?>