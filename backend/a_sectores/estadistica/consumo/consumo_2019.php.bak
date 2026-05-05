<style type="text/css">
<!--
.Estilo2 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo5 {font-size: 14px}
.Estilo6 {font-weight: bold; font-family: "Trebuchet MS";}
.Estilo7 {font-family: "Trebuchet MS"}
-->
</style>

<?php 
include ("../../../conexiones/config_pro.php");

$anio = "2018";

////////////////////////////////
$mes = "01";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
$sql = "SELECT *  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2 group by documento";
$result = $db->Execute($sql);
$ene_recetas = $result->RecordCount(); 
$sql = "SELECT count(nro_factura) as total, sum(neto) as neto  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2";
$result = $db->Execute($sql);
$ene_facturas=$result->fields["total"];
$ene_neto=$result->fields["neto"];


if ($ene_neto > 0){
$ene_consumo_receta = round($ene_neto / $ene_recetas,2);
$ene_consumo_entrega = round($ene_neto / $ene_facturas,2);
}

////////////////////////////////
$mes = "02";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
$sql = "SELECT *  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2 group by documento";
$result = $db->Execute($sql);
$feb_recetas = $result->RecordCount(); 
$sql = "SELECT count(nro_factura) as total, sum(neto) as neto  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2";
$result = $db->Execute($sql);
$feb_facturas=$result->fields["total"];
$feb_neto=$result->fields["neto"];


if ($feb_neto > 0){
$feb_consumo_receta = round($feb_neto / $feb_recetas,2);
$feb_consumo_entrega = round($feb_neto / $feb_facturas,2);
}
 ////////////////////////////////////

 $mes = "03";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
$sql = "SELECT *  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2 group by documento";
$result = $db->Execute($sql);
$mar_recetas = $result->RecordCount(); 
$sql = "SELECT count(nro_factura) as total, sum(neto) as neto  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2";
$result = $db->Execute($sql);
$mar_facturas=$result->fields["total"];
$mar_neto=$result->fields["neto"];

if ($mar_neto > 0){
$mar_consumo_receta = round($mar_neto / $mar_recetas,2);
$mar_consumo_entrega = round($mar_neto / $mar_facturas,2);
}
 ////////////////////////////////////

////////////////////////////////
$mes = "04";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
$sql = "SELECT *  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2 group by documento";
$result = $db->Execute($sql);
$abr_recetas = $result->RecordCount(); 
$sql = "SELECT count(nro_factura) as total, sum(neto) as neto  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2";
$result = $db->Execute($sql);
$abr_facturas=$result->fields["total"];
$abr_neto=$result->fields["neto"];


if ($abr_neto > 0){
$abr_consumo_receta = round($abr_neto / $abr_recetas,2);
$abr_consumo_entrega = round($abr_neto / $abr_facturas,2);
}
////////////////////////////////
$mes = "05";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
$sql = "SELECT *  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2 group by documento";
$result = $db->Execute($sql);
$may_recetas = $result->RecordCount(); 
$sql = "SELECT count(nro_factura) as total, sum(neto) as neto  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2";
$result = $db->Execute($sql);
$may_facturas=$result->fields["total"];
$may_neto=$result->fields["neto"];


if ($may_neto > 0){
$may_consumo_receta = round($may_neto / $may_recetas,2);
$may_consumo_entrega = round($may_neto / $may_facturas,2);
}
 ////////////////////////////////////

$mes = "06";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
$sql = "SELECT *  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2 group by documento";
$result = $db->Execute($sql);
$jun_recetas = $result->RecordCount(); 
$sql = "SELECT count(nro_factura) as total, sum(neto) as neto  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2";
$result = $db->Execute($sql);
$jun_facturas=$result->fields["total"];
$jun_neto=$result->fields["neto"];

 
 




if ($jun_neto > 0){
$jun_consumo_receta = round($jun_neto / $jun_recetas,2);
$jun_consumo_entrega = round($jun_neto / $jun_facturas,2);
}
 ////////////////////////////////////

 ////////////////////////////////
$mes = "07";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
$sql = "SELECT *  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2 group by documento";
$result = $db->Execute($sql);
$jul_recetas = $result->RecordCount(); 
$sql = "SELECT count(nro_factura) as total, sum(neto) as neto  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2";
$result = $db->Execute($sql);
$jul_facturas=$result->fields["total"];
$jul_neto=$result->fields["neto"];


if ($jul_neto > 0){
$jul_consumo_receta = round($jul_neto / $jul_recetas,2);
$jul_consumo_entrega = round($jul_neto / $jul_facturas,2);
}

////////////////////////////////
$mes = "08";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
$sql = "SELECT *  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2 group by documento";
$result = $db->Execute($sql);
$ago_recetas = $result->RecordCount(); 
$sql = "SELECT count(nro_factura) as total, sum(neto) as neto  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2";
$result = $db->Execute($sql);
$ago_facturas=$result->fields["total"];
$ago_neto=$result->fields["neto"];


