<style type="text/css">
<!--
.Estilo2 {color: #000000; }
.Estilo4 {font-family: "Trebuchet MS"}
.Estilo5 {color: #000000; font-family: "Trebuchet MS"; }
.Estilo8 {font-size: 10px}
.Estilo10 {font-family: "Trebuchet MS"; font-size: 11px; }
.Estilo11 {font-size: 11px}
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


$sql="select * from diagnostico where cod_agrupado like '$cod_agrupado'";
$result = $db->Execute($sql);

$nombre_agrupado=$result->fields["nombre_diagnostico"];



$anio = $_POST["anio"];
$mes= $_POST["mes"];

$mes = 01;
$desde= "20".$anio."-".$mes."-01";
$hasta= "20".$anio."-".$mes."-31";
 $consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_movimiento = 1 and cod_diagnostico = '$cod_agrupado'";
echo $sql1 = "SELECT count(departamento) as cant_depto, sum(neto) as total_neto, departamento FROM `tr_ventas_encabezado` where $consulta order by departamento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  $cant_depto_ene_ent=$result1->fields["cant_depto"];
  $total_neto_ene=$result1->fields["total_neto"];
     $result1->MoveNext();
	}


$consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_movimiento = 1 and cod_diagnostico = '$cod_agrupado'";
 $sql1 = "SELECT * FROM `tr_ventas_encabezado` where $consulta GROUP BY documento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 $documento=$result1->fields["documento"];
 $denominacion=$result1->fields["denominacion"];


 $cant_depto_ene = $cant_depto_ene + 1;

 $nro_factura=$result1->fields["nro_factura"];
 
   
    $sql2 = "SELECT * FROM prestaciones_pacientes where documento = $documento and fecha_prestacion between '$desde' and '$hasta' ";
$result3 = $db->Execute($sql2);
if (!$result3) die("fallo".$db->ErrorMsg());
  while (!$result3->EOF) {
 $cod_prestacion=$result3->fields["cod_prestacion"];
 $cod_ene= $cod_ene." ".$cod_prestacion." ";

 $result3->MoveNext();
	}

 $doc_ene = $doc_ene." (".$documento." - ".$denominacion." / ".$cod_ene."), ";
  $cod_ene = "";
   
   $sql2 = "SELECT * FROM `tr_ventas_detalle` where nro_factura = $nro_factura ";
$result2 = $db->Execute($sql2);
if (!$result2) die("fallo".$db->ErrorMsg());
  while (!$result2->EOF) {
 $descripcion=$result2->fields["descripcion"];
 $cod_mercaderia=$result2->fields["cod_mercaderia"];
 $total=$result2->fields["total"];

 $sql21 = "SELECT * FROM `monodrogas` where cod_barra = $cod_mercaderia";
$result21 = $db->Execute($sql21);
 $nombre_comercial=$result21->fields["nombre_comercial"];


 $des_ene = $des_ene." (".$nombre_comercial." $".$total."), ";
     $result2->MoveNext();
	}




     $result1->MoveNext();
	}





$documento = "";

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
 $sql1 = "SELECT * FROM `tr_ventas_encabezado` where $consulta GROUP BY documento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 $documento=$result1->fields["documento"];
  $denominacion=$result1->fields["denominacion"];

   $cant_depto_feb = $cant_depto_feb + 1;


    $sql2 = "SELECT * FROM prestaciones_pacientes where documento = $documento and fecha_prestacion between '$desde' and '$hasta' ";
$result3 = $db->Execute($sql2);
if (!$result3) die("fallo".$db->ErrorMsg());
  while (!$result3->EOF) {
 $cod_prestacion=$result3->fields["cod_prestacion"];
 $cod_feb= $cod_feb." ".$cod_prestacion." ";

 $result3->MoveNext();
	}


 $doc_feb = $doc_feb." (".$documento." - ".$denominacion." / ".$cod_feb."), ";
  $cod_feb = "";


 $nro_factura=$result1->fields["nro_factura"];
   $sql2 = "SELECT * FROM `tr_ventas_detalle` where nro_factura = $nro_factura ";
