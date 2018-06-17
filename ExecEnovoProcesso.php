<?php
	session_start();
	
	$_SESSION['andamento'] = 1;
	
	$_SESSION['pid'] = $_SESSION['pid'] + 1;
	$_SESSION['chegada'] = $_SESSION['chegada'] + 2;
	
	header('Location: ./processo_.php');
?>