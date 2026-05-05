<?php 
$dia1 = date("d");
$mes1 = date("m");
$anio1 = date("Y");


SWITCH ($mes){
	case "01":{$mes22 = "ENERO";break;}
	case "02":{$mes22 = "FEBRERO";break;}
	case "03":{$mes22 = "MARZO";break;}
	case "04":{$mes22 = "ABRIL";break;}
	case "05":{$mes22 = "MAYO";break;}
	case "06":{$mes22 = "JUNIO";break;}
	case "07":{$mes22 = "JULIO";break;}
	case "08":{$mes22 = "AGOSTO";break;}
	case "09":{$mes22 = "SETIEMBRE";break;}
	case "10":{$mes22 = "OCTUBRE";break;}
	case "11":{$mes22 = "NOVIEMBRE";break;}
	case "12":{$mes22 = "DICIEMBRE";break;}
}

SWITCH ($mes1){
	case "01":{$mes222 = "ENERO";break;}
	case "02":{$mes222 = "FEBRERO";break;}
	case "03":{$mes222 = "MARZO";break;}
	case "04":{$mes222 = "ABRIL";break;}
	case "05":{$mes222 = "MAYO";break;}
	case "06":{$mes222 = "JUNIO";break;}
	case "07":{$mes222 = "JULIO";break;}
	case "08":{$mes222 = "AGOSTO";break;}
	case "09":{$mes222 = "SETIEMBRE";break;}
	case "10":{$mes222 = "OCTUBRE";break;}
	case "11":{$mes222 = "NOVIEMBRE";break;}
	case "12":{$mes222 = "DICIEMBRE";break;}
}


include ("../../../conexiones/config_usu.php");

$sql2="select COUNT(nro_receta) as total from receta where fecha between '$desde' and '$hasta' order by hora_ingreso desc";
$result2 = $db->Execute($sql2);
$total =strtoupper($result2->fields["total"]);

 $sql2="select COUNT(nro_receta) as total from receta where fecha between '$desde' and '$hasta' and hora_entrega = '00:00:00' order by hora_ingreso desc";
$result2 = $db->Execute($sql2);
$recibidas =strtoupper($result2->fields["total"]);

$sql2="select COUNT(nro_receta) as total from receta where fecha between '$desde' and '$hasta' and hora_entrega != '00:00:00' order by hora_ingreso desc";
$result2 = $db->Execute($sql2);
$entregadas=strtoupper($result2->fields["total"]);

 



?>
<style type="text/css">
<!--
.Estilo76 {font-family: "Trebuchet MS"}
.Estilo78 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo80 {font-family: "Trebuchet MS"; font-size: 14px; font-weight: bold; }
.Estilo83 {
	color: #0000FF;
	font-weight: bold;
	font-family: "Trebuchet MS";
	font-style: italic;
}
.Estilo84 {font-size: 14px}
-->
</style>

<body onUnload="window.opener.openedImprimir=0;" onLoad="window.print(); window.close(); cerrar()"> 


<table width="800" border="0">
  <tr>
    <td height="54"><div align="center"><strong>PROGRAMA ONCOLOGICO PROVINCIAL </strong></div></td>
  </tr>
  <tr>
    <td><div align="right" class="Estilo78">Mendoza a los <?php echo $dia1;?> dias de <?php echo $mes222;?> de <?php echo $anio1;?></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center" class="Estilo76">TUER</div></td>
  </tr>
  <tr>
    <td height="21">&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center"><span class="Estilo80">Cantidad de Recetas: <?php echo $total;?>  </span></div></td>
  </tr>
   <tr>
    <td><div align="center"><span class="Estilo80">Cantidad Sin entregar <?php echo $recibidas;?>  </span></div></td>
  </tr>
   <tr>
    <td><div align="center"><span class="Estilo80">Cantidad Entregadas: <?php echo $entregadas;?>  </span></div></td>
  </tr>
 

  <tr>
    <td><span class="Estilo83">PERIODO: <span class="Estilo84"><?php echo $mes22;?> - 20<?php echo $anio;?></span></span></td>
  </tr>
</table>


<?php



 

function RestarHoras($horaini,$horafin)
{
	$horai=substr($horaini,0,2);
	$mini=substr($horaini,3,2);
	$segi=substr($horaini,6,2);

	$horaf=substr($horafin,0,2);
	$minf=substr($horafin,3,2);
	$segf=substr($horafin,6,2);

	$ini=((($horai*60)*60)+($mini*60)+$segi);
	$fin=((($horaf*60)*60)+($minf*60)+$segf);

	$dif=$fin-$ini;

	$difh=floor($dif/3600);
	$difm=floor(($dif-($difh*3600))/60);
	$difs=$dif-($difm*60)-($difh*3600);
	return date("H:i:s",mktime($difh,$difm,$difs));
}


   



$sql1="select * from receta where fecha between '$desde' and '$hasta' and hora_facturacion != '00:00:00' order by fecha, hora_entrega desc";
$result1 = $db->Execute($sql1);


