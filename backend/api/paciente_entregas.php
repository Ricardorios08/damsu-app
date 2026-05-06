<?php
ob_start();
error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT & ~E_NOTICE);
ini_set('display_errors', 0);

// Manejo de CORS centralizado
require_once __DIR__ . '/cors_header.inc.php';

header("Content-Type: application/json; charset=UTF-8");
ob_clean();

include(__DIR__ . "/../conexiones/config.inc.php");

$cod_paciente = isset($_GET['cod_paciente']) ? $_GET['cod_paciente'] : '';

if (empty($cod_paciente)) {
    echo json_encode(["status" => "error", "message" => "Código de paciente requerido"]);
    exit;
}

// 1. Obtener datos del paciente
$sql_pac = "SELECT apellido, nombre, documento, tipo_doc FROM pacientes WHERE cod_paciente = $cod_paciente";
$res_pac = $db->Execute($sql_pac);

if (!$res_pac || $res_pac->EOF) {
    echo json_encode(["status" => "error", "message" => "Paciente no encontrado"]);
    exit;
}

$paciente = [
    "nombre" => trim($res_pac->fields["nombre"]),
    "apellido" => trim($res_pac->fields["apellido"]),
    "documento" => $res_pac->fields["documento"],
    "tipo_doc" => $res_pac->fields["tipo_doc"]
];

$documento = $paciente["documento"];

// 2. Obtener historial de ventas/entregas
$sql_ent = "SELECT nro_factura, fecha, fecha_coir, nro_receta, neto, estado, nombre_prestador 
            FROM tr_ventas_encabezado 
            WHERE documento = $documento 
            ORDER BY nro_factura DESC";
$res_ent = $db->Execute($sql_ent);

$entregas = [];
if ($res_ent) {
    while (!$res_ent->EOF) {
        $nro_factura = $res_ent->fields["nro_factura"];
        
        // Contadores de detalles
        // Total items
        $sql_total = "SELECT COUNT(*) as total FROM tr_ventas_detalle WHERE nro_factura = $nro_factura";
        $res_total = $db->Execute($sql_total);
        $total_items = $res_total ? $res_total->fields["total"] : 0;

        // Recibidos
        $sql_rec = "SELECT COUNT(*) as cant FROM tr_ventas_detalle WHERE nro_factura = $nro_factura AND recibido_coir = 1";
        $res_rec = $db->Execute($sql_rec);
        $recibidos = $res_rec ? $res_rec->fields["cant"] : 0;

        // Indicados
        $sql_ind = "SELECT COUNT(*) as cant FROM tr_ventas_detalle WHERE nro_factura = $nro_factura AND indicado_coir = 1";
        $res_ind = $db->Execute($sql_ind);
        $indicados = $res_ind ? $res_ind->fields["cant"] : 0;

        // Preparados
        $sql_prep = "SELECT COUNT(*) as cant FROM tr_ventas_detalle WHERE nro_factura = $nro_factura AND preparado_coir = 1";
        $res_prep = $db->Execute($sql_prep);
        $preparados = $res_prep ? $res_prep->fields["cant"] : 0;

        $entregas[] = [
            "nro_factura" => $nro_factura,
            "fecha" => $res_ent->fields["fecha"],
            "fecha_coir" => $res_ent->fields["fecha_coir"],
            "nro_receta" => $res_ent->fields["nro_receta"],
            "neto" => $res_ent->fields["neto"],
            "estado" => $res_ent->fields["estado"],
            "prestador" => utf8_encode(trim($res_ent->fields["nombre_prestador"])),
            "stats" => [
                "total" => (int)$total_items,
                "recibidos" => (int)$recibidos,
                "indicados" => (int)$indicados,
                "preparados" => (int)$preparados
            ]
        ];
        
        $res_ent->MoveNext();
    }
}

echo json_encode([
    "status" => "success",
    "paciente" => $paciente,
    "entregas" => $entregas
]);
?>
