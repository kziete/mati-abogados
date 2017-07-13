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
            $sql = "INSERT INTO CLIENTE VALUES(null,@5,'@2','@3',@4,'ACTIVO');";
            $sql = str_replace("@5", $cliente->getCliente_id(), $sql);
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
            $sql = "SELECT cliente.id_cliente ,usuario.nombre_completo,cliente.`tipoPersona`,cliente.direccion,cliente.telefono,cliente.estatus  FROM cliente INNER JOIN usuario ON cliente.cliente_id_usuario = usuario.usuario_id;";
            $resp = $this->conexion->sqlSeleccion($sql);
            return $resp;
        } catch (Exception $exc) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }

     public function eliminar($id) {
        try {
            $sql = "DELETE FROM CLIENTE WHERE ID_CLIENTE=$id;";
            $resp = $this->conexion->sqlOperaciones($sql);
            return $resp;
        } catch (Exception $ex) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }
    
    public function consultar($id) {
        try {
            $sql = "SELECT cliente.id_cliente ,usuario.nombre_completo,cliente.`tipoPersona`,cliente.direccion,cliente.telefono,cliente.estatus  FROM cliente INNER JOIN usuario ON cliente.cliente_id_usuario = usuario.usuario_id WHERE ID_CLIENTE=$id;";
            $resp = $this->conexion->sqlSeleccion($sql);
            return $resp;
        } catch (Exception $ex) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }

}
