<script language="javascript">
function on_load()
{
document.getElementById("nombre_diagnostico").focus();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "cod_diagnostico":
				document.getElementById("nombre_diagnostico").focus();
				
				break;
				case "nombre_diagnostico":
				document.getElementById("nombre_reducido_diagnostico").focus();
				break;
				case "nombre_reducido_diagnostico":
				document.getElementById("siguiente").focus();
				break;
			
		}
		return false;
	}
	return true;
}


</script>

<?php include ("../../../conexiones/config_usu.php");

$sql="select * from prestaciones order by cod_prestacion desc";
$result = $db->Execute($sql);
$cod_prestacion=$result->fields["cod_prestacion"];

if ($cod_prestacion == ""){
	$cod_prestacion = 1;
}
else{
$cod_prestacion = $cod_prestacion + 1;}


?>

<BODY onload = "on_load()">
<form action="guardar_des_prestaciones.php" method="post">
<table width="800" border="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr bordercolor="#FFFFFF" bgcolor="#E6E6E6"> 
    <td colspan="4" bgcolor="#CCCCCC"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><strong>ALTA DESCRIPCION DE PRESTACIONES </strong></font></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#C4D7E6"> 
    <td width="50%" bgcolor="#E6E6E6"> <div align="right"><font size="2" face="Trebuchet MS">Cod. Prestacion </font></div></td>
    <td width="50%" colspan="3" bgcolor="#E6E6E6"><div align="left"> <font color="#000000" size="2" face="Trebuchet MS"><strong> 
        <input type="text" name="cod_prestacion"  size="4" id="cod_prestacion"  value = "<?php echo $cod_prestacion;?>" onKeyPress="return verif_caracter(this,event)">
        </strong> </font></div>
      <div align="left"></div>
    <div align="left">     </div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#C4D7E6"> 
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Descripci&oacute;n</font></div></td>
    <td colspan="3" bgcolor="#E6E6E6"><font color="#000000" size="2" face="Trebuchet MS"><strong>
      <input type="text" name="descripcion"  size="45" id="descripcion"  onKeyPress="return verif_caracter(this,event)">


    </strong> 
    </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#C4D7E6"> 
    <td bgcolor="#E6E6E6"> <div align="right"><font size="2" face="Trebuchet MS">Caracteristica</font></div></td>
    <td colspan="3" bgcolor="#E6E6E6"> <div align="left">  
        <font color="#000000" size="2" face="Trebuchet MS"><strong>
        <input type="text" name="caracteristica"  size="25" id="caracteristica"  onKeyPress="return verif_caracter(this,event)">
        </strong></font> 
</div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#C4D7E6">
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Cod. Proveedor </font></div></td>
    <td colspan="3" bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS">
      <?php 
include ("../../../conexiones/config_usu.php");
$sql="select * from proveedores ORDER BY denominacion";
$result = $db->Execute($sql);
echo "<select name=cod_proveedor[] size=1 id =cod_proveedor onKeyPress='return verif_caracter(this,event)'>";
echo"<option value='ninguna'>Ninguna</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$cod=$result->fields["cod_proveedor"];
$a1=strtoupper($result->fields["denominacion"]);
echo"<option value=$cod>$a1</option>";
$result->MoveNext();
	}
echo"</select>";
?>
    </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#C4D7E6">
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Periodo</font></div></td>
    <td colspan="3" bgcolor="#E6E6E6"><font color="#000000" size="2"><strong><font face="Trebuchet MS">
      <select name="select">
        <option value="1">Quincenal</option>
        <option value="2">Mensual</option>
        <option value="3">Anual</option>
      </select>
    </font></strong></font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#C4D7E6">
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Cupo</font></div></td>
    <td colspan="3" bgcolor="#E6E6E6"><font color="#000000" size="2"><strong><font face="Trebuchet MS">
      <input type="text" name="cupo"  size="10" id="cupo"  onKeyPress="return verif_caracter(this,event)">
    </font></strong></font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#C4D7E6">
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Cantidad Realizada</font></div></td>
    <td colspan="3" bgcolor="#E6E6E6"><font color="#000000" size="2"><strong><font face="Trebuchet MS">
      <input type="text" name="cant_realizada"  size="10" id="cant_realizada"  onKeyPress="return verif_caracter(this,event)"> 
    </font></strong></font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#C4D7E6">
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Precio</font></div></td>
    <td colspan="3" bgcolor="#E6E6E6"><font color="#000000" size="2"><strong><font face="Trebuchet MS">
      <input type="text" name="precio"  size="10" id="precio"  onKeyPress="return verif_caracter(this,event)">
    </font></strong></font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#C9C9C9">
    <td colspan="4" bgcolor="#999999"><div align="center"><font color="#000000" size="2"><strong><font color="#000000" size="2"><strong><font size="2">
        <input type="Submit" name="Submit" id ="siguiente" value="GUARDAR">
    </font></strong></font></strong></font></div></td>
  </tr>
</table>
