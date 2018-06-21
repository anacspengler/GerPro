<?php

/*INICIA A SESSÃO*/
session_start();

echo ($_SESSION['finalizaEscalonamento']);

include_once "../util/funcoesPreemptivo.php";

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

function removeProcessoPronto($indice){

	/*REMOVE O PRIMEIRO PROCESSO DA FILA*/
	unset($_SESSION['processosProntos'][$indice]);

	/*REORGANIZA O ARRAY DE PROCESSOS PRONTOS*/
	$_SESSION['processosProntos'] = array_values($_SESSION['processosProntos']);
}

function entraCPU(){
	/*COLOCA O PRIMEIRO PROCESSO DA FILA NA CPU*/
	$indice = sorteiaBilhetes();
	$_SESSION['processoCPU'] = $_SESSION['processosProntos'][$indice];

	/*REMOVE O PROCESSO DA LISTA DE PRONTOS*/
	removeProcessoPronto($indice);
}

function sorteiaBilhetes(){
	return rand(0, sizeof($_SESSION['processosProntos']) - 1);

}

header('location:../simulacaoExecucao.php');

?>