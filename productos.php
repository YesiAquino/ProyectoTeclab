<?php

require 'querys.php';

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://localhost/ProyectoTeclab/Vista/css/productos.css">
    <title>Lista de Productos</title>
</head>
<body>
    <!-- Encabezado -->
    <div class="encabezado">
        <img src="http://localhost/ProyectoTeclab/Vista/img/logo.png" alt="">
    </div>
    
    <!-- Seccion Productos -->
    <section class="productos">
        <div class="busqueda">
            <button id="buscar">Buscar</button>
        </div>
        <div class="tabla">
            <table>
                <thead>
                    <tr>
                        <th id="id-producto">ID</th>
                        <th id="nombre-producto">Producto</th>
                        <th id="precio">Precio</th>
                        <th id="cantidad">Cantidad</th>
                        <th id="proveedor">Proveedor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($obj=pg_fetch_object($consulta)){ ?>
                    
                    <tr>
                        <td><?php echo $obj->id_prod;?></td>
                        <td><?php echo $obj->nombre;?></td>
                        <td><?php echo $obj->precio;?></td>
                        <td><?php echo $obj->cantidad;?></td>
                        <td><?php echo $obj->proveedores;?></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
        <div class="botones">
            <button class="boton" id="btn-agregar"><a href="http://localhost/ProyectoTeclab/Vista/View/formulario.html">Agregar</a></button>
            <button class="boton" id="btn-editar">Editar</button>
            <button class="boton" id="btn-borrar">Borrar</button>
        </div>
    </section>
</body>
</html>