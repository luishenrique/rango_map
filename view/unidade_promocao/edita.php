<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);

/*
 * 	Descrição do Arquivo
 * 	@author - Luis Henrique Rodrigues
 * 	@data de criação - 10/05/2014
 * 	@arquivo  - promocao.php
 */

require_once("../../controller/unidade_promocao.controller.class.php");
require_once("../../model/unidade_promocao.class.php");

$unidade_promocao= new UnidadePromocao;

if($_GET["tipo"]=="R"){
	$registros 	= $unidade_promocao->removeItem($_GET["unidade"],$_GET["promocao"]);
}else{
	$registros 	= $unidade_promocao->saveItem($_GET["unidade"],$_GET["promocao"]);
}
?>