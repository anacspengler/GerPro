<?php
session_start();

$retorno = "algoritmos/";

$_SESSION['iniciaEscalonamento'] = true;
$_SESSION['finalizaEscalonamento'] = false;
$_SESSION['tempoDecorrido'] = 0;
$_SESSION['processoCPU'] = array();
$_SESSION['processosFinalizados'] = array();
$_SESSION['tempoTroca'] = 1;
$_SESSION['tempoIO'] = 5;
$_SESSION['quantum'] = 5;
$_SESSION['processosBloqueados'] = array();

switch ($_SESSION['algoritmo']) {
	case 0:
	$_SESSION['pagAlgoritmo'] = $retorno."fcfs.php";

	case 3:
	$_SESSION['pagAlgoritmo'] = $retorno."roundRobin.php";
	break;

	default:

	break;
}

function ordena(){

	$array_size = sizeof($_SESSION['processosProntos']);
	$numbers = $_SESSION['processosProntos'];
	
	for ( $i = 0; $i < $array_size; $i++ )
	{
		for ($j = 0; $j < $array_size; $j++ )
		{
			if ($numbers[$i]['tempoCPU'] < $numbers[$j]['tempoCPU'])
			{
				$temp = $numbers[$i];
				$numbers[$i] = $numbers[$j];
				$numbers[$j] = $temp;
			}
		}
	}
}

header('location:simulacaoExecucao.php');
?>