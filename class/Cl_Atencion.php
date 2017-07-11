<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cl_Atencion
 *
 * @author LC1300XXXX
 */
class Cl_Atencion {
   
    private $atencion_id;
    private $estatus;
    private $fecha;
    private $hora;
    private $cliente;
    private $abogado;
    
    function __construct() {
        
    }
    
    function getAtencion_id() {
        return $this->atencion_id;
    }

    function getEstatus() {
        return $this->estatus;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getHora() {
        return $this->hora;
    }

    function getCliente() {
        return $this->cliente;
    }

    function getAbogado() {
        return $this->abogado;
    }

    function setAtencion_id($atencion_id) {
        $this->atencion_id = $atencion_id;
    }

    function setEstatus($estatus) {
        $this->estatus = $estatus;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }

    function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    function setAbogado($abogado) {
        $this->abogado = $abogado;
    }



}
