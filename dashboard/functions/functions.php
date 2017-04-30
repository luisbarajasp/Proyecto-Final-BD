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
	$query = mysqli_query($enlace, "select * from mueble ");

	while ($tupla=mysqli_fetch_array($query)){
        $array[] = $tupla;
	}

    return $array;
}

function getClientes(){
	global $enlace;
    $array = array();
	$query = mysqli_query($enlace, "SELECT * FROM `cliente`");

	while ($tupla=mysqli_fetch_array($query)){
        $array[] = $tupla;
	}
    return $array;
}

function getBodegas(){
	global $enlace;
    $array = array();
	$query = mysqli_query($enlace, "select * from bodega ");

	while ($tupla=mysqli_fetch_array($query)){
        $array[] = $tupla;
    }
    return $array;
}

function getMuebleClientes($cliente = ''){
    global $enlace;
    $array = array();
	$query = mysqli_query($enlace, "select * from mueble_cliente WHERE noCliente = $cliente ");

	while ($tupla=mysqli_fetch_array($query)){
        $array[] = $tupla;
    }
    return $array;
}

function getSearchedMuebles($search = ''){

	global $enlace;
    $array = array();
	$query = mysqli_query($enlace, "select * from mueble where modelo LIKE '%$search%' OR categoria LIKE '%$search%' OR tipo LIKE '%$search%'");

	while ($tupla=mysqli_fetch_array($query)){
        $array[] = $tupla;
	}
    return $array;
}

function getSearchedClientes($search = ''){
	global $enlace;
    $array = array();
	$query = mysqli_query($enlace, "SELECT * FROM `cliente` where nombre LIKE '%$search%' OR email LIKE '%$search%'");

	while ($tupla=mysqli_fetch_array($query)){
        $array[] = $tupla;
	}
    return $array;
}

function getSearchedBodegas($search = ''){
	global $enlace;
    $array = array();
	$query = mysqli_query($enlace,  "select * from bodega where nombre LIKE '%$search%'");

	while ($tupla=mysqli_fetch_array($query)){
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
       $query = mysqli_query($enlace, "select count(renta.noRenta) as numero from renta where renta.fin IS NULL;");
       $tupla = mysqli_fetch_array($query);

       return $tupla['numero'];
   }

   function getCantidadCategoria(){
       global $enlace;
       $categorias = array();
       $query = mysqli_query($enlace, "select mueble.categoria as nombre, SUM(mueble_cliente.cantidadRentada) as cantidad from renta natural join mueble_cliente natural join mueble WHERE renta.fin IS NULL group by mueble.categoria;");

       while ($tupla=mysqli_fetch_array($query)){

           $categorias[] = $tupla;

       }

       return $categorias;
   }

   function getRentasClientesPorMuebles($search = ''){
       global $enlace;
       $array = array();
       $query = mysqli_query($enlace, "select cliente.noCliente, cliente.nombre, mueble.modelo, mueble_cliente.cantidadRentada as cantidad from renta natural join mueble_cliente natural join cliente natural join mueble where (cliente.nombre LIKE '%$search%' OR cliente.email LIKE '%$search%') AND renta.fin IS NULL group by mueble.noMueble;");

   	while ($tupla=mysqli_fetch_array($query)){
           $array[] = $tupla;
       }
       return $array;
   }

   function getRentasMuebles($search = ''){
       global $enlace;
       $array = array();

   	    $query = mysqli_query($enlace, "select cliente.noCliente, cliente.nombre, mueble.modelo, mueble_cliente.cantidadRentada as cantidad from renta natural join mueble_cliente natural join cliente natural join mueble where (mueble.modelo LIKE '%$search%' OR mueble.categoria LIKE '%$search%' OR mueble.tipo LIKE '%$search%') AND renta.fin IS NULL group by mueble.noMueble;");

   	while ($tupla=mysqli_fetch_array($query)){
           $array[] = $tupla;
       }
       return $array;
   }

function getNoRenta(){
     global $enlace;
     $array = array();
    $query = mysqli_query($enlace, "SELECT noRenta FROM mueble_cliente where fin is NULL");
     while ($tupla=mysqli_fetch_array($query)){
         $array[] = $tupla;
     }
     return $array;
}

function getDatosPago($noRenta){
     global $enlace;
     $array = array();
    $query = mysqli_query($enlace, "SELECT
        nombre, dia, sum(precio) as cantidad FROM
        cliente
        NATURAL JOIN
        mueble_cliente
        WHERE noRenta =  $noRenta");
     $tupla=mysqli_fetch_array($query);
    return $tupla;
}

function getRentaPagosPendientes($fecha){
    global $enlace;
    $array = array();
    $query = mysqli_query($enlace, "SELECT            renta.noRenta, cliente.nombre, renta.dia, sum(renta.total) as total
                                    FROM              cliente
                                    NATURAL JOIN      renta
                                    NATURAL LEFT JOIN pago
                                    WHERE             pago.idPago IS NULL AND DATE_FORMAT(dia, '%m-%d') < DATE_FORMAT('$fecha', '%m-%d')
                                    group by (renta.noRenta);");
    while ($tupla=mysqli_fetch_array($query)){
        $array[] = $tupla;
    }
    return $array;
}

function getPagos($fecha, $noRenta){
    global $enlace;
    $query = mysqli_query($enlace, "SELECT noRenta FROM pago WHERE fecha LIKE '$fecha%' AND noRenta = $noRenta");
    $num_rows = mysqli_num_rows($query);
    if($num_rows == 0)
     return false;
    else return true;
}

function getRentas(){
    global $enlace;
    $query = mysqli_query($enlace, "SELECT noRenta FROM renta");
    $num_rows = mysqli_num_rows($query);
   while ($tupla=mysqli_fetch_array($query)){
         $array[] = $tupla['noRenta'];
     }
     return $array;
}

function getDatosRentasActivas(){
    global $enlace;
     $array = array();
    $query = mysqli_query($enlace, "SELECT
        noRenta, nombre, inicio, total, dia FROM
        renta
        NATURAL JOIN
        cliente
        WHERE renta.fin is NULL");
     while ($tupla=mysqli_fetch_array($query)){
         $array[] = $tupla;
     }
     return $array;
}

function getDatosRentasTerminadas(){
    global $enlace;
     $array = array();
    $query = mysqli_query($enlace, "SELECT
        noRenta, nombre, inicio, total, dia FROM
        renta
        NATURAL JOIN
        cliente
        WHERE renta.fin is NOT NULL ");
     while ($tupla=mysqli_fetch_array($query)){
         $array[] = $tupla;
     }
     return $array;
}

function getMueblesRenta($noRenta){
    global $enlace;
     $array = array();
    $query = mysqli_query($enlace, "SELECT
        mueble.noMueble, mueble.modelo, mueble.categoria, mueble.tipo, mueble_cliente.precio, mueble_cliente.cantidadRentada as cantidad FROM
        renta
        NATURAL JOIN
        mueble_cliente
        NATURAL JOIN
        mueble
        WHERE noRenta= $noRenta
        group by mueble.noMueble");
     while ($tupla=mysqli_fetch_array($query)){
         $array[] = $tupla;
     }
     return $array;
}


function getTotalRenta($noRenta){
      global $enlace;
    $query = mysqli_query($enlace, "SELECT sum(precio) as total FROM mueble_cliente WHERE noRenta = $noRenta");
    $tupla=mysqli_fetch_array($query);
    return $tupla['total'];
}


?>

 <script>
    function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc";
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.getElementsByTagName("TR");
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>
