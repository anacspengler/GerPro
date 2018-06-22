<!DOCTYPE html>
<?php 
session_start();
?>
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
  <script type="text/javascript">
    function imprimir() {
      window.print();
    }
  </script>
  <!-- comentário -->
  <?php include "cabecalho.php"?>

  		 <?php
		 if(($_SESSION['algoritmo'] == 2) AND ($_SESSION['processoCPU'] != null ))
			 {	
				echo"
						 <div class=\"col s12 m6 l3\">
						   <a href=\"ExecEnovoProcesso.php\">
						   <button class=\"btn light-blue lighten-1\" type=\"submit\" name=\"action\">Criar um novo processo</button>

						   </a>
						 </div>
				";
			 }		
		 ?>
  
  <form method="POST" action="<?php echo($_SESSION['pagAlgoritmo'])?>">

    <div class="section no-pad-bot" id="index-banner">
      <div class="container">
        <br><br>
        <div class="row">
          <div class="col s12 m6 l3">
          <?php if(!$_SESSION['finalizaEscalonamento']){
            echo  "<button class=\"btn light-blue lighten-1\" type=\"submit\" name=\"action\">Avançar</button>";
            
          } else {
            echo "<a href=\"relatorioSimulacao.php\"> Finalizar Simulação </a>";
          }
          ?>
          <?php
            if($_SESSION['algoritmo'] > 3){
              include "parametrosSimulacao.php";
            }
          ?>
         </div>

         <?php
          if($_SESSION['algoritmo'] == 4 || $_SESSION['algoritmo'] == 5){
            include "tabelas/tabelaMf.php";
          } else {
            include "tabelas/tabelaGeral.php";
          }
         ?>

    <br><br>

  </div>

</div>

<?php include 'rodape.php';?>

    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
  </form>


</body>
</html>
