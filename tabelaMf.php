<div class="col s12 m6 l6">
          <ul class="collection with-header">
            <li class="collection-header"><h4>Executando</h4></li>
            <table>
              <thead>
                <th>PID</th>
                <th>Chegada</th>
                <th>Tipo do Processo</th>
                <th>Tempo Restante</th>
                <th>Prioridade</th>
              </thead>
              <tbody>
                <?php
                $processoCPU = $_SESSION['processoCPU'];

                if($_SESSION['processoCPU']!= null){
                  echo('<tr><td>'.$processoCPU["pid"].'</td><td>'.$processoCPU["chegada"].'</td><td>'.$processoCPU["tipo"].'</td><td>'.$processoCPU["restante"].'</td><td>'.$processoCPU["prioridade"].'</td></tr>');  
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
                <th>Prioridade</th>
              </thead>
              <tbody>
                <?php
                foreach ($_SESSION['processosFinalizados'] as $processo) {
                  echo('<tr><td>'.$processo["pid"].'</td><td>'.$processo["chegada"].'</td><td>'.$processo["tipo"].'</td><td>'.$processo["restante"].'</td><td>'.$processo["prioridade"].'</td></tr>'); 
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
              <th>Prioridade</th>
            </thead>
            <tbody>
              <?php
              foreach ($_SESSION['fila'] as $processo) {
                echo('<tr><td>'.$processo["pid"].'</td><td>'.$processo["chegada"].'</td><td>'.$processo["tipo"].'</td><td>'.$processo["restante"].'</td><td>'.$processo["prioridade"].'</td></tr>'); 
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
    </div>