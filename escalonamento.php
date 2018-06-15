<?php
	 $algoritmo = $_POST["algoritmo"];
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
		
		if($algoritmo == 0)
		 {	
			echo "Você escolheu o algoritmo First-Come First-Serve!";
			// descrição sobre o algoritmo
		 } 
		 
		 if($algoritmo == 1)
		 {	
			echo "Você escolheu o algoritmo Shortest Job First!";
			// descrição sobre o algoritmo			
		 } 
		
		 if($algoritmo == 2)
		 {	
			echo "Você escolheu o algoritmo Shortest Remaning Time Next!";
			// descrição sobre o algoritmo			
		 } 		
				
		 if($algoritmo == 3)
		 {	
			echo "Você escolheu o algoritmo Round-Robin!";
			// descrição sobre o algoritmo			
		 } 		
		 
		 if($algoritmo == 4)
		 {	
			echo "Você escolheu o algoritmo Prioridade!";
			// descrição sobre o algoritmo			
		 } 				 

		 if($algoritmo == 5)
		 {	
			echo "Você escolheu o algoritmo Múltiplas Filas!";
			// descrição sobre o algoritmo			
		 } 		 
		 
		 if($algoritmo == 6)
		 {	
			echo "Você escolheu o algoritmo Shortest Process Next!";
			// descrição sobre o algoritmo			
		 } 		

		 if($algoritmo == 7)
		 {	
			echo "Você escolheu o algoritmo Garantido!";
			// descrição sobre o algoritmo			
		 } 		

		 if($algoritmo == 8)
		 {	
			echo "Você escolheu o algoritmo Loteria!";
			// descrição sobre o algoritmo			
		 } 			 		 
		 
		 if($algoritmo == 9)
		 {	
			echo "Você escolheu o algoritmo Fair-Share!";
			// descrição sobre o algoritmo			
		 } 			 		 
		 
		?>
		</h5>
	<br><br>
	
	
	<?php
	
	 $numTotalProcesso = 0; //vamos recurperar de algum lugar a informação do número de processo. 
	 
	 if ($numTotalProcesso ==0)
		 {
			 // comando o usuário precisará criar um processo
		 }
	 
	 if ($numTotalProcesso > 0 )
		 {
			 // comando 
			 // possibilidade de criar, apenas executar
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