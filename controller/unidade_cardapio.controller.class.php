<?php

/*
 * 	Descrição do Arquivo
 * 	@author Luis Henique Rodrigues	
 * 	@data de criação - 22/04/2014
 * 	@arquivo - unidade_cardapio.controller.class.php
 */

//Inclui a classe genérica CRUD
require_once("../../functions/crud.class.php");

class UnidadeCardapio extends Crud {

	//Método construtor
    public function __construct() {
		
		//Passa como parâmetro a tabela
        parent::__construct("unidade_cardapio");
    }


}

?>