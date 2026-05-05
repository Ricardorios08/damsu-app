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

<?php include ("../../../conexiones/config_usu.php");

$sql="select * from drogas order by cod_droga desc";
$result = $db->Execute($sql);
$cod_droga=$result->fields["cod_droga"];

if ($cod_droga == ""){
	$cod_droga = 1;
}
else{
$cod_droga = $cod_droga+ 1;}

?>

<BODY onload = "on_load()">
<form action="guardar_des_droga.php" method="post">
<table width="800" border="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr bordercolor="#FFFFFF" bgcolor="#CCCCCC"> 
    <td height="26" colspan="4"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><strong>ALTA 
    DESCRIPCION DE DROGA</strong></font></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#E6E6E6"> 
    <td width="49%" height="24"> <div align="right"><font size="2" face="Trebuchet MS">Cod. Droga</font></div></td>
    <td width="51%" colspan="3"><div align="left"> <font color="#000000" size="2"><strong><font color="#000000" size="2"> 
        <input type="text" name="cod_droga"  size="4" id="cod_droga"  value = "<?php echo $cod_droga;?>" onKeyPress="return verif_caracter(this,event)">
        </font></strong> </font></div>
      <div align="left"></div>
      <div align="left"><font size="2"><strong><font color="#000000" size="2"> 
    </font></strong> </font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E6E6E6"> 
    <td height="24"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Nombre 
    Droga</font></div></td>
    <td colspan="3"><font color="#000000" size="2"><strong><font color="#000000" size="2"> 
      <input type="text" name="droga"  size="45" id="droga"  onKeyPress="return verif_caracter(this,event)">
      <strong><font color="#000000" size="2"><strong><font size="2"> 
      </font></strong></font></strong></font><font size="2"> </font><font color="#000000" size="2"> 
    </font></strong> </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#CCCCCC">
    <td height="24" colspan="4"><div align="center"><font color="#000000" size="2"><strong><font color="#000000" size="2"><strong><font color="#000000" size="2"><strong><font size="2">
        <input type="Submit" name="Submit" id ="Submit" value="GUARDAR">
    </font></strong></font></strong></font></strong></font></div></td>
  </tr>
</table>
