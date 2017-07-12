<?php

include_once './class/DaoUsuario.php';
include_once './controlador/DaoCliente.php';
include_once './class/Cl_Usuario.php';
include_once './class/Cl_Cliente.php';

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
        echo '<br>';
        echo '<a href="usuario.php">Volver<a>';
    }
    
    function eliminarUsuario() {
        $id = $_POST["txtEliminar"];
        $dao = new DaoUsuario();

        $resp = $dao->eliminar($id);
        if ($resp > 0) {
            echo 'Eliminado';
        } else {
            echo 'No Existe Esa Id';
        }
        echo '<br>';
        echo '<a href="usuario.php">Volver<a>';
    }

    switch ($accion) {
        case "Guardar":
            guardarUsuario();
            break;
        case "Eliminar":
            EliminarUsuario();
            break;
    }
}

if (isset($_POST["cliente"])) {
    $accion = $_POST["cliente"];

    function guardarCliente() {
        $tipoPersona = $_POST["txtTipoPersona"];
        $direccion = $_POST["txtDireccion"];
        $telefono = $_POST["txtTelefono"];

        $dao = new DaoCliente();
        $cliente = new Cl_Cliente();
        $cliente->setTipoPersona($tipoPersona);
        $cliente->setDireccion($direccion);
        $cliente->setTelefono($telefono);

        $resp = $dao->guardar($cliente);
        if ($resp > 0) {
            echo 'Grabado';
        } else {
            echo 'No grabo';
        }
        echo '<br>';
        echo '<a href="cliente.php">Volver<a>';
    }
    
    function eliminarCliente() {
        $id = $_POST["txtEliminar"];
        $dao = new DaoCliente();

        $resp = $dao->eliminar($id);
        if ($resp > 0) {
            echo 'Eliminado';
        } else {
            echo 'No Existe Esa Id';
        }
        echo '<br>';
        echo '<a href="cliente.php">Volver<a>';
    }

    switch ($accion) {
        case "Guardar":
            guardarCliente();
            break;
        case "Eliminar":
            EliminarCliente();
            break;
    }
}