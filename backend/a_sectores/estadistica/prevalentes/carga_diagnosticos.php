<?php 


include ("../../../conexiones/config_usu.php");


echo  $sql1 = "SELECT * FROM `paciente_diagnostico` WHERE `cod_diagnostico` LIKE 'x124'";
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




 echo $sql4 = "INSERT INTO `oncologico`.`cantidad_dptos` (`apellido`, `nombre`, `documento`, `departamento`, `provincia`, `fecha_nac`, `cod_diagnostico`, `sexo` , `anio_2009`) VALUES ('$apellido', '$nombre', '$documento', '$departamento', '$provincia', '$fecha_nac', '$cod_diagnostico', '$sexo' , '$anio')"; 
 $result4 = $db->Execute($sql4);





  $result1->MoveNext();
	}