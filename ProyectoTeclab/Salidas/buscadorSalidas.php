<?php
require '../conexion.php';

$columnas = ['id_det', 'cod_ref', 'fecha'];
$columnasWhere = ['id_det', 'cod_ref'];

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

$sql = "SELECT " . implode(", ", $columnas) . " FROM salidas
$where ";


$resultado = pg_query($conexion,$sql);
$num_rows = pg_num_rows($resultado);

$html = '';

if ($num_rows > 0) {
    while ($row = pg_fetch_assoc($resultado)) {
        $html .= '<tr>';
        $html .= '<td>' . $row['id_det'] . '</td>';
        $html .= '<td>' . $row['cod_ref'] . '</td>';
        $html .= '<td>' . $row['fecha'] . '</td>';
        $html .= '<td class="acciones">
        
        <button class="accion" id="eliminar"><a href="BM/eliminarDatos3.php?Id=' . $row['id_det'] . '">Eliminar</a></button>

        </td>';

    }
} else {
    $html .= '<tr>';
    $html .= '<td colspan="4">Sin resultados</td>';
    $html .= '</tr>';
}

echo json_encode($html, JSON_UNESCAPED_UNICODE);
?>