
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
                    <h1 class="page-header">Nueva Renta</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-xs-12 form-links">
                    <div class="col-sm-6 col-xs-12 form-link">
                        <a href="#new"><p>Nuevo Cliente</p></a>
                    </div>
                    <div class="col-sm-6 col-xs-12 form-link">
                        <a href="#existent"><p>Cliente Existente</p></a>
                    </div>
                </div>
            </div>
            <div class="row forms">
                <div class="col-lg-12">
                    <div class="panel panel-default panel-form" id="new">
                        <div class="panel-body">
                            <div class="row">
                                <form role="form"  method = "post">
                                    <div class="col-lg-12">
                                        <h2>Datos del cliente</h2>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <input class="form-control" name="nombre" type="text" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control" name="email" type="email" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Dirección</label>
                                                <input class="form-control" name="direccion" type="text" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Teléfono</label>
                                                <input class="form-control" name="telefono" type="digits" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>RFC</label>
                                                <input class="form-control" name="RFC" type="text" required>
                                            </div>
                                        </div>

                                    </div>
                                    <hr>
                                    <div class="col-lg-12">
                                        <h2>Datos de la renta</h2>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Dia de Pago</label>
                                                <input class="form-control" name="dia" type="text" placeholder="YYYY/MM/DD" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mueble-form-container">
                                        <hr style="border-color: #d0d0d0; width: 100%;">
                                        <div class="col-lg-12">
                                            <div class="col-lg-6">
                                                <div class="form-group" id="mueble-select">
                                                    <label>Mueble</label>
                                                    <select class="form-control" name="noMueble[]" required>
                                                        <option value="">--</option>
                                                        <?php

                                                            $muebles = getMuebles();

                                                            foreach ($muebles as $mueble) {
                                                                $noMueble = $mueble['noMueble'];
                                                                $modelo = $mueble['modelo'];
                                                                $categoria = $mueble['categoria'];
                                                                $cantidad = $mueble['cantidad'];

                                                                if((int)$cantidad > 0){
                                                                    echo "<option value='$noMueble'>id: $noMueble / modelo: $modelo / categoria: $categoria</option>";
                                                                }else{
                                                                    echo "<option value='$noMueble' disabled>id: $noMueble / modelo: $modelo / categoria: $categoria. No hay existencias</option>";
                                                                }
                                                            }

                                                         ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Cantidad</label>
                                                    <input class="form-control" name="cantidad[]" type="digits" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Precio</label>
                                                    <input class="form-control" name="precio[]" type="number" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="add-rent"></div>
                                    <div class="col-xs-12" style="margin: 10px 0;">
                                        <div class="col-xs-12">
                                            <a id="another-mueble" class="btn btn-primary">Añadir otro mueble</a>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="col-xs-12">
                                            <button type="submit" name ="insertRentClient" class="btn btn-default">Guardar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default panel-form" id="existent">
                        <div class="panel-body">
                            <div class="row">
                                <form role="form"  method="post" class="insertRent">
                                    <div class="col-lg-12">
                                        <div class="col-lg-6">
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
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Dia de Pago</label>
                                                <input class="form-control" name="dia" type="text" placeholder="YYYY/MM/DD" required>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="mueble-form-container">
                                         <hr style="border-color: #d0d0d0; width: 100%;">
                                         <div class="col-lg-12">
                                             <div class="col-lg-6">
                                                 <div class="form-group" id="mueble-select">
                                                     <label>Mueble</label>
                                                     <select class="form-control" name="noMueble[]" required>
                                                         <option value="">--</option>
                                                         <?php

                                                             $muebles = getMuebles();

                                                             foreach ($muebles as $mueble) {
                                                                 $noMueble = $mueble['noMueble'];
                                                                 $modelo = $mueble['modelo'];
                                                                 $categoria = $mueble['categoria'];
                                                                 $cantidad = $mueble['cantidad'];

                                                                 if((int)$cantidad > 0){
                                                                     echo "<option value='$noMueble'>id: $noMueble / modelo: $modelo / categoria: $categoria</option>";
                                                                 }else{
                                                                     echo "<option value='$noMueble' disabled>id: $noMueble / modelo: $modelo / categoria: $categoria. No hay existencias</option>";
                                                                 }
                                                             }

                                                          ?>
                                                     </select>
                                                 </div>
                                             </div>
                                             <div class="col-lg-6">
                                                 <div class="form-group">
                                                     <label>Cantidad</label>
                                                     <input class="form-control" name="cantidad[]" type="digits" required>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="col-lg-12">
                                             <div class="col-lg-6">
                                                 <div class="form-group">
                                                     <label>Precio</label>
                                                     <input class="form-control" name="precio[]" type="number" required>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>

                                <div class="add-rent"></div>
                                <div class="col-xs-12" style="margin: 10px 0;">
                                    <div class="col-xs-12">
                                        <a id="another-mueble" class="btn btn-primary">Añadir otro mueble</a>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-12">
                                        <button type="submit" name="insertRent" class="btn btn-default">Guardar</button>
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
                    ("<div class=\"mueble-form-container\">" +
                        "<hr style=\"border-color: #d0d0d0; width: 100%;\">" +
                        "<div class=\"remove\">" +
                            "<i class=\"fa fa-times\"></i>" +
                        "</div>" +
                        "<div class=\"col-lg-12 mueble-form-container\">" +

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
                            "</div>" +
                        "</div>");
            });
            $('#new #another-mueble').on('click',function(e){
                e.preventDefault();
                var muebleSelect = $('#new #mueble-select').html();
                $('#new .add-rent')
                    .append
                    ("<div class=\"mueble-form-container\">" +
                        "<hr style=\"border-color: #d0d0d0; width: 100%;\">" +
                        "<div class=\"remove\">" +
                            "<i class=\"fa fa-times\"></i>" +
                        "</div>" +
                        "<div class=\"col-lg-12 mueble-form-container\">" +

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
                            "</div>" +
                        "</div>");
            });
            $('.add-rent').on('click', '.remove' ,function(){
                $(this).closest('.mueble-form-container').remove();
            });
        });

    </script>

