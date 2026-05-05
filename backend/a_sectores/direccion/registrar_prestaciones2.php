<script language="javascript">
function on_load()
{
document.getElementById("precio").focus();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "precio":
				document.getElementById("cantidad").focus();
				
				break;
				case "cantidad":
				document.getElementById("observaciones").focus();
				break;
				 
			
		}
		return false;
	}
	return true;
}


</script>


<?php 


if ($band != 1){
$documento = $_REQUEST['documento'];
}


$boton = $_REQUEST['Alta'];



include ("../../conexiones/config_usu.php");

$sql7="select * from pacientes where documento = $documento";
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
include ("buscar_prestaciones_paciente.php");
exit;
}

?>


<?php 
$dia = date("d");
$mes= date("m");
$anio = date("y");

?>
<style type="text/css">
<!--
.Estilo1 {font-family: "Trebuchet MS"}
.Estilo2 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo3 {font-size: 12px}
.Estilo4 {font-family: Geneva, Arial, Helvetica, sans-serif}
.Estilo5 {font-family: Geneva, Arial, Helvetica, sans-serif; font-size: 12px; }
.Estilo6 {font-size: 12}
-->
</style>
<body onload = "on_load ()">

<FORM name="form" ACTION="guardar_prestaciones.php" METHOD = "POST">
<table width="800" border="0" cellspacing="0">
  <tr bgcolor="#CFE6F5">
    <td height="28" colspan="2"><div align="center" class="Estilo1 Estilo9">REGISTRAR PRESTACIONES PACIENTE </div></td>
  </tr>
  <tr bgcolor="#C4D7E6">
    <td colspan="2" bgcolor="#EDEDED"><div align="left" class="Estilo2">Nombre Paciente <span class="Estilo4 Estilo6  Estilo16"><span class="Estilo3"><span class="Estilo60"><span class="Estilo61"><span class="Estilo58"><span class="Estilo16"><span class="Estilo4 Estilo16  Estilo6">:  <?php echo $nombre_completo;?> - <?php echo $documento;?></span></span></span></span></span></span></span></div></td>
  </tr>
  <tr bgcolor="#C4D7E6">
    <td colspan="2" bgcolor="#EDEDED"><div align="left" class="Estilo2"><span class="Estilo32">Diagn&oacute;stico: <span class="Estilo4 Estilo16  Estilo6"><span class="Estilo3"><span class="Estilo62"><?php echo $nombre_diagnostico;?></span></span></span></span></div></td>
  </tr>
  <tr bgcolor="#E0EDF3">
    <td width="394" bgcolor="#FFFFFF"><div align="right" class="Estilo8 Estilo5 Estilo1 Estilo3">Prestaci&oacute;n:</div></td>
    <td width="396" bgcolor="#FFFFFF"><span class="Estilo2">
      <?php include

("../../conexiones/config_usu.php");
$sql = "SELECT * FROM `prestaciones`";
$result = $db->Execute($sql);
echo "<select name=prestaciones[] size=1 id =prestaciones onKeyPress='return verif_caracter(this,event)'>";
echo"<option value=''>Seleccione Prestación </option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$a1=strtoupper($result->fields["descripcion"]);
$cod=strtoupper($result->fields["cod_prestacion"]);
echo"<option value=$cod>$cod ($a1) </option>";
$result->MoveNext();
	}
echo"</select>";
?>
    </span></td>
  </tr>
  <tr bgcolor="#E0EDF3">
    <td bgcolor="#FFFFFF"><div align="right" class="Estilo4 Estilo5 Estilo1 Estilo3">Fecha:</div></td>
    <td bgcolor="#FFFFFF"><span class="Estilo32"><span class="Estilo4 Estilo6  Estilo16"><span class="Estilo21"><span class="Estilo57"><span class="Estilo26"><span class="Estilo53"><span class="Estilo16"><span class="Estilo3"><span class="Estilo4 Estilo16  Estilo6"><span class="Estilo5 Estilo1">
      <input name="dia" type="text" id="dia" onKeyPress="return verif_caracter(this,event)" value="<?php echo $dia;?>" size = "2" maxlength="2">
