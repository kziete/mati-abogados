<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once '/class/Cl_Usuario.php';
include_once '/class/DaoUsuario.php';
?>
<html>
    <header>
        <?php

        function menuCliente() {
            echo '<div>';
            echo '<ul>';
            echo '<li>';
            echo '<a href="atencion.php">Atenciones</a>';
            echo '</li>';
            echo '</ul>';
            echo '</div>';
        }
        
        function menuGerente(){
             echo '<div>';
            echo '<ul>';
            echo '<li>';
            echo '<a href="cliente.php">Cliente</a>';
            echo '</li>';
            echo '<li>';
            echo '<a href="abogado.php">Abogado</a>';
            echo '</li>';
            echo '<li>';
            echo '<a href="atencion.php">Atenciones</a>';
            echo '</li>';
            echo '</ul>';
            echo '</div>';
        }
        
        function menuSecretaria() {
            echo '<div>';
            echo '<ul>';
            echo '<li>';
            echo '<a href="cliente.php">Cliente</a>';
            echo '</li>';
            echo '<li>';
            echo '<a href="abogado.php">Abogado</a>';
            echo '</li>';
            echo '<li>';
            echo '<a href="atencion.php">Atenciones</a>';
            echo '</li>';
            echo '</ul>';
            echo '</div>';
        }
        
        function menuAdministrador(){
            echo '<div>';
            echo '<ul>';
            echo '<li>';
            echo '<a href="cliente.php">Cliente</a>';
            echo '</li>';
            echo '<li>';
            echo '<a href="abogado.php">Abogado</a>';
            echo '</li>';
            echo '<li>';
            echo '<a href="usuario.php">Usuario</a>';
            echo '</li>';
            echo '</ul>';
            echo '</div>';
        }
        
        session_start();
        if (!isset($_SESSION['userid'])) {
            header("location:Login.php");
        } else {
            $user = new Cl_Usuario;
            $user = $_SESSION['userid'];

            switch ($user->getTipo_usuario()) {
                case 1:
                    menuCliente();
                    break;
                case 3:
                    menuGerente();
                    break;
                case 4:
                    menuSecretaria();
                    break;
                case 5:
                    menuAdministrador();
                    break;
            }
        }
        ?>
    </header>
</html>
