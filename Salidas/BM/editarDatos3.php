<?php
include_once("../../conexion.php");


$id = $_POST['Id'];
$idDet = $_POST['detV'];
$codRef = $_POST['codV'];
$fecha = $_POST['fechaV'];

$sql = "UPDATE salidas SET
        cod_ref='".$codRef."',
        fecha='".$fecha."' WHERE id_det = '$id'";

if ($obj = pg_query($conexion, $sql)) {
    header("location:../salidas.php");
}