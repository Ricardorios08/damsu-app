<?php 

include ("../../conexiones/config_usu.php");
$B = 1;

if ($documento == ""){
$sql="select * from prestaciones_pacientes";
}else{
$sql="select * from prestaciones_pacientes where documento like '%$documento'";
}
	$result = $db->Execute($sql);
?>
<table width="800" border="0">
  <tr bordercolor="#0066FF" bgcolor="#C9C9C9">
    <td height="37" colspan="5"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">LISTADO DE PRESTACIONES DEL PROGRAMA ONCOLOGICO </font></div></td>
  </tr>
  <tr bordercolor="#0066FF" bgcolor="#0000FF"> 


    <td width="6%"><div align="center"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><font size="2">Nº </font></font></div></td>
    <td width="39%"><div align="center"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><font size="2">Nombre y Descripcion </font></font></div></td>
    <td width="9%"><div align="center"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><font size="2">Precio</font></font></div></td>
	 <td width="15%"><div align="center"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><font size="2">Cant. Realizadas</font></font></div></td>
	  <td width="31%"><div align="center"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><font size="2">Observaciones</font></font></div></td>

	
	


  </tr>
  <?php 
  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

	
$cod_prestacion=strtoupper($result->fields["cod_prestacion"]);

$sql3 = "SELECT * FROM `prestaciones` where cod_prestacion = '$cod_prestacion'";
$result3 = $db->Execute($sql3);

$descripcion=strtoupper($result3->fields["descripcion"]);
$caracteristica=strtoupper($result3->fields["caracteristica"]);


$precio=strtoupper($result->fields["precio"]);
$cupo_mensual=strtoupper($result->fields["nombre_reducido_fuente"]);
$cant_realizado=strtoupper($result->fields["cant_realizado"]);
$observaciones=strtoupper($result->fields["observaciones"]);



?>

<tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"> 

   
	<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$cod_prestacion");?></font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$descripcion");?> <?php print("$caracteristica");?></font></td>
	    <td><div align="center">
	     <font size="2" face="Arial, Helvetica, sans-serif">$ <?php print("$precio");?></font>
	    </div></td>
		<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$cant_realizado");?></font></div></td>
		<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$observaciones");?></font></div></td>



   
	

  </tr>
  <?php 

$result->MoveNext();
	}

?>
</table>