$result2 = $db->Execute($sql2);
if (!$result2) die("fallo".$db->ErrorMsg());
  while (!$result2->EOF) {
 $descripcion=$result2->fields["descripcion"];
 $cod_mercaderia=$result2->fields["cod_mercaderia"];
 $total=$result2->fields["total"];

 $sql21 = "SELECT * FROM `monodrogas` where cod_barra = $cod_mercaderia";
$result21 = $db->Execute($sql21);
 $nombre_comercial=$result21->fields["nombre_comercial"];


 $des_feb = $des_feb." (".$nombre_comercial." $".$total."), ";
     $result2->MoveNext();
	}


     $result1->MoveNext();
	}
$documento = "";



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
 $sql1 = "SELECT * FROM `tr_ventas_encabezado` where $consulta GROUP BY documento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 $documento=$result1->fields["documento"];
  $denominacion=$result1->fields["denominacion"];

    $sql2 = "SELECT * FROM prestaciones_pacientes where documento = $documento and fecha_prestacion between '$desde' and '$hasta' ";
$result3 = $db->Execute($sql2);
if (!$result3) die("fallo".$db->ErrorMsg());
  while (!$result3->EOF) {
 $cod_prestacion=$result3->fields["cod_prestacion"];
 $cod_mar= $cod_mar." ".$cod_prestacion." ";

 $result3->MoveNext();
	}

 $doc_mar = $doc_mar." (".$documento." - ".$denominacion." / ".$cod_mar."), ";
   $cod_mar = "";

$cant_depto_mar = $cant_depto_mar + 1;


 $nro_factura=$result1->fields["nro_factura"];
   $sql2 = "SELECT * FROM `tr_ventas_detalle` where nro_factura = $nro_factura ";
$result2 = $db->Execute($sql2);
if (!$result2) die("fallo".$db->ErrorMsg());
  while (!$result2->EOF) {
 $descripcion=$result2->fields["descripcion"];
 $cod_mercaderia=$result2->fields["cod_mercaderia"];
 $total=$result2->fields["total"];


 $sql21 = "SELECT * FROM `monodrogas` where cod_barra = $cod_mercaderia";
$result21 = $db->Execute($sql21);
 $nombre_comercial=$result21->fields["nombre_comercial"];


 $des_mar = $des_mar." (".$nombre_comercial." $".$total."), ";
     $result2->MoveNext();
	}


     $result1->MoveNext();
	}
$documento = "";


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
 $sql1 = "SELECT * FROM `tr_ventas_encabezado` where $consulta GROUP BY documento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 $documento=$result1->fields["documento"];
  $denominacion=$result1->fields["denominacion"];
$cant_depto_abr = $cant_depto_abr + 1;

   $sql2 = "SELECT * FROM prestaciones_pacientes where documento = $documento and fecha_prestacion between '$desde' and '$hasta' ";
$result3 = $db->Execute($sql2);
if (!$result3) die("fallo".$db->ErrorMsg());
  while (!$result3->EOF) {
 $cod_prestacion=$result3->fields["cod_prestacion"];
 $cod_abr= $cod_abr." ".$cod_prestacion." ";

 $result3->MoveNext();
	}


 $doc_abr = $doc_abr." (".$documento." - ".$denominacion." / ".$cod_abr."), ";
  $cod_abr = "";
 $nro_factura=$result1->fields["nro_factura"];
   $sql2 = "SELECT * FROM `tr_ventas_detalle` where nro_factura = $nro_factura ";
$result2 = $db->Execute($sql2);
if (!$result2) die("fallo".$db->ErrorMsg());
  while (!$result2->EOF) {
 $descripcion=$result2->fields["descripcion"];
 $cod_mercaderia=$result2->fields["cod_mercaderia"];
 $total=$result2->fields["total"];


 $sql21 = "SELECT * FROM `monodrogas` where cod_barra = $cod_mercaderia";
$result21 = $db->Execute($sql21);
 $nombre_comercial=$result21->fields["nombre_comercial"];


 $des_abr = $des_abr." (".$nombre_comercial." $".$total."), ";
     $result2->MoveNext();
	}



     $result1->MoveNext();
	}
$documento = "";
$denominacion = "";


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
  $sql1 = "SELECT * FROM `tr_ventas_encabezado` where $consulta GROUP BY documento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 $documento=$result1->fields["documento"];
  $denominacion=$result1->fields["denominacion"];

$cant_depto_may = $cant_depto_may + 1;

   $sql3 = "SELECT * FROM prestaciones_pacientes where documento = $documento and fecha_prestacion between '$desde' and '$hasta' ";
