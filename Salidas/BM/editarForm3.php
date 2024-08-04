<?php
include '../../conexion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/ProyectoTeclab/Vista/css/editarForm.css">
    <title>Editar</title>
</head>
<body>
<div class="contenedor-formulario"> 
        <form action="http://localhost/ProyectoTeclab/Salidas/BM/editarDatos3.php" method="POST" id="form-productos">
            <?php 
                $req = $_REQUEST['Id'];

                $sql = "SELECT * FROM salidas WHERE id_det='$req'";
                $obj = pg_query($conexion, $sql);

                $row=pg_fetch_assoc($obj);
            ?>

        <input type="Hidden" name="Id" value="<?php echo $row['id_det']?>">

            <h2>Editar Producto</h2>           
                <label for="id_det" >Id Salida:</label>
                    <input id="id_det" type="text" name="detV" value="<?php echo $row['id_det']?>">               
                <label for="cod_ref">Id Producto:</label>
                    <input id="cod_ref" type="text" name="codV" value="<?php echo $row['cod_ref']?>">
                <label for="fecha">Fecha:</label><br>
                    <input id="fecha" type="text" name="fechaV" value="<?php echo $row['fecha']?>">

                <div class="botones">
                    <button class="submit" type="submit" name="Guardar">Guardar</button>                     
                    <button class="reset" type="reset" name="Cancelar"><a href="http://localhost/ProyectoTeclab/Salidas/salidas.php">CANCELAR</a></button>
                </div>
        </form>
    </div>
</body>
</html>