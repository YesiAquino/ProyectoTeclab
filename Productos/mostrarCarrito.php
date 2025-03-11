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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.0.1/dist/sweetalert2.min.css">
    <title>Lista del carrito</title>
</head>
<body>
    <div class="btn-x">
    <button class="accion" id="x"><a href="http://localhost/ProyectoTeclab/Productos/productos.php">X</a></button>
    </div>
    
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
                    <td>$<?php echo $producto ['PRECIO']?></td>
                    <td>


                        <div class="btncantidad">
                            <form action="" method="post">
                                <input type="hidden" id="id" name="id" value="<?php echo ($producto['ID'])?>";>
                                <button class="btncant" type="submit" name="btnComprar" value="Decrementar">-</button>
                            </form>
                                                
                                <?php echo $producto['CANTIDAD']?>

                            <form action="" method="post">
                                <input type="hidden" id="id" name="id" value="<?php echo ($producto['ID'])?>";>
                                <button class="btncant" type="submit" name="btnComprar" value="Incrementar">+</button>
                            </form>
                        </div>

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
                    <td colspan="5"><h3>Total</h3></td>
                    <td><h3>$<?php echo number_format($total,2);?></h3></td>
                </tr>
                <td colspan="6">
                
                    <form action="guardarVenta.php" method="post">
                        <input type="submit" name="guardarCarrito" value="guardarCarrito">
                    </form>
                </td>



            </tbody>
        </table>
    <?php }else{ ?>
        <div class="alert">
            No hay productos en el carrito...
        </div>
    <?php } ?>
</body>
</html>