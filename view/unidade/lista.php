<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);

/*
 * 	Descrição do Arquivo
 * 	@author - Luis Henrique Rodrigues
 * 	@data de criação - 22/04/2014
 * 	@arquivo  - lista.php
 */

require_once("../../controller/unidade.controller.class.php");
require_once("../../model/unidade.class.php");

$unidade	= new UnidadeController;
$registros 	= $unidade->listObjectsGroup($_GET['id']);
$tamanho	= mysql_num_rows($registros);

?>

		<?php
        if($tamanho>0){
		?>
        <!-- Lista -->
        <table class="table table-hover">
			<thead>
            	<tr>
                    <th>Código</th>
                    <th style="text-align:center">Rua</th>
                    <th style="text-align:center">Número</th>
                    <th style="text-align:center">Bairro</th>
                    <th style="text-align:center">Cidade</th>
                    <th style="text-align:center">UF</th>
                    <th style="text-align:center">Telefone</th>
                    <th><i class="icon-thumbs-up"></i></th>
                </tr>
            </thead>
            <tbody>
            
				<?php
                	while($reg = mysql_fetch_array($registros)){
				?>
            
            	<tr>
                    <td><?php echo $reg["id"]; ?></td>
                    <td style="text-align:center"><?php echo $reg["rua"]; ?></td>
                    <td style="text-align:center"><?php echo $reg["numero"]; ?></td>
                    <td style="text-align:center"><?php echo $reg["bairro"]; ?></td>
                    <td style="text-align:center"><?php echo $reg["cidade"]; ?></td>
                    <td style="text-align:center"><?php echo $reg["uf"]; ?></td>
                    <td style="text-align:center"><?php echo $reg["telefone"]; ?></td>
                    <td><label class="checkbox"><input type="checkbox" <?php if($_GET["id"]==$reg["historia_id"]){ echo "checked=\"checked\""; }?> onclick="editaHistoriaCategoria(this,'<?php echo $_GET["id"]; ?>','<?php echo $reg["id"]; ?>')"></label></td>
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
                <p>Não existem Unidades cadastradas.</p>
            </div>
        
        <?php
		}
		?>

         <div class="control-group">
            <div class="controls">
              <a href="../unidade/edita.php?restauranteid=<?php echo $_GET['id']; ?>" class="btn btn-success btn-small">Cadastrar uma nova Unidade</a>
            </div>
        </div>
