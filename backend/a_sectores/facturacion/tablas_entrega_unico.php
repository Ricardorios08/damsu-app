	<table width="340" border="1" align="center" cellspacing="0">
     
	  <?php 

	  include ("../../conexiones/config_usu.php");

include ("../../funciones/funciones.php");

$cod_paciente= $_REQUEST['cod_paciente'];

$sql7="select * from pacientes where cod_paciente = $cod_paciente";
$result7 = $db->Execute($sql7);
$documento=$result7->fields["documento"];
$tipo_doc=$result7->fields["tipo_doc"];


  $sql3="SELECT * FROM compras_encabezado where documento = $documento and tipo_doc = '$tipo_doc'";
$result3 = $db->Execute($sql3);

  
   if (!$result3) die("fallo888".$db->ErrorMsg());
  while (!$result3->EOF) {
  
  
$tipo_fact=$result3->fields["tipo_fact"];  
$nro_factura=$result3->fields["nro_factura"];
$fecha=fecha_argentina($result3->fields["fecha"]);
$nro_receta=$result3->fields["nro_receta"];
$neto=$result3->fields["total"];




?>

      <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
        <td width="107" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$nro_factura");?></font></div></td>
        <td width="60" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">
		
		
<?php print("$fecha");?>

</font></div></td>

        <td width="86" height="24" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">$ <?php print("$neto");?></font></div></td>
        <td width="43" height="24" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$nro_receta");?></font></div></td>

        <td width="43" bgcolor="#E6E6E6"><div align="center"><a href="../facturacion_unico/imprimir_pdf.php?nro_factura=<?php print("$nro_factura");?>" target = "central1"><img src="../../imagenes/logo Pdf.png" width="32" height="23" alt="PDF" longdesc="PDF DESCARGAR"></a></div></td>
     
		<td width="32" bgcolor="#E6E6E6">
		
		<?php if ($nro_fact != ""){?>
		<div align="center"><a href="imprimir_pdf.php?nro_receta=<?php print("$nro_receta");?>" target = "central1"> <img src="../../imagenes/logo Pdf.png" width="32" height="23" alt="PDF" longdesc="PDF DESCARGAR"></a> </div>
		<?php }?>
		
		</td>

      </tr>
      <?php 
  
  $result3->MoveNext();
	}
	
	?>
    </table>  
