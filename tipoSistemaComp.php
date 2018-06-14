<?php
	
	 $tipoDeSistemaComputacional = $_POST["tipoDeSistemaComputacional"];
	
	 if(tipoDeSistemaComputacional == 0)
	 {	
		echo "Você escolheu o sistema batch";
	 }
	
	if(tipoDeSistemaComputacional == 1)
	 {	
		echo "Você escolheu o sistema iterativo";
	 }
	

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
        <h5 class="header col s12 light">Você escolheu um Sistema Batch!</h5>
	<br><br>
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
  <div class="container">
    <div class="section">


  <footer class="page-footer orange">
    <div class="footer-copyright">
      <div class="container">
      	<p>Feito por Ana Spengler, Leo Natan, João Biazotto</p>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
