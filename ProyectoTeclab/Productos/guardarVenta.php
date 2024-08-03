<?php
include '../conexion.php';
include 'carrito.php';


if (isset($_POST['guardarCarrito'])){

    $referencia = uniqid();

    $query = "INSERT INTO salidas (cod_ref) VALUES ('$referencia')";

    if (pg_query($conexion, $query)){
        
        if(isset($_SESSION['CARRITO'])) {
            $carrito = $_SESSION['CARRITO'];

            foreach ($carrito as $producto) {
                $idProd = $producto['ID'];
                $cantidad = $producto['CANTIDAD'];
                $total = $producto['PRECIO'];
    
                $query2 = "INSERT INTO detallesalidas (cod_ref, id_producto, cantidad, total) VALUES ('$referencia', '$idProd', '$cantidad', '$total')";
        
                if ($resultado = pg_query($conexion, $query2)){

                    $actualizarStock = "UPDATE productos SET stock = stock-1 WHERE id_prod = '$idProd'";

                    if(pg_query($conexion, $actualizarStock)){

                    unset($_SESSION['CARRITO']);
                    header("location:mostrarCarrito.php");
                    
                    }else{
                        echo "Algo malió sal"; 
                    }
                }else{
                    echo "Algo malió sal"; 
                }
            }
        }

    }else{
        echo "Algo malió sal";
    }

}


?>