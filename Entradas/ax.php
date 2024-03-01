
<?php
                    
require '../conexion.php';

$query = "SELECT * FROM entradas
INNER JOIN productos ON entradas.id_prod = productos.id_prod";
$sql = pg_query($conexion,$query);

while($consulta=pg_fetch_assoc($sql)){ ?>

    <tr>
        <td><?php echo $consulta['id_entrada'];?></td>
        <td><?php echo $consulta['nombre_prod'];?></td>
        <td><?php echo $consulta['cantidad'];?></td>
        <td><?php echo $consulta['fecha'];?></td>
        <td class="acciones">
            <button class="accion" id="editar"><a href="BM/editarForm2.php?Id=<?php echo $consulta['id_prod']?>">Editar</a></button>
            <button class="accion" id="eliminar"><a href="BM/eliminarDatos2.php?Id=<?php echo $consulta['id_prod']?>">Eliminar</a></button>                               
        </td>
    </tr>
<?php
}
?>