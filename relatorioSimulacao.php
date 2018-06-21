<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h4>Informações sobre os Processos</h4>
	<table border="2">
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
=====================================================
	<h4>Informações a Simulação</h4>
	<p>Número de Processos Escalonados: <?php echo sizeof($_SESSION['processosFinalizados'])?></p>
	<p>Tempo total da Simulação: <?php echo $_SESSION['tempoDecorrido']?></p>
	<p>Número de troca de contextos: <?php echo $_SESSION['numeroTrocaContexto']?></p>
	<p>Turnround Médio: <?php echo $_SESSION['tempoDecorrido'] / sizeof($_SESSION['processosFinalizados'])?></p>
</body>
</html>