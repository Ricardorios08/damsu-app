<?php 

include ("../../../conexiones/config_pro.php");


$cod_barra = '7795317004874'; // erbitux

$cod_barra = '7795306365085'; // imatinib
$cod_barra = '7798035313990'; // imatinib
$cod_barra = '7795317004874'; // erbitux

$cod_barra = '7798035313990'; // imatinib



$cod_barra = $_REQUEST['cod_droga'];
$sql = "SELECT * FROM monodrogas where cod_droga= $cod_barra";
$result = $db->Execute($sql);
$nombre_comercial=$result->fields["nombre_comercial"];
$cod_droga=$result->fields["cod_droga"];


$sql11 = "SELECT *  FROM drogas WHERE cod_droga LIKE '$cod_droga'";
$result11 = $db->Execute($sql11);


 $droga=$result11->fields["droga"];



echo "Nombre Comercial: ".$nombre_comercial;
echo "<br>";
echo "Droga: ".$cod_droga;
echo "<br>";


$sql1 = "SELECT *  FROM `tr_ventas_detalle` WHERE `cod_mercaderia` LIKE '$cod_barra' AND `nro_os` = 10 GROUP BY nro_factura";
$result1 = $db->Execute($sql1);


 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  


  $nro_factura=$result1->fields["nro_factura"];

$sql11 = "SELECT *  FROM `tr_ventas_encabezado` WHERE nro_factura LIKE '$nro_factura'";
$result11 = $db->Execute($sql11);


 $documento=$result11->fields["documento"];

 

 $sql = "SELECT * FROM pacientes where documento = '$documento'";
$result = $db->Execute($sql);
echo $apellido=$result->fields["apellido"];
echo $nombre=$result->fields["nombre"];



echo "<br>";

$cont = $cont + 1;

   $result1->MoveNext();
	}




echo "<br>"; 
echo $cont;



?>