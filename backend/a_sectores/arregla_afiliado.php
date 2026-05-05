<?php 

include ("../conexiones/config_pro.php");


$sql1 = "select * from tr_ventas_encabezado where fecha between '2012-02-01' and '2013-01-31'";
$result1 = $db->Execute($sql1);


 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  


  $nro_factura=$result1->fields["nro_factura"];
  $documento=$result1->fields["documento"];

$sql = "SELECT * FROM `afiliaciones` where documento = $documento";
$result = $db->Execute($sql);
$nro_os=$result->fields["nro_os"];
$nro_afiliado=$result->fields["nro_afiliado"];

$sql = "SELECT * FROM `obrasocial` where nro_os = $nro_os";
$result = $db->Execute($sql);

$nombre_os=strtoupper($result->fields["nombre_os"]);
$sigla=strtoupper($result->fields["sigla"]);


echo $sql = "UPDATE tr_ventas_encabezado SET nro_os = '$nro_os' , nombre_os = '$sigla' WHERE nro_factura = '$nro_factura'";
//$result = $db->Execute($sql);
echo "<br>";

$cont = $cont + 1;

   $result1->MoveNext();
	}




echo "<br>"; 
echo $cont;



?>