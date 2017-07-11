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
include_once '../class/Cl_Conexion.php';

class DaoAtencion {
    
    private $conexion;

    function __construct() {
        try {
            $cone = new Cl_Conexion();
            $this->conexion = $cone->ObtenerConexion();
        } catch (Exception $exc) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }
    
    public function guardar($atencion) {
        try {
            $sql = "CALL INSERTAR_ATENCION(null,'@2',@4,@5,@6);";
            str_replace("@2", "AGENDADA", $sql);
            str_replace("@4", $atencion->getHora(), $sql);
            str_replace("@5", $atencion->getCliente(), $sql);
            str_replace("@6", $atencion->getAbogado(), $sql);
            $resp = $this->conexion->query($sql);
            return $resp;
        } catch (Exception $exc) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }

    public function listar() {
        try {
            $sql = "CALL LISTAR('@1');";
            str_replace("@1", "atencion", $sql);
            $resp = $this->conexion->query($sql);
            return $resp;
        } catch (Exception $exc) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }

    public function eliminar($id) {
        try {
            $sql = "CALL ELIMINAR('@1','@2','@3');";
            str_replace("@1", "atencion", $sql);
            str_replace("@2", "numeroAtencion_id", $sql);
            str_replace("@3", $id, $sql);
            $resp = $this->conexion->query($sql);
            return $resp;
        } catch (Exception $ex) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }
    
    public function listarAgendada() {
        try {
            $sql = "CALL LISTAR_ATENCION_AGENDADA('@1');";
            str_replace("@1", "AGENDADA", $sql);
            $resp = $this->conexion->query($sql);
            return $resp;
        } catch (Exception $exc) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }
    
    public function listarConfirmada() {
        try {
            $sql = "CALL LISTAR_ATENCION_CONFIRMADA('@1');";
            str_replace("@1", "CONFIRMADA", $sql);
            $resp = $this->conexion->query($sql);
            return $resp;
        } catch (Exception $exc) {
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
    
}
