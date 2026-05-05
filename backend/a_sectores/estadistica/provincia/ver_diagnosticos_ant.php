<style type="text/css">
<!--
.Estilo2 {color: #000000; }
.Estilo3 {
	font-size: 18px;
	font-family: "Trebuchet MS";
}
.Estilo4 {font-family: "Trebuchet MS"}
.Estilo5 {color: #000000; font-family: "Trebuchet MS"; }
-->
</style>

<?php

include ("../../../conexiones/config_usu.php");



$cod_agrupad=$_POST["cod_agrupado"];
for ($i=0;$i<count($cod_agrupad);$i++)    
{     
$cod_agrupado = $cod_agrupad[$i];    
}

$zona=$_POST["zonas"];
for ($i=0;$i<count($zona);$i++)    
{     
$zonas = $zona[$i];    
}


$sql="select * from diagnostico_agrupado where cod_agrupado like '$cod_agrupado'";
$result = $db->Execute($sql);

$nombre_agrupado=$result->fields["nombre_agrupado"];



$anio = $_POST["anio"];
$mes= $_POST["mes"];

$mes = 01;
$desde= "20".$anio."-".$mes."-01";
$hasta= "20".$anio."-".$mes."-31";
$consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_movimiento = 1 and cod_agrupado = '$cod_agrupado'";
$sql1 = "SELECT count(departamento) as cant_depto, sum(neto) as total_neto, departamento FROM `tr_ventas_encabezado` where $consulta order by departamento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  $cant_depto_ene_ent=$result1->fields["cant_depto"];
  $total_neto_ene=$result1->fields["total_neto"];
     $result1->MoveNext();
	}

$consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_movimiento = 1 and cod_agrupado = '$cod_agrupado'";
$sql1 = "SELECT count(departamento) as cant_depto FROM `tr_ventas_encabezado` where $consulta group by documento";
$result1 = $db->Execute($sql1);

 $cant_depto_ene=$result1->fields["cant_depto"];






$mes = 02;
$desde= "20".$anio."-".$mes."-01";
$hasta= "20".$anio."-".$mes."-31";
$consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_movimiento = 1 and cod_agrupado = '$cod_agrupado'";
$sql1 = "SELECT count(departamento) as cant_depto, sum(neto) as total_neto, departamento FROM `tr_ventas_encabezado` where $consulta order by departamento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 $cant_depto_feb_ent=$result1->fields["cant_depto"];
 $total_neto_feb=$result1->fields["total_neto"];
     $result1->MoveNext();
	}

	$consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_movimiento = 1 and cod_agrupado = '$cod_agrupado'";
$sql1 = "SELECT count(departamento) as cant_depto FROM `tr_ventas_encabezado` where $consulta group by documento";
$result1 = $db->Execute($sql1);

 $cant_depto_feb=$result1->fields["cant_depto"];




/*
$consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_movimiento = 1 and cod_agrupado = '$cod_agrupado'";
 $sql1 = "SELECT * FROM `tr_ventas_encabezado` where $consulta order by departamento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 $nro_factura=$result1->fields["nro_factura"];

 $sql21 = "SELECT * FROM `tr_ventas_detalle` where nro_factura = $nro_factura";
$result21 = $db->Execute($sql21);
 $cod_mercaderia=$result21->fields["cod_mercaderia"];
 $total=$result21->fields["total"];


 $sql21 = "SELECT * FROM `monodrogas` where cod_barra = $cod_mercaderia";
$result21 = $db->Execute($sql21);
echo $nombre_comercial=$result21->fields["nombre_comercial"];

$productos_feb = $productos_feb." ".$nombre_comercial." (".$total.")";




     $result1->MoveNext();
	}*/




$mes = 03;
$desde= "20".$anio."-".$mes."-01";
$hasta= "20".$anio."-".$mes."-31";
$consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_movimiento = 1 and cod_agrupado = '$cod_agrupado'";
$sql1 = "SELECT count(departamento) as cant_depto, sum(neto) as total_neto, departamento FROM `tr_ventas_encabezado` where $consulta order by departamento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 $cant_depto_mar_ent=$result1->fields["cant_depto"];
 $total_neto_mar=$result1->fields["total_neto"];
     $result1->MoveNext();
	}

	$consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_movimiento = 1 and cod_agrupado = '$cod_agrupado'";
$sql1 = "SELECT count(departamento) as cant_depto FROM `tr_ventas_encabezado` where $consulta group by documento";
$result1 = $db->Execute($sql1);

 $cant_depto_mar=$result1->fields["cant_depto"];




