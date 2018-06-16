<?php
	 
	 session_start();
	 
	 //recebe os valores do form
	 
	 $tipodoProcesso = $_POST["tipodoProcesso"];
	 $tempCPU = $_POST["tempCPU"];
	 
	 //cria as seções que faltam conforme os dados apresentados
	 
	 
	 $_SESSION['tipo'] = $tipodoProcesso;
	 $_SESSION['tempoCPU'] = $tempCPU;
	 $_SESSION['restante'] = $_SESSION['tempoCPU'];
	 
	 $processo = array( "pid"=> $_SESSION['pid'], "chegada"=> $_SESSION['chegada'], "tipo"=> $_SESSION['tipo'], "restante"=> $_SESSION['restante'], "tempoCPU"=> $_SESSION['tempoCPU'], "estado" =>"P" );
	 
	 array_push($_SESSION['processos'],$processo);
	 
	 echo $_SESSION['tipo'];
	 echo $_SESSION['tempoCPU'];
	 
	//$_SESSION['pid'] = $_SESSION['pid'] + 1;
	//$_SESSION['chegada'] = $_SESSION['chegada'] + 2;
	 
	
	 
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
				echo "First-Come First-Serve!";
				// descrição sobre o algoritmo
			 } 
			 
			 if($_SESSION['algoritmo'] == 1)
			 {	
				echo "Shortest Job First!";
				// descrição sobre o algoritmo			
			 } 
			
			 if($_SESSION['algoritmo'] == 2)
			 {	
				echo "Shortest Remaning Time Next!";
				// descrição sobre o algoritmo			
			 } 		
					
			 if($_SESSION['algoritmo'] == 3)
			 {	
				echo "Round-Robin!";
				// descrição sobre o algoritmo			
			 } 		
			 
			 if($_SESSION['algoritmo'] == 4)
			 {	
				echo "Prioridade!";
				// descrição sobre o algoritmo			
			 } 				 

			 if($_SESSION['algoritmo'] == 5)
			 {	
				echo "Múltiplas Filas!";
				// descrição sobre o algoritmo			
			 } 		 
			 
			 if($_SESSION['algoritmo'] == 6)
			 {	
				echo "Shortest Process Next!";
				// descrição sobre o algoritmo			
			 } 		

			 if($_SESSION['algoritmo'] == 7)
			 {	
				echo "Garantido!";
				// descrição sobre o algoritmo			
			 } 		

			 if($_SESSION['algoritmo'] == 8)
			 {	
				echo "Loteria!";
				// descrição sobre o algoritmo			
			 } 			 		 
			 
			 if($_SESSION['algoritmo'] == 9)
			 {	
				echo "Fair-Share!";
				// descrição sobre o algoritmo			
			 } 			 		 
			 
		?>	 		 
			 
		</h5>
	<br><br>
	
	
	<?php
	
	
	
	
	
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