<script language="javascript">
function on_load()
{
document.getElementById("nombre_diagnostico").focus();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "cod_diagnostico":
				document.getElementById("nombre_diagnostico").focus();
				
				break;
				case "nombre_diagnostico":
				document.getElementById("nombre_reducido_diagnostico").focus();
				break;
				case "nombre_reducido_diagnostico":
				document.getElementById("siguiente").focus();
				break;
			
		}
		return false;
	}
	return true;
}


</script>

<?php include ("../../../conexiones/config_usu.php");

$sql="select * from diagnostico order by nro_diagnostico desc";
$result = $db->Execute($sql);
$nro_diagnostico=$result->fields["nro_diagnostico"];

if ($nro_diagnostico == ""){
	$nro_diagnostico = 1;
}
else{
$nro_diagnostico = $nro_diagnostico + 1;}


?>

<BODY onload = "on_load()">
<form action="guardar_des_diagnostico.php" method="post">
<table width="800" border="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#E6E6E6"> 
    <td colspan="4" valign="top" bgcolor="#CCCCCC"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>ALTA DESCRIPCION DE DIAGNOSTICO </strong></font></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td width="51%" bgcolor="#E6E6E6"> <div align="right"><font size="2" face="Trebuchet MS">Cod. Diagnostico</font></div></td>
    <td width="49%" colspan="3" bgcolor="#E6E6E6"><div align="left"> <font color="#000000" size="2" face="Trebuchet MS"><strong> 
        <input type="text" name="cod_diagnostico"  size="4" id="cod_diagnostico"  value = "<?php echo $nro_diagnostico;?>" onKeyPress="return verif_caracter(this,event)">
        </strong> </font></div>
      <div align="left"></div>
    <div align="left">     </div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Nombre Diagnostico </font></div></td>
    <td colspan="3" bgcolor="#E6E6E6"><font color="#000000" size="2" face="Trebuchet MS"><strong>
      <input type="text" name="nombre_diagnostico"  size="45" id="nombre_diagnostico"  onKeyPress="return verif_caracter(this,event)">


    </strong> 
    </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td bgcolor="#E6E6E6"> <div align="right"><font size="2" face="Trebuchet MS">Nombre Reducido </font></div></td>
    <td colspan="3" bgcolor="#E6E6E6"> <div align="left">  
        <font color="#000000" size="2" face="Trebuchet MS"><strong>
        <input type="text" name="nombre_reducido_diagnostico"  size="25" id="nombre_reducido_diagnostico"  onKeyPress="return verif_caracter(this,event)">
        </strong></font> 
</div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Codigo Agrupado </font></div></td>
    <td colspan="3" bgcolor="#E6E6E6"> <?php 
include ("../../../conexiones/config_usu.php");
$sql="select * from diagnostico_agrupado ORDER BY cod_agrupado";
$result = $db->Execute($sql);
echo "<select name=cod_agrupado[] size=1 id =obrasocial onKeyPress='return verif_caracter(this,event)'>";


echo"<option value='ninguna'>Sin Ob. Soc.</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$cod=$result->fields["cod_agrupado"];
$a1=strtoupper($result->fields["nombre_agrupado"]);
echo"<option value=$cod>$a1</option>";
$result->MoveNext();
	}
echo"</select>";
?></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Nuevo grupo </font></div></td>
    <td colspan="3" bgcolor="#E6E6E6"><font color="#000000" size="2" face="Trebuchet MS"><strong>
      <input name="nuevo_grupo" type="text" id="nuevo_grupo"  onKeyPress="return verif_caracter(this,event)"  size="40" maxlength="80">
    </strong></font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
    <td colspan="4" bgcolor="#CCCCCC"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><strong><strong>
      <input type="Submit" name="Submit" id ="siguiente" value="Siguiente">
    </strong></strong></font></div></td>
  </tr>
</table>
