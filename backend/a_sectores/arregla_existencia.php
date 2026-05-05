<?php 

include ("../conexiones/config_pro.php");
EXIT;
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$nro_factura = "R003003221132";
$sql1 = "select * from tr_compras_detalle where  nro_factura = '$nro_factura' order by gtin";
$result1 = $db->Execute($sql1);

 

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  
  $gt = $gtin;

echo   $cod_mercaderia=$result1->fields["cod_mercaderia"];
echo " ";
$gtin=$result1->fields["gtin"];
echo $cod_detalle=$result1->fields["cod_detalle"];
echo " ";
echo "dssfsd ".$nro_serie=$result1->fields["nro_serie"];

echo " ";
 $sql = "select * from tr_compras_detalle_08042013 where cod_mercaderia = $cod_mercaderia and nro_serie = $nro_serie";
$result = $db->Execute($sql);
echo $gtin=$result->fields["gtin"];
if ($gtin != ''){
echo $sql = "UPDATE tr_compras_detalle SET gtin = '$gtin' WHERE cod_detalle = '$cod_detalle'";
$result = $db->Execute($sql);
 $cont1 = $cont1 + 1;
}



 $cont = $cont + 1;
echo "<br>";
   $result1->MoveNext();
	}

$suma = $cont - $cont1;
echo "<br>";
echo "<br>";
echo $cont;
echo "<br>";
echo $cont1;
echo "<br>";






 $sql1 = "select * from tr_stock where  gtin = 'A-41477981205700002126106754' order by gtin";
$result1 = $db->Execute($sql1);

 

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  
  $gt = $gtin;

echo   $cod_mercaderia=$result1->fields["cod_mercaderia"];
echo " ";
$gtin=$result1->fields["gtin"];
echo $cod_operacion=$result1->fields["cod_operacion"];
echo " ";
echo "dssfsd ".$nro_serie=$result1->fields["nro_serie"];

echo " ";
 $sql = "select * from tr_stock_08042013 where cod_mercaderia = $cod_mercaderia and nro_serie = $nro_serie";
$result = $db->Execute($sql);
echo $gtin=$result->fields["gtin"];
if ($gtin != ''){
echo $sql = "UPDATE tr_stock SET gtin = '$gtin' WHERE cod_operacion = '$cod_operacion'";
$result = $db->Execute($sql);
}



 $cont = $cont + 1;
echo "<br>";
   $result1->MoveNext();
	}

echo "<br>";
echo "<br>";
echo $cont;
echo "<br>";
echo "<br>";


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 $sql1 = "select * from tr_existencias where cantidad_ingresada - cantidad_salida > 0 and gtin = 'A-41477981205700002126106754' order by gtin";
$result1 = $db->Execute($sql1);

 

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  
  $gt = $gtin;

echo   $cod_mercaderia=$result1->fields["cod_mercaderia"];
echo " ";
$gtin=$result1->fields["gtin"];
echo $cod_detalle=$result1->fields["cod_detalle"];
echo " ";
echo "dssfsd ".$nro_serie=$result1->fields["nro_serie"];

echo " ";
 $sql = "select * from tr_existencias_08042013 where cod_mercaderia = $cod_mercaderia and nro_serie = $nro_serie";
$result = $db->Execute($sql);
echo $gtin=$result->fields["gtin"];

if ($gtin != ''){
echo $sql = "UPDATE tr_existencias SET gtin = '$gtin' WHERE cod_detalle = '$cod_detalle'";
$result = $db->Execute($sql);
$cont = $cont + 1;
}


 
echo "<br>";
   $result1->MoveNext();
	}

echo "<br>";
echo "<br>";
echo $cont;
echo "<br>";
echo "<br>";

