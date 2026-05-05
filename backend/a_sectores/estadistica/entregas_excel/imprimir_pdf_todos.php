<?php 

require('../../../drivers/fpdf/fpdf.php');
include ("../../../conexiones/config_pro.php");
include ("arregla_grupo.php");

$hoy=date("d/m/y");

$mes = $_REQUEST['mes'];
$anio = $_REQUEST['anio'];

$prov_papo1 = "0";
$prov_mono = "0";
$ne_grupo1 = "0";
$ne_grupo2 = "0";
$ne_grupo3 = "0";
$total_renglon = "0";

$desde = $anio."-".$mes."-01";
$hasta= $anio."-".$mes."-31";


 header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$a");

include ("../../../conexiones/config_pro.php");
//include ("arregla_grupo.php");

$hoy=date("d/m/y");

$mes = $_REQUEST['mes'];
$anio = $_REQUEST['anio'];


switch ($mes){
	case "01":{$periodo = "ENERO 20".$anio;break;}
	case "02":{$periodo = "FEBRERO 20".$anio;break;}
	case "03":{$periodo = "MARZO 20".$anio;break;}
	case "04":{$periodo = "ABRIL 20".$anio;break;}
	case "05":{$periodo = "MAYO 20".$anio;break;}
	case "06":{$periodo = "JUNIO 20".$anio;break;}

	case "07":{$periodo = "JULIO 20".$anio;break;}
	case "08":{$periodo = "AGOSTO 20".$anio;break;}
	case "09":{$periodo = "SETIEMBRE 20".$anio;break;}
	case "10":{$periodo = "OCTUBRE 20".$anio;break;}
	case "11":{$periodo = "NOVIEMBRE 20".$anio;break;}
	case "12":{$periodo = "DICIEMBRE 20".$anio;break;}

}




$prov_papo1 = "0";
$prov_mono = "0";
$ne_grupo1 = "0";
$ne_grupo2 = "0";
$ne_grupo3 = "0";
$total_renglon = "0";

$desde = $anio."-".$mes."-01";
$hasta= $anio."-".$mes."-31";

 
$sql = "TRUNCATE TABLE tr_ventas_detalle_entregas";
mysql_query($sql);

$sql = "INSERT INTO tr_ventas_detalle_entregas SELECT * FROM tr_ventas_detalle where fecha between '$desde' and '$hasta'";
mysql_query($sql);


   /*
$this->SetY(16);
$this->SetX(155);
 $this->SetFont('Arial','',11);
$this->Cell(50,5,$this->getFecha());  

$this->SetY(23);
$this->SetX(155);

   $this->SetFont('Arial','',13);
$this->Cell(50,5,$this->getFactura());

*/
   
	?>
<style type="text/css">
<!--
.Estilo1 {font-family: "Trebuchet MS"}
.Estilo3 {font-size: 12px}
.Estilo5 {font-size: 12}
.Estilo7 {font-size: 10px}
.Estilo9 {font-size: 10}
.Estilo10 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo12 {font-size: 24px}
.Estilo13 {font-family: "Trebuchet MS"; font-size: 24; }
.Estilo14 {font-size: 24}
-->
</style>

<table width="918" border="1" cellpadding="0" cellspacing="0">
  <tr bgcolor="#FFBC79">
    <td width="8%"  bgcolor="#CCCCCC" scope="col"><div align="center" class="Estilo10"><span class="Estilo28 Estilo13 ">COMPROBANTE</span></div></td>

    <td width="36%"  bgcolor="#CCCCCC" scope="col"><div align="center" class="Estilo10">FECHA</div></td>
    <td width="23%" bgcolor="#CCCCCC" scope="col"><div align="center" class="Estilo3"><span class="Estilo1">PACIENTE </span></div></td>
    <td width="11%" bgcolor="#CCCCCC" scope="col"><div align="center" class="Estilo3"><span class="Estilo1">  PAPO 1  </span></div></td>
    <td width="3%" bgcolor="#CCCCCC" class="Estilo28" scope="col"><div align="center" class="Estilo1 Estilo3">PAPO 2</div></td>
