<?php
include('../conexiones/config.inc.php');
$res = $db->Execute('SHOW COLUMNS FROM pacientes');
while(!$res->EOF) {
    print_r($res->fields);
    $res->MoveNext();
}
?>
