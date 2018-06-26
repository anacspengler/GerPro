<?php
session_start();

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
<body>
	<script type="text/javascript">
		function selecionaAlgoritmo(value){
			if(value == 0){
				document.getElementById('descricaoAlgoritmo').innerHTML = "O First-Come First-Serve é um algoritmo não-preemptivo que consiste em uma fila, onde os processos são escalonados na ordem em que chegam.";
			} else if(value == 1){
				document.getElementById('descricaoAlgoritmo').innerHTML = "O Shortest Job First é um algoritmo não-preemptivo que prioriza a execução dos algoritmos com menor tempo de CPU.";
			} else if(value == 2){
				document.getElementById('descricaoAlgoritmo').innerHTML = "O Shortest Remaning Time Next é um algoritmo preemptivo que prioriza a execução dos menores processos. Se um processo está sendo executado e um novo processo com menor tempo restante chega para ser escalonado, o processo da CPU é suspenso e o menor executado.";
			} else if(value == 3){
				document.getElementById('descricaoAlgoritmo').innerHTML = "O Round Robin é um algoritmo preemptivo que atribui frações de tempo (quantum) para cada processo em partes iguais e de forma circular, manipulando todos os processos sem prioridades.";
			} else if(value == 4){
				document.getElementById('descricaoAlgoritmo').innerHTML = "O Prioridade é um algoritmo preemptivo onde cada processo possui uma prioridade. Os processos prontos com maior prioridade são executados primeiro"
			} else if(value == 5){
				document.getElementById('descricaoAlgoritmo').innerHTML = "O Múltiplas Filas é um algoritmo onde os procesos são distribuidos em classes de prioridades. Cada classe (fila) é executada até o fim e os processos de outra classe somente são executados quando todos os processos da classe anterior forem finalizados";
			} else if(value == 6){
				document.getElementById('descricaoAlgoritmo').innerHTML = "O Shortest Process Next é um algoritmo preemptivo que executa sempre o processo pronto com menor tempo restante";
			} else {
				document.getElementById('descricaoAlgoritmo').innerHTML = "O Loteria é um algoritmo preemptivo ou não-preemptivo onde o sistema distribui bilhetes aos processos, e faz um sorteio cada vez que precisa selecionar um processo para a CPU";
			}
		}
	</script>
	<!-- comentário -->
	<?php include 'cabecalho.php';?>
	<div class="section no-pad-bot" id="index-banner">
		<div class="container">
			<br><br>
			<h1 class="header center orange-text">Simulação</h1>
			<div class="row center">
				<h5 class="header col s12 light">

					<?php 

					if($_SESSION['tipoSC'] == 0)
					{	
						echo "Você escolheu um Sistema Batch!";
					} 
					if($_SESSION['tipoSC'] == 1)
					{	
						echo "Você escolheu um Sistema Interativo!";
					}

					?>
				</h5>
				<br><br>

				<form action="escalonamento.php" name="form1" method="POST">
					<div class="col m4 s12 offset-m2" align="left">
						<?php

						if($_SESSION['tipoSC'] == 0)
						{	
							echo"

							<p>
							<label>
							<input type=\"radio\" name=\"algoritmo\" value=\"0\" onclick=\"selecionaAlgoritmo(value)\" checked>  
							<span>First-Come First-Serve </span>
							</label>
							</p>

							<p>
							<label>
							<input type=\"radio\" name=\"algoritmo\" value=\"1\" onclick=\"selecionaAlgoritmo(value)\">  
							<span>Shortest Job First </span>
							</label>
							</p>

							<p>
							<label>
							<input type=\"radio\" name=\"algoritmo\" value=\"2\" onclick=\"selecionaAlgoritmo(value)\">  
							<span>Shortest Remaning Time Next </span>
							</label>
							</p>					


							<!-- botao de enviar -->

							<p> 
							<input button class=\"btn light-blue lighten-1\" type=\"button\" name=\"sair\" value=\"VOLTAR\" onClick=\"history.go (-1)\"> 
							<input button class=\"btn light-blue lighten-1\" type=\"submit\" name=\"button\" value=\"PRÓXIMO\"> 
							</p>
							";

						}


						if($_SESSION['tipoSC'] == 1)
						{	
							echo"
							<p>
							<label>
							<input type=\"radio\" name=\"algoritmo\" value=\"3\" onclick=\"selecionaAlgoritmo(value)\" checked>  
							<span>Round-Robin </span>
							</label>
							</p>

							<p>
							<label>
							<input type=\"radio\" name=\"algoritmo\" value=\"4\" onclick=\"selecionaAlgoritmo(value)\">  
							<span>Prioridade </span>
							</label>
							</p>

							<p>
							<label>
							<input type=\"radio\" name=\"algoritmo\" value=\"5\"onclick=\"selecionaAlgoritmo(value)\">  
							<span>Múltiplas Filas </span>
							</label>
							</p>					

							<p>
							<label>
							<input type=\"radio\" name=\"algoritmo\" value=\"6\" onclick=\"selecionaAlgoritmo(value)\">  
							<span>Shortest Process Next </span>
							</label>
							</p>			


							<p>
							<label>
							<input type=\"radio\" name=\"algoritmo\" value=\"8\" onclick=\"selecionaAlgoritmo(value)\">  
							<span>Loteria </span>
							</label>
							</p>					


							<!-- botao de enviar -->

							<p> 
							<input button class=\"btn light-blue lighten-1\" type=\"button\" name=\"sair\" value=\"VOLTAR\" onClick=\"history.go (-1)\"> 
							<input button class=\"btn light-blue lighten-1\" type=\"submit\" name=\"button\" value=\"PRÓXIMO\"> 
							</p>
							";

						}

						?>
					</div>
					<div class="col m4 s12">
						<p id="descricaoAlgoritmo"></p>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="section">


		<?php include 'rodape.php';?>


		<!--  Scripts-->
		<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script src="js/materialize.js"></script>
		<script src="js/init.js"></script>

	</body>
	</html>