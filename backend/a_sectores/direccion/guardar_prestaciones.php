<?php 
include ("../../conexiones/config_usu.php");

 
$precio=$_POST["precio"];
$cantidad=$_POST["cantidad"];

IF ($cantidad == 0){
$cantidad = 1;
}


$observaciones=$_POST["observaciones"];
$documento=$_POST["documento"];

$prestacione=$_POST["prestaciones"];
for ($i=0;$i<count($prestacione);$i++)    
{     
$prestaciones = $prestacione[$i];    
}

  $prestaciones;
if ($prestaciones == ""){
  $leyenda = "NO INGRESO PRESTACION";
include ("../../alertas/campo_informacion2.php");
exit;
}
$fuentes=$_POST["fuente"];
for ($i=0;$i<count($fuentes);$i++)    
{     
$fuente = $fuentes[$i];    
}


$nuevo_prestador=$_POST["nuevo_prestador"];

if ($nuevo_prestador != ""){

$sql="select * from prestadores  where order by cod_prestador desc";
$result = $db->Execute($sql);

$cod_prestador=$result->fields["cod_prestador"]+1;
$nombre_prestador = $nuevo_prestador;

$sql = "INSERT INTO `prestadores` (`cod_prestador`, `nombre_prestador`) VALUES (NULL, '$nombre_prestador');";
mysql_query($sql);
}else{

$cod_prestadors=$_POST["cod_prestador"];
for ($i=0;$i<count($cod_prestadors);$i++)    
{     
$cod_prestador = $cod_prestadors[$i];    
}


$sql="select * from prestadores  where cod_prestador = $cod_prestador";
$result = $db->Execute($sql);

$nombre_prestador=$result->fields["nombre_prestador"];

}
 


/*
if (($prestaciones == "") or ($prestaciones == 0)){
	$leyenda =  "Usted no ingreso Prestación";
	include ("../../alertas/campo_informacion2.php");
	exit;

}
*/

$dia=$_POST["dia"];
$mes=$_POST["mes"];
$anio=$_POST["anio"];

$fecha = $anio."-".$mes."-".$dia;


$sql="select * from afiliaciones where documento =  $documento";
$result = $db->Execute($sql);

$nro_os=strtoupper($result->fields["nro_os"]);

$sql="select * from paciente_diagnostico where documento =  $documento";
$result = $db->Execute($sql);

$programa=strtoupper($result->fields["programa"]);


$sql="select * from fuentes where nro_fuente =  $fuente";
$result = $db->Execute($sql);

$nombre_fuente=$result->fields["nombre_fuente"];




echo $sql = "INSERT INTO `prestaciones_pacientes` (`tipo_doc` , `documento` , `cod_prestacion` , `precio` , `cant_realizado` , `observaciones` , `fecha_prestacion` , `nro_os` , `programa` , `cod_operacion`	 , `cod_prestador`	,	`nombre_prestador`	,	`nro_fuente`	,	`nombre_fuente`) VALUES ( '$tipo_doc', '$documento', '$prestaciones' , '$precio' , '$cantidad' , '$observaciones' , '$fecha'  , '$nro_os' , '$programa' , '' , '$cod_prestador'	,	'$nombre_prestador'	,	'$fuente'	,	'$nombre_fuente'  )";

mysql_query($sql);

$band = 1;
include ("registrar_prestaciones2.php");