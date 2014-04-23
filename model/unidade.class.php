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
    private $id_restaurante;

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

    public function getIdRestaurante(){
    	return $this->id_restaurante;
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

    public function setIdRestaurante($id_restaurante) {
        $this->id_restaurante = $id_restaurante;
    }
}

?>
