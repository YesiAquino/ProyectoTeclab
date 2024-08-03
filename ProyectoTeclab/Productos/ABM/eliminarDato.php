<?php
    include ("../../conexion.php");

    $Id = $_REQUEST['Id'];
    $sql = "DELETE FROM productos WHERE id_prod = '$Id'";

    if ($obj = pg_query($conexion, $sql)) {
        header("location:../productos.php");
    }
?>