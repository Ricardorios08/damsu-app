	<table width="340" border="1" align="center" cellspacing="0">
          <tr bordercolor="#FFFFFF" bgcolor="#B8B8B8">
        <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">ENTREGA</font></div></td>
        <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">FECHA</font></div></td>
        <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">CANTIDAD</font></div></td>
        <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">PDF</font></div></td>
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


   $sql3="SELECT * FROM `tr_ventas_encabezado` where (documento = $documento and enviar = '$id')  order by nro_factura desc";
$result3 = $db->Execute($sql3);

  
   if (!$result3) die("fallo888".$db->ErrorMsg());
  while (!$result3->EOF) {
  
  
$tipo_fact=$result3->fields["tipo_fact"];  
$nro_factura=$result3->fields["nro_factura"];
$fecha=fecha_argentina($result3->fields["fecha"]);
$nro_receta=$result3->fields["nro_receta"];
$neto=$result3->fields["neto"];
$estado=$result3->fields["estado"];

if ($estado == ""){
$estado = "FACTURADO";
}



$sql4="SELECT * FROM `compras_encabezado` where nro_receta = $nro_receta";
$result4 = $db->Execute($sql4);
$nro_fact=$result4->fields["nro_factura"];  

$sql4="SELECT count(cod_mercaderia) as cant1 FROM `tr_ventas_detalle` where  nro_factura = $nro_factura";
$result4 = $db->Execute($sql4);
$cant1=$result4->fields["cant1"];

?>


      <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
        <td width="119" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><a href="../a_pacientes/modificar_des_diagnostico.php?id=<?php print("$documento");?>" target = "central1"></a></font>
            <font color="#000000" size="2" face="Trebuchet MS"><a href="cambiar_estado.php?nro_factura=<?php print("$nro_factura");?>&&documento=<?php print("$documento");?>&&estado=<?php print("$estado");?>" target = "central1"><?php print("$nro_factura");?> <img src="../../imagenes/office/730.ico"></a></font>
          </div>
        </div></td>
        <td width="86" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">
		
		
<?php print("$fecha");?>

</font></div></td>

        <td width="85" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><font color="#000000" size="2" face="Trebuchet MS"><font color="#000000" size="2" face="Trebuchet MS"><font color="#000000" size="2" face="Trebuchet MS"><font color="#000000" size="6" face="Trebuchet MS"><strong><?php echo $cant1;?></strong></font></font></font></font></font></div></td>
        <!-- <td width="74" height="24" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">$ <?php print("$neto");?></font></div></td> -->
 

        <td width="36" bgcolor="#E6E6E6"><a href="imprimir_pdf.php?nro_factura=<?php print("$nro_factura");?>" target = "central1"><img src="../../imagenes/logo_pdf.gif" width="32" height="23" alt="PDF" longdesc="PDF DESCARGAR"></a></td>
	  </tr>
      
      <?php 
  
  $result3->MoveNext();
	}
	
	?>
    </table>  


