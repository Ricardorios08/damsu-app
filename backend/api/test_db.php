<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h3>Prueba de Entorno PHP</h3>";
echo "PHP Version: " . phpversion() . "<br>";
echo "extension_loaded('mysqli'): " . (extension_loaded('mysqli') ? 'SI' : 'NO') . "<br>";
echo "extension_loaded('mysql'): " . (extension_loaded('mysql') ? 'SI' : 'NO') . "<br>";

$config_path = "../conexiones/config.inc.php";
echo "Buscando config en: $config_path <br>";

if (file_exists($config_path)) {
    echo "Config encontrada. Intentando conectar...<br>";
    include($config_path);
    
    if (isset($db)) {
        echo "Objeto ADODB creado. Intentando Execute...<br>";
        try {
            $res = $db->Execute("SELECT NOW()");
            if ($res) {
                echo "¡CONEXIÓN EXITOSA! Fecha servidor: " . $res->fields[0];
            } else {
                echo "Error en Execute: " . $db->ErrorMsg();
            }
        } catch (Exception $e) {
            echo "Excepción: " . $e->getMessage();
        }
    } else {
        echo "Variable \$db no definida tras incluir config.";
    }
} else {
    echo "Archivo config no encontrado.";
}
?>
