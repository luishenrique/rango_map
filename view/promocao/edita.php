<?php
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);

/*
* Descrição do Arquivo
* @author - Vânia Gomes
* @data de criação - 15/04/2014
* @arquivo - edita.php
*/
 
require_once("../../controller/promocao.controller.class.php");
require_once("../../model/promocao.class.php");

include_once("../../functions/functions.class.php");

session_start();

$controller = new PromocaoController();
$promocao = new promocao();
$functions	= new Functions;

if(isset($_POST['submit'])) {

$promocao->setId($_POST['id']);
$promocao->setNomeFantasia($_POST['nome']);
$promocao->setRazaoSocial($_POST['descricao']);
$promocao->setCnpj($_POST['valor']);
$promocao->setEmail($_POST['data_inicio']);
$promocao->setSite($_POST['data_fim']);
$promocao->setSite($_POST['restaurante_id']);
 
 
if($promocao->getId() > 0){
$controller->update($promocao, 'id');
}else{
$controller->save($promocao, 'id');
}

header('Location: lista.php');

}

if(isset($_GET["id"])){
$promocao = $controller->loadObject($_GET["id"], 'id');
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
<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>  </button>
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
<h2>Gerenciamento de Promoção</h2>
<small>Utilize o formulário abaixo para atualizar uma Promoção</small> </blockquote>

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
<input type="hidden" name="id" id="id" value="<?php echo ($promocao->getId() > 0 ) ? $promocao->getId() : ''; ?>">
<div class="control-group">
<label class="control-label" for="nome">Nome</label>
<div class="controls">
<input class="input-xlarge" type="text" name="nome" id="nome" required value="<?php echo ($promocao->getId() > 0 ) ?$promocao->getNome() : ''; ?>">
</div>
</div>
<div class="control-group">
<label class="control-label" for="descricao">Descrição</label>
<div class="controls">
<input class="input-xlarge" type="text" name="descricao" id="descricao" required value="<?php echo ($promocao->getId() > 0 ) ? $promocao->getDescricao() : ''; ?>">
</div>
</div>
<div class="control-group">
<label class="control-label" for="valor">Valor</label>
<div class="controls">
<input class="input-xlarge" type="text" name="valor" id="valor" required value="<?php echo ($promocao->getId() > 0 ) ? $promocao->getValor() : ''; ?>">
</div>
</div>
<div class="control-group">
<label class="control-label" for="data_inicial">Data Inicial</label>
<div class="controls">
<input class="input-xlarge" type="text" name="data_inicial" id="data_inicial" required value="<?php echo ($promocao->getId() > 0 ) ? $promocao->getData_Inicial() : ''; ?>">
</div>
</div>
<div class="control-group">
<label class="control-label" for="data_final">Data Final</label>
<div class="controls">
<input class="input-xlarge" type="text" name="data_final" id="data_final" required value="<?php echo ($promocao->getId() > 0 ) ? $promocao->getData_Fianl() : ''; ?>">
</div>
</div>
<div class="control-group">
<label class="control-label" for="data_final">Código Restaurante</label>
<div class="controls">
<input class="input-xlarge" type="text" name="restaurante_id" id="restaurante_idl" required value="<?php echo ($promocao->getId() > 0 ) ? $promocao->getRestaurante_idl() : ''; ?>">
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

<script>
$(document).ready(function(){
$('#contact-form').validate(
{
rules: {
nome: {
required: true
},
email: {
required: true,
},
dataNascimento: {
required: true,
},
apelido: {
required: true,
},
senha: {
required: true,
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

    Status
    API
    Training
    Shop
    Blog
    About

    © 2014 GitHub, Inc.
    Terms
    Privacy
    Security
    Contact

