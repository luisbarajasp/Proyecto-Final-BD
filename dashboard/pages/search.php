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

            $search = $_POST['search'];
            //echo "<script>alert('$search');</script>";

            $clientes = getSearchedClientes($search);
            $muebles = getSearchedMuebles($search);
            $bodegas = getSearchedBodegas($search);

            $rentasCliente = getRentasClientesPorMuebles($search);
            $rentasMueble = getRentasMuebles($search);

         ?>
        <div id="page-wrapper" class="search">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Búsqueda</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <i class="fa fa-users fa-fw"></i> Clientes
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <?php if(empty($clientes)) {?>
                                    <div class="is-empty">
                                        <h1><i class="fa fa-asterisk" aria-hidden="true"></i> No se encontraron resultados</h1>
                                    </div>
                                <?php }else{ ?>
                                    <div class="table-responsive">
                                        <table class="table table-hover" id="myTable">
                                          <tr>
                                              <th onclick="sortTable(0)">No. Cliente</th>
                                              <th onclick="sortTable(1)">Nombre</th>
                                              <th onclick="sortTable(2)">Email</th>
                                              <th onclick="sortTable(3)">Dirección</th>
                                              <th onclick="sortTable(4)">Teléfono</th>
                                              <th onclick="sortTable(5)">RFC</th>
                                              <th>Acciones</th>
                                          </tr>
                                              <?php


                                                foreach ($clientes as $cliente) {
                                                    $id = $cliente['noCliente'];
                                                    $nombre = $cliente['nombre'];
                                                    $email= $cliente['email'];
                                                    $direccion = $cliente['direccion'];
                                                    $telefono = $cliente['telefono'];
                                                    $RFC = $cliente['RFC'];
                                                    echo "<tr>";
                                                    echo "<td>$id</td>";
                                                    echo "<td>$nombre</td>";
                                                    echo "<td>$email</td>";
                                                    echo "<td>$direccion</td>";
                                                    echo "<td>$telefono</td>";
                                                    echo "<td>$RFC</td>";
                                                    echo "<td><a class='btn btn-default' href='edit_client.php?id=$id'>Editar</a><a class='btn btn-danger' href='delete_client.php?id=$id' onclick=\"return confirm('¿Estás seguro? ¡También se eliminarán las rentas en las que está!')\">Eliminar</a></td>";
                                                    echo "</tr>";
                                                }

                                               ?>
                                        </table>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-bookmark fa-fw"></i> Rentas activas encontradas
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <?php if(empty($rentasCliente)) {?>
                                    <div class="is-empty">
                                        <h1><i class="fa fa-asterisk" aria-hidden="true"></i> No se encontraron resultados</h1>
                                    </div>
                                <?php }else{ ?>
                                    <div class="table-responsive">
                                        <table class="table table-hover" id="myTable">
                                          <tr>
                                              <th onclick="sortTable(0)">No. Cliente</th>
                                              <th onclick="sortTable(1)">Nombre</th>
                                              <th onclick="sortTable(2)">Modelo</th>
                                              <th onclick="sortTable(3)">Cantidad</th>
                                          </tr>
                                              <?php

                                                foreach ($rentasCliente as $renta) {
                                                    $id = $renta['noCliente'];
                                                    $nombre = $renta['nombre'];
                                                    $modelo= $renta['modelo'];
                                                    $cantidad = $renta['cantidad'];
                                                    echo "<tr>";
                                                    echo "<td>$id</td>";
                                                    echo "<td>$nombre</td>";
                                                    echo "<td>$modelo</td>";
                                                    echo "<td>$cantidad</td>";
                                                    echo "</tr>";
                                                }

                                               ?>
                                        </table>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <i class="fa fa-bed fa-fw"></i> Muebles
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <?php if(empty($muebles)) {?>
                                    <div class="is-empty">
                                        <h1><i class="fa fa-asterisk" aria-hidden="true"></i> No se encontraron resultados</h1>
                                    </div>
                                <?php }else{ ?>
                                    <div class="table-responsive">
                                        <table class="table table-hover" id="MyTable">
                                          <tr>
                                              <th onclick="sortTable(0)">No. Mueble</th>
                                              <th onclick="sortTable(1)">Modelo</th>
                                              <th onclick="sortTable(2)">Categoria</th>
                                              <th onclick="sortTable(3)">Tipo</th>
                                              <th onclick="sortTable(4)">Costo</th>
                                              <th onclick="sortTable(5)">Cantidad</th>
                                              <th onclick="sortTable(6)">Bodega</th>
                                              <th>Acciones</th>
                                          </tr>
                                              <?php

                                                foreach ($muebles as $mueble) {
                                                    $noMueble = $mueble['noMueble'];
                                            		$modelo = $mueble['modelo'];
                                                    $categoria = $mueble['categoria'];
                                                    $tipo = $mueble['tipo'];
                                                    $costo = $mueble['costo'];
                                                    $fecha = $mueble['fecha'];
                                                    $descripcion = $mueble['descripcion'];
                                                    $cantidad = $mueble['cantidad'];
                                                    $noBodega = $mueble['NoBodega'];

                                                    if(is_null($noBodega)){
                                                        $bodega_name = "No tiene bodega asignada";
                                                    }else{
                                                        $query = "SELECT * FROM bodega where NoBodega = $noBodega";

                                                        $bodega = mysqli_fetch_array(mysqli_query($enlace, $query));

                                                        $bodega_name = $bodega['nombre'];
                                                    }


                                                    if((int)$cantidad < 1){
                                                        echo "<tr class='danger'>";
                                                    }elseif ((int)$cantidad < 4) {
                                                        echo "<tr class='warning'>";
                                                    }else{
                                                        echo "<tr>";
                                                    }
                                                    echo "<td>$noMueble</td>";
                                                    echo "<td>$modelo</td>";
                                                    echo "<td>$categoria</td>";
                                                    echo "<td>$tipo</td>";
                                                    echo "<td>$costo</td>";
                                                    echo "<td>$cantidad</td>";
                                                    echo "<td>$bodega_name</td>";
                                                    echo "<td><a class='btn btn-default' href='edit_mueble.php?id=$noMueble'>Editar</a><a class='btn btn-danger' href='delete_mueble.php?id=$noMueble' onclick=\"return confirm('¿Estás seguro? ¡También se eliminarán las rentas en las que está!')\">Eliminar</a></td>";
                                                    echo "</tr>";
                                                }

                                               ?>
                                        </table>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-bookmark fa-fw"></i> Rentas activas encontradas
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <?php if(empty($rentasMueble)) {?>
                                    <div class="is-empty">
                                        <h1><i class="fa fa-asterisk" aria-hidden="true"></i> No se encontraron resultados</h1>
                                    </div>
                                <?php }else{ ?>
                                    <div class="table-responsive">
                                        <table class="table table-hover" id="MyTable">
                                          <tr>
                                              <th onclick="sortTable(0)">No. Cliente</th>
                                              <th onclick="sortTable(1)">Nombre</th>
                                              <th onclick="sortTable(2)">Modelo</th>
                                              <th onclick="sortTable(3)">Cantidad</th>
                                          </tr>
                                              <?php

                                                foreach ($rentasMueble as $renta) {
                                                    $id = $renta['noCliente'];
                                                    $nombre = $renta['nombre'];
                                                    $modelo= $renta['modelo'];
                                                    $cantidad = $renta['cantidad'];
                                                    echo "<tr>";
                                                    echo "<td>$id</td>";
                                                    echo "<td>$nombre</td>";
                                                    echo "<td>$modelo</td>";
                                                    echo "<td>$cantidad</td>";
                                                    echo "</tr>";
                                                }

                                               ?>
                                        </table>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <i class="fa fa-building fa-fw"></i> Bodegas
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <?php if(empty($bodegas)) {?>
                                    <div class="is-empty">
                                        <h1><i class="fa fa-asterisk" aria-hidden="true"></i> No se encontraron resultados</h1>
                                    </div>
                                <?php }else{ ?>
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                          <tr>
                                              <th>No. bodega</th>
                                              <th>Nombre</th>
                                              <th>Ubicacion</th>
                                              <th>Acciones</th>
                                          </tr>
                                              <?php

                                                  foreach ($bodegas as $bodega) {
                                                      $id = $bodega['NoBodega'];
                                                      $nombre = $bodega['nombre'];
                                                      $ubicacion = $bodega['ubicacion'];
                                                      echo "<tr>";
                                                      echo "<td>$id</td>";
                                                      echo "<td>$nombre</td>";
                                                      echo "<td>$ubicacion</td>";
                                                      echo "<td><a class='btn btn-default' href='edit_bodega.php?id=$id'>Editar</a><a class='btn btn-danger' href='delete_bodega.php?id=$id' onclick=\"return confirm('¿Estás seguro, los muebles en esa bodega se quedaran sin regstro de bodega?!')\">Eliminar</a></td>";
                                                      echo "</tr>";
                                                  }

                                               ?>
                                        </table>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
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
