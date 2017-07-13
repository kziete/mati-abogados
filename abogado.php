<?php
include_once './class/Cl_Usuario.php';
include_once './controlador/DaoAbogado.php';
include_once './class/DaoUsuario.php';

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
    if ($user->getTipo_usuario() == 3 || $user->getTipo_usuario() == 4 || $user->getTipo_usuario() == 5) {
        ?>
        <header>
            <body>
                <?php
                if ($user->getTipo_usuario() == 5) {
                    ?>
                    <div>
                        <center>
                            <div>
                                <h4>Contratar Abogado</h4>
                                <div>
                                    <form action="proceso.php" method="post">
                                        <table>
                                            <tr>
                                                <td>Usuario</td>
                                                <td>
                                                    <select name="txtId" class="btn-warning">
                                                        <?php
                                                        $var = new DaoUsuario();
                                                        $var = $var->listar();
                                                        while ($rows = mysqli_fetch_array($var)) {
                                                            ?>
                                                            <option value="<?php echo $rows[0] ?>"> <?php echo $rows[3]; ?></option>   
                                                            <?php
                                                        }
                                                        ?>
                                                    </select> 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Especialidad:</td>
                                                <td><input type="text" name="txtEspecialidad" required="" class="btn-warning"></td>
                                            </tr>
                                            <tr>
                                                <td>Valor Hora:</td>
                                                <td><input type="number" name="txtValorHora" required="" class="btn-warning"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><input type="submit" name="abogado" value="Guardar" class="btn-warning"></td>
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
                                <h4>Listar Abogado</h4>
                                <div>
                                    <table>
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
                                    </table>
                                </div>
                            </div>
                        </center>
                    </div>
                    <div>
                    <?php } ?>
                    <?php
                    if ($user->getTipo_usuario() == 3 || $user->getTipo_usuario() == 4 || $user->getTipo_usuario() == 5) {
                        ?>
                        <center>
                            <div>
                                <h4>Consultar Abogado</h4>
                                <div>
                                    <form action="proceso.php" method="post">
                                        <table>
                                            <tr>
                                                <td>Id Abogado</td>
                                                <td><input type="text" name="txtConsultar" class="btn-warning"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><input type="submit" name="abogado" value="Consultar" class="btn-warning"></td>
                                            </tr>
                                        </table>
                                    </form> 
                                </div>
                            </div>
                        </center>
                    </div>
                <?php } ?>
                <?php
                if ($user->getTipo_usuario() == 5) {
                    ?>
                    <div>
                        <center>
                            <div>
                                <h4>Eliminar Abogado</h4>
                                <div>
                                    <form action="proceso.php" method="post">
                                        <table>
                                            <tr>
                                                <td>Id Eliminar</td>
                                                <td><input type="text" name="txtEliminar" class="btn-warning"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><input type="submit" name="abogado" value="Eliminar" class="btn-warning"></td>
                                            </tr>
                                        </table>
                                    </form> 
                                </div>
                            </div>
                        </center>
                    </div>
                <?php } ?>
                <?php
                if ($user->getTipo_usuario() == 5) {
                    ?>
                    <div>
                        <center>
                            <div>
                                <h4>Despedir Abogado</h4>
                                <div>
                                    <form action="proceso.php" method="post">
                                        <table>
                                            <tr>
                                                <td>Id Despedir</td>
                                                <td><input type="text" name="txtDespedir" class="btn-warning"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><input type="submit" name="abogado" value="Despedir" class="btn-warning"></td>
                                            </tr>
                                        </table>
                                    </form> 
                                </div>
                            </div>
                        </center>
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
