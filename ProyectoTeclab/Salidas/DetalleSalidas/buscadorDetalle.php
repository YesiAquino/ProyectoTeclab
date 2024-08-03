<?php
require '../../conexion.php';

$columnas = ['id_salida', 'cod_ref', 'id_producto', 'cantidad', 'total', 'nombre_prod'];
$columnasWhere = ['cod_ref', 'nombre_prod'];

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

$sql = "SELECT " . implode(", ", $columnas) . " FROM detallesalidas
INNER JOIN productos ON detallesalidas.id_producto = productos.id_prod
$where ";


$resultado = pg_query($conexion,$sql);
$num_rows = pg_num_rows($resultado);

$html = '';

if ($num_rows > 0) {
    while ($row = pg_fetch_assoc($resultado)) {
        $html .= '<tr>';
        $html .= '<td>' . $row['id_salida'] . '</td>';
        $html .= '<td>' . $row['cod_ref'] . '</td>';
        $html .= '<td>' . $row['nombre_prod'] . '</td>';
        $html .= '<td>' . $row['cantidad'] . '</td>';
        $html .= '<td>' . $row['total'] . '</td>';
        $html .= '<td class="acciones">
        
        <button class="accion" id="eliminar"><a href="eliminarDetalle.php?Id=' . $row['id_salida'] . '">Eliminar</a></button>

        </td>';

    }
} else {
    $html .= '<tr>';
    $html .= '<td colspan="6">Sin resultados</td>';
    $html .= '</tr>';
}

echo json_encode($html, JSON_UNESCAPED_UNICODE);
?>