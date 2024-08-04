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
        <form action="http://localhost/ProyectoTeclab/Productos/ABM/editarDatos.php" method="POST" id="form-productos">
            <?php 
                $req = $_REQUEST['Id'];

                $sql = "SELECT * FROM productos WHERE id_prod='$req'";
                $obj = pg_query($conexion, $sql);

                $row=pg_fetch_assoc($obj);
            ?>

        <input type="Hidden" name="Id" value="<?php echo $row['id_prod']?>">

            <h2>Editar Producto</h2>           
                <label for="nombre-producto" >Producto:</label>
                    <input id="nombre-producto" type="text" name="nombreP" value="<?php echo $row['nombre_prod']?>">               
                <label for="precio-producto">Precio:</label>
                    <input id="precio-producto" type="text" name="precioP" value="<?php echo $row['precio']?>">
                <label for="cantidad-producto">Cantidad:</label>
                    <input id="cantidad-producto" type="text" name="cantidadP" value="<?php echo $row['stock']?>">
                <label for="proveedor-producto">Proveedor:</label><br>
                    <select name="proveedorP" id="proveedor-producto">
                        <option selected disabled>--Seleccionar categoria--</option>
                        
                        <?php
                          

                            $sql1 = "SELECT * FROM proveedores WHERE id_prov='".$row['proveedores']."'";
                            $obj1 = pg_query($conexion, $sql1);

                            $row1 = pg_fetch_assoc($obj1);

                            echo "<option selected value='".$row1['id_prov']."'>".$row1['nombre_prov']."</option>";

                            $sql2 = "SELECT * FROM proveedores";
                            $obj2 = pg_query($conexion, $sql2);

                            while ($fila = pg_fetch_assoc($obj2)) {
                                
                                $selected = ($fila['id_prov'] == $row['proveedor']) ? 'selected' : '';

                                echo "<option value='" . $fila['id_prov'] . "' $selected>" . $fila['nombre_prov'] . "</option>";
                            }

                            
                        ?>

                    </select>                
                <div class="botones">
                    <button class="submit" type="submit" name="Agregar">AGREGAR</button>                     
                    <button class="reset" type="reset" name="Cancelar"><a href="http://localhost/ProyectoTeclab/Productos/productos.php">CANCELAR</a></button>
                </div>
        </form>
    </div>
</body>
</html>