<?php

/*
 * 	Descrição do Arquivo
 * 	@autor -Vânia Gomes
 * 	@data de criação - 01/04/2014
 * 	@arquivo - promocao.class.php
 */

class promocao {

	//Atributos

    private $id;
    private $nome;
	private $descricao;
	private $valor;
	private $data_inicio;
	private $data_fim;
	private $restaurante_id;
  
	//Getters

    public function getId() {
        return $this->id;
    }

    public function geNnome() {
        return $this->nome;
    }

  public function getDescricao() {
        return $this->idescricao;
    }

    public function getValor() {
        return $this->valor;
    }
  
      public function getData_inicio() {
        return $this->data_inicio;
    }
	  
        public function getData_fim() {
        return $this->data_fimo;
    }
		
		public function getRestaurante_id(){
			return $this>$restaurante_id;
		}
  
  
	//Setters

    public function setId($id) {
        $this->id = $id;
    }
	
	   public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setValor($valorl) {
        $this->valor = $valor;
    }
	
    public function setData_inicio($data_inicio) {
        $this->data_inicio= $data_inicio;
    }

    public function setData_fim($data_fim) {
        $this->data_fim= $data_fim;
    }
	
	 public function setRestaurante_id($restaurante_id) {
        $this->restaurante_id= $restaurante_id;
    }
}

?>