<?php
require '../conexion.php';
include 'carrito.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/ProyectoTeclab/Vista/css/productos.css">
    <title>Lista del carrito</title>
</head>
<body>

    <button class="accion"><a href="http://localhost/ProyectoTeclab/Productos/productos.php">X</a></button>
    
    <h3>Lista del carrito</h3>

    <?php if(!empty($_SESSION['CARRITO'])) { ?>
        <table class="tabla">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>--</th>
                </tr>
            </thead>
            <tbody>
                <?php $total=0; ?>
                <?php foreach($_SESSION['CARRITO'] as $indice=>$producto){?>
                <tr>
                    <td><?php echo $producto['ID']?></td>
                    <td><?php echo $producto['NOMBRE']?></td>
                    <td><?php echo $producto['PRECIO']?></td>
                    <td>


                        <button class="accion" type="submit" name="btnComprar" value="Decrementar">-</button>
                            <?php echo $producto['CANTIDAD']?>
                        <button class="accion" type="submit" name="btnComprar" value="Incrementar">+</button>
                        

                    </td>
                    <td>$<?php echo number_format($producto['PRECIO']*$producto['CANTIDAD'],2);?></td>
                    <td>
                        <form action="" method="post">
                        
                        <input type="hidden" id="id" name="id" value="<?php echo ($producto['ID'])?>";>

                        <button class="accion" type="submit" name="btnComprar" value="Eliminar">Eliminar</button>

                        </form>
                    </td>
                </tr>
                <?php $total=$total+($producto['PRECIO']*$producto['CANTIDAD']); ?>
                <?php } ?>
                <tr>
                    <td><h3>Total</h3></td>
                    <td><h3>$<?php echo number_format($total,2);?></h3></td>
                    <td><button class="accion">Guardar</button></td>
                </tr>
            </tbody>
        </table>
    <?php }else{ ?>
        <div class="alert">
            No hay productos en el carrito...
        </div>
    <?php } ?>
</body>
</html>