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

function getNoClientes(){
     global $enlace;
     $query = mysqli_query($enlace, "SELECT * FROM cliente");
     $num_rows = mysqli_num_rows($query);
     return $num_rows;
 }

 function getNoMueblesDis(){
    global $enlace;
    $query = mysqli_query($enlace, "SELECT sum(cantidad) as disponibles FROM mueble");
     while ($tupla=mysqli_fetch_array($query)){
         $disponibles = $tupla['disponibles'];
     }
     return $disponibles;
 }

 function getNoBodegas(){
      global $enlace;
      $query = mysqli_query($enlace, "SELECT * FROM bodega");
      $num_rows = mysqli_num_rows($query);
      return $num_rows;
  }

  function getNoRentas(){
       global $enlace;
       $string = "select count(mueble_cliente.noCliente) as numero from mueble_cliente where mueble_cliente.fin IS NULL;";

       $query = mysqli_query($enlace, $string);
       $tupla = mysqli_fetch_array($query);

       return $tupla['numero'];
   }

   function getCantidadCategoria(){
       global $enlace;
       $categorias = array();

       $string = "select mueble.categoria as nombre, SUM(mueble_cliente.cantidadRentada) as cantidad from mueble_cliente natural join mueble WHERE mueble_cliente.fin IS NULL group by mueble.categoria;";

       $query = mysqli_query($enlace, $string);

       while ($tupla=mysqli_fetch_array($query)){

           $categorias[] = $tupla;

       }

       return $categorias;
   }

?>
