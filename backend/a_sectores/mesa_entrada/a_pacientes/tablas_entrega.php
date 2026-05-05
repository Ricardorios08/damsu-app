	<table width="350" border="1" align="center" cellspacing="0">
     
	  <?php 

	  include ("../../../conexiones/config_usu.php");

include ("../../../funciones/funciones.php");
$documento= $_REQUEST['documento'];
$tipo_doc= $_REQUEST['tipo_doc'];
$cod_paciente= $_REQUEST['cod_paciente'];


 $sql3=" SELECT * FROM `tr_ventas_encabezado` where nro_cliente = $cod_paciente";
$result3 = $db->Execute($sql3);

  
   if (!$result3) die("fallo888".$db->ErrorMsg());
  while (!$result3->EOF) {
  
  
  
$nro_factura=$result3->fields["nro_factura"];
$fecha=fecha_argentina($result3->fields["fecha"]);
$nro_receta=$result3->fields["nro_receta"];
$neto=$result3->fields["neto"];

?>

      <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
        <td width="82" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">
		
		
<a href="../a_pacientes/modificar_des_diagnostico.php?id=<?php print("$documento");?>" target = "central1"><?php print("$fecha");?></a>

</font></div></td>

        <td width="76" height="24" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">$ <?php print("$neto");?></font></div></td>
        <td width="88" height="24" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$nro_receta");?></font></div></td>

        <td width="88" bgcolor="#E6E6E6"><div align="center"><img src="../../../imagenes/logo Pdf.png" width="32" height="23" alt="PDF" longdesc="PDF DESCARGAR"></div></td>
      </tr>
      <?php 
  
  $result3->MoveNext();
	}
	
	?>
    </table>  
