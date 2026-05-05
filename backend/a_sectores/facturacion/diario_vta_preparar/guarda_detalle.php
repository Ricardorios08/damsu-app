<?php

include ("../../../conexiones/config_pro.php");

$fecha = $_REQUEST['fecha'];

   $sql3 = "SELECT * FROM `tr_ventas_detalle`  WHERE  fecha_indicado = '$fecha' AND indicado_coir = 1 order by  fecha_indicado desc";
 
$result5 = $db->Execute($sql3);

if (!$result5) die("fallo".$db->ErrorMsg());

 while (!$result5->EOF) {
$renglon = $renglon + 1;


 $cod_mer = $cod_merca;


  $cod_mercaderia=strtoupper($result5->fields["cod_mercaderia"]);
$cod_merca=strtoupper($result5->fields["cod_mercaderia"]);


if ($cod_mer == ""){
$cod_mer = $cod_merca;
}


if ($cod_mer == $cod_merca){
	$canti = $canti + 1;
}


$cantidad=strtoupper($result5->fields["cantidad"]);
$proveedor=strtoupper($result5->fields["proveedor"]);
$presentacion=strtoupper($result5->fields["presentacion"]);
$descripcion=strtoupper($result5->fields["descripcion"]);
$cod_detalle=strtoupper($result5->fields["cod_detalle"]);
$gtin = $result5->fields["gtin"];
$resultado= $result5->fields["resultado"];
$transaccion= $result5->fields["transaccion"];
$estado= $result5->fields["estado"];
 $recibido_coir= $result5->fields["recibido_coir"];
$recibido_farmacia= $result5->fields["recibido_farmacia"];
$recibido_servicio= $result5->fields["recibido_servicio"];
$fecha_recibido= $result5->fields["fecha_recibido"];
$fecha_preparado= $result5->fields["fecha_preparado"];

$indicado_coir=strtoupper($result5->fields["indicado_coir"]);
$recibido_coir=strtoupper($result5->fields["recibido_coir"]);
 $preparado_coir=strtoupper($result5->fields["preparado_coir"]);



$cod_detalle11=$_POST[control.$cod_detalle];



$dia2 = substr($fecha_preparado,8,2);
$mes2 = substr($fecha_preparado,5,2);
$anio2 = substr($fecha_preparado,0,4);
$fecha_preparado = $dia2."/".$mes2."/".$anio2;

$lote1=strtoupper($result5->fields["lote"]);
$mes_lote=strtoupper($result5->fields["mes_lote"]);
$anio_lote=strtoupper($result5->fields["anio_lote"]);
$vto_lote = $mes_lote."/".$anio_lote;

$gtin=strtoupper($result5->fields["gtin"]);
$precio_unitario=strtoupper($result5->fields["precio_unitario"]);

$sql = "SELECT * FROM `monodrogas`  WHERE  `cod_barra` = '$cod_mercaderia' or troquel = $cod_mercaderia";
$result6 = $db->Execute($sql);
$cod_mercaderia=strtoupper($result6->fields["troquel"]);
$presentacion=strtoupper($result6->fields["presentacion"]);
$nombre_comercial=strtoupper($result6->fields["nombre_comercial"]);
$cod_droga=strtoupper($result6->fields["cod_droga"]);
$laboratorio=strtoupper($result6->fields["laboratorio"]);


$sql = "SELECT * FROM laboratorios  WHERE  cod_laboratorio = '$laboratorio' ";
$result6 = $db->Execute($sql);
$laboratorio=strtoupper($result6->fields["laboratorio"]);

 

 $hoy=date("d/m/y");
$hoy_g=date("Y-m-d");


if ($cod_detalle == $cod_detalle11){

if ($preparado_coir != 1){
       $sql1 = "UPDATE `tr_ventas_detalle` SET `fecha_preparado` = '$hoy_g'  WHERE `cod_detalle` = '$cod_detalle'";
$result1 = $db->Execute($sql1);
 
   $sql1 = "UPDATE `tr_ventas_detalle` SET `preparado_coir` = '1'  WHERE `cod_detalle` = '$cod_detalle'";
$result1 = $db->Execute($sql1);
}

}else{

      $sql1 = "UPDATE `tr_ventas_detalle` SET `fecha_preparado` = '0000-00-00'  WHERE `cod_detalle` = '$cod_detalle'";
$result1 = $db->Execute($sql1);
 
   $sql1 = "UPDATE `tr_ventas_detalle` SET `preparado_coir` = '0'  WHERE `cod_detalle` = '$cod_detalle'";
$result1 = $db->Execute($sql1);
}




$cont = $cont + 1;

 

 if ($preparado_coir == 1){



 }





	 $result5->MoveNext();

				}

include ("diario_vta_detallado.php");


?>