<?php

/*
 * 	Descriчуoo do Arquivo
 * 	@author - Leandro Siquelli Monaco
 * 	@data de criaчуo - 22/04/2014
 * 	@arquivo  - unidade_promocao.controller.class.php
 */

//Inclui a classe genщrica CRUD
require_once("../../functions/crud.class.php");

class UnidadePromocao extends Crud {

	//Mщtodo construtor

    public function __construct() {
		
		//Passa como parametro a tabela
        parent::__construct("unidade_promocao");
    }
      
    
    public function lista($where){
    	return $this->execute_query("SELECT * FROM promocao LEFT JOIN unidade_promocao ON unidade_promocao.promocao_id = promocao.id AND unidade_promocao.unidade_id = ". $where . ";");
    }

    public function removeItem($unidade,$promocao){
		return $this->execute_query("DELETE FROM unidade_promocao WHERE unidade_id = ".$unidade." AND promocao_id = ".$promocao." ;");
	}
	
	public function saveItem($unidade,$promocao){
		return $this->execute_query("INSERT INTO unidade_promocao (unidade_id, promocao_id) VALUES (".$unidade.", ".$promocao.") ;");
	}
}

?>