<?php

include_once './class/DaoUsuario.php';
include_once './controlador/DaoCliente.php';
include_once './class/Cl_Usuario.php';
include_once './class/Cl_Cliente.php';
include_once './class/Cl_Abogado.php';
include_once './controlador/DaoAbogado.php';

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

if (isset($_POST["abogado"])) {
    $accion = $_POST["abogado"];

    function guardarAbogado() {
        $especialidad = $_POST["txtEspecialidad"];
        $valorHora = $_POST["txtValorHora"];

        $dao = new DaoAbogado();
        $abogado = new Cl_Abogado();
        $abogado->setEspecialidad($especialidad);
        $abogado->setValorHora($valorHora);

        $resp = $dao->guardar($abogado);
        if ($resp > 0) {
            echo 'Grabado';
        } else {
            echo 'No grabo';
        }
        echo '<br>';
        echo '<a href="abogado.php">Volver<a>';
    }

    function eliminarAbogado() {
        $id = $_POST["txtEliminar"];
        $dao = new DaoAbogado();

        $resp = $dao->eliminar($id);
        if ($resp > 0) {
            echo 'Eliminado';
        } else {
            echo 'No Existe Esa Id';
        }
        echo '<br>';
        echo '<a href="abogado.php">Volver<a>';
    }

    function consultarAbogado() {
        $id = $_POST["txtConsultar"];
        $dao = new DaoAbogado();

        $resp = $dao->consultar($id);
        if ($resp != null) {
            echo '<table border="1">';
            echo '<tr>';
            echo '<td>Id:</td>';
            echo '<td>Especialida:</td>';
            echo '<td>Valor Hora:</td>';
            echo '<td>Estatus:</td>';
            echo '</tr>';
            while ($row = mysqli_fetch_array($resp)) {
                echo '<tr>';
                echo '<td>' . $row[0] . '</td>';
                echo '<td>' . $row[1] . '</td>';
                echo '<td>' . $row[2] . '</td>';
                echo '<td>' . $row[3] . '</td>';
                echo '</tr>';
            };
        } else {
            echo 'No Existe Ese Abogado';
        }
        echo '<br>';
        echo '<a href="abogado.php">Volver<a>';
    }

    function despedirAbogado() {
        $id = $_POST["txtDespedir"];
        $dao = new DaoAbogado();

        $resp = $dao->despedir($id);
        if ($resp > 0) {
            echo 'Despedido';
        } else {
            echo 'No Se Pudo Despedir';
        }
        echo '<br>';
        echo '<a href="abogado.php">Volver<a>';
    }

    switch ($accion) {
        case "Guardar":
            guardarAbogado();
            break;
        case "Eliminar":
            eliminarAbogado();
            break;
        case "Consultar":
            consultarAbogado();
            break;
        case "Despedir":
            despedirAbogado();
            break;
        case "Eliminar":
            EliminarAbogado();
            break;
    }
}