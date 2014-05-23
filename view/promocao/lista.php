<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);

/*
 * 	Descrição do Arquivo
 * 	@author - Vânia Gomes
 * 	@data de criação - 08/04/2014
 * 	@arquivo  - lista.php
 */
 
require_once("../../controller/unidade_promocao.controller.class.php");

include_once("../../functions/functions.class.php");

$promocao 	= new UnidadePromocao;
$registros 	= $promocao->lista($_GET['unidade']);

$functions	= new Functions;

$id = ( isset($_GET['id']) ) ? $_GET['id'] : 0;

?>
<!DOCTYPE html>
<html>
  	

    <body>
    
    
    <div class="container">

		<?php
        if($registros){
		?>
        <!-- Lista -->
        <table class="table table-hover" style="margin: 0px; padding: 0px;">
			<thead>
            	<tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th>Data Inicial</th>
                    <th>Data Final</th>
                    <th>Codigo  Restaurante</th>
                    <th style="text-align:center"><i class="icon-edit"></i></th>
                </tr>
            </thead>
            <tbody>
            
				<?php
                	while($reg = mysql_fetch_array($registros)){
				?>
            
            	<tr>
                    <td><?php echo $reg["id"]; ?></td>
                     <td><?php echo $reg["nome"]; ?></td>
                    <td><?php echo $reg["descricao"]; ?></td>
                     <td><?php echo $reg["valor"]; ?></td>
                      <td><?php echo $reg["data_inicio"]; ?></td>
                       <td><?php echo $reg["data_fim"]; ?></td>
                        <td><?php echo $reg["restaurante_id"]; ?></td>
                        
                    <td><label class="checkbox"><input type="checkbox" <?php if($_GET["unidade"]==$reg['unidade_id']) { echo "checked=\"checked\"";}?> 
                        onclick="editaUnidadePromocao(this, '<?php echo $_GET["unidade"]; ?>' ,'<?php echo $reg["id"]; ?>')"></label></td>
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
                <h2>Erro!!!</h2>
                <p>Sua pesquisa não retornou nenhum resultado válido.</p>
            </div>
        
        <?php
		}
		?>

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