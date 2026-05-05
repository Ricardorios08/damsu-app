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

<?php include ("../../../conexiones/config_usu.php");

$sql="select * from laboratorios order by cod_laboratorio desc";
$result = $db->Execute($sql);
$cod_laboratorio=$result->fields["cod_laboratorio"];

if ($cod_laboratorio == ""){
	$cod_laboratorio = 1;
}
else{
$cod_laboratorio = $cod_laboratorio+ 1;}

?>

<BODY onload = "on_load()">
<form action="guardar_des_laboratorios.php" method="post">
<table width="800" border="0">
  <!--DWLayoutTable-->
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#E6E6E6"> 
    <td height="26" colspan="4" valign="top"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><strong>ALTA 
        DESCRIPCION DE LABORATORIOS</strong></font></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td width="16%" height="24"> <div align="right">Cod. Laboratorio</div></td>
    <td width="72%" colspan="3"><div align="left"> <font color="#000000" size="2"><strong><font color="#000000" size="2"> 
        <input type="text" name="cod_laboratorio"  size="4" id="cod_laboratorio"  value = "<?php echo $cod_laboratorio;?>" onKeyPress="return verif_caracter(this,event)">
        </font></strong> </font></div>
      <div align="left"></div>
      <div align="left"><font size="2"><strong><font color="#000000" size="2"> 
        </font></strong> </font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td height="24"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Nombre 
        Laboratorio</font></div></td>
    <td colspan="3"><font color="#000000" size="2"><strong><font color="#000000" size="2"> 
      <input type="text" name="laboratorio"  size="45" id="laboratorio"  onKeyPress="return verif_caracter(this,event)">
      <strong><font color="#000000" size="2"><strong><font size="2"> 
      <input type="Submit" name="Submit" id ="Submit" value="Siguiente-->">
      </font></strong></font></strong></font><font size="2"> </font><font color="#000000" size="2"> 
      </font></strong> </font></td>
  </tr>
</table>
