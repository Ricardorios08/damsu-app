<script language="javascript">
function on_load()
{
document.getElementById("droga").focus();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "cod_laboratorio":
				document.getElementById("laboratorio").focus();
				
				break;
				case "laboratorio":
				document.getElementById("siguiente").focus();
				break;
			
		}
		return false;
	}
	return true;
}


</script>


<?PHP
$mes = date("m");
$anio = date("y");
?>
<BODY onload = "on_load()">
<form action="borrar_conteo.php" method="post">
<table width="800" border="0">
  <!--DWLayoutTable-->
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#E6E6E6"> 
    <td height="26" colspan="2" valign="top" bgcolor="#B8B8B8"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><strong><font color="#000000">LIMPIAR CONTEO DE INVENTARIO </font> </strong></font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
    <td width="51%" height="24" bgcolor="#EDEDED"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Contrase&ntilde;a de Seguridad </font></div></td>
    <td width="49%" bgcolor="#EDEDED"><font color="#000000" size="2"><strong><font color="#000000" size="2"><strong><font color="#000000" size="2">
      <input name="contra" type="password" id="contra" onKeyPress="return verif_caracter(this,event)"  size="6">
    </font></strong></font></strong></font></td>
  </tr>
  
  
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
    <td height="24" colspan="2" bgcolor="#B8B8B8"><div align="center"><font color="#000000" size="2"><strong><font color="#000000" size="2"><strong><font color="#000000" size="2"><strong><font size="2">
      <input type="Submit" name="Submit" id ="Submit" value="Consultar">
    </font></strong></font></strong></font></strong></font></div></td>
  </tr>
</table>
