<?php




$sql="select * from drogas where cod_droga_nuevo like 'Hormonales' ";
$result = $db->Execute($sql);


  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

	
$cod_droga=strtoupper($result->fields["cod_droga"]);

 $sql = "SELECT COUNT(cod_droga) as tot FROM `tr_ventas_detalle` WHERE `fecha` between '$desde' and '$hasta'    and cod_droga = '$cod_droga'";
$result1 = $db->Execute($sql);
$tot=$result1->fields["tot"];
$total_hormonales = $total_hormonales + $tot;
$result->MoveNext();
	}

$tot = "";
	$sql="select * from drogas where cod_droga_nuevo like 'Biologicos' ";
$result = $db->Execute($sql);


  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

	
$cod_droga=strtoupper($result->fields["cod_droga"]);

 $sql = "SELECT COUNT(cod_droga) as tot FROM `tr_ventas_detalle` WHERE `fecha` between '$desde' and '$hasta'    and cod_droga = '$cod_droga'";
$result1 = $db->Execute($sql);
$tot=$result1->fields["tot"];
$total_biologicos = $total_biologicos + $tot;
$result->MoveNext();
	}

$tot = "";
	$sql="select * from drogas where cod_droga_nuevo like 'Quimioterapia' ";
$result = $db->Execute($sql);


  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

	
$cod_droga=strtoupper($result->fields["cod_droga"]);

 $sql = "SELECT COUNT(cod_droga) as tot FROM `tr_ventas_detalle` WHERE `fecha` between '$desde' and '$hasta'    and cod_droga = '$cod_droga'";
$result1 = $db->Execute($sql);
$tot=$result1->fields["tot"];
$total_quimioterapia = $total_quimioterapia + $tot;
$result->MoveNext();
	}

	?>