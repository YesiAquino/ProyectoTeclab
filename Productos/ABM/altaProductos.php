<?php
require '../../conexion.php';

$id = $_POST['idProducto'];
$nombre = $_POST['nombreProducto'];
$precio = $_POST['precioProducto'];
$cantidad = $_POST['cantidadProducto'];
$proveedor = $_POST['proveedorProducto'];

$check = "SELECT 1 FROM productos WHERE id_prod='$id'";
$obj= pg_query($conexion, $check);
if($obj){
    $rows = pg_num_rows($obj);
    if($rows > 0){
            
        $actualizarStock = "UPDATE productos SET stock = stock + $cantidad WHERE id_prod = '$id'";
        $resultado = pg_query($conexion, $actualizarStock);

                if($resultado){
                    $id = $_POST['idProducto'];
                    $cantidad = $_POST['cantidadProducto'];
                    $fecha = date("Y-m-d");
            
                    $query2 = ("INSERT INTO entradas(id_prodentrada,cantidad,fecha)VALUES('$id','$cantidad','$fecha')");
                    $resultado3 = pg_query($conexion, $query2);
                     if($resultado3){
                    header("location:../productos.php");
                    }else{
                    echo "Algo malió sal";
                    }
                }else{
                echo "Algo malió sal";
                 }

    }else{

        $query = ("INSERT INTO productos(id_prod,nombre_prod,precio,stock,proveedores)VALUES('$id','$nombre','$precio','$cantidad','$proveedor')");
        $resultado2 = pg_query($conexion, $query);

        if ($resultado2){
    
            $id = $_POST['idProducto'];
            $cantidad = $_POST['cantidadProducto'];
            $fecha = date("Y-m-d");
            
            $query2 = ("INSERT INTO entradas(id_prodentrada,cantidad,fecha)VALUES('$id','$cantidad','$fecha')");
            $resultado3 = pg_query($conexion, $query2);
            if($resultado3){
                header("location:../productos.php");
            }else{
                echo "Algo malió sal";
            }
        }
    }
} else {
    echo "Error en la consulta: " . pg_last_error($conexion);
}

// $query = ("INSERT INTO productos(id_prod,nombre_prod,precio,stock,proveedores)VALUES('$id','$nombre','$precio','$cantidad','$proveedor')");

// if ($obj = pg_query($conexion, $query)) {
    
//     $id = $_POST['idProducto'];
//     $cantidad = $_POST['cantidadProducto'];
//     $fecha = date("Y-m-d");

//     $query2 = ("INSERT INTO productos(id_prod,cantidad,fecha)VALUES('$id','$cantidad','$fecha')");

//         if ($obj2 = pg_query($conexion, $query2)) {

//             $check = "SELECT 1 FROM productos WHERE id_prod='$id'";
            
//             if(pg_query($conexion, $check) === TRUE ){
//                 $check1 = '1';
//             }else{
//                 $check1 = '0';
//             }

//             if($check1 == '1'){

//                 $actualizarStock = "UPDATE productos SET stock = stock+'$cantidad' WHERE id_prod = '$idProd'";

//                 if(pg_query($conexion, $actualizarStock)){
//                     header("location:../productos.php");
//                 }else{
//                 echo "Algo malió sal";
//                 }

//             }else{
//                 echo "Algo malió sal";
//             }
//         } else {
//             echo "Datos no insertados";
//         };
// } else {
//     echo "Datos no insertados";
// }
?>