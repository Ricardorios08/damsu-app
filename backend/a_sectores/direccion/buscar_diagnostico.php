<FORM name="form" ACTION="<?php php echo $_SERVER["PHP_SELF"];?>" METHOD = "POST">
  <strong><font face="Arial, Helvetica, sans-serif">Buscar Diagnóstico </font></strong><br>
  Palabra o C&oacute;digo
  <input name="palabra" type="text" id="buscar" size="10">
  <input type="submit" name="Alta" value="Buscar">
</form>
<?php 

if(isset($_REQUEST['Alta'])) {
	
	switch ($_REQUEST['Alta'])
	{
		case "Buscar":
				{
				
				 $palabra = $_REQUEST['palabra'];
include ("../../conexiones/config_usu.php");
$B = 1;

if ($palabra == ""){
$sql="select * from diagnostico";
}else{
 $sql="select * from diagnostico where nro_diagnostico LIKE '$palabra%' or nombre_diagnostico like '$palabra%'";
}
	$result = $db->Execute($sql);
?>
<table width="474" height="66" border="0">
  <tr bordercolor="#0066FF" bgcolor="#FF0000"> 


    <td width="29" height="24"><div align="center"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><font size="2">Nº </font></font></div></td>
    <td width="254"><div align="center"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><font size="2">Nombre </font></font></div></td>
    <td width="177"><div align="center"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><font size="2">Reducido</font></font></div></td>
	
	<?php if ($modifica == "SI"){?>
	<?php }?>
	

  </tr>
  <?php 
  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

	
$nro_diagnostico=strtoupper($result->fields["nro_diagnostico"]);
$nombre_diagnostico=strtoupper($result->fields["nombre_diagnostico"]);
$nombre_reducido_diagnostico=strtoupper($result->fields["nombre_reducido_diagnostico"]);



	if ($B == 1) {
?><tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"> <?php 
			}

?>

   
	<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$nro_diagnostico");?></font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$nombre_diagnostico");?></font></td>
	    <td><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$nombre_reducido_diagnostico");?></font></td>


   
   	<?php if ($modifica == "SI"){?>
	    </tr>
  <?php 

$result->MoveNext();
	}

?>
</table>
<?php 
break;
}
}
	}}
	
	?>