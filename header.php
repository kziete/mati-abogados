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
        <div>
            <ul>
                <li>
                    <a href="#">Agregar</a>
                </li>
                <li>
                    <a href="#">Listar</a>
                </li>
                <li>
                    <a href="#">Eliminar</a>
                </li>
                <?php
                session_start();
                if (!isset($_SESSION['userid'])) {
                    header("location:Login.php");
                } else {
                    $user = new Cl_Usuario;
                    $user =$_SESSION['userid'];
                    ?>
                    <li>
                        <a href="#"><?php echo $user->getNombre_completo() ; ?></a>
                    </li>
                    <li>
                        <a href="Login.php">Logout</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </header>
</html>
