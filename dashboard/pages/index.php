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
                            <i class="fa fa-bar-chart-o fa-fw"></i> Ingreso por mes
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

        $string = "select mueble.categoria as nombre, SUM(mueble_cliente.cantidadRentada) as cantidad from mueble_cliente natural join mueble WHERE mueble_cliente.fin IS NULL group by mueble.categoria;";

    	$query = mysqli_query($enlace, $string);

    	while ($tupla=mysqli_fetch_array($query)){

            $categorias[] = $tupla;

        }

        echo "<script>\n";
        echo "$(function() {\n";
        echo "\n";
        echo "    Morris.Area({\n";
        echo "        element: 'morris-area-chart',\n";
        echo "        data: [{\n";
            $fecha = date("Y-m-d");

            $months = 10;

            $fechaMin = date('Y-m-01 00:00:00', strtotime('-' . $months . ' months', strtotime($fecha)));
            $fechaMax = date('Y-m-t 23:59:59', strtotime('-' . $months . ' months', strtotime($fecha)));

            while ($months >= 0) {

                $array = array();

                $string = "select count(mueble_cliente.noCliente) as numero, sum(mueble_cliente.cantidadRentada * mueble_cliente.precio) as ingreso from mueble_cliente where  mueble_cliente.inicio < '$fechaMax' AND ((mueble_cliente.fin > '$fechaMin' AND mueble_cliente.fin < '$fechaMax') OR mueble_cliente.fin IS NULL);";

                $query = mysqli_query($enlace, $string);

                $tupla = mysqli_fetch_array($query);

                $ingreso = 0;

                $numero = $tupla['numero'];
                $ingreso += $tupla['ingreso'];
                $fechastr = date('Y-m', strtotime($fechaMax));

                echo "            period: '$fechastr',\n";
                //echo "            numero: $numero,\n";
                echo "            ingreso: $ingreso\n";

                if($months > 0){
                    echo "}, {\n";
                }

                $months--;
                $fechaMin = date('Y-m-01 00:00:00', strtotime('-' . $months . ' months', strtotime($fecha)));
                $fechaMax = date('Y-m-t 23:59:59', strtotime('-' . $months . ' months', strtotime($fecha)));
            }
        echo "        }],\n";
        echo "        xkey: 'period',\n";
        //echo "        ykeys: ['numero', 'ingreso'],\n";
        //echo "        labels: ['Número Rentas', 'Ingreso'],\n";
        echo "        ykeys: ['ingreso'],\n";
        echo "        labels: ['Ingreso'],\n";
        echo "        pointSize: 2,\n";
        echo "        hideHover: 'auto',\n";
        //echo "        lineColors: ['#4DA74D', '#0B62A4'],\n";
        echo "        lineColors: ['#4DA74D'],\n";
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
