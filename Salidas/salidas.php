<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://localhost/ProyectoTeclab/Vista/css/productos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Lista de Entradas</title>
</head>
<body>
    <!-- Encabezado -->
    <div class="encabezado">
        <img src="http://localhost/ProyectoTeclab/Vista/img/logo.png" alt="">
    </div>
    
    <!-- Seccion Productos -->
    <section class="entradas">
        <div class="atras">
            <button id="atras"><a id=a href="http://localhost/ProyectoTeclab/inicio.html"><i class="fa-solid fa-arrow-left"></i></a></button>
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
                        <th id="cantidad">Cantidad</th>
                        <th id="fecha">Fecha</th>
                        <th id="acciones">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    
                    require '../conexion.php';

                    $query = "SELECT * FROM Salidas";
                    $sql = pg_query($conexion,$query);
                    
                    while($consulta=pg_fetch_assoc($sql)){ ?>
                    
                        <tr>
                            <td><?php echo $consulta['id_salida'];?></td>
                            <td><?php echo $consulta['id_prod'];?></td>
                            <td><?php echo $consulta['cantidad'];?></td>
                            <td><?php echo $consulta['fecha'];?></td>
                            <td class="acciones">
                                <button class="accion" id="editar"><a href="BM/editarForm3.php?Id=<?php echo $consulta['id_prod']?>">Editar</a></button>
                                <button class="accion" id="eliminar"><a href="BM/eliminarDatos3.php?Id=<?php echo $consulta['id_prod']?>">Eliminar</a></button>                               
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <!-- <div class="botones">
            <button class="boton" id="btn-editar">Editar</button>
            <button class="boton" id="btn-borrar">Borrar</button>
        </div> -->
    </section>
</body>
</html>