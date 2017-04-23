
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
            $noMueble = $_GET['id'];

            $query = "SELECT * FROM mueble where noMueble = $noMueble";

            $mueble = mysqli_fetch_array(mysqli_query($enlace, $query));

            if($_POST){
                $modelo = $_POST['modelo'];
                $categoriaG = $_POST['categoria'];
                $tipo = $_POST['tipo'];
                $costo = $_POST['costo'];
                $descripcion = $_POST['descripcion'];
                $cantidad = $_POST['cantidad'];
                $noBodegaG = $_POST['noBodega'];
                $fecha = $mueble['fecha'];

            }else{
                $modelo = $mueble['modelo'];
                $categoriaG = $mueble['categoria'];
                $tipo = $mueble['tipo'];
                $costo = $mueble['costo'];
                $descripcion = $mueble['descripcion'];
                $cantidad = $mueble['cantidad'];
                $noBodegaG = $mueble['NoBodega'];
                $fecha = $mueble['fecha'];
            }
        ?>
        <div id="page-wrapper" class="add">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Editar Mueble</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row forms">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <form role="form"  method = "post">
                                    <div class="col-lg-12">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Bodega</label>
                                                <select class="form-control" name="noBodega" required value="<?php echo $noBodegaG; ?>">
                                                    <option value="">--</option>
                                                    <?php

                                                        $bodegas = getBodegas();

                                                        foreach ($bodegas as $bodega) {
                                                            $noBodega = $bodega['NoBodega'];
                                                            $nombre = $bodega['nombre'];
                                                            if($noBodega == $noBodegaG){
                                                                echo "<option value='$noBodega' selected>$nombre</option>";

                                                            }else{
                                                                echo "<option value='$noBodega'>$nombre</option>";

                                                            }
                                                        }

                                                     ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Modelo</label>
                                                <input class="form-control" name="modelo" type="text" required value="<?php echo $modelo; ?>">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-12">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Categoria</label>
                                                <select class="form-control" name="categoria" required value="<?php echo $categoriaG; ?>">
                                                    <option value="">--</option>
                                                    <option value="recamara" <?php if((string)$categoriaG == 'recamara') echo"selected"; ?> >Recámara</option>
                                                    <option value="sala" <?php if((string)$categoriaG == 'sala') echo"selected"; ?> >Sala</option>
                                                    <option value="comedor" <?php if((string)$categoriaG == 'comedor') echo"selected"; ?> >Comedor</option>
                                                    <option value="blancos" <?php if((string)$categoriaG == 'blancos') echo"selected"; ?> >Blancos</option>
                                                    <option value="varios" <?php if((string)$categoriaG == 'varios') echo"selected"; ?> >Varios</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Tipo de mueble</label>
                                                <input class="form-control" name="tipo" required value="<?php echo $tipo; ?>">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-12">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Costo</label>
                                                <input class="form-control" name="costo" type="number" required value="<?php echo $costo; ?>">
                                            </div>
                                        </div>
                                         <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Cantidad</label>
                                                <input class="form-control" name="cantidad" type="number" required value="<?php echo $cantidad; ?>">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-12">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Descripción</label>
                                                <textarea class="form-control" name="descripcion" style="max-width:100%"><?php echo $descripcion; ?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12">
                                        <div class="col-xs-12">
                                            <button type="submit" name ="insertMueble" class="btn btn-default">Actualizar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
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
    if(isset($_POST['insertMueble'])){
        $modelo = $_POST['modelo'];
        $categoria = $_POST['categoria'];
        $tipo = $_POST['tipo'];
        $costo = $_POST['costo'];
        $descripcion = $_POST['descripcion'];
        $cantidad = $_POST['cantidad'];
        $noBodega = $_POST['noBodega'];

        $tupla = "update `mueble` SET `modelo`='$modelo', `categoria`='$categoria', `tipo`='$tipo', `costo`='$costo', `descripcion`='$descripcion', `cantidad`='$cantidad', `NoBodega`='$noBodega' where noMueble=$noMueble";

        $update = mysqli_query($enlace, $tupla);

        if($update){
            echo "<div class='alert alert-success' role='alert'>Mueble Actualizado!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        }
          else{
              echo "<div class='alert alert-danger' role='alert'>No se pudo actualizar el mueble. Intenta de nuevo.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        }
    }

?>

<?php } ?>
