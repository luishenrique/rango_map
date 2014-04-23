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
		return $this->execute_query("SELECT * FROM restaurante LEFT JOIN unidade ON unidade.id_restaurante = restaurante.id AND unidade.id_restaurante = ".$where." ;");
	}

}

?>