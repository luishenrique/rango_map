<?php

/*
 * 	Descrição do Arquivo
 * 	@author Marcus Vinicius
 * 	@data de criação - 01/04/2014
 * 	@arquivo - modelo.controller.class.php
 */

//Inclui a classe genérica CRUD
require_once("../../functions/crud.class.php");

class CardapioController extends Crud {

	//Método construtor

    public function __construct() {
		
		//Passa como parâmetro a tabela
        parent::__construct("cardapio");
    }

public function lista(){
    	return $this->execute_query("SELECT * FROM cardapio");
    }



}

?>