$mes = 04;
$desde= "20".$anio."-".$mes."-01";
$hasta= "20".$anio."-".$mes."-31";
$consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_movimiento = 1 and cod_agrupado = '$cod_agrupado'";
$sql1 = "SELECT count(departamento) as cant_depto, sum(neto) as total_neto, departamento FROM `tr_ventas_encabezado` where $consulta order by departamento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 $cant_depto_abr_ent=$result1->fields["cant_depto"];
 $total_neto_abr=$result1->fields["total_neto"];
     $result1->MoveNext();
	}

	$consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_movimiento = 1 and cod_agrupado = '$cod_agrupado'";
$sql1 = "SELECT count(departamento) as cant_depto FROM `tr_ventas_encabezado` where $consulta group by documento";
$result1 = $db->Execute($sql1);

 $cant_depto_abr=$result1->fields["cant_depto"];

 

$mes = 05;
$desde= "20".$anio."-".$mes."-01";
$hasta= "20".$anio."-".$mes."-31";
$consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_movimiento = 1 and cod_agrupado = '$cod_agrupado'";
$sql1 = "SELECT count(departamento) as cant_depto, sum(neto) as total_neto, departamento FROM `tr_ventas_encabezado` where $consulta order by departamento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 $cant_depto_may_ent=$result1->fields["cant_depto"];
 $total_neto_may=$result1->fields["total_neto"];
     $result1->MoveNext();
	}

		$consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_movimiento = 1 and cod_agrupado = '$cod_agrupado'";
$sql1 = "SELECT count(departamento) as cant_depto FROM `tr_ventas_encabezado` where $consulta group by documento";
$result1 = $db->Execute($sql1);


 $cant_depto_may=$result1->fields["cant_depto"];

   



$mes = 06;
$desde= "20".$anio."-".$mes."-01";
$hasta= "20".$anio."-".$mes."-31";
$consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_movimiento = 1 and cod_agrupado = '$cod_agrupado'";
$sql1 = "SELECT count(departamento) as cant_depto, sum(neto) as total_neto, departamento FROM `tr_ventas_encabezado` where $consulta order by departamento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 $cant_depto_jun_ent=$result1->fields["cant_depto"];
 $total_neto_jun=$result1->fields["total_neto"];
     $result1->MoveNext();
	}

	$consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_movimiento = 1 and cod_agrupado = '$cod_agrupado'";
$sql1 = "SELECT count(departamento) as cant_depto FROM `tr_ventas_encabezado` where $consulta group by documento";
$result1 = $db->Execute($sql1);

 $cant_depto_jun=$result1->fields["cant_depto"];

  

$mes = 07;
$desde= "20".$anio."-".$mes."-01";
$hasta= "20".$anio."-".$mes."-31";
$consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_movimiento = 1 and cod_agrupado = '$cod_agrupado'";
$sql1 = "SELECT count(departamento) as cant_depto, sum(neto) as total_neto, departamento FROM `tr_ventas_encabezado` where $consulta order by departamento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 $cant_depto_jul_ent=$result1->fields["cant_depto"];
 $total_neto_jul=$result1->fields["total_neto"];
     $result1->MoveNext();
	}

	$consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_movimiento = 1 and cod_agrupado = '$cod_agrupado'";
$sql1 = "SELECT count(departamento) as cant_depto FROM `tr_ventas_encabezado` where $consulta group by documento";
$result1 = $db->Execute($sql1);

 $cant_depto_jul=$result1->fields["cant_depto"];



$mes = 08;
$desde= "20".$anio."-".$mes."-01";
$hasta= "20".$anio."-".$mes."-31";
$consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_movimiento = 1 and cod_agrupado = '$cod_agrupado'";
$sql1 = "SELECT count(departamento) as cant_depto, sum(neto) as total_neto, departamento FROM `tr_ventas_encabezado` where $consulta order by departamento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 $cant_depto_ago_ent=$result1->fields["cant_depto"];
 $total_neto_ago=$result1->fields["total_neto"];
     $result1->MoveNext();
	}

	$consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_movimiento = 1 and cod_agrupado = '$cod_agrupado'";
$sql1 = "SELECT count(departamento) as cant_depto FROM `tr_ventas_encabezado` where $consulta group by documento";
$result1 = $db->Execute($sql1);

 $cant_depto_ago=$result1->fields["cant_depto"];




$mes = 09;
$desde= "20".$anio."-".$mes."-01";
$hasta= "20".$anio."-".$mes."-31";
$consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_movimiento = 1 and cod_agrupado = '$cod_agrupado'";
$sql1 = "SELECT count(departamento) as cant_depto, sum(neto) as total_neto, departamento FROM `tr_ventas_encabezado` where $consulta order by departamento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 $cant_depto_set_ent=$result1->fields["cant_depto"];
 $total_neto_set=$result1->fields["total_neto"];
     $result1->MoveNext();
	}

	$consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_movimiento = 1 and cod_agrupado = '$cod_agrupado'";
