<?php 

include ("../../../conexiones/config_pro.php");


$cod_barra = '7795317004874'; // erbitux

$cod_barra = '7795306365085'; // imatinib
$cod_barra = '7798035313990'; // imatinib
$cod_barra = '7795317004874'; // erbitux

$cod_barra = '7798035313990'; // imatinib



$cod_droga = $_REQUEST['cod_droga'];


 $sql12 = "SELECT * FROM monodrogas where cod_droga = $cod_droga";
$result112 = $db->Execute($sql12);

 if (!$result112) die("fallo".$db->ErrorMsg());
  while (!$result112->EOF) {


$nombre_comercial=$result112->fields["nombre_comercial"];
$cod_barra=$result112->fields["cod_barra"];
$droga=$result112->fields["droga"];



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
echo " ";
echo $nombre=$result->fields["nombre"];
echo " ";
echo $precio_actualizado=$result1->fields["precio_unitario"];


echo "<br>";

$cont = $cont + 1;

   $result1->MoveNext();
	}




echo "<br>"; 
echo $cont;


  $result112->MoveNext();
	}





?>