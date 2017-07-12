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
include_once 'class/Cl_Conexion.php';

class DaoAbogado {

    private $conexion;

     function __construct() {
        try {
            $this->conexion = new Cl_Conexion();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
     public function guardar($abogado) {
        try {
            $sql = "INSERT INTO ABOGADO VALUES(null,'@2',@3,'ACTIVO');";
            str_replace("@2", $abogado->getEspecialidad(), $sql);
            str_replace("@3", $abogado->getValorHora(), $sql);
            $resp = $this->conexion->sqlOperaciones($sql);
            return $resp;
        } catch (Exception $exc) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }
    
    public function listar() {
        try {
            $sql = "SELECT * FROM ABOGADO;";
            $resp = $this->conexion->sqlSeleccion($sql);
            return $resp;
        } catch (Exception $exc) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }

    public function eliminar($id) {
        try {
            $sql = "DELETE FROM ABOGADO WHERE ABOGADO_ID_USER=$id;";
            $resp = $this->conexion->sqlOperaciones($sql);
            return $resp;
        } catch (Exception $ex) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }
    
    public function despedir($id) {
        try {
            $sql = "UPDATE ABOGADO SET ESTATUS='DESPEDIDO' WHERE ABOGADO_ID_USER=$id;";
            $resp = $this->conexion->sqlOperaciones($sql);
            return $resp;
        } catch (Exception $ex) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }
}
