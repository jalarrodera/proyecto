	
<?php error_reporting(E_ALL ^ E_NOTICE); 
        session_start();
if (isset ($_SESSION['usuario']))
{ 
    echo "hola";
}else{
    echo "no ola";
}
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
                                        <a href="#" id="divSiteTitle">Bicibytes</a><br />
                                        <a href="#" id="divTagLine">Tu tienda de ciclismo</a>
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

                <div id="contentOuterSeparator"></div>

                <div class="container">

                    
                    
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
    <?php
    if (isset($_POST["acceso"]) ) {
        $nombre = $_POST['username'];
        $password = $_POST['password'];
        $conexion = new PDO("mysql:host=localhost;dbname=proyecto", "phpmyadmin", "root");
        $resultado = $conexion->query("SELECT * FROM usuario WHERE email='$nombre' and password=md5('$password')");
        while ($registro = $resultado->fetch()) {
            ?><img src="<?php echo $registro['imagen']; ?>" width="10" /> <?php
            echo "</br>";

            $rol = $registro['rol'];
        }
    }
    if ($rol == 'admin') {

        $_SESSION['usuario'] = 'admin';
        ?>
                    
                    
                    
                    <div class="divPanel page-content">
                        <h2>INSERTAR UN PRODUCTO</h2>
                        <form role="form" name="acceso" action="insertar.php" method="post">
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

                                echo "<option value='".$registro['categoria']."'>".$registro['categoria']."</option>"; 

                            }
                             echo "</select>";
                            ?>
                            <p>


                            <label for="marca">Marca</label>
                            <input type="text" class="form-control" id="username" name="marca" required>
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

                                echo "<option value='".$registro['categoria']."'>".$registro['categoria']."</option>"; 

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

            </body>
        </html>

        <?php
    }
    ?>
