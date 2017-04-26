<?php

session_start();
include("../functions/functions.php");

    if(!isset($_SESSION['usuario'])){

        echo "<script>window.location.href='../../404.html';</script>";

    }
    else {

        if (isset($_GET['id']) && is_numeric($_GET['id'])){
            $created_at = date("Y-m-d");
            $noRenta = $_GET['id'];
            $result = mysqli_query($enlace, "INSERT INTO `pago` (`fecha`, `noRenta`) VALUES ('$created_at', '$noRenta')");

            if(!$result){
                echo "<script>alert('No se puedo marcar el pago');</script>";
            }

            echo "<script>window.location.href='index.php';</script>";
        }else{
            echo "<script>window.location.href='index.php';</script>";
        }


    }

 ?>

 <?php

