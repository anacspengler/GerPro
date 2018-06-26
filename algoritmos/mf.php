<?php

/*INICIA A SESSÃO*/
session_start();
include_once "../util/geraLogs.php";

echo ($_SESSION['finalizaEscalonamento']);
$_SESSION['numeroLogs'] = sizeof($_SESSION['log']) - 1;

/*TESTA SE A VARIAVEL É VALIDA, OU SEJA, SE AINDA HÁ PROCESSOS PARA ESCALONAR*/
if(!$_SESSION['finalizaEscalonamento']){
	
	/*TESTA SE É A PRIMEIRA INTERAÇÃO*/
	if($_SESSION['iniciaEscalonamento']){
		/*COLOCA O PROCESSO NA CPU*/
		organizaListas();
		entraCPU();
		/*ALTERA O FLAG E INDICA QUE NÃO É MAIS A PRIMEIRA INTERAÇÃO*/
		$_SESSION['iniciaEscalonamento'] = false;
	} else {

		/*TRATA OS PROCESSOS QUE ESTÃO BLOQUEADOS*/
		trataIO();

		//
		saiDaCPU();

		/*APAGA O PROCESSO DA CPU*/
		$_SESSION['processoCPU'] = array();
		
		/*TESTA SE AINDA HÁ PROCESSOS NA FILA*/
		if( sizeof($_SESSION['fila']) > 0 ){
			/*COLOCA O PROCESSO NA CPU*/
			entraCPU();
		} else {
			/*INDICA QUE NÃO HÁ MAIS PROCESSOS NA FILA*/
			if(sizeof($_SESSION['processosBloqueados']) > 0){
				realocaProcessosBloqueados();
				entraCPU();
			} else {
				if(sizeof($_SESSION['processosProntos']) > 0){
					organizaListas();
					entraCPU();
				} else {
					$_SESSION['finalizaEscalonamento'] = true;
				}
			}
		}
	}
} else {

}

function saiDaCPU(){

	/*COLOCA O PROCESSO NA LISTA DE PROCESSOS FINALIZADOS*/
	$processo = $_SESSION['processoCPU'];

	if($_SESSION['processoCPU']['tipo'] == "I/O bound"){
		$_SESSION['processoCPU']['restante'] = $_SESSION['processoCPU']['restante'] - $_SESSION['tempoProcesso'];
		$_SESSION['tempoDecorrido'] = $_SESSION['tempoDecorrido'] + $_SESSION['tempoProcesso'];
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
		if($_SESSION['processoCPU']['restante'] > 0){
			array_push($_SESSION['fila'],$_SESSION['processoCPU']);
			geraLogs($processo, "pronto");
		} else {
			array_push($_SESSION['processosFinalizados'],$_SESSION['processoCPU']);
			geraLogs($processo, "finaliza");
		}
	}	
}

function removeProcessoPronto(){

	/*REMOVE O PRIMEIRO PROCESSO DA FILA*/
	unset($_SESSION['fila'][0]);

	/*REORGANIZA O ARRAY DE PROCESSOS PRONTOS*/
	$_SESSION['fila'] = array_values($_SESSION['fila']);
}

function entraCPU(){
	/*COLOCA O PRIMEIRO PROCESSO DA FILA NA CPU*/
	if($_SESSION['processoCPU']['pid'] != $_SESSION['fila'][0]){
		$_SESSION['numeroTrocaContexto'] = $_SESSION['numeroTrocaContexto'] + 1;
	}
	$_SESSION['processoCPU'] = $_SESSION['fila'][0];

	geraLogs($_SESSION['processoCPU'],"entrar");

	/*REMOVE O PROCESSO DA LISTA DE PRONTOS*/
	removeProcessoPronto();
}

function trataIO(){

	$contador = 0;
	$processosAindaBloqueados = array();

	foreach ($_SESSION['processosBloqueados'] as $processo) {

		if($_SESSION['processoCPU']['tipo'] == "CPU bound"){
			$processo['tempoIO'] = $processo['tempoIO'] - $_SESSION['quantum'];
		} else {
			$processo['tempoIO'] = $processo['tempoIO'] - $_SESSION['tempoProcesso'];
		}

		if($processo['tempoIO'] <= 0){
			$processo['tempoIO'] = $_SESSION['opES'];
			array_push($_SESSION['fila'],$processo);
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
		$processo['tempoIO'] = $processo['tempoIO'] - $tempo;
		array_push($processos, $processo);
	}

	$_SESSION['processosBloqueados'] = $processos;
	ordenaBloqueados();

	foreach ($_SESSION['processosBloqueados'] as $processo) {
		if($processo['tempoIO'] <= 0 ){
			array_push($_SESSION['fila'], $processo);
			geraLogs($processo, "desbloquear");
			unset($_SESSION['processosBloqueados'][$indice]);
		} else {
			geraLogs($processo, "permaneceBloqueado");
		}
	}

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

function organizaListas(){
	ordena_Prioridade();
	$prioridade = $_SESSION['processosProntos'][0]['prioridade'];
	$indice = 0;
	foreach ($_SESSION['processosProntos'] as $processo) {
		if($processo['prioridade'] == $prioridade){
			array_push($_SESSION['fila'],$processo);
			unset($_SESSION['processosProntos'][$indice]);
		}
		$indice = $indice + 1;
	}

	$_SESSION['processosProntos'] = array_values($_SESSION['processosProntos']);
}

function ordena_Prioridade(){

	$array_size = sizeof($_SESSION['processosProntos']);
	$numbers = $_SESSION['processosProntos'];
	
	for ( $i = 0; $i < $array_size; $i++ )
	{
		for ($j = 0; $j < $array_size; $j++ )
		{
			if ($numbers[$i]['prioridade'] < $numbers[$j]['prioridade'])
			{
				$temp = $numbers[$i];
				$numbers[$i] = $numbers[$j];
				$numbers[$j] = $temp;
			}
		}
	}

	$_SESSION['processosProntos'] = $numbers;
}

header('location:../simulacaoExecucao.php');

?>