<?php
	session_start();
	$_SESSION['pid'] = $_SESSION['pid'] + 1;
	$_SESSION['chegada'] = $_SESSION['chegada'] + 2;
	
	header('Location: ./processo.php');
?>