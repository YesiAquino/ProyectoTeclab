<?php
require '../conexion.php';
include 'carrito.php';


$columnas = ['id_prod', 'nombre_prod', 'precio', 'stock', 'proveedores', 'nombre_prov'];
$columnasWhere = ['id_prod', 'nombre_prod', 'nombre_prov'];

$campo = isset($_POST['campo']) ? ($_POST['campo']) : null;

$where = '';

if ($campo != null) {
    $where = "WHERE (";

    $cont = count($columnasWhere);
    for ($i = 0; $i < $cont; $i++) {
        $where .= $columnasWhere[$i] . " ILIKE '%" . $campo . "%' OR ";
    }
    $where = substr_replace($where, "", -3);
    $where .= ")";
}

$sql = "SELECT " . implode(", ", $columnas) . " FROM productos
INNER JOIN proveedores ON productos.proveedores = proveedores.id_prov
$where ";


$resultado = pg_query($conexion,$sql);
$num_rows = pg_num_rows($resultado);

$html = '';

if ($num_rows > 0) {
    while ($row = pg_fetch_assoc($resultado)) {
        $html .= '<tr>';
        $html .= '<td>' . $row['id_prod'] . '</td>';
        $html .= '<td>' . $row['nombre_prod'] . '</td>';
        $html .= '<td>$' . $row['precio'] . '</td>';
        $html .= '<td>' . $row['stock'] . '</td>';
        $html .= '<td>' . $row['nombre_prov'] . '</td>';
        $html .= '<td class="acciones">
        <button class="accion" id="editar"><a href="ABM/editarForm.php?Id=' . $row['id_prod'] . '">Editar</a></button>
        <button class="accion" id="eliminar"><a href="ABM/eliminarDato.php?Id=' . $row['id_prod'] . '">Eliminar</a></button>

        <form action="" method="post">

            <input type="hidden" name="idC" id="idC" value="' . $row['id_prod'] . '">
            <input type="hidden" name="nombreC" id="nombreC" value="' . $row['nombre_prod'] . '">
            <input type="hidden" name="precioC" id="precioC" value="' . $row['precio'] . '">
            <input type="hidden" name="cantidadC" id="cantidadC" value="1">

            <button class="accion" type="submit" name="btnComprar" value="Agregar"><i class="fa-solid fa-cart-shopping"></i></button>

        </form>
    </td>';

    }
} else {
    $html .= '<tr>';
    $html .= '<td colspan="6">Sin resultados</td>';
    $html .= '</tr>';
}

echo json_encode($html, JSON_UNESCAPED_UNICODE);
?>