$sql1 = "SELECT count(departamento) as cant_depto FROM `tr_ventas_encabezado` where $consulta group by documento";
$result1 = $db->Execute($sql1);

 $cant_depto_set=$result1->fields["cant_depto"];




$mes = 10;
$desde= "20".$anio."-".$mes."-01";
$hasta= "20".$anio."-".$mes."-31";
$consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_movimiento = 1 and cod_agrupado = '$cod_agrupado'";
$sql1 = "SELECT count(departamento) as cant_depto, sum(neto) as total_neto, departamento FROM `tr_ventas_encabezado` where $consulta order by departamento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 $cant_depto_oct_ent=$result1->fields["cant_depto"];
 $total_neto_oct=$result1->fields["total_neto"];
     $result1->MoveNext();
	}

	$consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_movimiento = 1 and cod_agrupado = '$cod_agrupado'";
$sql1 = "SELECT count(departamento) as cant_depto FROM `tr_ventas_encabezado` where $consulta group by documento";
$result1 = $db->Execute($sql1);

 $cant_depto_oct=$result1->fields["cant_depto"];




	$mes = 11;
$desde= "20".$anio."-".$mes."-01";
$hasta= "20".$anio."-".$mes."-31";
$consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_movimiento = 1 and cod_agrupado = '$cod_agrupado'";
$sql1 = "SELECT count(departamento) as cant_depto, sum(neto) as total_neto, departamento FROM `tr_ventas_encabezado` where $consulta order by departamento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 $cant_depto_nov_ent=$result1->fields["cant_depto"];
 $total_neto_nov=$result1->fields["total_neto"];
     $result1->MoveNext();
	}

		$consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_movimiento = 1 and cod_agrupado = '$cod_agrupado'";
$sql1 = "SELECT count(departamento) as cant_depto FROM `tr_ventas_encabezado` where $consulta group by documento";
$result1 = $db->Execute($sql1);

 $cant_depto_nov=$result1->fields["cant_depto"];





	$mes = 12;
$desde= "20".$anio."-".$mes."-01";
$hasta= "20".$anio."-".$mes."-31";
$consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_movimiento = 1 and cod_agrupado = '$cod_agrupado'";
$sql1 = "SELECT count(departamento) as cant_depto, sum(neto) as total_neto, departamento FROM `tr_ventas_encabezado` where $consulta order by departamento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 $cant_depto_dic_ent=$result1->fields["cant_depto"];
 $total_neto_dic=$result1->fields["total_neto"];
     $result1->MoveNext();
	}

	$consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_movimiento = 1 and cod_agrupado = '$cod_agrupado'";
$sql1 = "SELECT count(departamento) as cant_depto FROM `tr_ventas_encabezado` where $consulta group by documento";
$result1 = $db->Execute($sql1);

 $cant_depto_dic=$result1->fields["cant_depto"];




$desde1 = $anio."-01-01";
$hasta1 = $anio."-12-31";
	$consulta = "departamento = '$zonas' and fecha between '$desde1' and '$hasta1' and cod_movimiento = 1 and cod_agrupado = '$cod_agrupado'";
$sql1 = "SELECT count(departamento) as cant_depto1 FROM `tr_ventas_encabezado` where $consulta group by documento";
$result1 = $db->Execute($sql1);
$total_anual=$result1->fields["cant_depto1"];





$total = $total_neto_ene + $total_neto_feb + $total_neto_mar + $total_neto_abr + $total_neto_may + $total_neto_jun +$total_neto_jul + $total_neto_ago + $total_neto_set + $total_neto_oct + $total_neto_nov + $total_neto_dic;

$total_cantidad = $cant_depto_ene_ent + $cant_depto_feb_ent + $cant_depto_mar_ent + $cant_depto_abr_ent + $cant_depto_may_ent + $cant_depto_jun_ent + $cant_depto_jul_ent + $cant_depto_ago_ent + $cant_depto_set_ent + $cant_depto_oct_ent + $cant_depto_nov_ent + $cant_depto_dic_ent;
?>



