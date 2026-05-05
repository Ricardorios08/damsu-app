<?php 
include ("../../../../conexiones/config_usu.php");

$sql = "DELETE FROM inventario_provisorio";
mysql_query($sql);


  $sql1="select * from inventario order by gtin ";
$result1 = $db->Execute($sql1);

 if (!$result1) die("fallo 1".$db->ErrorMsg());
  while (!$result1->EOF) {

$gtin=strtoupper($result1->fields["gtin"]);


 $sql8="select * from tr_stock where gtin = '$gtin'";
$result8 = $db->Execute($sql8);

 $cod_mercaderia=strtoupper($result8->fields["cod_mercaderia"]);

if ($cod_mercaderia == ""){
echo $estado = "SIN/CARGAR";
}else
	  {
$estado = "";
	  


$cod_droga=strtoupper($result8->fields["cod_droga"]);
$drogas=strtoupper($result8->fields["drogas"]);
$grupo=strtoupper($result8->fields["grupo"]);
$laboratorio=strtoupper($result8->fields["laboratorio"]);


$sql8="select * from laboratorios where cod_laboratorio =' $laboratorio'";
$result8 = $db->Execute($sql8);
$nombre_laboratorio=strtoupper($result8->fields["laboratorio"]);

 $sql8="select * from monodrogas where cod_barra = '$cod_mercaderia'";
$result8 = $db->Execute($sql8);
$nombre_comercial=strtoupper($result8->fields["nombre_comercial"]);
$presentacion=strtoupper($result8->fields["presentacion"]);

 
$sql2 = "SELECT * FROM tr_existencias  WHERE  `gtin` = '$gtin'";
$result2 = $db->Execute($sql2);
 

$lote=strtoupper($result2->fields["lote"]);
$mes_lote=strtoupper($result2->fields["mes_lote"]);
$anio_lote=strtoupper($result2->fields["anio_lote"]);
$precio_unitario=strtoupper($result2->fields["precio_unitario"]);
$total=strtoupper($result2->fields["total"]);
$cod_detalle=strtoupper($result2->fields["cod_detalle"]);

$resultado=strtoupper($result2->fields["resultado"]);
 $transaccion=strtoupper($result2->fields["transaccion"]);

$cantidad_ingresada=strtoupper($result2->fields["cantidad_ingresada"]);
$cantidad_salida=strtoupper($result2->fields["cantidad_salida"]);

$saldo = $cantidad_ingresada - $cantidad_salida;

 $sql3 = "INSERT INTO inventario_provisorio (`gtin`, `fecha`, `cod_operacion`, `cod_mercaderia`, `nombre_comercial`, `cod_droga`, `drogas`, `laboratorio`, `nombre_laboratorio`, `estado` , `cantidad_ingresada` , `cantidad_salida` , `saldo` , `presentacion`) VALUES ('$gtin', '$fecha', '$cod_operacion', '$cod_mercaderia', '$nombre_comercial', '$cod_droga', '$drogas', '$laboratorio', '$nombre_laboratorio', '$estado' , '$cantidad_ingresada' , '$cantidad_salida' , '$saldo' ,  '$presentacion' )";
mysql_query($sql3);

	  }

$result1->MoveNext();
	}
