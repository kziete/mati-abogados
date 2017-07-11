<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cl_Usuario
 *
 * @author LC1300XXXX
 */
class Cl_Usuario {

    private $usuario_id;
    private $rut;
    private $password;
    private $nombre_completo;
    private $fecha_registro;
    private $estatus;
    private $tipo_usuario;
    
    function __construct() {
        
    }

    function getUsuario_id() {
        return $this->usuario_id;
    }

    function getRut() {
        return $this->rut;
    }

    function getPassword() {
        return $this->password;
    }

    function getNombre_completo() {
        return $this->nombre_completo;
    }

    function getFecha_registro() {
        return $this->fecha_registro;
    }

    function getTipo_usuario() {
        return $this->tipo_usuario;
    }

    function setUsuario_id($usuario_id) {
        $this->usuario_id = $usuario_id;
    }

    function setRut($rut) {
        $this->rut = $rut;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setNombre_completo($nombre_completo) {
        $this->nombre_completo = $nombre_completo;
    }

    function setFecha_registro($fecha_registro) {
        $this->fecha_registro = $fecha_registro;
    }

    function setTipo_usuario($tipo_usuario) {
        $this->tipo_usuario = $tipo_usuario;
    }

    function getEstatus() {
        return $this->estatus;
    }

    function setEstatus($estatus) {
        $this->estatus = $estatus;
    }

}
