<script language="javascript">
function on_load()
{
document.getElementById("nro_bioquimico").focus();
}

function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "codigo":
				document.getElementById("descripcion").focus();
				break;
				case "descripcion":
				document.getElementById("nombre").focus();
				break;
				case "nombre":
				document.getElementById("tipo").focus();
				break;,
				case "tipo":
				document.getElementById("presentacion").focus();
				break;
				case "presentacion":
				document.getElementById("proveedor").focus();
				break;
				
				
		}
		return false;
	}
	return true;
}


</script>

<BODY onload = "on_load ()">
  
<table width="103%" border="0">
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#000099"> 
    <td height="34" colspan="2"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><strong>ALTA 
      DE MONODROGAS</strong></font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#EEEEEE"> 
    <td width="26%" bgcolor="#D0F9FB"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Troquel</font> 
      </div></td>
    <td bgcolor="#E1F2EF"><font size="2" face="Arial, Helvetica, sans-serif"> 
      <input type="text" name="codigo" id="codigo" onKeyPress="return verif_caracter(this,event)" size="6" >
      </font> <div align="right"></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#EEEEEE"> 
    <td bgcolor="#D0F9FB"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Grupo</font> 
      </div></td>
    <td bgcolor="#E1F2EF"><font size="2" face="Arial, Helvetica, sans-serif"> 
      <select name="select2" id="select3" onkeypress="return verif_caracter(this,event)">
        <option value="Grupo 1" selected>Grupo 1</option>
        <option value ="Grupo 2">Grupo 2</option>
        <option value ="Monoclonal">Monoclonal</option>
      </select>
      </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td bgcolor="#D0F9FB"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Nombre 
        Comercial </font></div></td>
    <td bgcolor="#E1F2EF"><font size="2" face="Arial, Helvetica, sans-serif"> 
      <input type="text" name="nombre"  id="nombre"  size="35" onKeyPress="return verif_caracter(this,event)">
      </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td bgcolor="#D0F9FB"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Droga</font></div></td>
    <td bgcolor="#E1F2EF"><font size="2" face="Arial, Helvetica, sans-serif">  <?php 
include ("../../../conexiones/config_usu.php");
$sql="select * from drogas ORDER BY droga";
$result = $db->Execute($sql);
echo "<select name=cod_droga[] size=1 id =cod_droga onKeyPress='return verif_caracter(this,event)'>";
echo"<option value='ninguna'>Ninguna</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$cod=$result->fields["cod_droga"];
$a1=strtoupper($result->fields["droga"]);
echo"<option value=$cod>$a1</option>";
$result->MoveNext();
	}
echo"</select>";
?>     
      </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td bgcolor="#D0F9FB"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Presentaci&oacute;n</font></div></td>
    <td bgcolor="#E1F2EF"><font size="2" face="Arial, Helvetica, sans-serif"> 
      <input type="text" name="presentacion" id="presentacion2"  size="30"onKeyPress="return verif_caracter(this,event)">
      (unidades y magnitud) </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td bgcolor="#D0F9FB"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Laboratorio</font></div></td>
    <td bgcolor="#E1F2EF"><font size="2" face="Arial, Helvetica, sans-serif">
      <?php 
include ("../../../conexiones/config_usu.php");
$sql="select * from laboratorios ORDER BY laboratorio";
$result = $db->Execute($sql);
echo "<select name=cod_droga[] size=1 id =cod_droga onKeyPress='return verif_caracter(this,event)'>";
echo"<option value='ninguna'>Ninguna</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$cod=$result->fields["cod_laboratorio"];
$a1=strtoupper($result->fields["laboratorio"]);
echo"<option value=$cod>$a1</option>";
$result->MoveNext();
	}
echo"</select>";
?>
      </font></tr>
  <tr bordercolor="#FFFFFF" bgcolor="#DCBB76"> 
    <td bgcolor="#D0F9FB"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Cadena 
        de frio </font></div></td>
    <td bgcolor="#E1F2EF"><font size="2" face="Arial, Helvetica, sans-serif"> 
      <input type="radio" name="cadenafrio" value="SI"tabindex="26" >
      SI 
      <input type="radio" name="cadenafrio" value="NO" tabindex="27"checked="TRUE">
      NO </font></tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td bgcolor="#D0F9FB"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">C&oacute;digo 
        de Barras</font></div></td>
    <td bgcolor="#E1F2EF"><font size="2" face="Arial, Helvetica, sans-serif"> 
      <input type="text" name="proveedor" id ="proveedor" size="20" onKeyPress="return verif_caracter(this,event)">
      </font> </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td bgcolor="#D0F9FB"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Porcentaje 
        Diferencial </font></div></td>
    <td bgcolor="#E1F2EF"><font size="2" face="Arial, Helvetica, sans-serif"> 
      <input type="text" name="margendif" id ="margendif" size="5" onKeyPress="return verif_caracter(this,event)">
      </font></tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td bgcolor="#D0F9FB"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Observaciones</font></div></td>
    <td bgcolor="#E1F2EF"><font size="2" face="Arial, Helvetica, sans-serif"> 
      <input type="text" name="proveedor2" id ="proveedor3" size="45" onKeyPress="return verif_caracter(this,event)">
      </font></tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E6E6E6"> 
    <td colspan="2"><div align="center"> 
        <input type="Submit" name="Submit34" value="GUARDAR" target = "arriba">
      </div></td>
  </tr>
</table>
