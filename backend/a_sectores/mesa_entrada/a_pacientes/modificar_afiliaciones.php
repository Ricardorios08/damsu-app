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

 
$documento = $_REQUEST['documento'];
$cod_operacion = $_REQUEST['cod_operacion'];


include ("../../../conexiones/config_usu.php");

$sql="select * from afiliaciones where documento = '$documento'";
$result = $db->Execute($sql);

$tipo_doc=strtoupper($result->fields["tipo_doc"]);
$nro_os=strtoupper($result->fields["nro_os"]);
$nombre_os=strtoupper($result->fields["nombre_os"]);

$nro_afiliado=strtoupper($result->fields["nro_afiliado"]);
$otros=strtoupper($result->fields["otros"]);
$cod_paciente=strtoupper($result->fields["cod_paciente"]);

$fecha=strtoupper($result->fields["fecha"]);


$dia = substr($fecha,8,2);
	$mes = substr($fecha,5,2);
	$anio = substr($fecha,0,4);


$sql="select * from obrasocial where nro_os = '$nro_os'";
$result = $db->Execute($sql);

echo $sigla=strtoupper($result->fields["sigla"]);

if ($nro_os == 0){
$sigla = "SIN OBRA SOCIAL";
}







	$sql="select * from pacientes where documento = $documento";
$result = $db->Execute($sql);

$nombre=strtoupper($result->fields["nombre"]);
$apellido=strtoupper($result->fields["apellido"]);
$tipo_doc=strtoupper($result->fields["tipo_doc"]);

$nombre_completo = $apellido.", ".$nombre; 


?>


<form action="mod_afiliaciones.php" method="post">
<table width="800" border="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#E6E6E6"> 
    <td colspan="4" valign="top" bgcolor="#CCCCCC"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><strong>MODIFICAR AFILIACIONES</strong></font></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#E8DCFC">
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Tipo</font></div></td>
    <td colspan="3" bgcolor="#E6E6E6"><div align="left"><font size="2" face="Trebuchet MS"><strong><font color="#000000"><?php  "$tipo_doc";?>
    </font></strong></font></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td width="50%" bgcolor="#E6E6E6"> <div align="right"><font size="2" face="Trebuchet MS">Documento</font></div></td>
    <td width="50%" colspan="3" bgcolor="#E6E6E6"><div align="left"> <font color="#000000" size="2" face="Trebuchet MS"><strong><?php echo $nombre_completo;?> - <?php echo $documento;?>  </strong> </font></div>
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
?>

<optgroup label="Opcion Seleccionada"> 
        <option value selected= "<?php  "$nro_os";?>"> <font size="2" face="Trebuchet MS"><?php print("$sigla");?></font></option><?php



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
        <input name="nro_afiliado" type="text"  id="nro_afiliado" onKeyPress="return verif_caracter(this,event)" value="<?php echo $nro_afiliado;?>" size="20">
    </font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Fecha de afiliaci&oacute;n</font></div></td>
    <td colspan="3" bgcolor="#E6E6E6">      <font size="2" face="Trebuchet MS">
      <input name="dia" type="text" id="dia"onKeyPress="return verif_caracter(this,event)" value="<?php echo $dia;?>" size="2" maxlength="2">
      / 
      <input name="mes" type="text" id="mes"onKeyPress="return verif_caracter(this,event)" value="<?php echo $mes;?>" size="2" maxlength="2">
      / 
      <input name="anio" type="text" id="anio"onKeyPress="return verif_caracter(this,event)" value="<?php echo $anio;?>" size="3" maxlength="4">
    </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td bgcolor="#E6E6E6"><div align="right"><font size="2" face="Trebuchet MS">Observaciones</font></div></td>
    <td colspan="3" bgcolor="#E6E6E6"><font size="2" face="Trebuchet MS"> 
      <input name="otros" type="text" id="otros" onKeyPress="return verif_caracter(this,event)" value="<?php echo $otros;?>"size="65">
	    <input name="cod_operacion" type="hidden" value="<?php echo $cod_operacion;?>"size="65">
    </font></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#E8DCFC">
    <td colspan="4" bgcolor="#E6E6E6"><div align="center"><font size="2" face="Trebuchet MS">
      <input type="Submit" name="Submit"  id = "siguiente" value="Siguiente">
    </font></div></td>
  </tr>
</table>
