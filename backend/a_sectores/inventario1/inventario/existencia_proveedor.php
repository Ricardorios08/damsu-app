<?php 
global $buscador_rapido;

if ($borrar != 1){
$buscador_rapido=$_POST["buscador_rapido"];
}

$hoy = date("d/m/Y");
 include("../../../conexiones/config_pro.php");

$a = "inventario.xls";

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$a");

$B = 1;


?>

<!-- <body onUnload="window.opener.openedImprimir=0;" onLoad="window.print(); window.close(); cerrar()">  -->
<font color="#000000" face="Arial, Helvetica, sans-serif">PLANILLA TOMA DE INVENTARIO. Emitido el <?php echo $hoy;?> </font>
<table width="1012" border="0">
  <tr>
    <td width="57"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">PRODUCTO</font></div></td>
    <td width="232"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">PRESENTACION</font></td>
    <td width="101"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">LOTE</font></div></td>
    <td width="80"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">VTO</font></div></td>
    <td width="55"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">CANT</font></div></td>
    <td width="91"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">LOTE</font></div></td>
    <td width="74"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">VTO</font></div></td>
    <td width="54"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">CANT</font></div></td>
    <td width="97"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">LOTE</font></div></td>
    <td width="60"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">VTO</font></div></td>
    <td width="65"><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">CANT</font></div></td>
  </tr>

<?php 
  $anio_actual = date("y");
$mes_actual = date ("m");

 $sql1="select * from monodrogas order by nombre_comercial";
$result1 = $db->Execute($sql1);


 
  if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {

$cod_mercaderia=strtoupper($result1->fields["cod_barra"]);

$descripcion=strtoupper($result1->fields["nombre_comercial"]);
$presentacion=strtoupper($result1->fields["presentacion"]);


?>
  <tr>
    <td height="31"><?php echo $cod_mercaderia;?></td>
    <td><?php echo $descripcion;?> - <?php echo $presentacion;?></td>
    <td><div align="center"><?php echo "____________";?></div></td>
    <td><div align="center"><?php echo "_______";?></div></td>
    <td><div align="center"><?php echo "____";?></div></td>
    <td><div align="center"><?php echo "____________";?></div></td>
    <td><div align="center"><?php echo "_______";?></div></td>
    <td><div align="center"><?php echo "____";?></div></td>
    <td><div align="center"><?php echo "____________";?></div></td>
    <td><div align="center"><?php echo "_______";?></div></td>
    <td><div align="center"><?php echo "____";?></div></td>
  </tr>


  <?php  
	  $result1->MoveNext();
	}
  ?>
</table>
