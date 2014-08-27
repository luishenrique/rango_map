<?php

/*
 * 	Descrição do Arquivo
 * 	@autor - Luis Henrique Rodrigues
 * 	@data de criação - 27/08/2014
 * 	@arquivo - cardapio.class.php
 */

class cardapio {

	//Atributos

    private $id;
    private $categoria;	
    

	//Getters

    public function getId() {
        return $this->id;
    }

    public function getCategoria() {
        return $this->categoria;
    }
	 
	//Setters

    public function setId($id) {
        $this->id = $id;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
   	}	
	
	}
		

?>
