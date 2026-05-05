<?php 

	  include ("../../../conexiones/config_usu.php");

include ("../../../funciones/funciones.php");
$documento= $_REQUEST['documento'];
$tipo_doc= $_REQUEST['tipo_doc'];

$B = 1;

if ($documento == ""){
$sql="select * from prestaciones_pacientes";
}else{
$sql="select * from prestaciones_pacientes where documento like '$documento' and tipo_doc = '$tipo_doc'";
$sql="select * from prestaciones_pacientes where documento like '$documento' ";
}
	$result = $db->Execute($sql);
?>
<table width="430" border="0">
  
  <tr bordercolor="#0066FF" bgcolor="#0000FF"> 

	 <td width="15%" bgcolor="#C9C9C9"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Fecha </font></font></div></td>
    <td width="6%" bgcolor="#C9C9C9"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Nº </font></font></div></td>
    <td width="39%" bgcolor="#C9C9C9"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Nombre y Descripcion </font></font></div></td>
    <td width="9%" bgcolor="#C9C9C9"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Precio</font></font></div></td>
    <td width="15%" bgcolor="#C9C9C9"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Cant. </font></font></div></td>

  </tr>
  <?php 
  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

	
$cod_prestacion=strtoupper($result->fields["cod_prestacion"]);
$fecha_prestacion=strtoupper($result->fields["fecha_prestacion"]);

$anio = substr($fecha_prestacion,0,4);
$mes= substr($fecha_prestacion,5,2);
$dia = substr($fecha_prestacion,8,2);

$fecha_prestacion = $dia."-".$mes."-".$anio;

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

   			<td><div align="center"><font size="2" face="Trebuchet MS"><?php print("$fecha_prestacion");?></font></div></td>
	<td><div align="center"><font size="2" face="Trebuchet MS"><?php print("$cod_prestacion");?></font></div></td>
    <td><font size="2" face="Trebuchet MS"><?php print("$descripcion");?> <?php print("$caracteristica");?></font></td>
	    <td><div align="center">
	      <font size="2" face="Trebuchet MS">$ <?php print("$precio");?></font>
	    </div></td>
		<td><div align="center"><font size="2" face="Trebuchet MS"><?php print("$cant_realizado");?></font></div></td>
	
  </tr>
  <?php 

$result->MoveNext();
	}

?>
</table>


