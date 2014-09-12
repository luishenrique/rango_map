<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);

/*
 * 	categoria do Arquivo
 * 	@author - Luis Henrique Rodrigues
* 	@data de criação - 04/09/2014
 * 	@arquivo  - lista.php
 */
 
//require_once("../../controller/cardapio.controller.class.php");
require_once("../../controller/itens_cardapio.controller.class.php");
require_once("../../model/itens_cardapio.class.php");
include_once("../../functions/functions.class.php");

$itens 	= new ItensCardapioController;
$registros 	= $itens->listObjectsGroup($_GET['cardapio_id'], $_GET['unidade_id']);

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
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th>Calorias</th>
                    <th>Pessoas</th>
                    <th><i class="icon-edit"></i></th>
                    
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
                    <td><?php echo $reg["calorias"]; ?></td>
                    <td><?php echo $reg["pessoas"]; ?></td>

                    <td style="text-align:center"><a class="btn btn-small" type="button" onClick="return confirm('Deseja excluir mesmo')" href="../itens_cardapio/lista.php?id=<?php echo $reg["id"]; ?>"><i class="icon-remove"></i></a></td>
                    
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
              <a href="../itens_cardapio/edita.php?cardapio_id=<?php echo $_GET['cardapio_id']; ?>&unidade_id=<?php echo $_GET['unidade_id']; ?>" class="btn btn btn-medium">Cadastrar um novo item no Cardápio</a>
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