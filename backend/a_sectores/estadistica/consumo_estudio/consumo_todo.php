<style type="text/css">
<!--
.Estilo2 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo5 {font-size: 14px}
.Estilo7 {font-family: "Trebuchet MS"}
.Estilo8 {font-size: 24px}
.Estilo12 {color: #FFFFFF}
.Estilo13 {font-family: "Trebuchet MS"; font-size: 12px; color: #FFFFFF; }
.Estilo14 {font-family: "Trebuchet MS"; font-size: 14px; }
.Estilo16 {font-family: "Trebuchet MS"; font-weight: bold; }
.Estilo19 {font-size: 14}
-->
</style>

<?php


include ("../../../conexiones/config_pro.php");

$anio = $_REQUEST['anio'];

?>


 <table width="1079" border="1" cellspacing="0">
  <tr bgcolor="#CCCCCC">
    <td colspan="14"><div align="center" class="Estilo2 Estilo8">ESTUDIOS REALIZADOS <?php echo $anio;?> </div></td>
  </tr>
  <tr bgcolor="#0000FF">
   <td width="50"><div align="center" class="Estilo13"><strong>ENE</strong></div>    </td>
    <td width="373"><div align="center" class="Estilo12 Estilo2"><strong><span class="Estilo5"><span class="Estilo7"><span class="Estilo2"><?PHP echo $anio;?></span></span></span></strong></div></td>
    <td width="50"><div align="center" class="Estilo13"><strong>ENE</strong></div>    </td>
    <td width="50"><div align="center" class="Estilo13"><strong>FEB</strong></div></td>
    <td width="50"><div align="center" class="Estilo12"><strong><span class="Estilo2">MAR</span></strong></div></td>
   <td width="50"><div align="center"><span class="Estilo12"><strong><span class="Estilo2">ABR</span></strong></span></div></td>
    <td width="50"><div align="center"><span class="Estilo12"><strong><span class="Estilo2">MAY</span></strong></span></div></td>
    <td width="50"><div align="center"><span class="Estilo12"><strong><span class="Estilo2">JUN</span></strong></span></div></td>
    <td width="50"><div align="center"><span class="Estilo12"><strong><span class="Estilo2">JUL</span></strong></span></div></td>
    <td width="50"><div align="center"><span class="Estilo12"><strong><span class="Estilo2">AGO</span></strong></span></div></td>
    <td width="50"><div align="center"><span class="Estilo12"><strong><span class="Estilo2">SET</span></strong></span></div></td>
    <td width="50"><div align="center"><span class="Estilo12"><strong><span class="Estilo2">OCT</span></strong></span></div></td>
    <td width="50"><div align="center"><span class="Estilo12"><strong><span class="Estilo2">NOV</span></strong></span></div></td>
    <td width="50"><div align="center"><span class="Estilo12"><strong><span class="Estilo2">DIC</span></strong></span></div></td>
  <td width="50"><div align="center"><span class="Estilo12"><strong><span class="Estilo2">TOTAL</span></strong></span></div></td>
  </tr>


<?php 





//header("Content-type: application/vnd.ms-excel");
//header("Content-Disposition: attachment; filename=$anio");

$desde1 = $anio."-01-01";
$hasta1 = $anio."-12-31";


$sql="select * from prestaciones_pacientes where fecha_prestacion between '$desde1' and '$hasta1' group by cod_prestacion ";
	$result = $db->Execute($sql);


  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {


$cod_prestacion=strtoupper($result->fields["cod_prestacion"]);

$mes = "01";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
include ("mes.php");
$ene = $cant;
$cant = "";

$mes = "02";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
include ("mes.php");
$feb = $cant;
$cant = "";

$mes = "03";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
include ("mes.php");
$mar = $cant;
$cant = "";

$mes = "04";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
include ("mes.php");
$abr = $cant;
$cant = "";

$mes = "05";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
include ("mes.php");
$may = $cant;
$cant = "";

$mes = "06";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
include ("mes.php");
$jun = $cant;
$cant = "";

///////////////////


$mes = "07";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
include ("mes.php");
$jul = $cant;
$cant = "";

$mes = "08";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
include ("mes.php");
$ago = $cant;
$cant = "";

$mes = "09";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
include ("mes.php");
$set = $cant;
$cant = "";

$mes = "10";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
include ("mes.php");
$oct = $cant;
$cant = "";

$mes = "11";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
include ("mes.php");
$nov = $cant;
$cant = "";

$mes = "12";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
include ("mes.php");
$dic = $cant;
$cant = "";



$sql3 = "SELECT * FROM `prestaciones` where cod_prestacion = '$cod_prestacion'";
$result3 = $db->Execute($sql3);

$descripcion=strtoupper($result3->fields["descripcion"]);
$caracteristica=strtoupper($result3->fields["caracteristica"]);


$precio=strtoupper($result->fields["precio"]);
$cupo_mensual=strtoupper($result->fields["nombre_reducido_fuente"]);
$cant_realizado=strtoupper($result->fields["cant_realizado"]);
$observaciones=strtoupper($result->fields["observaciones"]);

$cod_operacion=strtoupper($result->fields["cod_operacion"]);
$fecha_prestacion=strtoupper($result->fields["fecha_prestacion"]);
$documento=strtoupper($result->fields["documento"]);

$total = $ene + $feb + $mar + $abr + $jun + $jul + $ago + $set + $oct + $nov + $dic;

?>
  <tr>
   <td><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $cod_prestacion;?> </span></div></td>
    <td bgcolor="#9BBCFF"><div align="right" class="Estilo5">
      <div align="left"><span class="Estilo7"> <?PHP echo $descripcion;?></span></div>
    </div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $ene;?> </span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7">
      <?PHP echo $feb;?>
    </span></div></td>
    <td><div align="center" class="Estilo5">
      <div align="center"><span class="Estilo7"><?PHP echo $mar;?></span></div>
    </div></td>
   <td><div align="center"><span class="Estilo7"><?PHP echo $abr;?></span></div></td>
    <td><div align="center"><span class="Estilo7"><?PHP echo $may;?></span></div></td>
    <td><div align="center"><span class="Estilo7"><?PHP echo $jun;?></span></div></td>
    <td><div align="center"><span class="Estilo7"><?PHP echo $jul;?></span></div></td>
    <td><div align="center"><span class="Estilo7"><?PHP echo $ago;?></span></div></td>
    <td><div align="center"><span class="Estilo7"><?PHP echo $set;?></span></div></td>
    <td><div align="center"><span class="Estilo7"><?PHP echo $oct;?></span></div></td>
    <td><div align="center"><span class="Estilo7"><?PHP echo $nov;?></span></div></td>
    <td><div align="center"><span class="Estilo7"><?PHP echo $dic;?></span></div></td>
  <td><div align="center"><span class="Estilo7"><?PHP echo $total;?></span></div></td>
  </tr>

<?php


$result->MoveNext();
	}







?>
</table>



