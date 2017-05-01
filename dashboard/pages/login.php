<?php
session_start();
include("../functions/functions.php");

$admin = getAdmin();

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Magenta - Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

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

    <?php

        if(empty($admin)){

     ?>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Registrate</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="login.php">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Usuario" name="usuario" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Contraseña" name="password" type="password" value="">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-primary btn-block btn-large" name="signup">Registrar</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php

        }else{

     ?>

     <div class="container">
         <div class="row">
             <div class="col-md-4 col-md-offset-4">
                 <div class="login-panel panel panel-default">
                     <div class="panel-heading">
                         <h3 class="panel-title">Inicia Sesion</h3>
                     </div>
                     <div class="panel-body">
                         <form role="form" method="post" action="login.php">
                             <fieldset>
                                 <div class="form-group">
                                     <input class="form-control" placeholder="Usuario" name="usuario" type="text" autofocus>
                                 </div>
                                 <div class="form-group">
                                     <input class="form-control" placeholder="Contraseña" name="password" type="password" value="">
                                 </div>
                                 <!-- Change this to a button or input when using this as a form -->
                                 <button type="submit" class="btn btn-primary btn-block btn-large" name="login">Login</button>
                             </fieldset>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <?php } ?>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>


<?php

    if(isset($_POST['signup'])){

        $usuario = mysqli_real_escape_string($enlace, $_POST['usuario']);
        $password = mysqli_real_escape_string($enlace, $_POST['password']);

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $insert = mysqli_query($enlace, "INSERT INTO admin VALUES ('$usuario', '$hashed_password')");

        if($insert){

            $_SESSION['usuario']=$usuario;

            echo "<script>window.open('index.php','_self')</script>";

        }
        else {

               echo "<script>alert('No se pudo crear, intenta de nuevo.')</script>";

        }


    }

	if(isset($_POST['login'])){

		$usuario = mysqli_real_escape_string($enlace, $_POST['usuario']);
		$password = mysqli_real_escape_string($enlace, $_POST['password']);

        $sel_user = "select * from admin where usuario='$usuario'";
    	$run_user = mysqli_query($enlace, $sel_user);

    	$check_user = mysqli_num_rows($run_user);

    	if($check_user==1){
            $user = mysqli_fetch_array($run_user);

            $hashed_password = $user['contrasena'];

        	if(password_verify($password, $hashed_password)){

                $_SESSION['usuario']=$usuario;

            	echo "<script>window.open('index.php','_self')</script>";

            }else{
                echo "<script>alert('El usuario y la contraseña no son validos')</script>";

            }

    	}
    	else {

    	       echo "<script>alert('El usuario y la contraseña no son validos')</script>";

    	}


	}

?>
