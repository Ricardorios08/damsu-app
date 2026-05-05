<?php 

//array_map('unlink', glob("c:\informs\web\ric-*.*"));


$anio = date("y");
 $mes = date("m");
$di = date("d");
 




 
 
 
$inicio = $anio."-".$mes."-01";
$fin = $anio."-".$mes."-31";

$hora  = time();

$fecha_hoy = date("YmdHi");
$hora_inicio = date("Hi",$hora);
$anio = date("y");
$anio1 = date("Y");


$mes = date("m")-1;



IF ($mes < 1){
$anio = $anio - 1;
$mes = 12;
}

//ordenes 

    $conexion = mysql_connect("localhost", "abm", "lautaronicolas");
    mysql_select_db("ordenes_grabadas", $conexion);

 $ruta="c:/informes/web/ric-ord_encabezado_".$fecha_hoy.".txt";
 echo  $sql= "SELECT cod_grabacion, periodo, ano, nro_os, nro_laboratorio, nro_afiliado, nro_orden, fecha, medico, fecha_fac, nro_fac, tipo_fact, suma_coseguro, iva, neto_gravado, exento, total_orden FROM ordenes where  nro_fac != '' and ano = $anio and periodo = $mes INTO OUTFILE '$ruta' FIELDS TERMINATED BY ';' LINES TERMINATED BY '\r\n'";
mysql_query($sql);



$ruta="c:/informes/web/ric-ord_detalle_".$fecha_hoy.".txt";

 echo $sql= "SELECT cod_grabacion, nro_practica, valor,coseguro FROM detalle where  nro_factura != 0 and ano = $anio and periodo = $mes INTO OUTFILE '$ruta' FIELDS TERMINATED BY ';' LINES TERMINATED BY '\r\n'";
mysql_query($sql);



    $conexion = mysql_connect("localhost", "abm", "lautaronicolas");
    mysql_select_db("liquidacion", $conexion);
$ruta="c:/informes/web/ric-comp_saldos_".$fecha_hoy.".txt";


  $sql= "SELECT * FROM composicion where (observaciones = 'COBRADA' and saldo > 0) or (observaciones = 'PENDIENTE' and saldo > 0) or (observaciones = 'LIQ-PARCIAL' and saldo > 0) order by fecha_factura,  nro_factura INTO OUTFILE '$ruta' FIELDS TERMINATED BY ';' LINES TERMINATED BY '\r\n'";
mysql_query($sql);


//recepcion

    $conexion = mysql_connect("localhost", "abm", "lautaronicolas");
    mysql_select_db("ordenes_recepcion", $conexion);
$ruta="c:/informes/web/ric-recep_encabezado_".$fecha_hoy.".txt";
 

 echo  $sql= "SELECT * FROM recibos where  anio = $anio1 and periodo = $mes  INTO OUTFILE '$ruta' FIELDS TERMINATED BY ';' LINES TERMINATED BY '\r\n'";
mysql_query($sql);

$ruta="c:/informes/web/ric-recep_detalle_".$fecha_hoy.".txt";
 $sql= "SELECT * FROM detalle where  anio = $anio1 and mes = $mes INTO OUTFILE '$ruta' FIELDS TERMINATED BY ';' LINES TERMINATED BY '\r\n'";
mysql_query($sql);










////////////////////////////
//include("deudas.php");



 


?>