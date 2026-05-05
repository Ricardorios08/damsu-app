<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<script language="javascript">
function on_load()
{
document.getElementById("nro_factura").focus();
document.getElementById("nro_factura").style.backgroundColor = "#CCFFCC";
}

function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
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
				document.getElementById("nro_cliente").focus();
document.getElementById("anio").style.backgroundColor = "#FFFFFF";
document.getElementById("nro_cliente").style.backgroundColor = "#CCFFCC";
				break;
				
				case "nro_cliente":
				document.getElementById("matricula").focus();
document.getElementById("nro_cliente").style.backgroundColor = "#FFFFFF";
document.getElementById("matricula").style.backgroundColor = "#CCFFCC";
				break;

				case "matricula":
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
.Estilo1 {font-size: xx-large}
.Estilo2 {font-size: 24px}
.Estilo4 {
	color: #006633;
	font-size: 10px;
	font-weight: bold;
}
.Estilo6 {font-size: 12}
.Estilo16 {font-family: Arial, Helvetica, sans-serif}
.Estilo19 {
	font-size: 10px;
	color: #000000;
}
.Estilo21 {font-size: 10px; color: #006633; }
.Estilo22 {color: #006633; font-size: 10px; font-weight: bold; font-family: Arial, Helvetica, sans-serif; }
.Estilo24 {color: #000000}
.Estilo25 {font-weight: bold; font-family: Arial, Helvetica, sans-serif; font-size: 10px;}
.Estilo26 {
	color: #000000;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
}
.Estilo27 {font-size: 24px; color: #FFFFFF;}
.Estilo3 {font-size: 10px}
.Estilo5 {color: #006633}
-->
</style>
</head>


<?
include ("../../../conexiones/config_pro.php");

$sql="select * from deta_fact GROUP BY nro_factura ORDER BY nro_factura DESC";
$result = $db->Execute($sql);

$nro_factura_anterior = $result->fields["nro_factura"];
 $nro_factura=($result->fields["nro_factura"] + 1);

$dia = date("d");
$mes = date("m");
$año = date("Y");
$forma_pago = "contado";

?>



<body onload = "on_load ()">

<FORM name="form" ACTION="entrada_factura_2.php" METHOD = "POST">
<table width="53%" border="0">
  <tr bgcolor="#000099">
    <td height="28" colspan="4"><div align="center" class="Estilo2">
      <div align="center" class="Estilo27">Facturaci&oacute;n de Proveedur&iacute;a <span class="Estilo16"><!-- <IMG SRC="../../../imagenes/patan.jpg" alt="Patan" border = "0"> --></span> </div>
    </div>      
      <div align="center" class="Estilo1">
        <div align="center"></div>
    </div>    </td>
  </tr>
  <tr bgcolor="#E6E6E6">
    <td colspan="2"><div align="left" class="Estilo16 Estilo19">
      <div align="center"><strong>N&ordm; FACTURA ANTERIOR: <?echo $nro_factura_anterior;?> </strong></div>
    </div>      </td>
    </tr>
  <tr bgcolor="#E8DCFC">
    <td width="48%"><div align="right"><span class="Estilo16"><span class="Estilo3"><strong>N&ordm; FACTURA </strong><span class="Estilo4 Estilo16 Estilo6"><span class="Estilo5">    </span></span></span></span></div></td>
    <td width="52%"><div align="left"><span class="Estilo16"><span class="Estilo3"><span class="Estilo4 Estilo16 Estilo6"><span class="Estilo5">
          <input name="nro_factura" type="text" id="nro_factura" size = "5" value = "<?echo $nro_factura;?>" onKeyPress="return verif_caracter(this,event)">
    </span></span></span></span></div></td>
  </tr>
  <tr bgcolor="#E8DCFC">
    <td><div align="right"><span class="Estilo4 Estilo6 Estilo16"><span class="Estilo21"><span class="Estilo24"><span class="Estilo25">FECHA</span></span> <span class="Estilo22">        <span class="Estilo26">  </span></span></span></span></div></td>
    <td><div align="left"><span class="Estilo4 Estilo6 Estilo16"><span class="Estilo21"><span class="Estilo22">
          <input name="dia" type="text" id="dia" size = "1" value = <?echo $dia;?> onKeyPress="return verif_caracter(this,event)">
    /
    <input name="mes" type="text" id="mes" size = "1" value = <?echo $mes;?> onKeyPress="return verif_caracter(this,event)">
    /
    <input name="anio" type="text" id="anio" size = "3" value = <?echo $año;?> onKeyPress="return verif_caracter(this,event)">
    </span></span></span></div></td>
  </tr>
  <tr bgcolor="#E8DCFC">
    <td><div align="right"><span class="Estilo4 Estilo6 Estilo16"><span class="Estilo21"><span class="Estilo22"> <span class="Estilo26">N&ordm; CLIENTE</span> <span class="Estilo26">
    </span></span></span></span></div></td>
    <td><div align="left"><span class="Estilo4 Estilo6 Estilo16"><span class="Estilo21"><span class="Estilo22"><span class="Estilo26">
          <input name="nro_cliente" type="text" id="nro_cliente" size = "5" onKeyPress="return verif_caracter(this,event)">
    </span></span></span></span></div></td>
  </tr>
  <tr bgcolor="#E8DCFC">
    <td><div align="right"><span class="Estilo4 Estilo6 Estilo16"><span class="Estilo21"><span class="Estilo22"><span class="Estilo26">N&ordm; CUENTA
                <input name="forma_pago" type="hidden" value ="<?echo $forma_pago;?>">
    </span></span></span></span></div></td>
    <td><div align="left"><span class="Estilo4 Estilo6 Estilo16"><span class="Estilo21"><span class="Estilo22"><span class="Estilo26">
          <input name="matricula" type="text" id="matricula" size = "5"onKeyPress="return verif_caracter(this,event)">
    </span></span></span></span></div></td>
  </tr>
  <tr bgcolor="#E6E6E6">
    <td><div align="right"><span class="Estilo4 Estilo6 Estilo16">SIGUIENTE</span></div></td>
    <td><span class="Estilo4 Estilo6 Estilo16"><span class="Estilo21"><span class="Estilo22"><span class="Estilo26">
      <input name="Alta" type="submit" value= "OK" onKeyPress="return verif_caracter(this,event)">
    </span></span></span></span></td>
  </tr>
</table>

</form>
</body>


</html>
