<?php
session_start();

$mensaje="";

    if(isset($_POST['btnComprar'])){

        switch($_POST['btnComprar']){

            case 'Agregar':

                if(is_numeric($_POST['idC'])){
                    $ID=$_POST['idC'];
                }else{
                    $mensaje.="ID incorrecto: ".$ID."<br>";
                }

                if(is_string($_POST['nombreC'])){
                    $NOMBRE=$_POST['nombreC'];
                    }else{$mensaje.="Nombre incorrecto: "."<br>"; break;}

                    if(is_numeric($_POST['precioC'])){
                        $PRECIO=$_POST['precioC'];
                    }else{$mensaje.="Precio incorrecto:"."<br>"; break;}

                    if(is_numeric($_POST['cantidadC'])){
                        $CANTIDAD=$_POST['cantidadC'];
                    }else{$mensaje.="Cantidad incorrecta:"."<br>"; break;}

                if(!isset($_SESSION['CARRITO'])){

                    $producto=array(
                        'ID'=>$ID, 
                        'NOMBRE'=>$NOMBRE,
                        'PRECIO'=>$PRECIO,
                        'CANTIDAD'=>$CANTIDAD
                    );
                    $_SESSION['CARRITO'][0]=$producto;

                }else{

                    $idProductos=array_column($_SESSION['CARRITO'],"ID");

                    if(in_array($ID,$idProductos)){
                        echo "<script>alert('El producto ya ha sido seleccionado..');</script>";

                    }else{
                        $NumeroProductos=count($_SESSION['CARRITO']);
                        $producto=array(
                            'ID'=>$ID,
                            'NOMBRE'=>$NOMBRE,
                            'PRECIO'=>$PRECIO,
                            'CANTIDAD'=>$CANTIDAD
                        );

                        $_SESSION['CARRITO'][$NumeroProductos]=$producto;
                    }
                }

            break;

            case "Eliminar":

                if(is_numeric($_POST['id'])){
                    $ID=$_POST['id'];
                
                    foreach($_SESSION['CARRITO'] as $indice=>$producto){
                        if($producto['ID']==$ID){
                            unset($_SESSION['CARRITO'][$indice]);
                            header("location:mostrarCarrito.php");
                        }
                    }

                }else{
                    $mensaje.="ID incorrecto".$ID."<br>";
                }
            break;

            case "Decrementar":
                if(is_numeric($_POST['id'])){
                    $ID=$_POST['id'];
                    $CANTIDAD=1;
                
                    foreach($_SESSION['CARRITO'] as $indice=>$producto){
                        if($producto['ID'] == $ID) {
                        $_SESSION['CARRITO'][$indice]['CANTIDAD'] -= $CANTIDAD;
                        }

                    }
                }
            break;

            case "Incrementar":
                if(is_numeric($_POST['id'])){
                    $ID=$_POST['id'];
                    $cantidad=1;
                
                    foreach($_SESSION['CARRITO'] as $indice=>$producto){
                        if($producto['ID'] == $ID) {
                        $_SESSION['CARRITO'][$indice]['CANTIDAD'] += $cantidad;
                        }

                    }
                }
            break;
        }
    }






?>