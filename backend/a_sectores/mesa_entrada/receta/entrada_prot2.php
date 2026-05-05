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
				document.getElementById("cod_diagnostico").focus();
				
				break;
				case "cod_diagnostico":
				document.getElementById("dia").focus();
				break;
				case "dia":
				document.getElementById("mes").focus();
				break;
				case "mes":
				document.getElementById("anio").focus();
				break;
				case "anio":
				document.getElementById("base").focus();
				break;
				case "base":
				document.getElementById("fuente").focus();
				break;
				case "fuente":
				document.getElementById("matricula").focus();
				break;
				case "matricula":
				document.getElementById("observaciones").focus();
				break;
				case "observaciones":
				document.getElementById("siguiente").focus();
				break;
								
		}
		return false;
	}
	return true;
}


</script>
<?php 

$documento = $_REQUEST['documento'];
$boton = $_REQUEST['Alta'];



include ("../../../conexiones/config_usu.php");

$sql7="select * from pacientes where documento like '$documento'";
$result7 = $db->Execute($sql7);
$estado=strtoupper($result7->fields["estado"]);
$fecha_estado=strtoupper($result7->fields["fecha_estado"]);  // letras
$calle=strtoupper($result7->fields["calle"]); // numero
$puerta=strtoupper($result7->fields["puerta"]); // numero
$localidad=strtoupper($result7->fields["localidad"]); // numero
$departamento=strtoupper($result7->fields["departamento"]); // numero
$direccion = $calle." ".$puerta." ".$localidad." ".$departamento;

$apellido=strtoupper($result7->fields["apellido"]); // numero
$nombre=strtoupper($result7->fields["nombre"]); // numero

$nombre_completo = $apellido.", ".$nombre;

$sql="select * from paciente_diagnostico where documento = '$documento'";
$result = $db->Execute($sql);
$cod_diagnostico=strtoupper($result->fields["cod_diagnostico"]); 


$sql="select * from diagnostico where nro_diagnostico = '$cod_diagnostico'";
$result = $db->Execute($sql);
$nombre_diagnostico=strtoupper($result->fields["nombre_diagnostico"]); 

if ($boton == "Ver todas Prestaciones"){
include ("buscar_prestaciones.php");
exit;
}

?>
<BODY onload = "on_load()">
<form action="guardar_diagnostico.php" method="post">
<table width="95%" border="0">
  <!--DWLayoutTable-->
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#E6E6E6"> 
    <td height="26" colspan="5" valign="top"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><strong>PROTOCOLO AL QUE INGRESA</strong></font></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td width="17%" height="24"> <div align="right"><font size="2" face="Arial, Helvetica, sans-serif">Documento: </font></div></td>
    <td width="18%"><font color="#000000" size="2"><strong><font face="Arial, Helvetica, sans-serif">
      <input type="text" name="documento"  size="15" id="documento2" value= "<?php echo $documento;?>" onKeyPress="return verif_caracter(this,event)">
    </font></strong></font></td>
    <td width="35%"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Diagnostico</font><font size="2" face="Arial, Helvetica, sans-serif">:<font color="#000000">
      <?php 
include ("../../../conexiones/config_usu.php");
$sql="select * from diagnostico ORDER BY nombre_diagnostico";
$result = $db->Execute($sql);
echo "<select name=cod_diagnostico[] size=1 id =cod_diagnostico onKeyPress='return verif_caracter(this,event)'>";
echo"<option value='ninguna'>Ninguna</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$cod=$result->fields["nro_diagnostico"];
$a1=strtoupper($result->fields["nombre_diagnostico"]);
echo"<option value=$cod>$a1</option>";
$result->MoveNext();
	}
echo"</select>";
?>
    </font></font></td>
    <td width="35%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">Peso<font color="#000000">
        <input type="text" name="matricula" id="matricula3"  size="3"onKeyPress="return verif_caracter(this,event)">
  Talla
  <input type="text" name="matricula2" id="matricula22"  size="3"onKeyPress="return verif_caracter(this,event)">
  Sup. Corporal</font></font></div></td>
    <td width="28%"><div align="left"> <font color="#000000" size="2"><strong><font color="#000000" size="2"> 
        </font></strong> </font></div>
      <div align="left"></div>
      <div align="left"><font size="2"><strong><font size="2">
        <input type="Submit" name="Submit"  id ="Submit" value="Siguiente">
      </font><font color="#000000" size="2"> 
        </font></strong> </font></div></td>
  </tr>
</table>
<iframe src = "cargar_droga.php" width = "843" height = "300" border ="1"> </iframe>