<?php
$p1 = '../conexiones/config.inc.php';
$p2 = '../../conexiones/config.inc.php';
echo "Path 1 exists: " . (file_exists($p1) ? 'YES' : 'NO') . " ($p1)\n";
echo "Path 2 exists: " . (file_exists($p2) ? 'YES' : 'NO') . " ($p2)\n";

if (file_exists($p1)) include($p1);
elseif (file_exists($p2)) include($p2);

if (!isset($db)) {
    echo "ERROR: \$db is not set after include\n";
} else {
    echo "SUCCESS: \$db is set\n";
    $sql = "SELECT id, apellido, nombre FROM pacientes LIMIT 5";
    $result = $db->Execute($sql);
    while(!$result->EOF) {
        echo "Patient: " . $result->fields['apellido'] . ", " . $result->fields['nombre'] . "\n";
        $result->MoveNext();
    }
}
?>
