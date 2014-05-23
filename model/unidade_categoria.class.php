<?php

/*
 * 	Descrição do Arquivo
 * 	@autor - Luis Henrique Rodrigues
 * 	@data de criação - 10/05/2014
 * 	@arquivo - unidade_categoria.class.php
 */

class unidade_categoria {

	//Atributos

    private $unidade_id;
    private $categoria_id;

	//Getters

    public function getUnidadeId() {
        return $this->unidade_id;
    }

    public function getcategoriaId() {
        return $this->categoria_id;
    }

	//Setters

    public function setUnidadeId($unidade_id) {
        $this->unidade_id = $unidade_id;
    }

    public function setcategoriaId($categoria_id) {
        $this->categoria_id = $categoria_id;
    
    }

}
?>