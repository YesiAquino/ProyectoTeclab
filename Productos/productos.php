<?php
require '../conexion.php';
include 'carrito.php';
?>
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
    <div class="alert alert-success">
        <?php echo $mensaje;?>
    </div>
        <div class="navBar">
            <div class="atras">
                <button class="accion" id="atras"><a href="../inicio.html"><i class="fa-solid fa-arrow-left"></i></a></button>
            </div>
            <div class>
                <button class="accion" id="carrito"><a href="http://localhost/ProyectoTeclab/Productos/mostrarCarrito.php">Carrito(<?php
                    echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);
                    ?>)</a></button>
            </div>
        </div>
            <div class="busqueda">
                <button id="buscar">Buscar</button>
            </div>
        <div class="tablaP">
            <table>
                <thead>
                    <tr>
                        <th id="id-producto">ID</th>
                        <th id="nombre-producto">Producto</th>
                        <th id="precio">Precio</th>
                        <th id="stock">Stock</th>
                        <th id="proveedor">Proveedor</th>
                        <th id="acciones">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $query = "SELECT * FROM productos
                    INNER JOIN proveedores ON productos.proveedores = proveedores.id_prov";
                    $sql = pg_query($conexion,$query);
                    
                    while($consulta=pg_fetch_assoc($sql)){ ?>
                    
                        <tr>
                            <td><?php echo $consulta['id_prod'];?></td>
                            <td><?php echo $consulta['nombre_prod'];?></td>
                            <td><?php echo $consulta['precio'];?></td>
                            <td><?php echo $consulta['stock'];?></td>
                            <td><?php echo $consulta['nombre_prov'];?></td>
                            <td class="acciones">
                                <button class="accion" id="editar"><a href="ABM/editarForm.php?Id=<?php echo $consulta['id_prod']?>">Editar</a></button>
                                <button class="accion" id="eliminar"><a href="ABM/eliminarDato.php?Id=<?php echo $consulta['id_prod']?>">Eliminar</a></button>

                                <form action="" method="post">

                                    <input type="hidden" name="idC" id="idC" value="<?php echo $consulta['id_prod'];?>">
                                    <input type="hidden" name="nombreC" id="nombreC" value="<?php echo $consulta['nombre_prod'];?>">
                                    <input type="hidden" name="precioC" id="precioC" value="<?php echo $consulta['precio'];?>">
                                    <input type="hidden" name="cantidadC" id="cantidadC" value="<?php echo 1;?>">

                                    <button class="accion" type="submit" name="btnComprar" value="Agregar"><i class="fa-solid fa-cart-shopping"></i></button>

                                </form>
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