<?php

/*
 * 	Descri��oo do Arquivo
 * 	@author - Leandro Siquelli Monaco
 * 	@data de cria��o - 22/04/2014
 * 	@arquivo  - itens.controller.class.php
 */

//Inclui a classe gen�rica CRUD
require_once("../../functions/crud.class.php");

class Itens_cardapioController extends Crud {

	//M�todo construtor

    public function __construct() {
		
		//Passa como parametro a tabela
        parent::__construct("itens_cardapio");
    }
    
   
    
}

?>