
<?php 
include ("../../../conexiones/config_usu.php");

 
$documento=$_POST["documento"];
if ($documento == ""){
	$leyenda = "Usted no ingreso Documento";
include ("../../../alertas/campo_vacio.php");

}
else
{

$sql="select * from pacientes where documento like '$documento'";
$result1 = $db->Execute($sql);

$docu=$result1->fields["documento"];
$cod_paciente =$result1->fields["cod_paciente"];

if ($docu != $documento) {
	echo "No existe Paciente con ese Documento o no esta cargado en la base de datos. Por favor complete los datos en el sector de altas de Pacientes.";
}
	else
	{

$otros=$_POST["otros"];


$nro_o=$_POST["obrasocial"];
for ($i=0;$i<count($nro_o);$i++)    
{     
$nro_os= $nro_o[$i];    
}


$tipo_doc=$_POST["tipo_doc"];
 



$sql="select * from obrasocial where nro_os = $nro_os";
$result = $db->Execute($sql);

$sigla=$result->fields["nombre_os"];

$nro_afiliado=$_POST["nro_afiliado"];
$dia=$_POST["dia_a"];
$mes=$_POST["mes_a"];
$anio=$_POST["anio_a"];
$fecha=$anio."-".$mes."-".$dia;

if ($fecha == "--"){
$fecha = date("Y-m-d");
}

$sql = "INSERT INTO `afiliaciones` ( `documento` , `nro_os` , `nombre_os` , `nro_afiliado` , `otros`  , `cod_paciente` ,`fecha` ) VALUES ( '$documento', '$nro_os' , '$sigla' , '$nro_afiliado' , '$otros' , '$cod_paciente' , '$fecha')";


echo $sql = "INSERT INTO  afiliaciones (`tipo_doc`, `documento`, `nro_os`, `nombre_os`, `nro_afiliado`, `otros`, `cod_paciente`, `fecha`, `cod_operacion`) VALUES ('$tipo_doc', '$documento', '$nro_os', '$sigla', '$nro_afiliado', '$otros', '$cod_paciente', '$fecha', '')";
mysql_query($sql);


$leyenda = "LOS DATOS HAN SIDO GUARDADOS EN EL SISTEMA";
include ("../../../alertas/campo_informacion.php");


	}}

?>