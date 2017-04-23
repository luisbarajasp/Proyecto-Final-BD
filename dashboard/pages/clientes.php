
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
        <?php $clientes = getClientes(); ?>
        <div id="page-wrapper" class="add">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Clientes</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-hover">
                      <tr>
                          <th>No. Cliente</th>
                          <th>Nombre</th>
                          <th>Email</th>
                          <th>Dirección</th>
                          <th>Teléfono</th>
                          <th>RFC</th>
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
            $noMueble = $_POST['noMueble'];
            $precio = $_POST['precio'];
            $created_at = date("Y-m-d H:i:s");

            // Validate that there are enough
            $cantidad = $_POST['cantidad'];
            $query = "SELECT * FROM mueble where noMueble = $noMueble";

            $mueble = mysqli_fetch_array(mysqli_query($enlace, $query));

            $left = (int)$mueble['cantidad'] - (int)$cantidad;

            //There are enough
            if($left >= 0){
                $tupla = "INSERT INTO `mueble_cliente` (`noCliente`, `noMueble`, `inicio`, `fin`, `precio`, `cantidadRentada`) VALUES ('$noCliente', '$noMueble', '$created_at', NULL, '$precio', '$cantidad')";
                $insert = mysqli_query($enlace, $tupla);

                $query = "update mueble SET cantidad=$left where noMueble=$noMueble;";
                $update = mysqli_query($enlace, $query);

                if($insert && $update){
                    echo "<div class='alert alert-success' role='alert'>Renta y cliente añadidos!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                }else{
                    if($insert){
                        $query = "delete from mueble_cliente where noMueble=$noMueble AND noCliente=$noCliente;";
                        $delete = mysqli_query($enlace, $query);
                    }elseif ($update) {
                        $cantidad = $mueble['cantidad'];
                        $query = "update mueble SET cantidad=$cantidad where noMueble=$noMueble;";
                        $update = mysqli_query($enlace, $query);
                    }
                    echo "<div class='alert alert-danger' role='alert'>No se pudo insertar la renta pero el cliente sí. Intenta de nuevo.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                }
            }else{
                echo "<div class='alert alert-danger' role='alert'>Error: no hay suficientes muebles disponibles<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            }

        }
        else{
            echo "<div class='alert alert-danger' role='alert'>No se pudo insertar el cliente ni la renta. Intenta de nuevo.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        }
    }

    if(isset($_POST['insertRent'])){
        $noCliente = $_POST['noCliente'];
        $noMueble = $_POST['noMueble'];
        $precio = $_POST['precio'];
        $created_at = date("Y-m-d H:i:s");

        // Validate that there are enough
        $cantidad = $_POST['cantidad'];
        $query = "SELECT * FROM mueble where noMueble = $noMueble";

        $mueble = mysqli_fetch_array(mysqli_query($enlace, $query));

        $left = (int)$mueble['cantidad'] - (int)$cantidad;

        //There are enough
        if($left >= 0){
            $tupla = "INSERT INTO `mueble_cliente` (`noCliente`, `noMueble`, `inicio`, `fin`, `precio`, `cantidadRentada`) VALUES ('$noCliente', '$noMueble', '$created_at', NULL, '$precio', '$cantidad')";
            $insert = mysqli_query($enlace, $tupla);

            $query = "update mueble SET cantidad=$left where noMueble=$noMueble;";
            $update = mysqli_query($enlace, $query);

            if($insert && $update){
                echo "<div class='alert alert-success' role='alert'>Renta añadida!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            }else{
                if($insert){
                    $query = "delete from mueble_cliente where noMueble=$noMueble AND noCliente=$noCliente;";
                    $delete = mysqli_query($enlace, $query);
                }elseif ($update) {
                    $cantidad = $mueble['cantidad'];
                    $query = "update mueble SET cantidad=$cantidad where noMueble=$noMueble;";
                    $update = mysqli_query($enlace, $query);
                }

                echo "<div class='alert alert-danger' role='alert'>No se pudo insertar la renta. Intenta de nuevo.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            }
        }else{
            echo "<div class='alert alert-danger' role='alert'>Error: no hay suficientes muebles disponibles<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        }


    }

?>

<?php } ?>
