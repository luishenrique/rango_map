<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);

/*
 * 	Descrição do Arquivo
 * 	@author - Luis Henrique Rodrigues
 * 	@data de criação - 10/05/2014
 * 	@arquivo  - categoria.php
 */

require_once("../../controller/unidade_categoria.controller.class.php");
require_once("../../model/unidade_categoria.class.php");

$unidade_categoria= new Unidadecategoria;

if($_GET["tipo"]=="R"){
	$registros 	= $unidade_categoria->removeItem($_GET["unidade"],$_GET["categoria"]);
}else{
	$registros 	= $unidade_categoria->saveItem($_GET["unidade"],$_GET["categoria"]);
}
?>