<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cl_Cliente
 *
 * @author Matito
 */
class Cl_Cliente {
    
    private $cliente_id;
    private $tipoPersona;
    private $direccion;
    private $telefono;
    
    function __construct(){
        
    }
            
    function getIdCliente() {
        return $this->idCliente;
    }

    function getTipoPersona() {
        return $this->tipoPersona;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
    }

    function setTipoPersona($tipoPersona) {
        $this->tipoPersona = $tipoPersona;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

}
