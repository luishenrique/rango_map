<?php 
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);

/*
 * 	Descrição do Arquivo
 * 	@author - Luis Henrique Rodrigues
 * 	@data de criação - 09/10/2014
 * 	@arquivo  - visualizar.php
 */
 
require_once("../../controller/restaurante.controller.class.php");
require_once("../../model/restaurante.class.php");

require_once("../../controller/unidade.controller.class.php");
require_once("../../model/unidade.class.php");

require_once("../../controller/horario.controller.class.php");
require_once("../../model/horario.class.php");

require_once("../../controller/cidade.controller.class.php");
require_once("../../model/cidade.class.php");

require_once("../../controller/cardapio.controller.class.php");
require_once("../../model/cardapio.class.php");

require_once("../../controller/itens_cardapio.controller.class.php");
require_once("../../model/itens_cardapio.class.php");

include_once("../../functions/functions.class.php");

session_start();

$controller_restaurante = new RestauranteController();
$restaurante = new restaurante();

$controller_unidade = new UnidadeController();
$unidade = new unidade();

$controller_horario = new HorarioController();
$horario = new horario();

$controller_cidade = new CidadeController();
$cidade = new cidade();

$controller_cardapio = new CardapioController();
$cardapio = new cardapio();

$controller_itens_cardapio = new ItensCardapioController();
$itens_cardapio = new itens_cardapio();

$functions	= new Functions;


if(isset($_GET["id"])){
	$unidade = $controller_unidade->loadObject($_GET["id"], 'id');
  $restaurante = $controller_restaurante->loadObject($unidade->getRestauranteId(), 'id');
  $cidade = $controller_cidade->loadObject($unidade->getCidadeId(), 'id');
  $horario = $controller_horario->loadObject($unidade->getId(), 'unidade_id');
  $cardapio = $controller_cardapio->listObjects();

  
}

//$categorias = $controller->listObjects();


$maior = mysql_fetch_array($controller_itens_cardapio->listValue($unidade->getId(), 'desc'));
$menor = mysql_fetch_array($controller_itens_cardapio->listValue($unidade->getId(), 'asc'));

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

<style>
  
  h1{
    color: #8e3133;
  }


</style>

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


  <div class="row">
  <div class="span6">
    <h1><?php echo $restaurante->getNomeFantasia(); ?></h1>
    <div id="endereco">
        <p><strong>Endereço</strong></p>
        <p><?php echo $unidade->getRua(); ?>, <?php echo $unidade->getNumero(); ?>  - <?php echo $unidade->getBairro() ?></p>
        <p>Telefone: <?php echo $unidade->getTelefone() ?></p>
        <p><?php echo $cidade->getCidade() ?> - <?php echo $cidade->getUf(); ?></p>
        <br>
        <p><strong>Horário de Atendimento:</strong><br> Seg~Domingo - 09:00 às 22:00h </p>

        <br>
        <p><strong>Preços</strong><br>

        <h4 style="color: #0C0">Prato mais barato: <?php echo $menor['nome'] . ": " . $menor['valor'] ?> </h4>
        <h4 style="color: #C00">Prato mais caro: <?php echo $maior['nome'] . ": " . $maior['valor'] ?> </h4>
        </p>        

    </div>  

  </div>
  <div class="span6">
    <img src="../../img/restaurante_foto.jpg" width="500" alt="">

  </div>
</div>
<p>&nbsp;</p>
<div class="row">
  <div class="span12">

    <!-- Inicio Cardápio -->
    <?php while($reg = mysql_fetch_array($cardapio)){ 
        $itens_cardapio = $controller_itens_cardapio->listObjectsGroup($reg['id'], $unidade->getId());
      ?>
             <div class="bs-docs-example">
              <div class="accordion" id="accordion2">
                <div class="accordion-group">
                  <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse<?php echo $reg['id'] ?>">
                      <h4><?php echo $reg['categoria']; ?></h4>
                    </a>
                  </div>
                  <div id="collapse<?php echo $reg['id'] ?>" class="accordion-body collapse">
                    <div class="accordion-inner">
                      <table class="table">
                        <tr><th>Nome</th><th>Descrição</th><th>Valor</th><th>Calorias</th><th>Pessoas</th></tr>
                        <?php while($item = mysql_fetch_array($itens_cardapio)){ ?>
                        <tr><td><?php echo $item['nome'] ?></td>
                          <td><?php echo $item['descricao'] ?></td>
                          <td><?php echo $item['valor'] ?></td>
                          <td><?php echo $item['calorias'] ?></td>
                          <td><?php echo $item['pessoas'] ?></td></tr>
                        <?php } ?>
                      </table>
                    </div>
                  </div>
                </div>
             </div>
            </div>

  <?php } ?>
  <!-- Fim Cardápio -->    

  </div>
</div>
    
  
  
  
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