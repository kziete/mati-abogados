<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cl_Conexion
 *
 * @author Matito
 */
include_once 'Cl_Traza.php';

class Cl_Conexion {

    private $server = "localhost";
    private $base = "bufete";
    private $usuario = "root";
    private $pass = "";
    private $conexion;

    public function Cl_Conexion() {
        try {
            $this->conexion = new mysqli($this->server, $this->usuario, $this->pass, $this->base);
        } catch (Exception $exc) {
            $traza = new Cl_Traza("Error Conexion:" . $exc->getTraceAsString());
        }
    }

    public function ObtenerConexion() {
        return $this->conexion;
    }

     public function sqlOperaciones($sql) {
        try {
            $resp = mysqli_query($this->conexion, $sql);
            return mysqli_affected_rows($this->conexion);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    //metodo encargado de Selecciones Select
    public function sqlSeleccion($sql) {
        try {
            $resp = mysqli_query($this->conexion, $sql);
            return $resp;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}
