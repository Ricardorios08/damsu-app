<?php
include ("../../../../conexiones/config_pro.php");
$gtin_mal= $_REQUEST['mes'];
$gtin= $_REQUEST['anio'];



    $sql1="select * from tr_stock_temp_provisorio where mes = '$mes' and anio = '$anio' and drogas = '' order by cod_mercaderia";
$result1 = $db->Execute($sql1);
 
  if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {

	
	

 $cod_mercaderia=strtoupper($result->fields["cod_mercaderia"]);




$fecha=strtoupper($result->fields["fecha"]);


	$result->MoveNext();
	}