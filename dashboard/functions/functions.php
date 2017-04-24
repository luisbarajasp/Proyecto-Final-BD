<?php
//Conexion
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $enlace = mysqli_connect("127.0.0.1", "root", "", "magenta");
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

function getMuebleClientes($cliente){
    global $enlace;

    $array = array();

	$muebleClientes = "select * from mueble_cliente WHERE noCliente = $cliente ";

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

function getSearchedMuebles($search = ''){

	global $enlace;

    $array = array();

	$muebles = "select * from mueble where modelo LIKE '%$search%' OR categoria LIKE '%$search%' OR tipo LIKE '%$search%'";

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

function getSearchedClientes($search = ''){

	global $enlace;

    $array = array();

	$clientes = "SELECT * FROM `cliente` where nombre LIKE '%$search%' OR email LIKE '%$search%'";

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

function getSearchedBodegas($search = ''){

	global $enlace;

    $array = array();

	$bodegas = "select * from bodega where nombre LIKE '%$search%'";

	$query = mysqli_query($enlace, $bodegas);

	while ($tupla=mysqli_fetch_array($query)){

		/*$noBodega = $tupla['NoBodega'];
        $nombre = $tupla['nombre'];
		$ubicacion = $tupla['ubicacion'];*/

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
       $string = "select count(mueble_cliente.noRenta) as numero from mueble_cliente where mueble_cliente.fin IS NULL;";

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

   function getRentasClientesPorMuebles($search = ''){
       global $enlace;

       $array = array();

   	$muebleClientes = "select cliente.noCliente, cliente.nombre, mueble.modelo, mueble_cliente.cantidadRentada as cantidad from mueble_cliente natural join cliente natural join mueble where (cliente.nombre LIKE '%$search%' OR cliente.email LIKE '%$search%') AND mueble_cliente.fin IS NULL group by mueble.noMueble;";

   	$query = mysqli_query($enlace, $muebleClientes);

   	while ($tupla=mysqli_fetch_array($query)){

           $array[] = $tupla;

       }

       return $array;
   }

   function getRentasMuebles($search = ''){
       global $enlace;

       $array = array();

   	$muebleClientes = "select cliente.noCliente, cliente.nombre, mueble.modelo, mueble_cliente.cantidadRentada as cantidad from mueble_cliente natural join cliente natural join mueble where (mueble.modelo LIKE '%$search%' OR mueble.categoria LIKE '%$search%' OR mueble.tipo LIKE '%$search%') AND mueble_cliente.fin IS NULL group by mueble.noMueble;";

   	$query = mysqli_query($enlace, $muebleClientes);

   	while ($tupla=mysqli_fetch_array($query)){

           $array[] = $tupla;

       }

       return $array;
   }

function getNoRenta(){
     global $enlace;
     $array = array();
    $query = mysqli_query($enlace, "SELECT noRenta FROM mueble_cliente where fin like '0000-00-00%'");
     while ($tupla=mysqli_fetch_array($query)){
         $array[] = $tupla;
     }
     return $array;
}

function getDatosPago($noRenta){
     global $enlace;
     $array = array();
    $query = mysqli_query($enlace, "SELECT 
        nombre, fecha, cantidad FROM
        cliente
        NATURAL JOIN
        mueble_cliente
        NATURAL JOIN
        pago
        WHERE noRenta = $noRenta");
     $tupla=mysqli_fetch_array($query);
    return $tupla;
}
    
function getPagos($fecha, $noRenta){
    global $enlace;
    $query = mysqli_query($enlace, "SELECT noRenta FROM pago WHERE fecha LIKE '$fecha%' AND noRenta = $noRenta");
    $num_rows = mysqli_num_rows($query);
    if($num_rows == 0)
     return false;
    else return true;
}

?>
