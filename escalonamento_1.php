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
	 
	 $processo = array( "pid"=> $_SESSION['pid'], "chegada"=> $_SESSION['chegada'], "tipo"=> $_SESSION['tipo'], "restante"=> $_SESSION['restante'], "tempoCPU"=> $_SESSION['tempoCPU'], "estado" =>"P" );
	 
	 array_push($_SESSION['processos'],$processo);

	header('Location: ./gerenciarProcesso.php');
	 
?>
