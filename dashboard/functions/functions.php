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

	$mueble = "select * from mueble ";

	$query = mysqli_query($enlace, $mueble);

	while ($tupla=mysqli_fetch_array($query)){

		$noMueble = $tupla['noMueble'];
		$modelo = $tupla['modelo'];
        $categoria = $tupla['categoria'];
        $tipo = $tupla['tipo'];
        $costo = $tupla['costo'];
        $fecha = $tupla['fecha'];
        $descripcion = $tupla['descripcion'];
        $cantidad = $tupla['cantidad'];

	//echo "<li><a href='index.php?cat=$noMueble'>$modelo</a></li>";


	}
}

function getCliente(){

	global $enlace;

	$cliente = "SELECT * FROM `cliente`";

	$query = mysqli_query($enlace, $cliente);

	while ($tupla=mysqli_fetch_array($query)){

		$noCliente = $tupla['noCliente'];
		$nombre = $tupla['nombre'];
        $email= $tupla['email'];
        $direccion = $tupla['direccion'];
        $telefono = $tupla['telefono'];
        $RFC = $tupla['RFC'];
	/*
	echo "
				<div id='single_product'>

					<h3>$nombre</h3>

					<p><b> Nombre:  $email </b></p>

				</div>


		";
	*/

	}

}

function getBodega(){

	global $enlace;

	$bodega = "select * from bodega ";

	$query = mysqli_query($enlace, $bodega);

	while ($tupla=mysqli_fetch_array($query)){

		$noBodega = $tupla['NoBodega'];
        $nombre = $tupla['nombre'];
		$ubicacion = $tupla['ubicacion'];

	//echo
	}

}

function getMuebleBodega(){
    	global $enlace;

	$muebleBodega = "select * from mueble_bodega ";

	$query = mysqli_query($enlace, $muebleBodega);

	while ($tupla=mysqli_fetch_array($query)){

		$noBodega = $tupla['NoBodega'];
        $noCliente= $tupla['noCliente'];
		$cantidad = $tupla['cantidadBodega'];

	//echo
	}

}

function getMuebleCliente(){
    	global $enlace;

	$muebleBodega = "select * from mueble_cliente ";

	$query = mysqli_query($enlace, $muebleBodega);

	while ($tupla=mysqli_fetch_array($query)){

		$noMueble = $tupla['NoMueble'];
        $noCliente= $tupla['noCliente'];
        $inicio = $tupla['inicio'];
        $fin = $tupla['fin'];
        $precio = $tupla['precio'];
		$cantidad = $tupla['cantidadRentada'];

	//echo
	}

}


?>
