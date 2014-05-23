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
  $unidade->setRestauranteId($_POST['restaurante_id']);
  $unidade->setLongitude($_POST['longitude']);
  $unidade->setLatitude($_POST['latitude']);

	if($unidade->getId() > 0){
		$controller->update($unidade, 'id');
	}else{
		$controller->save($unidade, 'id');
	}

	header('Location: ../restaurante/lista.php');

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
  
    <h2>Gerenciamento de Unidade</h2>
    <small>Utilize o formulário abaixo para atualizar uma Unidade </small> </blockquote>

  
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
  <form class="form-horizontal" id="form" name="form" action="edita.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" id="id" value="<?php echo ($unidade->getId() > 0 ) ? $unidade->getId() : ''; ?>">
    <div class="control-group">
          <input type="hidden" name="id" id="id" value="<?php echo ($unidade->getId() > 0 ) ? $unidade->getId() : ''; ?>">
          <input type="hidden" name="restaurante_id" id="restaurante_id" value="<?php echo ($unidade->getRestauranteId() > 0 ) ? $unidade->getRestauranteId() : $_GET["restauranteid"]; ?>">

    <div class="control-group">
      <label class="control-label" for="rua">Rua</label>
      <div class="controls">
        <input class="input-xxlarge" type="text" name="rua" id="rua" required value="<?php echo ($unidade->getId() > 0 ) ? $unidade->getRua() : ''; ?>">
      </div>
    </div>

    <div class="control-group">
      <label class="control-label" for="numero">Número</label>
      <div class="controls">
        <input class="input-small" type="text" name="numero" id="numero" required value="<?php echo ($unidade->getId() > 0 ) ? $unidade->getNumero() : ''; ?>">
      </div>
    </div>

    <div class="control-group">
      <label class="control-label" for="bairro">Bairro</label>
      <div class="controls">
        <input class="input-xlarge" type="text" name="bairro" id="bairro" required value="<?php echo ($unidade->getId() > 0 ) ? $unidade->getBairro() : ''; ?>">
      </div>
    </div>
    
    <div class="control-group">
      <label class="control-label" for="cidade">Cidade</label>
      <div class="controls">
        <input class="input-xlarge" type="text" name="cidade" id="cidade" required value="<?php echo ($unidade->getId() > 0 ) ? $unidade->getCidade() : ''; ?>">
      </div>
    </div>

    <div class="control-group">
          <label class="control-label" for="uf">UF</label>
          <div class="controls">
            <select id="uf" name="uf" class="input-medium">
              <option value="">Selecione</option>             
              <option value="AC" <?php echo $controller -> selected('AC', $unidade -> getUf()); ?>>AC</option>
              <option value="AL" <?php echo $controller -> selected('AL', $unidade -> getUf()); ?>>AL</option>
              <option value="AM" <?php echo $controller -> selected('AM', $unidade -> getUf()); ?>>AM</option>
              <option value="AP" <?php echo $controller -> selected('AP', $unidade -> getUf()); ?>>AP</option>
              <option value="BA" <?php echo $controller -> selected('BA', $unidade -> getUf()); ?>>BA</option>
              <option value="CE" <?php echo $controller -> selected('CE', $unidade -> getUf()); ?>>CE</option>
              <option value="DF" <?php echo $controller -> selected('DF', $unidade -> getUf()); ?>>DF</option>
              <option value="ES" <?php echo $controller -> selected('ES', $unidade -> getUf()); ?>>ES</option>
              <option value="GO" <?php echo $controller -> selected('GO', $unidade -> getUf()); ?>>GO</option>
              <option value="MA" <?php echo $controller -> selected('MA', $unidade -> getUf()); ?>>MA</option>
              <option value="MG" <?php echo $controller -> selected('MG', $unidade -> getUf()); ?>>MG</option>
              <option value="MS" <?php echo $controller -> selected('MS', $unidade -> getUf()); ?>>MS</option>
              <option value="MT" <?php echo $controller -> selected('MT', $unidade -> getUf()); ?>>MT</option>
              <option value="PA" <?php echo $controller -> selected('PA', $unidade -> getUf()); ?>>PA</option>
              <option value="PB" <?php echo $controller -> selected('PB', $unidade -> getUf()); ?>>PB</option>
              <option value="PE" <?php echo $controller -> selected('PE', $unidade -> getUf()); ?>>PE</option>
              <option value="PI" <?php echo $controller -> selected('PI', $unidade -> getUf()); ?>>PI</option>
              <option value="PR" <?php echo $controller -> selected('PI', $unidade -> getUf()); ?>>PR</option>
              <option value="RJ" <?php echo $controller -> selected('RJ', $unidade -> getUf()); ?>>RJ</option>
              <option value="RN" <?php echo $controller -> selected('RN', $unidade -> getUf()); ?>>RN</option>
              <option value="RO" <?php echo $controller -> selected('RO', $unidade -> getUf()); ?>>RO</option>
              <option value="RR" <?php echo $controller -> selected('RR', $unidade -> getUf()); ?>>RR</option>
              <option value="RS" <?php echo $controller -> selected('RS', $unidade -> getUf()); ?>>RS</option>
              <option value="SC" <?php echo $controller -> selected('SC', $unidade -> getUf()); ?>>SC</option>
              <option value="SE" <?php echo $controller -> selected('SE', $unidade -> getUf()); ?>>SE</option>
              <option value="SP" <?php echo $controller -> selected('SP', $unidade -> getUf()); ?>>SP</option>
              <option value="TO" <?php echo $controller -> selected('TO', $unidade -> getUf()); ?>>TO</option>
            </select>
          </div>
        </div>

    <div class="control-group">
      <label class="control-label" for="telefone">Telefone</label>
      <div class="controls">
        <input class="input-xlarge" type="text" name="telefone" id="telefone" required value="<?php echo ($unidade->getId() > 0 ) ? $unidade->getTelefone() : ''; ?>">
      </div>
    </div>


     <div class="control-group">
      <div class="controls">
        <input type="button" onClick="codeAddress(EnderecoCompleto());" class="btn btn btn-medium" value="Encontrar Localização" name="submit">
      </div>
    </div>

     <div class="control-group">
      <label class="control-label" for="latitude">Latitude</label>
      <div class="controls">
        <input class="input-xlarge" type="text" name="latitude" id="latitude" required value="<?php echo ($unidade->getId() > 0 ) ? $unidade->getLatitude() : ''; ?>">
      </div>
    </div>

     <div class="control-group">
      <label class="control-label" for="longitude">Longitude</label>
      <div class="controls">
        <input class="input-xlarge" type="text" name="longitude" id="longitude" required value="<?php echo ($unidade->getId() > 0 ) ? $unidade->getLongitude() : ''; ?>">
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
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true&libraries=places&key=AIzaSyA5bgsvBQR3j7uUPNKJGjFWRtllRJ-1P9E"></script>

		    <script>

        function EnderecoCompleto(){
            rua = document.form.rua.value;
            numero = document.form.numero.value;
            cidade = document.form.cidade.value;
            estado = document.form.uf.value;
            pais = "Brasil";
            endereco = rua + ", " + numero  + ", " + cidade  + ", " + estado  + ", " + pais;
            return(endereco);
        }

        function codeAddress(address) {

          geocoder = new google.maps.Geocoder();          
          geocoder.geocode( { 'address': address }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {

            //alert("Latitude: "+results[0].geometry.location.lat());
            //alert("Longitude: "+results[0].geometry.location.lng());

            document.getElementById('latitude').value = results[0].geometry.location.lat();
            document.getElementById('longitude').value = results[0].geometry.location.lng();

            
            
            } 

            else {
              alert("Geocode was not successful for the following reason: " + status);
            }
          });
  }


        $(document).ready(function(){
         
         $('#form').validate(
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