if ($ago_neto > 0){
$ago_consumo_receta = round($ago_neto / $ago_recetas,2);
$ago_consumo_entrega = round($ago_neto / $ago_facturas,2);
}

 ////////////////////////////////////

 $mes = "09";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
$sql = "SELECT *  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2 group by documento";
$result = $db->Execute($sql);
$set_recetas = $result->RecordCount(); 
$sql = "SELECT count(nro_factura) as total, sum(neto) as neto  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2";
$result = $db->Execute($sql);
$set_facturas=$result->fields["total"];
$set_neto=$result->fields["neto"];


if ($set_neto > 0){
$set_consumo_receta = round($set_neto / $set_recetas,2);
$set_consumo_entrega = round($set_neto / $set_facturas,2);
}
 ////////////////////////////////////

 ////////////////////////////////
$mes = "10";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
$sql = "SELECT *  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2 group by documento";
$result = $db->Execute($sql);
$oct_recetas = $result->RecordCount(); 
$sql = "SELECT count(nro_factura) as total, sum(neto) as neto  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2";
$result = $db->Execute($sql);
$oct_facturas=$result->fields["total"];
$oct_neto=$result->fields["neto"];


if ($oct_neto > 0){
$oct_consumo_receta = round($oct_neto / $oct_recetas,2);
$oct_consumo_entrega = round($oct_neto / $oct_facturas,2);
}

////////////////////////////////

$mes = "11";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
$sql = "SELECT *  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2 group by documento";
$result = $db->Execute($sql);
$nov_recetas = $result->RecordCount(); 
$sql = "SELECT count(nro_factura) as total, sum(neto) as neto  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2";
$result = $db->Execute($sql);
$nov_facturas=$result->fields["total"];
$nov_neto=$result->fields["neto"];


if ($nov_neto > 0){
$nov_consumo_receta = round($nov_neto / $nov_recetas,2);
$nov_consumo_entrega = round($nov_neto / $nov_facturas,2);
}
 ////////////////////////////////////

 $mes = "12";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
$sql = "SELECT *  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2 group by documento";
$result = $db->Execute($sql);
$dic_recetas = $result->RecordCount(); 
$sql = "SELECT count(nro_factura) as total, sum(neto) as neto  FROM `tr_ventas_encabezado` WHERE `fecha` between '$desde' and '$hasta' and cod_movimiento != 6  and cod_movimiento != 3 and cod_movimiento != 2";
$result = $db->Execute($sql);
$dic_facturas=$result->fields["total"];
$dic_neto=$result->fields["neto"];


if ($dic_neto > 0){
$dic_consumo_receta = round($dic_neto / $dic_recetas,2);
$dic_consumo_entrega = round($dic_neto / $dic_facturas,2);
}
 ////////////////////////////////////


if ($ene_recetas == 0){$ene_recetas = "-";}
if ($ene_facturas== 0){$ene_facturas = "-";}

if ($feb_recetas == 0){$feb_recetas = "-";}
if ($feb_facturas== 0){$feb_facturas = "-";}

if ($mar_recetas == 0){$mar_recetas = "-";}
if ($mar_facturas== 0){$mar_facturas = "-";}

if ($abr_recetas == 0){$abr_recetas = "-";}
if ($abr_facturas== 0){$abr_facturas = "-";}

if ($may_recetas == 0){$may_recetas = "-";}
if ($may_facturas== 0){$may_facturas = "-";}

if ($jun_recetas == 0){$jun_recetas = "-";}
if ($jun_facturas== 0){$jun_facturas = "-";}

if ($jul_recetas == 0){$jul_recetas = "-";}
if ($jul_facturas== 0){$jul_facturas = "-";}

if ($ago_recetas == 0){$ago_recetas = "-";}
if ($ago_facturas== 0){$ago_facturas = "-";}

if ($set_recetas == 0){$set_recetas = "-";}
if ($set_facturas== 0){$set_facturas = "-";}

if ($oct_recetas == 0){$oct_recetas = "-";}
if ($oct_facturas== 0){$oct_facturas = "-";}

if ($nov_recetas == 0){$nov_recetas = "-";}
if ($nov_facturas== 0){$nov_facturas = "-";}

if ($dic_recetas == 0){$dic_recetas = "-";}
if ($dic_facturas== 0){$dic_facturas = "-";}

