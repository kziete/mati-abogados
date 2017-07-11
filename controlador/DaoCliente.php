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
include_once '../class/Cl_Conexion.php';

class DaoCliente {

    private $conexion;

    function __construct() {
        try {
            $cone = new Cl_Conexion();
            $this->conexion = $cone->ObtenerConexion();
        } catch (Exception $exc) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }
    public function guardar($cliente) {
        try {
            $sql = "CALL INSERTAR_CLIENTE(null,'@2','@3',@4,'@5');";
            str_replace("@2", $cliente->getTipoPersona, $sql);
            str_replace("@3", $cliente->getDireccion(), $sql);
            str_replace("@4", $cliente->getTelefono(), $sql);
            str_replace("@5", "ACTIVO", $sql);
            $resp = $this->conexion->query($sql);
            return $resp;
        } catch (Exception $exc) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }

    public function listar() {
        try {
            $sql = "CALL LISTAR('@1');";
            str_replace("@1", "cliente", $sql);
            $resp = $this->conexion->query($sql);
            return $resp;
        } catch (Exception $exc) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }

     public function eliminar($id) {
        try {
            $sql = "CALL ELIMINAR('@1','@2','@3');";
            str_replace("@1", "cliente", $sql);
            str_replace("@2", "cliente_id_usuario", $sql);
            str_replace("@3", $id, $sql);
            $resp = $this->conexion->query($sql);
            return $resp;
        } catch (Exception $ex) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }

}
