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
 
require_once("../../controller/unidade.controller.class.php");
include_once("../../functions/functions.class.php");

$unidade 	= new UnidadeController;
$registros 	= $unidade->listObjectsGroup();

$functions	= new Functions;

$id = ( isset($_GET['id']) ) ? $_GET['id'] : 0;

if ($id > 0) {
    $load = $usuario->remove($id, 'id');
    header('Location: lista.php?acao=3&tipo=1');
}

?>
<!DOCTYPE html>
<html>
  	<head>

      <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true&libraries=places&key=AIzaSyA5bgsvBQR3j7uUPNKJGjFWRtllRJ-1P9E"></script>     


<script>
// Note: This example requires that you consent to location sharing when
// prompted by your browser. If you see a blank space instead of the map, this
// is probably because you have denied permission for location sharing.

var map;

function initialize() {
  var mapOptions = {
    zoom: 6
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);

  // Try HTML5 geolocation
  if(navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = new google.maps.LatLng(position.coords.latitude,
                                       position.coords.longitude);
      
      var infowindow = new google.maps.InfoWindow({
        map: map,
        position: pos,
        content: 'Location found using HTML5.'
      });

      map.setCenter(pos);
    }, function() {
      handleNoGeolocation(true);
    });
  } else {
    // Browser doesn't support Geolocation
    handleNoGeolocation(false);
  }
}

function handleNoGeolocation(errorFlag) {
  if (errorFlag) {
    var content = 'Error: The Geolocation service failed.';
  } else {
    var content = 'Error: Your browser doesn\'t support geolocation.';
  }

  var options = {
    map: map,
    position: new google.maps.LatLng(60, 105),
    content: content
  };

  var infowindow = new google.maps.InfoWindow(options);
  map.setCenter(options.position);
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
        <meta charset="utf-8">
        <title>Rango Map</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
    
        <!-- Estilos -->
        <link href="../../css/bootstrap.css" rel="stylesheet">
        <link href="../../css/geral.css" rel="stylesheet">
        <link href="../../css/validation.css" rel="stylesheet">
        <link href="../../css/bootstrap-responsive.css" rel="stylesheet">
        
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
          <img class="brand" src="../../img/assinatura_tanbook.png" alt="" style="width:200px;">
          <div class="nav-collapse collapse">

			<?php
                $functions->geraMenu();
            ?>

          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    
    
    <div class="container">

		<!-- Título 
        <blockquote>
          <h2>Listagem de Usuários</h2>
          <small>Utilize os campos abaixo para cadastrar o usuário</small>
        </blockquote>
		-->
        
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

<!---->
<div class="tabbable">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" data-toggle="tab">Busca simples</a></li>
    <li><a href="#tab2" data-toggle="tab">Busca avançada</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="tab1">
        <blockquote>
          <h4>Busca por Restaurante</h4>
          <small>Utilize os campos abaixo para cadastrar o usuário</small>
          <input type="range" max="100" min="10" onChange="document.getElementById('busca').innerHTML = this.value">&nbsp;<span id="busca" style="font-size:16px; font-weight:bold;">0</span>
          <div class="control-group">
            <div class="controls">
              <a href="edita.php" class="btn btn-warning btn-small">Buscar</a>
            </div>
		</div>
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

<div id="map_canvas"></div>

<hr>

		<?php
        if($registros){
		?>
        <!-- Lista -->
        <table class="table table-hover">
			<thead>
            	<tr>
                    <th>Código</th>
                    <th>Rua</th>
                    <th style="text-align:center">nº</th>
                    <th style="text-align:center">Bairro</th>
                    <th style="text-align:center">Latitude</th>
                    <th style="text-align:center">Longitude</th>
                </tr>
            </thead>
            <tbody>
            
				<?php
                	while($reg = mysql_fetch_array($registros)){
				?>
            
            	<tr>
                    <td><?php echo $reg["id"]; ?></td>
                    <td><?php echo $reg["rua"]; ?></td>
					<td style="text-align:center"><?php echo $reg["numero"]; ?></td>
                    <td style="text-align:center"><?php echo $reg["bairro"]; ?></td>
                    <td style="text-align:center"><?php echo $reg["latitude"]; ?></td>
                    <td style="text-align:center"><?php echo $reg["longitude"]; ?></td>
               </tr>
            
            	<?php
					}
				?>
            
            </tbody>
		</table>
        
      	<?php
		}else{
		?>
        	<div class="text-center">
                <h2>Opsss!!!</h2>
                <p>Sua pesquisa não retornou nenhum resultado válido.</p>
            </div>
        
        <?php
		}
		?>

      <hr>

      <footer>
        <p>&copy; Company 2014</p>
      </footer>

    </div> <!-- /container -->

    	<!-- Javascript -->
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