?>



 <table width="850" border="1" cellspacing="0">
  <tr>
    <td height="99" colspan="6" bgcolor="#FFFFFF"><div align="center" class="Estilo2">CONSUMO POR PACIENTE PROGRAMA ONCOLOGICO MZA </div></td>
  </tr>
  <tr>
    <td width="173" bgcolor="#FFFFFF"><div align="center" class="Estilo2"></div></td>
    <td width="78" bgcolor="#CCCCCC"><div align="center" class="Estilo2">CANTIDAD  </div>
      <div align="center"><span class="Estilo2">RECETAS</span></div></td>
    <td width="102" bgcolor="#CCCCCC"><div align="center" class="Estilo2">CANTIDAD  PACIENTES</div></td>
    <td width="142" bgcolor="#CCCCCC"><div align="center"><span class="Estilo2">COSTO  RECETA</span></div></td>
    <td width="151" bgcolor="#CCCCCC"><div align="center"><span class="Estilo2">COSTO PACIENTE </span></div></td>
    <td width="178" bgcolor="#CCCCCC"><div align="center" class="Estilo2">CONSUMO</div></td>
  </tr>
  <tr>
    <td><div align="right" class="Estilo5"><span class="Estilo6">ENERO <span class="Estilo7"><?PHP echo $anio;?></span></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $ene_facturas;?> </span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7">
      <?PHP echo $ene_recetas;?>
    </span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $ene_consumo_entrega;?></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $ene_consumo_receta;?></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $ene_neto;?></span></div></td>
  </tr>
  <tr>
    <td><div align="right" class="Estilo5"><span class="Estilo6">FEBRERO <span class="Estilo7"><?PHP echo $anio;?></span></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $feb_facturas;?> </span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $feb_recetas;?> </span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $feb_consumo_entrega;?></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $feb_consumo_receta;?></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $feb_neto;?></span></div></td>
  </tr>
  <tr>
    <td><div align="right" class="Estilo5"><span class="Estilo6">MARZO <span class="Estilo7"><?PHP echo $anio;?></span></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $mar_facturas;?> </span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $mar_recetas;?> </span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $mar_consumo_entrega;?></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $mar_consumo_receta;?></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $mar_neto;?></span></div></td>
  </tr>
  <tr>
    <td><div align="right" class="Estilo5"><span class="Estilo6">ABRIL <span class="Estilo7"><?PHP echo $anio;?></span></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $abr_facturas;?> </span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $abr_recetas;?> </span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $abr_consumo_entrega;?></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $abr_consumo_receta;?></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $abr_neto;?></span></div></td>
  </tr>
  <tr>
    <td><div align="right" class="Estilo5"><span class="Estilo6">MAYO <span class="Estilo7"><?PHP echo $anio;?></span></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $may_facturas;?> </span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $may_recetas;?> </span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $may_consumo_entrega;?></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $may_consumo_receta;?></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $may_neto;?></span></div></td>
  </tr>
  <tr>
    <td><div align="right" class="Estilo5"><span class="Estilo6">JUNIO <span class="Estilo7"><?PHP echo $anio;?></span></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $jun_facturas;?> </span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $jun_recetas;?> </span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $jun_consumo_entrega;?></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $jun_consumo_receta;?></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $jun_neto;?></span></div></td>
  </tr>
  <tr>
    <td><div align="right" class="Estilo5"><span class="Estilo6">JULIO <span class="Estilo7"><?PHP echo $anio;?></span></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $jul_facturas;?> </span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $jul_recetas;?> </span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $jul_consumo_entrega;?></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $jul_consumo_receta;?></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $jul_neto;?></span></div></td>
  </tr>
  <tr>
    <td><div align="right" class="Estilo5"><span class="Estilo6">AGOSTO <span class="Estilo7"><?PHP echo $anio;?></span></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $ago_facturas;?> </span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $ago_recetas;?> </span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $ago_consumo_entrega;?></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $ago_consumo_receta;?></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $ago_neto;?></span></div></td>
  </tr>
  <tr>
    <td><div align="right" class="Estilo5"><span class="Estilo6">SETIEMBRE <span class="Estilo7"><?PHP echo $anio;?></span></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $set_facturas;?> </span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $set_recetas;?> </span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $set_consumo_entrega;?></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $set_consumo_receta;?></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $set_neto;?></span></div></td>
  </tr>
  <tr>
    <td><div align="right" class="Estilo5"><span class="Estilo6">OCTUBRE <span class="Estilo7"><?PHP echo $anio;?></span></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $oct_facturas;?> </span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $oct_recetas;?> </span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $oct_consumo_entrega;?></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $oct_consumo_receta;?></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $oct_neto;?></span></div></td>
  </tr>
  <tr>
    <td><div align="right" class="Estilo5"><span class="Estilo6">NOVIEMBRE <span class="Estilo7"><?PHP echo $anio;?></span></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $nov_facturas;?> </span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $nov_recetas;?> </span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $nov_consumo_entrega;?></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $nov_consumo_receta;?></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $nov_neto;?></span></div></td>
  </tr>
  <tr>
    <td><div align="right" class="Estilo5"><span class="Estilo6">DICIEMBRE <span class="Estilo7"><?PHP echo $anio;?></span></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $dic_facturas;?> </span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $dic_recetas;?> </span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $dic_consumo_entrega;?></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $dic_consumo_receta;?></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $dic_neto;?></span></div></td>
  </tr>
</table>

