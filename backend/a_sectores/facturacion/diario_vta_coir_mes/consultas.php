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
.Estilo17 {font-family: Arial, Helvetica, sans-serif}
.Estilo18 {font-size: 12px}
.Estilo19 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
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
    <td colspan="2" align="center" scope="row"><div align="center"><span class="Estilo13">DIARIO DE ENTREGAS </span></div></td>
  </tr>
  <tr bgcolor="#F0F0F0">
    <td align="center" scope="row"><div align="right" class="Estilo17 Estilo18">Desde</div></td>
    <td align="center" scope="row"><div align="left" class="Estilo19">
      <input name = "dia2" type = "text" id="dia" value = "<?php echo $dia;?>" maxlength = "2" size = "2">
  /
    <input name = "mes2" type = "text" id="mes" value = "<?php echo $mes;?>" maxlength = "2" size = "2">
  / 20
  <input name = "anio2" type = "text" id="anio" value = "<?php echo $anio;?>" size = "2" maxlength = "2">
    </div></td>
  </tr>
  <tr bgcolor="#F0F0F0">
    <td width="48%" align="center" scope="row"><div align="right" class="Estilo19">Hasta</div></td>
    <td width="52%" align="center" scope="row"><div align="left" class="Estilo19">
      <input name = "dia" type = "text" id="dia_d" value = "<?php echo $dia;?>" maxlength = "2" size = "2">
  /
  <input name = "mes" type = "text" id="mes_d" value = "<?php echo $mes;?>" maxlength = "2" size = "2">
  / 20
  <input name = "anio" type = "text" id="anio_d" value = "<?php echo $anio;?>" size = "2" maxlength = "2">
    </div></td>
  </tr>
  <tr bgcolor="#F0F0F0">
    <td align="center" scope="row"><div align="right" class="Estilo19">Estados</div></td>
    <td align="center" scope="row"><div align="left"><select name="estados[]" id="estados"onkeypress="return verif_caracter(this,event)">
      <option value="ASIGNADO">ASIGNADO</option>
      <option value="DISPONIBLE">DISPONIBLE</option>
      <option value="CONSUMIDO">CONSUMIDO</option>
    </select></div></td>
  </tr>
  <tr bgcolor="#B8B8B8">
    <td colspan="2" align="center" scope="row">
      <div align="center">
        <input type="submit" name="Submit" value="CONSULTAR">
      </div></td>
    </tr>
</table>

<table width="800" border="1" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center">FECHAS NOTAS ENTREGAS DEL MES </div></td>
  </tr>

<?PHP 


include ("../../../conexiones/config_pro.php");
include ("../../../funciones/funciones.php");

$fecha_d = $anio."-".$mes."-01";
$fecha_h = $anio."-".$mes."-31";

$sql="select * from tr_ventas_encabezado where fecha between '$fecha_d' and '$fecha_h' group by fecha";
$result = $db->Execute($sql);

  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

 $fecha2=$result->fields["fecha"];
$fecha=fecha_argentina(strtoupper($result->fields["fecha"]));


?>
 <tr>
    <td><?php echo $fecha;?></a></td>
  </tr>
<?php 


	$result->MoveNext();
	}


	  ?>


</table>
</form>
