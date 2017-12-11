<?php
session_start(); //Iniciamos la Sesion o la Continuamos
if (isset($_SESSION['usuario'])) {
    ?>


    ﻿<!DOCTYPE HTML>
    <html>
        <head>
            <meta charset="utf-8">
            <title>Club bicibytes</title>
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

            <div id="decorative2">
                <div class="container">

                    <div class="divPanel topArea notop nobottom">
                        <div class="row-fluid">
                            <div class="span12">

                                <div id="divLogo" class="pull-left">
                                    <a href="index.php" id="divSiteTitle">Volver a bicibytes</a><br />
                                    <a href="club.php" id="divTagLine">Plataforma de socios</a>
                                </div>

                            </div>

                        </div>
                        <h1>Calendario de salidas <?php
                            echo date("Y");
                            ?> </h1>
                        <?php
                        $conexion = new PDO("mysql:host=localhost;dbname=proyecto", "phpmyadmin", "root");
                        $resultado = $conexion->query("SELECT fecha, salida, kilometros, comentarios, YEAR(fecha) ano from salidas;");
                        echo "<table border=1><th>Fecha</th><th>Salida</th><th>Kilometros</th><th>Comentarios</th><tr>";
                        while ($registro = $resultado->fetch()) {
                            if (date("Y") < $registro['ano']) {
                                echo "<td>" . $registro['fecha'] . "</td><td>" . $registro['salida'] . "</td><td>" . $registro['kilometros'] . " km.</td><td>" . $registro['comentarios'] . "</td>";
                            }
                            echo "</tr>";
                        }
                        echo "</table></br></br>";
                        ?>
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
} else {
    echo "<b>Necesita acceder con su usuario.</b>";
}
?>
