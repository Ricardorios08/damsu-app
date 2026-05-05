<script language="javascript">
function on_load()
{
document.getElementById("codigo").focus();
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
				document.getElementById("grupo").focus();
				break;
				case "grupo":
				document.getElementById("nombre").focus();
				break;
				case "nombre":
				document.getElementById("cod_droga").focus();
				break;,
				case "cod_droga":
				document.getElementById("nueva_droga").focus();
				break;
				case "nueva_droga":
				document.getElementById("presentacion").focus();
				break;
				
				case "presentacion":
				document.getElementById("laboratorio").focus();
				break;
				case "laboratorio":
				document.getElementById("nuevo_laboratorio").focus();
				break;
				case "nuevo_laboratorio":
				document.getElementById("cod_barra").focus();
				break;,
				case "cod_barra":
				document.getElementById("precio_actualizado").focus();
				break;
				case "precio_actualizado":
				document.getElementById("guardar").focus();
				break;
				
		}
		return false;
	}
	return true;
}


</script>

<BODY onload = "on_load()">
  <form action="guardar_mercaderia.php" method="post">
<table width="800" border="0" cellspacing="0">
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#999999"> 
    <td colspan="2"><font color="#000000" face="Arial, Helvetica, sans-serif"><strong>AaaLTA 
      DE MONODROGAS</strong></font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#EEEEEE"> 
    <td width="50%" bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Troquel</font> 
      </div></td>
    <td width="50%" bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 
      <input type="text" name="codigo" id="codigo" onKeyPress="return verif_caracter(this,event)" size="10" >
      </font>      <div align="right"></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#EEEEEE"> 
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Grupo</font> 
      </div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 
      <select name="grupo[]" id="grupo" onkeypress="return verif_caracter(this,event)">
        <option value="1" selected>Grupo 1</option>
        <option value ="2">Grupo 2</option>
        <option value ="3">Monoclonal</option>
      </select>
      </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Nombre 
      Comercial </font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 
      <input type="text" name="nombre"  id="nombre"  size="50" onKeyPress="return verif_caracter(this,event)">
      </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Droga</font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS">  <?php 
include ("../../../conexiones/config_usu.php");
$sql="select * from drogas ORDER BY droga";
$result = $db->Execute($sql);
echo "<select name=cod_droga[] size=1 id =cod_droga onKeyPress='return verif_caracter(this,event)'>";
echo"<option value='ninguna'>Ninguna</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$cod=$result->fields["cod_droga"];
$a1=strtoupper($result->fields["droga"]);
echo"<option value=$cod>$a1 ($cod)</option>";
$result->MoveNext();
	}
echo"</select>";
?>     
      </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC">
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Nueva Droga</font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS">
      <input type="text" name="nueva_droga" id="nueva_droga"  size="30"onKeyPress="return verif_caracter(this,event)">
    </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Presentaci&oacute;n</font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 
      <input type="text" name="presentacion" id="presentacion"  size="30"onKeyPress="return verif_caracter(this,event)">
      (unidades y magnitud) </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Laboratorio</font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS">
      <?php 
include ("../../../conexiones/config_usu.php");
$sql="select * from laboratorios ORDER BY laboratorio";
$result = $db->Execute($sql);
echo "<select name=laboratorios[] size=1 id =laboratorio onKeyPress='return verif_caracter(this,event)'>";
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
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC">
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Nuevo Laboratorio </font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS">
      <input type="text" name="nuevo_laboratorio" id="nuevo_laboratorio"  size="30"onKeyPress="return verif_caracter(this,event)">
    </font>    </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#DCBB76"> 
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Cadena 
      de frio </font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 
      <input type="radio" name="cadenafrio" value="SI"tabindex="26" >
      SI 
      <input type="radio" name="cadenafrio" value="NO" tabindex="27"checked="TRUE">
      NO </font></tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">C&oacute;digo 
      de Barras</font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 
      <input type="text" name="cod_barra" id ="cod_barra" size="20" onKeyPress="return verif_caracter(this,event)">
      </font> </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Porcentaje 
      Diferencial </font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 
      <input type="text" name="margendif" id ="margendif" size="5" onKeyPress="return verif_caracter(this,event)">
      </font></tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Observaciones</font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 
      <input type="text" name="observaciones" id ="observaciones" size="45" onKeyPress="return verif_caracter(this,event)">
      </font></tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC">
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Precio Actualizado </font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS">
      <input type="text" name="precio_actualizado" id ="precio_actualizado" size="10" onKeyPress="return verif_caracter(this,event)">
    </font>  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC">
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Cant x Caja </font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS">
      <input type="text" name="cant_caja" id ="cant_caja" size="5" onKeyPress="return verif_caracter(this,event)">
    </font>  </tr>

  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC">
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Informar a ANMAT </font></div></td>
    <td bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS">
      <input type="radio" name="informar_anmat" value="SI"tabindex="26" >
SI
<input type="radio" name="informar_anmat" value="NO" tabindex="27"checked="TRUE">
NO</font>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFCC">
    <td bgcolor="#E6E6E6">&nbsp;</td>
    <td bgcolor="#E6E6E6">  
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#CCCCCC"> 
    <td colspan="2"><div align="center"> 
        <input type="Submit" name="Submit34" id = "guardar" value="GUARDAR" target = "arriba">
      </div></td>
  </tr>
</table>
</form>
