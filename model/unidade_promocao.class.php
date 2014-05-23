<?php

/*
 * 	Descriчуoo do Arquivo
* 	@author - Leandro Siquelli Monaco
* 	@data de criaчуo - 22/04/2014
* 	@arquivo  - categoria.class.php
*/

class unidade_promocao {

	//Atributos

	private $unidade_id;
	private $promocao_id;

	//Getters

	public function getUnidadeId() {
		return $this->unidade_id;
	}

	public function getPromocaoId() {
		return $this->promocao_id;
	}

	

	//Setters

	public function setUnidadeId($unidade_id) {
		$this->unidade_id = $unidade_id;
	}

	public function serPromocaoId($promocao_id) {
		$this->promocao_id = $promocao_id;
	}

	

}

?>