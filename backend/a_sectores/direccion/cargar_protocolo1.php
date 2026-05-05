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

$sql="select * from deta_fact GROUP BY nro_factura ORDER BY nro_factura DESC";
$result = $db->Execute($sql);

 $nro_factura_anterior = $result->fields["nro_factura"];

 if ($nro_factura_anterior == ""){
	 $nro_factura_anterior= "No Existen Facturas en el Sistema";
$nro_factura= 1;

 }else{
 $nro_factura=($result->fields["nro_factura"] + 1);
 }


$dia = date("d");
$mes = date("m");
$anio = date("Y");
$forma_pago = "contado";

?>



<body onload = "on_load ()">
<FORM ACTION="cargar_protocolo2.php" METHOD = "POST" enctype="multipart/form-data" name="form">
  <table width="84%" border="0">
    <tr>
      <td width="44%"><table width="99%" border="0">
        <tr bgcolor="#000099">
          <td height="35" colspan="2"><div align="center" class="Estilo16 Estilo8"> PROTOCOLO DE TRATAMIENTO </div></td>
        </tr>
        <tr bgcolor="#E6E6E6">
          <td width="46%" bgcolor="#E8DCFC"><div align="right"><span class="Estilo32">OPERADOR</span></div></td>
          <td width="54%" bgcolor="#E0EDF3"><span class="Estilo4 Estilo6 Estilo16"><span class="Estilo21"><span class="Estilo22"><span class="Estilo26"><span class="Estilo53"><span class="Estilo16"><span class="Estilo3"><span class="Estilo4 Estilo16 Estilo6"><span class="Estilo5">
            <input name="operador" type="text" id="operador" size = "5" onKeyPress="return verif_caracter(this,event)">
          </span></span></span></span></span></span></span></span></span></td>
        </tr>
        <tr bgcolor="#E6E6E6">
          <td bgcolor="#E8DCFC"><div align="right" class="Estilo16 Estilo10 Estilo52"> CODIGO DE DIAGNOSTICO </div></td>
          <td bgcolor="#E0EDF3"><span class="Estilo4 Estilo6 Estilo16"><span class="Estilo21"><span class="Estilo22"><span class="Estilo26"><span class="Estilo53"><span class="Estilo16"><span class="Estilo3"><span class="Estilo4 Estilo16 Estilo6"><span class="Estilo5">
            <input name="nro_diagnostico" type="text" id="nro_diagnostico" size = "10" onKeyPress="return verif_caracter(this,event)"> 
            </span></span></span></span></span></span></span></span></span></td>
        </tr>
        <tr bgcolor="#E8DCFC">
          <td bgcolor="#E6E6E6">&nbsp;</td>
          <td bgcolor="#E6E6E6"><span class="Estilo4 Estilo6 Estilo16"><span class="Estilo21"><span class="Estilo22"><span class="Estilo26"><span class="Estilo9">
            <input name="Alta" type="submit" value= "Siguiente" id = "ok">
          </span></span></span></span></span></td>
        </tr>
      </table></td>
      <td width="56%"><iframe src = "buscar_diagnostico.php" width = "100%" height = "20%" border ="1"> </iframe></td>
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
