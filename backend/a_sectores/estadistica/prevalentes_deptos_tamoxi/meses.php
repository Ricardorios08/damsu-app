<?php

$mes = 01;
$desde= "20".$anio."-".$mes."-01";
$hasta= "20".$anio."-".$mes."-31";
 $consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_droga = 183 ";
  $sql1 = "SELECT count(departamento) as cant_depto, sum(total) as total_neto, departamento FROM `tr_ventas_detalle_depto` where $consulta order by departamento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  $cant_depto_ene_ent=$result1->fields["cant_depto"];
  $total_neto_ene=$result1->fields["total_neto"];
     $result1->MoveNext();
	}


 $consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_droga = 183 ";
  $sql1 = "SELECT * FROM `tr_ventas_detalle_depto` where $consulta GROUP BY documento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 $documento=$result1->fields["documento"];
 $denominacion=$result1->fields["denominacion"];


 $cant_depto_ene = $cant_depto_ene + 1;

 $nro_factura=$result1->fields["nro_factura"];
 echo "ene".$cant_depto_ene;
   
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
   
  


     $result1->MoveNext();
	}





$documento = "";

$mes = 02;
$desde= "20".$anio."-".$mes."-01";
$hasta= "20".$anio."-".$mes."-31";
 $consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_droga = 183 ";
$sql1 = "SELECT count(departamento) as cant_depto, sum(total) as total_neto, departamento FROM `tr_ventas_detalle_depto` where $consulta order by departamento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 $cant_depto_feb_ent=$result1->fields["cant_depto"];
 $total_neto_feb=$result1->fields["total_neto"];
     $result1->MoveNext();
	}




 $consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_droga = 183 ";
 $sql1 = "SELECT * FROM `tr_ventas_detalle_depto` where $consulta GROUP BY documento";
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
  


     $result1->MoveNext();
	}
$documento = "";



$mes = '03';
$desde= "20".$anio."-".$mes."-01";
$hasta= "20".$anio."-".$mes."-31";
 $consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_droga = 183 ";
$sql1 = "SELECT count(departamento) as cant_depto, sum(total) as total_neto, departamento FROM `tr_ventas_detalle_depto` where $consulta order by departamento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 $cant_depto_mar_ent=$result1->fields["cant_depto"];
 $total_neto_mar=$result1->fields["total_neto"];
     $result1->MoveNext();
	}



 $consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_droga = 183 ";
 $sql1 = "SELECT * FROM `tr_ventas_detalle_depto` where $consulta GROUP BY documento";
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


     $result1->MoveNext();
	}
$documento = "";


$mes = 04;
$desde= "20".$anio."-".$mes."-01";
$hasta= "20".$anio."-".$mes."-31";
 $consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_droga = 183 ";
$sql1 = "SELECT count(departamento) as cant_depto, sum(total) as total_neto, departamento FROM `tr_ventas_detalle_depto` where $consulta order by departamento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 $cant_depto_abr_ent=$result1->fields["cant_depto"];
 $total_neto_abr=$result1->fields["total_neto"];
     $result1->MoveNext();
	}

 
 $consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_droga = 183 ";
 $sql1 = "SELECT * FROM `tr_ventas_detalle_depto` where $consulta GROUP BY documento";
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
  


     $result1->MoveNext();
	}
$documento = "";
$denominacion = "";


$mes = 05;
$desde= "20".$anio."-".$mes."-01";
$hasta= "20".$anio."-".$mes."-31";
 $consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_droga = 183 ";
$sql1 = "SELECT count(departamento) as cant_depto, sum(total) as total_neto, departamento FROM `tr_ventas_detalle_depto` where $consulta order by departamento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 $cant_depto_may_ent=$result1->fields["cant_depto"];
 $total_neto_may=$result1->fields["total_neto"];
     $result1->MoveNext();
	}

	
   
 $consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_droga = 183 ";
  $sql1 = "SELECT * FROM `tr_ventas_detalle_depto` where $consulta GROUP BY documento";
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
  

     $result1->MoveNext();
	}
$documento = "";
$cod_prestacion = "";


$mes = 06;
$desde= "20".$anio."-".$mes."-01";
$hasta= "20".$anio."-".$mes."-31";
 $consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_droga = 183 ";
$sql1 = "SELECT count(departamento) as cant_depto, sum(total) as total_neto, departamento FROM `tr_ventas_detalle_depto` where $consulta order by departamento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 $cant_depto_jun_ent=$result1->fields["cant_depto"];
 $total_neto_jun=$result1->fields["total_neto"];
     $result1->MoveNext();
	}

 $consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_droga = 183 ";
 $sql1 = "SELECT * FROM `tr_ventas_detalle_depto` where $consulta GROUP BY documento";
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
   

     $result1->MoveNext();
	}