</body>

</html>

<?php
    if(isset($_POST['insertRentClient'])){
		$nombre =$_POST['nombre'];
        $email= $_POST['email'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $RFC = $_POST['RFC'];

        $tupla = "INSERT INTO `cliente` (`noCliente`, `nombre`, `email`, `direccion`, `telefono`, `RFC`) VALUES (NULL, '$nombre', '$email', '$direccion', '$telefono', '$RFC')";

        $insert = mysqli_query($enlace, $tupla);


        if($insert){
            $noCliente = mysqli_insert_id($enlace);
            $inicio = date("Y-m-d H:i:s");
            $dia = date("Y-m-d 00:00:00", strtotime($_POST['dia']));

            $suficientes = true;
            $noMuebleNoSuf = 0;

            $left = array();

            // Validate there are enough
            foreach ($_POST['noMueble'] as $key => $value) {
                $noMueble = $_POST['noMueble'][$key];
                $cantidad = $_POST['cantidad'][$key];
                $query = "SELECT * FROM mueble where noMueble = $noMueble";

                $mueble = mysqli_fetch_array(mysqli_query($enlace, $query));

                if((int)$mueble['cantidad'] < (int)$cantidad){
                    $suficientes = false;
                    $noMuebleNoSuf = $noMueble;
                    break;
                }else{
                    $left[$key] = (int)$mueble['cantidad'] - (int)$cantidad;
                }
            }

            if($suficientes){

                $query = "INSERT INTO `renta` (`noRenta`, `inicio`, `fin`, `dia`, `total`, `noCliente`) VALUES (NULL, '$inicio', NULL, '$dia', NULL, '$noCliente')";
                $insert = mysqli_query($enlace, $query);

                $noRenta = mysqli_insert_id($enlace);

                if ($insert){
                    $error = false;
                    $total = 0;
                    /* Muebles */
                    foreach ($_POST['noMueble'] as $key => $value) {
                        $noMueble = $_POST['noMueble'][$key];
                        $precio = $_POST['precio'][$key];
                        $cantidad = $_POST['cantidad'][$key];

                        $remaining = $left[$key];

                        $total += (int)$precio * (int)$cantidad;

                        $tupla = "INSERT INTO `mueble_cliente` (`noRenta`, `noMueble`, `precio`, `cantidadRentada`) VALUES ('$noRenta', '$noMueble', '$precio', '$cantidad')";
                        $insert = mysqli_query($enlace, $tupla);

                        $query = "update mueble SET cantidad=$remaining where noMueble=$noMueble;";
                        $update = mysqli_query($enlace, $query);

                        if(!$insert || !$update){
                            if($insert){
                                $query = "delete from renta where noRenta=$noRenta;";
                                $delete = mysqli_query($enlace, $query);
                            }elseif ($update) {
                                foreach ($_POST['noMueble'] as $key => $value) {
                                    $noMueble = $_POST['noMueble'][$key];
                                    $cantidad = $_POST['cantidad'][$key];
                                    $query = "update mueble SET cantidad=$cantidad where noMueble=$noMueble;";
                                    $update = mysqli_query($enlace, $query);
                                }

                            }

                            echo "<div class='alert alert-danger' role='alert'>No se pudo insertar la renta. Intenta de nuevo.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                            $error = true;
                            break;
                        }
                    }

                    if(!$error){
                        $query = "update renta SET total=$total where noRenta=$noRenta;";
                        $update = mysqli_query($enlace, $query);

                        echo "<div class='alert alert-success' role='alert'>Renta añadida<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                    }

                }else{
                    echo "<div class='alert alert-danger' role='alert'>No se pudo insertar la renta. Intenta de nuevo.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                }

            }else{
                echo "<div class='alert alert-danger' role='alert'>Error: no hay suficientes muebles disponibles del mueble: $noMuebleNoSuf<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            }

        }
        else{
            echo "<div class='alert alert-danger' role='alert'>No se pudo insertar el cliente ni la renta. Intenta de nuevo.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        }
    }

    if(isset($_POST['insertRent'])){
        $noCliente = $_POST['noCliente'];
        $inicio = date("Y-m-d H:i:s");
        $dia = date("Y-m-d 00:00:00", strtotime($_POST['dia']));

        $suficientes = true;
        $noMuebleNoSuf = 0;

        $left = array();

        // Validate there are enough
        foreach ($_POST['noMueble'] as $key => $value) {
            $noMueble = $_POST['noMueble'][$key];
            $cantidad = $_POST['cantidad'][$key];
            $query = "SELECT * FROM mueble where noMueble = $noMueble";

            $mueble = mysqli_fetch_array(mysqli_query($enlace, $query));

            if((int)$mueble['cantidad'] < (int)$cantidad){
                $suficientes = false;
                $noMuebleNoSuf = $noMueble;
                break;
            }else{
                $left[$key] = (int)$mueble['cantidad'] - (int)$cantidad;
            }
        }

        if($suficientes){

            $query = "INSERT INTO `renta` (`noRenta`, `inicio`, `fin`, `dia`, `total`, `noCliente`) VALUES (NULL, '$inicio', NULL, '$dia', NULL, '$noCliente')";
            $insert = mysqli_query($enlace, $query);

            $noRenta = mysqli_insert_id($enlace);

            if ($insert){
                $error = false;
                $total = 0;
                /* Muebles */
                foreach ($_POST['noMueble'] as $key => $value) {
                    $noMueble = $_POST['noMueble'][$key];
                    $precio = $_POST['precio'][$key];
                    $cantidad = $_POST['cantidad'][$key];

                    $remaining = $left[$key];

                    $total += (int)$precio;

                    $tupla = "INSERT INTO `mueble_cliente` (`noRenta`, `noMueble`, `precio`, `cantidadRentada`) VALUES ('$noRenta', '$noMueble', '$precio', '$cantidad')";
                    $insert = mysqli_query($enlace, $tupla);

                    $query = "update mueble SET cantidad=$remaining where noMueble=$noMueble;";
                    $update = mysqli_query($enlace, $query);

                    if(!$insert || !$update){
                        if($insert){
                            $query = "delete from renta where noRenta=$noRenta;";
                            $delete = mysqli_query($enlace, $query);
                        }elseif ($update) {
                            foreach ($_POST['noMueble'] as $key => $value) {
                                $noMueble = $_POST['noMueble'][$key];
                                $cantidad = $_POST['cantidad'][$key];
                                $query = "update mueble SET cantidad=$cantidad where noMueble=$noMueble;";
                                $update = mysqli_query($enlace, $query);
                            }

                        }

                        echo "<div class='alert alert-danger' role='alert'>No se pudo insertar la renta. Intenta de nuevo.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                        $error = true;
                        break;
                    }
                }

                if(!$error){
                    $query = "update renta SET total=$total where noRenta=$noRenta;";
                    $update = mysqli_query($enlace, $query);

                    echo "<div class='alert alert-success' role='alert'>Renta añadida<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                }

            }else{
                echo "<div class='alert alert-danger' role='alert'>No se pudo insertar la renta. Intenta de nuevo.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            }

        }else{
            echo "<div class='alert alert-danger' role='alert'>Error: no hay suficientes muebles disponibles del mueble: $noMuebleNoSuf<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        }

    }

?>

<?php } ?>
