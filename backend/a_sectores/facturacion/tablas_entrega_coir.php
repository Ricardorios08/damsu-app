	<table width="340" border="1" align="center" cellspacing="0">
        <tr bordercolor="#FFFFFF" bgcolor="#B8B8B8">
        <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif">ENTREGA</font></div></td>
        <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif">FECHA</font></div></td>
        <td height="24"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif">RECEPCION</font></div></td>
        <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif">INDICACION</font></div></td>
        <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif">INFUSION</font></div></td>
      </tr>   
	  <?php 

	  include ("../../conexiones/config_usu.php");

include ("../../funciones/funciones.php");

$cod_paciente= $_REQUEST['cod_paciente'];
$id= $_REQUEST['id'];


$sql7="select * from pacientes where cod_paciente = $cod_paciente";
$result7 = $db->Execute($sql7);
$documento=$result7->fields["documento"];
$tipo_doc=$result7->fields["tipo_doc"];


    $sql3="SELECT * FROM `tr_ventas_encabezado` WHERE (documento = $documento and enviar = '$id')  order by nro_factura desc";
$result3 = $db->Execute($sql3);

  
   if (!$result3) die("fallo888".$db->ErrorMsg());
  while (!$result3->EOF) {
  
  
$tipo_fact=$result3->fields["tipo_fact"];  
$nro_factura=$result3->fields["nro_factura"];
$fecha=fecha_argentina($result3->fields["fecha_coir"]);
$nro_receta=$result3->fields["nro_receta"];
$neto=$result3->fields["neto"];
$estado=$result3->fields["estado"];

 



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
        <td width="63" rowspan="2" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"></font>
            <font color="#000000" size="2" face="Trebuchet MS"><!--<a href="cambiar_estado_coir.php?nro_factura=<?php print("$nro_factura");?>&&documento=<?php print("$documento");?>&&estado=<?php print("$estado");?>" target = "central1"><img src="../../imagenes/office/734.ico"><?php print("$nro_factura");?></a>--> 
            </font>
            <font color="#000000" size="2" face="Trebuchet MS"><?php print("$nro_factura");?></font> </div>
        </div></td>
        <td width="66" rowspan="2" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">
		
		
<?php print("$fecha");?>

</font></div></td>



<?php

	if ($cant1 == $cant2){$recep = "../../imagenes/bot_recep1.jpg";}else{$recep = "../../imagenes/bot_recep.jpg";}
	if ($cant3 == $cant4){$indic = "../../imagenes/bot_indic1.jpg";}else{$indic = "../../imagenes/bot_indic.jpg";}
	if ($cant5 == $cant6){$prep = "../../imagenes/bot_prep1.jpg";}else{$prep = "../../imagenes/bot_prep.jpg";}

 

?>


        <td width="60" height="12" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><a href="detalle_factura_r.php?nro_factura=<?php print("$nro_factura");?>&&documento=<?php print("$documento");?>&&estado=<?php print("$estado");?>&&id=<?php print("$id");?>" target = "central1"><img src="<?php echo $recep;?>" width="42" height="42"></a> <strong></strong></font></div></td>
 

        <td width="57" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><a href="detalle_factura_i.php?nro_factura=<?php print("$nro_factura");?>&&documento=<?php print("$documento");?>&&estado=<?php print("$estado");?>&&id=<?php print("$id");?>" target = "central1"><img src="<?php echo $indic;?>" width="42" height="42"></a> <strong></strong></font></div></td>


        <td width="72" bgcolor="#E6E6E6">
          <div align="center"><font color="#000000" size="2" face="Trebuchet MS"><a href="detalle_factura_p.php?nro_factura=<?php print("$nro_factura");?>&&documento=<?php print("$documento");?>&&estado=<?php print("$estado");?>&&id=<?php print("$id");?>" target = "central1"><img src="<?php echo $prep;?>" width="42" height="42"></a> <strong></strong></font></div></td>
	  </tr>
      <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
        <td width="60" height="12" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><strong><font size="4"><?php echo $cant1;?>/<?php echo $cant2;?></font></strong></font></div></td>
        <td width="57" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><strong><font size="4"><?php echo $cant3;?>/<?php echo $cant4;?></font></strong></font></div></td>
        <td bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><strong><font size="4"><?php echo $cant5;?>/<?php echo $cant6;?></font></strong></font></div></td>
      </tr>
      
      <?php 
  
  $result3->MoveNext();
	}
	
	?>
    </table>  


