<?php
	 
	 session_start();
	 $algoritmo = $_POST["algoritmo"];
	 $_SESSION['algoritmo'] = $algoritmo;
	 
	 header('Location: ./processo.php');
?>
