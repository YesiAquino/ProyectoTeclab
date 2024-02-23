<?php
include_once("../../conexion.php");


$id = $_POST['Id'];
$idProd = $_POST['idP'];
$cantidad = $_POST['cantidadP'];
$fecha = $_POST['fechaP'];

$sql = "UPDATE salidas SET
        id_prod='".$idProd."',
        cantidad='".$cantidad."',
        fecha='".$fecha."' WHERE id_prod = '$id'";

if ($obj = pg_query($conexion, $sql)) {
    header("location:../salidas.php");
}