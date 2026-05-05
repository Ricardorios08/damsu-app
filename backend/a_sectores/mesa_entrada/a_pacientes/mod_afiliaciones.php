
<?php  
include ("../../../conexiones/config_usu.php");

$documento=$_REQUEST["documento"]; 
$cod_operacion=$_REQUEST["cod_operacion"]; 

$sql="select * from pacientes where documento = $documento";
$result1 = $db->Execute($sql);

$cod_paciente =$result1->fields["cod_paciente"];


$nro_o=$_POST["obrasocial"];
for ($i=0;$i<count($nro_o);$i++)    
{     
$nro_os= $nro_o[$i];    
}

if ($nro_os == ""){



$sql="select * from afiliaciones where cod_operacion = $cod_operacion";
$result = $db->Execute($sql);


$nro_os =$result->fields["nro_os"];
}


$sql="select * from obrasocial where nro_os = $nro_os";
$result = $db->Execute($sql);

$sigla=$result->fields["sigla"];





$otros=$_POST["otros"];


$nro_afiliado=$_POST["nro_afiliado"];

$dia=$_POST["dia"];
$mes=$_POST["mes"];
$anio=$_POST["anio"];
$fecha=$anio."-".$mes."-".$dia;

if ($fecha == "--"){
$fecha = date("Y-m-d");
}



echo $sql = "UPDATE afiliaciones SET `nro_os` = '$nro_os' , `nombre_os` = '$sigla' , `nro_afiliado` = '$nro_afiliado' , `fecha` = '$fecha' , `otros` = '$otros' WHERE cod_operacion = $cod_operacion";
mysql_query($sql);



$leyenda = "LOS DATOS HAN SIDO GUARDADOS EN EL SISTEMA";
include ("../../../alertas/campo_informacion.php");



 $palabra = $documento;
$bander = 1;

//include ("buscar_paciente.php");	


?>

