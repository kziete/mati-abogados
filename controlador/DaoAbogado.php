<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DaoAbogado
 *
 * @author LC1300XXXX
 */
include_once '../class/Cl_Conexion.php';

class DaoAbogado {

    private $conexion;

    function __construct() {
        try {
            $cone = new Cl_Conexion();
            $this->conexion = $cone->ObtenerConexion();
        } catch (Exception $exc) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }
    
     public function guardar($abogado) {
        try {
            $sql = "CALL INSERTAR_ABOGADO(null,'@2',@3);";
            str_replace("@2", $abogado->getEspecialidad(), $sql);
            str_replace("@3", $abogado->getValorHora(), $sql);
            $resp = $this->conexion->query($sql);
            return $resp;
        } catch (Exception $exc) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }
    
    public function listar() {
        try {
            $sql = "CALL LISTAR('@1');";
            str_replace("@1", "abogado", $sql);
            $resp = $this->conexion->query($sql);
            return $resp;
        } catch (Exception $exc) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }

    public function eliminar($id) {
        try {
            $sql = "CALL ELIMINAR('@1','@2','@3');";
            str_replace("@1", "abogado", $sql);
            str_replace("@2", "abogado_id_usuario", $sql);
            str_replace("@3", $id, $sql);
            $resp = $this->conexion->query($sql);
            return $resp;
        } catch (Exception $ex) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }
    
    public function despedir($id) {
        try {
            $sql = "CALL DESPEDIR_ABOGADO(@1);";
            str_replace("@1", "$id", $sql);
            $resp = $this->conexion->query($sql);
            return $resp;
        } catch (Exception $ex) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }
}
