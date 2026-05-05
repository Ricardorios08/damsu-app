<?php
include ("../conexiones/config_pro.php");

/*

R003003221133
R003003221135
R003003221137
R003003221140
R003003221138


B000400045684
B000400045569
B000400045536
B000500306179
B000800001093
B000800001096

B000400045684
B000400045763
B000400045545
B003200000045
R003003221133
R003003221135
R003003221137
R003003221140
R003003221138



*/



$nro_factura = "R003003221138";
$fecha = '2017-10-11';


 $sql1 = "select * from tr_ventas_detalle where fecha = '$fecha' order by gtin";
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

/*$sql = "SELECT * FROM `monodrogas`  WHERE  `cod_barra` = '$cod_mercaderia' or troquel = $cod_mercaderia";
$result8 = $db->Execute($sql);

$cod_droga=strtoupper($result8->fields["cod_droga"]);

$sql7="select * from drogas where cod_droga = $cod_droga";
$result7 = $db->Execute($sql7);
$drogas=strtoupper($result7->fields["droga"]);
$tipo=strtoupper($result7->fields["tipo"]);


*/


 $sql1 = "select * from tr_stock where gtin = '$gtin' and cod_movimeinto = 6 order by gtin";
$result11 = $db->Execute($sql1);

  $gtin10=$result11->fields["gtin"];



if ($gtin10 == ""){
/*echo $nro_factura;
echo " ";
echo $gtin;
echo "- ";
$cont = $cont + 1;

echo "<br>"; 

*/

echo  $sql = "INSERT INTO `tr_stock` ( `cod_mercaderia` , `fecha` , `cod_movimiento` , `tipo_fact` , `nro_comprobante` , `cantidad` , `precio_unitario` , `lote` ,  `mes_lote` , `anio_lote` , `cuenta` , `tipo_cuenta` ,  `cod_operacion`, `observaciones`, `documento`, `cod_droga`, `nro_os`, `gtin`, `transaccion`, `nro_serie` , `drogas` , `grupo`) VALUES ('$cod_mercaderia' , '$fecha' , '6' ,  'A' , '$nro_factura' , '1' , '$precio_unitario' , '$lote' , '$mes_lote', '$anio_lote' , '$proveedor' , '1' , '' , '', '' , '$cod_droga' , '' ,  '$gtin' , '$transaccion' , '$nro_serie' , '$drogas' , '$tipo')";
mysql_query($sql);
echo "<br>"; 


}

 


   $result1->MoveNext();
	}