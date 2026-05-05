<?php 


include ("../../../conexiones/config_usu.php");
$sql1 = "TRUNCATE TABLE `cantidad_dptos`";
$result1 = $db->Execute($sql1);