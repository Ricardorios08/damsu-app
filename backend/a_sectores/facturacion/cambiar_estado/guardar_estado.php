<?php

$nro_factura = $_REQUEST['nro_factura'];
$documento = $_REQUEST['documento'];
$estado = $_REQUEST['estado'];

$estadoss=$_POST["estados"];
for ($i=0;$i<count($estadoss);$i++)    
{     
$estados = $estadoss[$i];    
}

echo "aca";

$bander = 1;
$palabra = $documento;

echo getcwd() . "\n";

include ("../buscar_paciente_general_coir.php");

echo "aca1";