$result3 = $db->Execute($sql3);
if (!$result3) die("fallo".$db->ErrorMsg());
  while (!$result3->EOF) {
 $cod_prestacion=$result3->fields["cod_prestacion"];
 $cod_may= $cod_may." ".$cod_prestacion." ";

 $result3->MoveNext();
	}


  $doc_may = $doc_may." (".$documento." - ".$denominacion." / ".$cod_may."), ";

    $cod_may = "";


$denominacion = "";

 $nro_factura=$result1->fields["nro_factura"];
   $sql2 = "SELECT * FROM `tr_ventas_detalle` where nro_factura = $nro_factura ";
$result2 = $db->Execute($sql2);
if (!$result2) die("fallo".$db->ErrorMsg());
  while (!$result2->EOF) {
 $descripcion=$result2->fields["descripcion"];
 $cod_mercaderia=$result2->fields["cod_mercaderia"];
 $total=$result2->fields["total"];

 $sql21 = "SELECT * FROM `monodrogas` where cod_barra = $cod_mercaderia";
$result21 = $db->Execute($sql21);
 $nombre_comercial=$result21->fields["nombre_comercial"];


 $des_may = $des_may." (".$nombre_comercial." $".$total."), ";
     $result2->MoveNext();
	}


     $result1->MoveNext();
	}
$documento = "";
$cod_prestacion = "";


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
 $sql1 = "SELECT * FROM `tr_ventas_encabezado` where $consulta GROUP BY documento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 $documento=$result1->fields["documento"];
  $denominacion=$result1->fields["denominacion"];

$cant_depto_jun = $cant_depto_jun + 1;

     $sql2 = "SELECT * FROM prestaciones_pacientes where documento = $documento and fecha_prestacion between '$desde' and '$hasta' ";
$result3 = $db->Execute($sql2);
if (!$result3) die("fallo".$db->ErrorMsg());
  while (!$result3->EOF) {
 $cod_prestacion=$result3->fields["cod_prestacion"];

 if ($cod_prestacion != ''){
  $cod_jun= $cod_jun." ".$cod_prestacion." ";
 }

 $result3->MoveNext();
	}



  $doc_jun = $doc_jun." (".$documento." - ".$denominacion." / ".$cod_jun."), ";

  $cod_jun = "";

 $nro_factura=$result1->fields["nro_factura"];
   $sql2 = "SELECT * FROM `tr_ventas_detalle` where nro_factura = $nro_factura ";
$result2 = $db->Execute($sql2);
if (!$result2) die("fallo".$db->ErrorMsg());
  while (!$result2->EOF) {
 $descripcion=$result2->fields["descripcion"];
 $cod_mercaderia=$result2->fields["cod_mercaderia"];
 $total=$result2->fields["total"];

 $sql21 = "SELECT * FROM `monodrogas` where cod_barra = $cod_mercaderia";
$result21 = $db->Execute($sql21);
 $nombre_comercial=$result21->fields["nombre_comercial"];


 $des_jun = $des_jun." (".$nombre_comercial." $".$total."), ";
     $result2->MoveNext();
	}


     $result1->MoveNext();
	}
$documento = "";



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
 $sql1 = "SELECT * FROM `tr_ventas_encabezado` where $consulta GROUP BY documento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 $documento=$result1->fields["documento"];
  $denominacion=$result1->fields["denominacion"];

$cant_depto_jul = $cant_depto_jul + 1;

    $sql2 = "SELECT * FROM prestaciones_pacientes where documento = $documento and fecha_prestacion between '$desde' and '$hasta' ";
$result3 = $db->Execute($sql2);
if (!$result3) die("fallo".$db->ErrorMsg());
  while (!$result3->EOF) {
 $cod_prestacion=$result3->fields["cod_prestacion"];
 $cod_jul= $cod_jul." ".$cod_prestacion." ";

 $result3->MoveNext();
	}

 $doc_jul = $doc_jul." (".$documento." - ".$denominacion." / ".$cod_jul."), ";
 $cod_jul = "";
 $nro_factura=$result1->fields["nro_factura"];
   $sql2 = "SELECT * FROM `tr_ventas_detalle` where nro_factura = $nro_factura ";
