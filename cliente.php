<?php
include_once './class/Cl_Usuario.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <?php
    include './header.php';
    ?>
    <body>
        <?php
        if ($user->getTipo_usuario() == 3) {
            ?>
            <div>
                agregar
                <div>
                    Agregar Cliente
                    <div>
                        <form>
                            <table>
                                <tr>
                                    <td>Tipo Persona:</td>
                                    <td><input type="text" name="txtTipoPersona"></td>
                                </tr>
                                <tr>
                                    <td>Direccion:</td>
                                    <td><input type="text" name="txtDireccion"></td>
                                </tr>
                                <tr>
                                    <td>Telefono:</td>
                                    <td><input type="number" name="txtTelefono"></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><input type="submit" name="txtAgregar"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php
        if ($user->getTipo_usuario() == 3 || $user->getTipo_usuario() == 4 || $user->getTipo_usuario() == 5) {
            ?>
            <div>
                Listar
                <div>
                    <h4>Listar Clientes</h4>
                    <div>
                        <?php
                        include 'controlador/DaoCliente.php';
                        $dao = new DaoCliente();
                        $resultado = $dao->listar();
                        if ($resultado != null) {
                            echo '<table border="1">';
                            echo '<tr>';
                            echo '<td>Id</td>';
                            echo '<td>Tipo Persona</td>';
                            echo '<td>Direccion</td>';
                            echo '<td>Telefono</td>';
                            echo '<td>Estatus</td>';
                            echo '</tr>';
                            while ($row = mysqli_fetch_array($resultado)) {
                                echo '<tr>';
                                echo '<td>' . $row[0] . '</td>';
                                echo '<td>' . $row[1] . '</td>';
                                echo '<td>' . $row[2] . '</td>';
                                echo '<td>' . $row[3] . '</td>';
                                echo '<td>' . $row[4] . '</td>';
                                echo '</tr>';
                            }
                        } else {
                            echo'<h4>no hay Clientes</h4>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div>
            Consultar

        </div>
        <?php
        if ($user->getTipo_usuario() == 3) {
            ?>
            <div>
                Eliminar
                <div>
                    Eliminar Clientes
                    <div>
                        <form>
                            <table>
                                <tr>
                                    <td>Id Eliminar</td>
                                    <td><input type="text" name="txtEliminar" ></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><input type="submit" name="btnEliminar"></td>
                                </tr>
                            </table>
                        </form> 
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php
        if ($user->getTipo_usuario() == 1) {
            ?>
            <div>
                <h4>Mis Atenciones</h4>
                <div>
                    <?php
                    include 'class/DaoAtencion.php';
                    $dao = new DaoAtencion();
                    $resultado = $dao->listarAtencionCliente($user->getUsuario_id());
                    if ($resultado != null) {
                        echo '<table border="1">';
                        echo '<tr>';
                        echo '<td>Id</td>';
                        echo '<td>Estatus</td>';
                        echo '<td>Fecha</td>';
                        echo '<td>Hora</td>';
                        echo '<td>Cliente</td>';
                        echo '<td>Abogado</td>';
                        echo '</tr>';
                        while ($row = mysqli_fetch_array($resultado)) {
                            echo '<tr>';
                            echo '<td>' . $row[0] . '</td>';
                            echo '<td>' . $row[1] . '</td>';
                            echo '<td>' . $row[2] . '</td>';
                            echo '<td>' . $row[3] . '</td>';
                            echo '<td>' . $row[4] . '</td>';
                            echo '<td>' . $row[5] . '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo'<h4>no hay atenciones</h4>';
                    }
                    ?>
                </div>
            </div>
        <?php } ?>
    </body>
</html>
