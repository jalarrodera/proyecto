<!DOCTYPE HTML>
<!--Página que inserta los mensajes en la base de datos-->
<html>
    <head>
        <meta charset="utf-8">
        <title>Bicibytes</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="scripts/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="scripts/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="scripts/icons/general/stylesheets/general_foundicons.css" media="screen" rel="stylesheet" type="text/css" />  
        <link href="scripts/icons/social/stylesheets/social_foundicons.css" media="screen" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="scripts/fontawesome/css/font-awesome.min.css">
        <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Palatino+Linotype" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Abel" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">

        <link href="styles/custom.css" rel="stylesheet" type="text/css" />
        <script src="email/validation.js" type="text/javascript"></script>
    </head>
    <body id="pageBody">

        <div id="decorative2">
            <div class="container">

                <div class="divPanel topArea notop nobottom">
                    <div class="row-fluid">
                        <div class="span12">

                            <div id="divLogo" class="pull-left">
                                <a href="index.php" id="divSiteTitle">Bicibytes</a><br />
                                <a href="index.php" id="divTagLine">Tu tienda de ciclismo</a>
                            </div>

                            <div id="divMenuRight" class="pull-right">
                                <div class="navbar">
                                    <button type="button" class="btn btn-navbar-highlight btn-large btn-primary" data-toggle="collapse" data-target=".nav-collapse">
                                        NAVIGATION <span class="icon-chevron-down icon-white"></span>
                                    </button>
                                    <div class="nav-collapse collapse">
                                        <ul class="nav nav-pills ddmenu">
                                         <li class="dropdown active"><a href="index.php">Inicio</a></li>
                                            <li class="dropdown"><a href="about.php">Quienes somos</a></li>
                                            <li class="dropdown">
                                                <a href="index.php" class="dropdown-toggle">Tienda <b class="caret"></b></a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="compras.php?tienda=ropa">Ropa</a></li>
                                                    <li><a href="compras.php?tienda=herramientas">Herramientas</a></li>
                                                    <li><a href="compras.php?tienda=componentes">Componentes</a></li>
                                                    <li><a href="compras.php?tienda=casco">Cascos</a></li>
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle">Bicicletas &nbsp;&raquo;</a>
                                                        <ul class="dropdown-menu sub-menu">
                                                            <li><a href="compras.php?tienda=carretera">Bicicletas de carretera</a></li>
                                                            <li><a href="compras.php?tienda=montana">Bicicletas de montaña</a></li>
                                                            <li><a href="compras.php?tienda=bmx">BMX</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="dropdown"><a href="plantilla.php">Nuestro equipo</a></li>
                                            <li class="dropdown"><a href="contact.php">Contacto</a></li>
                                            <li class="dropdown"><a href="acceso.php">Nuestro club</a></li>
                                        </ul>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div id="contentOuterSeparator"></div>

        <div class="container">

            <div class="divPanel page-content">

                <div class="breadcrumbs">
                    <a href="index.php">Inicio</a> &nbsp;/&nbsp; <span>Contacta con nosotros</span>
                </div> 

                <div class="row-fluid">
                    <div class="span8" id="divMain">
                        <h1>Contacta con nosotros</h1>

                        <hr>

                        <?php
//Recogemos los datos que nos vienen del formulario y los insertamos en la base de datos. Se insertaran como NO leidos
                        $nombre = $_POST["nombre"];
                        $telefono = $_POST["telefono"];
                        $email = $_POST["email"];
                        $mensaje = $_POST["mensaje"];
                        $leido = 'no';
                        $servername = "localhost";
                        $username = "phpmyadmin";
                        $password = "root";
                        $dbname = "proyecto";

// Create connection
                        $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "INSERT INTO mensaje (nombre,telefono, email, mensaje, leido) "
                                . "VALUES ('$nombre','$telefono','$email','$mensaje', '$leido')";


                        if ($conn->multi_query($sql) === TRUE) {
                            echo "<b>Su mensaje ha sido enviado</b></br>";
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }

                        $conn->close();
                        ?>


                    </div>


                </div>			

                <div id="footerInnerSeparator"></div>
            </div>

        </div>

        <div id="footerOuterSeparator"></div>

        <div id="divFooter" class="footerArea">

            <div class="container">

                <div class="divPanel">

                    <div class="row-fluid">
                        <div class="span3" id="footerArea1">

                            <h3>Sobre nosotros</h3>

                            <p>Tienda especializada en ciclismo fundada hace más de una década.</p>

                            <p> 
                                <a href="#" title="Terms of Use">Terms of Use</a><br />
                                <a href="#" title="Privacy Policy">Privacy Policy</a><br />
                                <a href="#" title="FAQ">FAQ</a><br />
                                <a href="#" title="Sitemap">Sitemap</a>
                            </p>

                        </div>

                        <div class="span3" id="footerArea4">

                            <h3>Contacta con nosotros:</h3>  

                            <ul id="contact-info">
                                <li>                                    
                                    <i class="general foundicon-phone icon"></i>
                                    <span class="field">Teléfono:</span>
                                    <br />
                                    976 000 000 / 600 000 000                                                                      
                                </li>
                                <li>
                                    <i class="general foundicon-mail icon"></i>
                                    <span class="field">Email:</span>
                                    <br />
                                    <a href="mailto:bicibytes@gmail.com" title="Email">bicibytes@gmail.com</a>
                                </li>
                                <li>
                                    <i class="general foundicon-home icon" style="margin-bottom:50px"></i>
                                    <span class="field">Address:</span>
                                    <br />
                                    Calle Proyecto de los Enlaces, 1<br />
                                    50018 Zaragoza <br />
                                    España
                                </li>
                            </ul>

                        </div>
                    </div>

                    <br /><br />
                    <div class="row-fluid">
                        <div class="span12">
                            <p class="copyright">
                                Copyright © 2017 Bicibytes. All Rights Reserved.
                            </p>

                            <p class="social_bookmarks">
                                <a href="#"><i class="social foundicon-facebook"></i> Facebook</a>
                                <a href=""><i class="social foundicon-twitter"></i> Twitter</a>
                                <a href="#"><i class="social foundicon-pinterest"></i> Pinterest</a>
                                <a href="#"><i class="social foundicon-rss"></i> Rss</a>
                            </p>
                        </div>
                    </div>
                    <br />

                </div>

            </div>

        </div>

        <script src="scripts/jquery.min.js" type="text/javascript"></script> 
        <script src="scripts/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/default.js" type="text/javascript"></script>





    </body>
</html>



