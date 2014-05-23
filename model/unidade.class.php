<?php

/*
 * 	Descrição do Arquivo
 * 	@autor - Luis Henrique Rodrigues
 * 	@data de criação - 15/04/2014
 * 	@arquivo - unidade.class.php
 */

class unidade {

	//Atributos

    private $id;
    private $rua;
    private $numero;
    private $bairro;
    private $cidade;
    private $uf;
    private $telefone;
    private $restaurante_id;
    private $latitude;
    private $longitude;

	//Getters

    public function getId() {
        return $this->id;
    }

    public function getRua(){
    	return $this->rua;
    }

    public function getNumero(){
    	return $this->numero;
    }

    public function getBairro(){
    	return $this->bairro;
    }

    public function getCidade(){
    	return $this->cidade;
    }

    public function getUf(){
    	return $this->uf;
    }

    public function getTelefone(){
    	return $this->telefone;
    }

    public function getRestauranteId(){
    	return $this->restaurante_id;
    }
	
    public function getLatitude(){
    	return $this->latitude;
    }

    public function getLongitude(){
    	return $this->longitude;
    }

	//Setters

    public function setId($id) {
        $this->id = $id;
    }

	public function setRua($rua) {
        $this->rua = $rua;
    } 

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    public function setUf($uf) {
        $this->uf = $uf;
    }

	public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }    

    public function setRestauranteId($restaurante_id) {
        $this->restaurante_id = $restaurante_id;
    }
	
	public function setLatitude($latitude) {
        $this->latitude = $latitude;
    }    

    public function setLongitude($longitude) {
        $this->longitude = $longitude;
    }
	
}

?>
