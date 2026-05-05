	<table width="340" border="1" align="center" cellspacing="0">
       <tr bordercolor="#FFFFFF" bgcolor="#B8B8B8">
        <td bgcolor="#B8B8B8"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">N&deg; ENTREGA </font></div></td>
        <td bgcolor="#B8B8B8"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">ESTADO</font></div></td>
        <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">REC</font></div></td>
        <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">PRE</font></div></td>
        <td bgcolor="#B8B8B8"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">PDF</font></div></td>
  </tr>
	  
	  <?php 

	  include ("../../conexiones/config_usu.php");

include ("../../funciones/funciones.php");

$cod_paciente= $_REQUEST['cod_paciente'];

$sql7="select * from pacientes where cod_paciente = $cod_paciente";
$result7 = $db->Execute($sql7);
$documento=$result7->fields["documento"];
$tipo_doc=$result7->fields["tipo_doc"];


   $sql3="SELECT * FROM `tr_ventas_encabezado` where (documento = $documento and enviar = 'COIR') order by nro_factura desc";
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

$sql4="SELECT count(cod_mercaderia) as cant1 FROM `tr_ventas_detalle` where  nro_factura = $nro_factura and recibido_farmacia = 1";
$result4 = $db->Execute($sql4);
$cant1=$result4->fields["cant1"];

$sql4="SELECT count(cod_mercaderia) as cant1 FROM `tr_ventas_detalle` where  nro_factura = $nro_factura and preparado_coir = 1";
$result4 = $db->Execute($sql4);
$cant2=$result4->fields["cant1"];

$sql4="SELECT count(cod_mercaderia) as cant1 FROM `tr_ventas_detalle` where  nro_factura = $nro_factura and recibido_coir = 1";
$result4 = $db->Execute($sql4);
$cant3=$result4->fields["cant1"];

$tot = $cant1 + $cant2;

if ($tot == 0){
?>

      <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
        <td width="87" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$nro_factura");?> <img src="../../imagenes/office/730.ico"></font>
          </div>
        </div></td>

<?php }else{?>

      <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
        <td width="87" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><a href="../a_pacientes/modificar_des_diagnostico.php?id=<?php print("$documento");?>" target = "central1"></a></font>
            <font color="#000000" size="2" face="Trebuchet MS"><a href="cambiar_estado_coir_recibido.php?nro_factura=<?php print("$nro_factura");?>&&documento=<?php print("$documento");?>&&estado=<?php print("$estado");?>" target = "central1"><?php print("$nro_factura");?> <img src="../../imagenes/office/730.ico"></a></font>
          </div>
        </div></td>

<?php 
}

?>

        <td width="83" bgcolor="#E6E6E6"><div align="center">
          <div align="center"><font color="#000000" size="2" face="Trebuchet MS"><a href="detalle_factura_f.php?nro_factura=<?php print("$nro_factura");?>&&documento=<?php print("$documento");?>&&estado=<?php print("$estado");?>" target = "central1"><img src="../../imagenes/bot_estado.jpg" width="42" height="42"></a></font></div>
        </div></td>
 

        <td width="27" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><font color="#000000" size="2" face="Trebuchet MS"><font color="#000000" size="2" face="Trebuchet MS"><font color="#000000" size="2" face="Trebuchet MS"><font color="#000000" size="6" face="Trebuchet MS"><strong><?php echo $cant3;?></strong></font></font></font><font color="#000000" size="6" face="Trebuchet MS"></font></font><font color="#000000" size="6" face="Trebuchet MS"></font><font color="#000000" size="2" face="Trebuchet MS"><font color="#000000" size="6" face="Trebuchet MS"></font></font></font></div></td>
        <td width="27" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><font color="#000000" size="2" face="Trebuchet MS"><font color="#000000" size="6" face="Trebuchet MS"><strong><?php echo $cant2;?></strong></font></font><font color="#000000" size="6" face="Trebuchet MS"></font></font></div></td>
        <td width="49" bgcolor="#E6E6E6"><div align="center"><a href="imprimir_pdf_coir.php?nro_factura=<?php print("$nro_factura");?>" target = "central1"><img src="../../imagenes/logo Pdf.gif" width="32" height="23" alt="PDF" longdesc="PDF DESCARGAR"></a></div></td>
	  </tr>
      
      <?php 
  
  $result3->MoveNext();
	}
	
	?>
    </table>  


