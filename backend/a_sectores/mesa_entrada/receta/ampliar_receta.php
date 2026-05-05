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
.Estilo14 {font-family: Geneva, Arial, Helvetica, sans-serif}
.Estilo15 {font-size: 12px}
.Estilo16 {font-family: Geneva, Arial, Helvetica, sans-serif; font-size: 12px; }
-->
</style>

<?php 
$dia = date("d");
$mes= date("m");
$anio = date("y");

$documento = $_REQUEST['documento'];
$nro_paciente = $_REQUEST['nro_paciente'];
?>

<BODY>
<FORM ACTION="mostrar_receta_ampliada.php" method="post" TARGET = "central1">
<table width="800" border="0">
  <tr bgcolor="#B8B8B8">
    <td colspan="2" align="center" scope="row"><div align="center"><span class="Estilo13">HISTORIAL DE RECETAS </span></div></td>
  </tr>
  <tr bgcolor="#E1F2EF">
    <td align="center" scope="row"><div align="right">Paciente</div></td>
    <td align="center" scope="row"><div align="left">
      <input name = "documento" type = "text" id="mes" value = "<?php echo $documento;?>" size = "20">
   <?php echo $nombre_paciente;?> </div></td>
  </tr>
  <tr bgcolor="#E1F2EF">
    <td width="27%" align="center" scope="row"><div align="right" class="Estilo14 Estilo15">Desde</div></td>
    <td width="73%" align="center" scope="row"><div align="left">
      <input name = "dia" type = "text" id="dia_d" value = "01" maxlength = "2" size = "2">
  /
  <input name = "mes" type = "text" id="mes_d" value = "<?php echo $mes;?>" maxlength = "2" size = "2">
  / 20
  <input name = "anio" type = "text" id="anio_d" value = "<?php echo $anio;?>" size = "2" maxlength = "2">
    </div></td>
  </tr>
  <tr bgcolor="#E1F2EF">
    <td align="center" scope="row"><div align="right"><span class="Estilo14 Estilo15">Hasta</span></div></td>
    <td align="center" scope="row"><div align="left">
      <input name = "dia_h" type = "text" id="dia_h" value = "31" maxlength = "2" size = "2">
  /
    <input name = "mes_h" type = "text" id="mes_h" value = "<?php echo $mes;?>" maxlength = "2" size = "2">
  / 20
  <input name = "anio_h" type = "text" id="anio_h" value = "<?php echo $anio;?>" size = "2" maxlength = "2">
    </div></td>
  </tr>
  <tr bgcolor="#B8B8B8">
    <td colspan="2" align="center" scope="row">
      <div align="center">
        <input type="submit" name="Submit" value="CONSULTAR">
      </div></td>
    </tr>
</table>

