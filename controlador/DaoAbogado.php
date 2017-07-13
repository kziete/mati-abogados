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
            $sql = "INSERT INTO ABOGADO VALUES(null,@4,'@2',@3,'ACTIVO');";
            $sql = str_replace("@4", $abogado->getId_abogado(), $sql);
            $sql = str_replace("@2", $abogado->getEspecialidad(), $sql);
            $sql = str_replace("@3", $abogado->getValorHora(), $sql);
            echo 'query'.$sql;
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
            $sql = "DELETE FROM ABOGADO WHERE ID_ABOGADO=$id;";
            $resp = $this->conexion->sqlOperaciones($sql);
            return $resp;
        } catch (Exception $ex) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }

    public function despedir($id) {
        try {
            $sql = "UPDATE ABOGADO SET ESTATUS='DESPEDIDO' WHERE ID_ABOGADO=$id;";
            $resp = $this->conexion->sqlOperaciones($sql);
            return $resp;
        } catch (Exception $ex) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }

    public function consultar($id) {
        try {
            $sql = "SELECT * FROM ABOGADO WHERE ID_ABOGADO=$id;";
            $resp = $this->conexion->sqlSeleccion($sql);
            return $resp;
        } catch (Exception $ex) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }

}
