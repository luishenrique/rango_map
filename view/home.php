<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);

/*
 * 	Descrição do Arquivo
 * 	@author - Luis Henrique Rodrigues
 * 	@data de criação - 15/04/2014
 * 	@arquivo  - lista.php
 */
 

include_once("../functions/functions.class.php");


$functions	= new Functions;

$id = ( isset($_GET['id']) ) ? $_GET['id'] : 0;



?>

<!DOCTYPE html>
<html>
  	<head>
    
        <meta charset="utf-8">
        <title>Rango Map</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
    
        <!-- Estilos -->
        <link href="../css/bootstrap.css" rel="stylesheet">
        <link href="../css/geral.css" rel="stylesheet">
        <link href="../css/validation.css" rel="stylesheet">
        <link href="../css/bootstrap-responsive.css" rel="stylesheet">


  	</head>


	<body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        <img class="brand" src="../img/assinatura_tanbook.png" alt="" style="width:200px;">
        <div class="nav-collapse collapse">
      			<?php
               $functions->geraMenu();
            ?>

          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    
    
    <div class="container">

		<!-- Título -->
        <blockquote>
          <h2>Bem vindo!</h2>
          
        </blockquote>


        <!-- Mensagem de Retorno -->
        <?php
        if(!empty($_GET["tipo"])){
		?>
		<section id="aviso">
        <?php
        	$functions->mensagemDeRetorno($_GET["tipo"],$_GET["acao"]);
		?>
        </section> 
		<?php
        }
        ?>

<!--
<div class="tabbable">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" data-toggle="tab">Busca simples</a></li>
    <li><a href="#tab2" data-toggle="tab">Busca avançada</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="tab1">
        <blockquote>
          <h4>Busca simples</h4>
          <small>Utilize os campos abaixo para cadastrar o usuário</small>
        </blockquote>
    </div>
    <div class="tab-pane" id="tab2">
        <blockquote>
          <h4>Busca avançada</h4>
          <small>Utilize os campos abaixo para cadastrar o usuário</small>
        </blockquote>
    </div>
  </div>
</div>
-->




      <hr>

      <footer>
        <p>&copy; Company 2014</p>
      </footer>

    </div> <!-- /container -->

    	<!-- Javascript -->
		<script src="../js/jquery.js"></script>
        <script src="../js/jquery.validate.min.js"></script>
        <script src="../js/bootstrap-transition.js"></script>
        <script src="../js/bootstrap-alert.js"></script>
        <script src="../js/bootstrap-modal.js"></script>
        <script src="../js/bootstrap-dropdown.js"></script>
        <script src="../js/bootstrap-scrollspy.js"></script>
        <script src="../js/bootstrap-tab.js"></script>
        <script src="../js/bootstrap-tooltip.js"></script>
        <script src="../js/bootstrap-popover.js"></script>
        <script src="../js/bootstrap-button.js"></script>
        <script src="../js/bootstrap-collapse.js"></script>
        <script src="../js/bootstrap-carousel.js"></script>
        <script src="../js/bootstrap-typeahead.js"></script>
        <script src="../js/geral.js"></script>
    
	</body>
</html>