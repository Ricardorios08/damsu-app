<?php

include ("../../conexiones/config.inc.php");

$nro_factura = $_REQUEST['nro_factura'];
$documento = $_REQUEST['documento'];
$estado = $_REQUEST['estado'];

$estadoss=$_POST["estados"];
for ($i=0;$i<count($estadoss);$i++)    
{     
$estados = $estadoss[$i];    
}

 

$bander = 1;
$palabra = $documento;

//echo getcwd() . "\n";

 $sql = "UPDATE `tr_ventas_encabezado` SET `estado` = '$estados' WHERE `nro_factura` = $nro_factura";
$result = $db->Execute($sql);


include ("buscar_paciente_general_coir.php");

 