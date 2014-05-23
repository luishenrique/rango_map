<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);

/*
 * 	Descrição do Arquivo
 * 	@author - Luis Henrique Rodrigues
 * 	@data de criação - 09/04/2014
 * 	@arquivo  - lista.php
 */
 
require_once("../../controller/unidade_categoria.controller.class.php");

include_once("../../functions/functions.class.php");

$categoria 	= new UnidadeCategoria;
if (isset($_GET['unidade'])){
    $registros 	= $categoria->lista($_GET['unidade']);
}

$functions	= new Functions;

$id = ( isset($_GET['id']) ) ? $_GET['id'] : 0;


?>
<!DOCTYPE html>
<html>

	<body>

    <div class="container">

		
		<?php
        if(isset($registros)){
		?>
        <!-- Lista -->
        <table class="table table-hover" style="margin: 0px; padding: 0px;">
			<thead>
            	<tr>
                    <th>Código</th>
                    <th>Categoria</th>
                    <th><i class="icon-edit"></i></th>

            </thead>
                </tr>
            <tbody>
            
				<?php
                	while($reg = mysql_fetch_array($registros)){
				?>
            
            	<tr>
                    <td><?php echo $reg["id"]; ?></td>
                    <td><?php echo $reg["descricao"]; ?></td>
                    <td><label class="checkbox"><input type="checkbox" <?php if($_GET["unidade"]==$reg['unidade_id']) { echo "checked=\"checked\"";}?> 
                        onclick="editaUnidadeCategoria(this, '<?php echo $_GET["unidade"]; ?>' ,'<?php echo $reg["id"]; ?>')"></label></td>
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
                <p>Não foi encontrado nenhuma categoria</p>
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