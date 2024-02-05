<?php
include_once("conexion.php");


$id = $_POST['Id'];
$nombre = $_POST['nombreP'];
$precio = $_POST['precioP'];
$cantidad = $_POST['cantidadP'];
$proveedores = $_POST['proveedorP'];

$sql = "UPDATE productos SET
        nombre='".$nombre."',
        precio='".$precio."',
        cantidad='".$cantidad."',
        proveedores='".$proveedores."' WHERE id_prod = '".$id."'";

if ($obj = pg_query($conexion, $sql)) {
    header("location:productos.php");
}

