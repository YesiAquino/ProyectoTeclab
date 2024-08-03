<?php
require '../conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/ProyectoTeclab/Vista/css/formulario.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Inventario</title>
</head>
<body>
    <!-- Encabezado -->
    <div class="encabezado">
        <img src="http://localhost/ProyectoTeclab/Vista/img/logo.png" alt="">
    </div>
    <!-- Inicio -->
        <div class="contenedor-formulario"> 
            <form action="http://localhost/ProyectoTeclab/Productos/ABM/altaProductos.php" method="POST" id="form-productos">
                <h2>Agregar Producto</h2>           
                <label for="id-producto">ID:</label>
                    <input id="id-producto" type="text" name="idProducto">
                <label for="nombre-producto" >Producto:</label>
                    <input id="nombre-producto" type="text" name="nombreProducto">               
                <label for="precio-producto">Precio:</label>
                    <input id="precio-producto" type="text" name="precioProducto">
                <label for="cantidad-producto">Cantidad:</label>
                    <input id="cantidad-producto" type="text" name="cantidadProducto">
                <label for="file_producto"><i class="fa-regular fa-file-excel"></i></label>
                    <input id="file_producto" type="file" name="archivoP">                
                <label for="proveedor-producto">Proveedor:</label>
                    <select name="proveedorProducto" id="proveedorProducto">
                        <option selected disabled>--Seleccionar categoria--</option>
                            <?php
                                $sql = "SELECT id_prov,nombre_prov FROM proveedores";
                                $resultado = pg_query($conexion, $sql);

                                while ($obj = pg_fetch_assoc($resultado)) {
                                    echo "<option value='" . $obj['id_prov'] . "'>" . $obj['nombre_prov'] . "</option>";
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