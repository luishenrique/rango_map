<?php

/*
 * 	Descrição do Arquivo
 * 	@autor - Luis Henrique Rodrigues
 * 	@data de criação - 22/04/2014
 * 	@arquivo - unidade_cardapio.class.php
 */

class unidade_cardapio {

	//Atributos

    private $unidade_id;
    private $cardapio_id;

	//Getters

    public function getUnidadeId() {
        return $this->unidade_id;
    }

    public function getCardapioId() {
        return $this->cardapio_id;
    }

	//Setters

    public function setUnidadeId($unidade_id) {
        $this->unidade_id = $unidade_id;
    }

    public function setCardapioId($cardapio_id) {
        $this->cardapio_id = $cardapio_id;
    
    }

}
?>