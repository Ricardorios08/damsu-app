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
.Estilo14 {font-family: Arial, Helvetica, sans-serif}
.Estilo15 {font-size: 12px}
.Estilo16 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
.Estilo17 {color: #000000}
-->
</style>


<?php 

include ("../../../mobile/nav_header.php");
$dia = date("d");
$mes= date("m");
$anio = date("y");

?>

<BODY>

 


<FORM ACTION="separar_busqueda_mobile.php" method="post"  >
<table width="100%" border="0">
  <tr bgcolor="#B8B8B8">
    <td colspan="2" align="center" scope="row"><div align="center"><span class="Estilo13">ENVIOS POP </span></div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="44%" align="center" scope="row"><div align="right" class="Estilo14 Estilo15">Fecha </div></td>
    <td width="56%" align="center" scope="row">
      <div align="center" class="Estilo16">
        <div align="left">
        <input name = "dia" type = "text" id="dia_d" value = "<?php echo $dia;?>" maxlength = "2" size = "2">
      /
      <input name = "mes" type = "text" id="mes_d" value = "<?php echo $mes;?>" maxlength = "2" size = "2">
      / 20
      <input name = "anio" type = "text" id="anio_d" value = "<?php echo $anio;?>" size = "2" maxlength = "2">
        </div>
      </div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td align="center" scope="row"><div align="right"><span class="Estilo15 Estilo16">Modo</span></div></td>
    <td align="center" scope="row"><div align="left" class="Estilo16">
   
<input name="detalle" type="radio" value="3"   checked >
    LECTOR<span class="Estilo17">
  </span></div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td align="center" scope="row">&nbsp;</td>
    <td align="center" scope="row"><div align="left"><span class="Estilo16"><span class="Estilo17">
        <input name="detalle" type="radio" value="1"   >
  ENCABEZADOS </span></span></div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td align="center" scope="row">&nbsp;</td>
    <td align="center" scope="row"><div align="left"><span class="Estilo16">
      <input name="detalle" type="radio" value="2"   >
      <span class="Estilo17"> DETALLE X MERCADERIA</span></span></div></td>
  </tr>
  <tr bgcolor="#B8B8B8">
    <td colspan="2" align="center" scope="row">
      <div align="center">
        <input type="submit" name="Submit" value="CONSULTAR">
      </div></td>
    </tr>
</table>

</form>
