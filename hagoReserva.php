<!DOCTYPE HTML>
<!--Pagina que inserta las reservas en la base de datos-->
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

                        <?php
//recojo los datos del formulario
                        error_reporting(E_ALL ^ E_NOTICE);
                        session_start();

                        $producto = $_POST["producto"];
                        $email = $_POST["email"];
                        $cliente = $_POST["cliente"];
                        $fecha = date(" Y-m-d ");

                        $servername = "localhost";
                        $username = "phpmyadmin";
                        $password = "root";
                        $dbname = "proyecto";


                        $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
                        if ($conn->connect_error) {
                            die("Error de conexion: ");
                        }
//Compruebo que el usuario que realiza la reserva es válido. Solo permite usuario registrados
                        if ($resultado = mysqli_query($conn, "SELECT * FROM usuario where email='$email'")) {

                            if (mysqli_num_rows($resultado) == 1) {


// Create connection
                                $conn1 = new mysqli($servername, $username, $password, $dbname);
// Check connection
                                if ($conn1->connect_error) {
                                    die("Error de conexion: ");
                                }
//inserta en la base de datos la reserva con estado inicial
                                $sql1 = "INSERT INTO reservas (producto,cliente,fecha, email, estado) "
                                        . "VALUES ('$producto','$cliente','$fecha', '$email', 'inicial')";

//avisamos de que se ha realizado y redireccionamos
                                if ($conn1->multi_query($sql1) === TRUE) {
                                    echo "<h1>RESERVA REALIZADA CORRECTAMENTE</h1>"
                                    . "<p>Usted sera redirigido en 5 segundos.</p>";
                                    header("refresh:5;url=index.php");

                                    // Create connection
                                    $conn2 = new mysqli($servername, $username, $password, $dbname);
// Check connection
                                    if ($conn2->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }

                                    $sql2 = "UPDATE producto SET stock = IFNULL(stock,0) - 1 where codigo='$producto'";


                                    if ($conn2->multi_query($sql2) === FALSE) {
                                        echo "Se ha producido un error con la venta";
                                    }

                                    $conn2->close();
                                } else {
                                    echo "El usuario no existe o no es válido. Por favor, registrese o vuelva a intentarlo.";
                                    echo "Error: " . $sql1 . "<br>" . $conn1->error;
                                }

                                $conn1->close();
                            }
                            echo "El usuario no existe o no es válido. Por favor, registrese o vuelva a intentarlo.";
                        } else {

                            echo "El usuario no existe o no es válido. Por favor, registrese o vuelva a intentarlo.";
                        }
                        /* liberar el conjunto de resultados */
                        mysqli_free_result($resultado);
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