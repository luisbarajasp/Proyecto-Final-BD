<?php
//Conexion
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $enlace = mysqli_connect("localhost", "root", "root", "magenta");
        if($enlace){
        }else{
            die ("no hay conexion");
        }
    // Establecer la zona horaria
    date_default_timezone_set('America/Mexico_City');
//Gets
function getMuebles(){

	global $enlace;

    $array = array();

	$muebles = "select * from mueble ";

	$query = mysqli_query($enlace, $muebles);

	while ($tupla=mysqli_fetch_array($query)){

		/*$noMueble = $tupla['noMueble'];
		$modelo = $tupla['modelo'];
        $categoria = $tupla['categoria'];
        $tipo = $tupla['tipo'];
        $costo = $tupla['costo'];
        $fecha = $tupla['fecha'];
        $descripcion = $tupla['descripcion'];
        $cantidad = $tupla['cantidad'];*/

        $array[] = $tupla;

	}

    return $array;
}

function getClientes(){

	global $enlace;

    $array = array();

	$clientes = "SELECT * FROM `cliente`";

	$query = mysqli_query($enlace, $clientes);

	while ($tupla=mysqli_fetch_array($query)){

		/*$noCliente = $tupla['noCliente'];
		$nombre = $tupla['nombre'];
        $email= $tupla['email'];
        $direccion = $tupla['direccion'];
        $telefono = $tupla['telefono'];
        $RFC = $tupla['RFC'];*/

        $array[] = $tupla;

	}

    return $array;

}

function getBodegas(){

	global $enlace;

    $array = array();

	$bodegas = "select * from bodega ";

	$query = mysqli_query($enlace, $bodegas);

	while ($tupla=mysqli_fetch_array($query)){

		/*$noBodega = $tupla['NoBodega'];
        $nombre = $tupla['nombre'];
		$ubicacion = $tupla['ubicacion'];*/

        $array[] = $tupla;

    }

    return $array;
}

function getMuebleBodegas(){
    global $enlace;

    $array = array();

	$muebleBodegas = "select * from mueble_bodega ";

	$query = mysqli_query($enlace, $muebleBodegas);

	while ($tupla=mysqli_fetch_array($query)){

		/*$noBodega = $tupla['NoBodega'];
        $noCliente= $tupla['noCliente'];
		$cantidad = $tupla['cantidadBodega'];*/

        $array[] = $tupla;

    }

    return $array;
}

function getMuebleClientes(){
    global $enlace;

    $array = array();

	$muebleClientes = "select * from mueble_cliente ";

	$query = mysqli_query($enlace, $muebleClientes);

	while ($tupla=mysqli_fetch_array($query)){

		/*$noMueble = $tupla['NoMueble'];
        $noCliente= $tupla['noCliente'];
        $inicio = $tupla['inicio'];
        $fin = $tupla['fin'];
        $precio = $tupla['precio'];
		$cantidad = $tupla['cantidadRentada'];*/

        $array[] = $tupla;

    }

    return $array;
}


?>
