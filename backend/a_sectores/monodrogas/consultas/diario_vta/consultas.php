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
.Estilo4 {font-size: xx-small}
.Estilo6 {color: #FFFFFF}
.Estilo13 {
	color: #FFFFFF;
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
-->
</style>

<?php 
$dia = date("d");
$mes= date("m");
$anio = date("y");

?>

<BODY background="../../../IMAGENES/IZQUIERDA.PNG" class="Estilo4" onload ="ocultamenu()">
<FORM ACTION="separar_busqueda.php" method="post" TARGET = "central1">
<table width="60%" border="0">
  <tr>
    <td colspan="2" align="center" bgcolor="#000099" scope="row"><div align="center"><span class="Estilo13">DIARIO DE VENTAS </span></div></td>
  </tr>
  <tr bgcolor="#E1F2EF">
    <td width="40%" align="center" scope="row"><div align="right">Fecha </div></td>
    <td width="60%" align="center" scope="row"><div align="left">
      <input name = "dia" type = "text" id="dia_d" value = "<?php echo $dia;?>" maxlength = "2" size = "2">
  /
  <input name = "mes" type = "text" id="mes_d" value = "<?php echo $mes;?>" maxlength = "2" size = "2">
  / 20
  <input name = "anio" type = "text" id="anio_d" value = "<?php echo $anio;?>" size = "2" maxlength = "2">
    <input type="submit" name="Submit" value="CONSULTAR">
    </div></td>
  </tr>
  <tr bgcolor="#000099">
    <td colspan="2" align="center" scope="row">
        <div align="center"></div></td>
    </tr>
</table>

<div align="center"></div>
</form>
