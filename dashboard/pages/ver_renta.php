
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
            $noRenta = $_GET['id'];

            $query = "SELECT noRenta, nombre, inicio, total, dia FROM renta NATURAL JOIN cliente where noRenta = $noRenta";

            $renta = mysqli_fetch_array(mysqli_query($enlace, $query));

            $nombre = $renta['nombre'];
            $desde= $renta['inicio'];
            $total = $renta['total'];
            $dia = $renta['dia'];

            $muebles = getMueblesRenta($noRenta);
        ?>
        <div id="page-wrapper" class="add">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Renta</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">

            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <i class="fa fa-bookmark fa-fw"></i> Detalles de la renta
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <ul class="rent-details">
                                    <li>No. Renta: <?php echo $noRenta ?></li>
                                    <li>Cliente: <?php echo $nombre ?></li>
                                    <li>Desde: <?php echo date("d M Y", strtotime($desde)) ?></li>
                                    <li>Costo: <?php echo number_format($total) ?></li>
                                    <li>Día de pago: <?php echo date("d M", strtotime($desde)) ?></li>
                                </ul>
                            </div>
                            </div>
                        </div>
                </div>
                <div class="col-lg-9">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <i class="fa fa-bed fa-fw"></i> Muebles
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                    <div class="table-responsive">
                                        <table class="table table-hover" id="myTable">
                                          <tr>
                                              <th onclick="sortTable(0)">No. Mueble</th>
                                              <th onclick="sortTable(1)">Modelo</th>
                                              <th onclick="sortTable(2)">Categoria</th>
                                              <th onclick="sortTable(3)">Tipo</th>
                                              <th onclick="sortTable(4)">Precio de renta</th>
                                              <th onclick="sortTable(5)">Cantidad rentada</th>
                                          </tr>
                                              <?php

                                                foreach ($muebles as $mueble) {
                                                    $noMueble = $mueble['noMueble'];
                                            		$modelo = $mueble['modelo'];
                                                    $categoria = $mueble['categoria'];
                                                    $tipo = $mueble['tipo'];
                                                    $precio = $mueble['precio'];
                                                    $cantidad = $mueble['cantidad'];

                                                    echo "<td>$noMueble</td>";
                                                    echo "<td>$modelo</td>";
                                                    echo "<td>$categoria</td>";
                                                    echo "<td>$tipo</td>";
                                                    echo "<td>" . number_format($precio) . "</td>";
                                                    echo "<td>$cantidad</td>";
                                                    echo "</tr>";
                                                }

                                               ?>
                                        </table>
                                    </div>
                                    </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <div class="row">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- jQuery Validation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js" charset="utf-8"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js" charset="utf-8"></script>

</body>

</html>

<?php } ?>
