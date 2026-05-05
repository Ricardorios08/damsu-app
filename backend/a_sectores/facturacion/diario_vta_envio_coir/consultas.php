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
	color: #000000;
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.Estilo15 {font-family: Arial, Helvetica, sans-serif}
.Estilo16 {font-size: 12px}
.Estilo17 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
-->
</style>

<?php 
$dia = date("d");
$mes= date("m");
$anio = date("y");

?>

<BODY>
<FORM ACTION="separar_busqueda.php" method="post" TARGET = "central1">
<table width="800" border="0">
  <tr bgcolor="#B8B8B8">
    <td colspan="2" align="center" scope="row"><div align="center"><span class="Estilo13">ENVIOS A COIR </span></div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="37%" align="center" scope="row"><div align="right" class="Estilo15 Estilo16">Fecha </div></td>
    <td width="63%" align="center" scope="row"><div align="left" class="Estilo17">
      <input name = "dia" type = "text" id="dia_d" value = "<?php echo $dia;?>" maxlength = "2" size = "2">
  /
  <input name = "mes" type = "text" id="mes_d" value = "<?php echo $mes;?>" maxlength = "2" size = "2">
  / 20
  <input name = "anio" type = "text" id="anio_d" value = "<?php echo $anio;?>" size = "2" maxlength = "2">
    </div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td align="center" scope="row"><div align="right"><span class="Estilo15 Estilo16">Fuente:</span></div></td>
    <td align="center" scope="row"><div align="left">
      <input name="fuente" type="radio" value="20" checked>
      <span class="Estilo17">    H. CENTRAL 
      <input name="fuente" type="radio" value="24"> 
      H. PERRUPATO
      <input name="fuente" type="radio" value="23">
H. LAGOMAGGIORE
<input name="fuente" type="radio" value="28">
H. PAROISSIEN</span></div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td align="center" scope="row"><div align="right"><span class="Estilo15 Estilo16">Modo</span></div></td>
    <td align="center" scope="row"><div align="left">
      <input name="detalle" type="radio" value="1" checked>
      <span class="Estilo17"> DETALLE X MERCADERIA
      <input name="detalle" type="radio" value="2"> 
      ENCABEZADOS</span></div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td align="center" scope="row">&nbsp;</td>
    <td align="center" scope="row"><div align="left">
      <input name="anmat" type="checkbox" id="anmat" value="1">
      <span class="Estilo17">MOSTRAR LISTOS PARA ANMAT </span></div></td>
  </tr>
  <tr bgcolor="#B8B8B8">
    <td colspan="2" align="center" scope="row">
      <div align="center">
        <input type="submit" name="Submit" value="CONSULTAR">
      </div></td>
    </tr>
</table>

</form>
