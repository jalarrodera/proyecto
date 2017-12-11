	
<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
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


                            <div id="divMenuRight" class="pull-right">
                                <div class="navbar">
                                    <button type="button" class="btn btn-navbar-highlight btn-large btn-primary" data-toggle="collapse" data-target=".nav-collapse">
                                        NAVIGATION <span class="icon-chevron-down icon-white"></span>
                                    </button>
                                    <div class="nav-collapse collapse">
                                        <ul class="nav nav-pills ddmenu">
                                            <li class="dropdown"><a href="gestionarProductos.php">Gestion de productos</a></li>
                                            <li class="dropdown"><a href="gestionarProductos.php">Gestion de salidas</a></li>
                                            <li class="dropdown"><a href="leer.php">Mensajes</a></li>
                                            <li class="dropdown"><a href="historico.php">Histórico de mensajes</a></li>
                                            <li class="dropdown"><a href="adminReservas.php">Reservas</a></li>
                                            <li class="dropdown"><a href="historicoReservas.php">Historico de reservas</a></li>
                                            
                                        </ul>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div id="decorative1" style="position:relative">
            <div class="container">

                <div class="divPanel headerArea">
                    <div class="row-fluid">
                        <div class="span12">

                            <div id="headerSeparator"></div>

                            <div id="divHeaderText" class="page-content">
                                <div id="divHeaderLine1">Bicibytes</div><br />

                            </div>

                            <div id="headerSeparator2"></div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
        <?php
        //para que cargue directamente 
        if (isset($_POST['acceso'])) {
            header("refresh:0;url=admin.php");
        }
        if (!isset($_SESSION['usuario'])) {
            ?>
            <div id="contentOuterSeparator"></div>

            <div class="container">






                <form role="form" name="acceso" enctype="multipart/form-data" action="admin.php" method="post">
                    <div class="form-group">
                        <label for="username">Acceso</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario">
                    </div>
                    <div class="form-group">
                        <label for="password">Contrase&ntilde;a</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Contrase&ntilde;a">
                    </div>

                    <button type="submit" name="acceso" class="btn btn-default">Acceder</button>
                </form>
                <?php
                if (isset($_POST["acceso"])) {
                    $nombre = $_POST['username'];
                    $password = $_POST['password'];
                    $conexion = new PDO("mysql:host=localhost;dbname=proyecto", "phpmyadmin", "root");
                    $resultado = $conexion->query("SELECT * FROM usuario WHERE email='$nombre' and password=md5('$password') and rol='admin'");
                    while ($registro = $resultado->fetch()) {
                        $_SESSION['usuario'] = 'admin';
                    }
                }
                ?>
            </div>
            <?php
        } else {
            ?>




        </div>



        <?php
    }
    ?>


</body>
</html>