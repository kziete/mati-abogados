<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once 'class/Cl_Usuario.php';
include_once 'class/DaoUsuario.php';
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Bufete Duralex</title>

        <!-- Bootstrap Core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css">

        <!-- Theme CSS -->
        <link href="css/agency.min.css" rel="stylesheet">

        <!-- jQuery -->
        <script src="vendor/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>

        <!-- Contact Form JavaScript -->
        <script src="js/jqBootstrapValidation.js"></script>
        <script src="js/contact_me.js"></script>

        <!-- Theme JavaScript -->
        <script src="js/agency.min.js"></script>
    </head>
    <header>
        <?php
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

        function menuCliente() {
            $user = $_SESSION['userid'];
            echo '<div>';
            echo '<ul>';
            echo '<li>';
            echo '<a href="cliente.php">Cliente</a>';
            echo '</li>';
            echo '<li>';
            echo '<a href="#">Usuario: ' . $user->getNombre_Completo() . '</a>';
            echo '</li>';
            echo '<li>';
            echo '<a href="Login.php">Logout</a>';
            echo '</li>';
            echo '</ul>';
            echo '</div>';
        }

        function menuGerente() {
            $user = $_SESSION['userid'];
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
            echo '<li>';
            echo '<a href="#">Usuario: ' . $user->getNombre_Completo() . '</a>';
            echo '</li>';
            echo '<li>';
            echo '<a href="Login.php">Logout</a>';
            echo '</li>';
            echo '</ul>';
            echo '</div>';
        }

        function menuSecretaria() {
            $user = $_SESSION['userid'];
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
            echo '<li>';
            echo '<a href="#">Usuario: ' . $user->getNombre_Completo() . '</a>';
            echo '</li>';
            echo '<li>';
            echo '<a href="Login.php">Logout</a>';
            echo '</li>';
            echo '</ul>';
            echo '</div>';
        }

        function menuAdministrador() {
            $user = $_SESSION['userid'];
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
            echo '<li>';
            echo '<a href="#">Usuario: ' . $user->getNombre_Completo() . '</a>';
            echo '</li>';
            echo '<li>';
            echo '<a href="Login.php">Logout</a>';
            echo '</li>';
            echo '</ul>';
            echo '</div>';
        }
        ?>
    </header>
</html>
