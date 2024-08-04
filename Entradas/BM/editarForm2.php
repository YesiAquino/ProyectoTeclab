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
        <form action="http://localhost/ProyectoTeclab/Entradas/BM/editarDatos2.php" method="POST" id="form-productos">
            <?php 
                $req = $_REQUEST['Id'];

                $sql = "SELECT * FROM entradas WHERE id_prodentrada='$req'";
                $obj = pg_query($conexion, $sql);

                $row=pg_fetch_assoc($obj);
            ?>

        <input type="Hidden" name="Id" value="<?php echo $row['id_prodentrada']?>">

            <h2>Editar Producto</h2>           
                <label for="id-entrada" >Id Entrada:</label>
                    <input id="id-entrada" type="text" name="entradaP" value="<?php echo $row['id_entrada']?>">               
                <label for="id_producto">Id Producto:</label>
                    <input id="id_producto" type="text" name="idP" value="<?php echo $row['id_prodentrada']?>">
                <label for="cantidad-producto">Cantidad:</label>
                    <input id="cantidad-producto" type="text" name="cantidadP" value="<?php echo $row['cantidad']?>">
                <label for="fecha">Fecha:</label><br>
                    <input id="fecha" type="text" name="fechaP" value="<?php echo $row['fecha']?>">

                <div class="botones">
                    <button class="submit" type="submit" name="Agregar">AGREGAR</button>                     
                    <button class="reset" type="reset" name="Cancelar"><a href="http://localhost/ProyectoTeclab/Entradas/entradas.php">CANCELAR</a></button>
                </div>
        </form>
    </div>
</body>
</html>