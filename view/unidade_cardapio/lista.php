<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);

/*
 * 	categoria do Arquivo
 * 	@author - João Ricardo Gomes dos Reis
 * 	@data de criação - 08/04/2014
 * 	@arquivo  - lista.php
 */
 
//require_once("../../controller/cardapio.controller.class.php");
require_once("../../controller/unidade_cardapio.controller.class.php");

include_once("../../functions/functions.class.php");

$cardapio 	= new UnidadeCardapio;
$registros 	= $cardapio->lista($_GET['unidade']);

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
        <table class="table table-hover"  style="margin: 0px; padding: 0px;">
			<thead>
            	<tr>
                    <th>Código</th>
                    <th>Categoria</th>
                    <th><i class="icon-edit"></i></th>
                    
                </tr>
            </thead>
            <tbody>
            
				<?php
                	while($reg = mysql_fetch_array($registros)){
				?>
            
            	<tr>
                    <td><?php echo $reg["id"]; ?></td>
                    <td><?php echo $reg["categoria"]; ?></td>
                    <td><label class="checkbox"><input type="checkbox" <?php if($_GET["unidade"]==$reg['unidade_id']) { echo "checked=\"checked\"";}?> onclick="editaUnidadeCardapio(this, '<?php echo $_GET["unidade"]; ?>' ,'<?php echo $reg["id"]; ?>')"></label></td>
                    
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
                <p>Não foi encontrado nenhum cardápio</p>
            </div>
        
        <?php
		}
		?>

        <br>
        
        <div class="control-group">
            <div class="controls">
              <a href="../cardapio/edita.php?restauranteid=<?php echo $_GET['id']; ?>" class="btn btn btn-medium">Cadastrar um novo item no Cardápio</a>
            </div>
        </div>

       

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