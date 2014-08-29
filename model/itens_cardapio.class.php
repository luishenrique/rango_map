<?php

/*
 * 	Descriчуoo do Arquivo
* 	@author - Leandro Siquelli Monaco
* 	@data de criaчуo - 22/04/2014
* 	@arquivo  - itens_cardapio.class.php
*/

class itens_cardapio {

	//Atributos

	private $id;
	private $nome;
	private $descricao;
	private $valor;
	private $calorias;
	private $pessoas;
	private $cardapio_id;
	private $unidade_id;
	

	//Getters

	public function getId() {
		return $this->id;
	}

	public function getNome() {
		return $this->nome;
	}
	
	public function getDescricao() {
		return $this->descricao;
	}

	public function getValor() {
		return $this->valor;
	}

	public function getCalorias() {
		return $this->calorias;
	}
	
	public function getPessoas() {
		return $this->pessoas;
	}
	
	public function getCardapio_id() {
		return $this->cardapio_id;
	}
	
	public function getUnidade_id() {
		return $this->unidade_id;
	}
	
		
	//Setters

	public function setId($id) {
		$this->id = $id;
	}
	
	public function setNome($nome) {
		$this->nome = $nome;
	}

	public function setDescricao($descricao) {
		$this->descricao = $descricao;
	}
	
	public function setValor($valor) {
		$this->valor = $valor;
	}
	
	public function setCalorias($calorias) {
		$this->calorias = $calorias;
	}
	
	public function setPessoas($pessoas) {
		$this->pessoas = $pessoas;
	}
	
	public function setCardapio_id($cardapio_id) {
		$this->cardapio_id = $cardapio_id;
	}
	
	public function setUnidade_id($unidade_id) {
		$this->unidade_id = $unidade_id;
	}

	

}

?>