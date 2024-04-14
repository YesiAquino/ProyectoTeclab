<?php
    include ("../../conexion.php");

    $Id = $_REQUEST['Id'];
    $sql = "DELETE FROM detallesalidas WHERE id_salida = '$Id'";

    if ($obj = pg_query($conexion, $sql)) {
        header("location:detallesalidas.php");
    }
?>