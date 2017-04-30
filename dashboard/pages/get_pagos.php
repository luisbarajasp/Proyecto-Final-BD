 <!DOCTYPE html>
<html>
<head>
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','root','magenta');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

$query = "SELECT renta.NoRenta, renta.inicio, renta.total, renta.dia, pago.fecha FROM pago NATURAL JOIN renta NATURAL JOIN cliente where cliente.noCliente = $q";
$array = mysqli_fetch_array(mysqli_query($con, $query));

if(is_null($array['NoRenta'])){
    echo "<div class=\"is-empty\">";
        echo "<h1><i class=\"fa fa-asterisk\" aria-hidden=\"true\"></i> No se encontraron resultados</h1>";
    echo "</div>";
}else{
    echo "<table class=\"table table-hover\" id=\"myTable\">
    <tr>
    <th onclick=\"sortTable(0)\">No. Renta</th>
    <th onclick=\"sortTable(3)\">Desde</th>
    <th onclick=\"sortTable(3)\">Costo</th>
    <th onclick=\"sortTable(4)\">Dia de pago</th>
    <th onclick=\"sortTable(4)\">Fecha pagado</th>
    </tr>";
    $noRenta = $array['NoRenta'];
    $inicio = date("d/m/Y", strtotime($array['inicio']));
    $total = number_format($array['total']);
    $dia = date("d/m", strtotime($array['dia']));
    $fecha = date("d/m/Y H:i:s", strtotime($array['fecha']));
    echo "<tr>";
    echo "<td>$noRenta</td>";
    echo "<td>$inicio</td>";
    echo "<td>$total</td>";
    echo "<td>$dia</td>";
    echo "<td>$fecha</td>";
    echo "</tr>";
    echo "</table>";
}


mysqli_close($con);
?>
</body>
</html>
