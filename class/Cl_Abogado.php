<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cl_Abogado
 *
 * @author LC1300XXXX
 */
class Cl_Abogado {

    private $id_abogado;
    private $abogado_id;
    private $especialidad;
    private $valorHora;

    function __construct() {
        
    }

    function getAbogado_id() {
        return $this->abogado_id;
    }

    function getEspecialidad() {
        return $this->especialidad;
    }

    function getValorHora() {
        return $this->valorHora;
    }

    function setAbogado_id($abogado_id) {
        $this->abogado_id = $abogado_id;
    }

    function setEspecialidad($especialidad) {
        $this->especialidad = $especialidad;
    }

    function setValorHora($valorHora) {
        $this->valorHora = $valorHora;
    }

    function getId_abogado() {
        return $this->id_abogado;
    }

    function setId_abogado($id_abogado) {
        $this->id_abogado = $id_abogado;
    }


}
