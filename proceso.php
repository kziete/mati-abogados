<?php
include_once './class/DaoUsuario.php';
include_once './class/Cl_Usuario.php';

if (isset($_POST["usuario"])) {
    $accion = $_POST["usuario"];

    function guardarUsuario() {
        $rut = $_POST["txtRut"];
        $pass = $_POST["txtPassword"];
        $nombre = $_POST["txtNombre"];
        $tipo = $_POST["cboTipoUsuario"];

        $dao = new DaoUsuario();
        $usuario = new Cl_Usuario();
        $usuario->setRut($rut);
        $usuario->setPassword($pass);
        $usuario->setNombre_completo($nombre);
        $usuario->setTipo_usuario($tipo);

        $resp = $dao->guardar($usuario);

        if ($resp > 0) {
            echo 'Grabado';
        } else {
            echo 'No grabo';
        }
    }

    switch ($accion) {
        case "Guardar":
            guardarUsuario();
            break;
        case "Eliminar":
            echo 'llegamos al eliminar';
            break;
    }
}