<?php

/*
 * 	Descrição do Arquivo
 * 	@autor - Luis Henrique Rodrigues
 * 	@data de criação - 27/08/2014
 * 	@arquivo - cidade.class.php
 */

class cidade {

	//Atributos

    private $id;
    private $cidade;
    private $uf;
  
	//Getters

    public function getId() {
        return $this->id;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function getUf() {
        return $this->uf;
    }

  
	//Setters

    public function setId($id) {
        $this->id = $id;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    public function setUf($uf) {
        $this->uf = $uf;
    }
 
}

?>
