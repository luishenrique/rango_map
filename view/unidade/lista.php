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
                    <th style="text-align:center"><i class="icon-th-list"></i></th>
                    <th style="text-align:center"><i class="icon-certificate"></i></th>
                    <th style="text-align:center"><i class="icon-tag"></i></th>
                    <th style="text-align:center"><i class="icon-edit"></i></th>
                    <th style="text-align:center"><i class="icon-remove"></i></th>
                    
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
                    <td style="text-align:center"><a id="btn_B_<?php echo $reg['id']; ?>" class="btn btn-small" type="button" title="+" onClick="mostraConteudo('<?php echo $reg['id']; ?>', 'B', 'cardapio', '<?php echo $reg["id"]; ?>')"><i class="icon-th-list"></i></a></td>                    
                    <td style="text-align:center"><a class="btn btn-small" type="button" href="lista.php?id=<?php echo $reg["id"]; ?>"><i class="icon-certificate"></i></a></td>
                    <td style="text-align:center"><a class="btn btn-small" type="button" href="lista.php?id=<?php echo $reg["id"]; ?>"><i class="icon-tag"></i></a></td>
                    <td style="text-align:center"><a class="btn btn-small" type="button" href="../unidade/edita.php?id=<?php echo $reg['id']; ?>"><i class="icon-edit"></i></a></td>
                    <td style="text-align:center"><a class="btn btn-small" type="button" onClick="return confirm('Deseja excluir mesmo')" href="../unidade/lista.php?id=<?php echo $reg["id"]; ?>"><i class="icon-remove"></i></a></td>
                </tr>

                <td colspan="12" id="conteudo_B_<?php echo $reg['id']; ?>" style="height: 0px; display:none; border:0px none; background-color:#CCCCCC;"></td>

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
              <a href="../unidade/edita.php?restauranteid=<?php echo $_GET['id']; ?>" class="btn btn btn-medium">Cadastrar uma nova Unidade</a>
            </div>
        </div>
