<?php
    session_start();
    include("../functions/functions.php");

    if(!isset($_SESSION['usuario'])){

        echo "<script>window.location.href='../../404.html';</script>";
    }
    else {
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Magenta - Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <?php include("dashboard_nav.php"); ?>
        <?php

            // Variables
            $clientes = getClientes();
            $numero_clientes = count($clientes);

            $muebles = getMuebles();
            $mueblesSinRentar = 0;
            foreach ($muebles as $mueble) {
                $mueblesSinRentar += (int)$mueble['cantidad'];
            }

            $bodegas = getBodegas();
            $numero_bodegas = count($bodegas);

            $mueble_clientes = getMuebleClientes();
            $numero_mueble_clientes = count($mueble_clientes);


         ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $numero_clientes; ?></div>
                                    <div>Clientes</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Ver todos</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-bed fa-5x" aria-hidden="true"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $mueblesSinRentar; ?></div>
                                    <div>Muebles sin rentar</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Ver todos</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-building fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $numero_bodegas; ?></div>
                                    <div>Bodegas</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Ver todas</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-bookmark fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $numero_mueble_clientes; ?></div>
                                    <div>Rentas Activas</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Ver todas</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Rentas activas por mes
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="#">Action</a>
                                        </li>
                                        <li><a href="#">Another action</a>
                                        </li>
                                        <li><a href="#">Something else here</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="morris-area-chart"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Renta por categoría de producto
                        </div>
                        <div class="panel-body">
                            <div id="morris-donut-chart"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>

                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <!-- <script src="../data/morris-data.js"></script> -->
    <?php

        // Get the data for graphs
        global $enlace;

        $categorias = array();

        $string = "select mueble.categoria as nombre, SUM(mueble_cliente.cantidadRentada) as cantidad from mueble_cliente natural join mueble group by mueble.categoria;";

    	$query = mysqli_query($enlace, $string);

    	while ($tupla=mysqli_fetch_array($query)){

    		/*$noMueble = $tupla['NoMueble'];
            $noCliente= $tupla['noCliente'];
            $inicio = $tupla['inicio'];
            $fin = $tupla['fin'];
            $precio = $tupla['precio'];
    		$cantidad = $tupla['cantidadRentada'];*/

            $categorias[] = $tupla;

        }

        echo "<script>\n";
        echo "$(function() {\n";
        echo "\n";
        echo "    Morris.Area({\n";
        echo "        element: 'morris-area-chart',\n";
        echo "        data: [{\n";
        echo "            period: '2010 Q1',\n";
        echo "            iphone: 2666,\n";
        echo "            ipad: null,\n";
        echo "            itouch: 2647\n";
        echo "        }, {\n";
        echo "            period: '2010 Q2',\n";
        echo "            iphone: 2778,\n";
        echo "            ipad: 2294,\n";
        echo "            itouch: 2441\n";
        echo "        }, {\n";
        echo "            period: '2010 Q3',\n";
        echo "            iphone: 4912,\n";
        echo "            ipad: 1969,\n";
        echo "            itouch: 2501\n";
        echo "        }, {\n";
        echo "            period: '2010 Q4',\n";
        echo "            iphone: 3767,\n";
        echo "            ipad: 3597,\n";
        echo "            itouch: 5689\n";
        echo "        }, {\n";
        echo "            period: '2011 Q1',\n";
        echo "            iphone: 6810,\n";
        echo "            ipad: 1914,\n";
        echo "            itouch: 2293\n";
        echo "        }, {\n";
        echo "            period: '2011 Q2',\n";
        echo "            iphone: 5670,\n";
        echo "            ipad: 4293,\n";
        echo "            itouch: 1881\n";
        echo "        }, {\n";
        echo "            period: '2011 Q3',\n";
        echo "            iphone: 4820,\n";
        echo "            ipad: 3795,\n";
        echo "            itouch: 1588\n";
        echo "        }, {\n";
        echo "            period: '2011 Q4',\n";
        echo "            iphone: 15073,\n";
        echo "            ipad: 5967,\n";
        echo "            itouch: 5175\n";
        echo "        }, {\n";
        echo "            period: '2012 Q1',\n";
        echo "            iphone: 10687,\n";
        echo "            ipad: 4460,\n";
        echo "            itouch: 2028\n";
        echo "        }, {\n";
        echo "            period: '2012 Q2',\n";
        echo "            iphone: 8432,\n";
        echo "            ipad: 5713,\n";
        echo "            itouch: 1791\n";
        echo "        }],\n";
        echo "        xkey: 'period',\n";
        echo "        ykeys: ['iphone', 'ipad', 'itouch'],\n";
        echo "        labels: ['iPhone', 'iPad', 'iPod Touch'],\n";
        echo "        pointSize: 2,\n";
        echo "        hideHover: 'auto',\n";
        echo "        resize: true\n";
        echo "    });\n";
        echo "\n";
        echo "    Morris.Donut({\n";
        echo "        element: 'morris-donut-chart',\n";
        echo "        data: [{\n";
            $size = count($categorias);
            foreach ($categorias as $index => $categoria) {
                $nombre = ucfirst($categoria['nombre']);
                $cantidad = $categoria['cantidad'];

                echo "label: \"$nombre\",\n";
                echo "value: $cantidad\n";

                if($index < $size - 1){
                    echo "}, {\n";
                }
            }
        /*echo "            label: \"Download Sales\",\n";
        echo "            value: 12\n";
        echo "        }, {\n";
        echo "            label: \"In-Store Sales\",\n";
        echo "            value: 30\n";
        echo "        }, {\n";
        echo "            label: \"Mail-Order Sales\",\n";
        echo "            value: 20\n";*/

        echo "        }],\n";
        echo "        resize: true\n";
        echo "    });\n";
        echo "\n";
        echo "});\n";
        echo "</script>";

     ?>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>

 <?php } ?>
