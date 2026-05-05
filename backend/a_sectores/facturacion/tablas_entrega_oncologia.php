	<table width="381" border="1" align="center" cellspacing="0">
     
	  <?php 

	  include ("../../conexiones/config_usu.php");

include ("../../funciones/funciones.php");

$cod_paciente= $_REQUEST['cod_paciente'];

$sql7="select * from pacientes where cod_paciente = $cod_paciente";
$result7 = $db->Execute($sql7);
$documento=$result7->fields["documento"];
$tipo_doc=$result7->fields["tipo_doc"];


   $sql3="SELECT * FROM `tr_ventas_encabezado` where (documento = $documento  and estado = 'EN ONCOLOGIA')  order by nro_factura desc";
$result3 = $db->Execute($sql3);

  
   if (!$result3) die("fallo888".$db->ErrorMsg());
  while (!$result3->EOF) {
  
  
$tipo_fact=$result3->fields["tipo_fact"];  
$nro_factura=$result3->fields["nro_factura"];
$fecha=fecha_argentina($result3->fields["fecha"]);
$nro_receta=$result3->fields["nro_receta"];
$neto=$result3->fields["neto"];
$estado=$result3->fields["estado"];

 



$sql4="SELECT * FROM `compras_encabezado` where nro_receta = $nro_receta";
$result4 = $db->Execute($sql4);
$nro_fact=$result4->fields["nro_factura"];  

$sql4="SELECT count(cod_mercaderia) as cant1 FROM `tr_ventas_detalle` where  nro_factura = $nro_factura and recibido_servicio = 1";
$result4 = $db->Execute($sql4);
$cant1=$result4->fields["cant1"];

$sql4="SELECT count(cod_mercaderia) as cant1 FROM `tr_ventas_detalle` where  nro_factura = $nro_factura and recibido_farmacia = 1";
$result4 = $db->Execute($sql4);
$cant2=$result4->fields["cant1"];

$tot = $cant1 + $cant2;


/////////////////////

$sql4="SELECT count(cod_mercaderia) as cant1 FROM `tr_ventas_detalle` where  nro_factura = $nro_factura and aplicado_servicio = 1";
$result4 = $db->Execute($sql4);
$cant3=$result4->fields["cant1"];

$sql4="SELECT count(cod_mercaderia) as cant1 FROM `tr_ventas_detalle` where  nro_factura = $nro_factura and recibido_servicio = 1";
$result4 = $db->Execute($sql4);
$cant4=$result4->fields["cant1"];

$tot = $cant1 + $cant2;




?>

      <tr bordercolor="#FFFFFF" bgcolor="#B8B8B8">
        <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">ENTREGA</font></div></td>
        <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">FECHA</font></div></td>
        <td colspan="2"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">RECEPCIONAR</font></div></td>
        <td colspan="2" bgcolor="#B8B8B8"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">APLICAR</font> </div>          <div align="center"></div></td>
      </tr>
      <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
        <td width="62" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><a href="../a_pacientes/modificar_des_diagnostico.php?id=<?php print("$documento");?>" target = "central1"></a></font>
            <font color="#000000" size="2" face="Trebuchet MS"><!--<a href="cambiar_estado_oncologia_vuelta.php?nro_factura=<?php print("$nro_factura");?>&&documento=<?php print("$documento");?>&&estado=<?php print("$estado");?>" target = "central1"><img src="../../imagenes/office/730.ico"><?php print("$nro_factura");?></a>--><?php print("$nro_factura");?></font>
          </div>
        </div></td>
        <td width="58" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">
		
		
<?php print("$fecha");?>

</font></div></td>

        <td width="76" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><a href="detalle_factura_oncologia.php?nro_factura=<?php print("$nro_factura");?>&&documento=<?php print("$documento");?>&&estado=<?php print("$estado");?>" target = "central1"><img src="../../imagenes/bot_recep.jpg" width="42" height="42"></a></font></div></td>
 

        <td width="53" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><font color="#000000" size="5" face="Trebuchet MS"><strong><?php echo $cant1;?>/<?php echo $cant2;?></strong></font></font></div></td>
        <td width="53" bgcolor="#E6E6E6"><font color="#000000" size="2" face="Trebuchet MS"><a href="detalle_factura_oncologia_aplicado.php?nro_factura=<?php print("$nro_factura");?>&&documento=<?php print("$documento");?>&&estado=<?php print("$estado");?>" target = "central1"><img src="../../imagenes/bot_aplicar.jpg" width="42" height="42"></a></font></td>
        <td width="53" bgcolor="#E6E6E6"><font color="#000000" size="2" face="Trebuchet MS"><font color="#000000" size="5" face="Trebuchet MS"><strong><?php echo $cant3;?>/<?php echo $cant4;?></strong></font></font></td>
	  </tr>
      
      <?php 
  
  $result3->MoveNext();
	}
	
	?>
    </table>  


