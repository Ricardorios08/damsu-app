<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<script language="javascript">
function on_load()
{
document.getElementById("operador").focus();
document.getElementById("operador").style.backgroundColor = "#CCFFCC";
}

function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{


				case "operador":
				document.getElementById("nro_factura").focus();

document.getElementById("operador").style.backgroundColor = "#FFFFFF";
document.getElementById("nro_factura").style.backgroundColor = "#CCFFCC";
				break;
				
				case "nro_factura":
				document.getElementById("dia").focus();

document.getElementById("nro_factura").style.backgroundColor = "#FFFFFF";
document.getElementById("dia").style.backgroundColor = "#CCFFCC";
				break;
				
				
				case "dia":
				document.getElementById("mes").focus();
document.getElementById("dia").style.backgroundColor = "#FFFFFF";
document.getElementById("mes").style.backgroundColor = "#CCFFCC";


				break;
				case "mes":
				document.getElementById("anio").focus();
document.getElementById("mes").style.backgroundColor = "#FFFFFF";
document.getElementById("anio").style.backgroundColor = "#CCFFCC";
				break;

				case "anio":
document.getElementById("cod_cliente").focus();
document.getElementById("anio").style.backgroundColor = "#FFFFFF";
document.getElementById("cod_cliente").style.backgroundColor = "#CCFFCC";
				break;

				case "cod_cliente":
document.getElementById("cod_laboratorio").focus();
document.getElementById("cod_cliente").style.backgroundColor = "#FFFFFF";
document.getElementById("cod_laboratorio").style.backgroundColor = "#CCFFCC";
				break;
				
				case "cod_laboratorio":
document.getElementById("forma_pago").focus();
document.getElementById("cod_laboratorio").style.backgroundColor = "#FFFFFF";
document.getElementById("forma_pago").style.backgroundColor = "#CCFFCC";
				break;

				case "forma_pago":
				document.getElementById("ok").focus();
				break;

				
		}
		return false;
	}
	return true;
}


</script>


