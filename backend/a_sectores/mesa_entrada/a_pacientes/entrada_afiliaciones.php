<script language="javascript">
function on_load()
{
document.getElementById("documento").focus();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "documento":
				document.getElementById("obrasocial").focus();
				
				break;
				case "obrasocial":
				document.getElementById("nro_afiliado").focus();
				break;
				case "nro_afiliado":
				document.getElementById("dia").focus();
				break;
				case "dia":
				document.getElementById("mes").focus();
				break;
				case "mes":
				document.getElementById("anio").focus();
				break;
				case "anio":
				document.getElementById("otros").focus();
				break;
				case "otros":
				document.getElementById("siguiente").focus();
				break;	



				
		}
		return false;
	}
	return true;
}


</script>

<BODY onload = "on_load()">



<?php 

$band = $_REQUEST['band'];
if ($band == 1){
$documento = $_REQUEST['documento'];
include ("../../../conexiones/config_usu.php");
$sql="select * from pacientes where documento = $documento";
$result = $db->Execute($sql);

$nombre=strtoupper($result->fields["nombre"]);
$apellido=strtoupper($result->fields["apellido"]);
$tipo_doc=strtoupper($result->fields["tipo_doc"]);

$nombre_completo = $apellido.", ".$nombre; 

	
}?>


<form action="guardar_afiliaciones.php" method="post">
<table width="800" border="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#E6E6E6"> 
    <td colspan="4" valign="top" bgcolor="#CCCCCC"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><strong>AFILIACIONES</strong></font></div></td>
  </tr>
  
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td width="48%" bgcolor="#E6E6E6"> <div align="right"><font size="2" face="Trebuchet MS">Documento</font></div></td>
    <td width="52%" colspan="3" bgcolor="#E6E6E6"><div align="left"> <font color="#000000" size="2" face="Trebuchet MS"><strong> 
       <?php echo $tipo_doc;?> -
        <input type="text" name="documento"  size="15" value = "<?php echo $documento;?>" id="documento" onKeyPress="return verif_caracter(this,event)">
       <?php echo $nombre_completo;?> </strong> </font><font size="2" face="Trebuchet MS">
       <input name="tipo_doc" type="hidden"  id="tipo_doc"   value="<?php echo $tipo_doc;?>" size="2">
       </font></div>
      <div align="left"></div>
    <div align="left">     </div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Obra Social</font></div></td>
    <td colspan="3" bgcolor="#E6E6E6"><font color="#000000" size="2" face="Trebuchet MS"> 
      <?php 
include ("../../../conexiones/config_usu.php");
$sql="select * from obrasocial ORDER BY sigla";
$result = $db->Execute($sql);
echo "<select name=obrasocial[] size=1 id =obrasocial onKeyPress='return verif_caracter(this,event)'>";


echo"<option value='ninguna'>Sin Ob. Soc.</option>";
echo"<option value=10>PROFE</option>";


if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$cod=$result->fields["nro_os"];
$a1=strtoupper($result->fields["nombre_os"]);
echo"<option value=$cod>$a1</option>";
$result->MoveNext();
	}
echo"</select>";
?>
      </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td bgcolor="#E6E6E6"> <div align="right"><font size="2" face="Trebuchet MS">N&ordm; Afiliado</font></div></td>
    <td colspan="3" bgcolor="#E6E6E6"> <div align="left">  
        <font size="2" face="Trebuchet MS"> 
        <input type="text" name="nro_afiliado"  id="nro_afiliado" size="20" onKeyPress="return verif_caracter(this,event)">
    </font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Fecha de afiliaci&oacute;n</font></div></td>
    <td colspan="3" bgcolor="#E6E6E6">      <font size="2" face="Trebuchet MS">
      <input type="text" name="dia" id="dia"onKeyPress="return verif_caracter(this,event)" size="2" maxlength="2">
      / 
      <input type="text" name="mes" id="mes"onKeyPress="return verif_caracter(this,event)" size="2" maxlength="2">
      / 
      <input type="text" name="anio" id="anio"onKeyPress="return verif_caracter(this,event)" size="3" maxlength="4">
    </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Observaciones</font></div></td>
    <td colspan="3" bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 
      <input type="text" name="otros" id="otros"size="65" onKeyPress="return verif_caracter(this,event)">
    </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
    <td colspan="4" bgcolor="#E6E6E6"><div align="center"><font size="2" face="Trebuchet MS">
      <input type="Submit" name="Submit"  id = "siguiente" value="Siguiente">
    </font></div></td>
  </tr>
</table>
