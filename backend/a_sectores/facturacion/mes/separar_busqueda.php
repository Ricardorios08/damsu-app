<?php 
include ("../../../conexiones/config_pro.php");
$dia = "01";
$mes = $_REQUEST['mes'];
$anio = $_REQUEST['anio'];


SWITCH ($mes){
	case "01":{$mes22 = "ENERO";break;}
	case "02":{$mes22 = "FEBRERO";break;}
	case "03":{$mes22 = "MARZO";break;}
	case "04":{$mes22 = "ABRIL";break;}
	case "05":{$mes22 = "MAYO";break;}
	case "06":{$mes22 = "JUNIO";break;}
	case "07":{$mes22 = "JULIO";break;}
	case "08":{$mes22 = "AGOSTO";break;}
	case "09":{$mes22 = "SETIEMBRE";break;}
	case "10":{$mes22 = "OCTUBRE";break;}
	case "11":{$mes22 = "NOVIEMBRE";break;}
	case "12":{$mes22 = "DICIEMBRE";break;}
}




$fuent=$_POST["fuente"];

for ($i=0;$i<count($fuent);$i++)    
{     
$cod_fuente = $fuent[$i];    
}


   $sql8 = "SELECT * FROM fuentes where nro_fuente = '$cod_fuente'";
$result8 = $db->Execute($sql8);
$nombre_fuente=$result8->fields["nombre_fuente"];



$fecha_a = $mes22." 20".$anio;

$fecha_desde = $anio."-".$mes."-01";
$fecha_hasta = $anio."-".$mes."-31";

$fecha_desde1 = $anio."-01-01";
$fecha_hasta1 = $anio."-12-31";



include ("diario_vta.php");
$total_total = 0;
?><br><?php

 
include ("devoluciones.php");
 


?>
