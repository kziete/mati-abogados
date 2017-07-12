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
    
    public function verificar($aux) {
        $rutin = strrev($aux);
        $cant = strlen($rutin);
        $c = 0;
        while ($c < $cant) {
            $r[$c] = substr($rutin, $c, 1);
            $c++;
        }
        $ca = count($r);
        $m = 2;
        $c2 = 0;
        $suma = 0;
        while ($c2 < $ca) {
            $suma = $suma + ($r[$c2] * $m);
            if ($m == 7) {
                $m = 2;
            } else {
                $m++;
            }
            $c2++;
        }
        $resto = $suma % 11;
        $digito = 11 - $resto;
        if ($digito == 10) {
            $digito = 'K';
        } else {
            if ($digito == 11) {
                $digito = "0";
            }
        }

        return $digito;
    }

    public function guardar($usuario) {
        try {
            $sql = "INSERT INTO USUARIO VALUES(null,'@2','@3','@4',CURRENT_DATE(),@6);";
            $sql = str_replace('@2', $usuario->getRut(), $sql);
            $sql = str_replace("@3", $usuario->getPassword(), $sql);
            $sql = str_replace("@4", $usuario->getNombre_completo(), $sql);
            $sql = str_replace("@6", $usuario->getTipo_usuario(), $sql);
            $resp = $this->conexion->sqlOperaciones($sql);
            return $resp;
        } catch (Exception $exc) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }

    public function listar() {
        try {
            $sql = "SELECT * FROM USUARIO;";
            $resp = $this->conexion->sqlSeleccion($sql);
            return $resp;
        } catch (Exception $exc) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }

    public function listar_tipUsuario() {
        try {
            $sql = "SELECT * FROM TIPO_USUARIO;";
            $resp = $this->conexion->sqlSeleccion($sql);
            return $resp;
        } catch (Exception $exc) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }

    public function eliminar($id) {
        try {
            $sql = "DELETE FROM USUARIO WHERE USUARIO_ID =$id;";
            $resp = $this->conexion->sqlOperaciones($sql);
            return $resp;
        } catch (Exception $ex) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }

    public function login($rut, $pass) {
        try {
            $sql = "SELECT * FROM usuario WHERE rut='$rut' AND password='$pass';";
            $resp = $this->conexion->sqlSeleccion($sql);
            if ($resp) {
                while ($row = mysqli_fetch_array($resp)) {
                    print_r($row);
                    $usuario = new Cl_Usuario();
                    $usuario->setUsuario_id($row[0]);
                    $usuario->setRut($row[1]);
                    $usuario->setPassword($row[2]);
                    $usuario->setNombre_completo($row[3]);
                    $usuario->setFecha_registro($row[4]);
                    $usuario->setTipo_usuario($row[5]);
                    return $usuario;
                }
            }
        } catch (Exception $ex) {
            $traza = new Cl_Traza($exc->getTraceAsString());
        }
    }

}
