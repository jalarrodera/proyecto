

﻿<!DOCTYPE HTML>
<!-- Página que inserta socios en la base de datos -->
<html>
    <head>
        <meta charset="utf-8">

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
        //Primero recogerá los datos recibidos del formulario de registro. Después, conectada con la base de datos.
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $rol = $_POST['rol'];


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

//El programa, primero comprueba si el usuario existe con rol de cliente o no existe.
//Registramos clientes o socios, dependiendo del formulario que nos lleve aquí (roles distintos)
//Si existe con rol de cliente, realiza un update y cambia el rol a socio.
        //Si el usuario no existe, crea un nuevo usuario.
        if ($resultado = mysqli_query($conn, "SELECT * FROM usuario where email='$email'")) {

            if (mysqli_num_rows($resultado) == 1) {

                echo $email;
                if ($resultado2 = mysqli_query($conn, "SELECT * FROM usuario where email='$email' and rol='socio'")) {
                    if (mysqli_num_rows($resultado2) == 1) {
                        echo "El usuario ya está registrado";
                    } else {
                        $sql = "UPDATE usuario SET rol='socio' where email='$email'";

                        if ($conn->query($sql) === TRUE) {
                            echo "Ha pasado de ser cliente a ser socio.";
                        }
                    }
                }
            } else {


                $sql = "INSERT INTO usuario (nombre,email,password,rol) "
                        . "VALUES ('$nombre','$email', md5('$pass'),'$rol')";


                if ($conn->multi_query($sql) === TRUE) {
                    echo "Usuario insertado.";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }
        $conn->close();
        ?>  


        <div id="contentOuterSeparator"></div>

        <div class="container">

            <div class="divPanel page-content">
                <div class="row-fluid">
                    <div class="span8">

                        <br />

                        <!-- Enviamos mensaje de que el registro ha ido bien y redirigimos -->
                        <div class="hero-unit">	        
                            <h1>Hola, registrado el usuario  <?php echo $nombre . " "; ?>!</h1>  
                            <p>Se ha registrado correctamente con el correo <?php echo $email ?>.</p>  
                            <p>    
                                <a class="btn btn-primary btn-large" href="index.php">      Volver    </a>  
                            </p>  

                        </div>
                        <br />



                    </div>

                </div>

                <div id="footerInnerSeparator"></div>
            </div>

        </div>

        <div id="footerOuterSeparator"></div>

        <script src="scripts/jquery.min.js" type="text/javascript"></script> 
        <script src="scripts/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/default.js" type="text/javascript"></script>


        <script type="text/javascript">$('.ttip').tooltip();</script>

    </body>
</html>

