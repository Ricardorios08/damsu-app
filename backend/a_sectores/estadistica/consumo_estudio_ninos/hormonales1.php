<?php



 $sql = "SELECT COUNT(cod_droga) as tot FROM `tr_ventas_detalle` WHERE `fecha` between '$desde' and '$hasta'    and tratamiento = 'Hormonales'";
$result1 = $db->Execute($sql);
$tot=$result1->fields["tot"];
$total_hormonales = $total_hormonales + $tot;
$tot = "";


	
 $sql = "SELECT COUNT(cod_droga) as tot FROM `tr_ventas_detalle` WHERE `fecha` between '$desde' and '$hasta'    and tratamiento = 'Biologicos'";
$result1 = $db->Execute($sql);
$tot=$result1->fields["tot"];
$total_biologicos = $total_biologicos + $tot;
 $tot = "";

 
 $sql = "SELECT COUNT(cod_droga) as tot FROM `tr_ventas_detalle` WHERE `fecha` between '$desde' and '$hasta'    and tratamiento = 'Quimioterapia'";
$result1 = $db->Execute($sql);
$tot=$result1->fields["tot"];
$total_quimioterapia = $total_quimioterapia + $tot;
 
 $tot = "";
	?>