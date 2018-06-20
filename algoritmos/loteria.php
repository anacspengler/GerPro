<?php 
session_start();
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
			entraCPU();

		} else {
			/*INDICA QUE NÃO HÁ MAIS PROCESSOS NA FILA*/
			$_SESSION['finalizaEscalonamento'] = true;
		}
	}
}

function saiDaCPU(){
	/*AGREGA O TEMPO DECORRIDO NA VARIÁVEL*/
	$_SESSION['tempoDecorrido'] = $_SESSION['tempoDecorrido'] + $_SESSION['processoCPU']['tempoCPU'] + $_SESSION['processoCPU']['tempoIO'];

	/*COLOCA O PROCESSO NA LISTA DE PROCESSOS FINALIZADOS*/
	array_push($_SESSION['processosFinalizados'],$_SESSION['processoCPU']);

	/*REORGANIZA O ARRAY DE PROCESSOS FINALIZADOS*/
	$_SESSION['processosFinalizados'] = array_values($_SESSION['processosFinalizados']);
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
	removeProcessoPronto($indice);
	/*REMOVE O PROCESSO DA LISTA DE PRONTOS*/
}

function sorteiaBilhetes(){
	return rand(0, sizeof($_SESSION['processosProntos']) - 1);

}
 header('location:../simulacaoExecucao.php');
?>
