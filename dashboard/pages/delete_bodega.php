<?php

 session_start();
 include("../functions/functions.php");

     if(!isset($_SESSION['usuario'])){

         echo "<script>window.location.href='../../404.html';</script>";

     }
     else {

         if (isset($_GET['id']) && is_numeric($_GET['id'])){
             $NoBodega = $_GET['id'];

             $querymc = "update `mueble` SET NoBodega = NULL where NoBodega = $NoBodega";

             $resultmc = mysqli_query($enlace, $querymc);

             $query = "DELETE FROM bodega where NoBodega = $NoBodega";

             $result = mysqli_query($enlace, $query);

             if(!$result){
                 echo "<script>alert('Bodega no se pudo eliminar');</script>";
             }

             echo "<script>window.location.href='bodegas.php';</script>";
         }else{
             echo "<script>window.location.href='bodegas.php';</script>";
         }


     }

  ?>

  <?php
