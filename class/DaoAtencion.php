<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DaoAtencion
 *
 * @author DUOC
 */
include_once 'Cl_Atencion.php';
include_once 'Cl_Conexion.php';

class DaoAtencion {
    
    private $conexion;

    function __construct() {
        try {
            $this->conexion = new Cl_Conexion();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function guardar($atencion) {
        try {
            $sql = "INSERT INTO ATENCION VALUES(null,'AGENDADA',CURRENT_DATE(),@4,@5,@6);";
            str_replace("@4", $atencion->getHora(), $sql);
            str_replace("@5", $atencion->getCliente(), $sql);
            str_replace("@6", $atencion->getAbogado(), $sql);
            $resp = $this->conexion->sqlOperaciones($sql);
            return $resp;
        } catch (Exception $exc) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }
    
    public function listar() {
        try {
            $sql = "SELECT * FROM ATENCION;";
            $resp = $this->conexion->sqlSeleccion($sql);
            return $resp;
        } catch (Exception $exc) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }

    
    public function eliminar($id) {
        try {
            $sql = "DELETE FROM ATENCION WHERE NUMEROATENCION_ID=$id;";
            $resp = $this->conexion->query($sql);
            return $resp;
        } catch (Exception $ex) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }
    
    
    public function atenecionEstado($caso,$id) {
        try {
            $estado="test";
            switch ($caso){
                case 1:
                    $estado = "REALIZADA";
                    break;
                case 2:
                    $estado = "PERDIDA";
                    break;
                case 3:
                    $estado = "CONFIRMADA";
                    break;
                case 4:
                    $estado = "ANULADA";
                    break;
            }
            $sql = "CALL ATENCION_ESTADO(@1,'@2');";
            str_replace("@1", $id, $sql);
            str_replace("@2", $estado, $sql);
            $resp = $this->conexion->query($sql);
            return $resp;
        } catch (Exception $exc) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }
    
    public function cambiarEstado($caso,$id) {
        try {
            $sql = "UPDATE ATENCION SET ESTATUS=$caso WHERE NUMEROATENCION_ID=$id;";
            $resp = $this->conexion->sqlOperaciones($sql);
            return $resp;
        } catch (Exception $exc) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }
}
