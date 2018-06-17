<!DOCTYPE html>
<?php 
session_start();

		$array_size = sizeof($_SESSION['processoCPU']);
		

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
  <!-- comentário -->
  <?php include "cabecalho.php"?>

  		 <?php
		 if(($_SESSION['algoritmo'] == 2) AND ($array_size != null ))
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
           <button class="btn light-blue lighten-1" type="submit" name="action">Avançar</button>
           <p><?php echo($_SESSION['tempoDecorrido'])?></p>
         </div>

		 
         <div class="col s12 m6 l6">
          <ul class="collection with-header">
            <li class="collection-header"><h4>Executando</h4></li>
            <table>
              <thead>
                <th>PID</th>
                <th>Chegada</th>
                <th>Tipo do Processo</th>
                <th>Tempo Restante</th>
              </thead>
              <tbody>
                <?php
                $processoCPU = $_SESSION['processoCPU'];

                if($_SESSION['processoCPU']!= null){
                  echo('<tr><td>'.$processoCPU["pid"].'</td><td>'.$processoCPU["chegada"].'</td><td>'.$processoCPU["tipo"].'</td><td>'.$processoCPU["restante"].'</td></tr>');  
                } 
                else {
                  echo '<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
                }
                ?>
              </tbody>
            </table>
          </ul> 
        </div>
        <div class="col s12 m6 l6">
          <ul class="collection with-header">
            <li class="collection-header"><h4>Processos Finalizados</h4></li>
            <table>
              <thead>
                <th>PID</th>
                <th>Chegada</th>
                <th>Tipo do Processo</th>
                <th>Tempo Restante</th>
              </thead>
              <tbody>
                <?php
                foreach ($_SESSION['processosFinalizados'] as $processo) {
                  echo('<tr><td>'.$processo["pid"].'</td><td>'.$processo["chegada"].'</td><td>'.$processo["tipo"].'</td><td>'.$processo["restante"].'</td></tr>'); 
                }
                ?>
              </tbody>
            </table>
          </table>
        </ul>
      </div>
      <div class="col s12 m6 l6">
        <ul class="collection with-header">
          <li class="collection-header"><h4>Processos Prontos</h4></li>
          <table>
            <thead>
              <th>PID</th>
              <th>Chegada</th>
              <th>Tipo do Processo</th>
              <th>Tempo Restante</th>
            </thead>
            <tbody>
              <?php
              foreach ($_SESSION['processosProntos'] as $processo) {
                echo('<tr><td>'.$processo["pid"].'</td><td>'.$processo["chegada"].'</td><td>'.$processo["tipo"].'</td><td>'.$processo["restante"].'</td></tr>'); 
              }
              ?>
            </tbody>
          </table>
        </ul>
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
  </form>


</body>
</html>
