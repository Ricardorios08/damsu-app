<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<script language="javascript">
function on_load()
{
document.getElementById("situacion").focus();
document.getElementById("situacion").style.backgroundColor = "#CCFFCC";
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
.Estilo10 {font-size: 12px}
-->


<!--
.Estilo52 {color: #000000}
.Estilo53 {font-size: 12px; color: #000000; }
.Estilo28 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; }
.Estilo32 {font-size: 12px; color: #000000; font-family: Arial, Helvetica, sans-serif; }
-->



</style>
</head>


<?php 
include ("../../conexiones/config_usu.php");
 $nro_diagnostico = $_REQUEST['nro_diagnostico'];
 $operador = $_REQUEST['operador'];

$sql="select * from diagnostico where nro_diagnostico LIKE '$nro_diagnostico'";
$result = $db->Execute($sql);

$nombre_diagnostico=strtoupper($result->fields["nombre_diagnostico"]);

?>



<body onload = "on_load ()">
<FORM ACTION="cargar_droga.php" METHOD = "POST" enctype="multipart/form-data" name="form">
  <table width="84%" border="0">
    <tr>
      <td width="44%" valign="top"><table width="99%" border="0">
        <tr bgcolor="#000099">
          <td height="35" colspan="2"><div align="center" class="Estilo16 Estilo8"> PROTOCOLO DE TRATAMIENTO </div></td>
        </tr>
        <tr bgcolor="#E6E6E6">
          <td width="46%" bgcolor="#E8DCFC"><div align="right"><span class="Estilo32">OPERADOR</span></div></td>
          <td width="54%" valign="top" bgcolor="#E0EDF3"><span class="Estilo4 Estilo6 Estilo16"><span class="Estilo21"><span class="Estilo22"><span class="Estilo26"><span class="Estilo53"><span class="Estilo16"><span class="Estilo3"><span class="Estilo4 Estilo16 Estilo6"><span class="Estilo5">
            <input name="operador" type="text" id="operador" onKeyPress="return verif_caracter(this,event)" value="<?php ECHO $operador;?>" size = "5">
        <?php ECHO $nombre_operador;?>  </span></span></span></span></span></span></span></span></span></td>
        </tr>
        <tr bgcolor="#E6E6E6">
          <td bgcolor="#E8DCFC"><div align="right" class="Estilo16 Estilo10 Estilo52"> CODIGO DE DIAGNOSTICO </div></td>
          <td valign="top" bgcolor="#E0EDF3"><span class="Estilo4 Estilo6 Estilo16"><span class="Estilo21"><span class="Estilo22"><span class="Estilo26"><span class="Estilo53"><span class="Estilo16"><span class="Estilo3"><span class="Estilo4 Estilo16 Estilo6"><span class="Estilo5">
            <input name="nro_diagnostico" type="text" id="nro_diagnostico" onKeyPress="return verif_caracter(this,event)" value="<?php ECHO $nro_diagnostico;?>" size = "10"> 
            <?php ECHO $nombre_diagnostico;?>            </span></span></span></span></span></span></span></span></span></td>
        </tr>
        <tr bgcolor="#E6E6E6">
          <td bgcolor="#E8DCFC"><div align="right"><span class="Estilo32">SITUACION</span></div></td>
          <td valign="top" bgcolor="#E0EDF3"><span class="Estilo4 Estilo6 Estilo16"><span class="Estilo21"><span class="Estilo22"><span class="Estilo26"><span class="Estilo53"><span class="Estilo16"><span class="Estilo3"><span class="Estilo4 Estilo16 Estilo6"><span class="Estilo5">
            <input name="situacion" type="text" id="situacion" size = "30" onKeyPress="return verif_caracter(this,event)">
          </span></span></span></span></span></span></span></span></span></td>
        </tr>
        <tr bgcolor="#E6E6E6">
          <td bgcolor="#E8DCFC"><div align="right"><span class="Estilo32">LINEA</span></div></td>
          <td valign="top" bgcolor="#E0EDF3"><span class="Estilo4 Estilo6 Estilo16"><span class="Estilo21"><span class="Estilo22"><span class="Estilo26"><span class="Estilo53"><span class="Estilo16"><span class="Estilo3"><span class="Estilo4 Estilo16 Estilo6"><span class="Estilo5">
            <input name="linea" type="text" id="operador4" size = "5" onKeyPress="return verif_caracter(this,event)">
          </span></span></span></span></span></span></span></span></span></td>
        </tr>
        <tr bgcolor="#E6E6E6">
          <td bgcolor="#E8DCFC"><div align="right"><span class="Estilo32">ESQUEMA</span></div></td>
          <td valign="top" bgcolor="#E0EDF3"><span class="Estilo4 Estilo6 Estilo16"><span class="Estilo21"><span class="Estilo22"><span class="Estilo26"><span class="Estilo53"><span class="Estilo16"><span class="Estilo3"><span class="Estilo4 Estilo16 Estilo6"><span class="Estilo5">
            <input name="esquema" type="text" id="operador5" size = "15" onKeyPress="return verif_caracter(this,event)">
          </span></span></span></span></span></span></span></span></span></td>
        </tr>
        <tr bgcolor="#E6E6E6">
          <td bgcolor="#E8DCFC"><div align="right"><span class="Estilo32">PLAN</span></div></td>
          <td valign="top" bgcolor="#E0EDF3"><span class="Estilo4 Estilo6 Estilo16"><span class="Estilo21"><span class="Estilo22"><span class="Estilo26"><span class="Estilo53"><span class="Estilo16"><span class="Estilo3"><span class="Estilo4 Estilo16 Estilo6"><span class="Estilo5">
            <input name="plan" type="text" id="operador6" size = "5" onKeyPress="return verif_caracter(this,event)">
          </span></span></span></span></span></span></span></span></span></td>
        </tr>
        <tr bgcolor="#E6E6E6">
          <td bgcolor="#E8DCFC"><div align="right"><span class="Estilo32">ALTERNATIVA</span></div></td>
          <td valign="top" bgcolor="#E0EDF3"><span class="Estilo4 Estilo6 Estilo16"><span class="Estilo21"><span class="Estilo22"><span class="Estilo26"><span class="Estilo53"><span class="Estilo16"><span class="Estilo3"><span class="Estilo4 Estilo16 Estilo6"><span class="Estilo5">
            <input name="alternativa" type="text" id="operador7" size = "5" onKeyPress="return verif_caracter(this,event)">
          </span></span></span></span></span></span></span></span></span></td>
        </tr>
        <tr bgcolor="#E8DCFC">
          <td bgcolor="#E6E6E6">&nbsp;</td>
          <td valign="top" bgcolor="#E6E6E6"><span class="Estilo4 Estilo6 Estilo16"><span class="Estilo21"><span class="Estilo22"><span class="Estilo26"><span class="Estilo9">
            <input name="Alta" type="submit" value= "Siguiente" id = "ok">
          </span></span></span></span></span></td>
        </tr>
      </table></td>
      <td width="56%" valign="top"><!-- <iframe src = "cargar_droga.php" width = "100%" height = "300" border ="1"> </iframe> --></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form><?php //INCLUDE ("buscar_cliente.php");?>
</table>
</body>


</html>
