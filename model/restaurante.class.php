<?php

/*
 * 	Descrição do Arquivo
 * 	@autor - Luis Henrique Rodrigues
 * 	@data de criação - 15/04/2014
 * 	@arquivo - restaurante.class.php
 */

class restaurante {

	//Atributos

    private $id;
    private $nome_fantasia;
    private $razao_social;
    private $cnpj;
    private $email;
    private $site;
    private $senha;

	//Getters

    public function getId() {
        return $this->id;
    }

    public function getNomeFantasia() {
        return $this->nome_fantasia;
    }

    public function getRazaoSocial() {
        return $this->razao_social;
    }

    public function getCnpj() {
        return $this->cnpj;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSite() {
        return $this->site;
    }

    public function getSenha(){
        return $this->senha;
    }

	//Setters

    public function setId($id) {
        $this->id = $id;
    }

    public function setNomeFantasia($nome_fantasia) {
        $this->nome_fantasia = $nome_fantasia;
    }    

    public function setRazaoSocial($razao_social) {
        $this->razao_social = $razao_social;
    }

    public function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setSite($site) {
        $this->site = $site;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }
}

?>
