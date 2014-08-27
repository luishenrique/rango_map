<?php

/*
 * 	Descrição do Arquivo
 * 	@autor - Luis Henrique Rodrigues
 * 	@data de criação - 27/08/2014
 * 	@arquivo - pesquisa.class.php
 */

class pesquisa {

	//Atributos

    private $id;
    private $data;
    private $latitude;
    private $longitude;
    private $id_usuario;
  
	//Getters

    public function getId() {
        return $this->id;
    }

    public function getData() {
        return $this->data;
    }

    public function getLatitude() {
        return $this->latitude;
    }

    public function getLongitude() {
        return $this->longitude;
    }

    public function getIdUsuario() {
        return $this->id;
    }
  
	//Setters

    public function setId($id) {
        $this->id = $id;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function setLongitude($longitude) {
        $this->longitude = $longitude;
    }
 
    public function setLatitude($latitude) {
        $this->latitude = $latitude;
    }
    
    public function setIdUsuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

}

?>
