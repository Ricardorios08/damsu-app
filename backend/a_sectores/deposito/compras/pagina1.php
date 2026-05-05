pagin 1 

<script>
function on_load()
{
document.getElementById("operador").focus();
}

function enter()
{
document.getElementById("cod_mercaderia").focus();
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
				document.getElementById("lector").focus();
				break;

				case "lector":
				document.getElementById("manual").focus();
				break;

				case "manual":
				document.getElementById("dia").focus();
				break;



				case "dia":
				document.getElementById("mes").focus();
				break;
				case "mes":
				document.getElementById("anio").focus();
				break;
				case "anio":
				document.getElementById("nro_factura").focus();
				break;
				
				case "nro_factura":
				document.getElementById("nro_proveedor").focus();
				break;
				
				case "nro_proveedor":
				document.getElementById("OK").focus();
				break;

								
				
		}
		return false;
	}
	return true;
}


function abrirVentan() {
	var cod_detalle = <?php echo $cod_detalle;?> 
    open("buscador_rapido.php","miVentana", "width=300,height=600,toolbar=no,directories=no,menubar=no,status=no, scrollbars=01, top = 35");
}


</script>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<?php  $dia = date("d");$mes = date("m");$anio = date("Y");

?>
<body onload = "on_load ()">
<FORM name="form" ACTION="pagina2.php" METHOD = "POST">
<table width="63%" border="0">
  <tr bgcolor="#E0EDF3">
    <td height="27" colspan="7"><div align="center"><font color="#333333" face="Arial, Helvetica, sans-serif">INGRESO MEDICAMENTOS </font></div></td>
  </tr>
  <tr bgcolor="#0080C0">
    <td width="12%"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">Operador</font></div></td>
    <td width="29%"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">Carga de Productos </font></div></td>
    <td width="24%"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">Fecha Ingreso: </font>
    </div></td>
    <td colspan="2"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">N&ordm; Comprobante </font>
    </div></td>
    <td width="11%"><div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"> Proveedor: </font> </div></td>
    <td width="6%" rowspan="2"><div align="center"><font color="#FFFFFF"></font></div>      <div align="center">
          <input name="Alta" type="submit" value="OK" id ="Alta" size = "10" onclick = "enter()" >
      </div></td>
    </tr>
  <tr>
    <td bgcolor="#D0F9FB"><div align="center"><font color="#000000" size="2">
    <input type = "text" name = "operador" id="operador" size = "3" onKeyPress="return verif_caracter(this,event)">
</font></div></td>
    <td bgcolor="#D0F9FB"><p>
      <label>
      <input name="modo_carga" type="radio" id = "lector" value="lector" onKeyPress="return verif_caracter(this,event)" checked>
  Lector</label>
      <label>
      <input type="radio" name="modo_carga" id = "manual" value="manual" onKeyPress="return verif_caracter(this,event)" >
  Manual</label>
      <br>
    </p></td>
    <?php $hoy = date("dmy");
	include("../../../conexiones/config_pro.php");
	$sql = "SELECT * FROM `encabezado_compra` GROUP BY `nro_comprobante` ASC  ORDER BY `nro_comprobante` DESC";
	$result = $db->Execute($sql);
	$nro_factura=strtoupper($result->fields["nro_comprobante"]) + 1;

	?>
    <td bgcolor="#D0F9FB"><div align="center"><font color="#000000" size="2">
        <input name = "dia" type = "text" id="dia" onKeyPress="return verif_caracter(this,event)" value="<?php echo $dia;?>" size = "2">
/ 
<input name = "mes" type = "text" id="mes" onKeyPress="return verif_caracter(this,event)" value="<?php echo $mes;?>" size = "2">
/
<input name = "anio" type = "text" id="anio" onKeyPress="return verif_caracter(this,event)" value="<?php echo $anio;?>" size = "4">
</font></div></td>
    <td colspan="2" bgcolor="#D0F9FB"><div align="center">
      <input type = "text" name = "nro_factura" id="nro_factura" size = "10" value = "<?php echo $nro_factura;?>" onKeyPress="return verif_caracter(this,event)">
    </div></td>
    <td bgcolor="#D0F9FB"><div align="center"><font color="#000000" size="2">
      <input type = "text" name = "nro_proveedor" id="nro_proveedor" size = "8" onKeyPress="return verif_caracter(this,event)">
        </font></div></td>
    </tr>
<tr bgcolor="#FFFFFF">
    <td colspan="7"><?php include ("buscar_proveedor.php");?></td>
  </tr>
</table>
</form>
</body>
</html>
