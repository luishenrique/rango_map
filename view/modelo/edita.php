<?php 
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);

/*
 * 	Descrição do Arquivo
 * 	@author - João Ricardo Gomes dos Reis
 * 	@data de criação - 01/04/2014
 * 	@arquivo  - lista.php
 */
 
require_once("../../controller/modelo.controller.class.php");
require_once("../../model/modelo.class.php");

include_once("../../functions/functions.class.php");

session_start();

$controller = new ModeloController();
$usuario = new Modelo();
$functions	= new Functions;

if(isset($_POST['submit'])) {

	$usuario->setId($_POST['id']);
	$usuario->setGrupoDeUsuario_id($_POST['grupoDeUsuario_id']);
	$usuario->setNome($_POST['nome']);
	$usuario->setEmail($_POST['email']);
	$usuario->setSexo($_POST['sexo']);
	$usuario->setDataDeNascimento($_POST['dataNascimento']);
	$usuario->setUrlFacebook($_POST['urlfacebook']);
	$usuario->setApelido($_POST['apelido']);
	$usuario->setSenha($_POST['senha']);
	$usuario->setTipoDeUsuario_id($_POST['tipodeusuario']);
	$usuario->setDataDeCadastro(date("Y-m-d"));

	if($_POST['sexo']=="M"){
		$usuario->setAvatar("avatar1.jpg");
	}else{
		$usuario->setAvatar("avatar2.jpg");
	}

	if($usuario->getId() > 0){
		$controller->update($usuario, 'id');
	}else{
		$controller->save($usuario, 'id');
	}

	header('Location: lista.php');

}

if(isset($_GET['id'])){
	$usuario = $controller->loadObject($_GET['id'], 'id');
}

$usuarios = $controller->listObjects();


?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Tanbook</title>
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
                $functions->geraMenu($_SESSION["tipoDeUsuario_id"]);
            ?>
      </div>
      <!--/.nav-collapse --> 
    </div>
  </div>
</div>
<div class="container"> 
  
  <!-- Título -->
  <blockquote>
  
    <h2>Edição de Usuários</h2>
    <small>Utilize o formulário abaixo para cadastrar e editar usuários</small> </blockquote>

  
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
    <input type="hidden" name="id" id="id" value="<?php echo ($usuario->getId() > 0 ) ? $usuario->getId() : ''; ?>">
    <input type="hidden" name="grupoDeUsuario_id" id="grupoDeUsuario_id" value="<?php echo $_SESSION["grupoDeUsuario_id"]?>">
    <div class="control-group">
      <label class="control-label" for="nome">Nome</label>
      <div class="controls">
        <input class="input-xlarge" type="text" name="nome" id="nome" required value="<?php echo ($usuario->getId() > 0 ) ? $usuario->getNome() : ''; ?>">
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
        <input class="input-xlarge" type="text" name="email" id="email" required value="<?php echo ($usuario->getId() > 0 ) ? $usuario->getEmail() : ''; ?>">
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="sexo">Sexo</label>
      <div class="controls">
        <select class="span3" name="sexo" id="sexo">
          <option value="M" <?php echo ($usuario->getId() > 0 && $usuario->getSexo() == 'M') ? 'Selected' : ''; ?>>Masculino</option>
          <option value="F" <?php echo ($usuario->getId() > 0 && $usuario->getSexo() == 'F') ? 'Selected' : ''; ?>>Feminino</option>
        </select>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="dataNascimento">Data de Nascimento</label>
      <div class="controls">
        <input class="input-xlarge" type="date" name="dataNascimento" id="dataNascimento"  value="<?php echo ($usuario->getId() > 0 ) ? $usuario->getDataDeNascimento() : ''; ?>" >
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="urlfacebook">URL do Facebook</label>
      <div class="controls">
        <input class="input-xlarge" type="text" name="urlfacebook" id="urlfacebook" required value="<?php echo ($usuario->getId() > 0 ) ? $usuario->getUrlFacebook() : ''; ?>">
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="apelido">Apelido</label>
      <div class="controls">
        <input class="input-xlarge" type="text" name="apelido" id="apelido" required value="<?php echo ($usuario->getId() > 0 ) ? $usuario->getApelido() : ''; ?>">
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="senha">Senha</label>
      <div class="controls">
        <input class="input-xlarge" type="password" name="senha" id="senha" required value="<?php echo ($usuario->getId() > 0 ) ? $usuario->getSenha() : ''; ?>">
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="tipodeusuario">Tipo de Usuário</label>
      <div class="controls">
        <select class="span3" name="tipodeusuario" id="tipodeusuario">
          <?php
          if($_SESSION["tipoDeUsuario_id"]==1){
		  ?>
          <option value="1" <?php echo ($usuario->getId() > 0 && $usuario->getTipoUsuario_id() == '1') ? 'Selected' : ''; ?>>Administrador</option>
          <?php
		  }
		  ?>
          <option value="2" <?php echo ($usuario->getId() > 0 && $usuario->getTipoUsuario_id() == '2') ? 'Selected' : ''; ?>>Gerenciador de Grupos</option>
          <option value="3" <?php echo ($usuario->getId() > 0 && $usuario->getTipoUsuario_id() == '3') ? 'Selected' : ''; ?>>Leitor</option>
        </select>
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
    <p>&copy; Company 2013</p>
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