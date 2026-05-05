<?php 

include ("../../../conexiones/config_pro.php");

 $sql8 = "delete  FROM tr_ventas_estadistica";
$result8 = $db->Execute($sql8);


 $sql="select * from tr_ventas_detalle where fecha between '$desde' and '$hasta'   ORDER by nro_factura, fecha desc";
$result = $db->Execute($sql);

  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

$nro_factura=strtoupper($result->fields["nro_factura"]);
$cod_mercaderia=$result->fields["cod_mercaderia"];

$sql8 = "SELECT * FROM monodrogas where cod_barra = $cod_mercaderia";
$result8 = $db->Execute($sql8);
$nombre_comercial=$result8->fields["nombre_comercial"];
$cod_droga=$result8->fields["cod_droga"];


$sql11 = "SELECT *  FROM drogas WHERE cod_droga LIKE '$cod_droga'";
$result11 = $db->Execute($sql11);
 $droga=$result11->fields["droga"];

 $sql11 = "SELECT *  FROM drogas_profe WHERE cod_droga LIKE '$cod_droga'";
$result11 = $db->Execute($sql11);
 $drogas_profe=$result11->fields["cod_droga"];


if ($drogas_profe != ""){
 $sql3 = "INSERT INTO `tr_ventas_estadistica` (`nro_factura`) VALUES ('$nro_factura')";
$result3 = $db->Execute($sql3);
}


	$result->MoveNext();
	}

 
	?>

