<?php

/*
 * 	Descrição do Arquivo
 * 	@author Luis Henique Rodrigues	
 * 	@data de criação - 15/04/2014
 * 	@arquivo - restaurante.controller.class.php
 */

//Inclui a classe genérica CRUD
require_once("../../functions/crud.class.php");

class RestauranteController extends Crud {

	//Método construtor
    public function __construct() {
		
		//Passa como parâmetro a tabela
        parent::__construct("restaurante");
    }


}

?>