?>
<table width="800" height="106" border="1" cellspacing="0">
  <!--DWLayoutTable-->
  
  <tr bordercolor="#FFFFFF" bgcolor="#C9C9C9">
    <td height="22" colspan="10" valign="top"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><strong>ENCUESTA PERIODO </font><font size="2" face="Trebuchet MS"><?php echo $mes22;?></font><strong><font color="#000000" size="2" face="Trebuchet MS"> - 20</font><font size="2" face="Trebuchet MS"><?php echo $anio;?></font><font color="#000000" size="2" face="Trebuchet MS"> </font></strong></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <td bgcolor="#C9C9C9"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td height="23" bgcolor="#C9C9C9"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td bgcolor="#C9C9C9"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td bgcolor="#C9C9C9"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td bgcolor="#C9C9C9"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="2" bgcolor="#C9C9C9"><div align="center"><font size="2" face="Trebuchet MS">Entrega</font></div></td>
    <td bgcolor="#C9C9C9"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <td width="43" bgcolor="#C9C9C9"><font size="2" face="Trebuchet MS">Receta</font></td>
    <td width="72" height="23" bgcolor="#C9C9C9"><div align="center"><font size="2" face="Trebuchet MS">Fecha</font></div></td>
    <td width="266" bgcolor="#C9C9C9"><div align="center"><font size="2" face="Trebuchet MS">Paciente</font></div></td>
    <td width="153" bgcolor="#C9C9C9"><div align="center"><font size="2" face="Trebuchet MS">Ingreso</font></div></td>
    <td width="78" bgcolor="#C9C9C9"><div align="center"><font size="2" face="Trebuchet MS">Facturado</font></div></td>
    <td width="75" bgcolor="#C9C9C9"><div align="center"><font size="2" face="Trebuchet MS">Fecha</font></div></td>
    <td width="75" bgcolor="#C9C9C9"><div align="center"><font size="2" face="Trebuchet MS">Entrega</font></div></td>


  <td width="83" bgcolor="#C9C9C9"><div align="center"> <font size="2" face="Trebuchet MS">Tiempo</font></div></td>
   <td width="20" bgcolor="#C9C9C9"><div align="center"> <font size="2" face="Trebuchet MS">Grupo</font></div></td>
  </tr>
  <?php 
  
   if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  


$nro_receta=strtoupper($result1->fields["nro_receta"]);


 $sql3="select * from receta_detalle where nro_receta = $nro_receta";
$result3 = $db->Execute($sql3);
   if (!$result3) die("fallo".$db->ErrorMsg());
  while (!$result3->EOF) {

$cod_droga=strtoupper($result3->fields["cod_droga"]);

  $sql4="select * from monodrogas where cod_droga = $cod_droga";
$result4 = $db->Execute($sql4);

 $grupo=strtoupper($result4->fields["grupo"]);

if ($grupo == 3){	$monoclonal == "SI";}


 $result3->MoveNext();
	}


$nombre_paciente=strtoupper($result1->fields["nombre_paciente"]);


$fecha=$result1->fields["fecha"];
$fecha_entrega=$result1->fields["fecha_entrega"];

$dia = substr($fecha, 8,2);
$mes= substr($fecha, 5,2);
$anio = substr($fecha, 0,4);

$fecha = $dia."/".$mes."/".$anio;


$fecha_entrega=$result1->fields["fecha_entrega"];

$dia = substr($fecha_entrega, 8,2);
$mes= substr($fecha_entrega, 5,2);
$anio = substr($fecha_entrega, 0,4);

$fecha_entrega = $dia."/".$mes."/".$anio;


$hora_ingreso=strtoupper($result1->fields["hora_ingreso"]);

$hora_facturacion=strtoupper($result1->fields["hora_facturacion"]);
$hora_entrega=strtoupper($result1->fields["hora_entrega"]);


$tiempo = RestarHoras($hora_ingreso,$hora_entrega);



$suma_tiempo = $tiempo + $suma_tiempo;


?>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <td bgcolor="#E6E6E6"><div align="center"><font size="2" face="Trebuchet MS"><?php echo $nro_receta;?></font></div></td>
    <td height="36" bgcolor="#E6E6E6"><div align="center"><font size="2" face="Trebuchet MS"><?php echo $fecha;?></font></div></td>
    <td bgcolor="#E6E6E6"><div align="center"><font size="2" face="Trebuchet MS"><?php echo $nombre_paciente;?></font></div></td>
    <td bgcolor="#E6E6E6"><div align="center"><font size="2" face="Trebuchet MS"><?php echo $hora_ingreso;?></font></div></td>
    <td bgcolor="#E6E6E6"><div align="center"><font size="2" face="Trebuchet MS"><?php echo $hora_facturacion;?></font></div></td>
    <td bgcolor="#E6E6E6"><div align="center"><font size="2" face="Trebuchet MS"><?php echo $fecha_entrega;?></font></div></td>
    <td bgcolor="#E6E6E6"><div align="center"><font size="2" face="Trebuchet MS"><?php echo $hora_entrega;?></font></div></td>
    <td bgcolor="#E6E6E6"><div align="center"><font size="2" face="Trebuchet MS"><?php echo $tiempo;?></font></div></td>
	    <td bgcolor="#E6E6E6"><div align="center"><font size="2" face="Trebuchet MS"><?php echo $grupo;?></font></div></td>
  </tr>
  <?php
	
$monoclonal == "";
$result1->MoveNext();
	}

$suma_tiempo = date("H:i:s", $suma_tiempo );


?>

 <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <td bgcolor="#E6E6E6"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td height="36" bgcolor="#E6E6E6"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td bgcolor="#E6E6E6"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td bgcolor="#E6E6E6"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td bgcolor="#E6E6E6"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td bgcolor="#E6E6E6"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td bgcolor="#E6E6E6"><!--DWLayoutEmptyCell-->&nbsp;</td>
		<td bgcolor="#E6E6E6"><div align="center"><font size="2" face="Trebuchet MS"><?php echo $suma_tiempo;?></font></div></td>
	    <td bgcolor="#E6E6E6"><div align="center"></div></td>
  </tr>
</table>

