<?php

/*
 *  Descrição do Arquivo
 *  @autor - João Ricardo Gomes dos Reis
 *  @data de criação - 01/04/2014
 *  @arquivo - modelo.class.php
 */

class horario {

    //Atributos

    private $id;
    private $dia_semana;
    private $horario1;
    private $horario2;
    private $horario3;
    private $horario4;
    private $unidade_id;

    //Getters

    public function getId() {
        return $this->id;
    }

    public function getDiaSemana() {
        return $this->nome;
    }

    public function getHorario1() {
        return $this->horario1;
    }

    public function getHorario2() {
        return $this->horario2;
    }

    public function getHorario3() {
        return $this->horario3;
    }

    public function getHorario4() {
        return $this->horario4;
    }

    public function getUnidadeid() {
        return $this->unidade_id;
    }

    //Setters

    public function setId($id) {
        $this->id = $id;
    }

    public function setDiaSemana($dia_semana) {
        $this->dia_semana = $dia_semana;
    }

    public function setHorario1($horario1) {
        $this->horario1 = $horario1;
    }

    public function setHorario2($horario2) {
        $this->horario2 = $horario2;
    }

    public function setHorario3($horario3) {
        $this->horario3 = $horario3;
    }

    public function setHorario4($horario4) {
        $this->horario4 = $horario4;
    }

    public function setUnidadeid($unidade_id) {
        $this->unidade_id = $unidade_id;
    }


}

?>
