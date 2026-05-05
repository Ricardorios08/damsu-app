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
<FORM ACTION="buscar_paciente_excel_todos_anio.php" method="post" TARGET = "central1">
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
</table>

<table width="800" border="1" cellpadding="0" cellspacing="0" bgcolor="#EDEDED">
  <tr>
    <td colspan="2" bgcolor="#B8B8B8"><div align="center"><span class="Estilo14">FECHAS RECETAS INGRESADAS </span></div></td>
  </tr>
   <tr>
   <td width="368"><div align="center">Fecha</div></td>
   <td width="426"><div align="center">Cantidad de Recetas </div></td>
 </tr>

<?PHP 


include ("../../conexiones/config_pro.php");
include ("../../funciones/funciones.php");

$fecha_d = $anio_d."-".$mes_d."-01";
$fecha_h = $anio_d."-".$mes_d."-31";

$sql="select * from receta where fecha between '$fecha_d' and '$fecha_h' group by fecha";
$result = $db->Execute($sql);

  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

$nro_receta=$result->fields["nro_receta"];
$tipo_doc=$result->fields["nro_receta"];
$nro_paciente=$result->fields["nro_paciente"];
$nombre_paciente=$result->fields["nombre_paciente"];

$estado=$result->fields["estado"];
$fecha1=$result->fields["fecha"];
$fecha=fecha_argentina(strtoupper($result->fields["fecha"]));

$sql2="select count(nro_receta) as cant from receta where fecha = '$fecha1'";
$result2 = $db->Execute($sql2);
$cant=$result2->fields["cant"];
?>

 <tr>
    <td><div align="center"><a href="receta_paciente.php?fecha=<?php print("$fecha");?>"><?PHP ECHO $fecha;?></a></div></td>
    <td><div align="center"><?PHP ECHO $cant;?></div></td>
 </tr>
<?php 


	$result->MoveNext();
	}


	  ?>
</table>
</form>
