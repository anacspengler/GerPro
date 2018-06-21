<?php

	session_start();
	$quantum = $_POST["quantum"];
	$opES = $_POST["opES"];	
	$trocaContexto = $_POST["trocaContexto"];
	$tempoProcesso = $_POST["tempoProcesso"];
	$loteriaPremp =0;
	
	if ($_SESSION['algoritmo'] == 8)
	{
		$loteriaPremp = $_POST["loteriaPremp"];
	}
	
	$_SESSION['quantum'] = $quantum;
	$_SESSION['opES'] = $opES;
	$_SESSION['trocaContexto'] = $trocaContexto;
	$_SESSION['tempoProcesso'] = $tempoProcesso;
	$_SESSION['loteriaPremp'] = $loteriaPremp;
	
	header('Location: ./iniciaSimulacao.php');
?>