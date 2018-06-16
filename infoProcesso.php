<?php
	 
	 session_start();
	 

	// $processo = array( "pid"=> $_SESSION['pid'], "chegada"=> $_SESSION['chegada'], "tipo"=> $_SESSION['tipo'], "restante"=> $_SESSION['restante'], "tempoCPU"=> $_SESSION['tempoCPU'], "estado" =>"P" );
	 
	// array_push($_SESSION['processos'],$processo);

	
	 
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
				echo "Algoritmo escolhido: First-Come First-Serve!";
				// descrição sobre o algoritmo
			 } 
			 
			 if($_SESSION['algoritmo'] == 1)
			 {	
				echo "Algoritmo escolhido: Shortest Job First!";
				// descrição sobre o algoritmo			
			 } 
			
			 if($_SESSION['algoritmo'] == 2)
			 {	
				echo "Algoritmo escolhido: Shortest Remaning Time Next!";
				// descrição sobre o algoritmo			
			 } 		
					
			 if($_SESSION['algoritmo'] == 3)
			 {	
				echo "Algoritmo escolhido: Round-Robin!";
				// descrição sobre o algoritmo			
			 } 		
			 
			 if($_SESSION['algoritmo'] == 4)
			 {	
				echo "Algoritmo escolhido: Prioridade!";
				// descrição sobre o algoritmo			
			 } 				 

			 if($_SESSION['algoritmo'] == 5)
			 {	
				echo "Algoritmo escolhido: Múltiplas Filas!";
				// descrição sobre o algoritmo			
			 } 		 
			 
			 if($_SESSION['algoritmo'] == 6)
			 {	
				echo "Algoritmo escolhido: Shortest Process Next!";
				// descrição sobre o algoritmo			
			 } 		

			 if($_SESSION['algoritmo'] == 7)
			 {	
				echo "Algoritmo escolhido: Garantido!";
				// descrição sobre o algoritmo			
			 } 		

			 if($_SESSION['algoritmo'] == 8)
			 {	
				echo "Algoritmo escolhido: Loteria!";
				// descrição sobre o algoritmo			
			 } 			 		 
			 
			 if($_SESSION['algoritmo'] == 9)
			 {	
				echo "Algoritmo escolhido: Fair-Share!";
				// descrição sobre o algoritmo			
			 } 				 
			 
		?>	 		 
			 
		</h5>
	<br><br>
	

<table>
		<thead>
			<th>PID</th>
			<th>Tempo de Chegada</th>
			<th>Tipo do Processo</th>
			<th>Tempo de CPU</th>
			<th>Tempo Restante</th>
			<th>Estado</th>
		</thead>
		<tbody>
			<?php
			foreach ($_SESSION['processos'] as $processo) {
				if($processo["estado"] == 'P')
					echo('<tr><td>'.$processo["pid"].'</td><td>'.$processo["chegada"].'</td><td>'.$processo["tipo"].'</td><td>'.$processo["tempoCPU"].'</td><td>'.$processo["restante"].'</td><td>'.$processo["estado"].'</td></tr>');	
			}
			?>
		</tbody>
	</table>

	
	
	
	<div class="container">
	  <br><br>
		<form> 
		<input class="btn light-blue lighten-1"  type="button" value="VOLTAR" onClick="history.go(-1)"> 
		</form>
    </div>
	

  <div class="container">
    <div class="section">


  <?php include 'rodape.php';?>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>