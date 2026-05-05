<style type="text/css">
<!--
.Estilo1 {font-family: "Trebuchet MS"}
.Estilo7 {font-size: 18px}
-->
</style>

<?php 
 function CalculaEdad( $fecha ) {
    list($Y,$m,$d) = explode("-",$fecha);
    return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
}


include ("../../../conexiones/config_usu.php");

 $desde1 = '2013-01-01';
 $hasta1 = '2013-12-31';

//EXIT;
$base = "oncologico";

 //$sql1 = "DROP TABLE `cantidad_dptos`";
 //$result1 = $db->Execute($sql1);
/*

ECHO $sql = "CREATE TABLE IF NOT EXISTS `cantidad_dptos` (
 `apellido` varchar(30) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `documento` INT(10) NOT NULL,
  `departamento` varchar(40) NOT NULL,
  `provincia` varchar(40) NOT NULL,
  `fecha_nac` date NOT NULL DEFAULT '0000-00-00',
 `cod_diagnostico` varchar(10) NOT NULL,
`sexo` varchar(20) NOT NULL,
`radio` varchar(1) NOT NULL,
`quimio` varchar(1) NOT NULL,
`anio` varchar(4) NOT NULL

  ) ENGINE=MyISAM";

  


$result1 = $db->Execute($sql);

  EXIT;
*/
//exit;
//$sql1 = "TRUNCATE TABLE `cantidad_dptos`";
//$result1 = $db->Execute($sql1);



   
$sql1 = "SELECT $base.pacientes.apellido, $base.pacientes.nombre, $base.pacientes.documento, $base.pacientes.departamento, $base.pacientes.provincia, $base.pacientes.fecha_nac, $base.paciente_diagnostico.cod_diagnostico, $base.pacientes.sexo   FROM $base.paciente_diagnostico INNER JOIN $base.pacientes ON $base.paciente_diagnostico.documento = $base.pacientes.documento 

GROUP BY $base.pacientes.documento order BY $base.pacientes.departamento";
 $result1 = $db->Execute($sql1);


if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {


 $apellido=$result1->fields["apellido"];
  $nombre=$result1->fields["nombre"];
   $documento=$result1->fields["documento"];


 $departamento=$result1->fields["departamento"];
$provincia=$result1->fields["provincia"];
$fecha_nac=$result1->fields["fecha_nac"];
$cod_diagnostico=$result1->fields["cod_diagnostico"];

  $sexo=$result1->fields["sexo"];

 $sql4 = "INSERT INTO `oncologico`.`cantidad_dptos` (`apellido`, `nombre`, `documento`, `departamento`, `provincia`, `fecha_nac`, `cod_diagnostico`, `sexo` , `anio`) VALUES ('$apellido', '$nombre', '$documento', '$departamento', '$provincia', '$fecha_nac', '$cod_diagnostico', '$sexo' , '$anio')"; 
 $result4 = $db->Execute($sql4);





  $result1->MoveNext();
	}


////////////////

$sql1 = "SELECT *   FROM `cantidad_dptos`";
 $result1 = $db->Execute($sql1);


if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {

 
$documento=$result1->fields["documento"];

 

$sql = "SELECT *   FROM `tr_ventas_encabezado` where documento = $documento and fecha between '$desde1' and '$hasta1' group by documento";
 $result = $db->Execute($sql);
$doc=$result->fields["documento"];
$fecha=$result->fields["fecha"];
$anio = substr($fecha,0,4);

if ($doc != ""){
echo $sql2 = "UPDATE `cantidad_dptos` SET quimio = 'S' , anio = '$anio' WHERE documento= '$documento'";
 $result2 = $db->Execute($sql2);
}


$sql = "SELECT *   FROM `prestaciones_pacientes` where documento = $documento and fecha_prestacion between '$desde1' and '$hasta1' group by documento";
 $result = $db->Execute($sql);
$doc=$result->fields["documento"];
$fecha_prestacion=$result->fields["fecha_prestacion"];
$anio = substr($fecha_prestacion,0,4);

if ($doc != ""){
echo $sql2 = "UPDATE `cantidad_dptos` SET quimio = 'S' , anio = '$anio' WHERE documento= '$documento'";
 $result2 = $db->Execute($sql2);
}

$sql = "SELECT *   FROM `receta` where nro_paciente = $documento and fecha_estado between '$desde1' and '$hasta1' GROUP BY nro_paciente";
 $result = $db->Execute($sql);
$doc=$result->fields["documento"];
$fecha_estado=$result->fields["fecha_estado"];
$anio = substr($fecha_estado,0,4);

if ($doc != ""){
 $sql2 = "UPDATE `cantidad_dptos` SET quimio = 'S' , anio = '$anio' WHERE documento= '$documento'";
 $result2 = $db->Execute($sql2);
}

  $result1->MoveNext();
	}

