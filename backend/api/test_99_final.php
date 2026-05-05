<?php
include('../conexiones/config.inc.php');
$sql = "SELECT cod_paciente, apellido, nombre FROM pacientes WHERE apellido LIKE '%ACEVEDO%' LIMIT 5";
$res = $db->Execute($sql);
if (!$res) {
    echo "ERROR: " . $db->ErrorMsg();
} else {
    while(!$res->EOF) {
        echo $res->fields['cod_paciente'] . " - " . $res->fields['apellido'] . ", " . $res->fields['nombre'] . "\n";
        $res->MoveNext();
    }
}
?>
