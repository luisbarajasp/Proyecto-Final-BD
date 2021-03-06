<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Magenta - Renta de Muebles</title>

    <!-- Bootstrap Core CSS -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="lib/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="lib/device-mockups/device-mockups.min.css">
    <link rel="stylesheet" href="lib/lightbox/css/lightbox.css">

    <!-- Theme CSS -->
    <link href="css/new-age.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span><i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top"><img src="img/logo.png" alt=""></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="#features">Catálogo</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contacto</a>
                    </li>
                    <?php
                        session_start();

                        if(isset($_SESSION['usuario'])){

                            echo "<li><a href=\"dashboard\" class='btn btn-primary'>Dashboard</a></li>";

                        }
                    ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <header>
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <div class="header-content">
                        <div class="header-content-inner">
                            <h1>El estilo más moderno lo usamos para crear su espacio.</h1>
                            <a href="#download" class="btn btn-outline btn-xl page-scroll">Conocer más</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="flex-container">

                       <div class="house-wrapper">
                          <div class="sidewalk"></div>

                          <div class="foundation"></div>

                          <div class="bush">
                             <div class="inner-bush"></div>
                          </div>

                          <div class="plant pink"></div>
                          <div class="plant purple"></div>
                          <div class="plant green"></div>

                          <div class="bench">
                             <div class="structure"></div>
                             <div class="seat"></div>
                          </div>

                          <div class="ground-floor">
                             <div class="strip"></div>
                             <div class="strip strip--bottom"></div>


                             <div class="pillar pillar--left"></div>
                             <div class="pillar pillar--center"></div>
                             <div class="pillar pillar--right"></div>

                             <div class="hall">
                                <div class="door">
                                   <div class="mailbox"></div>
                                   <div class="door__window">
                                      <div class="door__frame"></div>
                                   </div>
                                </div>

                                <div class="arch"></div>
                             </div>

                             <div class="brick-wall"></div>

                             <div class="window-wraper">
                                <div class="window">
                                   <div class="inside"></div>
                                   <div class="ornament"></div>
                                </div>
                                <div class="arch"></div>
                             </div>

                          </div>

                          <div class="porch-ceiling"></div>

                          <div class="first-floor">
                             <div class="balcony"></div>

                             <div class="window main"></div>

                             <div class="wall left-wall">
                                <div class="window"></div>
                             </div>

                             <div class="wall center-wall">
                                <div class="window"></div>
                             </div>

                             <div class="wall right-wall">
                                <div class="window"></div>
                             </div>
                          </div>

                          <div class="attic-floor">
                             <div class="small-wall left-wall"></div>
                             <div class="small-wall center-wall">
                                <div class="window"></div>
                             </div>
                             <div class="small-wall right-wall"></div>

                             <div class="roof"></div>
                             <div class="dormer"></div>
                             <div class="effect"></div>
                             <div class="inner-edge-1"></div>
                             <div class="inner-edge-2"></div>
                             <div class="edge-1"></div>
                             <div class="edge-2"></div>
                             <div class="outer-edge-1"></div>
                             <div class="outer-edge-2"></div>
                          </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section id="download" class="cta">
        <div class="cta-content">
            <div class="container">
                <h2>Ya no necesita rentar departamentos amueblados con muebles viejos y de mal gusto.</h2>
                <p>Tenemos muebles cómodos, de diseño y en excelente estado para que usted los disfrute.</p>
            </div>
        </div>
        <div class="overlay"></div>
    </section>

    <section id="features" class="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-heading">
                        <h2>Catálogo</h2>
                        <p class="text-muted">Elige un espacio para ver algunas muestras de nuestro amplio surtido</p>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="img/recamara/1.png" data-lightbox="recamara" class="link-to-lightbox">
                                    <div class="feature-item">
                                        <i class="fa fa-bed" aria-hidden="true"></i>
                                        <h3>Recámara</h3>
                                    </div>
                                </a>
                                <a href="img/recamara/2.png" data-lightbox="recamara" style="display:none"></a>
                                <a href="img/recamara/3.png" data-lightbox="recamara" style="display:none"></a>
                                <a href="img/recamara/4.png" data-lightbox="recamara" style="display:none"></a>
                                <a href="img/recamara/5.png" data-lightbox="recamara" style="display:none"></a>

                            </div>
                            <div class="col-md-6">
                                <a href="img/sala/1.png" data-lightbox="sala" class="link-to-lightbox">
                                    <div class="feature-item">
                                        <i class="fa fa-home" aria-hidden="true"></i>
                                        <h3>Sala</h3>
                                    </div>
                                </a>
                                <a href="img/sala/2.png" data-lightbox="sala" style="display:none"></a>
                                <a href="img/sala/3.png" data-lightbox="sala" style="display:none"></a>
                                <a href="img/sala/4.png" data-lightbox="sala" style="display:none"></a>
                                <a href="img/sala/5.png" data-lightbox="sala" style="display:none"></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="img/comedor/1.png" data-lightbox="comedor" class="link-to-lightbox">
                                    <div class="feature-item">
                                        <i class="fa fa-microchip" aria-hidden="true"></i>
                                        <h3>Comedor</h3>
                                    </div>
                                </a>
                                <a href="img/comedor/2.png" data-lightbox="comedor" style="display:none"></a>
                                <a href="img/comedor/3.png" data-lightbox="comedor" style="display:none"></a>
                                <a href="img/comedor/4.png" data-lightbox="comedor" style="display:none"></a>
                            </div>
                            <div class="col-md-6">
                                <a href="img/blancos/1.png" data-lightbox="blancos" class="link-to-lightbox">
                                    <div class="feature-item">
                                        <i class="fa fa-cutlery" aria-hidden="true"></i>
                                        <h3>Blancos</h3>
                                    </div>
                                </a>
                                <a href="img/blancos/2.png" data-lightbox="blancos" style="display:none"></a>
                                <a href="img/blancos/3.png" data-lightbox="blancos" style="display:none"></a>
                                <a href="img/blancos/4.png" data-lightbox="blancos" style="display:none"></a>
                                <a href="img/blancos/5.png" data-lightbox="blancos" style="display:none"></a>
                                <a href="img/blancos/6.png" data-lightbox="blancos" style="display:none"></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <a href="img/varios/1.png" data-lightbox="varios" class="link-to-lightbox">
                                    <div class="feature-item">
                                        <i class="fa fa-television" aria-hidden="true"></i>
                                        <h3>Varios</h3>
                                    </div>
                                </a>
                                <a href="img/varios/2.png" data-lightbox="varios" style="display:none"></a>
                                <a href="img/varios/3.png" data-lightbox="varios" style="display:none"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="contact">
        <div class="container">
            <h2>Contacto</h2>
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-sm-6 col-xs-12">
                        <p>Escríbenos a: <a href="mailto:info@magentarentademuebles.com">info@magentarentademuebles.com</a></p>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <p>Llámanos: 5247-2919</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="col-xs-12">
                <img src="img/logo.png" alt="">
            </div>
            <p>Copyright © 2017 | Start Bootstrap</p>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="lib/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/new-age.min.js"></script>

    <!-- Lightbox JavaScript -->
    <script src="lib/lightbox/js/lightbox.js"></script>

</body>

</html>
