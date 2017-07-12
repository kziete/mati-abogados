<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DaoCliente
 *
 * @author Matito
 */
include_once 'class/Cl_Conexion.php';

class DaoCliente {

    private $conexion;

    function __construct() {
        try {
            $this->conexion = new Cl_Conexion();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    public function guardar($cliente) {
        try {
            $sql = "INSERT INTO CLIENTE VALUES(null,'@2','@3',@4,'ACTIVO');";
            $sql = str_replace("@2", $cliente->getTipoPersona(), $sql);
            $sql = str_replace("@3", $cliente->getDireccion(), $sql);
            $sql = str_replace("@4", $cliente->getTelefono(), $sql);
            $resp = $this->conexion->sqlOperaciones($sql);
            return $resp;
        } catch (Exception $exc) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }

    public function listar() {
        try {
            $sql = "SELECT * FROM CLIENTE;";
            $resp = $this->conexion->sqlSeleccion($sql);
            return $resp;
        } catch (Exception $exc) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }

     public function eliminar($id) {
        try {
            $sql = "DELETE FROM CLIENTE WHERE CLIENTE_ID_USUARIO=$id;";
            $resp = $this->conexion->sqlOperaciones($sql);
            return $resp;
        } catch (Exception $ex) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }

}
