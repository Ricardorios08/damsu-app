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
<form action="../separar.php" method="post">
<table width="800" border="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#E6E6E6"> 
    <td height="26" colspan="2" valign="top" bgcolor="#B8B8B8"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><strong>CONSULTA INVENTARIO </strong></font></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td width="33%" height="24" bgcolor="#BBDDFF"> <div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Mes</font>:</div></td>
    <td width="67%" bgcolor="#EDEDED"><div align="left"> <font color="#000000" size="2"><strong><font color="#000000" size="2"> 
        <input type="text" name="mes"  size="2" id="mes"  value = "<?php echo $mes;?>" onKeyPress="return verif_caracter(this,event)">
        </font></strong> </font></div>
      <div align="left"></div>
      <div align="left"><font size="2"><strong><font color="#000000" size="2"> 
    </font></strong> </font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td height="24" bgcolor="#BBDDFF"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"> 
        A&ntilde;o 20 </font></div></td>
    <td bgcolor="#EDEDED"><font color="#000000" size="2"><strong><font color="#000000" size="2"><strong><font color="#000000" size="2">
      <input name="anio" type="text" id="anio" onKeyPress="return verif_caracter(this,event)"  value = "<?php echo $anio;?>"  size="2" maxlength="2">
    </font></strong></font><font size="2"> </font><font color="#000000" size="2"> 
      </font></strong> </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
    <td height="24" bgcolor="#BBDDFF">
      
      <div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Tipo de informe </font></div></td>
    <td height="24" bgcolor="#EDEDED"><font size="2" face="Trebuchet MS">
      <input name="unidades" type="radio" value="2" checked>
    VALOR    
    <input name="procedencia" type="radio" value="5">
    <font size="2" face="Trebuchet MS">UNIDADES</font></font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
    <td height="24" bgcolor="#BBDDFF">
      <div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Mostrar ordenado por </font></div></td>
    <td height="24" bgcolor="#EDEDED"><font size="2" face="Trebuchet MS">
      <input name="por" type="radio" value="2" checked>
NOMBRE COMERCIAL 
<input name="por" type="radio" value="1">
    DROGAS</font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
    <td height="24" bgcolor="#BBDDFF">
      <div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Seleccione si es definitivo o para control  </font></div></td>
    <td height="24" bgcolor="#EDEDED"><font size="2" face="Trebuchet MS">
      <input name="inventario" type="radio" value="2" checked>
 DEFINITIVO 
 <input name="inventario" type="radio" value="1">
CONTROLAR </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
    <td height="24" bgcolor="#BBDDFF"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Opciones de vizualizaci&oacute;n </font></div></td>
    <td height="24" bgcolor="#EDEDED"><font size="2" face="Trebuchet MS">
      <input name="procedencia" type="radio" value="3" checked>
      DEFINITIVO
      <input name="procedencia" type="radio" value="1">
      PO
      <input name="procedencia" type="radio" value="2">
UNICO 
<input name="procedencia" type="radio" value="4">
UNIDO EXCEL 
<input name="procedencia" type="radio" value="10">
OTROS PROVEE. 

<input name="procedencia" type="radio" value="11">
ACE 

</font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
    <td height="24" bgcolor="#BBDDFF"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Imprime segun proveedor </font></div></td>
    <td height="24" bgcolor="#EDEDED"><font size="2" face="Trebuchet MS">
      <font size="2" face="Trebuchet MS">
      <input name="provee" type="radio" value="3" checked>
      DEFINITIVO</font>
      <input name="provee" type="radio" value="1">
      <font size="2" face="Trebuchet MS">ACE 
      <input name="provee" type="radio" value="2">
 OTROS PROVEEDORES  
    <input name="provee" type="radio" value="12">
 MODIFICAR ACE/NO ACE  
 
 
 </font></font></td>
  </tr>
  
  
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
    <td height="24" colspan="2" bgcolor="#B8B8B8"><div align="center"><font color="#000000" size="2"><strong><font color="#000000" size="2"><strong><font color="#000000" size="2"><strong><font size="2">
      <input type="Submit" name="Submit" id ="Submit" value="Consultar">
    </font></strong></font></strong></font></strong></font></div></td>
  </tr>
</table>
