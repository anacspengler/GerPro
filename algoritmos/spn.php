<?php

/*INICIA A SESSÃO*/
session_start();

include_once "../util/funcoesPreemptivo.php";
include_once "../util/geraLogs.php";

echo ($_SESSION['finalizaEscalonamento']);

$_SESSION['numeroLogs'] = sizeof($_SESSION['log']) - 1;

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
}

function removeProcessoPronto(){

	/*REMOVE O PRIMEIRO PROCESSO DA FILA*/
	unset($_SESSION['processosProntos'][0]);

	/*REORGANIZA O ARRAY DE PROCESSOS PRONTOS*/
	$_SESSION['processosProntos'] = array_values($_SESSION['processosProntos']);
}

function entraCPU(){
	ordena_SPN();
	/*COLOCA O PRIMEIRO PROCESSO DA FILA NA CPU*/
	$_SESSION['processoCPU'] = $_SESSION['processosProntos'][0];

	geraLogs($_SESSION['processoCPU'],"entrar");
	
	/*REMOVE O PROCESSO DA LISTA DE PRONTOS*/
	removeProcessoPronto();
}

function ordena_SPN(){

	$array_size = sizeof($_SESSION['processosProntos']);
	$numbers = $_SESSION['processosProntos'];
	
	for ( $i = 0; $i < $array_size; $i++ )
	{
		for ($j = 0; $j < $array_size; $j++ )
		{
			if ($numbers[$i]['restante'] < $numbers[$j]['restante'])
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