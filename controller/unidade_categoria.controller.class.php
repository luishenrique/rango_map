<?php

/*
 * 	Descrição do Arquivo
 * 	@author Luis Henique Rodrigues	
 * 	@data de criação - 10/05/2014
 * 	@arquivo - unidade_categoria.controller.class.php
 */

//Inclui a classe genérica CRUD
require_once("../../functions/crud.class.php");

class UnidadeCategoria extends Crud {

	//Método construtor
    public function __construct() {
		
		//Passa como parâmetro a tabela
        parent::__construct("unidade_categoria");
    }

    public function lista($where){
    	return $this->execute_query("SELECT * FROM categoria LEFT JOIN unidade_categoria ON unidade_categoria.categoria_id = categoria.id AND unidade_categoria.unidade_id = ". $where . ";");
    }

    public function removeItem($unidade,$categoria){
		return $this->execute_query("DELETE FROM unidade_categoria WHERE unidade_id = ".$unidade." AND categoria_id = ".$categoria." ;");
	}
	
	public function saveItem($unidade,$categoria){
		return $this->execute_query("INSERT INTO unidade_categoria (unidade_id, categoria_id) VALUES (".$unidade.", ".$categoria.") ;");
	}


}

?>