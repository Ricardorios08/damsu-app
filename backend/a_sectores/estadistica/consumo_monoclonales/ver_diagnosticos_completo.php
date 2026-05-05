<style type="text/css">
<!--
.Estilo2 {color: #000000; }
.Estilo3 {
	font-size: 18px;
	font-family: "Trebuchet MS";
}
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
 $cant_depto_ene=$result1->fields["cant_depto"];
 $total_neto_ene=$result1->fields["total_neto"];
     $result1->MoveNext();
	}


//
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
 $nombre_comercial=$result21->fields["nombre_comercial"];

$productos_ene = $productos_ene." ".$nombre_comercial." (".$total.")";
//



     $result1->MoveNext();
	}



$mes = 02;
$desde= "20".$anio."-".$mes."-01";
$hasta= "20".$anio."-".$mes."-31";
$consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_movimiento = 1 and cod_agrupado = '$cod_agrupado'";
$sql1 = "SELECT count(departamento) as cant_depto, sum(neto) as total_neto, departamento FROM `tr_ventas_encabezado` where $consulta order by departamento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 $cant_depto_feb=$result1->fields["cant_depto"];
 $total_neto_feb=$result1->fields["total_neto"];
     $result1->MoveNext();
	}


//
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
 $nombre_comercial=$result21->fields["nombre_comercial"];

$productos_feb = $productos_feb." ".$nombre_comercial." (".$total.")";
//



     $result1->MoveNext();
	}




$mes = 03;
$desde= "20".$anio."-".$mes."-01";
$hasta= "20".$anio."-".$mes."-31";
$consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_movimiento = 1 and cod_agrupado = '$cod_agrupado'";
$sql1 = "SELECT count(departamento) as cant_depto, sum(neto) as total_neto, departamento FROM `tr_ventas_encabezado` where $consulta order by departamento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 $cant_depto_mar=$result1->fields["cant_depto"];
 $total_neto_mar=$result1->fields["total_neto"];
     $result1->MoveNext();
	}


	//
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
 $nombre_comercial=$result21->fields["nombre_comercial"];

$productos_mar = $productos_mar." ".$nombre_comercial." (".$total.")";
//



     $result1->MoveNext();
	}

$mes = 04;
$desde= "20".$anio."-".$mes."-01";
$hasta= "20".$anio."-".$mes."-31";
$consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_movimiento = 1 and cod_agrupado = '$cod_agrupado'";
$sql1 = "SELECT count(departamento) as cant_depto, sum(neto) as total_neto, departamento FROM `tr_ventas_encabezado` where $consulta order by departamento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 $cant_depto_abr=$result1->fields["cant_depto"];
 $total_neto_abr=$result1->fields["total_neto"];
     $result1->MoveNext();
	}

	//
$consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_movimiento = 1 and cod_agrupado = '$cod_agrupado'";
echo  $sql1 = "SELECT * FROM `tr_ventas_encabezado` where $consulta order by departamento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 echo $nro_factura=$result1->fields["nro_factura"];

 $sql201 = "SELECT * FROM `tr_ventas_detalle` where nro_factura = $nro_factura";
$result201 = $db->Execute($sql201);




 $cod_mercaderia=$result201->fields["cod_mercaderia"];
 $total=$result201->fields["total"];


 $sql21 = "SELECT * FROM `monodrogas` where cod_barra = $cod_mercaderia";
$result21 = $db->Execute($sql21);
 $nombre_comercial=$result21->fields["nombre_comercial"];

$productos_abr = $productos_abr." ".$nombre_comercial." (".$total.")";
//


     $result1->MoveNext();
	}

$mes = 05;
$desde= "20".$anio."-".$mes."-01";
$hasta= "20".$anio."-".$mes."-31";
$consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_movimiento = 1 and cod_agrupado = '$cod_agrupado'";
$sql1 = "SELECT count(departamento) as cant_depto, sum(neto) as total_neto, departamento FROM `tr_ventas_encabezado` where $consulta order by departamento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 $cant_depto_may=$result1->fields["cant_depto"];
 $total_neto_may=$result1->fields["total_neto"];
     $result1->MoveNext();
	}

	//
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
 $nombre_comercial=$result21->fields["nombre_comercial"];

$productos_may = $productos_may." ".$nombre_comercial." (".$total.")";
//



     $result1->MoveNext();
	}

$mes = 06;
$desde= "20".$anio."-".$mes."-01";
$hasta= "20".$anio."-".$mes."-31";
$consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_movimiento = 1 and cod_agrupado = '$cod_agrupado'";
$sql1 = "SELECT count(departamento) as cant_depto, sum(neto) as total_neto, departamento FROM `tr_ventas_encabezado` where $consulta order by departamento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 $cant_depto_jun=$result1->fields["cant_depto"];
 $total_neto_jun=$result1->fields["total_neto"];
     $result1->MoveNext();
	}

//
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
 $nombre_comercial=$result21->fields["nombre_comercial"];

