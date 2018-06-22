<?php
session_start();
	$_SESSION['horaFimSimulação'] = date("d/m/Y à\s h:i:s",time());
?>

<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
	<script type="text/javascript">
		function imprimir() {
			window.print();
		}
	</script>
	<h4 class="header center orange-text">Resumo da Simulação</h4>
	<button onclick="imprimir()">Imprimir</button>
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
	<table border="1">
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

	<table  border="1">
		<caption><h5>Log da Simulacão<h5></caption>
		<thead>
			
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

</html>