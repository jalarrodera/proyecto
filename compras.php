<!DOCTYPE HTML>
<html>

    <?php
    $tienda = $_GET['tienda'];
    if (isset($_POST['hola'])) {
        echo $_POST['hola'];
    }
    ?>

    <head>
        <meta charset="utf-8">
        <title>Bicibytes</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <link href="scripts/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="scripts/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Icons -->
        <link href="scripts/icons/general/stylesheets/general_foundicons.css" media="screen" rel="stylesheet" type="text/css" />  
        <link href="scripts/icons/social/stylesheets/social_foundicons.css" media="screen" rel="stylesheet" type="text/css" />
        <!--[if lt IE 8]>
            <link href="scripts/icons/general/stylesheets/general_foundicons_ie7.css" media="screen" rel="stylesheet" type="text/css" />
            <link href="scripts/icons/social/stylesheets/social_foundicons_ie7.css" media="screen" rel="stylesheet" type="text/css" />
        <![endif]-->
        <link rel="stylesheet" href="scripts/fontawesome/css/font-awesome.min.css">
        <!--[if IE 7]>
            <link rel="stylesheet" href="scripts/fontawesome/css/font-awesome-ie7.min.css">
        <![endif]-->



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
                    <a href="index.php">Inicio</a> &nbsp;/&nbsp; <span><?php echo $tienda ?></span>
                </div> 

                <div class="row-fluid">
                    <!--Edit Main Content Area here-->
                    <div class="span8" id="divMain">
                        <h1>¡No olvides pasarte por la tienda a ver nuestros productos!</h1>
                        <?php
                        switch ($tienda) {
                            case "ropa":
                                ?>
                                <h1>ROPA</h1>
                                <?php
                                $conexion = new PDO("mysql:host=localhost;dbname=proyecto", "phpmyadmin", "root");
                                $resultado = $conexion->query("SELECT * from producto where categoria='ropa'");
                                while ($registro = $resultado->fetch()) {

                                    echo "<table border=1><tr><td>";
                                    if ($registro['imagen'] == null) {
                                        ?> <img src="images/no_imagen.jpg" class="img-polaroid"> <?php
                                    }
                                    ?><img src="<?php echo $registro['imagen']; ?>" /> <?php
                                    echo "</br>";
                                    echo "<b>Producto: </b>" . $registro['nombre'] . "</br>";
                                    echo "<b>Marca: </b> " . $registro['marca'] . "</br>";
                                    if ($registro['stock'] <= 0) {
                                        echo "<b><font color='red'>¡No quedan unidades!</font></b></br>";
                                    } else {
                                        echo "<b>Stock disponible: </b> " . $registro['stock'] . "</br>";
                                    }
                                    if ($registro['descuento'] > 0) {
                                        echo "<b><font color='red'>¡Éste artículo tiene un " . $registro['descuento'] . "% de descuento!</font></b></br>";
                                    }
                                    echo "<b>PVP: </b> " . ($registro['precio'] - ($registro['precio'] * $registro['descuento']) / 100) . " €</br>";
                                    echo "</td></tr></table></br>";
                                    if ($registro['stock'] > 0) {
                                        ?>
                                        <form role="form" name="reservas" action="reservas.php" method="post">  
                                            <input type="hidden" value="<?php echo $registro['codigo'] ?>" name="codigo">
                                            <input type="hidden" value="<?php echo $registro['nombre'] ?>" name="producto">
                                            <input type="submit" value="reservar">
                                        </form>

                                        <?php
                                    }
                                }
                                break;
                                ?>



                            <?php case "herramientas": ?>
                                <h1>HERRAMIENTAS</h1>
                                <?php
                                $conexion = new PDO("mysql:host=localhost;dbname=proyecto", "phpmyadmin", "root");
                                $resultado = $conexion->query("SELECT * from producto where categoria='herramientas'");
                                while ($registro = $resultado->fetch()) {

                                    echo "<table border=1><tr><td>";
                                    if ($registro['imagen'] == null) {
                                        ?> <img src="images/no_imagen.jpg" class="img-polaroid"> <?php
                                    }
                                    ?><img src="<?php echo $registro['imagen']; ?>" /> <?php
                                    echo "</br>";
                                    echo "<b>Producto: </b>" . $registro['nombre'] . "</br>";
                                    echo "<b>Marca: </b> " . $registro['marca'] . "</br>";
                                    if ($registro['stock'] <= 0) {
                                        echo "<b><font color='red'>¡No quedan unidades!</font></b></br>";
                                    } else {
                                        echo "<b>Stock disponible: </b> " . $registro['stock'] . "</br>";
                                    }
                                    if ($registro['descuento'] > 0) {
                                        echo "<b><font color='red'>¡Éste artículo tiene un " . $registro['descuento'] . "% de descuento!</font></b></br>";
                                    }
                                    echo "<b>PVP: </b> " . ($registro['precio'] - ($registro['precio'] * $registro['descuento']) / 100) . " €</br>";
                                    echo "</td></tr></table></br>";
                                    if ($registro['stock'] > 0) {
                                        ?>
                                        <form role="form" name="reservas" action="reservas.php" method="post">  
                                            <input type="hidden" value="<?php echo $registro['codigo'] ?>" name="codigo">
                                            <input type="hidden" value="<?php echo $registro['nombre'] ?>" name="producto">
                                            <input type="submit" value="reservar">
                                        </form>

                                        <?php
                                    }
                                }
                                break;
                                ?>




                            <?php case "componentes": ?>
                                <h1>COMPONENTES</h1>
                                <?php
                                $conexion = new PDO("mysql:host=localhost;dbname=proyecto", "phpmyadmin", "root");
                                $resultado = $conexion->query("SELECT * from producto where categoria='componentes'");
                                while ($registro = $resultado->fetch()) {

                                    echo "<table border=1><tr><td>";
                                    if ($registro['imagen'] == null) {
                                        ?> <img src="images/no_imagen.jpg" class="img-polaroid"> <?php
                                    }
                                    ?><img src="<?php echo $registro['imagen']; ?>" /> <?php
                                    echo "</br>";
                                    echo "<b>Producto: </b>" . $registro['nombre'] . "</br>";
                                    echo "<b>Marca: </b> " . $registro['marca'] . "</br>";
                                    if ($registro['stock'] <= 0) {
                                        echo "<b><font color='red'>¡No quedan unidades!</font></b></br>";
                                    } else {
                                        echo "<b>Stock disponible: </b> " . $registro['stock'] . "</br>";
                                    }
                                    if ($registro['descuento'] > 0) {
                                        echo "<b><font color='red'>¡Éste artículo tiene un " . $registro['descuento'] . "% de descuento!</font></b></br>";
                                    }
                                    echo "<b>PVP: </b> " . ($registro['precio'] - ($registro['precio'] * $registro['descuento']) / 100) . " €</br>";
                                    echo "</td></tr></table></br>";
                                    if ($registro['stock'] > 0) {
                                        ?>
                                        <form role="form" name="reservas" action="reservas.php" method="post">  
                                            <input type="hidden" value="<?php echo $registro['codigo'] ?>" name="codigo">
                                            <input type="hidden" value="<?php echo $registro['nombre'] ?>" name="producto">
                                            <input type="submit" value="reservar">
                                        </form>

                                        <?php
                                    }
                                }
                                break;
                                ?>




                            <?php case "casco": ?>
                                <h1>CASCOS</h1>

                                <?php
                                $conexion = new PDO("mysql:host=localhost;dbname=proyecto", "phpmyadmin", "root");
                                $resultado = $conexion->query("SELECT * from producto where categoria='casco'");
                                while ($registro = $resultado->fetch()) {

                                    echo "<table border=1><tr><td>";
                                    if ($registro['imagen'] == null) {
                                        ?> <img src="images/no_imagen.jpg" class="img-polaroid"> <?php
                                    }
                                    ?><img src="<?php echo $registro['imagen']; ?>" /> <?php
                                    echo "</br>";
                                    echo "<b>Producto: </b>" . $registro['nombre'] . "</br>";
                                    echo "<b>Marca: </b> " . $registro['marca'] . "</br>";
                                    if ($registro['stock'] <= 0) {
                                        echo "<b><font color='red'>¡No quedan unidades!</font></b></br>";
                                    } else {
                                        echo "<b>Stock disponible: </b> " . $registro['stock'] . "</br>";
                                    }
                                    if ($registro['descuento'] > 0) {
                                        echo "<b><font color='red'>¡Éste artículo tiene un " . $registro['descuento'] . "% de descuento!</font></b></br>";
                                    }
                                    echo "<b>PVP: </b> " . ($registro['precio'] - ($registro['precio'] * $registro['descuento']) / 100) . " €</br>";
                                    echo "</td></tr></table></br>";
                                    if ($registro['stock'] > 0) {
                                        ?>
                                        <form role="form" name="reservas" action="reservas.php" method="post">  
                                            <input type="hidden" value="<?php echo $registro['codigo'] ?>" name="codigo">
                                            <input type="hidden" value="<?php echo $registro['nombre'] ?>" name="producto">
                                            <input type="submit" value="reservar">
                                        </form>

                                        <?php
                                    }
                                }
                                break;
                                ?>




                            <?php case "carretera": ?>
                                <h1>BICICLETAS DE CARRETERA</h1>
                                <?php
                                $conexion = new PDO("mysql:host=localhost;dbname=proyecto", "phpmyadmin", "root");
                                $resultado = $conexion->query("SELECT * from producto where categoria='carretera'");
                                while ($registro = $resultado->fetch()) {

                                    echo "<table border=1><tr><td>";
                                    if ($registro['imagen'] == null) {
                                        ?> <img src="images/no_imagen.jpg" class="img-polaroid"> <?php
                                    }
                                    ?><img src="<?php echo $registro['imagen']; ?>" /> <?php
                                    echo "</br>";
                                    echo "<b>Producto: </b>" . $registro['nombre'] . "</br>";
                                    echo "<b>Marca: </b> " . $registro['marca'] . "</br>";
                                    if ($registro['stock'] <= 0) {
                                        echo "<b><font color='red'>¡No quedan unidades!</font></b></br>";
                                    } else {
                                        echo "<b>Stock disponible: </b> " . $registro['stock'] . "</br>";
                                    }
                                    if ($registro['descuento'] > 0) {
                                        echo "<b><font color='red'>¡Éste artículo tiene un " . $registro['descuento'] . "% de descuento!</font></b></br>";
                                    }
                                    echo "<b>PVP: </b> " . ($registro['precio'] - ($registro['precio'] * $registro['descuento']) / 100) . " €</br>";
                                    echo "</td></tr></table></br>";
                                    if ($registro['stock'] > 0) {
                                        ?>
                                        <form role="form" name="reservas" action="reservas.php" method="post">  
                                            <input type="hidden" value="<?php echo $registro['codigo'] ?>" name="codigo">
                                            <input type="hidden" value="<?php echo $registro['nombre'] ?>" name="producto">
                                            <input type="submit" value="reservar">
                                        </form>

                                        <?php
                                    }
                                }
                                break;
                                ?>




                            <?php case "montana": ?>
                                <h1>BICICLETAS DE MONTAÑA</h1>
                                <?php
                                $conexion = new PDO("mysql:host=localhost;dbname=proyecto", "phpmyadmin", "root");
                                $resultado = $conexion->query("SELECT * from producto where categoria='montana'");
                                while ($registro = $resultado->fetch()) {

                                    echo "<table border=1><tr><td>";
                                    if ($registro['imagen'] == null) {
                                        ?> <img src="images/no_imagen.jpg" class="img-polaroid"> <?php
                                    }
                                    ?><img src="<?php echo $registro['imagen']; ?>" /> <?php
                                    echo "</br>";
                                    echo "<b>Producto: </b>" . $registro['nombre'] . "</br>";
                                    echo "<b>Marca: </b> " . $registro['marca'] . "</br>";
                                    if ($registro['stock'] <= 0) {
                                        echo "<b><font color='red'>¡No quedan unidades!</font></b></br>";
                                    } else {
                                        echo "<b>Stock disponible: </b> " . $registro['stock'] . "</br>";
                                    }
                                    if ($registro['descuento'] > 0) {
                                        echo "<b><font color='red'>¡Éste artículo tiene un " . $registro['descuento'] . "% de descuento!</font></b></br>";
                                    }
                                    echo "<b>PVP: </b> " . ($registro['precio'] - ($registro['precio'] * $registro['descuento']) / 100) . " €</br>";
                                    echo "</td></tr></table></br>";
                                    if ($registro['stock'] > 0) {
                                        ?>
                                        <form role="form" name="reservas" action="reservas.php" method="post">  
                                            <input type="hidden" value="<?php echo $registro['codigo'] ?>" name="codigo">
                                            <input type="hidden" value="<?php echo $registro['nombre'] ?>" name="producto">
                                            <input type="submit" value="reservar">
                                        </form>

                <?php
            }
        }
        break;
        ?>




                            <?php case "bmx": ?>
                                <h1>BICICLETAS BMX</h1>
                                <?php
                                $conexion = new PDO("mysql:host=localhost;dbname=proyecto", "phpmyadmin", "root");
                                $resultado = $conexion->query("SELECT * from producto where categoria='bmx'");
                                while ($registro = $resultado->fetch()) {

                                    echo "<table border=1><tr><td>";
                                    if ($registro['imagen'] == null) {
                                        ?> <img src="images/no_imagen.jpg" class="img-polaroid"> <?php
                                    }
                                    ?><img src="<?php echo $registro['imagen']; ?>" /> <?php
                                    echo "</br>";
                                    echo "<b>Producto: </b>" . $registro['nombre'] . "</br>";
                                    echo "<b>Marca: </b> " . $registro['marca'] . "</br>";
                                    if ($registro['stock'] <= 0) {
                                        echo "<b><font color='red'>¡No quedan unidades!</font></b></br>";
                                    } else {
                                        echo "<b>Stock disponible: </b> " . $registro['stock'] . "</br>";
                                    }
                                    if ($registro['descuento'] > 0) {
                                        echo "<b><font color='red'>¡Éste artículo tiene un " . $registro['descuento'] . "% de descuento!</font></b></br>";
                                    }
                                    echo "<b>PVP: </b> " . ($registro['precio'] - ($registro['precio'] * $registro['descuento']) / 100) . " €</br>";
                                    echo "</td></tr></table></br>";
                                    if ($registro['stock'] > 0) {
                                        ?>
                                        <form role="form" name="reservas" action="reservas.php" method="post">  
                                            <input type="hidden" value="<?php echo $registro['codigo'] ?>" name="codigo">
                                            <input type="hidden" value="<?php echo $registro['nombre'] ?>" name="producto">
                                            <input type="submit" value="reservar">
                                        </form>

                <?php
            }
        }
        break;
        ?>
<?php } ?>
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