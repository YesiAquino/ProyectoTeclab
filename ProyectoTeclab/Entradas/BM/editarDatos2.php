<?php
include_once("../../conexion.php");


$id = $_POST['Id'];
$idProd = $_POST['idP'];
$cantidad = $_POST['cantidadP'];
$fecha = $_POST['fechaP'];

$sql = "UPDATE entradas SET
        id_prodentrada='".$idProd."',
        cantidad='".$cantidad."',
        fecha='".$fecha."' WHERE id_entrada = '$id'";

if ($obj = pg_query($conexion, $sql)) {
    header("location:../entradas.php");
}