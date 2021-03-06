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
		
		echo "Informações sobre os processos criados:";
			 
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
			foreach ($_SESSION['processosProntos'] as $processo) {
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