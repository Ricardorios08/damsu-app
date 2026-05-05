 <?php 

include ("../../../conexiones/config_pro.php");

$sql="select * from tr_ventas_encabezado where fecha between '$fecha_desde' and '$fecha_hasta' and nro_os = 10 ORDER by nro_factura, fecha desc";
$result = $db->Execute($sql);

  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

	  $nro_factura=strtoupper($result->fields["nro_factura"]);


echo $sql = "UPDATE tr_ventas_detalle SET `nro_os` = '10' WHERE `nro_factura` = $nro_factura";
//mysql_query($sql);
echo "<br>";

	  	$result->MoveNext();
	}