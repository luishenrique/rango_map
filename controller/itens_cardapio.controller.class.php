<?php

/*
 * 	Descriчуoo do Arquivo
 * 	@author - Leandro Siquelli Monaco
 * 	@data de criaчуo - 22/04/2014
 * 	@arquivo  - itens.controller.class.php
 */

//Inclui a classe genщrica CRUD
require_once("../../functions/crud.class.php");

class ItensCardapioController extends Crud {

	//Mщtodo construtor

    public function __construct() {
		
		//Passa como parametro a tabela
        parent::__construct("itens_cardapio");
    }

    public function listObjectsGroup($cardapio_id, $unidade_id){
		return $this->execute_query("SELECT * FROM itens_cardapio WHERE cardapio_id = " . $cardapio_id . " AND unidade_id = " . $unidade_id .";");
	}

	public function listValue($unidade_id, $tipo){
		return $this->execute_query("SELECT valor, nome FROM itens_cardapio WHERE cardapio_id = 2 AND unidade_id = " . $unidade_id ." order by valor " . $tipo . " limit 0,1");
	}
}

?>