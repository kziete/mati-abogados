<!DOCTYPE html>
<?php
include_once '/class/Cl_Usuario.php';
include_once '/class/DaoUsuario.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Iniciar Sesión</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

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

    </head>
    <body>
        <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top affix-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand page-scroll" href="index.php">Bufete Duralex</a>
                </div>
            </div>
            <!-- /.container-fluid -->
        </nav>

        <header>
            <?php
            session_start();
            session_destroy();
            session_start();

            if (!isset($_SESSION['userid'])) {
                if (isset($_POST['login'])) {
                    $dao = new DaoUsuario();
                    $usuario = $dao->login($_POST['txtRut'], $_POST['txtPass']);
                    if ($usuario != null) {
                        $_SESSION['userid'] = $usuario;
                        header("location:index2.php");
                    } else {
                        echo '<div class="error">Su usuario es incorrecto, intente nuevamente.</div>';
                    }
                }
                ?>
                <div class="container">
                    <div class="intro-text" style="height: 700px;">
                        <h2>LOGIN</h2><br>
                        <div class="table">
                            <div class="col-lg-8 col-lg-offset-2">
                                <form method="post" action=""> 
                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 floating-label-form-group controls">
                                            <input type="text" class="form-control" placeholder="RUT" name="txtRut" required data-validation-required-message="Ingrese RUT">
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 floating-label-form-group controls">
                                            <input type="password" class="form-control" placeholder="PASSWORD" name="txtPass" required data-validation-required-message="Ingrese PASSWORD">
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>                        
                                    <br>
                                    <div class="col-md-8 text-left">
                                        <input type="submit" value="Login" class="btn btn-success btn-lg" name="login">
                                    </div>
                                    <div class="col-md-4">
                                        <a href="../web/CrearCliente" style="color: #286090;font-size: 20px;" >Registrate</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </header>
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




    </body></html>