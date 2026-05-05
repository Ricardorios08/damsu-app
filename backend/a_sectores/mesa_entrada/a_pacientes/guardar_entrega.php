 <?php
 
 include ("../../../conexiones/config_pro.php");

 $nro_receta = $_REQUEST['nro_receta'];
 $documento= $_REQUEST['documento'];
 $dia= $_REQUEST['dia'];
 $mes= $_REQUEST['mes'];
 $anio= $_REQUEST['anio'];
 $horas= $_REQUEST['horas'];
 $minutos= $_REQUEST['minutos'];

$dia_ingreso= $_REQUEST['dia_ingreso'];
 $mes_ingreso= $_REQUEST['mes_ingreso'];
 $anio_ingreso= $_REQUEST['anio_ingreso'];



$hora_entrega = $horas.":".$minutos.":00";


$fecha_entrega = "20".$anio."-".$mes."-".$dia;


$fecha = "20".$anio_ingreso."-".$mes_ingreso."-".$dia_ingreso;


 echo $sql = "UPDATE receta SET `hora_entrega` = '$hora_entrega' , fecha_entrega = '$fecha_entrega' , `fecha` = '$fecha' ,  estado = '7'  WHERE nro_receta = $nro_receta";
mysql_query($sql);

$bander = 1;
$palabra = $documento;
include ("buscar_paciente_general.php");