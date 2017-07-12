<?php
include_once './class/Cl_Usuario.php';
include_once './class/DaoAtencion.php';
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
        if ($user->getTipo_usuario() == 4) {
            ?>
            <div>
                agregar
                <div>
                    Agregar Atencion
                    <div>
                        <form>
                            <table>
                                <tr>
                                    <td>Hora:</td>
                                    <td><input type="number" name="txtHora"></td>
                                </tr>
                                <tr>
                                    <td>Cliente Id:</td>
                                    <td><input type="number" name="txtCliente"></td>
                                </tr>
                                <tr>
                                    <td>Abogado Id:</td>
                                    <td><input type="number" name="txtAbogado"></td>
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
                listar
                <div>
                    <h4>Listar Atencion</h4>
                    <div>
                        <?php
                        $dao = new DaoAtencion();
                        $resultado = $dao->listar();
                        if ($resultado != null) {
                            echo '<table border="1">';
                            echo '<tr>';
                            echo '<td>Id:</td>';
                            echo '<td>Estatus:</td>';
                            echo '<td>Fecha:</td>';
                            echo '<td>Hora:</td>';
                            echo '<td>Cliente Id:</td>';
                            echo '<td>Abogado Id</td>';
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
                            echo'<h4>no hay Atenciones</h4>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div>
            <?php } ?>
            <?php
            if ($user->getTipo_usuario() == 3 || $user->getTipo_usuario() == 4 || $user->getTipo_usuario() == 5) {
                ?>
                buscar
                <div>
                    <h4>Consultar Atencion</h4>
                    <div>
                        <form>
                            <table>
                                <tr>
                                    <td>Id Atencion</td>
                                    <td><input type="text" name="txtConsultar" ></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><input type="submit" name="btnConsultar"></td>
                                </tr>
                            </table>
                        </form> 
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php
        if ($user->getTipo_usuario() == 4) {
            ?>
            <div>
                eliminar
                <div>
                    <h4>Eliminar Atencion</h4>
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
        if ($user->getTipo_usuario() == 4) {
            ?>
            <div>
                update
                <div>
                    <h4>Cambiar Atencion</h4>
                    <div>
                        <form>
                            <table>
                                <tr>
                                    <td>Id Atencion</td>
                                    <td><input type="text" name="txtId"></td>
                                </tr>
                                <tr>
                                    <td>Estado Atencion</td>
                                    <td><input type="text" name="txtAtencion" ></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><input type="submit" name="btnCambiar"></td>
                                </tr>
                            </table>
                        </form> 
                    </div>
                </div>
            </div>
        <?php } ?>
    </body>
</html>
