<?php

session_start();

	 //recebe os valores do form

$tipodoProcesso = $_POST["tipodoProcesso"];
$tempCPU = $_POST["tempCPU"];

	 //cria as seções que faltam conforme os dados apresentados

if($tipodoProcesso==0)
{
	$_SESSION['tipo'] = "CPU bound";
}

if($tipodoProcesso==1)
{
	$_SESSION['tipo'] = "I/O bound";
}	 

$_SESSION['tempoCPU'] = $tempCPU;
$_SESSION['restante'] = $_SESSION['tempoCPU'];

$processo = array( "pid"=> $_SESSION['pid'], "chegada"=> $_SESSION['chegada'], "tipo"=> $_SESSION['tipo'], "restante"=> $_SESSION['restante'], "tempoCPU"=> $_SESSION['tempoCPU'], "estado" =>"P", "tempoIO" => 10, "bilhete" => $_SESSION['pid']);

array_push($_SESSION['processosProntos'],$processo);

if($_SESSION['algoritmo'] == 1){
	ordena_SJF();
}

if($_SESSION['algoritmo'] == 2){
	ordena_SRTN();
}


function ordena_SJF(){

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

	$_SESSION['processosProntos'] = $numbers;
}

function ordena_SRTN(){

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

	$_SESSION['processosProntos'] = $numbers;
}

header('Location: ./gerenciarProcesso.php');

?>
