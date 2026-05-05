<script language="javascript">
function on_load()
{
document.getElementById("cod_proveedor").focus();
}

function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "cod_proveedor":
				document.getElementById("denominacion").focus();
				break;
				case "denominacion":
				document.getElementById("domicilio").focus();
				break;
				case "domicilio":
				document.getElementById("cod_area").focus();
				break;
				case "cod_area":
				document.getElementById("telefono").focus();
				break;
				case "telefono":
				document.getElementById("cod_area_celular").focus();
				break;
				case "cod_area_celular":
				document.getElementById("celular").focus();
				break;
				case "celular":
				document.getElementById("servicio").focus();
				break;
				case "servicio":
				document.getElementById("denominacion_reducida").focus();
				break;
				case "denominacion_reducida":
				document.getElementById("mail").focus();
				break;

				case "mail":
				document.getElementById("guardar").focus();
				break;
				
		}
		return false;
	}
	return true;
}


</script>

<BODY onload = "on_load ()">
<form action="guardar_proveedores.php" method="post">
<table width="103%" border="0">
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#000099"> 
    <td height="34" colspan="3"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><strong>CARGA 
      DE PROVEEDORES / PRESTADORES</strong></font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E1F2EF"> 
    <td width="33%" bgcolor="#D0F9FB"><div align="right"><font color="#000000">Codigo 
        de Prestador / Prestador</font> </div></td>
    <td width="67%" colspan="2"><input type="text" name="cod_proveedor" id="cod_proveedor" onKeyPress="return verif_caracter(this,event)" size="5" > 
      <div align="right"></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E1F2EF"> 
    <td bgcolor="#D0F9FB"><div align="right"><font color="#000000">Denominacion</font> 
      </div></td>
    <td colspan="2"><input type="text" name="denominacion" id="denominacion"  size="25" onKeyPress="return verif_caracter(this,event)"> 
    </td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E1F2EF"> 
    <td bgcolor="#D0F9FB"><div align="right"><font color="#000000">Domicilio</font></div></td>
    <td colspan="2"><input type="text" name="domicilio" id="domicilio"  size="45" onKeyPress="return verif_caracter(this,event)"> 
    </td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E1F2EF"> 
    <td bgcolor="#D0F9FB"><div align="right"><font color="#000000">Telefono</font></div></td>
    <td colspan="2"><input name="cod_area" type="text" id="cod_area" onKeyPress="return verif_caracter(this,event)" value="0261" size="7"> 
      <input type="text" name="telefono" id="telefono" size="15" onKeyPress="return verif_caracter(this,event)"> 
    </td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E1F2EF"> 
    <td bgcolor="#D0F9FB"><div align="right">Celular</div></td>
    <td colspan="2"><input name="cod_area_celular" type="text" id="cod_area_celular" onKeyPress="return verif_caracter(this,event)" value="261" size="7"> 
      <input type="text" name="celular" id="celular" size="15" onKeyPress="return verif_caracter(this,event)"></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E1F2EF"> 
    <td bgcolor="#D0F9FB"><div align="right"><font color="#000000">Servicio</font></div></td>
    <td><input type="text" name="servicio" id="servicio"  size="15"onKeyPress="return verif_caracter(this,event)"></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E1F2EF"> 
    <td bgcolor="#D0F9FB"><div align="right"><font color="#000000">Denominacion 
        Reducida </font></div></td>
    <td colspan="2"><input name="denominacion_reducida" type="text" id ="denominacion_reducida" onKeyPress="return verif_caracter(this,event)" size="15" maxlength="10"> 
      <font color="#006633">&nbsp; </font></tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E1F2EF"> 
    <td height="24" bgcolor="#D0F9FB"><div align="right"><font color="#000000">Email</font></div></td>
    <td colspan="2"><input type="text" name="mail" id="mail" size="45" onKeyPress="return verif_caracter(this,event)"> 
      <input name="guardar" type="Submit" id="guardar" value="Guardar-->" target = "arriba"></td>
  </tr>
</table>
</form>
</body>