<?php
require 'conexion.php';

$query="SELECT id_prod,nombre,precio,cantidad,proveedores FROM productos";

$query=("INSERT INTO productos(id_prod,nombre,precio,cantidad,proveedores)VALUES('$_REQUEST[idP]','$_REQUEST[nombreP]','$_REQUEST[precioP]','$_REQUEST[cantidadP]','$_REQUEST[proveedorP]')");

if ($obj = pg_query($conexion, $query)) {
    header("location:productos.php");
}
?>