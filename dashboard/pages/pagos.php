
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
                                <form role="form" class="porCliente">
                                    <div class="col-lg-12">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Cliente</label>
                                                <select class="form-control" name="id" required onchange="showPayUser(this.value)">
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
                                </form>
                            </div>
                            <!-- /.row (nested) -->
                            <div class="row">
                                <div class="table-responsive" id="show-results"></div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <div class="panel panel-default panel-form" id="fecha">
                        <div class="panel-body">
                            <div class="row">
                                <form role="form" class="porCliente" onsubmit="showPayDate()">
                                    <div class="col-lg-12">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <label>Fecha</label>

                                                </div>
                                                <div class="col-xs-3">
                                                    <select class="form-control" name="day" id="day" required>
                                                        <option value="">Dia</option>
                                                        <?php

                                                            for ($i=1; $i < 32; $i++) {
                                                                if($i < 10){
                                                                    $e = "0" . $i;
                                                                }else{
                                                                    $e = $i;
                                                                }
                                                                echo "<option value='$e'>$e</option>";
                                                            }

                                                         ?>
                                                    </select>
                                                </div>
                                                <div class="col-xs-3">
                                                    <select class="form-control" name="month" id="month" required>
                                                        <option value="">Mes</option>
                                                        <?php

                                                        for ($i=1; $i < 13; $i++) {
                                                            if($i < 10){
                                                                $e = "0" . $i;
                                                            }else{
                                                                $e = $i;
                                                            }
                                                            echo "<option value='$e'>$e</option>";
                                                        }

                                                         ?>
                                                    </select>
                                                </div>
                                                <div class="col-xs-3">
                                                    <select class="form-control" name="year" id="year" required onchange="showPayDate()">
                                                        <option value="">Año</option>
                                                        <?php

                                                        for ($i=2017; $i < 2030; $i++) {
                                                            echo "<option value='$i'>$i</option>";
                                                        }

                                                         ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.row (nested) -->
                            <div class="row">
                                <div class="table-responsive" id="show-results"></div>
                            </div>
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
         function showPayUser(str) {
            if (str == "") {
                document.getElementById("show-results").innerHTML = "";
                return;
            } else {
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        // div = document.getElementById("cliente");
                        // div.getElementById("show-results").innerHTML = this.responseText;
                        jQuery('#cliente #show-results').html(this.responseText);
                    }
                };
                xmlhttp.open("GET","get_pagos.php?q="+str,true);
                xmlhttp.send();
            }
        }
        function showPayDate() {
            str = document.getElementById("year").value;
            str += "-";
            str += document.getElementById("month").value;
            str += "-"
            str += document.getElementById("day").value;
           if (str.length < 9) {
               document.getElementById("show-results").innerHTML = "";
               return;
           } else {
               if (window.XMLHttpRequest) {
                   // code for IE7+, Firefox, Chrome, Opera, Safari
                   xmlhttp = new XMLHttpRequest();
               } else {
                   // code for IE6, IE5
                   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
               }
               xmlhttp.onreadystatechange = function() {
                   if (this.readyState == 4 && this.status == 200) {
                    //    div = document.getElementById("fecha");
                    //    div.getElementById("show-results").innerHTML = this.responseText;
                       jQuery('#fecha #show-results').html(this.responseText);
                   }
               };
               xmlhttp.open("GET","get_pagos_date.php?q="+str,true);
               xmlhttp.send();
           }
           return false;
       }
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

<?php } ?>