$documento = "";



$mes = 07;
$desde= "20".$anio."-".$mes."-01";
$hasta= "20".$anio."-".$mes."-31";
 $consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_droga = 183 ";
$sql1 = "SELECT count(departamento) as cant_depto, sum(total) as total_neto, departamento FROM `tr_ventas_detalle_depto` where $consulta order by departamento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 $cant_depto_jul_ent=$result1->fields["cant_depto"];
 $total_neto_jul=$result1->fields["total_neto"];
     $result1->MoveNext();
	}



 $consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_droga = 183 ";
 $sql1 = "SELECT * FROM `tr_ventas_detalle_depto` where $consulta GROUP BY documento";
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
 


     $result1->MoveNext();
	}
$documento = "";

$mes = '08';
$desde= "20".$anio."-".$mes."-01";
$hasta= "20".$anio."-".$mes."-31";
 $consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_droga = 183 ";
$sql1 = "SELECT count(departamento) as cant_depto, sum(total) as total_neto, departamento FROM `tr_ventas_detalle_depto` where $consulta order by departamento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 $cant_depto_ago_ent=$result1->fields["cant_depto"];
 $total_neto_ago=$result1->fields["total_neto"];
     $result1->MoveNext();
	}


 $consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_droga = 183 ";
  $sql1 = "SELECT * FROM `tr_ventas_detalle_depto` where $consulta GROUP BY documento";
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
  


     $result1->MoveNext();
	}
$documento = "";


$mes = '09';
$desde= "20".$anio."-".$mes."-01";
$hasta= "20".$anio."-".$mes."-31";
 $consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_droga = 183 ";
$sql1 = "SELECT count(departamento) as cant_depto, sum(total) as total_neto, departamento FROM `tr_ventas_detalle_depto` where $consulta order by departamento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 $cant_depto_set_ent=$result1->fields["cant_depto"];
 $total_neto_set=$result1->fields["total_neto"];
     $result1->MoveNext();
	}

 $consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_droga = 183 ";
 $sql1 = "SELECT * FROM `tr_ventas_detalle_depto` where $consulta GROUP BY documento";
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
  


     $result1->MoveNext();
	}
$documento = "";

$mes = 10;
$desde= "20".$anio."-".$mes."-01";
$hasta= "20".$anio."-".$mes."-31";
 $consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_droga = 183 ";
$sql1 = "SELECT count(departamento) as cant_depto, sum(total) as total_neto, departamento FROM `tr_ventas_detalle_depto` where $consulta order by departamento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 $cant_depto_oct_ent=$result1->fields["cant_depto"];
 $total_neto_oct=$result1->fields["total_neto"];
     $result1->MoveNext();
	}

 $consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_droga = 183 ";
  $sql1 = "SELECT * FROM `tr_ventas_detalle_depto` where $consulta GROUP BY documento";
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
 

     $result1->MoveNext();
	}
$documento = "";

	$mes = 11;
$desde= "20".$anio."-".$mes."-01";
$hasta= "20".$anio."-".$mes."-31";
 $consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_droga = 183 ";
$sql1 = "SELECT count(departamento) as cant_depto, sum(total) as total_neto, departamento FROM `tr_ventas_detalle_depto` where $consulta order by departamento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 $cant_depto_nov_ent=$result1->fields["cant_depto"];
 $total_neto_nov=$result1->fields["total_neto"];
     $result1->MoveNext();
	}

	
 $consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_droga = 183 ";
 $sql1 = "SELECT * FROM `tr_ventas_detalle_depto` where $consulta GROUP BY documento";
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
  


     $result1->MoveNext();
	}
$documento = "";


	$mes = 12;
$desde= "20".$anio."-".$mes."-01";
$hasta= "20".$anio."-".$mes."-31";
 $consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_droga = 183 ";
$sql1 = "SELECT count(departamento) as cant_depto, sum(total) as total_neto, departamento FROM `tr_ventas_detalle_depto` where $consulta order by departamento";
$result1 = $db->Execute($sql1);
if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
 $cant_depto_dic_ent=$result1->fields["cant_depto"];
 $total_neto_dic=$result1->fields["total_neto"];
     $result1->MoveNext();
	}


 $consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_droga = 183 ";
 $sql1 = "SELECT * FROM `tr_ventas_detalle_depto` where $consulta GROUP BY documento";
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
  


     $result1->MoveNext();
	}
$documento = "";

$desde1 = $anio."-01-01";
$hasta1 = $anio."-12-31";
 $consulta = "departamento = '$zonas' and fecha between '$desde' and '$hasta' and cod_droga = 183 ";
 $sql1 = "SELECT * FROM `tr_ventas_detalle_depto` where $consulta group by documento";
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