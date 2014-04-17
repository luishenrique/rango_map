<?php

/*
 * 	Descrição do Arquivo
 * 	@autor - João Ricardo Gomes dos Reis
 * 	@data de criação - 01/04/2014
 * 	@arquivo - usuario.class.php
 */

class usuario {

	//Atributos

    private $id;
    private $nome;
    private $email;
    private $senha;

	//Getters

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSenha() {
        return $this->senha;
    }

	//Setters

    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
	
    public function setSenha($senha) {
        $this->senha = $senha;
    }

}

?>
