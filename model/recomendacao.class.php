<?php

/*
 * 	Descrição do Arquivo
 * 	@autor - Luis Henrique Rodrigues
 * 	@data de criação - 27/08/2014
 * 	@arquivo - recomendacao.class.php
 */

class recomendacao {

	//Atributos

    private $id;
    private $avaliacao;
    private $comentario;
    private $usuario_id;
    private $unidade_id;

	//Getters

    public function getId() {
        return $this->id;
    }

    public function getAvalicao() {
        return $this->avaliacao;
    }

    public function getComentario() {
        return $this->comentario;
    }

    public function getUsuarioid() {
        return $this->usuario_id;
    }

    public function getUnidadeid() {
        return $this->unidade_id;
    }
    

	//Setters

    public function setId($id) {
        $this->id = $id;
    }

    public function setAvaliacao($avaliacao) {
        $this->avaliacao = $avaliacao;
    }
    
    public function serComentario($comentario) {
        $this->comentario = $comentario;
    }

    public function serUsuarioid($usuario_id) {
        $this->usuario_id = $usuario_id;
    }

    public function setUnidadeid($unidade_id) {
        $this->unidade_id = $unidade_id;
    }
}

?>
