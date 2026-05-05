 <?php  
$direccion = "";
$nro = "";
$celular_residencia = "";
$sigla = "";


include ("../../conexiones/config_usu.php");

$sql="select * from pacientes where documento like '$a' and tipo_doc = '$tipo_doc'";
$result = $db->Execute($sql);

$cod_paciente=strtoupper($result->fields["cod_paciente"]);
$tipo_doc=strtoupper($result->fields["tipo_doc"]);
$documento=strtoupper($result->fields["documento"]);
$nombre=strtoupper($result->fields["nombre"]);
$apellido=strtoupper($result->fields["apellido"]);
$calle=strtoupper($result->fields["calle"]);
$puerta=strtoupper($result->fields["puerta"]);
$telefono=$result->fields["telefono"];
$direccion= $calle." ".$nro;
$estado=strtoupper($result->fields["estado"]);
$localidad=strtoupper($result->fields["localidad"]);
$departamento=strtoupper($result->fields["departamento"]);

$fecha_estado=$result->fields["fecha_estado"];
$dia_estado=substr($fecha_estado,8,2);
$mes_estado=substr($fecha_estado,5,2);
$anio_estado=substr($fecha_estado,0,4);

$observaciones=strtoupper($result->fields["observaciones"]);

$referencia=strtoupper($result->fields["referencia"]);
$cod_postal=strtoupper($result->fields["cod_postal"]);
$calle_residencia=strtoupper($result->fields["calle_residencia"]);
$puerta_residencia=strtoupper($result->fields["puerta_residencia"]);
$referencia_residencia=strtoupper($result->fields["referencia_residencia"]);
$localidad_residencia=strtoupper($result->fields["localidad_residencia"]);
$cod_postal_residencia=strtoupper($result->fields["cod_postal_residencia"]);
$telefono_residencia=strtoupper($result->fields["telefono_residencia"]);




$fecha_nac=$result->fields["fecha_nac"];
$dia=substr($fecha_nac,8,2);
$mes=substr($fecha_nac,5,2);
$anio=substr($fecha_nac,0,4);


$lugar_nac=strtoupper($result->fields["lugar_nac"]);
$sexo=strtoupper($result->fields["sexo"]);
$estado_civil=strtoupper($result->fields["estado_civil"]);

$sql1="select * from afiliaciones where documento like '$documento' and tipo_doc = '$tipo_doc'";
$result1 = $db->Execute($sql1);

$nro_os=$result1->fields["nro_os"];
$nro_afiliado=$result1->fields["nro_afiliado"];
$otros=strtoupper($result1->fields["otros"]);
$nombre_os=strtoupper($result1->fields["nombre_os"]);




 $sql2="select * from paciente_diagnostico where documento like '$documento' and tipo_doc = '$tipo_doc' order by fecha_diagnostico desc";
$result2 = $db->Execute($sql2);

$nro_ficha=$result2->fields["nro_ficha"];
$documento=$result2->fields["documento"];
 $cod_diagnostico=$result2->fields["cod_diagnostico"];
$fecha_diagnostico=$result2->fields["fecha_diagnostico"];
$base=$result2->fields["base"];
$cod_fuente=$result2->fields["cod_fuente"];
$matricula=$result2->fields["matricula"];
$observaciones=$result2->fields["observaciones"];

$sql3="select * from diagnostico where nro_diagnostico like '$cod_diagnostico' ";
$result3 = $db->Execute($sql3);

$nombre_diagnostico=$result3->fields["nombre_diagnostico"];


$sql4="select * from fuentes where nro_fuente like '$cod_fuente'";
$result4 = $db->Execute($sql4);

$nombre_fuente=$result4->fields["nombre_fuente"];


?>






