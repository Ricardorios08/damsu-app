<?php


$a = $_GET['id'];

include ("../../../conexiones/config_usu.php");

$sql="select * from fuentes where nro_fuente like '$a'";
$result = $db->Execute($sql);


$nro_fuente=strtoupper($result->fields["nro_fuente"]);
$nombre_fuente=strtoupper($result->fields["nombre_fuente"]);
$nombre_reducido_fuente=strtoupper($result->fields["nombre_reducido_fuente"]);

echo $sql="select * from diagnostico where nro_diagnostico like '$a'";
$result = $db->Execute($sql);

$nro_diagnostico=strtoupper($result->fields["nro_diagnostico"]);
$nombre_diagnostico=strtoupper($result->fields["nombre_diagnostico"]);
$nombre_reducido_diagnostico=strtoupper($result->fields["nombre_reducido_diagnostico"]);
$cod_agrupado=strtoupper($result->fields["cod_agrupado"]);
$nombre_agrupado=strtoupper($result->fields["agrupado"]);

echo $sql="select * from diagnostico_agrupado where cod_agrupado like '$cod_agrupado'";
$result = $db->Execute($sql);

echo $nombre_agrupado=$result->fields["nombre_agrupado"];


?>





