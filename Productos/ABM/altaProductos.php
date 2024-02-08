<?php
require '../../conexion.php';

$id = $_POST['idProducto'];
$nombre = $_POST['nombreProducto'];
$precio = $_POST['precioProducto'];
$cantidad = $_POST['cantidadProducto'];
$proveedor = $_POST['proveedorProducto'];

$query = ("INSERT INTO productos(id_prod,nombre_prod,precio,cantidad,proveedores)VALUES('$id','$nombre','$precio','$cantidad','$proveedor')");

if ($obj = pg_query($conexion, $query)) {
    header("location:../productos.php");
} else {
    echo "Datos no insertados";
}
?>