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
.Estilo9 {color: #FFFFFF; font-family: "Trebuchet MS"; }
-->


<!--
.Estilo54 {
	color: #000000;
	font-family: "Trebuchet MS";
}
.Estilo55 {font-family: "Trebuchet MS"}
.Estilo57 {font-size: 12px; color: #000000; font-family: "Trebuchet MS"; }
.Estilo59 {font-family: "Trebuchet MS"; font-size: 12px; }
-->



</style>
</head>


<?php 

$id = $_REQUEST['id'];
include ("../../../conexiones/config_pro.php");


$dia = date("d");
$mes = date("m");
$anio = date("Y");
$forma_pago = "contado";

?>



<body onload = "on_load ()">
<FORM ACTION="saca_coir.php" METHOD = "POST" enctype="multipart/form-data" name="form">



  <table width="800" border="0" cellspacing="0">
        <tr bgcolor="#000099">
          <td height="35" colspan="3" bgcolor="#CCCCCC"><div align="center" class="Estilo16 Estilo54">SACAR ENVIO COIR A UNA ENTREGA REALIZADA </div></td>
        </tr>
        
        
        <tr bgcolor="#E8DCFC">
          <td width="50%" bgcolor="#E6E6E6"><div align="right" class="Estilo57">NRO COMPROBANTE </div></td>
          <td width="50%" colspan="2" bgcolor="#E6E6E6"><label>
            <input name="nro_comprobante" type="text" id="nro_comprobante">
          </label></td>
        </tr>
        <!-- <tr bgcolor="#E8DCFC">
          <td bgcolor="#E6E6E6"><div align="right"><span class="Estilo59">CONTRASE&Ntilde;A DE SEGURIDAD </span></div></td>
          <td colspan="2" bgcolor="#E6E6E6"><input name="seguridad" type="password" id="seguridad"></td>
        </tr> -->
        
        <tr bgcolor="#E8DCFC">
          <td colspan="3" bgcolor="#CCCCCC"><div align="center"><span class="Estilo55"></span><span class="Estilo4 Estilo6 Estilo16"><span class="Estilo21"><span class="Estilo22"><span class="Estilo26"><span class="Estilo9">
          <input name="Alta" type="submit" value= "CAMBIAR" id = "ok">
          </span></span></span></span></span></div></td>
        </tr>
  </table>
</form><?php //INCLUDE ("buscar_cliente.php");?>
</table>
</body>


</html>
