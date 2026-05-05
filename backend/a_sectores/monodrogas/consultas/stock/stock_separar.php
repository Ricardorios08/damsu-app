<?php 
global $buscador_rapido;
 $troquel=$_REQUEST["troquel"];
   $cod_barra=$_REQUEST["cod_barra"];
$opcion=$_REQUEST["opcion"];

$dia_d=$_REQUEST["dia_d"];
$mes_d=$_REQUEST["mes_d"];
$anio_d=$_REQUEST["anio_d"];

$fecha_desde = $anio_d."-".$mes_d."-".$dia_d;


$dia_h=$_REQUEST["dia_h"];
$mes_h=$_REQUEST["mes_h"];
$anio_h=$_REQUEST["anio_h"];

$fecha_hasta = $anio_h."-".$mes_h."-".$dia_h;

$hoy = date("d/m/Y");
include("../../../../conexiones/config_pro.php");
include("../../../../funciones/funciones.php");


$tipo=$_REQUEST["tipo"];


$sql1="select * from monodrogas where cod_barra = $cod_barra";
$result1 = $db->Execute($sql1);
$troquel=strtoupper($result1->fields["troquel"]);


  $sql1="select * from monodrogas where troquel = $troquel";
$result1 = $db->Execute($sql1);
$nombre_comercial=strtoupper($result1->fields["nombre_comercial"]);
$cod_droga=strtoupper($result1->fields["cod_droga"]);

 

if ($tipo == "ACE"){
$sql="select * from tr_stock where cod_mercaderia = $cod_barra and fecha between '$fecha_desde' and '$fecha_hasta' and cuenta = 110 and cod_movimiento = 6 order by fecha, cod_movimiento asc, cuenta, tipo_fact, nro_comprobante";
}ELSE{
$sql="select * from tr_stock where cod_mercaderia = $cod_barra and fecha between '$fecha_desde' and '$fecha_hasta' order by fecha, cod_movimiento asc, cuenta, tipo_fact, nro_comprobante";
}


$result = $db->Execute($sql);


$anio_actual = date("y");
$mes_actual = date ("m");



 switch ($opcion){

	 case "valor":{


   $sql3="select sum(precio_unitario) as entrada from tr_stock where (cod_mercaderia = $cod_barra and cod_movimiento = 1 and fecha < '$fecha_desde') or  (cod_mercaderia = $cod_barra and cod_movimiento = 2 and fecha < '$fecha_desde') or (cod_mercaderia = $cod_barra and cod_movimiento = 3 and fecha < '$fecha_desde') or (cod_mercaderia = $cod_barra and cod_movimiento = 4 and fecha < '$fecha_desde')  order by fecha, cod_movimiento, cuenta, tipo_fact, nro_comprobante";
$result3 = $db->Execute($sql3);
$entrada1=strtoupper($result3->fields["entrada"]);

 $sql3="select sum(precio_unitario) as salida from tr_stock where (cod_mercaderia = $cod_barra and cod_movimiento = 5 and fecha < $fecha_desde) or  (cod_mercaderia = $cod_barra and cod_movimiento = 6 and fecha < '$fecha_desde') or (cod_mercaderia = $cod_barra and cod_movimiento = 7 and fecha < '$fecha_desde') or (cod_mercaderia = $cod_barra and cod_movimiento = 8 and fecha < '$fecha_desde') or (cod_mercaderia = $cod_barra and cod_movimiento = 9 and fecha < '$fecha_desde')  order by fecha, cod_movimiento, cuenta, tipo_fact, nro_comprobante";
$result3 = $db->Execute($sql3);
 $salida1=strtoupper($result3->fields["salida"]);


 
 $acumula_saldo = $entrada1 - $salida1;
 $saldo_inicial = $entrada1 - $salida1;

include ("valor.php");
break;
	 }

	 case "unidades":{

   $sql3="select sum(cantidad) as entrada from tr_stock where (cod_mercaderia = $cod_barra and cod_movimiento = 1 and fecha < '$fecha_desde') or  (cod_mercaderia = $cod_barra and cod_movimiento = 2 and fecha < '$fecha_desde') or (cod_mercaderia = $cod_barra and cod_movimiento = 3 and fecha < '$fecha_desde') or (cod_mercaderia = $cod_barra and cod_movimiento = 4 and fecha < '$fecha_desde')  order by fecha, cod_movimiento, cuenta, tipo_fact, nro_comprobante";
$result3 = $db->Execute($sql3);
 $entrada1=strtoupper($result3->fields["entrada"]);

 $sql3="select sum(cantidad) as salida from tr_stock where (cod_mercaderia = $cod_barra and cod_movimiento = 5 and fecha < $fecha_desde) or  (cod_mercaderia = $cod_barra and cod_movimiento = 6 and fecha < '$fecha_desde') or (cod_mercaderia = $cod_barra and cod_movimiento = 7 and fecha < '$fecha_desde') or (cod_mercaderia = $cod_barra and cod_movimiento = 8 and fecha < '$fecha_desde') or (cod_mercaderia = $cod_barra and cod_movimiento = 9 and fecha < '$fecha_desde')  order by fecha, cod_movimiento desc, cuenta, tipo_fact, nro_comprobante";
$result3 = $db->Execute($sql3);
 $salida1=strtoupper($result3->fields["salida"]);



 $acumula_saldo = $entrada1 - $salida1;
 $saldo_inicial = $entrada1 - $salida1;



include ("unidades.php");
break;
	 }
 }

