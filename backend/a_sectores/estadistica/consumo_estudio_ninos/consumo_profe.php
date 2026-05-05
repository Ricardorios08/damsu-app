<style type="text/css">
<!--
.Estilo2 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo5 {font-size: 14px}
.Estilo7 {font-family: "Trebuchet MS"}
.Estilo8 {font-size: 24px}
.Estilo10 {font-family: "Trebuchet MS"; font-size: 36px; }
.Estilo12 {color: #FFFFFF}
.Estilo13 {font-family: "Trebuchet MS"; font-size: 12px; color: #FFFFFF; }
-->
</style>

<?php 
include ("../../../conexiones/config_pro.php");

$anio = $_REQUEST['anio'];

////////////////////////////////
$mes = "01";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
include ("mes.php");

if ($neto > 0){
$ene_facturas = $facturas - $facturas_nc;
$ene_recetas = $recetas;
$ene_neto = number_format($neto,2);
$ene_consumo_receta = round($neto / $recetas,2);
$ene_consumo_entrega = round($neto / ($facturas),2);
}

////////////////////////////////
$mes = "02";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
include ("mes.php");

if ($neto > 0){
$feb_facturas = $facturas - $facturas_nc;
$feb_recetas = $recetas;
$feb_neto = number_format($neto,2);
$feb_consumo_receta = round($neto / $recetas,2);
$feb_consumo_entrega = round($neto / ($facturas),2);
}

////////////////////////////////
$mes = "03";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
include ("mes.php");
if ($neto > 0){
$mar_facturas = $facturas - $facturas_nc;
$mar_recetas = $recetas;
$mar_neto = number_format($neto,2);
$mar_consumo_receta = round($neto / $recetas,2);
$mar_consumo_entrega = round($neto / ($facturas),2);
}

////////////////////////////////
$mes = "04";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
include ("mes.php");
if ($neto > 0){
$abr_facturas = $facturas - $facturas_nc;
$abr_recetas = $recetas;
$abr_neto = number_format($neto,2);
$abr_consumo_receta = round($neto / $recetas,2);
$abr_consumo_entrega = round($neto / ($facturas),2);
}

////////////////////////////////
$mes = "05";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
include ("mes.php");
if ($neto > 0){
$may_facturas = $facturas - $facturas_nc;
$may_recetas = $recetas;
$may_neto = number_format($neto,2);
$may_consumo_receta = round($neto / $recetas,2);
$may_consumo_entrega = round($neto / ($facturas),2);
}

////////////////////////////////
$mes = "06";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
include ("mes.php");
if ($neto > 0){
$jun_facturas = $facturas - $facturas_nc;
$jun_recetas = $recetas;
$jun_neto = number_format($neto,2);
$jun_consumo_receta = round($neto / $recetas,2);
$jun_consumo_entrega = round($neto / ($facturas),2);
}

////////////////////////////////
$mes = "07";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
include ("mes.php");
if ($neto > 0){
$jul_facturas = $facturas - $facturas_nc;
$jul_recetas = $recetas;
$jul_neto = number_format($neto,2);
$jul_consumo_receta = round($neto / $recetas,2);
$jul_consumo_entrega = round($neto / ($facturas),2);
}

////////////////////////////////
$mes = "08";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
include ("mes.php");
if ($neto > 0){
$ago_facturas = $facturas - $facturas_nc;
$ago_recetas = $recetas;
$ago_neto = number_format($neto,2);
$ago_consumo_receta = round($neto / $recetas,2);
$ago_consumo_entrega = round($neto / ($facturas),2);
}

////////////////////////////////
$mes = "09";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
include ("mes.php");
if ($neto > 0){
$set_facturas = $facturas - $facturas_nc;
$set_recetas = $recetas;
$set_neto = number_format($neto,2);
$set_consumo_receta = round($neto / $recetas,2);
$set_consumo_entrega = round($neto / ($facturas),2);
}

////////////////////////////////
$mes = "10";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
include ("mes.php");
if ($neto > 0){
$oct_facturas = $facturas - $facturas_nc;
$oct_recetas = $recetas;
$oct_neto = number_format($neto,2);
$oct_consumo_receta = round($neto / $recetas,2);
$oct_consumo_entrega = round($neto / ($facturas),2);
}

////////////////////////////////
$mes = "11";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
include ("mes.php");
if ($neto > 0){
$nov_facturas = $facturas - $facturas_nc;
$nov_recetas = $recetas;
$nov_neto = number_format($neto,2);
$nov_consumo_receta = round($neto / $recetas,2);
$nov_consumo_entrega = round($neto / ($facturas),2);
}

////////////////////////////////
$mes = "12";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes."-31";
include ("mes.php");
if ($neto > 0){
$dic_facturas = $facturas - $facturas_nc;
$dic_recetas = $recetas;
$dic_neto = number_format($neto,2);
$dic_consumo_receta = round($neto / $recetas,2);
$dic_consumo_entrega = round($neto / ($facturas),2);
}





//////////////////////////////
if ($ene_recetas == 0){$ene_recetas = "";}
if ($ene_facturas== 0){$ene_facturas = "";}

if ($feb_recetas == 0){$feb_recetas = "";}
if ($feb_facturas== 0){$feb_facturas = "";}

if ($mar_recetas == 0){$mar_recetas = "";}
if ($mar_facturas== 0){$mar_facturas = "";}

if ($abr_recetas == 0){$abr_recetas = "";}
if ($abr_facturas== 0){$abr_facturas = "";}

if ($may_recetas == 0){$may_recetas = "";}
if ($may_facturas== 0){$may_facturas = "";}

if ($jun_recetas == 0){$jun_recetas = "";}
if ($jun_facturas== 0){$jun_facturas = "";}

if ($jul_recetas == 0){$jul_recetas = "";}
if ($jul_facturas== 0){$jul_facturas = "";}

if ($ago_recetas == 0){$ago_recetas = "";}
if ($ago_facturas== 0){$ago_facturas = "";}

if ($set_recetas == 0){$set_recetas = "";}
if ($set_facturas== 0){$set_facturas = "";}

if ($oct_recetas == 0){$oct_recetas = "";}
if ($oct_facturas== 0){$oct_facturas = "";}

if ($nov_recetas == 0){$nov_recetas = "";}
if ($nov_facturas== 0){$nov_facturas = "";}

if ($dic_recetas == 0){$dic_recetas = "";}
if ($dic_facturas== 0){$dic_facturas = "";}

?>



 <table width="850" border="0" cellspacing="0">
  <tr bgcolor="#CCCCCC">
    <td height="99" colspan="6"><div align="center" class="Estilo2 Estilo8">CONSUMO POR PACIENTE PROGRAMA ONCOLOGICO - PROFE </div></td>
  </tr>
  <tr bgcolor="#0000FF">
    <td width="126"><div align="center" class="Estilo12 Estilo2"><strong><span class="Estilo5"><span class="Estilo7"><span class="Estilo10"><?PHP echo $anio;?></span></span></span></strong></div></td>
    <td width="148"><div align="center" class="Estilo13"><strong>CANT. <span class="Estilo2">RECETAS</span></strong></div>    </td>
    <td width="119"><div align="center" class="Estilo13"><strong>CANT.  PACIENTES</strong></div></td>
    <td width="102"><div align="center" class="Estilo12"><strong><span class="Estilo2">COSTO  RECETA</span></strong></div></td>
    <td width="151"><div align="center" class="Estilo12"><strong><span class="Estilo2">COSTO PACIENTE </span></strong></div></td>
    <td width="178"><div align="center" class="Estilo13"><strong>CONSUMO</strong></div></td>
  </tr>
  <tr>
    <td bgcolor="#9BBCFF"><div align="right" class="Estilo5">
      <div align="center"><span class="Estilo7">ENERO </span></div>
    </div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $ene_facturas;?> </span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7">
      <?PHP echo $ene_recetas;?>
    </span></div></td>
    <td><div align="center" class="Estilo5">
      <div align="right"><span class="Estilo7"><?PHP echo $ene_consumo_entrega;?></span></div>
    </div></td>
    <td><div align="center" class="Estilo5">
      <div align="right"><span class="Estilo7"><?PHP echo $ene_consumo_receta;?></span></div>
    </div></td>
    <td bgcolor="#CCFF99"><div align="center" class="Estilo5">
      <div align="right"><span class="Estilo7"><?PHP echo $ene_neto;?></span></div>
    </div></td>
  </tr>
  <tr>
    <td bgcolor="#9BBCFF"><div align="right" class="Estilo5">
      <div align="center"><span class="Estilo7">FEBRERO </span></div>
    </div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $feb_facturas;?> </span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $feb_recetas;?> </span></div></td>
    <td><div align="center" class="Estilo5">
      <div align="right"><span class="Estilo7"><?PHP echo $feb_consumo_entrega;?></span></div>
    </div></td>
    <td><div align="center" class="Estilo5">
      <div align="right"><span class="Estilo7"><?PHP echo $feb_consumo_receta;?></span></div>
    </div></td>
    <td bgcolor="#CCFF99"><div align="center" class="Estilo5">
      <div align="right"><span class="Estilo7"><?PHP echo $feb_neto;?></span></div>
    </div></td>
  </tr>
  <tr>
    <td bgcolor="#9BBCFF"><div align="right" class="Estilo5">
      <div align="center"><span class="Estilo7">MARZO </span></div>
    </div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $mar_facturas;?> </span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $mar_recetas;?> </span></div></td>
    <td><div align="center" class="Estilo5">
      <div align="right"><span class="Estilo7"><?PHP echo $mar_consumo_entrega;?></span></div>
    </div></td>
    <td><div align="center" class="Estilo5">
      <div align="right"><span class="Estilo7"><?PHP echo $mar_consumo_receta;?></span></div>
    </div></td>
    <td bgcolor="#CCFF99"><div align="center" class="Estilo5">
      <div align="right"><span class="Estilo7"><?PHP echo $mar_neto;?></span></div>
    </div></td>
  </tr>
  <tr>
    <td bgcolor="#9BBCFF"><div align="right" class="Estilo5">
      <div align="center"><span class="Estilo7">ABRIL </span></div>
    </div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $abr_facturas;?> </span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $abr_recetas;?> </span></div></td>
    <td><div align="center" class="Estilo5">
      <div align="right"><span class="Estilo7"><?PHP echo $abr_consumo_entrega;?></span></div>
    </div></td>
    <td><div align="center" class="Estilo5">
      <div align="right"><span class="Estilo7"><?PHP echo $abr_consumo_receta;?></span></div>
    </div></td>
    <td bgcolor="#CCFF99"><div align="center" class="Estilo5">
      <div align="right"><span class="Estilo7"><?PHP echo $abr_neto;?></span></div>
    </div></td>
  </tr>
  <tr>
    <td bgcolor="#9BBCFF"><div align="right" class="Estilo5">
      <div align="center"><span class="Estilo7">MAYO </span></div>
    </div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $may_facturas;?> </span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $may_recetas;?> </span></div></td>
    <td><div align="center" class="Estilo5">
      <div align="right"><span class="Estilo7"><?PHP echo $may_consumo_entrega;?></span></div>
    </div></td>
    <td><div align="center" class="Estilo5">
      <div align="right"><span class="Estilo7"><?PHP echo $may_consumo_receta;?></span></div>
    </div></td>
    <td bgcolor="#CCFF99"><div align="center" class="Estilo5">
      <div align="right"><span class="Estilo7"><?PHP echo $may_neto;?></span></div>
    </div></td>
  </tr>
  <tr>
    <td bgcolor="#9BBCFF"><div align="right" class="Estilo5">
      <div align="center"><span class="Estilo7">JUNIO </span></div>
    </div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $jun_facturas;?> </span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $jun_recetas;?> </span></div></td>
    <td><div align="center" class="Estilo5">
      <div align="right"><span class="Estilo7"><?PHP echo $jun_consumo_entrega;?></span></div>
    </div></td>
    <td><div align="center" class="Estilo5">
      <div align="right"><span class="Estilo7"><?PHP echo $jun_consumo_receta;?></span></div>
    </div></td>
    <td bgcolor="#CCFF99"><div align="center" class="Estilo5">
      <div align="right"><span class="Estilo7"><?PHP echo $jun_neto;?></span></div>
    </div></td>
  </tr>
  <tr>
    <td bgcolor="#9BBCFF"><div align="right" class="Estilo5">
      <div align="center"><span class="Estilo7">JULIO </span></div>
    </div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $jul_facturas;?> </span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $jul_recetas;?> </span></div></td>
    <td><div align="center" class="Estilo5">
      <div align="right"><span class="Estilo7"><?PHP echo $jul_consumo_entrega;?></span></div>
    </div></td>
    <td><div align="center" class="Estilo5">
      <div align="right"><span class="Estilo7"><?PHP echo $jul_consumo_receta;?></span></div>
    </div></td>
    <td bgcolor="#CCFF99"><div align="center" class="Estilo5">
      <div align="right"><span class="Estilo7"><?PHP echo $jul_neto;?></span></div>
    </div></td>
  </tr>
  <tr>
    <td bgcolor="#9BBCFF"><div align="right" class="Estilo5">
      <div align="center"><span class="Estilo7">AGOSTO </span></div>
    </div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $ago_facturas;?> </span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $ago_recetas;?> </span></div></td>
    <td><div align="center" class="Estilo5">
      <div align="right"><span class="Estilo7"><?PHP echo $ago_consumo_entrega;?></span></div>
    </div></td>
    <td><div align="center" class="Estilo5">
      <div align="right"><span class="Estilo7"><?PHP echo $ago_consumo_receta;?></span></div>
    </div></td>
    <td bgcolor="#CCFF99"><div align="center" class="Estilo5">
      <div align="right"><span class="Estilo7"><?PHP echo $ago_neto;?></span></div>
    </div></td>
  </tr>
  <tr>
    <td bgcolor="#9BBCFF"><div align="right" class="Estilo5">
      <div align="center"><span class="Estilo7">SETIEMBRE </span></div>
    </div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $set_facturas;?> </span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $set_recetas;?> </span></div></td>
    <td><div align="center" class="Estilo5">
      <div align="right"><span class="Estilo7"><?PHP echo $set_consumo_entrega;?></span></div>
    </div></td>
    <td><div align="center" class="Estilo5">
      <div align="right"><span class="Estilo7"><?PHP echo $set_consumo_receta;?></span></div>
    </div></td>
    <td bgcolor="#CCFF99"><div align="center" class="Estilo5">
      <div align="right"><span class="Estilo7"><?PHP echo $set_neto;?></span></div>
    </div></td>
  </tr>
  <tr>
    <td bgcolor="#9BBCFF"><div align="right" class="Estilo5">
      <div align="center"><span class="Estilo7">OCTUBRE </span></div>
    </div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $oct_facturas;?> </span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $oct_recetas;?> </span></div></td>
    <td><div align="center" class="Estilo5">
      <div align="right"><span class="Estilo7"><?PHP echo $oct_consumo_entrega;?></span></div>
    </div></td>
    <td><div align="center" class="Estilo5">
      <div align="right"><span class="Estilo7"><?PHP echo $oct_consumo_receta;?></span></div>
    </div></td>
    <td bgcolor="#CCFF99"><div align="center" class="Estilo5">
      <div align="right"><span class="Estilo7"><?PHP echo $oct_neto;?></span></div>
    </div></td>
  </tr>
  <tr>
    <td bgcolor="#9BBCFF"><div align="right" class="Estilo5">
      <div align="center"><span class="Estilo7">NOVIEMBRE </span></div>
    </div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $nov_facturas;?> </span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $nov_recetas;?> </span></div></td>
    <td><div align="center" class="Estilo5">
      <div align="right"><span class="Estilo7"><?PHP echo $nov_consumo_entrega;?></span></div>
    </div></td>
    <td><div align="center" class="Estilo5">
      <div align="right"><span class="Estilo7"><?PHP echo $nov_consumo_receta;?></span></div>
    </div></td>
    <td bgcolor="#CCFF99"><div align="center" class="Estilo5">
      <div align="right"><span class="Estilo7"><?PHP echo $nov_neto;?></span></div>
    </div></td>
  </tr>
  <tr>
    <td bgcolor="#9BBCFF"><div align="right" class="Estilo5">
      <div align="center"><span class="Estilo7">DICIEMBRE </span></div>
    </div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $dic_facturas;?> </span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"> <?PHP echo $dic_recetas;?> </span></div></td>
    <td><div align="center" class="Estilo5">
      <div align="right"><span class="Estilo7"><?PHP echo $dic_consumo_entrega;?></span></div>
    </div></td>
    <td><div align="center" class="Estilo5">
      <div align="right"><span class="Estilo7"><?PHP echo $dic_consumo_receta;?></span></div>
    </div></td>
    <td bgcolor="#CCFF99"><div align="center" class="Estilo5">
      <div align="right"><span class="Estilo7"><?PHP echo $dic_neto;?></span></div>
    </div></td>
  </tr>
</table>

