<?php

/*
 * 	Descriчуoo do Arquivo
 * 	@author - Leandro Siquelli Monaco
 * 	@data de criaчуo - 22/04/2014
 * 	@arquivo  - itens.controller.class.php
 */

//Inclui a classe genщrica CRUD
require_once("../../functions/crud.class.php");

class Itens_cardapioController extends Crud {

	//Mщtodo construtor

    public function __construct() {
		
		//Passa como parametro a tabela
        parent::__construct("itens_cardapio");
    }
    
   
    
}

?>