$result2 = $db->Execute($sql2);
if (!$result2) die("fallo".$db->ErrorMsg());
  while (!$result2->EOF) {
 $descripcion=$result2->fields["descripcion"];
 $cod_mercaderia=$result2->fields["cod_mercaderia"];
 $total=$result2->fields["total"];


 $sql21 = "SELECT * FROM `monodrogas` where cod_barra = $cod_mercaderia";
$result21 = $db->Execute($sql21);
 $nombre_comercial=$result21->fields["nombre_comercial"];


 $des_jul = $des_jul." (".$nombre_comercial." $".$total."), ";
     $result2->MoveNext();
	}


     $result1->MoveNext();
	}
$documento = "";

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
 $sql1 = "SELECT * FROM `tr_ventas_encabezado` where $consulta GROUP BY documento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 $documento=$result1->fields["documento"];
  $denominacion=$result1->fields["denominacion"];

$cant_depto_ago = $cant_depto_ago + 1;

    $sql2 = "SELECT * FROM prestaciones_pacientes where documento = $documento and fecha_prestacion between '$desde' and '$hasta' ";
$result3 = $db->Execute($sql2);
if (!$result3) die("fallo".$db->ErrorMsg());
  while (!$result3->EOF) {
 $cod_prestacion=$result3->fields["cod_prestacion"];
 $cod_ago= $cod_ago." ".$cod_prestacion." ";

 $result3->MoveNext();
	}

 $doc_ago = $doc_ago." (".$documento." - ".$denominacion." / ".$cod_ago."), ";
 $cod_ago = "";
 $nro_factura=$result1->fields["nro_factura"];
   $sql2 = "SELECT * FROM `tr_ventas_detalle` where nro_factura = $nro_factura ";
$result2 = $db->Execute($sql2);
if (!$result2) die("fallo".$db->ErrorMsg());
  while (!$result2->EOF) {
 $descripcion=$result2->fields["descripcion"];
 $cod_mercaderia=$result2->fields["cod_mercaderia"];
 $total=$result2->fields["total"];


 $sql21 = "SELECT * FROM `monodrogas` where cod_barra = $cod_mercaderia";
$result21 = $db->Execute($sql21);
 $nombre_comercial=$result21->fields["nombre_comercial"];


 $des_ago = $des_ago." (".$nombre_comercial." $".$total."), ";
     $result2->MoveNext();
	}


     $result1->MoveNext();
	}
$documento = "";


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
 $sql1 = "SELECT * FROM `tr_ventas_encabezado` where $consulta GROUP BY documento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 $documento=$result1->fields["documento"];
  $denominacion=$result1->fields["denominacion"];
$cant_depto_set = $cant_depto_set + 1;

    $sql2 = "SELECT * FROM prestaciones_pacientes where documento = $documento and fecha_prestacion between '$desde' and '$hasta' ";
$result3 = $db->Execute($sql2);
if (!$result3) die("fallo".$db->ErrorMsg());
  while (!$result3->EOF) {
 $cod_prestacion=$result3->fields["cod_prestacion"];
 $cod_set= $cod_set." ".$cod_prestacion." ";

 $result3->MoveNext();
	}


 $doc_set = $doc_set." (".$documento." - ".$denominacion." / ".$cod_set."), ";
 $cod_set = "";
 $nro_factura=$result1->fields["nro_factura"];
   $sql2 = "SELECT * FROM `tr_ventas_detalle` where nro_factura = $nro_factura ";
$result2 = $db->Execute($sql2);
if (!$result2) die("fallo".$db->ErrorMsg());
  while (!$result2->EOF) {
 $descripcion=$result2->fields["descripcion"];
 $cod_mercaderia=$result2->fields["cod_mercaderia"];
 $total=$result2->fields["total"];

 $sql21 = "SELECT * FROM `monodrogas` where cod_barra = $cod_mercaderia";
$result21 = $db->Execute($sql21);
 $nombre_comercial=$result21->fields["nombre_comercial"];


 $des_set = $des_set." (".$nombre_comercial." $".$total."), ";
     $result2->MoveNext();
	}


     $result1->MoveNext();
	}
