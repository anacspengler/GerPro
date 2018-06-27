
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

					 if($_SESSION['algoritmo'] < 3){
							 echo "<p>IMPORTANTE: Para esse tipo de sistema, considere: Tempo de I/O = 10 e Tempo de troca de contexto = 2</p>";
							 echo "<br>";
						}
		?>
		</h5>
	<br><br>
	
	
	<?php
	 

		 echo"
				<form action=\"escalonamento_1.php\" method=\"POST\">
				
				
					<p>
					  <label>
						<span> <h6> <font color= \"#29b6f6\"> Primeiro, escolha o tipo do processo:</font> </h6></span>
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
						<span> <h6> <font color= \"#29b6f6\"> Depois, defina o tempo que o processo vai gastar na CPU:</font> </h6></span>
					  </label>
					</p>

					<p class=\"range-field\">
					  <label>
						<input type=\"range\" name=\"tempCPU\" min=\"0\" max=\"100\">  
						<span>Tempo</span>
					  </label>
					</p>";
					
					if($_SESSION['algoritmo'] == 4 || $_SESSION['algoritmo'] == 5)
					{
						echo "	
						<p>
							<label>
								<span> <h6> <font color= \"#29b6f6\"> Para o algortimo que está simulando, é necessário atribuir uma prioridade para o processo que está criando:</font> </h6></span>
							</label>
						</p>
						<p>
							<label>
								<span> <font color= \"red\"> Lembrete: Prioridades são atribupídas por ordem decrescente (0 é a mais alta) </font></span>
							</label>
						</p>						
						<p>

						<p class=\"range-field\">
						  <label>
							<input type=\"range\" name=\"prioridade\" min=\"0\" max=\"9\"s>  
							<span>Tempo</span>
						  </label>
						</p>						
						
						";
					}

					echo "<p> 
						<input button class=\"btn light-blue lighten-1\" type=\"button\" name=\"sair\" value=\"VOLTAR\" onClick=\"history.go (-1)\"> 
						<input button class=\"btn light-blue lighten-1\" type=\"submit\" name=\"button\" value=\"PRÓXIMO\"> 
					</p>

				</form>
				";
			 

		 

	
	?>
	
	<!-- bla bla -->

	<!--
	<div class="container">
	  <br>
	    <a href="#">
	      <button class="btn light-blue lighten-1" type="submit" name="action">First-Come First-Server
              <i class="material-icons right">send</i>
            </button></a>
        </div>
	<div class="container">
	  <br>
	    <a href="#">
	      <button class="btn light-blue lighten-1" type="submit" name="action" >Shortest Job First
             <i class="material-icons right">send</i>
           </button></a>
        </div>
        <div class="container">
	  <br>
	    <a href="#">
	      <button class="btn light-blue lighten-1" type="submit" name="action" >Shortest Remaning Time Next
             <i class="material-icons right">send</i>
           </button></a>
        </div>
      </div>
      <br><br>
    </div>

  </div>
  
  -->
  <div class="container">
    <div class="section">


  <?php include 'rodape.php';?>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>