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

<BODY>
<FORM ACTION="separar_busqueda.php" method="post" TARGET = "central1">
<table width="800" border="0">
  <tr>
    <td colspan="2" align="center" bgcolor="#000099" scope="row"><div align="center"><span class="Estilo13">PLANILLA MENSUAL </span></div></td>
  </tr>
  <tr bgcolor="#E1F2EF">
    <td width="40%" align="center" scope="row"><div align="right">Fecha </div></td>
    <td width="60%" align="center" scope="row"><div align="left">
      <input name = "mes" type = "text" id="mes_d" value = "<?php echo $mes;?>" maxlength = "2" size = "2">
  / 20
  <input name = "anio" type = "text" id="anio_d" value = "<?php echo $anio;?>" size = "2" maxlength = "2">
    <input type="submit" name="Submit" value="CONSULTAR">
    </div></td>
  </tr>
  <tr bgcolor="#E1F2EF">
    <td align="center" scope="row"><div align="right">Fuente</div></td>
    <td align="center" scope="row"><div align="left"><?php 
include ("../../../conexiones/config_usu.php");
$sql="select * from fuentes ORDER BY nombre_fuente";
$result = $db->Execute($sql);
echo "<select name=fuente[] size=1 id =fuente onKeyPress='return verif_caracter(this,event)'>";
echo"<option value=''>Todas</option>";

if (!$result) die("fallo".$db->ErrorMsg());
while (!$result->EOF) {
$cod=$result->fields["nro_fuente"];
$a1=strtoupper($result->fields["nombre_fuente"]);
echo"<option value=$cod>$a1</option>";
$result->MoveNext();
	}
echo"</select>";
?></div></td>
  </tr>
</table>

</form>
