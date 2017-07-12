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
                    Contratar Abogado
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
</html>
