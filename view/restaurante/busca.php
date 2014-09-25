<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);

/*
 * 	Descrição do Arquivo
 * 	@author - Luis Henrique Rodrigues
 * 	@data de criação - 29/05/2014
 * 	@arquivo  - busca.php
 */
 
require_once("../../controller/unidade.controller.class.php");
include_once("../../functions/functions.class.php");

//$unidade 	= new UnidadeController;
//$registros 	= $unidade->listObjectsGroup();

$functions	= new Functions;


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
        <link href="../../css/bootstrap.css" rel="stylesheet">
        <link href="../../css/geral.css" rel="stylesheet">
        <link href="../../css/validation.css" rel="stylesheet">
        <link href="../../css/bootstrap-responsive.css" rel="stylesheet">

        <!-- Maps API Javascript -->
        <!-- <script type="text/JavaScript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDe08WSo MkoPmQGZuZ_cF40idWzv01yJmc&sensor=TRUE"></script> -->
 		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
 
        <!-- Arquivo de inicialização do mapa -->
        <script src="../../js/mapa.js"></script>


<script>
// The following example creates complex markers to indicate beaches near
// Sydney, NSW, Australia. Note that the anchor is set to
// (0,32) to correspond to the base of the flagpole.

function initialize() {

	  if(navigator.geolocation) {
		    navigator.geolocation.getCurrentPosition(function(position) {
		      var pos = new google.maps.LatLng(position.coords.latitude,
		                                       position.coords.longitude);

		      var infowindow = new google.maps.InfoWindow({
		          map: map,
		          position: pos,
		          content: 'Sua localização aproximada é esta!'
		        });

		        map.setCenter(pos);

		      map.setCenter(pos);
		    }, function() {
		      handleNoGeolocation(true);
		    });
		  } else {
			  var pos = new google.maps.LatLng(-33.9, 151.2);
		  }
	
  var mapOptions = {
    zoom: 12,
    center: pos
  }
  var map = new google.maps.Map(document.getElementById('map-canvas'),
                                mapOptions);

  setMarkers(map, beaches);
}

/**
 * Data for the markers consisting of a name, a LatLng and a zIndex for
 * the order in which these markers should display on top of each
 * other.
 */
var beaches = [
  ['Bondi Beach', -33.890542, 151.274856, 4, 'url_icon'],
  ['Coogee Beach', -33.923036, 151.259052, 5],
  ['Cronulla Beach', -34.028249, 151.157507, 3],
  ['Manly Beach', -33.80010128657071, 151.28747820854187, 2],
  ['Maroubra Beach', -33.950198, 151.259302, 1]
];

function setMarkers(map, locations) {
  // Add markers to the map

  // Marker sizes are expressed as a Size of X,Y
  // where the origin of the image (0,0) is located
  // in the top left of the image.

  // Origins, anchor positions and coordinates of the marker
  // increase in the X direction to the right and in
  // the Y direction down.
  var image = {
    url: '../../img/beachflag.png',
    // This marker is 20 pixels wide by 32 pixels tall.
    size: new google.maps.Size(20, 32),
    // The origin for this image is 0,0.
    origin: new google.maps.Point(0,0),
    // The anchor for this image is the base of the flagpole at 0,32.
    anchor: new google.maps.Point(0, 32)
  };
  // Shapes define the clickable region of the icon.
  // The type defines an HTML &lt;area&gt; element 'poly' which
  // traces out a polygon as a series of X,Y points. The final
  // coordinate closes the poly by connecting to the first
  // coordinate.
  var shape = {
      coords: [1, 1, 1, 20, 18, 20, 18 , 1],
      type: 'poly'
  };
  for (var i = 0; i < locations.length; i++) {
    var beach = locations[i];
    var myLatLng = new google.maps.LatLng(beach[1], beach[2]);
    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        icon: image,
        shape: shape,
        title: beach[0],
        zIndex: beach[3]
    });
  }
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
        

		  	</head>


	<body onload="initialize();">

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
       
        <div id="map-canvas" style="height: 500px; width: 1200px">
        </div>

<hr>

		<?php
        //if($registros){
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
                	//while($reg = mysql_fetch_array($registros)){
				?>
            
            	<tr>
                    <td><?php //echo $reg["id"]; ?></td>
                    <td><?php //echo $reg["rua"]; ?></td>
					<td style="text-align:center"><?php //echo $reg["numero"]; ?></td>
                    <td style="text-align:center"><?php //echo $reg["bairro"]; ?></td>
                    <td style="text-align:center"><?php //echo $reg["latitude"]; ?></td>
                    <td style="text-align:center"><?php //echo $reg["longitude"]; ?></td>
               </tr>
            
            	<?php
					//}
				?>
            
            </tbody>
		</table>
        
      	<?php
		//}else{
		?>
        	<div class="text-center">
                <h2>Opsss!!!</h2>
                <p>Sua pesquisa não retornou nenhum resultado válido.</p>
            </div>
        
        <?php
		//}
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