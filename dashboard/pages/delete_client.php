<?php

session_start();
include("../functions/functions.php");

    if(!isset($_SESSION['usuario'])){

        echo "<script>window.location.href='../../404.html';</script>";

    }
    else {

        if (isset($_GET['id']) && is_numeric($_GET['id'])){
            $noCliente = $_GET['id'];

            $querymc = "DELETE FROM mueble_cliente where noCliente = $noCliente";

            $resultmc = mysqli_query($enlace, $querymc);

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
