<?php 

include ("../conexiones/config_pro.php");

 $sql1 = "select * from stock  where nro_comprobante like '133%' order by nro_comprobante";
$result1 = $db->Execute($sql1);

 

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  

 $nro_comprobante=$result1->fields["nro_comprobante"];
 $gtin=$result1->fields["gtin"];
 $cod_operacion=$result1->fields["cod_operacion"];
 $cod_mercaderia=$result1->fields["cod_mercaderia"];

 $sql1="select * from monodrogas where cod_barra = $cod_mercaderia";			  
$result3 = $db->Execute($sql1);
$cod_droga=$result3->fields["cod_droga"];
$laboratorio=$result3->fields["laboratorio"];
$grupo=$result3->fields["grupo"];


//echo $sql = "UPDATE stock SET laboratorio = '$laboratorio' , grupo = '$grupo'  WHERE cod_operacion = '$cod_operacion'";
//result3 = $db->Execute($sql);


echo $sql = "UPDATE  tr_ventas_encabezado SET tipo_fact = '002'   WHERE nro_factura = '$nro_comprobante'";
$result3 = $db->Execute($sql);

 
$cont = $cont + 1;

   $result1->MoveNext();
	}
 
	echo $cont;

