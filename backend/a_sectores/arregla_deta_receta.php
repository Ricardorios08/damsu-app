<?php 
include ("../conexiones/config_pro.php");

$sql1 = "select * from tr_ventas_detalle";
$result1 = $db->Execute($sql1);


 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  
$nro_factura=$result1->fields["nro_factura"];
$cod_detalle=$result1->fields["cod_detalle"];
$tipo_fact=$result1->fields["tipo_fact"];
$cod_mercaderia=$result1->fields["cod_mercaderia"];

$sql11 = "select * from tr_ventas_encabezado where nro_factura = $nro_factura and tipo_fact = '$tipo_fact'";
$result11 = $db->Execute($sql11);
$nro_receta=$result11->fields["nro_receta"];

 $sql1 = "SELECT * FROM `monodrogas`  WHERE  cod_barra like '$cod_mercaderia'";
$result11 = $db->Execute($sql1);
$cod_droga=strtoupper($result11->fields["cod_droga"]);


echo $sql = "UPDATE tr_ventas_detalle SET cod_droga = '$cod_droga' WHERE cod_detalle = '$cod_detalle'";
$result = $db->Execute($sql);
echo "<br>";

$cont = $cont + 1;

   $result1->MoveNext();
	}




echo "<br>"; 
echo $cont;



?>