/&nbsp;&nbsp;
<input name="mes" type="text" id="mes" onKeyPress="return verif_caracter(this,event)" value="<?php echo $mes;?>" size = "2" maxlength="2">
/ 20
<input name="anio" type="text" id="anio" onKeyPress="return verif_caracter(this,event)" value="<?php echo $anio;?>" size = "2" maxlength="2">
    </span></span></span></span></span></span></span></span></span></span></td>
  </tr>
  <tr bgcolor="#E0EDF3">
    <td bgcolor="#FFFFFF"><div align="right" class="Estilo8 Estilo1 Estilo3">Precio:</div></td>
    <td bgcolor="#FFFFFF"><span class="Estilo1 Estilo3">
      <input name="precio" type="text" id="precio" size = "5" onKeyPress="return verif_caracter(this,event)">
    </span></td>
  </tr>
  <tr bgcolor="#E0EDF3">
    <td bgcolor="#FFFFFF"><div align="right" class="Estilo8 Estilo1 Estilo3">Cantidad </div></td>
    <td bgcolor="#FFFFFF"><span class="Estilo1 Estilo3">
      <input name="cantidad" type="text" id="cantidad" onKeyPress="return verif_caracter(this,event)" value="1" size = "5">
    </span></td>
  </tr>
  <tr bgcolor="#E0EDF3">
    <td bgcolor="#FFFFFF"><div align="right" class="Estilo8 Estilo1 Estilo3">Observaciones</div></td>
    <td bgcolor="#FFFFFF"><span class="Estilo1 Estilo3">
      <input name="observaciones" type="text" id="observaciones"  value="" size="60">
     <input name="documento" type="hidden" value = "<?php echo $documento;?>"> 
	</span></td>
  </tr>
  <tr bgcolor="#E0EDF3">
    <td bgcolor="#FFFFFF"><div align="right"><span class="Estilo5">Prestador: </span></div></td>
    <td bgcolor="#FFFFFF"><font size="2" face="Trebuchet MS">
      <?php 
include ("../../../conexiones/config_usu.php");
$sql="select * from prestadores ORDER BY nombre_prestador ";
$result = $db->Execute($sql);
echo "<select name=cod_prestador[] size=1 id =cod_prestador onKeyPress='return verif_caracter(this,event)'>";

 ?>
      <option value selected= "<?php "$cod_laboratorio";?>"> <font size="2" face="Trebuchet MS"><strong><font color="#000000"><?php print("$nombre_prestaor");?> <?php print("$cod_prestador");?></font></strong></font></option>
      <?php


echo"<option value='ninguna'>Ninguna</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$cod=$result->fields["cod_prestador"];
$a1=strtoupper($result->fields["nombre_prestador"]);
echo"<option value=$cod>$a1 ($cod)</option>";
$result->MoveNext();
	}
echo"</select>";
?>
    </font></td>
  </tr>
  <tr bgcolor="#E0EDF3">
    <td bgcolor="#FFFFFF"><div align="right" class="Estilo5"> Nuevo Prestador </div></td>
    <td bgcolor="#FFFFFF"><span class="Estilo1 Estilo3">
      <input name="nuevo_prestador" type="text" id="nuevo_prestador"  value="" size="60">
    </span></td>
  </tr>
  <tr bgcolor="#E0EDF3">
    <td bgcolor="#FFFFFF"><div align="right" class="Estilo5">Fuente</div></td>
    <td bgcolor="#FFFFFF"><span class="Estilo1 Estilo3"><font size="2" face="Trebuchet MS">
      <?php 
include ("../../../conexiones/config_usu.php");
$sql="select * from fuentes  ORDER BY nombre_fuente";
$result = $db->Execute($sql);
echo "<select name=fuente[] size=1 id =fuente onKeyPress='return verif_caracter(this,event)'>";

 ?>
      <option value selected= "<?php  "$fuente";?>"> <font size="2" face="Trebuchet MS"><strong><font color="#000000"><?php print("$nombre_fuente");?> <?php print("$nro_fuente");?></font></strong></font></option>
      <?php


echo"<option value='ninguna'>Ninguna</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$cod=$result->fields["nro_fuente"];
$a1=strtoupper($result->fields["nombre_fuente"]);
echo"<option value=$cod>$a1 ($cod)</option>";
$result->MoveNext();
	}
echo"</select>";
?>
    </font>
    </span></td>
  </tr>
  <tr bgcolor="#E6E6E6">
    <td colspan="2"><div align="center"><span class="Estilo3">
      <input name="Alta" type="submit" value= "Guardar Prestacion Paciente" id = "Alta2">
    </span></div></td>
  </tr>
</table>

<?php include ("tabla_prestaciones.php");?>
</body>
</html>