<td width="3%" bgcolor="#CCCCCC" class="Estilo28" scope="col"><div align="center" class="Estilo1 Estilo3">PAPO MONO</div></td>

<td width="3%" bgcolor="#CCCCCC" class="Estilo28" scope="col"><div align="center" class="Estilo1 Estilo3">ACE 1</div></td>
<td width="3%" bgcolor="#CCCCCC" class="Estilo28" scope="col"><div align="center" class="Estilo1 Estilo3">ACE 2</div></td>
<td width="3%" bgcolor="#CCCCCC" class="Estilo28" scope="col"><div align="center" class="Estilo1 Estilo3">MONO </div></td>
<td width="3%" bgcolor="#CCCCCC" class="Estilo28" scope="col"><div align="center" class="Estilo1 Estilo3">TOTAL</div></td>
 </tr>

  <?php
	


 

include ("entregas.php");



$total_prov_papo_programa1 = $total_prov_papo1;
$total_prov_papo_programa2 = $total_prov_papo2;
$total_prov_mono_programa = $total_prov_mono;

$total_grupo1_programa = $total_grupo1;
$total_grupo2_programa = $total_grupo2;
$total_grupo3_programa = $total_grupo3;


include ("ajustes_positivos.php");

$total_prov_papo_programa1 = $total_prov_papo1;
$total_prov_papo_programa2 = $total_prov_papo2;
$total_prov_mono_programa = $total_prov_mono;

$total_grupo1_programa = $total_grupo1;
$total_grupo2_programa = $total_grupo2;
$total_grupo3_programa = $total_grupo3;

include ("ajustes_negativos.php");


$total_general_programa = $total_prov_papo_programa + $total_prov_mono_programa + $total_grupo1_programa + $total_grupo2_programa + $total_grupo3_programa;

//include ("devoluciones.php");



 $total_general = $total_prov_papo1 + $total_prov_papo2 + $total_prov_mono + $total_grupo1 + $total_grupo2 + $total_grupo3;

$total_grupo1_programa = $total_grupo1 - $dev_ace1;
$total_grupo2_programa = $total_grupo2 - $dev_ace2;
$total_grupo3_programa = $total_grupo3 - $dev_ace3;

echo "<br>";
echo "<br>";

$papo_1 = $total_prov_papo1 - $total_dev1;
$papo_2 = $total_prov_papo2 - $total_dev2;
$papo_3 = $total_prov_mono - $total_dev3;

$ace_1 = $total_grupo1;
$ace_2 = $total_grupo2;
$ace_3 = $total_grupo3;

$total_general = $papo1 + $papo2 + $papo3 + $ace_1 + $ace_2 + $ace_3;


$total_unico = $papo_1 + $papo_2 + $papo_3;
$total_ace = $ace_1 + $ace_2;
$total_gastado = $total_unico + $total_ace + $ace_3;
$monoclonales = $papo_3 + $total_grupo3;












$tot = $total_prov_papo1 + $total_prov_papo2 + $total_prov_mono + $total_grupo1 + $total_grupo2 + $total_grupo3;
$tot_dev = $total_dev1 + $total_dev2 + $total_dev3 + $dev_ace1 + $dev_ace2 + $dev_ace3;
$final= $papo_1 + $papo_2 + $papo_3 + $total_grupo1 + $total_grupo2 + $total_grupo3;


?>
  <tr bgcolor="#FFBC79">

