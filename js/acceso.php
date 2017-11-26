<!DOCTYPE HTML>
<?php error_reporting(E_ALL ^ E_NOTICE); 

session_start(); //Iniciamos o Continuamos la sesion
if (isset($_POST['acceso'])) //Si llego un Nickname via el formulario lo grabamos en la Sesion
{
	$_SESSION['usuario'] = $_POST['username']; //Nickname Grabado
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Acceso a socios</title>
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
    </head>
    <body id="pageBody">
        <?php
        if (isset($_POST["acceso"])) {
            $nombre = $_POST['username'];
            $password = $_POST['password'];
            $conexion = new PDO("mysql:host=localhost;dbname=proyecto", "phpmyadmin", "root");
            $resultado = $conexion->query("SELECT * FROM usuario WHERE email='$nombre' and password=md5('$password')");
            while ($registro = $resultado->fetch()) {
                header('Location: club.php');
                exit;
            }
        }
        ?>    


        <div id="decorative2">
            <div class="container">

                <div class="divPanel topArea notop nobottom">
                    <div class="row-fluid">
                        <div class="span12">

                            <div id="divLogo" class="pull-left">
                                <a href="index.php" id="divSiteTitle">Bicibytes</a><br />
                                <a href="index.php" id="divTagLine">Acceso a socios del club</a>
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
                    <a href="index.php">Volver al inicio</a> &nbsp;/&nbsp; <span>Page</span>
                </div> 

                <div class="row-fluid">
                    <div class="span8">

                        <br />

                        <h2>Login</h2>

                        <form role="form" name="acceso" action="#" method="post">
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


                        <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h3 id="myModalLabel">Formulario de registro</h3>
                            </div>
                            <form role="form" name="registro" action="registro_socio.php" method="post">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre">
                                </div>
                                <div class="form-group">
                                    <label for="email">mail</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="password">Contrase&ntilde;a</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password">Confirmar Contrase&ntilde;a</label>
                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                                </div>                

                                <button type="submit" name="registro" class="btn btn-default">registro</button>
                                <script src="js/valida_registro.js"></script>
                            </form>


                        </div>

                        <a data-toggle="modal" href="#myModal" class="btn btn-primary btn-large">Házte socio</a>

                        <br /><br />
                        <br />  
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />


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