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
.Estilo8 {color: #000000}
-->


<!--
.Estilo53 {font-size: 12px; color: #000000; }
.Estilo32 {font-size: 12px; color: #000000; font-family: Arial, Helvetica, sans-serif; }
-->



</style>
<link href="../../../oncologico/css/fondo.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.Estilo54 {font-family: "Trebuchet MS"}
body {
	background-image: url(../../imagenes/presentacion/fondo6.jg);
	background-repeat: repeat-y;
}
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
<FORM ACTION="registrar_prestaciones2.php" METHOD = "POST" enctype="multipart/form-data" name="form">
  <table width="800" border="0" cellspacing="0">
    <tr>
      <td height="35" colspan="2" bgcolor="#CCCCCC"><div align="center" class="Estilo16 Estilo8 Estilo54"> REGISTRAR PRESTACIONES PACIENTES </div></td>
    </tr>
    
    <tr>
      <td width="43%" bgcolor="#E6E6E6"><div align="right" class="Estilo54">Seleccione un Paciente: </div></td>
      <td width="57%" bgcolor="#E6E6E6" ><span class="Estilo32"><span class="Estilo4 Estilo6 Estilo16"><span class="Estilo21"><span class="Estilo22"><span class="Estilo26"><span class="Estilo53"><span class="Estilo16"><span class="Estilo3"><span class="Estilo4 Estilo16 Estilo6"><span class="Estilo5 Estilo54">
        <?php include ("../../conexiones/config_pro.php");
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
?>
      </span></span></span></span></span></span></span></span></span></span></td>
    </tr>
    <tr>
      <td bgcolor="#E6E6E6"><div align="right" class="Estilo54">o Ingrese N&deg; Documento: </div></td>
      <td bgcolor="#E6E6E6"><span class="Estilo4 Estilo6 Estilo16"><span class="Estilo21"><span class="Estilo22"><span class="Estilo26"><span class="Estilo53"><span class="Estilo16"><span class="Estilo3"><span class="Estilo4 Estilo16 Estilo6"><span class="Estilo5 Estilo54">
        <input name="documento" type="text" id="documento2" size = "10" onKeyPress="return verif_caracter(this,event)">
        <span class="Estilo53">
        <input name="Alta" type="submit" value= "Ver todas Prestaciones" id = "Alta">
      </span> </span></span></span></span></span></span></span></span></span></td>
    </tr>
    <tr>
      <td colspan="2" bgcolor="#CCCCCC"><div align="center"><span class="Estilo32"><span class="Estilo4 Estilo6 Estilo16"><span class="Estilo21"><span class="Estilo22"><span class="Estilo26"><span class="Estilo53"><span class="Estilo16"><span class="Estilo3"><span class="Estilo4 Estilo16 Estilo6"><span class="Estilo5">
          <input name="Alta" type="submit" value= "Siguiente" id = "Alta">
      </span></span></span></span></span></span></span></span></span></span></div></td>
    </tr>
  </table>
</form>
</table>
</body>


</html>
