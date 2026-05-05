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


<table width="1147" border="0" cellpadding="0">
  <tr>
  <th width="67" bgcolor="#3399FF" scope="col"><span class="Estilo19">Cod Droga</span></th>
    <th width="265" bgcolor="#3399FF" scope="col"><span class="Estilo19">Droga</span></th>
  <th width="84" bgcolor="#3399FF" scope="col"><span class="Estilo19">Documento</span></th>
    <th width="277" bgcolor="#3399FF" scope="col"><span class="Estilo19">Paciente</span></th>
    <th width="64" bgcolor="#3399FF" scope="col"><span class="Estilo19">Cantidad</span></th>

<th width="58" bgcolor="#3399FF" scope="col"><span class="Estilo19">O. Social  </span></th>
    <th width="64" bgcolor="#3399FF" scope="col"><span class="Estilo19">Cantidad</span></th>
    <th width="57" bgcolor="#3399FF" scope="col"><span class="Estilo19">Precio </span></th>
  </tr>
  

<?php 

include ("../../../conexiones/config_pro.php");

$sql = "TRUNCATE drogas_profe_consumo";
//$result = $db->Execute($sql);

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

 $sql122 = "SELECT * FROM drogas";
$result1122 = $db->Execute($sql122);

 if (!$result1122) die("fallo".$db->ErrorMsg());
  while (!$result1122->EOF) {

$cod_droga=$result1122->fields["cod_droga"];
 $droga=$result1122->fields["droga"];


 $sql12 = "SELECT * FROM monodrogas where cod_droga = $cod_droga";
$result112 = $db->Execute($sql12);

 if (!$result112) die("fallo".$db->ErrorMsg());
  while (!$result112->EOF) {


$nombre_comercial=$result112->fields["nombre_comercial"];
$cod_barra=$result112->fields["cod_barra"];
 


  


$cod_b = $cod_barra;

 


 $sql1 = "SELECT *  FROM `tr_ventas_detalle` WHERE `cod_mercaderia` LIKE '$cod_barra' and fecha > '2012-12-31' group by documento order by fecha, documento";
$result1 = $db->Execute($sql1);


 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  


  $nro_factura=$result1->fields["nro_factura"];
$cantidad=$result1->fields["cantidad"];
$documento=$result1->fields["documento"];

$sql11 = "SELECT count(nro_factura) as canti , sum(cantidad * precio_unitario) as precio  FROM `tr_ventas_detalle` where `cod_mercaderia` LIKE '$cod_barra' and fecha > '2012-12-31' and documento = $documento";
$result11 = $db->Execute($sql11);


 $canti=$result11->fields["canti"];
 $precio=$result11->fields["precio"];


 $sql = "SELECT * FROM pacientes where documento = '$documento'";
$result = $db->Execute($sql);
  $apellido=$result->fields["apellido"];
 
  $nombre=$result->fields["nombre"];
 
  $precio_actualizado=$result1->fields["precio_unitario"] * $cantidad;

$total = $total + $precio_actualizado;

  $sql = "SELECT * FROM afiliaciones where documento = '$documento' order by fecha desc";
$result = $db->Execute($sql);
  $nro_os=$result->fields["nro_os"];

  if ($nro_os == 10){$nro_os = "INCLUIR";}else{$nro_os = "";}

$cont = $cont + 1;

$paciente = $apellido.", ".$nombre;

$sql = "INSERT INTO `oncologico`.`drogas_profe_consumo` (`cod_droga`, `droga`, `nombre_comercial`, `cod_barra`, `paciente`, `documento`, `nro_factura`, `fecha`, `precio`) VALUES ('$cod_droga', '$droga', '$nombre_comercial', '$cod_barra', '$paciente', '$documento', '$nro_factura', '$fecha', '$precio_actualizado' )";
//$result = $db->Execute($sql);

?>
<tr>
    <td><div align="left" class="Estilo16"> <?php echo $cod_droga;?> </div></td>
<td><div align="left" class="Estilo16"> <?php echo $droga;?></div></td>
   <td><span class="Estilo16"><?php echo $documento;?></span></td>
    <td><span class="Estilo16"><?php echo $apellido;?>, <?php echo $nombre;?> </span></td>

   	    <td><div align="center" class="Estilo16"><?php echo $nro_os;?></div></td>
		    <td><div align="center" class="Estilo16"><?php echo $canti;?></div></td>
    <td><div align="right" class="Estilo16"><?php echo number_format($precio,2);?></div></td>
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
