<?php

/*
 * 	Descrição do Arquivo
 * 	@author Luis Henique Rodrigues	
 * 	@data de criação - 15/04/2014
 * 	@arquivo - unidade.controller.class.php
 */

//Inclui a classe genérica CRUD
require_once("../../functions/crud.class.php");

class UnidadeController extends Crud {

	//Método construtor
    public function __construct() {
		
		//Passa como parâmetro a tabela
        parent::__construct("unidade");
    }

	public function listObjectsGroup($where){
		return $this->execute_query("SELECT * FROM unidade WHERE restaurante_id = ".$where." ;");
	}

	public function selected( $value, $selected=NULL){
    	return $value==$selected ? ' selected="selected"' : '';	
	}
}

?>