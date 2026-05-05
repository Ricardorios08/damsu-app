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

echo "*---".$dia_d = $_REQUEST['dia_d'];

?>

<BODY>
<FORM ACTION="recetas_x_dia.php" method="post" TARGET = "central1">
<table width="800" border="0">
  <tr>
    <td colspan="2" align="center" bgcolor="#000099" scope="row"><div align="center"><span class="Estilo13">DIARIO DE RECETAS </span></div></td>
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

<table width="800" border="0" cellpadding="0">
  <tr>
    <td><div align="center">FECHAS RECETAS INGRESADAS </div></td>
  </tr>

<?PHP 


include ("../../conexiones/config_pro.php");
include ("../../funciones/funciones.php");

$fecha_d = $anio."-".$mes."-01";
$fecha_h = $anio."-".$mes."-31";

$sql="select * from receta where fecha between '$fecha_d' and '$fecha_h' group by fecha";
$result = $db->Execute($sql);

  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

$nro_receta=$result->fields["nro_receta"];
$tipo_doc=$result->fields["nro_receta"];
$nro_paciente=$result->fields["nro_paciente"];
$nombre_paciente=$result->fields["nombre_paciente"];

$estado=$result->fields["estado"];




?>
 <tr>
    <td><?PHP ECHO $fecha=fecha_argentina(strtoupper($result->fields["fecha"]));?></td>
  </tr>
<?php 


	$result->MoveNext();
	}


	  ?>


 
</table>
</form>
