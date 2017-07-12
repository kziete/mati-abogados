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
    <header>
        <body>
            <?php
            if ($user->getTipo_usuario() == 4) {
                ?>
                <div>
                    <center>
                        <div>
                            Agregar Atencion
                            <div>
                                <form action="proceso.php" method="post">
                                    <table>
                                        <tr>
                                            <td>Hora:</td>
                                            <td><input type="number" name="txtHora" max="24" required="" class="btn-warning"></td>
                                        </tr>
                                        <tr>
                                            <td>Cliente:</td>
                                            <td>
                                                <select name="txtCliente" class="btn-warning">
                                                    <?php
                                                    $var = new DaoAtencion();
                                                    $var = $var->listar_cliente();
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
                                            <td>Abogado</td>
                                            <td>
                                                <select name="txtAbogado" class="btn-warning">
                                                    <?php
                                                    $var = new DaoAtencion();
                                                    $var = $var->listar_abogado();
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
                                            <td colspan="2"><input type="submit" name="atencion" value="Guardar" class="btn-warning"></td>
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
                            <h4>Listar Atencion</h4>
                            <div>
                                <table>
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
                                </table>
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
                            <h4>Consultar Atencion</h4>
                            <div>
                                <form action="proceso.php" method="post">
                                    <table>
                                        <tr>
                                            <td>Id Atencion</td>
                                            <td><input type="number" name="txtConsultar" class="btn-warning"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><input type="submit" name="atencion" value="Consultar" class="btn-warning"></td>
                                        </tr>
                                    </table>
                                </form> 
                            </div>
                        </div>
                    </center>
                </div>
            <?php } ?>
            <?php
            if ($user->getTipo_usuario() == 4) {
                ?>
                <div>
                    <center>
                        <div>
                            <h4>Eliminar Atencion</h4>
                            <div>
                                <form action="proceso.php" method="post">
                                    <table>
                                        <tr>
                                            <td>Id Eliminar</td>
                                            <td><input type="number" name="txtEliminar" class="btn-warning" required=""></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><input type="submit" name="atencion" value="Eliminar" class="btn-warning"></td>
                                        </tr>
                                    </table>
                                </form> 
                            </div>
                        </div>
                    </center>
                </div>
            <?php } ?>
            <?php
            if ($user->getTipo_usuario() == 4) {
                ?>
                <div>
                    <center>
                        <div>
                            <h4>Cambiar Atencion</h4>
                            <div>
                                <form action="proceso.php" method="post">
                                    <table>
                                        <tr>
                                            <td>Id Atencion</td>
                                            <td><input type="number" name="txtId" required="" class="btn-warning"></td>
                                        </tr>
                                        <tr>
                                            <td>Estado Atencion</td>
                                            <td><input type="text" name="txtAtencion" required="" class="btn-warning"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><input type="submit" name="atencion" value="Cambiar" class="btn-warning"></td>
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
</html>
