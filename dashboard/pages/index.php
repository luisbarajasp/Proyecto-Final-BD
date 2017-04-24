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
            $numero_clientes = getNoClientes();

            $mueblesSinRentar = getNoMueblesDis();

            $numero_bodegas = getNoBodegas();

            $numero_mueble_clientes = getNoRentas();

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
                        <a href="clientes.php">
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
                        <a href="muebles.php">
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
                        <a href="bodegas.php">
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
                        <a href="rentas.php">
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-money fa-fw"></i> Pagos de las rentas este mes
                        </div>
                         
                <div class="table-responsive">
                    <table class="table table-hover">
                      <tr>
                          <th>Cliente</th>
                          <th>Dia de Pago</th>
                          <th>Cantidad</th>
                          <th>Pago</th>
                      </tr>
                        <?php
           $mes = date("Y-m");
            $rentas = getNoRenta();
            foreach ($rentas as $renta) {
            if (!getPagos($mes, $renta['noRenta'])){
                $info = getDatosPago($renta['noRenta']);
                                $nombre = $info['nombre'];
                                $dia= $info['dia'];
                                $cantidad = $info['cantidad'];
                                echo "<tr>";
                                echo "<td>$nombre</td>";
                                echo "<td>$dia</td>";
                                echo "<td>$cantidad</td>";
                                echo "<td><a class='btn btn-danger' href='delete_client.php?id=1' onclick=\"return confirm('¿Estás seguro? ¡También se eliminarán las rentas en las que está!')\">Eliminar</a></td>";
                                echo "</tr>";
                
            }
            }
          
        ?>
                       </table>
                </div>
            </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>
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
        $categorias = getCantidadCategoria();

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

                $string = "select count(mueble_cliente.noRenta) as numero, sum(mueble_cliente.cantidadRentada * mueble_cliente.precio) as ingreso from mueble_cliente where  mueble_cliente.inicio < '$fechaMax' AND ((mueble_cliente.fin > '$fechaMin' AND mueble_cliente.fin < '$fechaMax') OR mueble_cliente.fin IS NULL);";

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
