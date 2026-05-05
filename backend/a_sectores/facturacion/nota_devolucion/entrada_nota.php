<script>
function on_load()
{
document.getElementById("nro_proveedor").focus();
}

function enter()
{
document.getElementById("nro_proveedor").focus();
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
				document.getElementById("nro_proveedor").focus();
				break;
				case "nro_proveedor":
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
				document.getElementById("porcentaje_boni1").focus();
				break;

				case "porcentaje_boni1":
				document.getElementById("porcentaje_boni").focus();
				break;

				case "porcentaje_boni":
				document.getElementById("porcentaje_dto").focus();
				break;

				case "cod_mercaderia":
				document.getElementById("porcentaje_dto").focus();
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


<?php 

$id = $_REQUEST['id'];
$usuario = $_REQUEST['id'];


include("../../../conexiones/config_pro.php");
include ("../../../conexiones/usuario_compra.php");


$sql = "DELETE FROM tr_compras1_encab_temp where operador = $id";
//$result = $db->Execute($sql);

$sql = "DELETE FROM tr_compras1_deta_temp where operador = $id";
//$result = $db->Execute($sql);

$dia = date("d");
$mes= date("m");
$anio = date("y");

?>
<body onload = "on_load ()">
<FORM ACTION="entrada_nota_2.php" METHOD = "POST" enctype="multipart/form-data" name="form">
<table width="800" border="0" cellspacing="0">
  <tr bgcolor="#000099">
    <td colspan="2" bgcolor="#CCCCCC"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif">NOTAS DE AJUSTES </font></div></td>
  </tr>
  <tr>
    <td width="32%" bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Operador</font></div></td>
    <td width="68%" bgcolor="#E6E6E6"><font face="Trebuchet MS">
      <input type = "hidden" name = "id" value = "<?php echo $id;?>" onKeyPress="return verif_caracter(this,event)"> 
      <?php echo $nombre_usuario;?>      </font></td>
    </tr>
  
  <tr>
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Fecha de Nota: </font></div></td>
    <td bgcolor="#E6E6E6"><font color="#000000" size="2" face="Trebuchet MS">
      <input type = "text" name = "dia" id="dia" size = "2" onKeyPress="return verif_caracter(this,event)" value = "<?php echo $dia;?>" maxlength="2">
/
<input type = "text" name = "mes" id="mes" size = "2" onKeyPress="return verif_caracter(this,event)" value = "<?php echo $mes;?>" maxlength="2">
/ 20
<input type = "text" name = "anio" id="anio" size = "4" onKeyPress="return verif_caracter(this,event)" value = "<?php echo $anio;?>" maxlength="2">
    </font></td>
    </tr>
  <tr>
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Tipo:</font></div></td>
    <td bgcolor="#E6E6E6"><font face="Trebuchet MS">
      <select name="cod_movimiento" id="cod_movimiento">
        <option value="1">POSITIVA (N/C)</option>
        <option value="2">NEGATIVA (N/D)</option>
        </select>
    </font></td>
    </tr>
  <tr>
    <td bgcolor="#E6E6E6"><div align="right">
    
        <font color="#000000" size="2" face="Trebuchet MS">Afectada</font> 
      
    </div></td>
    <td bgcolor="#E6E6E6"><font face="Trebuchet MS">
      <input type = "text" name = "nro_factura_afectada" id="nro_factura_afectada" size = "10" onKeyPress="return verif_caracter(this,event)">
      <font color="#000000" size="2">
<input type = "hidden" name = "band" value = "NO">

<input type = "hidden" name = "band_pri" value = "SI">
      </font><font face="Trebuchet MS"><font color="#000000" size="2">
      <input name="Alta" type="submit" value="OK" id ="Alta" size = "10" onClick = "enter()" >
      </font></font></font></td>
    </tr>
  
  <tr>
    <td bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS">Observaciones</font></div></td>
    <td bgcolor="#E6E6E6"><font face="Trebuchet MS">
      <input type = "text" name = "observaciones" id="observaciones" size = "80" onKeyPress="return verif_caracter(this,event)">
    </font></td>
  </tr>
</table>
</form>
</body>

</html>
