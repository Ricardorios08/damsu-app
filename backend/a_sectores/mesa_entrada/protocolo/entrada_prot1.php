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
<FORM name="form" ACTION="<?php php echo $_SERVER["PHP_SELF"];?>" METHOD = "POST">
<table width="95%" border="0">
  <!--DWLayoutTable-->
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#E6E6E6"> 
    <td height="26" valign="top"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><strong>PROTOCOLO AL QUE INGRESA</strong></font></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#E8DCFC">
    <td height="24"><font size="2" face="Arial, Helvetica, sans-serif">Paciente: <?php echo $nombre_completo;?> N° Doc. <?php echo $documento;?> </font></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#E8DCFC">
    <td height="24"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Diagnostico</font><font size="2" face="Arial, Helvetica, sans-serif">: <?php echo $nombre_diagnostico;?></font></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#E8DCFC">
    <td height="24"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">Peso<font color="#000000">
        <input type="text" name="peso" id="peso"  size="3"onKeyPress="return verif_caracter(this,event)">
    Talla
    <input type="text" name="talla" id="talla"  size="3"onKeyPress="return verif_caracter(this,event)">
    Sup. Corporal</font></font></div>      <div align="center"></div></td>
  </tr>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#E8DCFC"> 
    <td height="24"><div align="right"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000000">
    </font></font></div>      <div align="center"><font size="2"><strong><font size="2">
    <input type="Submit" name="Alta"  id ="Alta" value="Siguiente">
    </font></strong></font><font size="2" face="Arial, Helvetica, sans-serif"></font></div>    <div align="left"> <font color="#000000" size="2"><strong><font color="#000000" size="2"> 
        </font></strong> </font></div>    <div align="left"></div>    <div align="left"><font size="2"><strong><font size="2">
        </font><font color="#000000" size="2"> 
    </font></strong> </font></div></td>
  </tr>
</table>
<!-- <iframe src = "cargar_droga.php" width = "843" height = "300" border ="1"> </iframe> -->

<?php 
if(isset($_REQUEST['Alta'])) {
	
	switch ($_REQUEST['Alta'])
	{
		case "Siguiente":
				{
include ("cargar_droga.php");
break;
				}

	}
}
