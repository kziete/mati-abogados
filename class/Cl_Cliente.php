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

    private $id_cliente;
    private $cliente_id;
    private $tipoPersona;
    private $direccion;
    private $telefono;

    function __construct() {
        
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

    function setTipoPersona($tipoPersona) {
        $this->tipoPersona = $tipoPersona;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function getId_cliente() {
        return $this->id_cliente;
    }

    function getCliente_id() {
        return $this->cliente_id;
    }

    function setId_cliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }

    function setCliente_id($cliente_id) {
        $this->cliente_id = $cliente_id;
    }

}
