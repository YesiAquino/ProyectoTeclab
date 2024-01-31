<?php
require 'conexion.php';

$query="SELECT id_prod,nombre,precio,cantidad,proveedores FROM productos";
$consulta=pg_query($conexion,$query);

$queryProv="SELECT id_prov,nombre FROM proveedores";
$consultaProv=pg_query($conexion,$queryProv);

?>