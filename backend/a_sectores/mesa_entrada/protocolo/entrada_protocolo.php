<script language="javascript">
function on_load()
{
document.getElementById("situacion").focus();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "diagnostico":
				document.getElementById("situacion").focus();
				
				break;
				case "situacion":
				document.getElementById("linea").focus();
				break;
				case "linea":
				document.getElementById("esquema").focus();
				break;
				case "esquema":
				document.getElementById("plan").focus();
				break;
				case "plan":
				document.getElementById("alternativa").focus();
				break;
				
		}
		return false;
	}
	return true;
}


</script>
<?php 
include ("../../../conexiones/config_pro.php");
$sql="select * from protocolo order by nro_protocolo desc";
$result = $db->Execute($sql);

$nro_protocolo= $result->fields["nro_protocolo"];

if ($nro_protocolo == ""){
$nro_protocolo = 1;
}else{
$nro_protocolo = $nro_protocolo + 1;
}

$sql = "TRUNCATE TABLE protocolo_temp";
$result = $db->Execute($sql);

$sql1 = "TRUNCATE TABLE protocolo_detalle_temp";
$result1 = $db->Execute($sql1);

?>
<BODY onload = "on_load()">
<form action="entrada_protocolo1.php" method="post">
<table width="800" border="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr bordercolor="#FFFFFF" bgcolor="#E6E6E6"> 
    <td height="20" colspan="4" bgcolor="#CCCCCC"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><strong>INCORPORA PROTOCOLOS</strong></font></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#C4D7E6">
    <td height="24" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">Diagnostico</font></div></td>
    <td colspan="3" bgcolor="#E6E6E6"> <div align="left">
	
	<?php include ("../../../conexiones/config_pro.php");
$sql = "SELECT * FROM diagnostico order by nombre_diagnostico";
$result = $db->Execute($sql);
echo "<select name=diagnostico[] size=1 id =diagnostico onkeypress='return verif_caracter(this,event)'>";
echo"<option value=''>Seleccione Diagnostico</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$nro_diagnostico=$result->fields["nro_diagnostico"];
$nombre_diagnostico=strtoupper($result->fields["nombre_diagnostico"]);
$cod = $nro_diagnostico;
echo"<option value=$cod onclick='return verif_caracter(this,event)'> $nombre_diagnostico </option>";
$result->MoveNext();
	}
echo"</select>";
?>

</div>      </td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#C4D7E6"> 
    <td width="14%" height="24" bgcolor="#E6E6E6"> <div align="right"><font size="2" face="Arial, Helvetica, sans-serif">Situacion: </font></div></td>
    <td colspan="3" bgcolor="#E6E6E6"><div align="left"><font color="#000000" size="2"><strong><font face="Arial, Helvetica, sans-serif">
        <input type="text" name="situacion"  size="40" id="situacion" onKeyPress="return verif_caracter(this,event)">
      </font></strong></font><font size="2"><strong><font size="2">
        
    </font></strong></font> </div>      <div align="left"> <font color="#000000" size="2"><strong><font color="#000000" size="2"> 
        </font></strong> </font></div>    <div align="left"></div>    <div align="left"><font size="2"><strong><font size="2">
        </font><font color="#000000" size="2"> 
    </font></strong> </font></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#C4D7E6">
    <td height="24" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">Linea</font></div></td>
    <td width="33%" bgcolor="#E6E6E6"><div align="left"><font color="#000000" size="2"><strong><font face="Arial, Helvetica, sans-serif">
        <input type="text" name="linea"  size="4" id="linea" onKeyPress="return verif_caracter(this,event)">
</font></strong><font face="Arial, Helvetica, sans-serif">(1,2,3, etc)</font> </font></div></td>
    <td width="17%" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">Plan</font></div></td>
    <td width="36%" bgcolor="#E6E6E6"><div align="left"><font color="#000000" size="2"><font face="Arial, Helvetica, sans-serif">
        <input type="text" name="plan"  size="4" id="plan" onKeyPress="return verif_caracter(this,event)">
    </font><font color="#000000" size="2"><font face="Arial, Helvetica, sans-serif">(A,B,C, etc)</font> </font> </font></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#C4D7E6">
    <td height="24" bgcolor="#E6E6E6"><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">Esquema</font></div></td>
    <td bgcolor="#E6E6E6"><div align="left"><font color="#000000" size="2"><strong><font face="Arial, Helvetica, sans-serif">
      <input type="text" name="esquema"  size="40" id="esquema" onKeyPress="return verif_caracter(this,event)">
    </font></strong></font></div></td>
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">Alternativa</font></div></td>
    <td bgcolor="#E6E6E6"><div align="left"><font color="#000000" size="2"><font face="Arial, Helvetica, sans-serif">
        <input type="text" name="alternativa"  size="4" id="alternativa" >
    </font><font color="#000000" size="2"><font face="Arial, Helvetica, sans-serif">(1,2,3, etc)</font> </font> </font></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#CFCFCF">
    <td height="24" colspan="4" bgcolor="#CCCCCC"><font size="2"><strong><font size="2">
 <input type="hidden" name="nro_protocolo"   value="<?php echo $nro_protocolo;?>">
 <input type="hidden" name="band"   value="1">

      <input type="Submit" name="Submit"  id ="Submit4" value="Siguiente">
    </font></strong></font></td>
  </tr>
</table>

