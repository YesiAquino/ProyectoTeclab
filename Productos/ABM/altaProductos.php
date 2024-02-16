<?php
require '../../conexion.php';

$id = $_POST['idProducto'];
$nombre = $_POST['nombreProducto'];
$precio = $_POST['precioProducto'];
$cantidad = $_POST['cantidadProducto'];
$proveedor = $_POST['proveedorProducto'];

$query = ("INSERT INTO productos(id_prod,nombre_prod,precio,stock,proveedores)VALUES('$id','$nombre','$precio','$cantidad','$proveedor')");

if ($obj = pg_query($conexion, $query)) {
    
    $id = $_POST['idProducto'];
    $cantidad = $_POST['cantidadProducto'];
    $fecha = date("Y-m-d");

    $query2 = ("INSERT INTO entradas(id_prod,cantidad,fecha)VALUES('$id','$cantidad','$fecha')");

        if ($obj2 = pg_query($conexion, $query2)) {
            header("location:../productos.php");
        } else {
            echo "Datos no insertados";
        };
} else {
    echo "Datos no insertados";
}
?>