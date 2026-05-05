<?php
// Desactivar cualquier salida previa
ob_start();

// Silenciar warnings y deprecated para no romper el JSON en PHP 8
error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT & ~E_NOTICE);
ini_set('display_errors', 0);

// Manejo de CORS
if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');
} else {
    header("Access-Control-Allow-Origin: *");
}

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
    exit(0);
}

header("Content-Type: application/json; charset=UTF-8");

// Limpiar cualquier buffer previo por si acaso
ob_clean();

$config_path = "../../conexiones/config.inc.php";
if (!file_exists($config_path)) {
    $config_path = "../conexiones/config.inc.php";
}

if (file_exists($config_path)) {
    include($config_path);
} else {
    echo json_encode(["status" => "error", "message" => "Config not found"]);
    exit;
}

// Obtener parámetros de búsqueda
$q = isset($_GET['q']) ? $_GET['q'] : '';

if (empty($q)) {
    echo json_encode([]);
    exit;
}

// Escapar el parámetro para evitar inyecciones básicas (usando q como parte de like)
$search = "%" . str_replace(" ", "%", $q) . "%";

// Búsqueda por documento, nombre o apellido (asegurando insensibilidad a mayúsculas)
$sql = "SELECT cod_paciente, TRIM(apellido) as apellido, TRIM(nombre) as nombre, documento, fecha_nac 
        FROM pacientes 
        WHERE documento LIKE '$search' 
           OR UPPER(apellido) LIKE UPPER('$search') 
           OR UPPER(nombre) LIKE UPPER('$search') 
           OR UPPER(CONCAT(TRIM(apellido), ' ', TRIM(nombre))) LIKE UPPER('$search')
        LIMIT 50";

$result = $db->Execute($sql);

$pacientes = [];
if ($result) {
    while (!$result->EOF) {
        $pacientes[] = [
            "id" => $result->fields["cod_paciente"],
            "apellido" => $result->fields["apellido"],
            "nombre" => $result->fields["nombre"],
            "documento" => $result->fields["documento"],
            "cod_paciente" => $result->fields["cod_paciente"],
            "fecha_nac" => $result->fields["fecha_nac"]
        ];
        $result->MoveNext();
    }
}

echo json_encode($pacientes);
?>
