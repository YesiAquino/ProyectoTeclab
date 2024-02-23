<?php
    include ("../../conexion.php");

    $Id = $_REQUEST['Id'];
    $sql = "DELETE FROM salidas WHERE id_prod = '$Id'";

    if ($obj = pg_query($conexion, $sql)) {
        header("location:../salidas.php");
    }
?>