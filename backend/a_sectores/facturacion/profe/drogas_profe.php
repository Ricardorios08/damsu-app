<?php

$file = 'drogas_autorizadas.xls';
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$file");


?>

<style type="text/css">
<!--
.Estilo12 {font-family: "Trebuchet MS"; font-size: 10; }
.Estilo13 {font-size: 10}
.Estilo16 {font-family: "Trebuchet MS"; font-size: 10px; }
.Estilo19 {font-family: "Trebuchet MS"; font-size: 12px; }
-->
</style>


<table width="850" border="0" cellpadding="0">
  <tr>
  <th width="212" bgcolor="#3399FF" scope="col"><span class="Estilo19">Cod Droga</span></th>
    <th width="212" bgcolor="#3399FF" scope="col"><span class="Estilo19">Droga</span></th>
    <th width="177" bgcolor="#3399FF" scope="col"><span class="Estilo19">Nombre Comercial </span></th>
    <th width="209" bgcolor="#3399FF" scope="col"><span class="Estilo19">Paciente</span></th>
    <th width="85" bgcolor="#3399FF" scope="col"><span class="Estilo19">N&deg; Entrega </span></th>
    <th width="85" bgcolor="#3399FF" scope="col"><span class="Estilo19">Fecha  </span></th>
    <th width="68" bgcolor="#3399FF" scope="col"><span class="Estilo19">Precio </span></th>
  </tr>
  

<?php 

include ("../../../conexiones/config_pro.php");

$sql = "TRUNCATE drogas_profe_consumo";
$result = $db->Execute($sql);

///////////////
/*
 $sql1 = "select * from tr_ventas_encabezado where nro_os = 10";
$result1 = $db->Execute($sql1);

 

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  
$documento=$result1->fields["documento"];
$nro_factura=$result1->fields["nro_factura"];

 
  $sql = "UPDATE tr_ventas_detalle SET nro_os = '10' WHERE nro_factura = '$nro_factura'";
//$result = $db->Execute($sql);




//echo "<br>";
$cont = $cont + 1;

   $result1->MoveNext();
	}

*/

////////////

 $sql122 = "SELECT * FROM drogas_profe";
$result1122 = $db->Execute($sql122);

 if (!$result1122) die("fallo".$db->ErrorMsg());
  while (!$result1122->EOF) {

$cod_droga=$result1122->fields["cod_droga"];
 


 $sql12 = "SELECT * FROM monodrogas where cod_droga = $cod_droga";
$result112 = $db->Execute($sql12);

 if (!$result112) die("fallo".$db->ErrorMsg());
  while (!$result112->EOF) {


$nombre_comercial=$result112->fields["nombre_comercial"];
$cod_barra=$result112->fields["cod_barra"];
 


  $sql = "SELECT * FROM drogas where cod_droga = '$cod_droga'";
$result = $db->Execute($sql);
  $droga=$result->fields["droga"];


$cod_b = $cod_barra;

 


 $sql1 = "SELECT *  FROM `tr_ventas_detalle` WHERE `cod_mercaderia` LIKE '$cod_barra' AND `nro_os` = 10 and fecha > '2012-12-31' order by fecha, nro_factura";
$result1 = $db->Execute($sql1);


 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  


  $nro_factura=$result1->fields["nro_factura"];
$cantidad=$result1->fields["cantidad"];


$sql11 = "SELECT *  FROM `tr_ventas_encabezado` where nro_factura = $nro_factura";
$result11 = $db->Execute($sql11);


 $documento=$result11->fields["documento"];
 $fecha=$result11->fields["fecha"];
 
 $dia = substr($fecha,8,2);
  $mes = substr($fecha,5,2);
   $anio = substr($fecha,0,4);

   $fecha1 = $dia."/".$mes."/".$anio;

 $sql = "SELECT * FROM pacientes where documento = '$documento'";
$result = $db->Execute($sql);
  $apellido=$result->fields["apellido"];
 
  $nombre=$result->fields["nombre"];
 
  $precio_actualizado=$result1->fields["precio_unitario"] * $cantidad;

$total = $total + $precio_actualizado;

 

$cont = $cont + 1;

$paciente = $apellido.", ".$nombre;

$sql = "INSERT INTO `oncologico`.`drogas_profe_consumo` (`cod_droga`, `droga`, `nombre_comercial`, `cod_barra`, `paciente`, `documento`, `nro_factura`, `fecha`, `precio`) VALUES ('$cod_droga', '$droga', '$nombre_comercial', '$cod_barra', '$paciente', '$documento', '$nro_factura', '$fecha', '$precio_actualizado' )";
$result = $db->Execute($sql);

?>
<tr>
    <td><div align="left" class="Estilo16"> <?php echo $droga;?> c</div></td>
<td><div align="left" class="Estilo16"> <?php echo $droga;?></div></td>
    <td><span class="Estilo16"><?php echo $nombre_comercial;?></span></td>
    <td><span class="Estilo16"><?php echo $apellido;?>, <?php echo $nombre;?> (<?php echo $documento;?>)</span></td>
    <td><div align="center" class="Estilo16"><?php echo $nro_factura;?></div></td>
    <td><div align="center" class="Estilo16"><?php echo $fecha1;?></div></td>
    <td><div align="right" class="Estilo16"><?php echo number_format($precio_actualizado,2);?></div></td>
  </tr>
  

<?php 
   $result1->MoveNext();
	}




 
 


  $result112->MoveNext();
	}

  $result1122->MoveNext();
	}



 


?>

<tr>
    <td bgcolor="#3399FF"><span class="Estilo13"></span></td>
    <td bgcolor="#3399FF"><span class="Estilo13"></span></td>
    <td bgcolor="#3399FF"><span class="Estilo13"></span></td>
    <td bgcolor="#3399FF"><span class="Estilo13"></span></td>
    <td bgcolor="#3399FF"><span class="Estilo13"></span></td>
    <td bgcolor="#3399FF"><span class="Estilo13"></span></td>
  </tr>
  <tr>
    <td><span class="Estilo13"></span></td>
    <td><span class="Estilo13"></span></td>
    <td colspan="2"><div align="right" class="Estilo12">Total</div></td>
    <td><span class="Estilo13"></span></td>
    <td><div align="right" class="Estilo12"><?php echo number_format($total,2);?></div></td>
  </tr>
  <tr>
    <td><span class="Estilo13"></span></td>
    <td><span class="Estilo13"></span></td>
    <td colspan="2"><div align="right" class="Estilo12">Cant. Entregas </div></td>
    <td><span class="Estilo13"></span></td>
    <td><div align="center" class="Estilo12"><?php echo $cont;?></div></td>
  </tr>
 
</table>
