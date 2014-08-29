<?php 
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);

/*
 * 	Descrição do Arquivo
 * 	@author - Luis Henrique Rodrigues
 * 	@data de criação - 28/08/2014
 * 	@arquivo  - edita.php
 */
 
require_once("../../controller/itens_cardapio.controller.class.php");
require_once("../../model/itens_cardapio.class.php");

include_once("../../functions/functions.class.php");

session_start();

$controller = new ItensCardapioController();
$itens_cardapio = new itens_cardapio();
$functions	= new Functions;

if(isset($_POST['submit'])) {

	$itens_cardapio->setId($_POST['id']);
	$itens_cardapio->setNome($_POST['nome']);
	$itens_cardapio->setDescricao($_POST['descricao']);
	$itens_cardapio->setValor($_POST['valor']);
	$itens_cardapio->setCalorias($_POST['calorias']);
	$itens_cardapio->setPessoas($_POST['pessoas']);
	$itens_cardapio->setCardapioid($_POST['cardapio_id']);
	$itens_cardapio->setUnidadeid($_POST['unidade_id']);


	if($cardapio->getId() > 0){
		$controller->update($itens_cardapio, 'id');
	}else{
		$controller->save($itens_cardapio, 'id');
	}
	header('Location: lista.php');
}


if(isset($_GET["id"])){
	$itens_cardapio = $controller->loadObject($_GET["id"], 'id');
}

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
      <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
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
  
    <h2>Gerenciamento de Itens do Cardapio</h2>
    <small>Utilize o formulário abaixo para atualizar os cardapios</small> </blockquote>

  
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
  
  	<input type="hidden" name="id" id="id" value="<?php echo ($itens_cardapio->getId() > 0 ) ? $itens_cardapio->getId() : ''; ?>">
  	<input type="hidden" name="cardapio_id" id="cardapio_id" value="<?php echo ($itens_cardapio->getCardapio_id() > 0 ) ? $itens_cardapio->getCardapio_id() : ''; ?>">
    <input type="hidden" name="unidade_id" id="unidade_id" value="<?php echo ($itens_cardapio->getUnidade_id() > 0 ) ? $itens_cardapio->getUnidade_id() : ''; ?>">

    <div class="control-group">
      <label class="control-label" for="categoria">Nome</label>
      <div class="controls">
        <input class="input-xlarge" style="height: 30px" type="text" name="nome" id="nome" required value="<?php echo ($itens_cardapio->getId() > 0 ) ? $itens_cardapio->getNome() : ''; ?>">
      </div>
    </div>

    <div class="control-group">
      <label class="control-label" for="descricao">Descrição</label>
      <div class="controls">
        <input class="input-xlarge" style="height: 30px" type="text" name="descricao" id="descricao" required value="<?php echo ($itens_cardapio->getDescricao() > 0 ) ? $itens_cardapio->getDescricao() : ''; ?>">
      </div>
    </div>

    <div class="control-group">
      <label class="control-label" for="valor">Valor</label>
      <div class="controls">
        <input class="input-xlarge" style="height: 30px" type="text" name="valor" id="valor" required value="<?php echo ($itens_cardapio->getValor() > 0 ) ? $itens_cardapio->getValor() : ''; ?>">
      </div>
    </div>

    <div class="control-group">
      <label class="control-label" for="calorias">Calorias</label>
      <div class="controls">
        <input class="input-xlarge" style="height: 30px" type="text" name="calorias" id="calorias" required value="<?php echo ($itens_cardapio->getCalorias() > 0 ) ? $itens_cardapio->getCalorias() : ''; ?>">
      </div>
    </div>

    <div class="control-group">
      <label class="control-label" for="pessoas">Pessoas</label>
      <div class="controls">
        <input class="input-xlarge" style="height: 30px" type="text" name="pessoas" id="pessoas" required value="<?php echo ($itens_cardapio->getPessoas() > 0 ) ? $itens_cardapio->getPessoas() : ''; ?>">
      </div>
    </div>
  
    <div class="control-group">
      <div class="controls">
        <input type="submit" class="btn btn-success btn-large" value="Salvar" name="submit">
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


</body>
</html>