<form action="borrar_receta_clave.php" method="post" target = "central1">

<?php 

$nro_receta= $_REQUEST['nro_receta'];
$contra= strtoupper($_REQUEST['contra']);
echo $documento= $_REQUEST['documento'];
$operador= $_REQUEST['operador'];

include ("../../../conexiones/config_usu.php");

if ($contra == "COIR"){
$sql7="delete from receta where nro_receta = $nro_receta";
$result7 = $db->Execute($sql7);

$sql7="delete from detalle_receta where nro_receta = $nro_receta";
$result7 = $db->Execute($sql7);

$leyenda = "SE ELIMINO LA RECETA ".$nro_receta;
include ("../../../alertas/campo_informacion.php");
$bander = 1;
$band = 1;
$palabra = $documento;
include ("../../facturacion/buscar_paciente_general_facturacion1.php");	
}
ELSE{
$leyenda = "CONTRASEÑA INCORRECTA";
include ("../../../alertas/campo_informacion.php");
}
?>