<?php

include ("../../../conexiones/config_usu.php");

$a = $_GET['id'];

$documento= $_REQUEST['documento'];
$tipo_doc= $_REQUEST['tipo_doc'];


$nombre_completo = $_GET['nombre_completo'];


echo $SQL="Delete From paciente_diagnostico where nro_ficha = '$a'";
$db->Execute($SQL);


$palabra = $documento;


 $bander = 1;
include ("buscar_paciente_general.php");	
?>