$productos_jun = $productos_jun." ".$nombre_comercial." (".$total.")";
//



     $result1->MoveNext();
	}

$mes = 07;
$desde= "20".$anio."-".$mes."-01";
$hasta= "20".$anio."-".$mes."-31";
$consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_movimiento = 1 and cod_agrupado = '$cod_agrupado'";
$sql1 = "SELECT count(departamento) as cant_depto, sum(neto) as total_neto, departamento FROM `tr_ventas_encabezado` where $consulta order by departamento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 $cant_depto_jul=$result1->fields["cant_depto"];
 $total_neto_jul=$result1->fields["total_neto"];
     $result1->MoveNext();
	}

//
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
 $nombre_comercial=$result21->fields["nombre_comercial"];

$productos_jul = $productos_jul." ".$nombre_comercial." (".$total.")";
//



     $result1->MoveNext();
	}

$mes = 08;
$desde= "20".$anio."-".$mes."-01";
$hasta= "20".$anio."-".$mes."-31";
$consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_movimiento = 1 and cod_agrupado = '$cod_agrupado'";
$sql1 = "SELECT count(departamento) as cant_depto, sum(neto) as total_neto, departamento FROM `tr_ventas_encabezado` where $consulta order by departamento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 $cant_depto_ago=$result1->fields["cant_depto"];
 $total_neto_ago=$result1->fields["total_neto"];
     $result1->MoveNext();
	}

//
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
 $nombre_comercial=$result21->fields["nombre_comercial"];

$productos_ago = $productos_ago." ".$nombre_comercial." (".$total.")";
//



     $result1->MoveNext();
	}


$mes = 09;
$desde= "20".$anio."-".$mes."-01";
$hasta= "20".$anio."-".$mes."-31";
$consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_movimiento = 1 and cod_agrupado = '$cod_agrupado'";
$sql1 = "SELECT count(departamento) as cant_depto, sum(neto) as total_neto, departamento FROM `tr_ventas_encabezado` where $consulta order by departamento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 $cant_depto_set=$result1->fields["cant_depto"];
 $total_neto_set=$result1->fields["total_neto"];
     $result1->MoveNext();
	}

//
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
 $nombre_comercial=$result21->fields["nombre_comercial"];

$productos_set = $productos_set." ".$nombre_comercial." (".$total.")";
//



     $result1->MoveNext();
	}


$mes = 10;
$desde= "20".$anio."-".$mes."-01";
$hasta= "20".$anio."-".$mes."-31";
$consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_movimiento = 1 and cod_agrupado = '$cod_agrupado'";
$sql1 = "SELECT count(departamento) as cant_depto, sum(neto) as total_neto, departamento FROM `tr_ventas_encabezado` where $consulta order by departamento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 $cant_depto_oct=$result1->fields["cant_depto"];
 $total_neto_oct=$result1->fields["total_neto"];
     $result1->MoveNext();
	}

//
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
 $nombre_comercial=$result21->fields["nombre_comercial"];

$productos_oct = $productos_oct." ".$nombre_comercial." (".$total.")";
//



     $result1->MoveNext();
	}


	$mes = 11;
$desde= "20".$anio."-".$mes."-01";
$hasta= "20".$anio."-".$mes."-31";
$consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_movimiento = 1 and cod_agrupado = '$cod_agrupado'";
$sql1 = "SELECT count(departamento) as cant_depto, sum(neto) as total_neto, departamento FROM `tr_ventas_encabezado` where $consulta order by departamento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 $cant_depto_nov=$result1->fields["cant_depto"];
 $total_neto_nov=$result1->fields["total_neto"];
     $result1->MoveNext();
	}


//
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
 $nombre_comercial=$result21->fields["nombre_comercial"];

$productos_nov = $productos_nov." ".$nombre_comercial." (".$total.")";
//



     $result1->MoveNext();
	}


	$mes = 12;
$desde= "20".$anio."-".$mes."-01";
$hasta= "20".$anio."-".$mes."-31";
$consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_movimiento = 1 and cod_agrupado = '$cod_agrupado'";
$sql1 = "SELECT count(departamento) as cant_depto, sum(neto) as total_neto, departamento FROM `tr_ventas_encabezado` where $consulta order by departamento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 $cant_depto_dic=$result1->fields["cant_depto"];
 $total_neto_dic=$result1->fields["total_neto"];
     $result1->MoveNext();
	}

	//
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
 $nombre_comercial=$result21->fields["nombre_comercial"];

$productos_dic = $productos_dic." ".$nombre_comercial." (".$total.")";
//



     $result1->MoveNext();
	}


$total = $total_neto_ene + $total_neto_feb + $total_neto_mar + $total_neto_abr + $total_neto_may + $total_neto_jun +$total_neto_jul + $total_neto_ago + $total_neto_set + $total_neto_oct + $total_neto_nov + $total_neto_dic;

