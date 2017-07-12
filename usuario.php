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
            include_once './class/DaoUsuario.php';
        ?>
    <body>
        <?php
        // put your code here
        ?>
        <div>
            <div>
                agregar
                <div>
                    Agregar Cliente
                    <div>
                        <form>
                            <table>
                                <tr>
                                    <td>Rut:</td>
                                    <td><input type="text" name="txtRut"></td>
                                </tr>
                                <tr>
                                    <td>Password:</td>
                                    <td><input type="password" name="txtPassword"></td>
                                </tr>
                                <tr>
                                    <td>Nombre Completo:</td>
                                    <td><input type="text" name="txtNombre"></td>
                                </tr>
                                <tr>
                                    <td>Tipo Usuario</td>
                                    <td>
                                        <select name="cboPelicula">
                                            <option value="" selected="">Elige</option>
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
                                    <td colspan="2"><input type="submit" name="btnGuardar"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
