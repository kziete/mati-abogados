<?php

include_once 'Cl_Usuario.php';
include_once 'Cl_Conexion.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DaoUsuario
 *
 * @author LC1300XXXX
 */
class DaoUsuario {

    private $conexion;

    function __construct() {
        try {
            $this->conexion = new Cl_Conexion();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function guardar($usuario) {
        try {
            $sql = "CALL INSERTAR_USUARIO(null,'@2','@3','@4',@6);";
            str_replace("@2", $usuario->getRut(), $sql);
            str_replace("@3", $usuario->getPassword(), $sql);
            str_replace("@4", $usuario->getNombre_completo(), $sql);
            str_replace("@6", $usuario->getTipo_usuario(), $sql);
            $resp = $this->conexion->query($sql);
            return $resp;
        } catch (Exception $exc) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }

    public function listar() {
        try {
            $sql = "CALL LISTAR('@1');";
            str_replace("@1", "usuario", $sql);
            $resp = $this->conexion->query($sql);
            return $resp;
        } catch (Exception $exc) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }

    public function eliminar($id) {
        try {
            $sql = "CALL ELIMINAR('@1','@2','@3');";
            str_replace("@1", "usuario", $sql);
            str_replace("@2", "usuario_id", $sql);
            str_replace("@3", $id, $sql);
            $resp = $this->conexion->query($sql);
            return $resp;
        } catch (Exception $ex) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }

    public function login2($rut, $pass) {
        try {
            $sql = "CALL LOGIN('@1','@2');";
            str_replace("@1", $rut, $sql);
            str_replace("@2", $pass, $sql);
            $resp = $this->conexion->query($sql);
            while ($row = mysqli_fetch_array($resp)) {
                $usuario = new Cl_Usuario();
                $usuario->setUsuario_id($row[0]);
                $usuario->setRut($row[1]);
                $usuario->setPassword($row[2]);
                $usuario->setNombre_completo($row[3]);
                $usuario->setFecha_registro($row[4]);
                $usuario->setTipo_usuario($row[5]);
                return $usuario;
            }
        } catch (Exception $ex) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }

    public function login($rut, $pass) {
        try {
            $sql = "SELECT * FROM usuario WHERE rut=$rut AND password=$pass;";
            $resp = $this->conexion->sqlSeleccion($sql);
                while ($row = mysqli_fetch_array($resp)) {
                    $usuario = new Cl_Usuario();
                    $usuario->setUsuario_id($row[0]);
                    $usuario->setRut($row[1]);
                    $usuario->setPassword($row[2]);
                    $usuario->setNombre_completo($row[3]);
                    $usuario->setFecha_registro($row[4]);
                    $usuario->setTipo_usuario($row[5]);
                    return $usuario;
                }
                return null;
        } catch (Exception $ex) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }

}
