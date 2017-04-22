
<?php
session_start();
include("../functions/functions.php");

    if(!isset($_SESSION['usuario'])){

        echo "<script>window.location.href='Bases de datos/Proyecto Final/404.html';</script>";

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
                    <h1 class="page-header">Añadir Registro</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-xs-12 form-links">
                    <div class="col-sm-4 col-xs-12 form-link">
                        <a href="#cliente"><p>Cliente</p></a>
                    </div>
                    <div class="col-sm-4 col-xs-12 form-link">
                        <a href="#mueble"><p>Mueble</p></a>
                    </div>
                    <div class="col-sm-4 col-xs-12 form-link">
                        <a href="#bodega"><p>Bodega</p></a>
                    </div>
                </div>
            </div>
            <div class="row forms">
                <div class="col-lg-12">
                    <div class="panel panel-default panel-form" id="cliente">
                        <div class="panel-body">
                            <div class="row">
                                <form role="form"  method = "post">
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
                                    <div class="col-xs-12">
                                        <div class="col-lg-12">
                                            <button type="submit" name ="insertCliente" class="btn btn-default">Guardar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <!-- Options to mueble -->
                    <div class="row link-form" id="mueble">
                        <div class="col-xs-12 form-links">
                            <div class="col-sm-6 col-xs-12 form-link anidado">
                                <a href="#new_bodega"><p>Nueva Bodega</p></a>
                            </div>
                            <div class="col-sm-6 col-xs-12 form-link anidado">
                                <a href="#existent_bodega"><p>Bodega Existente</p></a>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default panel-form" id="new_bodega">
                        <div class="panel-body">
                            <div class="row">
                                <form role="form"  method = "post">
                                    <div class="col-lg-12">
                                        <h2>Datos de la bodega</h2>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <input class="form-control" name="nombre" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Dirección</label>
                                                <input class="form-control" name="direccion" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <h2>Datos del mueble</h2>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Modelo</label>
                                                <input class="form-control" name="modelo" type="text" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Categoria</label>
                                                <select class="form-control" name="categoria" required>
                                                    <option value="">--</option>
                                                    <option value="recamara">Recámara</option>
                                                    <option value="sala">Sala</option>
                                                    <option value="comedor">Comedor</option>
                                                    <option value="blancos">Blancos</option>
                                                    <option value="varios">Varios</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Tipo de mueble</label>
                                                <input class="form-control" name="tipo" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Costo</label>
                                                <input class="form-control" name="costo" type="number" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                         <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Cantidad</label>
                                                <input class="form-control" name="cantidad" type="number" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Descripción</label>
                                                <textarea class="form-control" name="descripcion" style="max-width:100%"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12">
                                        <div class="col-xs-12">
                                            <button type="submit" name ="insertMuebleBodega" class="btn btn-default">Guardar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <div class="panel panel-default panel-form" id="existent_bodega">
                        <div class="panel-body">
                            <div class="row">
                                <form role="form"  method = "post">
                                    <div class="col-lg-12">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Bodega</label>
                                                <select class="form-control" name="noBodega" required>
                                                    <option value="">--</option>
                                                    <?php

                                                        $bodegas = getBodegas();

                                                        foreach ($bodegas as $bodega) {
                                                            $noBodega = $bodega['NoBodega'];
                                                            $nombre = $bodega['nombre'];

                                                            echo "<option value='$noBodega'>$nombre</option>";
                                                        }

                                                     ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Modelo</label>
                                                <input class="form-control" name="modelo" type="text" required>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-12">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Categoria</label>
                                                <select class="form-control" name="categoria" required>
                                                    <option value="">--</option>
                                                    <option value="recamara">Recámara</option>
                                                    <option value="sala">Sala</option>
                                                    <option value="comedor">Comedor</option>
                                                    <option value="blancos">Blancos</option>
                                                    <option value="varios">Varios</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Tipo de mueble</label>
                                                <input class="form-control" name="tipo" required>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-12">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Costo</label>
                                                <input class="form-control" name="costo" type="number" required>
                                            </div>
                                        </div>
                                         <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Cantidad</label>
                                                <input class="form-control" name="cantidad" type="number" required>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-12">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Descripción</label>
                                                <textarea class="form-control" name="descripcion" style="max-width:100%"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12">
                                        <div class="col-xs-12">
                                            <button type="submit" name ="insertMueble" class="btn btn-default">Guardar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <div class="panel panel-default panel-form" id="bodega">
                        <div class="panel-body">
                            <div class="row">
                                <form role="form" method = "post">
                                    <div class="col-lg-12">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <input class="form-control" name="nombre" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Dirección</label>
                                                <input class="form-control" name="direccion" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="col-xs-12">
                                            <button type="submit" name ="insertBodega" class="btn btn-default">Guardar</button>
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
                $('.panel-form').hide();
                if(!($(this).hasClass('anidado'))){
                    $('.form-link').removeClass('active');
                    $('.link-form').hide();
                }else{
                    $('.form-link.anidado').removeClass('active');

                }
                $(this).addClass('active');

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
    if(isset($_POST['insertCliente'])){
		$nombre =$_POST['nombre'];
        $email= $_POST['email'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $RFC = $_POST['RFC'];

        $tupla = "INSERT INTO `cliente` (`noCliente`, `nombre`, `email`, `direccion`, `telefono`, `RFC`) VALUES (NULL, '$nombre', '$email', '$direccion', '$telefono', '$RFC')";

        $insert = mysqli_query($enlace, $tupla);

        if($insert){
            echo "<div class='alert alert-success' role='alert'>Cliente Añadido!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        }
        else{
            echo "<div class='alert alert-danger' role='alert'>No se pudo insertar el cliente. Intenta de nuevo.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        }
    }

    if(isset($_POST['insertMuebleBodega'])){
        $nombre =$_POST['nombre'];
		$ubicacion =$_POST['direccion'];

        $tupla = "INSERT INTO `bodega` (`NoBodega`, `nombre`, `ubicacion`) VALUES (NULL, '$nombre', '$ubicacion')";

        $insert = mysqli_query($enlace, $tupla);

        if($insert){
            $noBodega = mysqli_insert_id($enlace);
            $modelo = $_POST['modelo'];
            $categoria = $_POST['categoria'];
            $tipo = $_POST['tipo'];
            $costo = $_POST['costo'];
            $descripcion = $_POST['descripcion'];
            $cantidad = $_POST['cantidad'];
            $fecha = date("Y-m-d H:i:s");

            $tupla = "INSERT INTO `mueble` (`noMueble`, `modelo`, `categoria`, `tipo`, `costo`, `fecha`, `descripcion`, `cantidad`, `NoBodega`) VALUES (NULL, '$modelo', '$categoria', '$tipo', '$costo', '$fecha' , '$descripcion', '$cantidad', '$noBodega')";

            $insert = mysqli_query($enlace, $tupla);

            if($insert){
                echo "<div class='alert alert-success' role='alert'>Bodega y mueble añadidos!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            }
              else{
                  echo "<div class='alert alert-danger' role='alert'>No se pudo insertar el mueble pero la bodega sí. Intenta de nuevo.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            }

        }
          else{
              echo "<div class='alert alert-danger' role='alert'>No se pudo insertar la bodega ni el mueble. Intenta de nuevo.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        }
    }

    if(isset($_POST['insertMueble'])){
		$modelo = $_POST['modelo'];
        $categoria = $_POST['categoria'];
        $tipo = $_POST['tipo'];
        $costo = $_POST['costo'];
        $descripcion = $_POST['descripcion'];
        $cantidad = $_POST['cantidad'];
        $noBodega = $_POST['noBodega'];
        $fecha = date("Y-m-d H:i:s");

        $tupla = "INSERT INTO `mueble` (`noMueble`, `modelo`, `categoria`, `tipo`, `costo`, `fecha`, `descripcion`, `cantidad`, `NoBodega`) VALUES (NULL, '$modelo', '$categoria', '$tipo', '$costo', '$fecha' , '$descripcion', '$cantidad', '$noBodega')";

        $insert = mysqli_query($enlace, $tupla);

        if($insert){
            echo "<div class='alert alert-success' role='alert'>Mueble Añadido!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        }
          else{
              echo "<div class='alert alert-danger' role='alert'>No se pudo insertar el mueble. Intenta de nuevo.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        }
    }

    if(isset($_POST['insertBodega'])){
        $nombre =$_POST['nombre'];
		$ubicacion =$_POST['direccion'];

        $tupla = "INSERT INTO `bodega` (`NoBodega`, `nombre`, `ubicacion`) VALUES (NULL, '$nombre', '$ubicacion')";

        $insert = mysqli_query($enlace, $tupla);

        if($insert){
            echo "<div class='alert alert-success' role='alert'>Bodega Añadida!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        }
          else{
              echo "<div class='alert alert-danger' role='alert'>No se pudo insertar la bodega. Intenta de nuevo.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        }
    }

?>

    <?php } ?>
