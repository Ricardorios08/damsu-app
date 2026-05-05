<?php
include ("../../../conexiones/config_usu.php");

 $cod_diagnostico=$_POST["cod_diagnostico"];
$nombre_diagnostico=$_POST["nombre_diagnostico"];
$nombre_reducido=$_POST["nombre_reducido"];


$cod_agrupad=$_POST["cod_agrupado"];
for ($i=0;$i<count($cod_agrupad);$i++)    
{     
$cod_agrupado = $cod_agrupad[$i];    
}

if ($cod_agrupado == ""){
echo $sql="select * from diagnostico where nro_diagnostico like '$cod_diagnostico'";
$result = $db->Execute($sql);
$cod_agrupado=strtoupper($result->fields["cod_agrupado"]);
}



$nuevo_grupo=$_POST["nuevo_grupo"];

if ($nuevo_grupo != ""){
$sql = "INSERT INTO `diagnostico_agrupado` ( `cod_agrupado` , `nombre_agrupado` ) VALUES ( '', '$nuevo_grupo')";
$db->Execute($SQL);
$cod_agrupado = mysql_insert_id();
$nombre_agrupado = $nuevo_grupo;
}




if ($nombre_diagnostico == ""){
	$leyenda =  "Usted no ingreso nombre de diagnostico";
	include ("../../alertas/campo_vacio.php");
	exit;
}
else
{


echo $sql = "UPDATE `diagnostico` SET  `nombre_diagnostico` = '$nombre_diagnostico', `nombre_reducido` = '$nombre_reducido', `agrupado` = '$nombre_agrupado', `parte_cuerpo` = '', `cod_agrupado` = '$cod_agrupado' WHERE `nro_diagnostico` = '$cod_diagnostico' LIMIT 1";
mysql_query($sql);

//include ("buscar_diagnostico.php");

	}
