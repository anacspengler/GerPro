<?php
	 $tipoSC = $_POST["tipoSC"];
	
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
		
		if($tipoSC == 0)
		 {	
			echo "Você escolheu um Sistema Batch!";
		 } 
		if($tipoSC == 1)
		 {	
			echo "Você escolheu um Sistema Interativo!";
		 }
		
		?>
		</h5>
	<br><br>
	
	
	<?php
	
	 if($tipoSC == 0)
	 {	
		echo"
				<form action=\"escalonamento.php\" name=\"form1\" method=\"POST\">
					<p>
					  <label>
						<input type=\"radio\" name=\"algoritmo\" value=\"0\" checked>  
						<span>First-Come First-Serve </span>
					  </label>
					</p>
					
					<p>
					  <label>
						<input type=\"radio\" name=\"algoritmo\" value=\"1\">  
						<span>Shortest Job First </span>
					  </label>
					</p>
					
					<p>
					  <label>
						<input type=\"radio\" name=\"algoritmo\" value=\"2\" >  
						<span>Shortest Remaning Time Next </span>
					  </label>
					</p>					


					<!-- botao de enviar -->
				
					<p> 
						<input button class=\"btn light-blue lighten-1\" type=\"button\" name=\"sair\" value=\"VOLTAR\" onClick=\"history.go (-1)\"> 
						<input button class=\"btn light-blue lighten-1\" type=\"submit\" name=\"button\" value=\"PRÓXIMO\"> 
					</p>

				</form>
			";
 
	 }
	 
	 
	 if($tipoSC == 1)
	 {	
		echo"
				<form action=\"escalonamento.php\" name=\"form1\" method=\"POST\">
					<p>
					  <label>
						<input type=\"radio\" name=\"algoritmo\" value=\"3\" checked>  
						<span>Round-Robin </span>
					  </label>
					</p>
					
					<p>
					  <label>
						<input type=\"radio\" name=\"algoritmo\" value=\"4\">  
						<span>Prioridade </span>
					  </label>
					</p>
					
					<p>
					  <label>
						<input type=\"radio\" name=\"algoritmo\" value=\"5\">  
						<span>Múltiplas Filas </span>
					  </label>
					</p>					

					<p>
					  <label>
						<input type=\"radio\" name=\"algoritmo\" value=\"6\">  
						<span>Shortest Process Next </span>
					  </label>
					</p>			

					<p>
					  <label>
						<input type=\"radio\" name=\"algoritmo\" value=\"7\">  
						<span>Garantido </span>
					  </label>
					</p>	

					<p>
					  <label>
						<input type=\"radio\" name=\"algoritmo\" value=\"8\">  
						<span>Loteria </span>
					  </label>
					</p>					

					<p>
					  <label>
						<input type=\"radio\" name=\"algoritmo\" value=\"9\">  
						<span>Fair-Share </span>
					  </label>
					</p>					
					
					<!-- botao de enviar -->
				
					<p> 
						<input button class=\"btn light-blue lighten-1\" type=\"button\" name=\"sair\" value=\"VOLTAR\" onClick=\"history.go (-1)\"> 
						<input button class=\"btn light-blue lighten-1\" type=\"submit\" name=\"button\" value=\"PRÓXIMO\"> 
					</p>

				</form>
			";
 
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