$documento = "";

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
  $sql1 = "SELECT * FROM `tr_ventas_encabezado` where $consulta GROUP BY documento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 $documento=$result1->fields["documento"];
  $denominacion=$result1->fields["denominacion"];
 $cant_depto_oct = $cant_depto_oct + 1;


    $sql2 = "SELECT * FROM prestaciones_pacientes where documento = $documento and fecha_prestacion between '$desde' and '$hasta' ";
$result3 = $db->Execute($sql2);
if (!$result3) die("fallo".$db->ErrorMsg());
  while (!$result3->EOF) {
 $cod_prestacion=$result3->fields["cod_prestacion"];
 $cod_oct= $cod_oct." ".$cod_prestacion." ";

 $result3->MoveNext();
	}


 $doc_oct = $doc_oct." (".$documento." - ".$denominacion." / ".$cod_oct."), ";
 $cod_oct = "";
 $nro_factura=$result1->fields["nro_factura"];
   $sql2 = "SELECT * FROM `tr_ventas_detalle` where nro_factura = $nro_factura ";
$result2 = $db->Execute($sql2);
if (!$result2) die("fallo".$db->ErrorMsg());
  while (!$result2->EOF) {
 $descripcion=$result2->fields["descripcion"];
 $cod_mercaderia=$result2->fields["cod_mercaderia"];
 $total=$result2->fields["total"];


 $sql21 = "SELECT * FROM `monodrogas` where cod_barra = $cod_mercaderia";
$result21 = $db->Execute($sql21);
 $nombre_comercial=$result21->fields["nombre_comercial"];


 $des_oct = $des_oct." (".$nombre_comercial." $".$total."), ";
     $result2->MoveNext();
	}


     $result1->MoveNext();
	}
$documento = "";

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
 $sql1 = "SELECT * FROM `tr_ventas_encabezado` where $consulta GROUP BY documento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 $documento=$result1->fields["documento"];
  $denominacion=$result1->fields["denominacion"];

    $sql2 = "SELECT * FROM prestaciones_pacientes where documento = $documento and fecha_prestacion between '$desde' and '$hasta' ";
$result3 = $db->Execute($sql2);
if (!$result3) die("fallo".$db->ErrorMsg());
  while (!$result3->EOF) {
 $cod_prestacion=$result3->fields["cod_prestacion"];
 $cod_nov= $cod_nov." ".$cod_prestacion." ";

 $result3->MoveNext();
	}


 $doc_nov = $doc_nov." (".$documento." - ".$denominacion." / ".$cod_nov."), ";
   $cod_nov = "";


$cant_depto_nov = $cant_depto_nov + 1;
$nro_factura=$result1->fields["nro_factura"];
   $sql2 = "SELECT * FROM `tr_ventas_detalle` where nro_factura = $nro_factura ";
$result2 = $db->Execute($sql2);
if (!$result2) die("fallo".$db->ErrorMsg());
  while (!$result2->EOF) {
 $descripcion=$result2->fields["descripcion"];
 $cod_mercaderia=$result2->fields["cod_mercaderia"];
 $total=$result2->fields["total"];


 $sql21 = "SELECT * FROM `monodrogas` where cod_barra = $cod_mercaderia";
$result21 = $db->Execute($sql21);
 $nombre_comercial=$result21->fields["nombre_comercial"];


 $des_nov = $des_nov." (".$nombre_comercial." $".$total."), ";



     $result2->MoveNext();
	}


     $result1->MoveNext();
	}
$documento = "";


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
 $sql1 = "SELECT * FROM `tr_ventas_encabezado` where $consulta GROUP BY documento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 $documento=$result1->fields["documento"];
  $denominacion=$result1->fields["denominacion"];
$cant_depto_dic = $cant_depto_dic + 1;

    $sql2 = "SELECT * FROM prestaciones_pacientes where documento = $documento and fecha_prestacion between '$desde' and '$hasta' ";
$result3 = $db->Execute($sql2);
if (!$result3) die("fallo".$db->ErrorMsg());
  while (!$result3->EOF) {
 $cod_prestacion=$result3->fields["cod_prestacion"];
 $cod_dic= $cod_dic." ".$cod_prestacion." ";

 $result3->MoveNext();
	}


 $doc_dic = $doc_dic." (".$documento." - ".$denominacion." / ".$cod_dic."), ";
 $cod_dic = "";

 $nro_factura=$result1->fields["nro_factura"];
   $sql2 = "SELECT * FROM `tr_ventas_detalle` where nro_factura = $nro_factura ";
