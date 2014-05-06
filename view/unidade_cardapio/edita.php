<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);

/*
 * 	Descrição do Arquivo
 * 	@author - Luis Henrique Rodrigues
 * 	@data de criação - 29/04/2014
 * 	@arquivo  - edita.php
 */

require_once("../../controller/unidade_cardapio.controller.class.php");
require_once("../../model/unidade_cardapio.class.php");

$unidade_cardapio= new UnidadeCardapio;

if($_GET["tipo"]=="R"){
	$registros 	= $unidade_cardapio->removeItem($_GET["unidade"],$_GET["cardapio"]);
}else{
	$registros 	= $unidade_cardapio->saveItem($_GET["unidade"],$_GET["cardapio"]);
}
?>