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
      <h1 class="header center orange-text">GerPro</h1>
      <div class="row center">
        <h5 class="header col s12 light">GerPro (Um Recurso Educacional Aberto para Apoiar a Aprendizagem de Gerenciamento de Processos). </h5>
      </div>
      <br><br>
    </div>
  </div>
  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12">
          <div class="icon-block">
		  
            <h5 class="center">Descrição sobre o GerPro</h5>
				<p class="light" align="justify">
				O recurso educacional aberto (REA) intitulado GerPro tem o propósito de apoiar o ensino da disciplina de Sistemas Operacionais, especificamente o conteúdo de escalonamento de processos. Ele foi desenvolvido como um mecanismo de apoio ao ensino e treinamento de escalonamento. Desse modo, o aluno que desejar aprender o conteúdo pode utilizá-lo para estudar e o aluno que já aprendeu o conteúdo e que tem a intenção de reforçar o seu conhecimento, também poderá utilizá-lo. </p>
				<p class="light" align="justify">
				O REA funciona como um simulador de escalonamentos. Nesse sentido, o usuário (aluno) poderá criar novos processos, escolher o tipo de cada processo, definir o tipo do sistema computacional, escolher algoritmos de escalonamento para simular a execução, executar e visualizar as simulações. As demonstrações são instanciações dos principais algoritmos e sistemas computacionais que fazem parte da literatura acadêmica, em especial do livro: TANENBAUM, A.S.; Sistemas Operacionais Modernos Ed. Prentice-Hall Brasil, 2007. </p>
				<p class="light" align="justify"> O fluxo de execução e interação é uma instância do diagrama conceitual do conteúdo de gerenciamento de processos, desenvolvido por ACEITUNO (2013). Esse diagrama representa como o professor deve organizar os assuntos que fazem parte desta unidade da disciplina de Sistemas Operacionais. Ele é baseado na metodologia AIM-CID (Abordagem Integrada de Modelos Conceitual, Instrucional e Didático), definida por Barbosa (2004). Nessa perspectiva, o REA estabelecido é uma instância do diagrama. </p>
				<p class="light" align="justify"> É importante salientar que o REA não é fundamentado em nenhuma teoria de aprendizagem. No entanto, ele foi desenvolvido de modo que possa ser utilizado em diferentes abordagens de ensino, que podem ou não ser fundamentadas em teorias de aprendizagem. </p>
				<p class="light" align="justify"> O público-alvo do REA é constituído por alunos de cursos de graduação em Computação, seja oriundo do Bacharelado em Ciências de Computação ou Sistemas de Informação ou Engenharia de Computação. </p>
			
			<b class="center">Referências</b>
				<p class="light" align="justify"> ACEITUNO, R. G. A. Aplicação da metodologia AIM-CID no conteúdo da disciplina sistemas operacionais. Dissertação (Mestrado em Ciências de Computação e Matemática Computacional), Universidade de São Paulo, 2013.</p>
				<p class="light" align="justify"> BARBOSA, E. F. Uma Contribuição ao Processo de Desenvolvimento e Modelagem de Módulos Educacionais. Tese (Doutorado em Ciências de Computação e Matemática Computacional), Universidade de São Paulo, 2004. </p>	
          </div>
        </div>
<div class="row">
    <div class="col s12 m6">
      <a href="simulacao.php" class="light-blue lighten-1 btn">Ir para Simulação</a>
    </div>
    </div>    

</div>
<?php include 'rodape.php';?>
</div>

  


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
