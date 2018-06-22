<?php

/*INICIA A SESSÃO*/
session_start();
include_once "../util/geraLogs.php";

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

		/*RETIRA O PROCESSO DA CPU*/
		saiDaCPU();

		/*APAGA O PROCESSO DA CPU*/
		$_SESSION['processoCPU'] = array();
		
		/*TESTA SE AINDA HÁ PROCESSOS NA FILA*/
		if( sizeof($_SESSION['processosProntos']) > 0 ){
			
			/*COLOCA O PROCESSO NA CPU*/
			entraCPU();
		} else {
			/*INDICA QUE NÃO HÁ MAIS PROCESSOS NA FILA*/
			$_SESSION['finalizaEscalonamento'] = true;
		}
	}
}

function saiDaCPU(){
	geraLogs($_SESSION['processoCPU'], "finalizdo");
	geraLogs($_SESSION['processoCPU'], "sair");
	/*AGREGA O TEMPO DECORRIDO NA VARIÁVEL*/
	$_SESSION['tempoDecorrido'] = $_SESSION['tempoDecorrido'] + $_SESSION['processoCPU']['tempoCPU'] + $_SESSION['processoCPU']['tempoIO'];

	/*COLOCA O PROCESSO NA LISTA DE PROCESSOS FINALIZADOS*/
	array_push($_SESSION['processosFinalizados'],$_SESSION['processoCPU']);

	/*REORGANIZA O ARRAY DE PROCESSOS FINALIZADOS*/
	$_SESSION['processosFinalizados'] = array_values($_SESSION['processosFinalizados']);
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
	geraLogs($_SESSION['processoCPU'], "entrar");
	/*REMOVE O PROCESSO DA LISTA DE PRONTOS*/
	removeProcessoPronto();
}


header('location:../simulacaoExecucao.php');
?>