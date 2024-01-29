<?php
require 'conexion.php';

$query="SELECT id_prod,nombre,precio,cantidad,proveedores FROM productos";

$query=("INSERT INTO productos(id_prod,nombre,precio,cantidad,proveedores)VALUES('$_REQUEST[idP]','$_REQUEST[nombreP]','$_REQUEST[precioP]','$_REQUEST[cantidadP]','$_REQUEST[proveedorP]')");

$consulta=pg_query($conexion,$query);
pg_close();
echo 'El producto se guardó correctamente';
echo '<button><a href="http://localhost/ProyectoTeclab/productos.php">Volver</a></button>';
 
?>