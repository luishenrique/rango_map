<?php 
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);

/*
 * 	Descrição do Arquivo
 * 	@author - Luis Henrique Rodrigues
 * 	@data de criação - 15/04/2014
 * 	@arquivo  - edita.php
 */
 
require_once("../../controller/unidade.controller.class.php");
require_once("../../model/unidade.class.php");

include_once("../../functions/functions.class.php");

session_start();

$controller = new UnidadeController();
$unidade = new unidade();
$functions	= new Functions;

if(isset($_POST['submit'])) {

	$unidade->setId($_POST['id']);
  $unidade->setRua($_POST['rua']);
  $unidade->setNumero($_POST['numero']);
  $unidade->setBairro($_POST['bairro']);
  $unidade->setCidade($_POST['cidade']);
  $unidade->setUf($_POST['uf']);
  $unidade->setTelefone($_POST['telefone']);
  $unidade->setIdRestaurante($_POST['id_restaurante']);

	if($unidade->getId() > 0){
		$controller->update($unidade, 'id');
	}else{
		$controller->save($unidade, 'id');
	}

	header('Location: lista.php');

}

if(isset($_GET["id"])){
	$unidade = $controller->loadObject($_GET["id"], 'id');
}

//$categorias = $controller->listObjects();


?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>RangoMap</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<!-- Estilos -->
<link href="../../css/bootstrap.css" rel="stylesheet">
<link href="../../css/geral.css" rel="stylesheet">
<link href="../../css/validation.css" rel="stylesheet">
<link href="../../css/bootstrap-responsive.css" rel="stylesheet">

<!--
        <link rel="stylesheet" type="text/css" href="../../css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="../../css/demo.css" />
		<link rel="stylesheet" type="text/css" href="../../css/book.css" />
		-->

</head>

<body>
<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> 
        <span class="icon-bar"></span> 
        <span class="icon-bar"></span> 
        <span class="icon-bar"></span> </button>
      <img class="brand" src="../../img/assinatura_tanbook.png" alt="" style="width:200px;">
      <div class="nav-collapse collapse">
        <?php
            $functions->geraMenu();
            ?>
      </div>
      <!--/.nav-collapse --> 
    </div>
  </div>
</div>
<div class="container"> 
  
  <!-- Título -->
  <blockquote>
  
    <h2>Gerenciamento de Restaurante</h2>
    <small>Utilize o formulário abaixo para atualizar um Restaurante</small> </blockquote>

  
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
  <form class="form-horizontal" id="contact-form" action="edita.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" id="id" value="<?php echo ($unidade->getId() > 0 ) ? $unidade->getId() : ''; ?>">
    <div class="control-group">

          <input type="hidden" name="id" id="id" value="<?php echo ($unidade->getId() > 0 ) ? $restaurante->getId() : ''; ?>">
    <div class="control-group">


      <label class="control-label" for="nome_fantasia">Nome Fantasia</label>
      <div class="controls">
        <input class="input-xlarge" type="text" name="nome_fantasia" id="nome_fantasia" required value="<?php echo ($unidade->getId() > 0 ) ? $unidade->getRua() : ''; ?>">
      </div>
    </div>


  </form>
  <hr>
  <footer>
    <p>&copy; Company 2014</p>
  </footer>
</div>
<!-- /container --> 

<!-- Javascript --> 
<script src="../../js/geral.js"></script> 
<script src="../../js/jquery.js"></script> 
<script src="../../js/jquery.validate.min.js"></script> 
<script src="../../js/bootstrap-transition.js"></script> 
<script src="../../js/bootstrap-alert.js"></script> 
<script src="../../js/bootstrap-modal.js"></script> 
<script src="../../js/bootstrap-dropdown.js"></script> 
<script src="../../js/bootstrap-scrollspy.js"></script> 
<script src="../../js/bootstrap-tab.js"></script> 
<script src="../../js/bootstrap-tooltip.js"></script> 
<script src="../../js/bootstrap-popover.js"></script> 
<script src="../../js/bootstrap-button.js"></script> 
<script src="../../js/bootstrap-collapse.js"></script> 
<script src="../../js/bootstrap-carousel.js"></script> 
<script src="../../js/bootstrap-typeahead.js"></script> 

		<script>
        $(document).ready(function(){
         
         $('#contact-form').validate(
         {
          rules: {
            site: {
              required: false
            }
          },
          highlight: function(element) {
            $(element).closest('.control-group').removeClass('success').addClass('error');
          },
          success: function(element) {
            element
            .text('OK!').addClass('valid')
            .closest('.control-group').removeClass('error').addClass('success');
          }
         });
        });
        </script>

</body>
</html>