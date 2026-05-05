	<table width="340" border="1" align="center" cellspacing="0">
     
	  <?php 

	  include ("../../conexiones/config_usu.php");

include ("../../funciones/funciones.php");

$cod_paciente= $_REQUEST['cod_paciente'];

$sql7="select * from pacientes where cod_paciente = $cod_paciente";
$result7 = $db->Execute($sql7);
$documento=$result7->fields["documento"];
$tipo_doc=$result7->fields["tipo_doc"];


    $sql3="SELECT * FROM `tr_ventas_encabezado` where documento = $documento  order by nro_factura desc";
$result3 = $db->Execute($sql3);

  
   if (!$result3) die("fallo888".$db->ErrorMsg());
  while (!$result3->EOF) {
  
  
$tipo_fact=$result3->fields["tipo_fact"];  
$nro_factura=$result3->fields["nro_factura"];
$fecha=fecha_argentina($result3->fields["fecha"]);
$nro_receta=$result3->fields["nro_receta"];
$neto=$result3->fields["neto"];


$sql4="SELECT * FROM `compras_encabezado` where nro_receta = $nro_receta";
$result4 = $db->Execute($sql4);
$nro_fact=$result4->fields["nro_factura"];  



?>

      <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
        <td width="61" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><a href="../a_pacientes/modificar_des_diagnostico.php?id=<?php print("$documento");?>" target = "central1"></a></font>
            <font color="#000000" size="2" face="Trebuchet MS"><a href="imprimir_pdf.php?nro_factura=<?php print("$nro_factura");?>" target = "central1"><?php print("$nro_factura");?></a></font>
          </div>
        </div></td>
        <td width="64" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">
		
		
<?php print("$fecha");?>

</font></div></td>

        <td width="74" height="24" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">$ <?php print("$neto");?></font></div></td>
        <td width="36" height="24" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$nro_receta");?></font></div></td>

        <td width="41" bgcolor="#E6E6E6"><div align="center"><a href="imprimir_pdf.php?nro_factura=<?php print("$nro_factura");?>" target = "central1"><img src="../../imagenes/logo_pdf.gif" width="32" height="23" alt="PDF" longdesc="PDF DESCARGAR"></a></div></td>
     
		<td width="38" bgcolor="#E6E6E6">
		
		<?php if ($nro_fact != ""){?>
		<div align="center"> </div>
		<?php }?>		</td>
      </tr>
      
      <?php 
  
  $result3->MoveNext();
	}
	
	?>
    </table>  


	<table width="340" border="1" align="center" cellspacing="0">
         <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
        <td height="24" colspan="6" bgcolor="#62B0FF"><div align="center"><font size="2" face="Trebuchet MS">DEVOLUCIONES</font></div></td>
      </tr>  
	  <?php 



$cod_paciente= $_REQUEST['cod_paciente'];

$sql7="select * from pacientes where cod_paciente = $cod_paciente";
$result7 = $db->Execute($sql7);
$documento=$result7->fields["documento"];
$tipo_doc=$result7->fields["tipo_doc"];


  $sql3="SELECT * FROM compras_encabezado where documento = $documento and tipo_doc = '$tipo_doc' order by nro_factura desc";
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
        <td width="62" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$nro_factura");?></font></div></td>
        <td width="59" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">
		
		
<?php print("$fecha");?>

</font></div></td>

        <td width="78" height="24" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">$ <?php print("$neto");?></font></div></td>
        <td width="36" height="24" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$nro_receta");?></font></div></td>

        <td width="41" bgcolor="#E6E6E6">&nbsp;</td>
     
		<td width="38" bgcolor="#E6E6E6">
		
	
		<div align="center"><a href="../facturacion_unico/imprimir_pdf.php?nro_factura=<?php print("$nro_factura");?>" target = "central1"><img src="../../imagenes/logo Pdf.gif" width="32" height="23" alt="PDF" longdesc="PDF DESCARGAR"></a><a href="imprimir_pdf.php?nro_receta=<?php print("$nro_receta");?>" target = "central1"></a> </div>
			</td>
      </tr>
      <?php 
  
  $result3->MoveNext();
	}
	
	?>
    </table>  
