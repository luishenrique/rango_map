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
 
<script>
  
    var pos;
    var map;
  
    // Fim do JSON
    function initialize() {
      var mapOptions = {
        zoom: 10,
      }
    
      //Geolocalização
      if(navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
          pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

          var infowindow = new google.maps.InfoWindow({
            map: map,
            position: pos,
            content: 'Você está aqui!'
          });
          map.setCenter(pos);
        }, function() {
          pos = new google.maps.LatLng(-21.9769438, -46.7765826);
          map.setCenter(pos);
        });
      }else{
          pos = new google.maps.LatLng(-21.9769438, -46.7765826);
        map.setCenter(pos);
      }
      
      map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
    
      var arr;
      var cor = "cor1";
      var marker;
      var contentString = [];
      var xmlhttp = new XMLHttpRequest();
      var url = "http://localhost/rango_map/view/restaurante/busca_json.php?search=<?php echo $_GET['search'];?>&value=<?php echo $_GET['value'];?>";
      
      xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          arr = JSON.parse(xmlhttp.responseText);
          
          var shape = {
            coords: [1, 1, 1, 20, 18, 20, 18 , 1],
            type: 'poly'
          };      
          
          for (var i = 0; i < arr.length; i++) {
          
            contentString[i] =
              '<div id="content">'+
                '<h3>'+arr[i].Restaurante+'</h3>'+
                '<div id="bodyContent">'+
                ' Categoria: '+ arr[i].Categoria +'<br>'+
                  ''+ arr[i].Telefone +'<br>'+
                  '<p><a href="visualizar.php?id='+arr[i].Id+'">Mais detalhes +</a></p>'+
                '</div>'+
              '</div>';
          
            var image = {
              url: '../../img/beachflag.png',
              // This marker is 20 pixels wide by 32 pixels tall.
              size: new google.maps.Size(20, 32),
              // The origin for this image is 0,0.
              origin: new google.maps.Point(0,0),
              // The anchor for this image is the base of the flagpole at 0,32.
              anchor: new google.maps.Point(0, 32)
            };
            
            
            var infowindow = new google.maps.InfoWindow();
          
            var myLatLng = new google.maps.LatLng(arr[i].Longitude, arr[i].Latitude);
            
            marker = new google.maps.Marker({
              position: myLatLng,
              map: map,
              icon: image,
              shape: shape,
              title: arr[i].Restaurante,
              zIndex: i
            });
            
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
              return function() {
                infowindow.setContent(contentString[i]);
                infowindow.open(map,marker);
              }
            })(marker,i));
            

            //Insere as informações na listagem
            document.getElementById('unidades').innerHTML += "<div class='unidade "+ cor +"'><h3>"+arr[i].Restaurante+"</h3><p><b>"+ arr[i].Categoria + '</b><br>' +arr[i].Rua+ ', ' +arr[i].Numero+"<br>"+arr[i].Cidade+"<br>"+arr[i].Telefone+"<br><br><input type='button' class='btn btn-danger btn-small' value='Ver no mapa' onclick='mostraUnidade("+arr[i].Longitude+","+arr[i].Latitude+")'><a href='visualizar.php?id="+ arr[i].Id +"'><input type='button' class='btn btn-warning btn-small' value='Ver Restaurante'></a></p></div>";
            
            if (cor === 'cor1'){
                cor = 'cor2';
            } else {
                cor = 'cor1';
            }
            
          }//Fecha o for
        
        }//Fecha o if
      }//Fecha o ajax
      xmlhttp.open("GET", url, true);
      xmlhttp.send();
    }//Fecha o function

    //Função para movimentar o mapa
      function mostraUnidade(latitude,longitude) {
        var latLng = new google.maps.LatLng(latitude,longitude);
        map.setCenter(latLng);
        map.setZoom(15);

    }

    google.maps.event.addDomListener(window, 'load', initialize);

  </script>
        

        <style>

            #unidadeefs{
              width: 100%;
              float: left !important;
              padding-top: 15px;
              padding-bottom:15px;
            }

            .unidade{              
              width: 22%;
              float: left !important;
              padding: 10px;              
              border-radius: 10px;              
              border-top: 5px solid;
              border-bottom: 5px solid;
              border-color: #8e3133;
              margin: 5px;

            }

            h3{
              color: #8e3133;
            }

            .cor1{
              background-color: #F5F5F5;
            }

            .cor2{
              background-color: #ffe1e1;
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
          <h4>Busca por Valor R$</h4>          
          <small>Arraste para selecionar um valor</small>
          <form action="busca.php" method="GET">
          <input type="hidden" name="search" id="search" value="valor">
          <input type="range" id="value" name="value"  max="100" min="10" onChange="document.getElementById('busca').innerHTML = this.value">&nbsp;R$ <span id="busca" name="busca" style="font-size:16px; font-weight:bold;">0</span>,00
          &nbsp;
          <input type="submit" class="btn btn-warning btn" value="Buscar"> 
              
              </form>
              
		
        </blockquote>
    </div>
    <div class="tab-pane" id="tab2">
        <blockquote>
         <h4>Busca por Cidade</h4>          
          <small>Digite o nome da Cidade</small>
          <form action="busca.php" method="GET">
          <input type="hidden" name="search" id="search" value="cidade">
          <input type="text" class="input" name="value" id="value">
          &nbsp;
          <input type="submit" class="btn btn-warning btn" value="Buscar"> 
              
              </form>

    </div>     
    </div>    
    </blockquote> 
       
        <div id="map-canvas" style="height: 500px; width: 1200px">
        </div>
        
        <div id="unidades"></div>
        
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