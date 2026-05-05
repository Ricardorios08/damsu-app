<style type="text/css">
<!--
.Estilo1 {font-size: 9px}
.Estilo3 {font-family: Arial, Helvetica, sans-serif}
.Estilo4 {
	color: #0000FF;
	font-weight: bold;
}
.Estilo6 {color: #FF0000}
.Estilo8 {
	color: #FF0000;
	font-size: 14px;
	font-family: Arial, Helvetica, sans-serif;
}
.Estilo10 {font-family: Arial, Helvetica, sans-serif; font-size: 10px; }
.Estilo11 {font-size: 10px}
.Estilo13 {color: #0000FF}
.Estilo15 {color: #006600; font-weight: bold; }
.Estilo17 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #0000FF;
}
.Estilo18 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; color: #FF0000; }
.Estilo21 {color: #006600; font-family: Arial, Helvetica, sans-serif; }
.Estilo22 {font-size: 12px}
.Estilo24 {color: #FF0000; font-weight: bold; }
.Estilo25 {
	color: #009900;
	font-weight: bold;
}
-->
H1.SaltoDePagina
{
PAGE-BREAK-AFTER: always
}
</STYLE>

<body onUnload="window.opener.openedImprimir=0;" onLoad="window.print(); window.close();">

<div align="left">

  <table width="660" border="1">
    <tr>
      <th width="179" scope="col"><span class="Estilo15">PAMI </span></th>
      <th width="254" scope="col"><span class="Estilo4">FACTURACION</span></th>
      <th width="108" scope="col"><span class="Estilo13">PERIODO: 06 </span></th>
      <th width="86" scope="col"><span class="Estilo13">A&Ntilde;O: 2007</span></th>
    </tr>
  </table>

    <?
$nro = 1;
global $importe;
global $total_acumulado;
global $cont;

$cont = 1;



include ("convenio.php");
include ("998677001.php");

include ("../../conexiones/config_gb.php");
$sql = "SELECT nro_laboratorio FROM `detalle` WHERE 1 AND `nro_os` = 5073 AND `periodo` = 06 AND `ano` LIKE '07' AND `confirmada` = 1 GROUP BY nro_laboratorio";
$result = $db->Execute($sql);



if (!$result) die("fallo".$db->ErrorMsg());
	 while (!$result->EOF) { 

$nro_laboratorio=ucwords($result->fields["nro_laboratorio"]);
include ("../../conexiones/config.inc.php");
$sql4 = "SELECT nombre_laboratorio FROM `datos_laboratorio` WHERE  `nro_laboratorio` = $nro_laboratorio";
$result5 = $db->Execute($sql4);
$nombre_laboratorio=ucwords($result5->fields["nombre_laboratorio"]);
$nombre_laboratorio." (".$nro_laboratorio.")";

?>
</div>
<table width="661" height="150" border="0">
  <!--DWLayoutTable-->
  <tr bgcolor="#DAFAFC" class="Estilo1">
    <td height="21" colspan="7" bgcolor="#FFFFFF" scope="col"><span class="Estilo8"><?echo $nombre_laboratorio." (".$nro_laboratorio.")";?></span></td>
  </tr>
  <tr bgcolor="#DAFAFC" class="Estilo1">
    <td width="68" height="15" scope="col"><div align="center" class="Estilo1 ">
      <div align="left"><span class="Estilo1">Orden </span></div>
    </div></td>
    <td width="53" scope="col"><div align="center" class="Estilo1 ">
      <div align="left">Afiliados</div>
    </div></td>
    <td width="52" scope="col"><div align="center" class="Estilo1">
      <div align="left">Fecha</div>
    </div></td>
  <td colspan="4" scope="col"><div align="center" class="Estilo1">
    <div align="left">Prestaciones </div>
  </div>    
  </tr>
  
  <span class="Estilo6">
<?
include ("../../conexiones/config_gb.php");
$sql1 = "SELECT cod_grabacion, nro_orden FROM `detalle` WHERE 1 AND `nro_os` = 5073 AND `nro_laboratorio` = $nro_laboratorio AND `periodo` = 6 AND `ano` LIKE '07' AND `confirmada` = 1 group by cod_grabacion";
$result1 = $db->Execute($sql1);

if (!$result1) die("fallo2".$db->ErrorMsg());
	 while (!$result1->EOF) { 

$contador_ordenes = $contador_ordenes + 1;
$ordenes_facturadas = $ordenes_facturadas + 1;

$cod_grabacion=ucwords($result1->fields["cod_grabacion"]);
$nro_orden=ucwords($result1->fields["nro_orden"]);


//$sql2 = "SELECT nro_practica FROM `detalle` WHERE cod_grabacion = $cod_grabacion order by nro_practica";

include ("../../conexiones/config_gb.php");
$sql6 = "SELECT ordenes_grabadas.detalle.nro_practica, practicas.convenio_practica.valor, practicas.convenio_practica.gastos, practicas.convenio_practica.honorarios, practicas.convenio_practica.toma, practicas.convenio_practica.urgencia, practicas.convenio_practica.material_descartable, practicas.convenio_practica.honorarios, practicas.convenio_practica.autorizada FROM ordenes_grabadas.detalle INNER JOIN practicas.convenio_practica ON ordenes_grabadas.detalle.nro_practica = practicas.convenio_practica.cod_practica WHERE practicas.convenio_practica.nro_os = 5073 AND ordenes_grabadas.detalle.cod_grabacion = $cod_grabacion";
$result3 = $db->Execute($sql6);

$sql4 = "SELECT nro_afiliado, fecha FROM `ordenes` WHERE cod_grabacion = $cod_grabacion";
$result4 = $db->Execute($sql4);
$nro_afiliado=$result4->fields["nro_afiliado"];
$fecha=$result4->fields["fecha"];


?></span>

  <tr>
    <td height="27" scope="col"><span class="Estilo10 "><?echo $nro_orden;?></span></td>
    <td scope="col"><span class="Estilo10"><?echo $nro_afiliado;?></span></td>
    <td scope="col"><span class="Estilo10"><?echo $fecha;?></span></td>
    <td colspan="3" valign="top" class="Estilo10" scope="col">                                            <div align="justify" class="Estilo11 ">
      <?

if (!$result3) die("fallo3".$db->ErrorMsg());
	 while (!$result3->EOF) { 

$nro_practica=$result3->fields["nro_practica"];
$honorarios=$result3->fields["honorarios"];
$gastos=$result3->fields["gastos"];
$toma=$result3->fields["toma"];
$urgencia=$result3->fields["urgencia"];
$mate_desc=$result3->fields["material_descartable"];
$valor=$result3->fields["valor"];
$autorizada=$result3->fields["autorizada"];

/*include ("../../conexiones/config_fa.php");
$auxiliar= "INSERT INTO `auxiliar` ( `material` ,`cod_grabacion` ) VALUES ('$mate_desc' , '$cod_grabacion')";
mysql_query($auxiliar);
*/
		
$cont = $cont + 1;

/*if ($cont == 8){
echo "<br>";
$cont= 1;
}
*/

echo "(".$nro_practica=ucwords($result3->fields["nro_practica"])." - $".number_format($valor,2).") ";
$importe = ($importe + $valor);//valor de practicas
$importe1 = ($importe1 + $valor); //valor por orden
$total_acumulado = $total_acumulado + $valor; //
$result3->MoveNext();


}


echo "(998 - ".number_format($valor_998,2).") ";
echo "(677 - ".number_format($valor_677,2).") ";

?> 
    <td width="119" valign="top" class="Estilo10" scope="col">                                <div align="right">$      
        <?   
  echo $importe = $importe + $valor_998 + $valor_677;
?>    
    </div>
  </tr>
    <?

  $importe1 = $importe1 + $valor_998 + $valor_677;
    $importe = 0;

?>
 
  <?
	
$cont = 1;
//$importe = $importe + $valor_998 + $valor_677;
//$total_acumulado = $total_acumulado + $valor_998 + $valor_677;

$result1->MoveNext();

}

?><tr>
    <td height="23" colspan="5" class="Estilo21" scope="col"><span class="Estilo22">Cantidad de Ordenes:<?echo $contador_ordenes?> </span></td>
    <td colspan="2" scope="col"><div align="right"><span class="Estilo25">Total $ </span><span class="Estilo24"><?echo number_format($importe1,2);?></span></div></td>
    <?
ECHO "<HR>";
$contador_ordenes=0;

  $acumulado_por_orden=0;
  $importe1= 0;

$result->MoveNext();
}


?>
  <tr>
    <td height="25" colspan="7" scope="col"><HR></td>
  <tr>
    <td height="25" colspan="4" valign="top" scope="col"><span class="Estilo4 Estilo3">Ordenes Facturadas</span> <span class="Estilo18"><?ECHO $ordenes_facturadas;?></span></td>
    <td colspan="3" valign="top" scope="col"> <div align="right" class="Estilo18"><span class="Estilo17">TOTAL FACTURADO </span><?ECHO "$ ". number_format($total_acumulado,2);?>
               
  </div></td>
  <tr>
    <td height="3"></td>
    <td></td>
    <td></td>
    <td width="80"></td>
    <td width="80"></td>
    <td width="179"></td>
    <td></td>
  </tr>
</table>
  <span class="Estilo10"></span>
<H1 class=SaltoDePagina> </H1>
<? include ("final.php");?>
