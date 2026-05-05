	<table width="100%" border="1" align="center" cellspacing="0">
        <!--DWLayoutTable-->
        <tr bordercolor="#FFFFFF" bgcolor="#B8B8B8">

		 <td width="9%"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif">FECHA</font></div></td>
		  <td width="10%"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif">PDF</font></div></td>
		  <td width="12%"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif">ENTREGA</font></div></td>
        <td width="15%"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif">PRESTADOR</font></div></td>
        <td colspan="2"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif">RECEPCION</font></div></td>
        <td colspan="2"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif">INDICACION</font></div></td>
        <td colspan="2"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif">PREPARACION</font></div></td>
      </tr>   
	  <?php 

	  include ("../../conexiones/config_usu.php");

include ("../../funciones/funciones.php");

$cod_paciente= $_REQUEST['cod_paciente'];

$sql7="select * from pacientes where cod_paciente = $cod_paciente";
$result7 = $db->Execute($sql7);
$documento=$result7->fields["documento"];
$tipo_doc=$result7->fields["tipo_doc"];


   $sql3="SELECT * FROM `tr_ventas_encabezado` WHERE (documento = $documento)  order by nro_factura desc";
$result3 = $db->Execute($sql3);

  
   if (!$result3) die("fallo888".$db->ErrorMsg());
  while (!$result3->EOF) {
  
  
$tipo_fact=$result3->fields["tipo_fact"];  
$nro_factura=$result3->fields["nro_factura"];
$fecha_ingreso=fecha_argentina($result3->fields["fecha"]);
$fecha=fecha_argentina($result3->fields["fecha_coir"]);
$nro_receta=$result3->fields["nro_receta"];
$neto=$result3->fields["neto"];
$estado=$result3->fields["estado"];

 $enviar=$result3->fields["enviar"];
$nombre_prestador=$result3->fields["nombre_prestador"];


$sql4="SELECT * FROM `compras_encabezado` where nro_receta = $nro_receta";
$result4 = $db->Execute($sql4);
$nro_fact=$result4->fields["nro_factura"];  


    $sql4="SELECT count(cod_mercaderia) as cant1 FROM `tr_ventas_detalle` where  nro_factura = $nro_factura and recibido_coir = 1";
$result4 = $db->Execute($sql4);
 $cant1=$result4->fields["cant1"];


   $sql4="SELECT count(cod_mercaderia) as cant1 FROM `tr_ventas_detalle` where  nro_factura = $nro_factura";
$result4 = $db->Execute($sql4);
$cant2=$result4->fields["cant1"];


////////////////////////////////
$sql4="SELECT count(cod_mercaderia) as cant1 FROM `tr_ventas_detalle` where  nro_factura = $nro_factura and indicado_coir = 1";
$result4 = $db->Execute($sql4);
$cant3=$result4->fields["cant1"];

   $sql4="SELECT count(cod_mercaderia) as cant1 FROM `tr_ventas_detalle` where  nro_factura = $nro_factura and recibido_coir = 1";
$result4 = $db->Execute($sql4);
$cant4=$result4->fields["cant1"];

////////////////////////////////
$sql4="SELECT count(cod_mercaderia) as cant1 FROM `tr_ventas_detalle` where  nro_factura = $nro_factura and preparado_coir = 1";
$result4 = $db->Execute($sql4);
$cant5=$result4->fields["cant1"];

   $sql4="SELECT count(cod_mercaderia) as cant1 FROM `tr_ventas_detalle` where  nro_factura = $nro_factura and indicado_coir = 1";
$result4 = $db->Execute($sql4);
$cant6=$result4->fields["cant1"];


?>


      <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">

  <td bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="4" face="Trebuchet MS"><?php print("$fecha_ingreso");?>

</font></div></td>


	   <td bgcolor="#E6E6E6"><div align="center"><a href="imprimir_pdf.php?nro_factura=<?php print("$nro_factura");?>" target = "central1"><img src="../../imagenes/logo_pdf.gif" width="32" height="23" alt="PDF" longdesc="PDF DESCARGAR"></a> <a href="modificar_cabecera.php?nro_factura=<?php print("$nro_factura");?>" target = "central1">Mod</a></div></td>
	   <td bgcolor="#E6E6E6"><div align="center">  
           <font color="#000000" size="2" face="Trebuchet MS"><?php print("$nro_factura");?></font> </div>
        </div></td>
        <td bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">
		
		
<?php print("$nombre_prestador");?>

</font></div></td>



<?php

	if ($cant1 == $cant2){$recep = "../../imagenes/bot_recep1.jpg";}else{$recep = "../../imagenes/bot_recep.jpg";}
	if ($cant3 == $cant4){$indic = "../../imagenes/bot_indic1.jpg";}else{$indic = "../../imagenes/bot_indic.jpg";}
	if ($cant5 == $cant6){$prep = "../../imagenes/bot_prep1.jpg";}else{$prep = "../../imagenes/bot_prep.jpg";}

 

?>


        <td width="12%" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><a href="dam_detalle_factura_r.php?nro_factura=<?php print("$nro_factura");?>&&documento=<?php print("$documento");?>&&estado=<?php print("$estado");?>" target = "central1"><img src="<?php echo $recep;?>" width="42" height="42"></a> <strong></strong></font></div>          <div align="center"><font color="#000000" size="2" face="Trebuchet MS"><strong></strong></font></div></td>
 

        <td width="9%" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><strong><font size="4"><?php echo $cant1;?>/<?php echo $cant2;?></font></strong></font></div></td>
        <td width="7%" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><a href="dam_detalle_factura_i.php?nro_factura=<?php print("$nro_factura");?>&&documento=<?php print("$documento");?>&&estado=<?php print("$estado");?>" target = "central1"><img src="<?php echo $indic;?>" width="42" height="42"></a> <strong></strong></font></div>          <div align="center"><font color="#000000" size="2" face="Trebuchet MS"><strong></strong></font></div></td>


        <td width="8%" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><strong><font size="4"><?php echo $cant3;?>/<?php echo $cant4;?></font></strong></font></div></td>
        <td width="9%" bgcolor="#E6E6E6">
          <div align="center"><font color="#000000" size="2" face="Trebuchet MS"><a href="dam_detalle_factura_p.php?nro_factura=<?php print("$nro_factura");?>&&documento=<?php print("$documento");?>&&estado=<?php print("$estado");?>" target = "central1"><img src="<?php echo $prep;?>" width="42" height="42"></a> <strong></strong></font></div>          <div align="center"><font color="#000000" size="2" face="Trebuchet MS"><strong></strong></font></div></td>
	    <td width="9%" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><strong><font size="4"><?php echo $cant5;?>/<?php echo $cant6;?></font></strong></font></div></td>
      </tr>

      <?php 
  
  $result3->MoveNext();
	}
	
	?>
    </table>  


