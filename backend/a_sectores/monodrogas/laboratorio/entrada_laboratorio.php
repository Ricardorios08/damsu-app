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
				case "cod_droga":
				document.getElementById("droga").focus();
				
				break;
				case "droga":
				document.getElementById("siguiente").focus();
				break;
			
		}
		return false;
	}
	return true;
}


</script>

<?php 

include ("../../../conexiones/config_usu.php");

 $sql="select * from laboratorios order by cod_laboratorio desc";
$result = $db->Execute($sql);
$cod_laboratorio=$result->fields["cod_laboratorio"];

if ($cod_laboratorio == ""){
	$cod_laboratorio = 1;
}
else{
$cod_laboratorio = $cod_laboratorio+ 1;
}

?>

<BODY onload = "on_load()">
<form action="guardar_des_laboratorio.php" method="post">
<table width="800" border="0">
  <!--DWLayoutTable-->
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#E6E6E6"> 
    <td height="26" colspan="4" valign="top" bgcolor="#B8B8B8"><div align="center"><font color="#000000" face="Trebuchet MS"><strong>ALTA 
        DESCRIPCION DE LABORATORIOS</strong></font></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td width="49%" height="24" bgcolor="#EDEDED"> <div align="right"><font size="2" face="Trebuchet MS">Cod. Laboratorio</font></div></td>
    <td width="51%" colspan="3" bgcolor="#EDEDED"><div align="left"> <font color="#000000" size="2" face="Trebuchet MS"><strong> 
        <input type="text" name="cod_laboratorio"  size="4" id="cod_laboratorio"  value = "<?php echo $cod_laboratorio;?>" onKeyPress="return verif_caracter(this,event)">
        </strong> </font></div>
      <div align="left"></div>
      <div align="left">        </div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td height="24" bgcolor="#EDEDED"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Nombre 
        Laboratorio</font></div></td>
    <td colspan="3" bgcolor="#EDEDED"><font color="#000000" size="2" face="Trebuchet MS"><strong> 
      <input type="text" name="nombre_laboratorio"  size="45" id="nombre_laboratorio"  onKeyPress="return verif_caracter(this,event)">
      
      </strong> </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
    <td height="24" colspan="4" bgcolor="#B8B8B8"><div align="center"><font color="#000000" size="2"><strong><font color="#000000" size="2"><strong><font color="#000000" size="2"><strong><font size="2">
      <input type="Submit" name="Submit" id ="Submit" value="GUARDAR LABORATORIO">
    </font></strong></font></strong></font></strong></font></div></td>
  </tr>
</table>
