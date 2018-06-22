<?php
include_once "geraLogs.php";

function trataIO(){

	$contador = 0;
	$processosAindaBloqueados = array();

	foreach ($_SESSION['processosBloqueados'] as $processo) {

		if($_SESSION['processoCPU']['tipo'] == "CPU bound"){
			$processo['tempoIO'] = $processo['tempoIO'] - $_SESSION['quantum'] - $_SESSION['trocaContexto'];
		} else {
			$processo['tempoIO'] = $processo['tempoIO'] - $_SESSION['tempoProcesso'] - $_SESSION['trocaContexto'];
		}

		if($processo['tempoIO'] <= 0){
			$processo['tempoIO'] = $_SESSION['opES'];
			array_push($_SESSION['processosProntos'],$processo);
			geraLogs($processo, "desbloquear");
			geraLogs($processo, "pronto");
		} else {
			array_push($processosAindaBloqueados, $processo);
			geraLogs($processo, "permaneceBloqueado");
		}
		$contador = $contador + 1;
	}

	$_SESSION['processosBloqueados'] = $processosAindaBloqueados;
	ordenaBloqueados();
}

function realocaProcessosBloqueados(){
	ordenaBloqueados();
	$tempo = $_SESSION['processosBloqueados'][0]['tempoIO'];
	$indice = 0;
	$processos = array();

	foreach ($_SESSION['processosBloqueados'] as $processo) {
		$processo['tempoIO'] = $processo['tempoIO'] - $tempo - $_SESSION['trocaContexto'];
		array_push($processos, $processo);
	}

	$_SESSION['processosBloqueados'] = $processos;
	ordenaBloqueados();

	foreach ($_SESSION['processosBloqueados'] as $processo) {
		if($processo['tempoIO'] <= 0 ){
			$processo['tempoIO'] = $_SESSION['opES'];
			array_push($_SESSION['processosProntos'], $processo);
			unset($_SESSION['processosBloqueados'][$indice]);
			geraLogs($processo, "desbloquear");
		} else {
			geraLogs($processo, "permaneceBloqueado");
		}
	}

	$_SESSION['tempoDecorrido'] = $_SESSION['tempoDecorrido'] + $tempo +  $_SESSION['trocaContexto'];

	$_SESSION['processosBloqueados'] = array_values($_SESSION['processosBloqueados']);	

}

function ordenaBloqueados(){

	$array_size = sizeof($_SESSION['processosBloqueados']);
	$numbers = $_SESSION['processosBloqueados'];

	for ( $i = 0; $i < $array_size; $i++ )
	{
		for ($j = 0; $j < $array_size; $j++ )
		{
			if ($numbers[$i]['tempoIO'] < $numbers[$j]['tempoIO'])
			{
				$temp = $numbers[$i];
				$numbers[$i] = $numbers[$j];
				$numbers[$j] = $temp;
			}
		}
	}

	$_SESSION['processosBloqueados'] = $numbers;
}

function saiDaCPU(){

	/*COLOCA O PROCESSO NA LISTA DE PROCESSOS FINALIZADOS*/
	$processo = $_SESSION['processoCPU'];

	if($_SESSION['processoCPU']['tipo'] == "I/O bound"){
		
		$_SESSION['processoCPU']['restante'] = $_SESSION['processoCPU']['restante'] - $_SESSION['tempoProcesso'];
		$_SESSION['tempoDecorrido'] = $_SESSION['tempoDecorrido'] + $_SESSION['tempoProcesso'];
		$processo = $_SESSION['processoCPU'];
		geraLogs($processo,"sair");

		if($_SESSION['processoCPU']['restante'] > 0){
			array_push($_SESSION['processosBloqueados'],$_SESSION['processoCPU']);
			geraLogs($processo, "bloquear");
			/*ordenaBloqueados();*/
		} else if ($_SESSION['processoCPU']['restante'] <= 0 ){
			array_push($_SESSION['processosFinalizados'],$_SESSION['processoCPU']);
			geraLogs($processo, "finaliza");
		}

	} else  {

		$_SESSION['processoCPU']['restante'] = $_SESSION['processoCPU']['restante'] - $_SESSION['quantum'];
		$_SESSION['tempoDecorrido'] = $_SESSION['tempoDecorrido'] + $_SESSION['quantum'];

		if($_SESSION['processoCPU']['restante'] > 0){
			array_push($_SESSION['processosProntos'],$_SESSION['processoCPU']);
			geraLogs($processo, "pronto");
		} else {
			array_push($_SESSION['processosFinalizados'],$_SESSION['processoCPU']);
			geraLogs($processo, "finaliza");
		}
	}	
}



?>