<?php
session_start(); //Iniciamos la Sesion o la Continuamos
if (isset ($_SESSION['usuario']))
{ 
if (isset($_POST["modifico"])) {
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

    $sql = "UPDATE mensaje SET leido='no' WHERE codigo='$codigo'";
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
        <div class="container">

            <div class="divPanel page-content">


                <div class="row-fluid">

                    
                        <div class="divPanel page-content">
                <h2>INSERTAR UN PRODUCTO</h2>
                <form role="form" name="acceso" action="insertar.php" method="post" enctype="multipart/form-data">
                    <label for="codigo">Codigo del producto</label>
                    <input type="text" class="form-control" id="username" name="codigo" required>
                    <label for="nombre">Nombre del Producto</label>
                    <input type="text" class="form-control" id="password" name="nombre" required>
                    <label for="precio">Precio del producto</label>
                    <input type="text" class="form-control" id="username" name="precio" required>
                    <label for="stock">Stock</label>
                    <input type="text" class="form-control" id="password" name="stock" required>
                    <label for="descuento">Descuento</label>
                    <input type="text" class="form-control" id="username" name="descuento" required>
                    <p>
                        Categoria
                    <p>
                        <?php
                        $conexion = new PDO("mysql:host=localhost;dbname=proyecto", "phpmyadmin", "root");
                        $resultado = $conexion->query("SELECT * FROM categoria");
                        echo "<select name='categoria'>";
                        while ($registro = $resultado->fetch()) {

                            echo "<option value='" . $registro['categoria'] . "'>" . $registro['categoria'] . "</option>";
                        }
                        echo "</select>";
                        ?>
                    <p>


                        <label for="marca">Marca</label>
                        <input type="text" class="form-control" id="username" name="marca" required></br>


                        <!-- MAX_FILE_SIZE debe preceder al campo de entrada del fichero -->
                        <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
                        <!-- El nombre del elemento de entrada determina el nombre en el array $_FILES -->
                        Enviar este fichero: <input name="fichero_usuario" type="file" />





                        <br><button type="submit" name="insertar" class="btn btn-default">insertar</button>
                </form>

                <h2>ACTUALIZAR UN PRODUCTO</h2>
                <form role="form" name="editar" action="editar.php" method="post">      
                    <select name="seleccion">
                        <?php
                        $conexion = new PDO("mysql:host=localhost;dbname=proyecto", "phpmyadmin", "root");
                        $resultado = $conexion->query("SELECT * from producto;");
                        while ($registro = $resultado->fetch()) {
                            ?><option value="<?php echo $registro['nombre'] ?>"> <?php echo $registro['nombre'] ?> </option> <?php
                        }
                        ?> 
                    </select>
                    <label for="precio">Precio del producto</label>
                    <input type="text" class="form-control" id="username" name="precio" required>
                    <label for="stock">Stock</label>
                    <input type="text" class="form-control" id="password" name="stock" required>
                    <label for="descuento">Descuento</label>
                    <input type="text" class="form-control" id="username" name="descuento" required>
                    <p>
                        Categoria
                    <p>
                        <?php
                        $conexion = new PDO("mysql:host=localhost;dbname=proyecto", "phpmyadmin", "root");
                        $resultado = $conexion->query("SELECT * FROM categoria");
                        echo "<select name='categoria'>";
                        while ($registro = $resultado->fetch()) {

                            echo "<option value='" . $registro['categoria'] . "'>" . $registro['categoria'] . "</option>";
                        }
                        echo "</select>";
                        ?>
                    <p>
                        <label for="marca">Marca</label>
                        <input type="text" class="form-control" id="username" name="marca" required>
                        <br><button type="submit" name="editar" class="btn btn-default">Editar</button>
                </form>

                <h2>ELIMINAR UN PRODUCTO</h2>
                <form role="form" name="eliminar" action="eliminar.php" method="post">      
                    <select name="seleccion">
                        <?php
                        $conexion = new PDO("mysql:host=localhost;dbname=proyecto", "phpmyadmin", "root");
                        $resultado = $conexion->query("SELECT * from producto;");
                        while ($registro = $resultado->fetch()) {
                            ?><option value="<?php echo $registro['nombre'] ?>"> <?php echo $registro['nombre'] ?> </option> <?php
                        }
                        ?> 
                    </select>

                    <br><button type="submit" name="eliminar" class="btn btn-default">Eliminar</button>
                </form>



            </div>        
                    

                </div>


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
