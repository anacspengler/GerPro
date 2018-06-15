<?php
	
	//session_start();
	
	//$id_usuario = $_SESSION['idusuario'];

	//echo "olá mundo";
	
	//$_SESSION['id_usuario'] = $id_usuario;

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
  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" class="brand-logo">GerPro</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="index.html">Início</a></li>
	<li><a href="tutorial.html">Tutorial</a></li>
	<li><a href="simulacao.html">Simulação</a></li>
	<li><a href="sobre.html">Sobre</a></li>
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="index.html">Início</a></li>
	<li><a href="tutorial.html">Tutorial</a></li>
	<li><a href="simulacao.html">Simulação</a></li>
	<li><a href="sobre.html">Sobre</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>


  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center orange-text">Simulação</h1>
      <div class="row center">
        <h5 class="header col s12 light">Escolha o tipo de Sistema Computacional:</h5>
	<br><br>
	
	<!-- criei um form para pegar o tipo de sistema computacional que o usuário escolheu -->
	<form action="tipoSistemaComp.php" name="form1" method="POST">
		<p>
		  <label>
			<input type="radio" name="tipoSC" value="0" checked>  
			<span>Sistemas batch </span>
		  </label>
		</p>

		<p>
		  <label>
			<input type="radio" name="tipoSC" value= "1">
			<span>Sistemas iterativo</span>
		  </label>
		</p>

		<!-- botao de enviar -->
		
		<p> 
		<input button class="btn light-blue lighten-1" type="submit" name="button" value="PRÓXIMO"> 
		</p>
		

  </form>
  
  <!-- fim do fomulário -->
	

  </div>
  
  <div class="container">
    <div class="section">
            
	
  <footer class="page-footer orange">
    <div class="footer-copyright">
      <div class="container">
      	<p>Desenvolvido por Ana Spengler, Leo Natan, João Biazotto</p>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
