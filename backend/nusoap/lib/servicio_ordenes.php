<?
require_once("nusoap.php");

$ns = 'http://coprofi.com.ar/sulb/nusoap/lib'; //Espacio de nombres o sitio; sitio donde estará alojado el web service

$server = new soap_server();
$server->configureWSDL('CanadaTaxCalculator',$ns);
$server->wsdl->schemaTargetNamespace=$ns;
$server->register('CalculateOntarioTax',array('amount' => 'xsd:string' , 'apellido' => 'xsd:string'),array('return' => 'xsd:string'),$ns);


$server->register('pacientes',array('sql' => 'xsd:string' , 'apellido' => 'xsd:string'),array('return' => 'xsd:string'),$ns);
$server->register('nro_os',   array('sql' => 'xsd:string' , 'apellido' => 'xsd:string'),array('return' => 'xsd:string'),$ns);
$server->register('practicas',array('sql' => 'xsd:string' , 'apellido' => 'xsd:string'),array('return' => 'xsd:string'),$ns);
$server->register('cuenta_abm',array('variable1' => 'xsd:string' , 'variable2' => 'xsd:string'),array('return' => 'xsd:string'),$ns);
$server->register('practicas_ind',array('variable1' => 'xsd:string' , 'variable2' => 'xsd:string'),array('return' => 'xsd:string'),$ns);


$server->register('buscar_orden',array('cod_grabacion' => 'xsd:string' , 'apellido' => 'xsd:string'),array('return' => 'xsd:string'),$ns);


function CalculateOntarioTax($amount,$apellido){

$taxcalc=$amount.$apellido;

return new soapval('return','xsd:string',$taxcalc);
}



function pacientes($sql){
include ("../../conexiones/config.inc.php");
$sql1=$sql;
mysql_query($sql1);

$a = mysql_insert_id();
return new soapval('return','xsd:string',$a);
}

function nro_os($sql){
include ("../../conexiones/config.inc.php");
$nro_os=$sql;

$sql2="select * from datos_os where nro_os > 999 and nro_os = $nro_os";
$result2 = $db->Execute($sql2);
$nro_os1=$result2->fields["nro_os"];

if ($nro_os1 == ""){
$nro_os = "NO EXISTE OBRA SOCIAL EN ABM";
}


return new soapval('return','xsd:string',$nro_os);
}


function cuenta_abm($variable1){
include ("../../conexiones/config.inc.php");
$nro_laboratorio=$variable1;

$sql2="select * from facturante where nro_laboratorio = '$nro_laboratorio' and facturante = 'SI'";
$result2 = $db->Execute($sql2);
$nro_labo=$result2->fields["nro_laboratorio"];

$sql2="select * from datos_laboratorio where nro_laboratorio = '$nro_laboratorio'";
$result2 = $db->Execute($sql2);
$nombre_laboratorio=$result2->fields["nombre_laboratorio"];



if ($nro_labo == ""){
$nro_labo = "CUENTA EN ABM NO EXISTENTE O CUENTA NO FACTURANTE";
}else{
$nro_labo = "LA CUENTA ".$nro_labo." ".$nombre_laboratorio." SE ENCUENTRA HABILITADA PARA TRABAJAR CON ASOCIACION BIOQUIMICA";
}


return new soapval('return','xsd:string',$nro_labo);
}




function practicas($sql,$apellido){
include ("../../conexiones/config.inc.php");
$practicas=$sql;
$nro_os=$apellido; 

$sql2="select * from a_practicas_rechazadas where nro_os = $nro_os and cod_practica = $practicas";
$result2 = $db->Execute($sql2);
$cod_practica=$result2->fields["cod_practica"];
$motivo=$result2->fields["motivo"];
$fecha=$result2->fields["fecha"];


$sql2="select * from convenio_practica where cod_practica = $practicas";
$result2 = $db->Execute($sql2);
$nombre_practica=$result2->fields["practica"];

$sql2="select * from datos_os where nro_os = $nro_os";
$result2 = $db->Execute($sql2);
$sigla=$result2->fields["practica"];



$dia = substr($fecha,8,2);
$mes = substr($fecha,5,2);
$anio = substr($fecha,0,4);
$fecha = $dia."/".$mes."/".$anio;

if ($cod_practica != ""){
$motivo1 = "RECHAZA PRACTICA N° ".$cod_practica."  ".$nombre_practica." de la Obra Social: ".$sigla." (".$nro_os.") MOTIVO: ".$motivo." FECHA INHIBICION: (".$fecha.")";
}



return new soapval('return','xsd:string',$motivo1);
}


function practicas_ind($variable1,$variable2){
include ("../../conexiones/config.inc.php");
$nro_practica=$variable1;
$nro_os=$variable2; 

$sql2="select * from a_practicas_rechazadas where nro_os = $nro_os and cod_practica = $nro_practica";
$result2 = $db->Execute($sql2);
$cod_practica=$result2->fields["cod_practica"];
$motivo=$result2->fields["motivo"];
$fecha=$result2->fields["fecha"];


$sql2="select * from convenio_practica where cod_practica = $nro_practica";
$result2 = $db->Execute($sql2);
$nombre_practica=$result2->fields["practica"];

$sql2="select * from datos_os where nro_os = $nro_os";
$result2 = $db->Execute($sql2);
$sigla=$result2->fields["practica"];



$dia = substr($fecha,8,2);
$mes = substr($fecha,5,2);
$anio = substr($fecha,0,4);
$fecha = $dia."/".$mes."/".$anio;

if ($cod_practica != ""){
$motivo1 = "RECHAZA PRACTICA N° ".$nro_practica."  ".$nombre_practica." de la Obra Social: ".$sigla." (".$nro_os.") MOTIVO: ".$motivo." FECHA INHIBICION: (".$fecha.")";
}

$motivo1 = $nro_practica;

return new soapval('return','xsd:string',$motivo1);
}



function buscar_orden($cod_grabacion){
include ("../../conexiones/config.inc.php");
$cod_grabacion1=$cod_grabacion;

$sql2="select * from ordenes where cod_grabacion = $cod_grabacion1";
$result2 = $db->Execute($sql2);
$cod_gr=$result2->fields["cod_grabacion"];



return new soapval('return','xsd:string', $cod_gr);
}






$server->service($HTTP_RAW_POST_DATA);

?>