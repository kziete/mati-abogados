<?php
include_once './class/Cl_Usuario.php';
include_once './controlador/DaoAbogado.php';
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
        if ($user->getTipo_usuario() == 5) {
            ?>
            <div>
                agregar
                <div>
                    Contratar Abogado
                    <div>
                        <form>
                            <table>
                                <tr>
                                    <td>Especialidad:</td>
                                    <td><input type="text" name="txtEspecialidad"></td>
                                </tr>
                                <tr>
                                    <td>Valor Hora:</td>
                                    <td><input type="number" name="txtValorHora"></td>
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
                    <h4>Listar Abogado</h4>
                    <div>
                        <?php
                        $dao = new DaoAbogado();
                        $resultado = $dao->listar();
                        if ($resultado != null) {
                            echo '<table border="1">';
                            echo '<tr>';
                            echo '<td>Id:</td>';
                            echo '<td>Especialida:</td>';
                            echo '<td>Valor Hora:</td>';
                            echo '<td>Estatus:</td>';
                            echo '</tr>';
                            while ($row = mysqli_fetch_array($resultado)) {
                                echo '<tr>';
                                echo '<td>' . $row[0] . '</td>';
                                echo '<td>' . $row[1] . '</td>';
                                echo '<td>' . $row[2] . '</td>';
                                echo '<td>' . $row[3] . '</td>';
                                echo '</tr>';
                            }
                        } else {
                            echo'<h4>no hay Abogados</h4>';
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
                    <h4>Consultar Abogado</h4>
                    <div>
                        <form>
                            <table>
                                <tr>
                                    <td>Id Abogado</td>
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
        if ($user->getTipo_usuario() == 5) {
            ?>
            <div>
                eliminar
                <div>
                    <h4>Eliminar Abogado</h4>
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
        if ($user->getTipo_usuario() == 5) {
            ?>
            <div>
                update
                <div>
                    <h4>Despedir Abogado</h4>
                    <div>
                        <form>
                            <table>
                                <tr>
                                    <td>Id Despedir</td>
                                    <td><input type="text" name="txtDespedir" ></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><input type="submit" name="btnDespedir"></td>
                                </tr>
                            </table>
                        </form> 
                    </div>
                </div>
            </div>
        <?php } ?>
    </body>
</html>
