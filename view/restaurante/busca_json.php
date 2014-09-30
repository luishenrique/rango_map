<?php 

/*
 * 	Descrição do Arquivo
 * 	@author Luis Henique Rodrigues	
 * 	@data de criação - 25/09/2014
 * 	@arquivo - busca_json.php
 */

require_once("../../controller/unidade.controller.class.php");

$tipo = $_GET["search"];
$valor = $_GET["value"];

$controller = new UnidadeController;


// busca por valor
if ($tipo ===  "valor"){
	$registros = $controller->pesquisaPorPreco($valor);
}

// busca por cidade
if ($tipo === "cidade"){
	$registros = $controller->pesquisaPorCidade($valor);	
}

$json ="[";

while($reg = mysql_fetch_array($registros)){	
		$json .= "{\"Restaurante\" : " 	. "\"" .$reg["nome_fantasia"] . "\"";
		$json .= ",\"Rua\" : " 			. "\"" .$reg["rua"] . "\"";
		$json .= ",\"Numero\" : "		. "\"" .$reg["numero"] . "\"";
		$json .= ",\"Bairro\" : " 		. "\"" .$reg["bairro"] . "\"";
		$json .= ",\"Cidade\" : " 		. "\"" .$reg["cidade"] . "\"";
		$json .= ",\"Telefone\" : " 	. "\"" .$reg["telefone"] . "\"";
		$json .= ",\"Categoria\" : "	. "\"" .$reg["descricao"] . "\"";
		$json .= ",\"Latitude\" : "		. "\"" .$reg["latitude"] . "\"";
		$json .= ",\"Longitude\" : "	. "\"" .$reg["longitude"] . "\"";
		$json .= ",\"Id\" : "			. "\"" .$reg["id"] . "\"";
		$json .= "},";
}	

$json = substr($json, 0, -1);

$json .="]";

echo $json;		

 ?>
