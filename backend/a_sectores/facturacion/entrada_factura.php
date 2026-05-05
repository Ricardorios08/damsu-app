<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<script language="javascript">
function on_load()
{
document.getElementById("dia").focus();
document.getElementById("dia").style.backgroundColor = "#CCFFCC";
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
				document.getElementById("dia").focus();

document.getElementById("operador").style.backgroundColor = "#FFFFFF";
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
document.getElementById("documento").focus();
document.getElementById("anio").style.backgroundColor = "#FFFFFF";
document.getElementById("documento").style.backgroundColor = "#CCFFCC";
				break;
				
				case "documento":
document.getElementById("ok").focus();
document.getElementById("documento").style.backgroundColor = "#FFFFFF";
document.getElementById("ok").style.backgroundColor = "#CCFFCC";
				break;

				

;

				
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
.Estilo9 {color: #FFFFFF; font-family: "Trebuchet MS"; }
-->


<!--
.Estilo53 {font-size: 12px; color: #000000; }
.Estilo54 {
	color: #000000;
	font-family: "Trebuchet MS";
}
.Estilo55 {font-family: "Trebuchet MS"}
.Estilo57 {font-size: 12px; color: #000000; font-family: "Trebuchet MS"; }
.Estilo58 {font-size: 10px; color: #000000;}
-->



</style>
</head>


<?php 

$id = $_REQUEST['id'];
include ("../../conexiones/config_pro.php");
include ("../../conexiones/usuario_venta.php");

$dia = date("d");
$mes = date("m");
$anio = date("Y");
$forma_pago = "contado";

?>



<body onload = "on_load ()">
<FORM ACTION="entrada_factura_4.php" METHOD = "POST" enctype="multipart/form-data" name="form">



  <table width="800" border="0" cellspacing="0">
        <tr bgcolor="#000099">
          <td height="35" colspan="3" bgcolor="#CCCCCC"><div align="center" class="Estilo16 Estilo54">ENTREGA DE MEDICAMENTOS ANMAT </div></td>
        </tr>
        <tr bgcolor="#E6E6E6">
          <td width="48%" bgcolor="#E6E6E6"><div align="right" class="Estilo55"><span class="Estilo53">OPERADOR</span></div></td>
          <td width="52%" colspan="2" bgcolor="#E6E6E6"><span class="Estilo4 Estilo6 Estilo16"><span class="Estilo21"><span class="Estilo22"><span class="Estilo26"><span class="Estilo53"><span class="Estilo16"><span class="Estilo3"><span class="Estilo4 Estilo6 Estilo55"><span class="Estilo57">
            <input name="operador" type="hidden" id="operador" onKeyPress="return verif_caracter(this,event)" value="<?php echo $id;?>" size = "5">
          <?php echo $usuario;?></span></span></span></span></span></span></span></span></span></td>
        </tr>
        <tr bgcolor="#E8DCFC">
          <td bgcolor="#E6E6E6"><div align="right" class="Estilo57">FECHA</div></td>
          <td colspan="2" bgcolor="#E6E6E6"><div align="left" class="Estilo55"><span class="Estilo4 Estilo6 "><span class="Estilo21"><span class="Estilo4">
              <input name="dia" type="text" id="dia" onKeyPress="return verif_caracter(this,event)" value = <?php echo $dia;?> size = "1" maxlength="2">
          /
          <input name="mes" type="text" id="mes" onKeyPress="return verif_caracter(this,event)" value = <?php echo $mes;?> size = "1" maxlength="2">
          /
          <input name="anio" type="text" id="anio" onKeyPress="return verif_caracter(this,event)" value = <?php echo $anio;?> size = "3" maxlength="4">
          </span></span></span></div></td>
        </tr>
        <tr bgcolor="#E8DCFC">
          <td rowspan="2" bgcolor="#E6E6E6"><div align="right" class="Estilo57">PACIENTE</div></td>
          <td colspan="2" bgcolor="#E6E6E6"><div align="left" class="Estilo55"><span class="Estilo4 Estilo6 "><span class="Estilo21"><span class="Estilo4"><span class="Estilo58">
              <!-- <input name="nro_cliente" type="text" id="nro_cliente" size = "4" onKeyPress="return verif_caracter(this,event)"> -->
          <span class="Estilo53"><span class="Estilo3"><span class="Estilo4 Estilo6"><span class="Estilo5">
          <input name="documento" type="text" id="documento" size = "20" maxlength="8">
            <input name="primera_vez" type="hidden" value ="1">
          </span></span></span></span></span></span></span></span></div></td>
        </tr>
        <tr bgcolor="#E8DCFC">
          <td colspan="2" bgcolor="#E6E6E6"><span class="Estilo55"><span class="Estilo4 Estilo6 "><span class="Estilo21"><span class="Estilo4"><span class="Estilo58"><span class="Estilo53"><span class="Estilo3"><span class="Estilo4 Estilo6"><span class="Estilo5">
            <?php /*include ("../../conexiones/config_pro.php");
 $sql = "SELECT * FROM `pacientes` order by apellido";
$result = $db->Execute($sql);
echo "<select name=nro_paciente[] size=1 id =nro_paciente onKeyPress='return verif_caracter(this,event)'>";
echo"<option value=''>Seleccione Paciente</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
echo $documento=$result->fields["documento"];
$apellido=strtoupper($result->fields["apellido"]);
$nombre=strtoupper($result->fields["nombre"]);
$tipo_doc=$result->fields["tipo_doc"];

$cod = $documento;
echo"<option value=$cod>$apellido $nombre ( $tipo_doc - $cod) </option>";
$result->MoveNext();
	}
echo"</select>";
*/

?>
          </span></span></span></span></span></span></span></span></span></td>
        </tr>
        <tr bgcolor="#E8DCFC">
          <td colspan="3" bgcolor="#CCCCCC"><div align="center"><span class="Estilo55"></span><span class="Estilo4 Estilo6 Estilo16"><span class="Estilo21"><span class="Estilo22"><span class="Estilo26"><span class="Estilo9">
          <input name="Alta" type="submit" value= "Siguiente" id = "ok">
          </span></span></span></span></span></div></td>
        </tr>
  </table>
</form><?php //INCLUDE ("buscar_cliente.php");?>
</table>
</body>


</html>
