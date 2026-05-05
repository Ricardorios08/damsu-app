<?php 
global $buscador_rapido;
$buscador_rapido=$_POST["buscador_rapido"];
$hoy = date("d/m/Y");
 include("../../conexiones/config_usu.php");


$B = 1;
$palabra=$_POST["busca"];

$sql="select * from monodrogas where cod_droga like '%$palabra%' or  nombre_comercial order by nombre_comercial asc ";

	$result = $db->Execute($sql);
?>
<table width="103%" height="58" border="0">
  <tr bordercolor="#FFFFCC" bgcolor="#993300">
    <td colspan="12
	" bgcolor="#E1F2EF"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif">LISTADO DE MONODROGAS . Emitido el <?php echo $hoy;?> </font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#000099">
    <?php 


switch ($buscador_rapido)
{
	case "1"://mostrar sin modificar
	{ 
		?>
    <td width="5%"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">TROQUEL</font></div></td>
    <td width="11%"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">GRUPO</font></div></td>
    <td width="12%"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">NOMBRE COMERCIAL</font></div></td>
	<td width="12%"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">COD DROGA</font></div></td>
	<td width="12%"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">PRESENTACION</font></div></td>
<td width="12%"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">LABORATORIO</font></div></td>
<td width="12%"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">FRIO</font></div></td>
<td width="12%"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">FICHA</font></div></td>

    <?php 



	}
	break;


	case "2": //mostrar con modificar
	{
		?>
    <td width="5%"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">TROQUEL</font></div></td>
    <td width="11%"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">GRUPO</font></div></td>
    <td width="12%"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">NOMBRE COMERCIAL</font></div></td>
	<td width="12%"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">COD DROGA</font></div></td>
	<td width="12%"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">PRESENTACION</font></div></td>
<td width="12%"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">LABORATORIO</font></div></td>
<td width="12%"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">FRIO</font></div></td>
<td width="12%"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">FICHA</font></div></td>
  <td width="12%"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">MODIFICAR </font></div></td>
    <td width="12%"><div align="center"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">ELIMINAR </font></div></td>
    
  </tr>
  <?php 

	}
	break;

}	

 
  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

	
$cod_droga=strtoupper($result->fields["cod_droga"]);
$troquel=strtoupper($result->fields["troquel"]);
$nombre_comercial=strtoupper($result->fields["nombre_comercial"]);
$grupo=strtoupper($result->fields["grupo"]);
$presentacion=strtoupper($result->fields["presentacion"]);
$laboratorio=strtoupper($result->fields["laboratorio"]);
$frio=strtoupper($result->fields["frio"]);



				  



	if ($B == 1) {

?>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <?php 
$B = 0;
				}
	ELSE	{
	$B=1;
		 	
?>
  <tr bordercolor="#FFFFCC" bgcolor="#FFFFCC">
    <?php 

			}





switch ($buscador_rapido)
{
	case "2": //mostrar sin modificar
	{
		?>
    <td bgcolor="#E8DCFC"><div align="center"><font size="2"><?php print("$troquel");?></font></div></td>
    <td bgcolor="#E8DCFC"><div align="center"><font size="2"><?php print("$grupo");?></font></div></td>
    <td bgcolor="#E8DCFC"><div align="center"><font size="2"><?php print("$nombre_comercial");?></font></div></td>
	<td bgcolor="#E8DCFC"><div align="center"><font size="2"><?php print("$cod_droga");?></font></div></td>
    <td bgcolor="#E8DCFC"><div align="center"><font size="2"><?php print("$presentacion");?></font></div></td>
	<td bgcolor="#E8DCFC"><div align="center"><font size="2"><?php print("$laboratorio");?></font></div></td>
	<td bgcolor="#E8DCFC"><div align="center"><font size="2"><?php print("$frio");?></font></div></td>


    <td bordercolor="#E8DCFC" bgcolor="#E8DCFC"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="modificar_monodroga.php?id=<?php print("$id");?>"><IMG SRC="../../imagenes/office/027.ico" alt="Modificar" border = "0"></a></font></div></td>
    <td bordercolor="#E8DCFC" bgcolor="#E8DCFC"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"> <a href="borra_monodroga.php?id=<?php print("$id");?>"><IMG SRC="../../imagenes/office/1047.ico" alt="Eliminar" border = "0"></a></font></div></td>
    <td bordercolor="#E8DCFC" bgcolor="#E8DCFC"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"> <a href="ficha_monodroga.php?id=<?php print("$id");?>"><IMG SRC="../../imagenes/office/005.ico" alt="Ficha" border = "0"></a></font></div></td>
  </tr>
  <?php 



break;
}


case "1":
	  {
	?>
 <td bgcolor="#E8DCFC"><div align="center"><font size="2"><?php print("$troquel");?></font></div></td>
    <td bgcolor="#E8DCFC"><div align="center"><font size="2"><?php print("$grupo");?></font></div></td>
    <td bgcolor="#E8DCFC"><div align="center"><font size="2"><?php print("$nombre_comercial");?></font></div></td>
	<td bgcolor="#E8DCFC"><div align="center"><font size="2"><?php print("$cod_droga");?></font></div></td>
    <td bgcolor="#E8DCFC"><div align="center"><font size="2"><?php print("$presentacion");?></font></div></td>
	<td bgcolor="#E8DCFC"><div align="center"><font size="2"><?php print("$laboratorio");?></font></div></td>
	<td bgcolor="#E8DCFC"><div align="center"><font size="2"><?php print("$frio");?></font></div></td>
  </tr>
  <?php 

	break;
	  }
	  }

$result->MoveNext();
	}

?>
</table>
