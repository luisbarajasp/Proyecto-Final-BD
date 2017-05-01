<?php

session_start();
include("../functions/functions.php");

    if(!isset($_SESSION['usuario'])){

        echo "<script>window.location.href='../../404.html';</script>";

    }
    else {

        if (isset($_GET['id']) && is_numeric($_GET['id'])){
            $noCliente = $_GET['id'];

            $rentas = mysqli_fetch_array(mysqli_query($enlace, "SELECT noRenta FROM renta where noCliente = $noCliente"));

            foreach ($rentas as $renta) {
                $noRenta = $renta['noRenta'];
                $resultmc = mysqli_query($enlace, "DELETE FROM mueble_cliente where noRenta = $noRenta");

                $resultmc = mysqli_query($enlace, "DELETE FROM renta where noRenta = $noRenta");
            }

            $query = "DELETE FROM cliente where noCliente = $noCliente";

            $result = mysqli_query($enlace, $query);

            if(!$result){
                echo "<script>alert('Cliente no se pudo eliminar');</script>";
            }

            echo "<script>window.location.href='clientes.php';</script>";
        }else{
            echo "<script>window.location.href='clientes.php';</script>";
        }


    }

 ?>

 <?php