<table width="821" border="1" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3" bgcolor="#EDEDED"><span class="Estilo4">DEPARTAMENTO: <?php echo $zonas;?></span></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#EDEDED"><div align="left" class="Estilo4">TUMOR: <?php echo $nombre_agrupado;?></div>      <div align="center" class="Estilo4"></div></td>
  </tr>
  <tr>
    <td width="145" bgcolor="#B8B8B8"><div align="center" class="Estilo4"><span class="Estilo2">MES</span></div></td>
    <td width="272" bgcolor="#B8B8B8"><div align="center" class="Estilo5">CANTIDAD PACIENTES POR MES </div></td>
    <td width="169" bgcolor="#B8B8B8"><div align="center" class="Estilo5">IMPORTE</div></td>
  </tr>
 <tr>
   <td><span class="Estilo4">ENERO</span></td>
    <td><div align="center" class="Estilo4"><?php echo $cant_depto_ene;?></div></td>
    <td><div align="right" class="Estilo4"><?php echo $total_neto_ene;?></div></td>
 </tr>
 <tr>
   <td><span class="Estilo4">FEBRERO</span></td>
   <td><div align="center" class="Estilo4"><?php echo $cant_depto_feb;?></div></td>
   <td><div align="right" class="Estilo4"><?php echo $total_neto_feb;?></div></td>
 </tr>
 <tr>
   <td><span class="Estilo4">MARZO</span></td>
   <td><div align="center" class="Estilo4"><?php echo $cant_depto_mar;?></div></td>
   <td><div align="right" class="Estilo4"><?php echo $total_neto_mar;?></div></td>
 </tr>
 <tr>
   <td><span class="Estilo4">ABRIL</span></td>
   <td><div align="center" class="Estilo4"><?php echo $cant_depto_abr;?></div></td>
   <td><div align="right" class="Estilo4"><?php echo $total_neto_abr;?></div></td>
 </tr>
 <tr>
   <td><span class="Estilo4">MAYO</span></td>
   <td><div align="center" class="Estilo4"><?php echo $cant_depto_may;?></div></td>
   <td><div align="right" class="Estilo4"><?php echo $total_neto_may;?></div></td>
 </tr>
 <tr>
   <td><span class="Estilo4">JUNIO</span></td>
   <td><div align="center" class="Estilo4"><?php echo $cant_depto_jun;?></div></td>
   <td><div align="right" class="Estilo4"><?php echo $total_neto_jun;?></div></td>
 </tr>
 <tr>
   <td><span class="Estilo4">JULIO</span></td>
   <td><div align="center" class="Estilo4"><?php echo $cant_depto_jul;?></div></td>
   <td><div align="right" class="Estilo4"><?php echo $total_neto_jul;?></div></td>
 </tr>
 <tr>
   <td><span class="Estilo4">AGOSTO</span></td>
   <td><div align="center" class="Estilo4"><?php echo $cant_depto_ago;?></div></td>
   <td><div align="right" class="Estilo4"><?php echo $total_neto_ago;?></div></td>
 </tr>
 <tr>
   <td><span class="Estilo4">SETIEMBRE</span></td>
   <td><div align="center" class="Estilo4"><?php echo $cant_depto_set;?></div></td>
   <td><div align="right" class="Estilo4"><?php echo $total_neto_set;?></div></td>
 </tr>
 <tr>
   <td><span class="Estilo4">OCTUBRE</span></td>
   <td><div align="center" class="Estilo4"><?php echo $cant_depto_oct;?></div></td>
   <td><div align="right" class="Estilo4"><?php echo $total_neto_oct;?></div></td>
 </tr>
 <tr>
   <td><span class="Estilo4">NOVIEMBRE</span></td>
   <td><div align="center" class="Estilo4"><?php echo $cant_depto_nov;?></div></td>
   <td><div align="right" class="Estilo4"><?php echo $total_neto_nov;?></div></td>
 </tr>
 <tr>
   <td><span class="Estilo4">DICIEMBRE</span></td>
   <td><div align="center" class="Estilo4"><?php echo $cant_depto_dic;?></div></td>
   <td><div align="right" class="Estilo4"><?php echo $total_neto_dic;?></div></td>
 </tr>
 <tr>
   <td bgcolor="#B8B8B8"><span class="Estilo4">TOTAL</span></td>
   <td bgcolor="#B8B8B8"><div align="center"><span class="Estilo4"></span></div></td>
   <td bgcolor="#B8B8B8"><div align="right" class="Estilo3"><?php echo $total;?></div></td>
 </tr>
</table>

<?PHP
if ($total > 0){
$promedio_anual = round($total / $total_anual,2);
}


?>
<table width="823" border="0">
  <tr>
    <td width="817"><div align="right" class="Estilo4">CANTIDAD DE PACIENTES ANUALES: <?php echo $total_anual;?></div></td>
  </tr>
  <tr>
    <td><div align="right" class="Estilo4">GASTOS ANUALES: <?php echo $total;?></div></td>
  </tr>
  <tr>
    <td><div align="right" class="Estilo4">PROMEDIO COSTO POR PACIENTE ATENDIDO ANUALMENTE: <?php echo $promedio_anual;?></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center">* * *  * * * Observaciones * * *  * * *</div></td>
  </tr>
  <tr>
    <td height="26">En la columna &quot;<span class="Estilo2">CANTIDAD PACIENTES POR MES&quot;, un mismo paciente puede concurrir a retirar medicamentos 1 o m&aacute;s veces. </span> </td>
  </tr>
  <tr>
    <td height="36">El cuadro estad&iacute;stico esta basado s&oacute;lo en tratamientos quimioter&aacute;picos.</td>
  </tr>
</table>
