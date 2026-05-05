<?php  
include ("../../../conexiones/config_usu.php");




$operador=$_POST["operador"];


 $cod_paciente=$_POST["cod_paciente"];
$documento=$_POST["documento"];
$tipo_doc=$_POST["tipo_doc"];




$cod_diagnostic=$_POST["cod_diagnostico"];
for ($i=0;$i<count($cod_diagnostic);$i++)    
{     
$cod_diagnostico = $cod_diagnostic[$i];    
}

if ($cod_diagnostico == "")  {
  $sql="select * from `paciente_diagnostico` where documento = $documento and tipo_doc = $tipo_doc";
$result1 = $db->Execute($sql);
 $cod_diagnostico=strtoupper($result1->fields["cod_diagnostico"]);
}


$dia=$_REQUEST["dia"];
$mes=$_REQUEST["mes"];
$anio=$_REQUEST["anio"];
$fecha_diagnostico=$anio."-".$mes."-".$dia;


$fuent=$_POST["fuente"];
for ($i=0;$i<count($fuent);$i++)    
{     
$cod_fuente = $fuent[$i];    
}

if ($cod_fuente == "")  {
 $sql="select * from `paciente_diagnostico` where documento = $documento and tipo_doc = $tipo_doc";
$result1 = $db->Execute($sql);
$cod_fuente=strtoupper($result1->fields["cod_fuente"]);
}


$program=$_POST["programa"];
for ($i=0;$i<count($program);$i++)    
{     
$programa = $program[$i];    
}

if ($programa == "")  {
 $sql="select * from `paciente_diagnostico` where documento = $documento and tipo_doc = $tipo_doc";
$result1 = $db->Execute($sql);
$programa=strtoupper($result1->fields["programa"]);
}

$localizacion=$_POST["localizacion"];
$primario_multiple=$_POST["primario_multiple"];
$estadio=$_POST["estadio"];

$bas=$_POST["base"];
for ($i=0;$i<count($bas);$i++)    
{     
$base = $bas[$i];    
}

if ($base == "")  {
 $sql="select * from `paciente_diagnostico` where documento = $documento and tipo_doc = $tipo_doc";
$result1 = $db->Execute($sql);
$base=strtoupper($result1->fields["base"]);
}


$matricula=$_POST["matricula"];
$observaciones=$_POST["observaciones"];


 $sql = "UPDATE  `paciente_diagnostico` SET `cod_diagnostico` = '$cod_diagnostico', `fecha_diagnostico` = '$fecha_diagnostico', `localizacion` = '$localizacion', `base` = '$base', `primario_multiple` = '$primario_multiple', `estadio` = '$estadio', `cod_fuente` = '$cod_fuente', `matricula` = '$matricula', `observaciones` = '$observaciones', `programa` = '$programa' WHERE `documento` = '$documento' and tipo_doc = $tipo_doc";
mysql_query($sql);



 
 $leyenda = "SE MODIFICO CORRECTAMENTE";

include ("../../../alertas/campo_informacion.php");

	
?>