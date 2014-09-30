<?php

/*
 * 	Descrição do Arquivo
 * 	@author Luis Henique Rodrigues	
 * 	@data de criação - 15/04/2014
 * 	@arquivo - unidade.controller.class.php
 */

//Inclui a classe genérica CRUD
require_once("../../functions/crud.class.php");

class UnidadeController extends Crud {

	//Método construtor
    public function __construct() {
		
		//Passa como parâmetro a tabela
        parent::__construct("unidade");
    }

	public function listObjectsGroup($where=NULL){
		return $this->execute_query("SELECT * FROM unidade WHERE restaurante_id = " . $where .";");
	}

	public function selected( $value, $selected=NULL){
    	return $value==$selected ? ' selected="selected"' : '';	
	}

	public function pesquisaPorPreco($valor){
		return $this->execute_query("SELECT distinct(unidade.id), unidade.id, restaurante.nome_fantasia, unidade.rua, unidade.numero, unidade.bairro, cidade.cidade, unidade.telefone, categoria.descricao, unidade.latitude, unidade.longitude  FROM restaurante INNER JOIN unidade ON unidade.restaurante_id = restaurante.id INNER JOIN 
			itens_cardapio ON itens_cardapio.unidade_id = unidade.id INNER JOIN cardapio ON cardapio.id = itens_cardapio.cardapio_id 
			INNER JOIN unidade_categoria ON unidade_categoria.unidade_id = unidade.id INNER JOIN categoria ON categoria.id = unidade_categoria.categoria_id
			INNER JOIN cidade ON cidade.id = unidade.cidade_id WHERE itens_cardapio.valor <= " . $valor . " AND cardapio.id = 2;");
	}

	public function pesquisaPorCidade($cidade){
		return $this->execute_query("SELECT distinct(unidade.id), unidade.id, restaurante.nome_fantasia, unidade.rua, unidade.numero, unidade.bairro, cidade.cidade, unidade.telefone, categoria.descricao, unidade.latitude, unidade.longitude  FROM restaurante INNER JOIN unidade ON unidade.restaurante_id = restaurante.id INNER JOIN 
			itens_cardapio ON itens_cardapio.unidade_id = unidade.id INNER JOIN cardapio ON cardapio.id = itens_cardapio.cardapio_id 
			INNER JOIN unidade_categoria ON unidade_categoria.unidade_id = unidade.id INNER JOIN categoria ON categoria.id = unidade_categoria.categoria_id
			INNER JOIN cidade ON cidade.id = unidade.cidade_id WHERE cidade.cidade LIKE '%" . $cidade . "%' ;");
	}
}

?>