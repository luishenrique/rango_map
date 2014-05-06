<?php

/*
 * 	Descrição do Arquivo
 * 	@autor - João Ricardo Gomes dos Reis
 * 	@data de criação - 01/04/2014
 * 	@arquivo - modelo.class.php
 */

class cardapio {

	//Atributos

    private $id;
    private $categoria;
	private $restaurante_id;
    

	//Getters

    public function getId() {
        return $this->id;
    }

    public function getCategoria() {
        return $this->categoria;
    }
	   public function getRestaurante_id() {
        return $this->restaurante_id;
    }

	//Setters

    public function setId($id) {
        $this->id = $id;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
   
	}
	
	public function setRestaurante_id($restaurante_id){
		$this->restaurante_id = $restaurante_id;	
			
		}
		}
		

?>
