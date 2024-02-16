<?php
    include ("../../conexion.php");

    $Id = $_REQUEST['Id'];
    $sql = "DELETE FROM entradas WHERE id_prod = '$Id'";

    if ($obj = pg_query($conexion, $sql)) {
        header("location:../entradas.php");
    }
?>