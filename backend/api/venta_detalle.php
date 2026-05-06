<?php
ob_start();
error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT & ~E_NOTICE);
ini_set('display_errors', 0);

// Manejo de CORS centralizado
require_once __DIR__ . '/cors_header.inc.php';

header("Content-Type: application/json; charset=UTF-8");
ob_clean();

include(__DIR__ . "/../conexiones/config.inc.php");

$nro_factura = isset($_GET['nro_factura']) ? $_GET['nro_factura'] : '';

if (empty($nro_factura)) {
    echo json_encode(["status" => "error", "message" => "Número de factura requerido"]);
    exit;
}

// 1. Obtener encabezado de venta
$sql_vta = "SELECT * FROM tr_ventas_encabezado WHERE nro_factura = $nro_factura";
$res_vta = $db->Execute($sql_vta);

if (!$res_vta || $res_vta->EOF) {
    echo json_encode(["status" => "error", "message" => "Venta no encontrada"]);
    exit;
}

$venta = $res_vta->fields;
$documento = $venta['documento'];

// 2. Obtener datos del paciente
$sql_pac = "SELECT * FROM pacientes WHERE documento = '$documento'";
$res_pac = $db->Execute($sql_pac);
$paciente = $res_pac ? $res_pac->fields : [];

// 3. Obtener diagnóstico y fuente
$sql_diag = "SELECT pd.*, f.nombre_fuente, d.nombre_diagnostico 
             FROM paciente_diagnostico pd 
             LEFT JOIN fuentes f ON pd.cod_fuente = f.nro_fuente
             LEFT JOIN diagnostico d ON pd.cod_diagnostico = d.nro_diagnostico
             WHERE pd.documento = '$documento' 
             ORDER BY pd.nro_ficha DESC LIMIT 1";
$res_diag = $db->Execute($sql_diag);
$diagnostico = $res_diag ? $res_diag->fields : null;

// 4. Obtener detalles de la venta
$sql_det = "SELECT vd.* FROM tr_ventas_detalle vd WHERE vd.nro_factura = $nro_factura ORDER BY vd.cod_detalle ASC";
$res_det = $db->Execute($sql_det);

$items = [];
if ($res_det) {
    while (!$res_det->EOF) {
        $item = $res_det->fields;
        $cod_mercaderia = $item['cod_mercaderia'];

        // Obtener info extendida de monodrogas/drogas
        $sql_mono = "SELECT m.*, d.droga as nombre_droga, l.laboratorio as nombre_laboratorio
                     FROM monodrogas m
                     LEFT JOIN drogas d ON m.cod_droga = d.cod_droga
                     LEFT JOIN laboratorios l ON m.laboratorio = l.cod_laboratorio
                     WHERE m.cod_barra = '$cod_mercaderia' OR m.troquel = '$cod_mercaderia'
                     LIMIT 1";
        $res_mono = $db->Execute($sql_mono);
        
        if ($res_mono && !$res_mono->EOF) {
            $item['info_droga'] = $res_mono->fields;
            $item['nombre_droga'] = utf8_encode($res_mono->fields['nombre_droga']);
            $item['nombre_comercial_mono'] = utf8_encode($res_mono->fields['nombre_comercial']);
            $item['laboratorio_mono'] = utf8_encode($res_mono->fields['nombre_laboratorio']);
        }

        $items[] = $item;
        $res_det->MoveNext();
    }
}

// Limpiar codificación de strings para JSON
function cleanData(&$data) {
    if (is_array($data)) {
        foreach ($data as $key => &$value) {
            if (is_string($value)) {
                $value = utf8_encode(trim($value));
            } elseif (is_array($value)) {
                cleanData($value);
            }
        }
    }
}

$response = [
    "status" => "success",
    "venta" => $venta,
    "paciente" => $paciente,
    "diagnostico" => $diagnostico,
    "items" => $items
];

cleanData($response);

echo json_encode($response);
?>