$result2 = $db->Execute($sql2);
if (!$result2) die("fallo".$db->ErrorMsg());
  while (!$result2->EOF) {
 $descripcion=$result2->fields["descripcion"];
 $cod_mercaderia=$result2->fields["cod_mercaderia"];

 $sql21 = "SELECT * FROM `monodrogas` where cod_barra = $cod_mercaderia";
$result21 = $db->Execute($sql21);
 $nombre_comercial=$result21->fields["nombre_comercial"];


 $des_dic = $des_dic." (".$nombre_comercial." $".$total."), ";
     $result2->MoveNext();
	}


     $result1->MoveNext();
	}
$documento = "";

$desde1 = $anio."-01-01";
$hasta1 = $anio."-12-31";
	$consulta = "departamento = '$zonas' and fecha between '$desde1' and '$hasta1' and cod_movimiento = 1 and cod_agrupado = '$cod_agrupado'";
 $sql1 = "SELECT * FROM `tr_ventas_encabezado` where $consulta group by documento";
$result1 = $db->Execute($sql1);

if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
	  
	  $total_anual=$total_anual + 1;

   $result1->MoveNext();
	}

 $total_anual;

$total = $total_neto_ene + $total_neto_feb + $total_neto_mar + $total_neto_abr + $total_neto_may + $total_neto_jun +$total_neto_jul + $total_neto_ago + $total_neto_set + $total_neto_oct + $total_neto_nov + $total_neto_dic;

$total_cantidad = $cant_depto_ene_ent + $cant_depto_feb_ent + $cant_depto_mar_ent + $cant_depto_abr_ent + $cant_depto_may_ent + $cant_depto_jun_ent + $cant_depto_jul_ent + $cant_depto_ago_ent + $cant_depto_set_ent + $cant_depto_oct_ent + $cant_depto_nov_ent + $cant_depto_dic_ent;
?>



