<?php
require '../conexion.php';

$query="SELECT id_prod,nombre,precio,cantidad,proveedores FROM productos";
$consulta=pg_query($conexion,$query);

?>