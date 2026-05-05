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
$dia = date("d");
$mes= date("m");
$anio = date("y");


$fecha2 = $_REQUEST['fecha2'];
$dia1 = substr($fecha2,8,2);
$mes1 = substr($fecha2,5,2);
$anio1 = substr($fecha2,2,2);

if ($fecha2 != ''){

$dia = $dia1;
$mes= $mes1;
$anio = $anio1;


}
?>

<BODY>
<FORM ACTION="separar_busqueda.php" method="post" TARGET = "central1">
<table width="75%" border="0">
  <tr bgcolor="#B8B8B8">
    <td height="28" colspan="2" align="center" scope="row"><div align="center"><span class="Estilo13">ENVIOS A COIR </span></div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="39%" align="center" scope="row"><div align="right" class="Estilo14 Estilo15">Fecha </div></td>
    <td width="61%" align="center" scope="row">
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
    <td align="center" scope="row"><div align="left"><span class="Estilo16"><span class="Estilo17">
        <input name="detalle" type="radio" value="1">
  DETALLE X MERCADERIA</span></span></div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td align="center" scope="row">&nbsp;</td>
    <td align="center" scope="row"><div align="left"><span class="Estilo16"><span class="Estilo17">
        <input name="detalle" type="radio" value="2" >
  ENCABEZADOS </span></span></div></td>
  </tr>
  <tr bgcolor="#B8B8B8">
    <td colspan="2" align="center" scope="row">
      <div align="center">
        <input type="submit" name="Submit" value="CONSULTAR">
      </div></td>
    </tr>
</table>

<table width="75%" height="21%" border="1" cellpadding="0" cellspacing="0">
  <tr bgcolor="#B8B8B8">
    <td height="50%" colspan="12" bgcolor="#F0F0F0"><div align="center"><span class="Estilo14"><span class="Estilo13">SELECCIONE <?php
	
	$anio2 = date("Y");
	$fecha_ene = $anio2."-01-01";$fecha_feb = $anio2."-02-01";
	$fecha_mar = $anio2."-03-01";$fecha_abr = $anio2."-04-01";
	$fecha_may = $anio2."-05-01";$fecha_jun = $anio2."-06-01";
	$fecha_jul = $anio2."-07-01";$fecha_ago = $anio2."-08-01";
	$fecha_set = $anio2."-09-01";$fecha_oct = $anio2."-10-01";
	$fecha_nov = $anio2."-11-01";$fecha_dic = $anio2."-12-01";
	?>
	</span></span></div></td>
  </tr>
  <tr bgcolor="#B8B8B8">
    <td height="50%" bgcolor="#AEE4FF"><div align="center" class="Estilo16"><strong><a href="consultas.php?fecha2=<?php print("$fecha_ene");?>">ENE</a></strong></div></td>
    <td bgcolor="#B8B8B8"><div align="center" class="Estilo16"><strong><a href="consultas.php?fecha2=<?php print("$fecha_feb");?>">FEB</a></strong></div></td>
    <td bgcolor="#AEE4FF"><div align="center" class="Estilo16"><strong><a href="consultas.php?fecha2=<?php print("$fecha_mar");?>">MAR</a></strong></div></td>
    <td bgcolor="#B8B8B8"><div align="center" class="Estilo16"><strong><a href="consultas.php?fecha2=<?php print("$fecha_abr");?>">ABR</a></strong></div></td>
    <td bgcolor="#AEE4FF"><div align="center" class="Estilo16"><strong><a href="consultas.php?fecha2=<?php print("$fecha_may");?>">MAY</a></strong></div></td>
    <td bgcolor="#B8B8B8"><div align="center" class="Estilo16"><strong><a href="consultas.php?fecha2=<?php print("$fecha_jun");?>">JUN</a></strong></div></td>
    <td bgcolor="#AEE4FF"><div align="center" class="Estilo16"><strong><a href="consultas.php?fecha2=<?php print("$fecha_jul");?>">JUL</a></strong></div></td>
    <td height="50%" bgcolor="#B8B8B8"><div align="center" class="Estilo16"><strong><a href="consultas.php?fecha2=<?php print("$fecha_ago");?>">AGO</a></strong></div></td>
    <td height="50%" bgcolor="#AEE4FF"><div align="center" class="Estilo16"><strong><a href="consultas.php?fecha2=<?php print("$fecha_set");?>">SET</a></strong></div></td>
    <td height="50%" bgcolor="#B8B8B8"><div align="center" class="Estilo16"><strong><a href="consultas.php?fecha2=<?php print("$fecha_oct");?>">OCT</a></strong></div></td>
    <td height="50%" bgcolor="#AEE4FF"><div align="center" class="Estilo16"><strong><a href="consultas.php?fecha2=<?php print("$fecha_nov");?>">NOV</a></strong></div></td>
    <td height="50%" bgcolor="#B8B8B8"><div align="center" class="Estilo16"><strong><a href="consultas.php?fecha2=<?php print("$fecha_dic");?>">DIC</a></strong></div></td>
  </tr>
  </table>


<table width="75%" height="21%" border="1" cellpadding="0" cellspacing="0">
  <tr bgcolor="#B8B8B8">
    <td height="50%" colspan="6" bgcolor="#F0F0F0"><div align="center" class="Estilo14"><span class="Estilo13">DIAS QUE OBRA SOCIAL HA ENVIADO MEDICACION </span></div></td>
  </tr>
 <tr>
<?PHP 


include ("../../../conexiones/config_pro.php");
include ("../../../funciones/funciones.php");

$fecha_d = $anio."-".$mes."-01";
$fecha_h = $anio."-".$mes."-31";

$sql="select * from tr_ventas_encabezado where fecha between '$fecha_d' and '$fecha_h' and enviar = 'COIR' group by fecha";
$result = $db->Execute($sql);

  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

 $fecha2=$result->fields["fecha"];
$fecha=fecha_argentina(strtoupper($result->fields["fecha"]));

$cont = $cont + 1;



?>

    <td height="50%" bgcolor="#BBCBF7"><div align="center"><a href="consultas.php?fecha2=<?php print("$fecha2");?>"><?php echo $fecha;?></a></div></td>

	<?php if ($cont == 6){
	$cont = 0;
	?>
 </tr>
<?php 
	}



	$result->MoveNext();
	}


	  ?>


 
</table>



</form>
