
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
		
		echo "Você criou recentemente um novo processo. Por favor, escolha uma das opções a seguir:";
			 
		?>	 		 
			 
		</h5>
	<br><br>
	

	<div class="container">
	  <br><br>
	    <a href="novoProcesso.php">
	      <button class="btn light-blue lighten-1" type="submit" name="action">Criar um novo processo
              <i class="material-icons right">send</i>
          </button></a>
    </div>
	
	<div class="container">
	  <br><br>
	    <a href="infoProcesso.php">
	      <button class="btn light-blue lighten-1" type="submit" name="action">Verificar informações sobre os processos criados
              <i class="material-icons right">send</i>
          </button></a>
    </div>
		
	<div class="container">
	  <br><br>
	    <a href="definicoes.php">
	      <button class="btn light-blue lighten-1" type="submit" name="action">Executar a simulação
              <i class="material-icons right">send</i>
          </button></a>
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