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

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$anio");




 

$suma_anual = number_format($suma_primer_semestre  + $suma_segundo_semestre,2);
$suma_anual_pro = number_format($suma_primer_semestre_pro  + $suma_segundo_semestre_pro,2);
$suma_anual_mon = number_format($suma_primer_semestre_mon  + $suma_segundo_semestre_mon,2);

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
    <td colspan="8"><div align="center" class="Estilo2 Estilo8">CONSUMO POR PACIENTES MENORES PROGRAMA ONCOLOGICO  </div></td>
  </tr>
  <tr bgcolor="#0000FF">
    <td width="126"><div align="center" class="Estilo12 Estilo2"><strong><span class="Estilo5"><span class="Estilo7"><span class="Estilo2"><?PHP echo $anio;?></span></span></span></strong></div></td>
    <td width="148"><div align="center" class="Estilo13"><strong>CANT. <span class="Estilo2">RECETAS</span></strong></div>    </td>
    <td width="119"><div align="center" class="Estilo13"><strong>CANT.  PACIENTES</strong></div></td>
    <td width="102"><div align="center" class="Estilo12"><strong><span class="Estilo2">COSTO  RECETA</span></strong></div></td>
    <td width="151"><div align="center" class="Estilo12"><strong><span class="Estilo2">COSTO PACIENTE </span></strong></div></td>
    <td width="178"><div align="center" class="Estilo13"><strong>CONSUMO</strong></div></td>
    <td width="178"><div align="center"><span class="Estilo13"><strong>PROFE</strong></span></div></td>
    <td width="178"><div align="center"><span class="Estilo13"><strong>MONO</strong></span></div></td>
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
    <td bgcolor="#FFFFCC"><div align="center" class="Estilo5">
        <div align="right"><span class="Estilo7"><?PHP echo $ene_neto_pro;?></span></div>
    </div></td>
    <td bgcolor="#FFFFCC"><div align="right"><span class="Estilo5"><?PHP echo $ene_mono;?></span></div></td>
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
    <td bgcolor="#FFFFCC"><div align="center" class="Estilo5">
        <div align="right"><span class="Estilo7"><?PHP echo $feb_neto_pro;_pro?></span></div>
    </div></td>
    <td bgcolor="#FFFFCC"><div align="right"><span class="Estilo5"><?PHP echo $feb_mono;?></span></div></td>
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
    <td bgcolor="#FFFFCC"><div align="center" class="Estilo5">
        <div align="right"><span class="Estilo7"><?PHP echo $mar_neto_pro;?></span></div>
    </div></td>
    <td bgcolor="#FFFFCC"><div align="right"><span class="Estilo5"><?PHP echo $mar_mono;?></span></div></td>
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
    <td bgcolor="#FFFFCC"><div align="center" class="Estilo5">
        <div align="right"><span class="Estilo7"><?PHP echo $abr_neto_pro;?></span></div>
    </div></td>
    <td bgcolor="#FFFFCC"><div align="right"><span class="Estilo5"><?PHP echo $abr_mono;?></span></div></td>
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
    <td bgcolor="#FFFFCC"><div align="center" class="Estilo5">
        <div align="right"><span class="Estilo7"><?PHP echo $may_neto_pro;?></span></div>
    </div></td>
    <td bgcolor="#FFFFCC"><div align="right"><span class="Estilo5"><?PHP echo $may_mono;?></span></div></td>
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
    <td bgcolor="#FFFFCC"><div align="center" class="Estilo5">
        <div align="right"><span class="Estilo7"><?PHP echo $jun_neto_pro;?></span></div>
    </div></td>
    <td bgcolor="#FFFFCC"><div align="right"><span class="Estilo5"><?PHP echo $jun_mono;?></span></div></td>
  </tr>
  <tr bgcolor="#66CCCC">
    <td><div align="center"><span class="Estilo14">1&deg; SEMESTRE </span></div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td bgcolor="#66CCCC"><div align="right"><span class="Estilo16"><?PHP echo $suma_primer_semestre;?></span></div></td>
    <td bgcolor="#66CCCC"><div align="right"><span class="Estilo16"><?PHP echo $suma_primer_semestre_pro;?></span></div></td>
    <td bgcolor="#66CCCC"><div align="right"><span class="Estilo16"><?PHP echo $suma_primer_semestre_mon;?></span></div></td>
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
    <td bgcolor="#FFFFCC"><div align="center" class="Estilo5">
        <div align="right"><span class="Estilo7"><?PHP echo $jul_neto_pro;?></span></div>
    </div></td>
    <td bgcolor="#FFFFCC"><div align="right"><span class="Estilo5"><?PHP echo $jul_mono;?></span></div></td>
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
    <td bgcolor="#FFFFCC"><div align="center" class="Estilo5">
        <div align="right"><span class="Estilo7"><?PHP echo $ago_neto_pro;?></span></div>
    </div></td>
    <td bgcolor="#FFFFCC"><div align="right"><span class="Estilo5"><?PHP echo $ago_mono;?></span></div></td>
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
    <td bgcolor="#FFFFCC"><div align="center" class="Estilo5">
        <div align="right"><span class="Estilo7"><?PHP echo $set_neto_pro;?></span></div>
    </div></td>
    <td bgcolor="#FFFFCC"><div align="right"><span class="Estilo5"><?PHP echo $set_mono;?></span></div></td>
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
    <td bgcolor="#FFFFCC"><div align="center" class="Estilo5">
        <div align="right"><span class="Estilo7"><?PHP echo $oct_neto_pro;?></span></div>
    </div></td>
    <td bgcolor="#FFFFCC"><div align="right"><span class="Estilo5"><?PHP echo $oct_mono;?></span></div></td>
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
    <td bgcolor="#FFFFCC"><div align="center" class="Estilo5">
        <div align="right"><span class="Estilo7"><?PHP echo $nov_neto_pro;?></span></div>
    </div></td>
    <td bgcolor="#FFFFCC"><div align="right"><span class="Estilo5"><?PHP echo $nov_mono;?></span></div></td>
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
    <td bgcolor="#FFFFCC"><div align="center" class="Estilo5">
        <div align="right"><span class="Estilo7"><?PHP echo $dic_neto_pro;?></span></div>
    </div></td>
    <td bgcolor="#FFFFCC"><div align="right"><span class="Estilo5"><?PHP echo $dic_mono;?></span></div></td>
  </tr>
  <tr bgcolor="#66CCCC">
    <td><div align="center"><span class="Estilo14">2&deg; SEMESTRE </span></div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="right"><span class="Estilo16"><?PHP echo $suma_segundo_semestre;?></span></div></td>
    <td><div align="right"><span class="Estilo16"><?PHP echo $suma_segundo_semestre_pro;?></span></div></td>
    <td><div align="right"><span class="Estilo16"><?PHP echo $suma_segundo_semestre_mon;?></span></div></td>
  </tr>
  <tr bgcolor="#FF9966">
    <td><div align="center"><span class="Estilo14">ANUAL</span></div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="right" class="Estilo19"><span class="Estilo16"><?PHP echo $suma_anual;?></span></div></td>
    <td><div align="right" class="Estilo19"><span class="Estilo16"><?PHP echo $suma_anual_pro;?></span></div></td>
    <td><div align="right" class="Estilo19"><span class="Estilo16"><?PHP echo $suma_anual_mon;?></span></div></td>
  </tr>
</table>

