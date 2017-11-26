

﻿<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Your Name Here - Page Components</title>
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
<?php 

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$pass = $_POST['password'];
$rol = 'cliente';
    
       
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

$sql = "INSERT INTO usuario (nombre,email,password,rol) "
                . "VALUES ('$nombre','$email','$pass','$rol')";


if ($conn->multi_query($sql) === TRUE) {
    echo "Los datos han sido insertados";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close(); 
 ?>  


<div id="contentOuterSeparator"></div>

<div class="container">

    <div class="divPanel page-content">
        <div class="row-fluid">
                <div class="span8">

            <br />


            <div class="hero-unit">	        
                <h1>Hola, registrado el usuario  <?php echo $nombre. " ";?>!</h1>  
	            <p>Se ha registrado correctamente con el correo <?php echo $email?>.</p>  
	            <p>    
                <a class="btn btn-primary btn-large" href="acceso.php">      Volver    </a>  
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

