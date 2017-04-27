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
            $rentas = getDatosRentasActivas();
            $rentasTerminadas = getDatosRentasTerminadas();
        ?>
        <div id="page-wrapper" class="add">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Rentas</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <i class="fa fa-users fa-fw"></i> Activas
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="row">
                            <?php if(empty($rentas)) {?>
                                <div class="is-empty">
                                    <h1><i class="fa fa-asterisk" aria-hidden="true"></i> No se encontraron rentas activas</h1>
                                </div>
                            <?php }else{ ?>
                                <div class="table-responsive">
                                    <table class="table table-hover" id="myTable">
                                      <tr>
                                          <th onclick="sortTable(0)">No. Renta</th>
                                          <th onclick="sortTable(1)">Cliente</th>
                                          <th onclick="sortTable(3)">Desde</th>
                                          <th onclick="sortTable(3)">Costo</th>
                                          <th onclick="sortTable(4)">Dia de pago</th>
                                          <th>Acciones</th>
                                      </tr>
                                          <?php

                                            foreach ($rentas as $renta) {
                                                $noRenta = $renta['noRenta'];
                                                $nombre = $renta['nombre'];
                                                $desde= $renta['inicio'];
                                                $total = $renta['total'];
                                                $dia = $renta['dia'];
                                                echo "<tr>";
                                                echo "<td>$noRenta</td>";
                                                echo "<td>$nombre</td>";
                                                echo "<td>" . date("d/m/Y", strtotime($desde)) . "</td>";
                                                echo "<td>" . number_format($total) . "</td>";
                                                echo "<td>" . date("d/m", strtotime($dia)) . "</td>";
                                                echo "<td><a class='btn btn-danger' href='delete_renta.php?id=$noRenta' onclick=\"return confirm('Confirma la terminacion de la renta')\"> Devolver</a>  <a class='btn btn-default' href= 'ver_renta.php?id=$noRenta'><p>Ver muebles</p></a> </td>";
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
            <div class="row">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <i class="fa fa-users fa-fw"></i> Terminadas
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="row">
                            <?php if(empty($rentasTerminadas)) {?>
                                <div class="is-empty">
                                    <h1><i class="fa fa-asterisk" aria-hidden="true"></i> No se encontraron rentas terminadas</h1>
                                </div>
                            <?php }else{ ?>
                                <div class="table-responsive">
                                    <table class="table table-hover" id="myTable">
                                      <tr>
                                          <th onclick="sortTable(0)">No. Renta</th>
                                          <th onclick="sortTable(1)">Cliente</th>
                                          <th onclick="sortTable(3)">Desde</th>
                                          <th onclick="sortTable(3)">Costo</th>
                                          <th onclick="sortTable(4)">Dia de pago</th>
                                          <th>Acciones</th>
                                      </tr>
                                          <?php

                                            foreach ($rentasTerminadas as $renta) {
                                                $noRenta = $renta['noRenta'];
                                                $nombre = $renta['nombre'];
                                                $desde= $renta['inicio'];
                                                $total = $renta['total'];
                                                $dia = $renta['dia'];
                                                echo "<tr>";
                                                echo "<td>$noRenta</td>";
                                                echo "<td>$nombre</td>";
                                                echo "<td>$desde</td>";
                                                echo "<td>$total</td>";
                                                echo "<td>$dia</td>";
                                                echo "<td><a class='btn btn-danger' href='delete_renta.php?id=$noRenta' onclick=\"return confirm('Confirma la terminacion de la renta')\"> Devolver</a>  <a class='btn btn-default' href= 'ver_renta.php?id=$noRenta'><p>Ver muebles</p></a> </td>";
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

    <script type="text/javascript">
        $(function(){
            $('.form-link').on('click',function(){
                id = $(this).find('a').attr("href");
                $('.form-link').removeClass('active');
                $(this).addClass('active');
                $('.panel-form').hide();
                $(id).show();
            });
            $('form').each(function(){
                $(this).validate({
                    errorClass: "has-error",
                    validClass: "has-success",
                    highlight: function(element, errorClass, validClass) {
                        $(element).closest('.form-group').addClass(errorClass).removeClass(validClass);
                    },
                    unhighlight: function(element, errorClass, validClass) {
                        $(element).closest('.form-group').removeClass(errorClass).addClass(validClass);
                    }
                });
            });
        });
    </script>

</body>

</html>

<?php } ?>
