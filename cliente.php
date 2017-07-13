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
    if ($user->getTipo_usuario() == 1 || $user->getTipo_usuario() == 3 || $user->getTipo_usuario() == 4 || $user->getTipo_usuario() == 5) {
        ?>
        <header>
            <body>
                <?php
                if ($user->getTipo_usuario() == 5) {
                    ?>
                    <div>
                        <center>
                            <div>
                                <h4>Agregar Cliente</h4>
                                <div>
                                    <form action="proceso.php" method="post">
                                        <table>
                                            <tr>
                                                <td>Tipo Persona:</td>
                                                <td><input type="text" name="txtTipoPersona" required="" class="btn-warning"></td>
                                            </tr>
                                            <tr>
                                                <td>Direccion:</td>
                                                <td><input type="text" name="txtDireccion" required="" class="btn-warning"></td>
                                            </tr>
                                            <tr>
                                                <td>Telefono:</td>
                                                <td><input type="number" name="txtTelefono" required="" class="btn-warning"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><input type="submit" name="cliente" value="Guardar" class="btn-warning"></td>
                                            </tr>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </center>
                    </div>
                <?php } ?>
                <?php
                if ($user->getTipo_usuario() == 3 || $user->getTipo_usuario() == 4 || $user->getTipo_usuario() == 5) {
                    ?>
                    <div>
                        <center>
                            <div>
                                <h4>Listar Clientes</h4>
                                <div>
                                    <table>
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
                                                $var = base64_decode($row[2]);
                                                echo '<tr>';
                                                echo '<td>' . $row[0] . '</td>';
                                                echo '<td>' . $row[1] . '</td>';
                                                echo '<td>' . $var . '</td>';
                                                echo '<td>' . $row[3] . '</td>';
                                                echo '<td>' . $row[4] . '</td>';
                                                echo '</tr>';
                                            }
                                        } else {
                                            echo'<h4>no hay Clientes</h4>';
                                        }
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </center>
                    </div>
                <?php } ?>
                <div>
                    Consultar

                </div>
                <?php
                if ($user->getTipo_usuario() == 5) {
                    ?>
                    <div>
                        <center>
                            <div>
                                <h4>Eliminar Clientes</h4>
                                <div>
                                    <form action="proceso.php" method="post">
                                        <table>
                                            <tr>
                                                <td>Id Eliminar</td>
                                                <td><input type="text" name="txtEliminar" required="" class="btn-warning"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><input type="submit" name="cliente" value="Eliminar" class="btn-warning"></td>
                                            </tr>
                                        </table>
                                    </form> 
                                </div>
                            </div>
                        </center>
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
        </header>
        <?php
    } else {
        header("location:Login.php");
    }
    ?>
</html>
