<?php
	 session_start();
	
		
		$tipoSC = $_POST["tipoSC"];
		$_SESSION['tipoSC'] = $tipoSC;
		
		header('Location: ./selecionarAlgoritmo.php');
	
?>
