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
			$_SESSION['pagAlgoritmo'] = $retorno."roundRobin.php";
		}

		if($_SESSION['algoritmo']==4){
			$_SESSION['pagAlgoritmo'] = $retorno."prioridade.php";
		}

		if($_SESSION['algoritmo']==5){
			$_SESSION['pagAlgoritmo'] = $retorno."mn.php";
		}

		if($_SESSION['algoritmo']==6){
			$_SESSION['pagAlgoritmo'] = $retorno."spn.php";
		}

		if($_SESSION['algoritmo']==7){
			$_SESSION['pagAlgoritmo'] = $retorno."garantido.php";
		}

		if($_SESSION['algoritmo']==8){
			$_SESSION['pagAlgoritmo'] = $retorno."loteria.php";
		}

		if($_SESSION['algoritmo']==9){
			$_SESSION['pagAlgoritmo'] = $retorno."fs.php";
		}


header('location:simulacaoExecucao.php');
?>