<td width="3%" bgcolor="#CCCCCC" class="Estilo28" scope="col"><div align="center" class="Estilo1 Estilo3">ENTREGAS</div></td>
<td width="3%" bgcolor="#CCCCCC" class="Estilo28" scope="col"><div align="center" class="Estilo1 Estilo3"><?php echo $a;?></div></td>
<td width="3%" bgcolor="#CCCCCC" class="Estilo28" scope="col"><div align="center" class="Estilo1 Estilo3"><?php echo $a;?></div></td>
    <td width="8%"  bgcolor="#CCCCCC" scope="col"><div align="center" class="Estilo10"><span class="Estilo28  Estilo1"><?php echo $total_prov_papo1;?></span></div></td>

    <td width="36%"  bgcolor="#CCCCCC" scope="col"><div align="center" class="Estilo26 Estilo13 Estilo1 Estilo3"><?php echo $total_prov_papo2;?></div></td>
    <td width="23%" bgcolor="#CCCCCC" scope="col"><div align="center" class="Estilo28 Estilo13 Estilo1 Estilo3"><?php echo $total_prov_mono;?></div></td>
    <td width="11%" bgcolor="#CCCCCC" scope="col"><div align="center" class="Estilo28 Estilo13 Estilo1 Estilo3"><?php echo $total_grupo1;?></div></td>
    <td width="3%" bgcolor="#CCCCCC" class="Estilo28" scope="col"><div align="center" class="Estilo1 Estilo3"><?php echo $total_grupo2;?></div></td>
<td width="3%" bgcolor="#CCCCCC" class="Estilo28" scope="col"><div align="center" class="Estilo1 Estilo3"><?php echo $total_grupo3;?></div></td>

<td width="3%" bgcolor="#CCCCCC" class="Estilo28" scope="col"><div align="center" class="Estilo1 Estilo3"><?php echo $tot;?></div></td>
 </tr>

 <tr bgcolor="#FFBC79">

<td width="3%" bgcolor="#CCCCCC" class="Estilo28" scope="col"><div align="center" class="Estilo1 Estilo3">DEVOLUCIONES</div></td>
<td width="3%" bgcolor="#CCCCCC" class="Estilo28" scope="col"><div align="center" class="Estilo1 Estilo3"><?php echo $a;?></div></td>
<td width="3%" bgcolor="#CCCCCC" class="Estilo28" scope="col"><div align="center" class="Estilo1 Estilo3"><?php echo $a;?></div></td>
    <td width="8%"  bgcolor="#CCCCCC" scope="col"><div align="center" class="Estilo10"><span class="Estilo28  Estilo1"><?php echo $total_dev1;?></span></div></td>

    <td width="36%"  bgcolor="#CCCCCC" scope="col"><div align="center" class="Estilo26 Estilo13 Estilo1 Estilo3"><?php echo $total_dev2;?></div></td>
    <td width="23%" bgcolor="#CCCCCC" scope="col"><div align="center" class="Estilo28 Estilo13 Estilo1 Estilo3"><?php echo $total_dev3;?></div></td>
    <td width="11%" bgcolor="#CCCCCC" scope="col"><div align="center" class="Estilo28 Estilo13 Estilo1 Estilo3"><?php echo $dev_ace1;?></div></td>
    <td width="3%" bgcolor="#CCCCCC" class="Estilo28" scope="col"><div align="center" class="Estilo1 Estilo3"><?php echo $dev_ace2;?></div></td>
<td width="3%" bgcolor="#CCCCCC" class="Estilo28" scope="col"><div align="center" class="Estilo1 Estilo3"><?php echo $dev_ace3;?></div></td>

<td width="3%" bgcolor="#CCCCCC" class="Estilo28" scope="col"><div align="center" class="Estilo1 Estilo3"><?php echo $tot_dev;?></div></td>
 </tr>


<?PHP 
 
 




$tot1 = $total_prov_papo1 - $total_dev1;
$tot2 = $total_prov_papo2 - $total_dev2;
$tot3 = $total_prov_mono - $total_dev3;
$tot4 = $total_grupo1 - $dev_ace1;
$tot5 = $total_grupo2 - $dev_ace2;
$tot6 = $total_grupo3 - $dev_ace3;

$tot_fin = $tot1 + $tot2 + $tot3 + $tot4 + $tot5  + $tot6;

?>
 <tr bgcolor="#FFBC79">

