
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
<!-- comentário -->
  <?php include 'cabecalho.php';?>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center orange-text">Simulação</h1>
      <div class="row center">
        <h5 class="header col s12 light">
		<?php 
		
		echo"Como você criou uma simulação de um sistema interativo, <br> você precisa definir algumas características da simulação:";
			 
		?>
		</h5>
	<br><br>
	
	
	<?php
	 
	 if($_SESSION['algoritmo'] < 3)
	 {
		 header('Location: ./iniciaSimulacao.php');
	 }
	 
	 
	 if($_SESSION['algoritmo']>2)
	 {
			
		 echo"
				<form action=\"define.php\" method=\"POST\">
				<br><br><br>
					<p>
					  <label>
						<span> <font color= \"#29b6f6\"> <h6> Defina o tamanho do quantum: </h6></font></span>
					  </label>
					</p>
				
					<p class=\"range-field\">
					  <label>
						<input type=\"range\" name=\"quantum\" min=\"1\" max=\"100\">  
						<span>Tempo</span>
					  </label>
					</p>					

					<p>
					  <label>
						<span> <font color= \"#29b6f6\"> <h6> Defina o tempo de operações de entrada e saída (E/S): </h6></font></span>
					  </label>
					</p>
				
					<p class=\"range-field\">
					  <label>
						<input type=\"range\" name=\"opES\" min=\"1\" max=\"100\">  
						<span>Tempo</span>
					  </label>
					</p>
					
					<p>
					  <label>
						<span> <font color= \"#29b6f6\"> <h6> Defina o tempo de troca de contexto: </h6> </font></span>
					  </label>
					</p>
				
					<p class=\"range-field\">
					  <label>
						<input type=\"range\" name=\"trocaContexto\" min=\"1\" max=\"100\">  
						<span>Tempo</span>
					  </label>
					</p>

					<p>
					  <label>
						<span> <font color= \"#29b6f6\"> <h6> Defina quanto tempo os processos vão ficar na CPU até solicitar E/S: </h6></font></span>
					  </label>
					</p>
				
					<p class=\"range-field\">
					  <label>
						<input type=\"range\" name=\"tempoProcesso\" min=\"1\" max=\"100\">  
						<span>Tempo</span>
					  </label>
					</p>";
					
					if ($_SESSION['algoritmo']==8)
					{
						
						echo "
							<p>
							  <label>
								<span> <font color= \"#0000FF\"> ATENÇÃO: Como você escolheu o algoritmo Loteria, você precisa definir se fará a simulação consideranção se preempeção ou não  </font></span>
							  </label>
							</p>
							
							<p>
							  <label>
								<input type=\"radio\" name=\"loteriaPremp\" value=\"1\">  
								<span> Preemptivo </span>
							  </label>
							</p>
							
							<p>
							  <label>
								<input type=\"radio\" name=\"loteriaPremp\" value=\"2\" >  
								<span> Não preemptivo </span>
							  </label>
							</p>							
					
					";
						
						
					}
					
				echo"
					<p> 
						<input button class=\"btn light-blue lighten-1\" type=\"button\" name=\"sair\" value=\"VOLTAR\" onClick=\"history.go (-1)\"> 
						<input button class=\"btn light-blue lighten-1\" type=\"submit\" name=\"button\" value=\"PRÓXIMO\"> 
					</p>

				</form>
				";			
	 }
	
	?>

  <div class="container">
    <div class="section">


  <?php include 'rodape.php';?>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>