<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://localhost/ProyectoTeclab/Vista/css/productos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Lista de Productos</title>
</head>
<body>
    <!-- Encabezado -->
    <div class="encabezado">
        <img src="http://localhost/ProyectoTeclab/Vista/img/logo.png" alt="">
    </div>
    
    <!-- Seccion Productos -->
    <section class="productos">
        <div class="atras">
            <button id="atras"><a href="../inicio.html"><i class="fa-solid fa-arrow-left"></i></a></button>
        </div>
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
                        <th id="acciones">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    require 'querys.php';
                    
                    while($obj=pg_fetch_object($consulta)){ ?>
                    
                    <tr>
                        <td><?php echo $obj->id_prod;?></td>
                        <td><?php echo $obj->nombre;?></td>
                        <td><?php echo $obj->precio;?></td>
                        <td><?php echo $obj->cantidad;?></td>
                        <td><?php echo $obj->proveedores;?></td>
                        <td class="acciones">
                            <a href="ABM/editarForm.php?Id=<?php echo $obj->id_prod?>" class="btn-accion" id="editar">Editar</a>
                            <a href="ABM/eliminarDato.php?Id=<?php echo $obj->id_prod?>" class="btn-accion" id="eliminar">Eliminar</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
        <div class="botones">
            <button class="boton" id="btn-agregar"><a href="http://localhost/ProyectoTeclab/Productos/formulario.php">Agregar</a></button>
            <!-- <button class="boton" id="btn-editar">Editar</button>
            <button class="boton" id="btn-borrar">Borrar</button> -->
        </div>
    </section>
</body>
</html>