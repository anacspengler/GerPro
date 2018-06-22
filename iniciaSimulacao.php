<?php
session_start();

$retorno = "algoritmos/";

$_SESSION['iniciaEscalonamento'] = true;
$_SESSION['finalizaEscalonamento'] = false;
$_SESSION['tempoDecorrido'] = 0;
$_SESSION['processoCPU'] = array();
$_SESSION['processosFinalizados'] = array();
$_SESSION['processosBloqueados'] = array();
$_SESSION['prioridades'] = array();
$_SESSION['fila'] = array();
$_SESSION['numeroTrocaContexto'] = 0;
$_SESSION['horaInicioSimulação'] = date("d/m/Y à\s h:i:s",time());
$_SESSION['log'] = array();
$_SESSION['numeroLogs'] = 0;

if($_SESSION['algoritmo']==0){
	$_SESSION['pagAlgoritmo'] = $retorno."fcfs.php";
}

if($_SESSION['algoritmo']==1){
	$_SESSION['pagAlgoritmo'] = $retorno."sjf.php";
}

if($_SESSION['algoritmo']==2){
	$_SESSION['pagAlgoritmo'] = $retorno."srtn.php";
}

if($_SESSION['algoritmo']==3){
	preencheTempoIO();
	$_SESSION['pagAlgoritmo'] = $retorno."roundRobin.php";
}

if($_SESSION['algoritmo']==4){
	preencheTempoIO();
	$_SESSION['pagAlgoritmo'] = $retorno."prioridade.php";
}

if($_SESSION['algoritmo']==5){
	preencheTempoIO();
	$_SESSION['pagAlgoritmo'] = $retorno."mf.php";
	ordena_Prioridade();
}

if($_SESSION['algoritmo']==6){
	preencheTempoIO();
	$_SESSION['pagAlgoritmo'] = $retorno."spn.php";
}

if($_SESSION['algoritmo']==7){
	preencheTempoIO();
	$_SESSION['pagAlgoritmo'] = $retorno."garantido.php";
}

if($_SESSION['algoritmo']==8){
	preencheTempoIO();
	if($_SESSION['loteriaPremp'] == 1){
		$_SESSION['pagAlgoritmo'] = $retorno."loteria-premp.php";
	} elseif ($_SESSION['loteriaPremp'] == 2){
		$_SESSION['pagAlgoritmo'] = $retorno."loteria-npremp.php";
	}

}

if($_SESSION['algoritmo']==9){
	preencheTempoIO();
	$_SESSION['pagAlgoritmo'] = $retorno."fs.php";
}


function preencheTempoIO()
{
	$processos = array();
	foreach ($_SESSION['processosProntos'] as $processo) {
		if($processo['tipo'] == "I/O bound"){
			$processo['tempoIO'] = $_SESSION['opES'];
		} else {
			$processo['tempoIO'] = 0;
		}

		array_push($processos, $processo);
	}


	$_SESSION['processosProntos'] = $processos;
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

header('location:simulacaoExecucao.php');
?>