<?php 

include ("../conexiones/config_pro.php");

/*$sql = "SELECT nro_comprobante, gtin, COUNT(*) FROM tr_stock where cod_movimiento = 6 GROUP BY gtin HAVING COUNT(*)>1";
$result1 = $db->Execute($sql);

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {

echo $nro_factura=$result1->fields["nro_factura"];
echo " - ";
echo $gtin=$result1->fields["gtin"];
echo "<br>";
   $result1->MoveNext();
	}


*/



$sql1 = "select * from tr_existencias group by cod_mercaderia";
$result1 = $db->Execute($sql1);


 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  

  $gtin=$result1->fields["gtin"];
  $nro_factura=$result1->fields["nro_factura"];
  $cod_mercaderia=$result1->fields["cod_mercaderia"];
  $lote=$result1->fields["lote"];
  $mes_lote=$result1->fields["mes_lote"];
  $anio_lote=$result1->fields["anio_lote"];
  $precio_unitario=$result1->fields["precio_unitario"];
 $lote=$result1->fields["lote"];
  $cod_mercaderia=$result1->fields["cod_mercaderia"];
  $proveedor=$result1->fields["proveedor"];
 $nro_serie=$result1->fields["nro_serie"];

//$sql = "SELECT * FROM `tr_compras_encab`  WHERE  nro_factura = '$nro_factura'";
//$result8 = $db->Execute($sql);

//$fecha=strtoupper($result8->fields["fecha"]);






$sql = "SELECT * FROM `monodrogas`  WHERE  `cod_barra` = '$cod_mercaderia' or troquel = $cod_mercaderia";
$result8 = $db->Execute($sql);

$cod_droga=strtoupper($result8->fields["cod_droga"]);
$grupo=strtoupper($result8->fields["grupo"]);
$laboratorio=strtoupper($result8->fields["laboratorio"]);


echo $sql = "UPDATE tr_existencias SET cod_droga = '$cod_droga' , grupo = '$grupo' , laboratorio = '$laboratorio'  WHERE cod_mercaderia = '$cod_mercaderia'";
$result = $db->Execute($sql);
echo "<br>";

/*


$sql7="select * from drogas where cod_droga = $cod_droga";
$result7 = $db->Execute($sql7);
$drogas=strtoupper($result7->fields["droga"]);
$tipo=strtoupper($result7->fields["tipo"]);





$sql1 = "select * from tr_stock where gtin = '$gtin' and cod_movimiento = 1 order by gtin";
$result11 = $db->Execute($sql1);

  $gtin10=$result11->fields["gtin"];





if ($gtin10 == ""){
echo $nro_factura;
echo " ";
echo $gtin;
echo "- ";
$cont = $cont + 1;
echo "<br>"; 
echo  $sql = "INSERT INTO `tr_stock` ( `cod_mercaderia` , `fecha` , `cod_movimiento` , `tipo_fact` , `nro_comprobante` , `cantidad` , `precio_unitario` , `lote` ,  `mes_lote` , `anio_lote` , `cuenta` , `tipo_cuenta` ,  `cod_operacion`, `observaciones`, `documento`, `cod_droga`, `nro_os`, `gtin`, `transaccion`, `nro_serie` , `drogas` , `grupo`) VALUES ('$cod_mercaderia' , '$fecha' , '1' ,  'A' , '$nro_factura' , '1' , '$precio_unitario' , '$lote' , '$mes_lote', '$anio_lote' , '$proveedor' , '1' , '' , '', '' , '$cod_droga' , '' ,  '$gtin' , '$transaccion' , '$nro_serie' , '$drogas' , '$tipo')";
//mysql_query($sql);
echo "<br>"; 


}

 

*/


   $result1->MoveNext();
	}




echo "<br>"; 
echo $cont;


/*


$sql1 = "select * from tr_compras_encab where fecha between '2012-11-01' and '2012-11-07'";
$result = $db->Execute($sql1);

   if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

$nro_factura=$result->fields["nro_factura"];
$fecha=$result->fields["fecha"];


$sql1 = "select * from tr_compras_detalle where nro_factura = '$nro_factura' order by gtin";
$result1 = $db->Execute($sql1);


 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  

  $gtin=$result1->fields["gtin"];
  $nro_factura=$result1->fields["nro_factura"];
  $cod_mercaderia=$result1->fields["cod_mercaderia"];
  $lote=$result1->fields["lote"];
  $mes_lote=$result1->fields["mes_lote"];
  $anio_lote=$result1->fields["anio_lote"];
  $precio_unitario=$result1->fields["precio_unitario"];

  $cod_mercaderia=$result1->fields["cod_mercaderia"];
  $proveedor=$result1->fields["proveedor"];
 $nro_serie=$result1->fields["nro_serie"];

$sql = "SELECT * FROM `monodrogas`  WHERE  `cod_barra` = '$cod_mercaderia' or troquel = $cod_mercaderia";
$result8 = $db->Execute($sql);

$cod_droga=strtoupper($result8->fields["cod_droga"]);

$sql7="select * from drogas where cod_droga = $cod_droga";
$result7 = $db->Execute($sql7);
$drogas=strtoupper($result7->fields["droga"]);
$tipo=strtoupper($result7->fields["tipo"]);





$sql1 = "select * from tr_stock where gtin = '$gtin' order by gtin";
$result11 = $db->Execute($sql1);

  $gtin10=$result11->fields["gtin"];

$sql1 = "select * from tr_existencias where gtin = '$gtin' order by gtin";
$result11 = $db->Execute($sql1);

  $lote=$result11->fields["lote"];


$sql = "UPDATE tr_existencias` SET gtin = '$gtin' WHERE `cod_detalle` = $cod_detalle";
//$result = $db->Execute($sql);

if ($gtin10 == ""){
echo $nro_factura;
echo " ";
echo $gtin;
echo "- ";
$cont = $cont + 1;
echo "<br>"; 
echo  $sql = "INSERT INTO `tr_stock` ( `cod_mercaderia` , `fecha` , `cod_movimiento` , `tipo_fact` , `nro_comprobante` , `cantidad` , `precio_unitario` , `lote` ,  `mes_lote` , `anio_lote` , `cuenta` , `tipo_cuenta` ,  `cod_operacion`, `observaciones`, `documento`, `cod_droga`, `nro_os`, `gtin`, `transaccion`, `nro_serie` , `drogas` , `grupo`) VALUES ('$cod_mercaderia' , '$fecha' , '1' ,  'A' , '$nro_factura' , '1' , '$precio_unitario' , '$lote' , '$mes_lote', '$anio_lote' , '$proveedor' , '1' , '' , '', '' , '$cod_droga' , '' ,  '$gtin' , '$transaccion' , '$nro_serie' , '$drogas' , '$tipo')";
//mysql_query($sql);
echo "<br>"; 


}

 


   $result1->MoveNext();
	}


   $result->MoveNext();
	}

echo "<br>"; 
echo $cont;


*/
?>