<td width="3%" bgcolor="#CCCCCC" class="Estilo28" scope="col"><div align="center" class="Estilo1 Estilo3">DEVOLUCIONES</div></td>
<td width="3%" bgcolor="#CCCCCC" class="Estilo28" scope="col"><div align="center" class="Estilo1 Estilo3"><?php echo $a;?></div></td>
<td width="3%" bgcolor="#CCCCCC" class="Estilo28" scope="col"><div align="center" class="Estilo1 Estilo3"><?php echo $a;?></div></td>
    <td width="8%"  bgcolor="#CCCCCC" scope="col"><div align="center" class="Estilo10"><span class="Estilo28  Estilo1"><?php echo $tot1;?></span></div></td>

    <td width="36%"  bgcolor="#CCCCCC" scope="col"><div align="center" class="Estilo26 Estilo13 Estilo1 Estilo3"><?php echo $tot2;?></div></td>
    <td width="23%" bgcolor="#CCCCCC" scope="col"><div align="center" class="Estilo28 Estilo13 Estilo1 Estilo3"><?php echo $tot3;?></div></td>
    <td width="11%" bgcolor="#CCCCCC" scope="col"><div align="center" class="Estilo28 Estilo13 Estilo1 Estilo3"><?php echo $tot4;?></div></td>
    <td width="3%" bgcolor="#CCCCCC" class="Estilo28" scope="col"><div align="center" class="Estilo1 Estilo3"><?php echo $tot5;?></div></td>
<td width="3%" bgcolor="#CCCCCC" class="Estilo28" scope="col"><div align="center" class="Estilo1 Estilo3"><?php echo $tot6;?></div></td>

<td width="3%" bgcolor="#CCCCCC" class="Estilo28" scope="col"><div align="center" class="Estilo1 Estilo3"><?php echo $tot_fin;?></div></td>
 </tr>
</table>
<?PHP 

ECHO "<BR>";


$total_gastado = $total_unico + $total_ace + $monoclonales;

$total_ace = $tot4 + $tot5;

$tot_gas = $total_unico + $total_ace + $total_grupo3;
$tot_mono = $total_grupo3 + $papo_3;
   /*

 

 

 
 
$pdf->SetX(50);
$pdf->Cell(50,5,"TOTAL MONOCLONALES: ",1,0,'C',true); 
$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);
$pdf->SetFont('');

$pdf->Cell(50,5,'',1,0,'R'); 
$pdf->Cell(50,5,'',1,0,'R'); 
$pdf->Cell(50,5,number_format($tot_mono,2),1,0,'R'); 

$pdf->Output();
*/