<html>
<head>
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Estilo4 {
	color: #006633;
	font-size: 10px;
	font-weight: bold;
}
.Estilo6 {font-size: 12}
.Estilo16 {font-family: Arial, Helvetica, sans-serif}
.Estilo21 {font-size: 10px; color: #006633; }
.Estilo22 {color: #006633; font-size: 10px; font-weight: bold; font-family: Arial, Helvetica, sans-serif; }
.Estilo26 {
	color: #000000;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
}
.Estilo3 {font-size: 10px}
.Estilo5 {color: #006633}
.Estilo8 {color: #FFFFFF}
.Estilo9 {color: #FFFFFF; font-family: Arial, Helvetica, sans-serif; }
-->


<!--
.Estilo52 {color: #000000}
.Estilo53 {font-size: 12px; color: #000000; }
.Estilo32 {font-size: 12px; color: #000000; font-family: Arial, Helvetica, sans-serif; }
.Estilo55 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
.Estilo56 {font-weight: bold; color: #006633;}
.Estilo57 {font-size: 10px; font-family: Arial, Helvetica, sans-serif; color: #006633;}
-->



</style>
</head>


<?php 
$documento = $_REQUEST['documento'];
include ("../../conexiones/config_usu.php");

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
?>



<body onload = "on_load ()">
<FORM name="form" ACTION="<?php php echo $_SERVER["PHP_SELF"];?>" METHOD = "POST">
  <table width="99%" border="0">
    <tr bgcolor="#000099">
      <td width="100%" height="35" colspan="2"><div align="center" class="Estilo16 Estilo8"> PRESTACIONES (Pag.2)</div></td>
    </tr>
    <tr bgcolor="#E6E6E6">
      <td colspan="2" bgcolor="#E8DCFC"><div align="left" class="Estilo32">Documento<span class="Estilo4 Estilo6 Estilo16"><span class="Estilo21"><span class="Estilo22"><span class="Estilo26"><span class="Estilo53"><span class="Estilo16"><span class="Estilo3"><span class="Estilo4 Estilo16 Estilo6"><span class="Estilo5">: <?php echo $documento;?> - <?php echo $nombre_completo;?>&nbsp;&nbsp;&nbsp;</span></span></span></span></span></span></span></span></span> <span class="Estilo4 Estilo6  Estilo16"><span class="Estilo21"><span class="Estilo57"><span class="Estilo26"><span class="Estilo53"><span class="Estilo16"><span class="Estilo3"><span class="Estilo4 Estilo16  Estilo6"><span class="Estilo5"><span class="Estilo16 Estilo53">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="Estilo55">
        
        </span></span></span></span></span></span></span></span></span></span></div></td>
    </tr>
    <tr bgcolor="#E6E6E6">
      <td colspan="2" bgcolor="#E8DCFC"><span class="Estilo32">Diagn&oacute;stico: <span class="Estilo4 Estilo6 Estilo16"><span class="Estilo21"><span class="Estilo22"><span class="Estilo26"><span class="Estilo53"><span class="Estilo16"><span class="Estilo3"><span class="Estilo4 Estilo16 Estilo6"><span class="Estilo5"><?php echo $nombre_diagnostico;?></span></span></span></span></span></span></span></span></span></span></td>
    </tr>
    <tr bgcolor="#E6E6E6">
      <td colspan="2" bgcolor="#E8DCFC"><span class="Estilo32"><span class="Estilo4 Estilo6  Estilo16"><span class="Estilo21"><span class="Estilo57"><span class="Estilo26"><span class="Estilo53"><span class="Estilo16"><span class="Estilo3"><span class="Estilo4 Estilo16  Estilo6"><span class="Estilo5"><span class="Estilo55"> Codigo
                              <?php include

("../../conexiones/config_usu.php");
$sql = "SELECT * FROM `prestaciones`";
$result = $db->Execute($sql);
echo "<select name=prestaciones[] size=1 id =prestaciones onKeyPress='return verif_caracter(this,event)'>";
echo"<option value='0'>Seleccione Prestacion </option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$a1=$result->fields["descripcion"];
$cod=strtoupper($result->fields["cod_prestacion"]);
echo"<option value=$cod>$a1 ($cod) </option>";
$result->MoveNext();
	}
echo"</select>";
?>
      </span></span></span></span></span></span></span></span></span></span></span></td>
    </tr>
    <tr bgcolor="#E6E6E6">
      <td colspan="2" bgcolor="#E8DCFC"><span class="Estilo32"><span class="Estilo4 Estilo6  Estilo16"><span class="Estilo21"><span class="Estilo57"><span class="Estilo26"><span class="Estilo53"><span class="Estilo16"><span class="Estilo3"><span class="Estilo4 Estilo16  Estilo6"><span class="Estilo5"><span class="Estilo55">Fecha</span><span class="Estilo16 Estilo53">
      <input name="dia" type="text" id="nro_diagnostico22" onKeyPress="return verif_caracter(this,event)" value="<?php echo $dia;?>" size = "2" maxlength="2">
/&nbsp;&nbsp;
<input name="mes" type="text" id="dia" onKeyPress="return verif_caracter(this,event)" value="<?php echo $mes;?>" size = "2" maxlength="2">
/ 20
<input name="anio" type="text" id="dia" onKeyPress="return verif_caracter(this,event)" value="<?php echo $anio;?>" size = "2" maxlength="2">
<span class="Estilo55"></span> </span></span></span></span></span></span></span></span></span></span></span></td>
    </tr>

    <tr bgcolor="#E6E6E6">
      <td width="800%" colspan="2" bgcolor="#C4D7E6"><span class="Estilo3">PRESTACION: <?php echo $prestaciones;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PRECIO $
      <input name="operador2" type="text" id="operador23" size = "5" onKeyPress="return verif_caracter(this,event)">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      &nbsp; Cantidad
      <input name="operador22" type="text" id="operador22" size = "5" onKeyPress="return verif_caracter(this,event)">
&nbsp;&nbsp;</span></td>
    </tr>
    <tr bgcolor="#E6E6E6">
      <td colspan="2" valign="middle" bgcolor="#C4D7E6"><span class="Estilo3">COMENATARIO: 
        <input name="nro_diagnostico3" type="text" id="nro_diagnostico5" onKeyPress="return verif_caracter(this,event)" value="" size="60">
      <input name="Alta" type="submit" value= "Guardar Prestacion Paciente" id = "Alta">
      </span></td>
    </tr>
    <tr bgcolor="#E6E6E6">
      <td colspan="2" valign="middle" bgcolor="#CFCFCF"><span class="Estilo32"><span class="Estilo4 Estilo6 Estilo16"><span class="Estilo21"><span class="Estilo22"><span class="Estilo26"><span class="Estilo53"><span class="Estilo16"><span class="Estilo3"><span class="Estilo4 Estilo16 Estilo6"><span class="Estilo5"><span class="Estilo9">
      </span></span></span></span></span></span></span></span></span></span></span></td>
    </tr>
  </table>
</form>






</body>


</html>
