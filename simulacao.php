<?php

session_start();

$_SESSION['pid'] = 0;
$_SESSION['chegada'] = 0;
$_SESSION['processosProntos'] = array();

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
				document.getElementById('descricaoAlgoritmo').innerHTML = "Texto sobre sistemas batch";
			} else {
				document.getElementById('descricaoAlgoritmo').innerHTML = "Texto sobre sistemas iterativo";
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
				<h5 class="header col s12 light">Escolha o tipo de Sistema Computacional:</h5>
				<br><br>

				<!-- criei um form para pegar o tipo de sistema computacional que o usuário escolheu -->
				<form action="tipoSistemaComp.php" name="form1" method="POST">
					<div class="row">

						<div class="col m4 s12 offset-m2" align="left">
							
							<p>
								<label>
									<input type="radio" onclick="selecionaAlgoritmo(value)" name="tipoSC" value="0" checked>  
									<span>Sistemas batch </span>
								</label>
							</p>

							<p>
								<label>
									<input type="radio" name="tipoSC" onclick="selecionaAlgoritmo(value)" value= "1">
									<span>Sistemas iterativo</span>
								</label>
							</p>

						</div>

						<div class="col m4 s12">
							<p id="descricaoAlgoritmo"></p>
						</div>


						<!-- botao de enviar -->
						<p id="algoritmo"></p>
						<p> 
							<input button class="btn light-blue lighten-1" type="submit" name="button" value="PRÓXIMO"> 
						</p>
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
