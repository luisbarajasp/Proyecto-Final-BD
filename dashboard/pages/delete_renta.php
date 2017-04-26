<?php

session_start();
include("../functions/functions.php");

    if(!isset($_SESSION['usuario'])){

        echo "<script>window.location.href='../../404.html';</script>";

    }
    else {

        if (isset($_GET['id']) && is_numeric($_GET['id'])){
            $noRenta = $_GET['id'];
            $fecha = date("Y-m-d H:i:s");

            $querymc = "update `renta` SET `fin`='$fecha' where noRenta=$noRenta";

            $result = mysqli_query($enlace, $querymc);
            


            if(!$result){
                echo "<script>alert('No se puedo devolver la renta');</script>";
            }

            echo "<script>window.location.href='rentas.php';</script>";
        }else{
            echo "<script>window.location.href='rentas.php';</script>";
        }


    }

 ?>

 <?php