?>
<table width="800" border="0">
  <tr>
    <td width="231" bgcolor="#CCCCCC"><div align="center" class="Estilo10">TIPO</div></td>
    <td width="173" bgcolor="#CCCCCC"><div align="center" class="Estilo10">ENTREGADO</div></td>
    <td width="204" bgcolor="#CCCCCC"><div align="center" class="Estilo10">TOTAL PROVISTO </div></td>
    <td width="174" bgcolor="#CCCCCC"><div align="center" class="Estilo10">MONOCLONAL</div></td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC"><div align="center" class="Estilo10">G1 UNICO </div></td>
    <td><div align="right"><span class="Estilo3"></span><span class="Estilo1 Estilo3"><?php echo $papo_1;?></span></div></td>
    <td><div align="right"><span class="Estilo3"></span></div></td>
    <td><div align="right"><span class="Estilo3"></span></div></td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC"><div align="center" class="Estilo10">G2 UNICO </div></td>
    <td><div align="right"><span class="Estilo3"></span><span class="Estilo1 Estilo3"><?php echo $papo_2;?></span></div></td>
    <td><div align="right"><span class="Estilo3"></span></div></td>
    <td><div align="right"><span class="Estilo3"></span></div></td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC"><div align="center" class="Estilo10">MONOCLONAL UNICO </div></td>
    <td><div align="right"><span class="Estilo3"></span><span class="Estilo1 Estilo3"><?php echo $papo_3;?></span></div></td>
    <td><div align="right"><span class="Estilo3"></span><span class="Estilo1 Estilo3"><?php echo $total_unico;?></span></div></td>
    <td><div align="right"><span class="Estilo3"></span><span class="Estilo1 Estilo3"><?php echo $papo_3;?></span></div></td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC"><div align="center"><span class="Estilo1"><span class="Estilo3"><span class="Estilo5"><span class="Estilo7"><span class="Estilo9"><span class="Estilo12"><span class="Estilo14"><span class="Estilo7"><span class="Estilo3"><span class="Estilo3"></span></span></span></span></span></span></span></span></span></span></div></td>
    <td><div align="right"><span class="Estilo3"></span></div></td>
    <td><div align="right"><span class="Estilo3"></span></div></td>
    <td><div align="right"><span class="Estilo3"></span></div></td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC"><div align="center" class="Estilo10">G1 ACE: </div></td>
    <td><div align="right"><span class="Estilo3"></span><span class="Estilo1 Estilo3"><?php echo $tot4;?></span></div></td>
    <td><div align="right"><span class="Estilo3"></span></div></td>
    <td><div align="right"><span class="Estilo3"></span></div></td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC"><div align="center" class="Estilo10">G2 ACE: </div></td>
    <td><div align="right"><span class="Estilo3"></span><span class="Estilo1 Estilo3"><?php echo $tot5;?></span></div></td>
    <td><div align="right"><span class="Estilo3"></span><span class="Estilo1 Estilo3"><?php echo $total_ace;?></span></div></td>
    <td><div align="right"><span class="Estilo3"></span></div></td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC"><div align="center"><span class="Estilo1"><span class="Estilo3"><span class="Estilo5"><span class="Estilo7"><span class="Estilo9"><span class="Estilo12"><span class="Estilo14"><span class="Estilo7"><span class="Estilo3"><span class="Estilo3"></span></span></span></span></span></span></span></span></span></span></div></td>
    <td><div align="right"><span class="Estilo3"></span></div></td>
    <td><div align="right"><span class="Estilo3"></span></div></td>
    <td><div align="right"><span class="Estilo3"></span></div></td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC"><div align="center" class="Estilo10">MONOCLONAL</div></td>
    <td><div align="right"><span class="Estilo3"></span><span class="Estilo1 Estilo3"><?php echo $tot6;?></span></div></td>
    <td><div align="right"><span class="Estilo3"></span><span class="Estilo1 Estilo3"><?php echo $total_grupo3;?></span></div></td>
    <td><div align="right"><span class="Estilo3"></span><span class="Estilo1 Estilo3"><?php echo $total_grupo3;?></span></div></td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC"><div align="center"><span class="Estilo1"><span class="Estilo3"><span class="Estilo5"><span class="Estilo7"><span class="Estilo9"><span class="Estilo12"><span class="Estilo14"><span class="Estilo7"><span class="Estilo3"><span class="Estilo3"></span></span></span></span></span></span></span></span></span></span></div></td>
    <td><div align="right"><span class="Estilo3"></span></div></td>
    <td><div align="right"><span class="Estilo3"></span></div></td>
    <td><div align="right"><span class="Estilo3"></span></div></td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC"><div align="center" class="Estilo10">TOTAL GASTADO </div></td>
    <td><div align="right"><span class="Estilo3"></span></div></td>
    <td><div align="right"><span class="Estilo3"></span><span class="Estilo1 Estilo3"><?php echo $tot_fin;?></span></div></td>
    <td><div align="right"><span class="Estilo3"></span></div></td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC"><div align="center"><span class="Estilo1"><span class="Estilo3"><span class="Estilo5"><span class="Estilo7"><span class="Estilo9"><span class="Estilo12"><span class="Estilo14"><span class="Estilo7"><span class="Estilo3"><span class="Estilo3"></span></span></span></span></span></span></span></span></span></span></div></td>
    <td><div align="right"><span class="Estilo3"></span></div></td>
    <td><div align="right"><span class="Estilo3"></span></div></td>
    <td><div align="right"><span class="Estilo3"></span></div></td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC"><div align="center" class="Estilo10">TOTAL MONOCLONALES </div></td>
    <td><div align="right"><span class="Estilo3"></span></div></td>
    <td><div align="right"><span class="Estilo3"></span></div></td>
    <td><div align="right"><span class="Estilo3"></span><span class="Estilo1 Estilo3"><?php echo $tot_mono;?></span></div></td>
  </tr>
</table>
