<?php
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
    ?>
    <header>
        <body id="page-top" class="index">
            <?php
            // put your code here
            ?>
            <div>
                <div class="container">
                    <center>
                        <div class="row">
                            Agregar Usuario
                            <div>
                                <form action="proceso.php" method="post">
                                    <table>
                                        <tr>
                                            <td>Rut:</td>
                                            <td><input type="text" name="txtRut" required="" class="btn-warning"></td>
                                            <td>-</td>
                                            <td><input type="text" name="txtVer" required="" class="btn-warning"></td>
                                        </tr>
                                        <tr>
                                            <td>Password:</td>
                                            <td><input type="password" name="txtPassword" required="" class="btn-warning"></td>
                                        </tr>
                                        <tr>
                                            <td>Nombre Completo:</td>
                                            <td><input type="text" name="txtNombre" required="" class="btn-warning"></td>
                                        </tr>
                                        <tr>
                                            <td>Tipo Usuario</td>
                                            <td>
                                                <select name="cboTipoUsuario" class="btn-warning">
                                                    <?php
                                                    $var = new DaoUsuario();
                                                    $var = $var->listar_tipUsuario();
                                                    while ($rows = mysqli_fetch_array($var)) {
                                                        ?>
                                                        <option value="<?php echo $rows[0] ?>"> <?php echo $rows[1]; ?></option>   
                                                        <?php
                                                    }
                                                    ?>
                                                </select> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><input class="btn-warning" type="submit" name="usuario" value="Guardar"></td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </center>
                </div>
                <?php
                if ($user->getTipo_usuario() == 5) {
                    ?>
                    <div>
                        <center>
                            <div>
                                <h4>Listar Usuario</h4>
                                <div>
                                    <table>
                                        <?php
                                        include 'controlador/DaoCliente.php';
                                        $dao = new DaoUsuario();
                                        $resultado = $dao->listar();
                                        if ($resultado != null) {
                                            echo '<table border="1">';
                                            echo '<tr>';
                                            echo '<td>Id</td>';
                                            echo '<td>Rut</td>';
                                            echo '<td>Password</td>';
                                            echo '<td>Nombre Completo</td>';
                                            echo '<td>Fecha Registro</td>';
                                            echo '<td>Tipo Usuario</td>';
                                            echo '</tr>';
                                            while ($row = mysqli_fetch_array($resultado)) {
                                                $hash = password_hash($row[2], PASSWORD_DEFAULT);
                                                echo '<tr>';
                                                echo '<td>' . $row[0] . '</td>';
                                                echo '<td>' . $row[1] . '</td>';
                                                echo '<td>' . $hash . '</td>';
                                                echo '<td>' . $row[3] . '</td>';
                                                echo '<td>' . $row[4] . '</td>';
                                                echo '<td>' . $row[5] . '</td>';
                                                echo '</tr>';
                                            }
                                        } else {
                                            echo'<h4>no hay Usuarios</h4>';
                                        }
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </center>
                    </div>
                <?php } ?>
                <?php
                if ($user->getTipo_usuario() == 5) {
                    ?>
                    <center>
                        <div>
                            <h4>Consultar Abogado</h4>
                            <div>
                                <form action="proceso.php" method="post">
                                    <table>
                                        <tr>
                                            <td>Id Usuario</td>
                                            <td><input type="text" name="txtConsultar" class="btn-warning"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><input type="submit" name="usuario" value="Consultar" class="btn-warning"></td>
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
                            <h4>Eliminar Usuario</h4>
                            <div>
                                <form action="proceso.php" method="post">
                                    <table>
                                        <tr>
                                            <td>Rut Eliminar</td>
                                            <td><input type="text" name="txtEliminar" required="" class="btn-warning"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><input type="submit" name="usuario" value="Eliminar" class="btn-warning"></td>
                                        </tr>
                                    </table>
                                </form> 
                            </div>
                        </div>
                    </center>
                </div>
            <?php } ?>
            </div>
        </body>
    </header>
</html>
