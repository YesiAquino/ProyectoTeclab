<?php
require '../conexion.php';

$columnas = ['id_prodentrada', 'nombre_prod', 'cantidad', 'fecha'];
$columnasWhere = ['id_prodentrada', 'nombre_prod'];

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

$sql = "SELECT " . implode(", ", $columnas) . " FROM entradas
INNER JOIN productos ON entradas.id_prodentrada = productos.id_prod
$where ";


$resultado = pg_query($conexion,$sql);
$num_rows = pg_num_rows($resultado);

$html = '';

if ($num_rows > 0) {
    while ($row = pg_fetch_assoc($resultado)) {
        $html .= '<tr>';
        $html .= '<td>' . $row['id_prodentrada'] . '</td>';
        $html .= '<td>' . $row['nombre_prod'] . '</td>';
        $html .= '<td>' . $row['cantidad'] . '</td>';
        $html .= '<td>' . $row['fecha'] . '</td>';
        $html .= '<td class="acciones">
        
        <button class="accion" id="eliminar"><a href="BM/eliminarDatos2.php?Id=' . $row['id_prodentrada'] . '">Eliminar</a></button>

        </td>';

    }
} else {
    $html .= '<tr>';
    $html .= '<td colspan="5">Sin resultados</td>';
    $html .= '</tr>';
}

echo json_encode($html, JSON_UNESCAPED_UNICODE);
?>