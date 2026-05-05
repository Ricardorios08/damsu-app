<?php 

include ("../conexiones/config_pro.php");
/*

$sql1 = "select * from tr_stock group by cod_mercaderia";
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

$sql = "SELECT * FROM monodrogas  WHERE  cod_barra = '$cod_mercaderia' or troquel = '$cod_mercaderia'";
$result8 = $db->Execute($sql);

$laboratorio=strtoupper($result8->fields["laboratorio"]);





echo $sql = "UPDATE tr_stock SET laboratorio = '$laboratorio'  WHERE cod_mercaderia = '$cod_mercaderia'";
$result = $db->Execute($sql);
echo "<br>";

echo $sql = "UPDATE tr_existencias SET laboratorio = '$laboratorio'  WHERE cod_mercaderia = '$cod_mercaderia'";
$result = $db->Execute($sql);
echo "<br>";


   $result1->MoveNext();
	}




echo "<br>"; 
echo $cont;


*/



$sql1 = "select * from stock group by cod_mercaderia";
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

$sql = "SELECT * FROM monodrogas  WHERE  cod_barra = '$cod_mercaderia' or troquel = '$cod_mercaderia'";
$result8 = $db->Execute($sql);

$laboratorio=strtoupper($result8->fields["laboratorio"]);





echo $sql = "UPDATE stock SET laboratorio = '$laboratorio'  WHERE cod_mercaderia = '$cod_mercaderia'";
//$result = $db->Execute($sql);
echo "<br>";


   $result1->MoveNext();
	}




echo "<br>"; 
echo $cont;



?>