<!--  Página que muestra las reservas
Pueden estar en estado inicial o preparado.
Lista los pedidos y gracias a un boton, se cambia el estado de las reservas-->
<?php
session_start(); //Iniciamos la Sesion o la Continuamos
if (isset($_SESSION['usuario'])) {
    //Aqui venimos desde el formulario de cambiar el estado de los pedidos a preparado. Realizamos un update para cambiar el estado.
    if (isset($_POST["preparado"])) {
        $codigo = $_POST['codigo'];
        echo $_POST['codigo'];
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

        $sql = "UPDATE reservas SET estado='preparado' WHERE codigo='$codigo'";
        $conn->query($sql);
        $conn->close();
    }
//Aqui venimos desde el formulario de cambiar el estado de los pedidos a servido. Realizamos un update para cambiar el estado.
    if (isset($_POST["servido"])) {
        $codigo = $_POST['codigo'];
        echo $_POST['codigo'];
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

        $sql = "UPDATE reservas SET estado='servido' WHERE codigo='$codigo'";
        $conn->query($sql);
        $conn->close();
    }
    ?>
    <!DOCTYPE HTML>
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
                                                <li class="dropdown"><a href="gestionarSalidas.php">Gestion de salidas</a></li>
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

            <!-- Cuerpo de la página -->
            <div class="container">

                <div class="divPanel page-content">


                    <div class="row-fluid">
                        <div class="span8" id="divMain">
                            <!-- Realizo una consulta a la base de datos para mostrar las reservas en estado inicial. 
                            Es a su vez en formulario. Si pulsamos el boton marcar como preparado, realizamos el update (marcar como preparado) que aparece al principio del código-->
                            <h1>Reservas con estado INICIAL</h1>
                            <?php
                            $conexion = new PDO("mysql:host=localhost;dbname=proyecto", "phpmyadmin", "root");
                            $resultado = $conexion->query("SELECT * from reservas where estado='inicial' ORDER BY fecha ASC");
                            while ($registro = $resultado->fetch()) {
                                $producto = $registro['producto'];
                                echo "<fieldset>";
                                echo "<legend><form name='preparado' action='#' method='post'>Cliente: <b>" . $registro['cliente'] . "</b>( " . $registro['email'] . ") </br>"
                                . "Producto reservado: ";
                                $resultado2 = $conexion->query("SELECT * from producto where codigo='$producto'");
                                while ($registro2 = $resultado2->fetch()) {
                                    echo $registro2['nombre'];
                                }
                                echo "</br> Fecha del pedido: " . $registro['fecha'];
                                echo "</br> Estado del pedido: <b><font color='red'>" . $registro['estado'] . "</font></b> </legend></br>";
                                echo "<input type='hidden' name='codigo' value='" . $registro['codigo'] . "'";
                                echo "</br><input type='submit' name='preparado' value='Marcar como preparado'></form>"
                                . "</fieldset></br></br>";
                            }
                            ?>
                            <!-- Realizo una consulta a la base de datos para mostrar las reservas en estado servido. 
                            Es a su vez en formulario. Si pulsamos el boton marcar como preparado, realizamos el update (marcar como servido) que aparece al principio del código-->
                            <h1>Reservas con estado PREPARADO</h1>
                            <?php
                            $conexion = new PDO("mysql:host=localhost;dbname=proyecto", "phpmyadmin", "root");
                            $resultado = $conexion->query("SELECT * from reservas where estado='preparado'ORDER BY fecha ASC");
                            while ($registro = $resultado->fetch()) {
                                $producto = $registro['producto'];
                                echo "<fieldset>";
                                echo "<legend><form name='preparado' action='#' method='post'>Cliente: <b>" . $registro['cliente'] . "</b>( " . $registro['email'] . ") </br>"
                                . "Producto reservado: ";
                                $resultado2 = $conexion->query("SELECT * from producto where codigo='$producto'");
                                while ($registro2 = $resultado2->fetch()) {
                                    echo $registro2['nombre'];
                                } echo "</br> Fecha del pedido: " . $registro['fecha'];
                                echo "</br> Estado del pedido: <b>" . $registro['estado'] . "</b> </legend></br>";
                                echo "<input type='hidden' name='codigo' value='" . $registro['codigo'] . "'";
                                echo "</br><input type='submit' name='servido' value='Marcar como servido'></form>"
                                . "</fieldset></br></br>";
                            }
                            ?>
                        </div>
                        <!--End Main Content Area here-->

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
?>
