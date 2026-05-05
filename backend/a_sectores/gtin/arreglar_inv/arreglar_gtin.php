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
<form action="arreglar_inv.php" method="post">
<table width="800" border="0">
  <!--DWLayoutTable-->
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#E6E6E6"> 
    <td height="26" colspan="2" valign="top" bgcolor="#B8B8B8"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><strong><font color="#000000">ARREGLAR INVENTARIO UNICO</font> </strong></font></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td width="19%" height="24" bgcolor="#EDEDED"> <div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">A&Ntilde;O</font>:</div></td>
    <td width="81%" bgcolor="#EDEDED"><div align="left"> <font color="#000000" size="2"><strong><font color="#000000" size="2"> 
        </font></strong> </font></div>
      <div align="left"></div>
      <div align="left"><font size="2"><strong><font color="#000000" size="2"><strong><font color="#000000" size="2"><strong><font color="#000000" size="2">
        <input name="anio" type="text" id="anio" onKeyPress="return verif_caracter(this,event)" value="19"  size="10">
      </font></strong></font></strong> 
    </font></strong> </font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td height="24" bgcolor="#EDEDED"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">MES</font></td>
    <td bgcolor="#EDEDED"><font color="#000000" size="2"><strong><font color="#000000" size="2"><strong><font color="#000000" size="2">      <strong><font color="#000000" size="2">
      <input name="mes" type="text" id="mes" onKeyPress="return verif_caracter(this,event)" value="06"  size="10">
      </font></strong> </font></strong></font><font size="2"> </font><font color="#000000" size="2"> 
      </font></strong> </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
    <td height="24" bgcolor="#EDEDED"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">COD UNICO </font></td>
    <td bgcolor="#EDEDED"><font color="#000000" size="2"><strong><font color="#000000" size="2"><strong><font color="#000000" size="2">
      <input name="cod_unico" type="text" id="cod_unico" onKeyPress="return verif_caracter(this,event)"  size="10">
    </font></strong></font><font size="2"> </font><font color="#000000" size="2"> </font></strong> </font></td>
  </tr>

  
  
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
    <td height="24" colspan="2" bgcolor="#B8B8B8"><div align="center"><font color="#000000" size="2"><strong><font color="#000000" size="2"><strong><font color="#000000" size="2"><strong><font size="2">
      <input type="Submit" name="Submit" id ="Submit" value="Consultar">
    </font></strong></font></strong></font></strong></font></div></td>
  </tr>
</table>
