<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);

/*
 * 	Descrição do Arquivo
 * 	@author - Vânia Gomes
 * 	@data de criação - 09/04/2014
 * 	@arquivo  - lista.php
 */
 
require_once("../../controller/cardapio.controller.class.php");

include_once("../../functions/functions.class.php");

$cardapio 	= new CardapioController;
$registros 	= $cardapio->lista();


$functions	= new Functions;

$id = ( isset($_GET['id']) ) ? $_GET['id'] : 0;
$cardapio = ( isset($_GET['categoria']) ) ? $_GET['categoria'] : 0;

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
                </tr>
            </thead>
                
            <tbody>
            
				<?php
                	while($reg = mysql_fetch_array($registros)){
				?>
            
            	<tr>
                    <td><?php echo $reg["id"]; ?></td>
                    <td><?php echo $reg["categoria"]; ?></td>
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

       