$acumula_saldo = "";
$troquel = $cod_droga;


$sum_entrada = "";
$sum_salida = "";
$acum = "";

 $acumula_saldo = "";
 $saldo_inicial = "";

$sql1="select * from monodrogas where troquel = $troquel";
$result1 = $db->Execute($sql1);
$nombre_comercial=strtoupper($result1->fields["nombre_comercial"]);

  $sql="select * from stock where cod_mercaderia like '$troquel' and fecha between '$fecha_desde' and '$fecha_hasta' order by fecha, cod_movimiento, tipo_fact, nro_comprobante";
$result = $db->Execute($sql);

?>
<br><br>

<?php 



$anio_actual = date("y");
$mes_actual = date ("m");


 switch ($opcion){

	 case "valor":{
include ("valor_unico.php");
break;
	 }

	 case "unidades":{

   $sql3="select sum(cantidad) as entrada from stock where (cod_mercaderia = $cod_barra and cod_movimiento = 1 and fecha < '$fecha_desde') or  (cod_mercaderia = $cod_barra and cod_movimiento = 2 and fecha < '$fecha_desde') or (cod_mercaderia = $cod_barra and cod_movimiento = 3 and fecha < '$fecha_desde') or (cod_mercaderia = $cod_barra and cod_movimiento = 4 and fecha < '$fecha_desde')  order by fecha, cod_movimiento, cuenta, tipo_fact, nro_comprobante";
$result3 = $db->Execute($sql3);
 $entrada1=strtoupper($result3->fields["entrada"]);

 $sql3="select sum(cantidad) as salida from stock where (cod_mercaderia = $cod_barra and cod_movimiento = 5 and fecha < $fecha_desde) or  (cod_mercaderia = $cod_barra and cod_movimiento = 6 and fecha < '$fecha_desde') or (cod_mercaderia = $cod_barra and cod_movimiento = 7 and fecha < '$fecha_desde') or (cod_mercaderia = $cod_barra and cod_movimiento = 8 and fecha < '$fecha_desde') or (cod_mercaderia = $cod_barra and cod_movimiento = 9 and fecha < '$fecha_desde')  order by fecha, cod_movimiento desc, cuenta, tipo_fact, nro_comprobante";
$result3 = $db->Execute($sql3);
 $salida1=strtoupper($result3->fields["salida"]);



 $acumula_saldo = $entrada1 - $salida1;
 $saldo_inicial = $entrada1 - $salida1;


include ("unidades.php");
break;
	 }
 }

?>
</table>

<?php 
 $sql="select sum(cantidad_ingresada - cantidad_salida) as cant from existencias where cod_mercaderia like '$troquel'";
$result = $db->Execute($sql);


echo $cant=strtoupper($result->fields["cant"]);