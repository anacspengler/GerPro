
<?php
session_start();

$aux=0;

$aux= $_SESSION['processoCPU']['restante'];


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
		
				 if($_SESSION['pid'] ==0)
					 {			 
						 echo "Crie o seu primeiro processo:";
						 echo "<br>";
					 }
					 
				 if($_SESSION['pid'] > 0)
					 {			 
						 echo "Crie um novo processo: </font>";
						 echo "<br>";
					 }
			 
		?>
		</h5>
	<br><br>
	
	
	<?php
	 

			echo"
				<form action=\"escalonamento_2.php\" method=\"POST\">
				
					<p>
					  <label>
						<span> <font color= \"#DF013A\"> <h5> SOBRE O PROCESSO EM EXECUÇÃO </h5> </font></span>
					  </label>
					</p>
				
					<p>
					  <label>
						<span> <font color= \"#29b6f6\"> <h6> Como você está criando um novo processo durante a execução de um processo existente, <br> por favor definia o tempo que o processso que está na CPU gastou <h6></font></span>
					  </label>
					</p>

					<p class=\"range-field\">
					  <label>
						<input type=\"range\" name=\"tempGastoCPU\" min=\"0\" max=\"". $aux ."\">  
						<span>Tempo Gasto</span>
					  </label>
					</p>							
				
					<p>
					  <label>
						<span> <font color= \"#DF013A\"> <h5> SOBRE O NOVO PROCESSO </h5> </font></span>
					  </label>
					</p>				
				
					<p>
					  <label>
						<span> <font color= \"#29b6f6\"> <h6> Escolha o tipo do processo: <h6> </font></span>
					  </label>
					</p>
				
					<p>
					  <label>
						<input type=\"radio\" name=\"tipodoProcesso\" value=\"0\" checked>  
						<span>CPU bound</span>
					  </label>
					</p>
					
					<p>
					  <label>
						<input type=\"radio\" name=\"tipodoProcesso\" value=\"1\">  
						<span>I/O bound</span>
					  </label>
					</p>

					<p>
					  <label>
						<span> <font color= \"#29b6f6\"> <h6> Defina o tempo que o processo vai gastar na CPU: </h6> </font></span>
					  </label>
					</p>

					<p class=\"range-field\">
					  <label>
						<input type=\"range\" name=\"tempCPU\" min=\"0\" max=\"100\">  
						<span>Tempo</span>
					  </label>
					</p>		



					<p> 
						<input button class=\"btn light-blue lighten-1\" type=\"button\" name=\"sair\" value=\"VOLTAR\" onClick=\"history.go (-1)\"> 
						<input button class=\"btn light-blue lighten-1\" type=\"submit\" name=\"button\" value=\"PRÓXIMO\"> 
					</p>

				</form>
				";
			 

		 

	
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