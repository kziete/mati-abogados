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
            $sql = str_replace("@4", $atencion->getHora(), $sql);
            $sql = str_replace("@5", $atencion->getCliente(), $sql);
            $sql = str_replace("@6", $atencion->getAbogado(), $sql);
            $resp = $this->conexion->sqlOperaciones($sql);
            return $resp;
        } catch (Exception $exc) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }

    public function listarAtencionCliente($id) {
        try {
            $sql = "SELECT * FROM ATENCION WHERE CLIENTE_ID=$id;";
            $resp = $this->conexion->sqlSeleccion($sql);
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
            $resp = $this->conexion->sqlOperaciones($sql);
            return $resp;
        } catch (Exception $ex) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }

    public function cambiarEstado($caso, $id) {
        try {
            $sql = "UPDATE ATENCION SET ESTATUS='$caso' WHERE NUMEROATENCION_ID=$id;";
            $resp = $this->conexion->sqlOperaciones($sql);
            return $resp;
        } catch (Exception $exc) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }
    
     public function cambiarEstadoPerdida($id) {
        try {
            $sql = "UPDATE ATENCION SET ESTATUS='PERDIDA' WHERE NUMEROATENCION_ID=$id AND WHERE ESTATUS='CONFIRMADA';";
            $resp = $this->conexion->sqlOperaciones($sql);
            return $resp;
        } catch (Exception $exc) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }
    
    public function cambiarEstadoAnulada($id) {
        try {
            $sql = "UPDATE ATENCION SET ESTATUS='ANULADA' WHERE NUMEROATENCION_ID=$id AND WHERE ESTATUS='AGENDADA';";
            $resp = $this->conexion->sqlOperaciones($sql);
            return $resp;
        } catch (Exception $exc) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }
    

    public function listar_cliente() {
        try {
            $sql = "SELECT cliente.cliente_id_usuario, usuario.nombre_completo FROM cliente INNER JOIN usuario ON cliente.cliente_id_usuario = usuario.usuario_id WHERE cliente.estatus='ACTIVO';";
            $resp = $this->conexion->sqlSeleccion($sql);
            return $resp;
        } catch (Exception $exc) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }

    public function listar_abogado() {
        try {
            $sql = "SELECT abogado.abogado_id_usuario, usuario.nombre_completo FROM abogado INNER JOIN usuario ON abogado.abogado_id_usuario = usuario.usuario_id WHERE abogado.estatus='ACTIVO';";
            $resp = $this->conexion->sqlSeleccion($sql);
            return $resp;
        } catch (Exception $exc) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }

     public function consultar($id){
        try{
            $sql = "SELECT * FROM ATENCION WHERE NUMEROATENCION_ID=$id;";
            $resp = $this->conexion->sqlSeleccion($sql);
            return $resp;
        } catch (Exception $ex) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }
    
}
