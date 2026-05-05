<?php

/*$file = 'drogas_autorizadas.xls';
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$file");
*/

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
    <th width="64" bgcolor="#3399FF" scope="col"><span class="Estilo19">N&deg; Entrega </span></th>
    <th width="58" bgcolor="#3399FF" scope="col"><span class="Estilo19">Fecha  </span></th>
<th width="58" bgcolor="#3399FF" scope="col"><span class="Estilo19">O. Social  </span></th>
<th width="58" bgcolor="#3399FF" scope="col"><span class="Estilo19">Cant Entregados  </span></th>
    <th width="57" bgcolor="#3399FF" scope="col"><span class="Estilo19">Precio </span></th>
  </tr>
  

<?php 

include ("../../../conexiones/config_pro.php");

 $sql122 = "SELECT * FROM drogas";
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




 

  $sql1 = "SELECT  cod_droga,  nombre_droga, descripcion,documento, nro_factura, fecha, total  FROM `tr_ventas_detalle` WHERE fecha > '2012-12-31' and cod_droga > 0  and `cod_mercaderia` LIKE '$cod_barra'  order by cod_droga, fecha, nro_factura";
$result1 = $db->Execute($sql1);


 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  
  $cod_droga=$result1->fields["cod_droga"];
$nombre_droga=$result1->fields["nombre_droga"];

$descripcion=$result1->fields["descripcion"];
$documento=$result1->fields["documento"];
$nro_factura=$result1->fields["nro_factura"];
$fecha=$result1->fields["fecha"];
$precio_actualizado=$result1->fields["total"];
 
  $dia = substr($fecha,8,2);
  $mes = substr($fecha,5,2);
   $anio = substr($fecha,0,4);

   $fecha1 = $dia."/".$mes."/".$anio;


$cant=$result1->fields["cant"];
$total=$result1->fields["total"];


 $sql = "SELECT * FROM pacientes where documento = '$documento'";
$result = $db->Execute($sql);
  $apellido=$result->fields["apellido"];
 
  $nombre=$result->fields["nombre"];
 
 
  $sql = "SELECT * FROM afiliaciones where documento = '$documento' order by fecha desc";
$result = $db->Execute($sql);
  $nro_os=$result->fields["nro_os"];

  if ($nro_os == 10){$nro_os = "INCLUIR";}else{$nro_os = "";}

$cont = $cont + 1;

$paciente = $apellido.", ".$nombre;

 $sql2 = "SELECT *  FROM `tr_ventas_encabezado` where nro_factura = $nro_factura";
$result2 = $db->Execute($sql2);
  $cod_movimiento=$result2->fields["cod_movimiento"];


  if (($cod_movimiento == 1) or ($cod_movimiento == 10)){


  

?>
<tr>
    <td><div align="left" class="Estilo16"> <?php echo $cod_droga;?> </div></td>
<td><div align="left" class="Estilo16"> <?php echo $nombre_droga;?></div></td>
<td><span class="Estilo16"><?php echo $documento;?></span></td>
    <td><span class="Estilo16"><?php echo $apellido;?>, <?php echo $nombre;?> </span></td>
    <td><div align="center" class="Estilo16"><?php echo $nro_factura;?></div></td>
    <td><div align="center" class="Estilo16"><?php echo $fecha1;?></div></td>
	    <td><div align="center" class="Estilo16"><?php echo $nro_os;?></div></td>
<td><div align="center" class="Estilo16"><?php echo $cant;?></div></td>

    <td><div align="right" class="Estilo16"><?php echo number_format($total,2);?></div></td>
  </tr>
  

<?php 

	}


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
