<!--Pagina que inserta salidas en la base de datos-->
<?php
session_start(); //Iniciamos la Sesion o la Continuamos
if (isset($_SESSION['usuario'])) {
//recojo los datos del formulario
    $fecha = $_POST['fecha'];
    $salida = $_POST['salida'];
    $kilometros = $_POST['kilometros'];
    $comentarios = $_POST['comentarios'];


    $servername = "localhost";
    $username = "phpmyadmin";
    $password = "root";
    $dbname = "proyecto";

// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
//inserto la salida en la base de datos
    $sql = "INSERT INTO salidas (salida,kilometros,comentarios, fecha) "
            . "VALUES ('$salida','$kilometros','$comentarios','$fecha')";


    if ($conn->multi_query($sql) === TRUE) {
        ?>
        <html>
            <head>
                <meta charset="utf-8">
                <title>Bicibytes</title>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta name="description" content="">
                <meta name="author" content="Jesus Larrodera">  
                <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW"> <!-- Remove this Robots Meta Tag, to allow indexing of site -->

                <link href="scripts/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                <link href="scripts/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
                <link href="scripts/icons/general/stylesheets/general_foundicons.css" media="screen" rel="stylesheet" type="text/css" />  
                <link href="scripts/icons/social/stylesheets/social_foundicons.css" media="screen" rel="stylesheet" type="text/css" />

                <link rel="stylesheet" href="scripts/fontawesome/css/font-awesome.min.css">

                <link href="scripts/carousel/style.css" rel="stylesheet" type="text/css" />

                <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet" type="text/css">
                <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
                <link href="http://fonts.googleapis.com/css?family=Palatino+Linotype" rel="stylesheet" type="text/css">
                <link href="http://fonts.googleapis.com/css?family=Abel" rel="stylesheet" type="text/css">
                <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">

                <link href="styles/custom.css" rel="stylesheet" type="text/css" />
            </head>
            <body id="pageBody">

                <div id="decorative2">
                    <div class="container">

                        <div class="divPanel topArea notop nobottom">
                            <div class="row-fluid">
                                <div class="span12">

                                    <div id="divLogo" class="pull-left">
                                        <a href="admin.php" id="divSiteTitle">Bicibytes</a><br />
                                        <a href="admin.php" id="divTagLine">Tu tienda de ciclismo</a>
                                    </div>
                                    <div id="divMenuRight" class="pull-right">
                                        <div class="navbar">
                                            <button type="button" class="btn btn-navbar-highlight btn-large btn-primary" data-toggle="collapse" data-target=".nav-collapse">
                                                NAVIGATION <span class="icon-chevron-down icon-white"></span>
                                            </button>
                                            <div class="nav-collapse collapse">
                                                <ul class="nav nav-pills ddmenu">
                                                    <li class="dropdown"><a href="leer.php">Mensajes</a></li>
                                                    <li class="dropdown"><a href="historico.php">Histórico de mensajes</a></li>
                                                </ul>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="container">

                    <div class="divPanel page-content">

                        <!--Aviso de que la inserccion ha sido correcta y redirecciono-->
                        <div class="row-fluid">
                            <h1>Datos insertados correctamente</h1>
                            <h4>La página se redirigirá tras 5 segundos ...</h4>
                            <div class="span8" id="divMain">

        <?php
        header("refresh:5;url=admin.php");
        ?>
                            </div>

                        </div>

                        <div id="footerInnerSeparator"></div>
                    </div>

                </div>


                <script src="scripts/jquery.min.js" type="text/javascript"></script> 
                <script src="scripts/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
                <script src="scripts/default.js" type="text/javascript"></script>


                <script type="text/javascript">$('.ttip').tooltip();</script>

            </body>
        </html>

        <?php
    } else {
        ?>
        <html>
            <head>
                <meta charset="utf-8">
                <title>Bicibytes</title>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta name="description" content="">
                <meta name="author" content="Jesus Larrodera">  
                <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW"> <!-- Remove this Robots Meta Tag, to allow indexing of site -->

                <link href="scripts/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                <link href="scripts/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
                <link href="scripts/icons/general/stylesheets/general_foundicons.css" media="screen" rel="stylesheet" type="text/css" />  
                <link href="scripts/icons/social/stylesheets/social_foundicons.css" media="screen" rel="stylesheet" type="text/css" />

                <link rel="stylesheet" href="scripts/fontawesome/css/font-awesome.min.css">

                <link href="scripts/carousel/style.css" rel="stylesheet" type="text/css" />

                <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet" type="text/css">
                <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
                <link href="http://fonts.googleapis.com/css?family=Palatino+Linotype" rel="stylesheet" type="text/css">
                <link href="http://fonts.googleapis.com/css?family=Abel" rel="stylesheet" type="text/css">
                <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">

                <link href="styles/custom.css" rel="stylesheet" type="text/css" />
            </head>
            <body id="pageBody">

                <div id="decorative2">
                    <div class="container">

                        <div class="divPanel topArea notop nobottom">
                            <div class="row-fluid">
                                <div class="span12">

                                    <div id="divLogo" class="pull-left">
                                        <a href="admin.php" id="divSiteTitle">Bicibytes</a><br />
                                        <a href="admin.php" id="divTagLine">Tu tienda de ciclismo</a>
                                    </div>
                                    <div id="divMenuRight" class="pull-right">
                                        <div class="navbar">
                                            <button type="button" class="btn btn-navbar-highlight btn-large btn-primary" data-toggle="collapse" data-target=".nav-collapse">
                                                NAVIGATION <span class="icon-chevron-down icon-white"></span>
                                            </button>
                                            <div class="nav-collapse collapse">

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="container">

                    <div class="divPanel page-content">

                        <!--Si existe algun error lo muestro-->
                        <div class="row-fluid">
                            <h1>No se han podido insertar los datos. Existe un error.</h1>

                            <div class="span8" id="divMain">

        <?php
        echo "<h2>Error: " . $sql . "<br>" . $conn->error . "</h2>";
        ?>
                            </div>

                        </div>

                        <div id="footerInnerSeparator"></div>
                    </div>

                </div>


                <script src="scripts/jquery.min.js" type="text/javascript"></script> 
                <script src="scripts/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
                <script src="scripts/default.js" type="text/javascript"></script>


                <script type="text/javascript">$('.ttip').tooltip();</script>

            </body>
        </html>
        <?php
    }

    $conn->close();
}
?>

