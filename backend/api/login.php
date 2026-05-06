<?php
// Desactivar cualquier salida previa
ob_start();

// Silenciar warnings y deprecated para no romper el JSON en PHP 8
error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT & ~E_NOTICE);
ini_set('display_errors', 0);

// Manejo de CORS centralizado
require_once __DIR__ . '/cors_header.inc.php';

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
    echo json_encode(["status" => "error", "message" => "Config not found at $config_path"]);
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);
$user = isset($data['usuario']) ? $data['usuario'] : '';
$pass = isset($data['password']) ? $data['password'] : '';

if (empty($user) || empty($pass)) {
    echo json_encode(["status" => "error", "message" => "Usuario y contraseña requeridos"]);
    exit;
}

$sql = "select * from usuario where usuario like '$user' and contrasena like '$pass'";
$result = $db->Execute($sql);

if ($result && !$result->EOF) {
    $row = $result->fields;
    echo json_encode([
        "status" => "success",
        "user" => [
            "id" => $row["id"],
            "usuario" => $row["usuario"],
            "nombre" => $row["nombre_usuario"],
            "rol" => $row["rol"],
            "programa" => $row["programa"]
        ]
    ]);
} else {
    echo json_encode(["status" => "error", "message" => "Credenciales inválidas"]);
}
?>
