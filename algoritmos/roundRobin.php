<?php

/*INICIA A SESSÃO*/
session_start();

echo ($_SESSION['finalizaEscalonamento']);

/*TESTA SE A VARIAVEL É VALIDA, OU SEJA, SE AINDA HÁ PROCESSOS PARA ESCALONAR*/
if(!$_SESSION['finalizaEscalonamento']){
	
	/*TESTA SE É A PRIMEIRA INTERAÇÃO*/
	if($_SESSION['iniciaEscalonamento']){
		/*COLOCA O PROCESSO NA CPU*/
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
		if( sizeof($_SESSION['processosProntos']) > 0 ){
			/*COLOCA O PROCESSO NA CPU*/
			entraCPU();
		} else {
			/*INDICA QUE NÃO HÁ MAIS PROCESSOS NA FILA*/
			if(sizeof($_SESSION['processosBloqueados']) > 0){
				realocaProcessosBloqueados();
				entraCPU();
			} else {
				$_SESSION['finalizaEscalonamento'] = true;	
			}
		}
	}
} else {

}

function saiDaCPU(){

	/*COLOCA O PROCESSO NA LISTA DE PROCESSOS FINALIZADOS*/


	if($_SESSION['processoCPU']['tipo'] == "I/O bound"){
		$_SESSION['processoCPU']['restante'] = $_SESSION['processoCPU']['restante'] - 1;

		if($_SESSION['processoCPU']['restante'] > 0){
			array_push($_SESSION['processosBloqueados'],$_SESSION['processoCPU']);
			/*ordenaBloqueados();*/
		} else if ($_SESSION['processoCPU']['restante'] <= 0 ){
			array_push($_SESSION['processosFinalizados'],$_SESSION['processoCPU']);
		}
	} else  {
		$_SESSION['processoCPU']['restante'] = $_SESSION['processoCPU']['restante'] - $_SESSION['quantum'];
		if($_SESSION['processoCPU']['restante'] > 0){
			array_push($_SESSION['processosProntos'],$_SESSION['processoCPU']);
		} else {
			array_push($_SESSION['processosFinalizados'],$_SESSION['processoCPU']);
		}
	}	
}

function removeProcessoPronto(){

	/*REMOVE O PRIMEIRO PROCESSO DA FILA*/
	unset($_SESSION['processosProntos'][0]);

	/*REORGANIZA O ARRAY DE PROCESSOS PRONTOS*/
	$_SESSION['processosProntos'] = array_values($_SESSION['processosProntos']);
}

function entraCPU(){
	/*COLOCA O PRIMEIRO PROCESSO DA FILA NA CPU*/
	$_SESSION['processoCPU'] = $_SESSION['processosProntos'][0];

	/*REMOVE O PROCESSO DA LISTA DE PRONTOS*/
	removeProcessoPronto();
}

function trataIO(){

	$contador = 0;
	$processosAindaBloqueados = array();

	foreach ($_SESSION['processosBloqueados'] as $processo) {

		if($_SESSION['processoCPU']['tipo'] == "CPU bound"){
			$processo['tempoIO'] = $processo['tempoIO'] - 5;
		} else {
			$processo['tempoIO'] = $processo['tempoIO'] - 1;
		}

		if($processo['tempoIO'] <= 0){
			$processo['tempoIO'] = 5;
			array_push($_SESSION['processosProntos'],$processo);
		} else {
			array_push($processosAindaBloqueados, $processo);
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
			array_push($_SESSION['processosProntos'], $processo);
			unset($_SESSION['processosBloqueados'][$indice]);
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

header('location:../simulacaoExecucao.php');

?>