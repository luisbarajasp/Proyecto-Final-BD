
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

        <div id="page-wrapper" >
                    
                            <!-- /.panel -->
                    <div class="panel panel-default panel-form">
                        <div class="panel-body">
                            <div class="row">
                                <form role="form"  method = "post">
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
                                        
                                    </div>
                                   

                                    <div class="col-xs-12">
                                        <div class="col-xs-12">
                                            <button type="submit" name ="BuscarRenta" class="btn btn-default">Buscar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    
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
<?php 
          if(isset($_POST['BuscarRenta'])){
          $clientes = getMuebleClientes($noCliente); 
                            foreach ($clientes as $cliente) {
                                $id = $cliente['noCliente'];
                                $mueble = $cliente['noMueble'];
                                echo "<tr>";
                                echo "<td>$id</td>";
                                echo "<td>$mueble</td>";
                            }
          }

    ?>
<?php } ?>
