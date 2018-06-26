<?php
session_start();

function geraLogs($processo, $acao){
	$mensagem = "";

	if($acao == "entrar"){
		$mensagem = "Processo PID ".$processo['pid']." entrou na CPU";
	} else if ($acao == "sair") {
		$mensagem = "Processo PID ".$processo['pid']." saiu na CPU";
	} else if ($acao == "bloquear") {
		$mensagem = "Processo PID ".$processo['pid']." solcitou E/S e está bloqueado";
	} else if ($acao == "desbloquear") {
		$mensagem = "Processo PID ".$processo['pid']." é desbloqueado";
	} else if ($acao == "permaneceBloqueado") {
		$mensagem = "Processo PID ".$processo['pid']." continua bloqueado";
	} else if ($acao == "finaliza") {
		$mensagem = "Processo PID ".$processo['pid']." foi finalizado";
	} else if ($acao == "pronto"){
		$mensagem = "Processo PID ".$processo['pid']." vai para a lista de processos prontos";
	} else if ($acao == "srtn"){
		$mensagem = "Por ter menor tempo restante, o processo PID ".$processo['pid']." vai para a CPU";
	} else {
		$mensagem = $processo['pid']." ======== ".$acao;
	}
	array_push($_SESSION['log'],$mensagem);
}


?>