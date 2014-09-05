<?php

/*
 * 	Descrição do Arquivo
 * 	@author Luis Henrique Rodrigues
 * 	@data de criação - 28/08/2014
 * 	@arquivo - cidade.controller.class.php
 */

//Inclui a classe genérica CRUD
require_once("../../functions/crud.class.php");

class CidadeController extends Crud {

	//Método construtor

    public function __construct() {
		
		//Passa como parâmetro a tabela
        parent::__construct("cidade");
    }
}

?>