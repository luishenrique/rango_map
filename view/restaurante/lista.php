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
 
require_once("../../controller/restaurante.controller.class.php");
require_once("../../model/restaurante.class.php");

include_once("../../functions/functions.class.php");

$restaurante 	= new RestauranteController;
$registros 	= $restaurante->listObjects();

$functions	= new Functions;

$id = ( isset($_GET['id']) ) ? $_GET['id'] : 0;

if ($id > 0) {
    $load = $restaurante->remove($id, 'id');
    header('Location: lista.php?acao=3&tipo=1');
}

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

		<!-- Título -->
        <blockquote>
          <h2>Listagem de Restaurantes</h2>
          <small>Utilize os campos abaixo para editar um Restaurante</small>
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

        <div class="control-group">
            <div class="controls">
              <a href="edita.php" class="btn btn-success btn-large">Cadastrar um novo Restaurante</a>
            </div>
		</div>

		<?php
        if($registros){
		?>
        <!-- Lista -->
        <table class="table table-hover">
			<thead>
            	<tr>
                    <th>Código</th>
                    <th>Nome Fantasia</th>                    
                    <th style="text-align:center">Razão Social</th>
                    <th style="text-align:center">CNPJ</th>
                    <th style="text-align:center">E-mail</th>
                    <th style="text-align:center">Site</th>                    

                    <th style="text-align:center"><i class="icon-edit"></i></th>
                    <th style="text-align:center"><i class="icon-remove"></i></th>
                    <th style="text-align:center"><i class="icon-list-alt"></i></th>
            </thead>
                </tr>
            <tbody>
            
				<?php
                	while($reg = mysql_fetch_array($registros)){
				?>
            
            	<tr>
                    <td><?php echo $reg["id"]; ?></td>
                    <td><?php echo $reg["nome_fantasia"]; ?></td>
                    <td style="text-align:center"><?php echo $reg["razao_social"]; ?></td>
                    <td style="text-align:center"><?php echo $reg["cnpj"]; ?></td>
                    <td style="text-align:center"><?php echo $reg["email"]; ?></td>
                    <td style="text-align:center"><?php echo $reg["site"]; ?></td>
                    <td style="text-align:center"><a class="btn btn-small" type="button" href="edita.php?id=<?php echo $reg["id"]; ?>"><i class="icon-edit"></i></a></td>
                    <td style="text-align:center"><a class="btn btn-small" type="button" onClick="return confirm('Deseja excluir mesmo')" href="lista.php?id=<?php echo $reg["id"]; ?>"><i class="icon-remove"></i></a></td>
                    <td style="text-align:center"><a id="btn_A_<?php echo $reg['id']; ?>" class="btn btn-small" type="button" title="+" onClick="mostraConteudo('<?php echo $reg['id']; ?>', 'A','unidade')"><i class="icon-list-alt"></i></a></td>
                </tr>

                <td colspan="9" id="conteudo_A_<?php echo $reg['id']; ?>" style="height: 0px; display:none; border:0px none; background-color:#E5E5E5;"></td>
            
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
        <script src="../../js/geral.js"></script>
    
	</body>
</html>