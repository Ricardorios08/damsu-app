<script language="javascript">
function on_load()
{
document.getElementById("nombre_fuente").focus();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "cod_fuente":
				document.getElementById("nombre_fuente").focus();
				
				break;
				case "nombre_fuente":
				document.getElementById("nombre_reducido_fuente").focus();
				break;
				case "nombre_reducido_fuente":
				document.getElementById("siguiente").focus();
				break;
			
		}
		return false;
	}
	return true;
}


</script>

<?php  include ("variables_des.php");


?>

<BODY onload = "on_load()">
<form action="mod_des_fuente.php" method="post">
<table width="800" border="0">
  <!--DWLayoutTable-->
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#E6E6E6"> 
    <td height="26" colspan="4" valign="top" bgcolor="#B8B8B8"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><strong>ALTA DESCRIPCION DE FUENTE</strong></font></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td width="51%" height="24" bgcolor="#EDEDED"> <div align="right"><font size="2" face="Trebuchet MS">Cod. Fuente </font></div></td>
    <td width="49%" colspan="3" bgcolor="#EDEDED"><div align="left"> <font color="#000000" size="2" face="Trebuchet MS"><strong> 
        <input type="text" name="cod_fuente"  size="4" id="cod_fuente"  value = "<?php  echo $nro_fuente;?>" onKeyPress="return verif_caracter(this,event)">
        </strong> </font></div>
      <div align="left"></div>
    <div align="left">     </div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td height="24" bgcolor="#EDEDED"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Nombre Fuente</font></div></td>
    <td colspan="3" bgcolor="#EDEDED"><font color="#000000" size="2" face="Trebuchet MS"><strong>
      <input name="nombre_fuente" type="text" id="nombre_fuente"  onKeyPress="return verif_caracter(this,event)" value="<?php  echo $nombre_fuente;?>"  size="45">


    </strong> 
    </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td height="24" bgcolor="#EDEDED"> <div align="right"><font size="2" face="Trebuchet MS">Nombre Reducido </font></div></td>
    <td colspan="3" bgcolor="#EDEDED"> <div align="left">  
        <font color="#000000" size="2" face="Trebuchet MS"><strong>
        <input name="nombre_reducido_fuente" type="text" id="nombre_reducido_fuente"  onKeyPress="return verif_caracter(this,event)" value="<?php  echo $nombre_reducido_fuente;?>"  size="20" maxlength="10">
        </strong></font> 
</div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
    <td height="24" colspan="4" bgcolor="#EDEDED"><div align="center"><font color="#000000" size="2"><strong><font color="#000000" size="2"><strong><font size="2">
      <input type="Submit" name="Submit" id ="siguiente" value="Modificar">
    </font></strong></font></strong></font></div></td>
  </tr>
</table>
