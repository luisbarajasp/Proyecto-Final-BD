
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

        <div id="page-wrapper" class="add">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Registro de Pagos</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-xs-12 form-links">
                    <div class="col-sm-6 col-xs-12 form-link">
                        <a href="#cliente"><p>Por cliente</p></a>
                    </div>
                    <div class="col-sm-6 col-xs-12 form-link">
                        <a href="#fecha"><p>Por fecha</p></a>
                    </div>
                </div>
            </div>
            <div class="row forms">
                <div class="col-lg-12">
                 
                    <!-- /.panel -->
                    <div class="panel panel-default panel-form" id="cliente">
                        <div class="panel-body">
                            <div class="row">
                                <form role="form"  method="post" class="porCliente">
                                    <div class="col-lg-12">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Cliente</label>
                                                <select class="form-control" name="noCliente" required>
                                                    <option value="">--</option>
                                                    <?php

                                                        $clientes = getClientes();

                                                        foreach ($clientes as $cliente) {
                                                            $noCliente = $cliente['noCliente'];
                                                            $nombre = $cliente['nombre'];
                                                            $email= $cliente['email'];

                                                            echo "<option value='$noCliente'>id: $noCliente / nombre: $nombre / email: $email</option>";
                                                        }

                                                     ?>
                                                </select>
                                            </div>
                                        </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-12">
                                        <button type="submit" name="porCliente" id = class="btn btn-default">Buscar</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>

                </div>
                <!-- /.col-lg-12 -->
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

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- jQuery Validation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js" charset="utf-8"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js" charset="utf-8"></script>

</body>

</html>
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
            $('#existent #another-mueble').on('click',function(e){
                e.preventDefault();
                var muebleSelect = $('#existent #mueble-select').html();
                $('#existent .add-rent')
                    .append
                    ("<hr style=\"border-color: #d0d0d0; width: 100%;\">" +
                        "<div class=\"col-lg-12\">" +
                            "<div class=\"col-lg-6\">" +
                                    muebleSelect +
                            "</div>" +
                            "<div class=\"col-lg-6\">" +
                                "<div class=\"form-group\">" +
                                    "<label>Cantidad</label>" +
                                    "<input class=\"form-control\" name=\"cantidad[]\" type=\"digits\" required>" +
                                "</div>" +
                            "</div>" +
                        "</div>" +
                        "<div class=\"col-lg-12\">" +
                            "<div class=\"col-lg-6\">" +
                                "<div class=\"form-group\">" +
                                    "<label>Precio</label>" +
                                    "<input class=\"form-control\" name=\"precio[]\" type=\"number\" required>" +
                                "</div>" +
                            "</div>" +
                        "</div>");
            });
            $('#new #another-mueble').on('click',function(e){
                e.preventDefault();
                var muebleSelect = $('#new #mueble-select').html();
                $('#new .add-rent')
                    .append
                    ("<hr style=\"border-color: #d0d0d0; width: 100%;\">" +
                        "<div class=\"col-lg-12\">" +
                            "<div class=\"col-lg-6\">" +
                                    muebleSelect +
                            "</div>" +
                            "<div class=\"col-lg-6\">" +
                                "<div class=\"form-group\">" +
                                    "<label>Cantidad</label>" +
                                    "<input class=\"form-control\" name=\"cantidad[]\" type=\"digits\" required>" +
                                "</div>" +
                            "</div>" +
                        "</div>" +
                        "<div class=\"col-lg-12\">" +
                            "<div class=\"col-lg-6\">" +
                                "<div class=\"form-group\">" +
                                    "<label>Precio</label>" +
                                    "<input class=\"form-control\" name=\"precio[]\" type=\"number\" required>" +
                                "</div>" +
                            "</div>" +
                        "</div>");
            });
        });
    </script>

<?php
    if(isset($_POST['porCliente'])){
		$noCliente =$_POST['noCliente'];
        $query = mysqli_query($enlace, "Select noRenta, fecha, total From renta NATURAL JOIN pago WHERE noCliente =$noCliente");
        while ($tupla=mysqli_fetch_array($query)){
                                $noRenta = $tupla['noRenta'];
                                $fecha = $tupla['nombre'];
                                $total= $total['inicio'];
                                echo "<tr>";
                                echo "<td>$noRenta</td>";
                                echo "<td>$fecha</td>";
                                echo "<td>$total</td>";
                                echo "<td><a class='btn btn-danger' href='delete_renta.php?id=$noRenta' onclick=\"return confirm('Confirma la terminacion de la renta')\"> Devolver</a>  <a class='btn btn-default' href= '#muebles'><p>Ver muebles</p></a> </td>";
                                echo "</tr>";
     }


    }
?>

<?php } ?>