<table width="821" border="1" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="5" bgcolor="#EDEDED"><span class="Estilo4">DEPARTAMENTO: <?php echo $zonas;?></span></td>
  </tr>
  <tr>
    <td colspan="5" bgcolor="#EDEDED"><div align="left" class="Estilo4">TUMOR: <?php echo $nombre_agrupado;?></div>      <div align="center" class="Estilo4"></div></td>
  </tr>
  <tr>
    <td width="67" bgcolor="#B8B8B8"><div align="center" class="Estilo4"><span class="Estilo2">MES</span></div></td>
    <td bgcolor="#B8B8B8"><div align="center" class="Estilo5"> POR MES </div></td>
    <td bgcolor="#B8B8B8">PACIENTES</td>
    <td width="374" bgcolor="#B8B8B8">MONODROGAS</td>
    <td width="68" bgcolor="#B8B8B8"><div align="center" class="Estilo5">IMPORTE</div></td>
  </tr>
 <tr>
   <td><span class="Estilo10">ENERO</span></td>
    <td width="86"><div align="center" class="Estilo10"><?php echo $cant_depto_ene;?></div></td>
    <td width="214"><span class="Estilo10"><?php echo $doc_ene;?></span></td>
    <td><span class="Estilo10"><?php echo $des_ene;?></span></td>
    <td><div align="right" class="Estilo10"><?php echo $total_neto_ene;?></div></td>
 </tr>
 <tr>
   <td><span class="Estilo10">FEBRERO</span></td>
   <td><div align="center" class="Estilo10"><?php echo $cant_depto_feb;?></div></td>
   <td><span class="Estilo10"><?php echo $doc_feb;?></span></td>
   <td><span class="Estilo10"><?php echo $des_feb;?></span></td>
   <td><div align="right" class="Estilo10"><?php echo $total_neto_feb;?></div></td>
 </tr>
 <tr>
   <td><span class="Estilo10">MARZO</span></td>
   <td><div align="center" class="Estilo10"><?php echo $cant_depto_mar;?></div></td>
   <td><span class="Estilo10"><?php echo $doc_mar;?></span></td>
   <td><span class="Estilo10"><?php echo $des_mar;?></span></td>
   <td><div align="right" class="Estilo10"><?php echo $total_neto_mar;?></div></td>
 </tr>
 <tr>
   <td><span class="Estilo10">ABRIL</span></td>
   <td><div align="center" class="Estilo10"><?php echo $cant_depto_abr;?></div></td>
   <td><span class="Estilo10"><?php echo $doc_abr;?></span></td>
   <td><span class="Estilo10"><?php echo $des_abr;?></span></td>
   <td><div align="right" class="Estilo10"><?php echo $total_neto_abr;?></div></td>
 </tr>
 <tr>
   <td><span class="Estilo10">MAYO</span></td>
   <td><div align="center" class="Estilo10"><?php echo $cant_depto_may;?></div></td>
   <td><span class="Estilo10"><?php echo $doc_may;?></span></td>
   <td><span class="Estilo10"><?php echo $des_may;?></span></td>
   <td><div align="right" class="Estilo10"><?php echo $total_neto_may;?></div></td>
 </tr>
 <tr>
   <td><span class="Estilo10">JUNIO</span></td>
   <td><div align="center" class="Estilo10"><?php echo $cant_depto_jun;?></div></td>
   <td><span class="Estilo10"><?php echo $doc_jun;?></span></td>
   <td><span class="Estilo10"><?php echo $des_jun;?></span></td>
   <td><div align="right" class="Estilo10"><?php echo $total_neto_jun;?></div></td>
 </tr>
 <tr>
   <td><span class="Estilo10">JULIO</span></td>
   <td><div align="center" class="Estilo10"><?php echo $cant_depto_jul;?></div></td>
   <td><span class="Estilo10"><?php echo $doc_jul;?></span></td>
   <td><span class="Estilo10"><?php echo $des_jul;?></span></td>
   <td><div align="right" class="Estilo10"><?php echo $total_neto_jul;?></div></td>
 </tr>
 <tr>
   <td><span class="Estilo10">AGOSTO</span></td>
   <td><div align="center" class="Estilo10"><?php echo $cant_depto_ago;?></div></td>
   <td><span class="Estilo10"><?php echo $doc_ago;?></span></td>
   <td><span class="Estilo10"><?php echo $des_ago;?></span></td>
   <td><div align="right" class="Estilo10"><?php echo $total_neto_ago;?></div></td>
 </tr>
 <tr>
   <td><span class="Estilo10">SETIEMBRE</span></td>
   <td><div align="center" class="Estilo10"><?php echo $cant_depto_set;?></div></td>
   <td><span class="Estilo10"><?php echo $doc_set;?></span></td>
   <td><span class="Estilo10"><?php echo $des_set;?></span></td>
   <td><div align="right" class="Estilo10"><?php echo $total_neto_set;?></div></td>
 </tr>
 <tr>
   <td><span class="Estilo10">OCTUBRE</span></td>
   <td><div align="center" class="Estilo10"><?php echo $cant_depto_oct;?></div></td>
   <td><span class="Estilo10"><?php echo $doc_oct;?></span></td>
   <td><span class="Estilo10"><?php echo $des_oct;?></span></td>
   <td><div align="right" class="Estilo10"><?php echo $total_neto_oct;?></div></td>
 </tr>
 <tr>
   <td><span class="Estilo10">NOVIEMBRE</span></td>
   <td><div align="center" class="Estilo10"><?php echo $cant_depto_nov;?></div></td>
   <td><span class="Estilo10"><?php echo $doc_nov;?></span></td>
   <td><span class="Estilo10"><?php echo $des_nov;?></span></td>
   <td><div align="right" class="Estilo10"><?php echo $total_neto_nov;?></div></td>
 </tr>
 <tr>
   <td><span class="Estilo10">DICIEMBRE</span></td>
   <td><div align="center" class="Estilo10"><?php echo $cant_depto_dic;?></div></td>
   <td><span class="Estilo10"><?php echo $doc_dic;?></span></td>
   <td><span class="Estilo10"><?php echo $des_dic;?></span></td>
   <td><div align="right" class="Estilo10"><?php echo $total_neto_dic;?></div></td>
 </tr>
 <tr>
   <td bgcolor="#B8B8B8"><span class="Estilo10">TOTAL</span></td>
   <td colspan="3" bgcolor="#B8B8B8"><div align="center"><span class="Estilo4"><span class="Estilo8"><span class="Estilo11"></span></span></span></div></td>
   <td bgcolor="#B8B8B8"><div align="right" class="Estilo10"><?php echo $total;?></div></td>
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
