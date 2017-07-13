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

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js" integrity="sha384-0s5Pv64cNZJieYFkXYOTId2HMA2Lfb6q2nAcx2n0RTLUnCAoTTsS0nKEO27XyKcY" crossorigin="anonymous"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js" integrity="sha384-ZoaMbDF+4LeFxg6WdScQ9nnR1QC2MIRxA1O9KWEXQwns1G8UNyIEZIQidzb0T1fo" crossorigin="anonymous"></script>
        <![endif]-->

    </head>

    <body id="page-top" class="index">

        <!-- Navigation -->
        <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top affix-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand page-scroll" href="#page-top">Bufete Duralex</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden active">
                            <a href="#page-top"></a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#services">Servicios</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#team">Quienes Somos</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#contact">Contacto</a>
                        </li>
                        <?php
                        session_start();
                        if (!isset($_SESSION['userid'])) {
                            ?>
                            <li>
                                <a class="page-scroll" href="Login.php">Iniciar sesión</a>
                            </li>
                        <?php
                        } else {
                            $var = new Cl_Usuario();
                            $var = $_SESSION['userid'];
                            ?>
                            <li>
                                <a href="index2.php"><?php echo $var->getNombre_completo() ?></a>
                            </li>
                            <li>
                                <a class="page-scroll" href="Login.php">Logout</a>
                            </li>     
<?php } ?>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
        <!-- Header -->
        <header>
            <div class="container">
                <div class="intro-text">
                    <div class="intro-lead-in">Este es el buffet numero uno...</div>
                    <div class="intro-heading">de la televisión humoristica!</div>
                </div>
            </div>
        </header>

        <!-- Services Section -->
        <section id="services">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">Servicios</h2>
                        <h3 class="section-subheading text-muted">Asesoría legal en todo contexto.</h3>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                            <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="service-heading">Comercio-Negocio</h4>
                        <p class="text-muted">Asesoría de calidad llevada a legalidades de negocio y comercio dentro del estado Chileno.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                            <i class="fa fa-laptop fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="service-heading">Civil-Laboral</h4>
                        <p class="text-muted">Desde cumplimiento de contrato hasta despidos injustificados.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                            <i class="fa fa-lock fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="service-heading">Penal</h4>
                        <p class="text-muted">Formalizaciones, Medidas cautelares, Querellas y defensas hasta Juicios Orales.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Team Section -->
        <section id="team" class="bg-light-gray">
            <div class="container">
                <div class="row" >
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">Quienes Somos</h2>
                        <h3 class="section-subheading text-muted">Estos son los abogados fundadores de nuestro buffete</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="team-member">
                            <img src="img/Jimmy_-_BCS_T2.png"  class="img-responsive img-circle col-lg-12" style="align-content: center" alt=""/>
                            <h4>Jimmy McGuill</h4>
                            <p class="text-muted">Abogado especializado en testamento de ancianos</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="team-member">
                                <img src="img/Jimmy_-_BCS_T2.png"  class="img-responsive img-circle col-lg-12" style="align-content: center" alt=""/>
                                <h4>Saul Goodman</h4>
                                <p class="text-muted">Abogado personal de Walter White</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="team-member">
                                    <img src="img/Jimmy_-_BCS_T2.png"  class="img-responsive img-circle col-lg-12" style="align-content: center" alt=""/>
                                    <h4>Saul buen Hombre</h4>
                                    <p class="text-muted">El hermano gemelo (?)</p>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 text-center">
                        <p class="large text-muted">Esta es una breve descripción de quienes somos, la fundación de el buffete, tiempo que lleva, visión, misión.. etc.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">Contactanos</h2>
                        <h3 class="section-subheading text-muted">Cualquier duda o consulta sobre algún caso, hacedlo saber</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <form name="sentMessage" id="contactForm" novalidate="">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Your Name *" id="name" required="" data-validation-required-message="Please enter your name.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Your Email *" id="email" required="" data-validation-required-message="Please enter your email address.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <input type="tel" class="form-control" placeholder="Your Phone *" id="phone" required="" data-validation-required-message="Please enter your phone number.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <textarea class="form-control" placeholder="Your Message *" id="message" required="" data-validation-required-message="Please enter a message."></textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-lg-12 text-center">
                                    <div id="success"></div>
                                    <button type="submit" class="btn btn-xl">Enviar Mensaje</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>




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