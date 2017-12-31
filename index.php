<!DOCTYPE HTML>
<!-- Pagina principal de la plataforma online -->
<html>
    <!-- Cabecera. Es común a todas las páginas -->
    <head>
        <meta charset="utf-8">
        <title>Bicibytes</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Jesus Larrodera">  
        <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW"> 
        <!-- Enlaces a los estilos bootstrap, fuentes ... -->
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
    <!-- Cuerpo de la página-->
    <body id="pageBody">

        <div id="decorative2">
            <!-- Div de clase container que contendrá el menú de cabecera. Será igual en todas las páginas -->
            <div class="container">

                <div class="divPanel topArea notop nobottom">
                    <div class="row-fluid">
                        <div class="span12">
                            <!-- Título de la pagina -->
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
                                        <!-- Con una lista <ul> mostraremos todas las opciones del menú. Alguna, como tienda, contiene a su vez más listas formando submenus -->
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
        <!-- Div que contiene la imagen de fondo y el eslogan -->
        <div id="decorative1" style="position:relative">
            <div class="container">

                <div class="divPanel headerArea">
                    <div class="row-fluid">
                        <div class="span12">

                            <div id="headerSeparator"></div>

                            <div id="divHeaderText" class="page-content">
                                <div id="divHeaderLine1">Bicibytes</div><br />
                                <div id="divHeaderLine2">Más de 10 años cuidando de tu bicicleta, cuidando de tí ...</div><br />
                                <div id="divHeaderLine3"><a class="btn btn-large btn-primary" href="about.php">Más información</a></div>
                            </div>

                            <div id="headerSeparator2"></div>

                        </div>
                    </div>

                </div>

            </div>
        </div>

        <div id="contentOuterSeparator"></div>
        <!-- div de la clase container que contiene el "grueso" de la pagina -->
        <div class="container">

            <div class="divPanel page-content">

                <div class="row-fluid">

                    <div class="span12" id="divMain">

                        <h1>Bienvenido</h1>

                        <p>Bicibytes es una tienda especializada en todas las modalidades de ciclismo. Fundada hace más de 10 años, 
                            cuenta con uno de los equipos profesionales del sector mejor valorados del país.
                        </p>

                        <hr style="margin:45px 0 35px" />
                        <div class="lead">
                            <h2>Nuestras marcas.</h2> 
                            <h3>Trabajamos con las marcas más prestigiosas a nivel internacional.</h3>
                        </div>
                        <br />
                        <!-- div que contiene las imágenes en movimiento -->
                        <div class="list_carousel responsive">
                            <ul id="list_photos">
                                <li><img src="images/trek.jpg" class="img-polaroid">  </li>
                                <li><img src="images/giro.jpg" class="img-polaroid">  </li>
                                <li><img src="images/look.jpg" class="img-polaroid">  </li>
                                <li><img src="images/spiuk.jpg" class="img-polaroid">  </li>
                                <li><img src="images/specialized.jpg" class="img-polaroid">  </li>                            
                                <li><img src="images/michelin.jpg" class="img-polaroid">  </li>
                            </ul>
                        </div> 

                        <hr style="margin:45px 0 35px" />

                        <div class="lead">
                            <h2>Taller</h2> 
                            <h3>Ahora, también arreglamos tu bicicleta.</h3>
                        </div>
                        <br />

                        <div class="row-fluid">
                            <div class="span8">

                                <h3>Te hacemos el mejor presupuesto sin ningún compromiso.</h3>         

                                <p>
                                    <img src="images/taller.jpg" class="img-polaroid" style="margin:12px 0px;">  
                                </p>

                                <p>Bicibytes cuenta con uno de los mejores equipos de mecánicos, especializados en ciclismo, de todo el país.
                                    Arreglamos cualquier tipo de avería al mejor precio. Cada giro de tuerca, es tratado con el máximo nivel profesional. Acércate al local y te haremos un presupuesto personalizado
                                    sin ningún tipo de compromiso.
                                </p>

                                <p>Además, si te apetece una limpieza integral de su bicicleta, no se preocupe y déjanosla a nosotros. 
                                    Nuestros profesionales se encargaran de que quede como nueva.                     
                                </p>

                                <p>Porque nos gusta cuidar de su bicicleta. Nos gusta cuidar de tí...                
                                </p>                                                        
                            </div>
                            <div class="span4 sidebar">

                                <div class="sidebox">
                                    <h3 class="sidebox-title">Máxima calidad.</h3>
                                    <p>
                                        <img src="images/mecanico.jpg" class="img-polaroid" style="margin:12px 0px;">  
                                    </p>                       
                                </div>

                                <br />

                                <div class="sidebox">
                                    <h3 class="sidebox-title">Profesionalidad</h3>
                                    <p>
                                        <img src="images/limpieza.jpg" class="img-polaroid" style="margin:12px 0px;">  
                                    </p>                   
                                </div>

                            </div>
                        </div>

                    </div>

                </div>

                <div id="footerInnerSeparator"></div>
            </div>

        </div>
        <!-- Pie de página. También será común en todas las páginas -->
        <div id="footerOuterSeparator"></div>

        <div id="divFooter" class="footerArea">

            <div class="container">

                <div class="divPanel">

                    <div class="row-fluid">
                        <div class="span3" id="footerArea1">

                            <h3>Sobre nosotros</h3>

                            <p>Tienda especializada en ciclismo fundada hace más de una década.</p>

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
                            <!-- Botones que llevan a las redes sociales de la página. -->
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


        <script src="scripts/carousel/jquery.carouFredSel-6.2.0-packed.js" type="text/javascript"></script><script type="text/javascript">$('#list_photos').carouFredSel({responsive: true, width: '100%', scroll: 2, items: {width: 320, visible: {min: 2, max: 6}}});</script>


    </body>
</html>