$total_cantidad = $cant_depto_ene + $cant_depto_feb + $cant_depto_mar + $cant_depto_abr + $cant_depto_may + $cant_depto_jun + $cant_depto_jul + $cant_depto_ago + $cant_depto_set + $cant_depto_oct + $cant_depto_nov + $cant_depto_dic;
?>



<table width="650" border="1" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3" bgcolor="#EDEDED">DEPARTAMENTO: <?php echo $zonas;?></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#EDEDED"><div align="left">TUMOR: <?php echo $nombre_agrupado;?></div>      <div align="center"></div></td>
  </tr>
  <tr>
    <td width="304" bgcolor="#B8B8B8"><div align="center"><span class="Estilo2">MES</span></div></td>
    <td width="169" bgcolor="#B8B8B8"><div align="center" class="Estilo2">CANTIDAD</div></td>
    <td width="169" bgcolor="#B8B8B8"><div align="center" class="Estilo2">IMPORTE</div></td>
  </tr>
 <tr>
   <td>ENERO</td>
    <td><div align="center"><?php echo $cant_depto_ene;?></div></td>
    <td><div align="right"><?php echo $total_neto_ene;?></div></td>
  </tr>
 <tr>
   <td colspan="3"><?php echo $productos_ene;?></td>
  </tr>
 <tr>
   <td>FEBRERO</td>
   <td><div align="center"><?php echo $cant_depto_feb;?></div></td>
   <td><div align="right"><?php echo $total_neto_feb;?></div></td>
 </tr>
 <tr>
   <td colspan="3"><?php echo $productos_feb;?></td>
  </tr>
 <tr>
   <td>MARZO</td>
   <td><div align="center"><?php echo $cant_depto_mar;?></div></td>
   <td><div align="right"><?php echo $total_neto_mar;?></div></td>
 </tr>
 <tr>
   <td colspan="3"><?php echo $productos_mar;?></td>
  </tr>
 <tr>
   <td>ABRIL</td>
   <td><div align="center"><?php echo $cant_depto_abr;?></div></td>
   <td><div align="right"><?php echo $total_neto_abr;?></div></td>
 </tr>
 <tr>
   <td colspan="3"><?php echo $productos_abr;?></td>
  </tr>
 <tr>
   <td>MAYO</td>
   <td><div align="center"><?php echo $cant_depto_may;?></div></td>
   <td><div align="right"><?php echo $total_neto_may;?></div></td>
 </tr>
 <tr>
   <td><?php echo $productos_may;?></td>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
 </tr>
 <tr>
   <td>JUNIO</td>
   <td><div align="center"><?php echo $cant_depto_jun;?></div></td>
   <td><div align="right"><?php echo $total_neto_jun;?></div></td>
 </tr>
 <tr>
   <td><?php echo $productos_jun;?></td>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
 </tr>
 <tr>
   <td>JULIO</td>
   <td><div align="center"><?php echo $cant_depto_jul;?></div></td>
   <td><div align="right"><?php echo $total_neto_jul;?></div></td>
 </tr>
 <tr>
   <td><?php echo $productos_jul;?></td>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
 </tr>
 <tr>
   <td>AGOSTO</td>
   <td><div align="center"><?php echo $cant_depto_ago;?></div></td>
   <td><div align="right"><?php echo $total_neto_ago;?></div></td>
 </tr>
 <tr>
   <td><?php echo $productos_ago;?></td>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
 </tr>
 <tr>
   <td>SETIEMBRE</td>
   <td><div align="center"><?php echo $cant_depto_set;?></div></td>
   <td><div align="right"><?php echo $total_neto_set;?></div></td>
 </tr>
 <tr>
   <td><?php echo $productos_set;?></td>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
 </tr>
 <tr>
   <td>OCTUBRE</td>
   <td><div align="center"><?php echo $cant_depto_oct;?></div></td>
   <td><div align="right"><?php echo $total_neto_oct;?></div></td>
 </tr>
 <tr>
   <td><?php echo $productos_oct;?></td>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
 </tr>
 <tr>
   <td>NOVIEMBRE</td>
   <td><div align="center"><?php echo $cant_depto_nov;?></div></td>
   <td><div align="right"><?php echo $total_neto_nov;?></div></td>
 </tr>
 <tr>
   <td><?php echo $productos_nov;?></td>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
 </tr>
 <tr>
   <td>DICIEMBRE</td>
   <td><div align="center"><?php echo $cant_depto_dic;?></div></td>
   <td><div align="right"><?php echo $total_neto_dic;?></div></td>
 </tr>
 <tr>
   <td bgcolor="#FFFFFF"><?php echo $productos_dic;?></td>
   <td bgcolor="#FFFFFF">&nbsp;</td>
   <td bgcolor="#FFFFFF">&nbsp;</td>
 </tr>
 <tr>
   <td bgcolor="#B8B8B8">TOTAL</td>
   <td bgcolor="#B8B8B8"><div align="center"><span class="Estilo3"><?php echo $total_cantidad;?></span></div></td>
   <td bgcolor="#B8B8B8"><div align="right" class="Estilo3"><?php echo $total;?></div></td>
 </tr>
</table>

