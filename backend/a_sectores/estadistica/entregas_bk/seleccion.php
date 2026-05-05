<script type="text/javascript">
function ocultamenu(){
  var menu = document.getElementById("Atributos");
  menu.style.display = "none";
}
function despliega(){
  var menu = document.getElementById("Atributos");
    if(menu.style.display == "none"){
      menu.style.display = "block";
    }
    else{
      menu.style.display = "none";
    }
}
</script>
<script LANGUAGE="JavaScript">
function multicarga(documento1,documento2)
{
parent.izquierda.location.href=documento1;
parent.central.location.href=documento2;
}
</script>
<style type="text/css">
<!--
.Estilo13 {
	color: #FFFFFF;
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.Estilo14 {
	font-size: 12px;
	font-family: "Trebuchet MS";
}
-->
</style>

<?php 
$dia = date("d");
$mes= date("m");
$anio = date("y");

$dia_d = $_REQUEST['dia'];
$mes_d = $_REQUEST['mes'];
$anio_d = $_REQUEST['anio'];


?>

<BODY>
<FORM ACTION="imprimir_pdf_todos.php" method="post" TARGET = "central1">
<table width="800" border="0">
  <tr>
    <td colspan="2" align="center" bgcolor="#000099" scope="row"><div align="center"><span class="Estilo13">CONSULTA ENTREGAS MENSUALES (Sabana)</span></div></td>
  </tr>
  <tr bgcolor="#E1F2EF">
    <td width="40%" align="center" scope="row"><div align="right">Periodo</div></td>
    <td width="60%" align="center" scope="row"><div align="left">
      <input name = "mes" type = "text" id="mes_d" value = "<?php echo $mes;?>" maxlength = "2" size = "2">
      / 20
  <input name = "anio" type = "text" id="anio_d" value = "<?php echo $anio;?>" size = "2" maxlength = "2">
    <input type="submit" name="Submit" value="CONSULTAR">
    </div></td>
  </tr>
  <tr bgcolor="#E1F2EF">
    <td colspan="2" align="center" scope="row">&nbsp;</td>
  </tr>
  <tr bgcolor="#E1F2EF">
    <td colspan="2" align="center" scope="row">ESTE PROCESO PUEDE DEMORAR UNOS MINUTOS </td>
  </tr>
  <tr bgcolor="#E1F2EF">
    <td colspan="2" align="center" scope="row"><object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="200" height="200" id="precarga" align="middle">
      <param name="allowScriptAccess" value="sameDomain" />
      <param name="movie" value="precarga.swf" />
      <param name="quality" value="high" />
      <param name="bgcolor" value="#ffffff" />
      <embed src="precarga.swf" quality="high" bgcolor="#ffffff" width="200" height="200" name="precarga" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />    
</object></td>
  </tr>
</table>

