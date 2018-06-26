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
    <li class="collection-header"><h4>Processos Bloqueados</h4></li>
    <table>
      <thead>
        <th>PID</th>
        <th>Chegada</th>
        <th>Tipo do Processo</th>
        <th>Tempo Restante</th>
        <th>Tempo IO</th>
      </thead>
      <tbody>
        <?php
        foreach ($_SESSION['processosBloqueados'] as $processo) {
          echo('<tr><td>'.$processo["pid"].'</td><td>'.$processo["chegada"].'</td><td>'.$processo["tipo"].'</td><td>'.$processo["restante"].'</td><td>'.$processo["tempoIO"].'</td></tr>'); 
        }
        ?>
      </tbody>
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
<div class="right">
  <?php if(!$_SESSION['finalizaEscalonamento']){
            echo  "<button class=\"btn light-blue lighten-1\" type=\"submit\" name=\"action\">Avançar</button>";
            
          } else {
            echo "<a href=\"relatorioSimulacao.php\"> Finalizar Simulação </a>";
          }
          ?>
</div>
<div class="row">
  <div class="col s12 m12">
    <table class="responsive-table">
      <caption><h5>Feedback<h5></caption>
        <thead>
          <th>Mensagem</th>
        </thead>
        <tbody>
          <?php
          for ($i = $_SESSION['numeroLogs'] + 1; $i < sizeof($_SESSION['log']); $i++) {
            echo('<tr><td>'.$_SESSION['log'][$i].'</td></tr>'); 
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>  