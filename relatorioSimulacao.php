<?php
session_start();

$_SESSION['horaFimSimulação'] = date("d/m/Y à\s h:i:s",time());
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
	<title>GerPro</title>

	<!-- CSS  -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<?php include "cabecalho.php"?>
<body>
	<h4 class="header center orange-text">Resumo da Simulação</h4>
	
	<div class="row">
		<p class="light">Início da Simulação: <?php echo $_SESSION['horaInicioSimulação']?></p>
		<p class="light">Finalização da Simulação: <?php echo $_SESSION['horaFimSimulação']?></p>
	</div>

	<h4>Informações a Simulação</h4>
	<p>Número de Processos Escalonados: <?php echo sizeof($_SESSION['processosFinalizados'])?></p>
	<p>Tempo total da Simulação: <?php echo $_SESSION['tempoDecorrido']?></p>
	<p>Número de troca de contextos: <?php echo $_SESSION['numeroTrocaContexto']?></p>
	<p>Tempo Médio: <?php echo $_SESSION['tempoDecorrido'] / sizeof($_SESSION['processosFinalizados'])?></p>
	<!--<div class="row">
		<p class="light">Tipo de Sistema Utilizado: <?php ?></p>
		<p class="light">Algoritmo Utilizado: <?php ?></p>
	</div>-->
	<table class="responsive-table">
		<caption><h5>Processos Escalonados<h5></caption>
		<thead>
			<th>PID</th>
			<th>Chegada</th>
			<th>Tipo do Processo</th>
			<th>Tempo CPU</th>
		</thead>
		<tbody>
			<?php
			foreach ($_SESSION['processosFinalizados'] as $processo) {
				echo('<tr><td>'.$processo["pid"].'</td><td>'.$processo["chegada"].'</td><td>'.$processo["tipo"].'</td><td>'.$processo["tempoCPU"].'</td></tr>'); 
			}
			?>
		</tbody>
	</table>

	<table class="responsive-table">
		<caption><h5>Log da Simulacão<h5></caption>
		<thead>
			<th>Log</th>
		</thead>
		<tbody>
			<?php
			foreach ($_SESSION['log'] as $log) {
				echo('<tr><td>'.$log.'</td></tr>'); 
			}
			?>
		</tbody>
	</table>
	
</body>
<?php include "rodape.php";?>
</html>