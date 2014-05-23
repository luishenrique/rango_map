<?php


//Inclui a classe genérica CRUD
require_once("../../functions/crud.class.php");

class PromocaoController extends Crud {

	//Método construtor

    public function __construct() {
		
		//Passa como parâmetro a tabela
        parent::__construct("promocao");
    }
	
	
}


?>