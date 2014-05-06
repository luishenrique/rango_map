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

    public function lista($where){
    	return $this->execute_query("SELECT * FROM cardapio LEFT JOIN unidade_cardapio ON unidade_cardapio.cardapio_id = cardapio.id AND unidade_cardapio.unidade_id = ". $where . ";");
    }

    public function removeItem($unidade,$cardapio){
		return $this->execute_query("DELETE FROM unidade_cardapio WHERE unidade_id = ".$unidade." AND cardapio_id = ".$cardapio." ;");
	}
	
	public function saveItem($unidade,$cardapio){
		return $this->execute_query("INSERT INTO unidade_cardapio (unidade_id, cardapio_id) VALUES (".$unidade.", ".$cardapio.") ;");
	}


}

?>