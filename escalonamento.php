<?php
	 
	 session_start();

	 $algoritmo = $_POST["algoritmo"];
	 
	 $_SESSION['algoritmo'] = $algoritmo;
	 
	 //criar condições e alerta em javascrip para ele não acessar a página caso não tenha selecionado as opções anteriores da página.,
	 
	 
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
		
			if($_SESSION['algoritmo'] == 0)
			 {	
				echo "Você escolheu o algoritmo First-Come First-Serve!";
				// descrição sobre o algoritmo
			 } 
			 
			 if($_SESSION['algoritmo'] == 1)
			 {	
				echo "Você escolheu o algoritmo Shortest Job First!";
				// descrição sobre o algoritmo			
			 } 
			
			 if($_SESSION['algoritmo'] == 2)
			 {	
				echo "Você escolheu o algoritmo Shortest Remaning Time Next!";
				// descrição sobre o algoritmo			
			 } 		
					
			 if($_SESSION['algoritmo'] == 3)
			 {	
				echo "Você escolheu o algoritmo Round-Robin!";
				// descrição sobre o algoritmo			
			 } 		
			 
			 if($_SESSION['algoritmo'] == 4)
			 {	
				echo "Você escolheu o algoritmo Prioridade!";
				// descrição sobre o algoritmo			
			 } 				 

			 if($_SESSION['algoritmo'] == 5)
			 {	
				echo "Você escolheu o algoritmo Múltiplas Filas!";
				// descrição sobre o algoritmo			
			 } 		 
			 
			 if($_SESSION['algoritmo'] == 6)
			 {	
				echo "Você escolheu o algoritmo Shortest Process Next!";
				// descrição sobre o algoritmo			
			 } 		

			 if($_SESSION['algoritmo'] == 7)
			 {	
				echo "Você escolheu o algoritmo Garantido!";
				// descrição sobre o algoritmo			
			 } 		

			 if($_SESSION['algoritmo'] == 8)
			 {	
				echo "Você escolheu o algoritmo Loteria!";
				// descrição sobre o algoritmo			
			 } 			 		 
			 
			 if($_SESSION['algoritmo'] == 9)
			 {	
				echo "Você escolheu o algoritmo Fair-Share!";
				// descrição sobre o algoritmo			
			 } 			 		 
			 
		?>
		</h5>
	<br><br>
	
	
	<?php
	 
	 if($_SESSION['pid'] ==0)
		 {			 
			 echo "<font color= \"#0000FF\"> IMPORTANTE: Você não tem nenhum processo criado. É necessário criar um novo processo. </font>";
			 echo "<br> <br> <br>";
			 echo"
				<form action=\"escalonamento_1.php\" method=\"POST\">
				
					<p>
					  <label>
						<span> <font color= \"#0000FF\"> Escolha o tipo do processo:</font></span>
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
						<span> <font color= \"#0000FF\"> Defina o tempo que o processo vai gastar na CPU:</font></span>
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
			 

		 }
	 
	 if ($_SESSION['pid'] > 0 )
		 {
			 
			 //fazer uma condição - criar um novo processo ou executar
			 // vai criar um novo id p/ um novo processo
			 
			 
			 //se criar um novo processo

			 
		 }	
	
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