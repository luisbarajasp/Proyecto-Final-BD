<?php

session_start();
include("../functions/functions.php");

    if(!isset($_SESSION['usuario'])){

        echo "<script>window.location.href='../../404.html';</script>";

    }
    else {

        if (isset($_GET['id']) && is_numeric($_GET['id'])){
            $noMueble = $_GET['id'];

            $querymc = "DELETE FROM mueble_cliente where noMueble = $noMueble";

            $resultmc = mysqli_query($enlace, $querymc);

            $query = "DELETE FROM mueble where noMueble = $noMueble";

            $result = mysqli_query($enlace, $query);

            if(!$result){
                echo "<script>alert('Mueble no se pudo eliminar');</script>";
            }

            echo "<script>window.location.href='muebles.php';</script>";
        }else{
            echo "<script>window.location.href='muebles.php';</script>";
        }


    }

 ?>

 <?php
