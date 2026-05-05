<style type="text/css">
<!--
.Estilo77 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo82 {
	font-size: 24px;
	font-family: "Trebuchet MS";
	color: #0000FF;
}
.Estilo87 {font-family: "Trebuchet MS"; color: #FF0000; font-size: 12px; }
-->
</style>


<?PHP 

 function CalculaEdad( $fecha ) {
    list($Y,$m,$d) = explode("-",$fecha);
    return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
}





include ("../../conexiones/config_pro.php");


$sql2 = "select * from pacinet where cod_laboratorio = '$laboratorios'";
$result2 = $db->Execute($sql2);

 $denominacion=strtoupper($result2->fields["laboratorio"]);


?> 
<table width="800" border="1" cellpadding="0" cellspacing="0" bgcolor="#EDEDED">
  <tr>
    <td colspan="5" bgcolor="#FFFFFF"><div align="center"><span class="Estilo14">CONSUMO RESONANCIA </span></div></td>
  </tr>
  
  
  <?php

$anio1 = "2013";
$desde =  $anio1."-01-01";
$hasta =  $anio1."-12-31";
$edad_1 = 18;
$edad_menos = 3;
include ("anios.php");

$anio1 = "2014";
$desde =  $anio1."-01-01";
$hasta =  $anio1."-12-31";
$edad_1 = 17;
$edad_menos = 2;
include ("anios.php");

$anio1 = "2015";
$desde =  $anio1."-01-01";
$hasta =  $anio1."-12-31";
$edad_1 = 16;
$edad_menos = 1;
include ("anios.php");

$anio1 = "2016";
$desde =  $anio1."-01-01";
$hasta =  $anio1."-12-31";
$edad_1 = 15;
$edad_menos = 0;
include ("anios.php");



?>

<tr>
	  <td bgcolor="#FFFFFF"><div align="center"><span class="Estilo77">&nbsp; </span></div></td>
<td bgcolor="#FFFFFF"><div align="center"><span class="Estilo77"> </span></div></td>
<td bgcolor="#FFFFFF"><div align="center"><span class="Estilo77"> </span></div></td>
<td bgcolor="#FFFFFF"><div align="center"><span class="Estilo77"> </span></div></td>
<td bgcolor="#FFFFFF"><div align="center"><span class="Estilo77"> </span></div></td>
</tr>
	  <tr>
	  <td bgcolor="#FFFFFF"><div align="center"><span class="Estilo77"> TOTAL </span></div></td>
<td bgcolor="#FFFFFF"><div align="center"><span class="Estilo77">Cantidad de Pacientes </span></div></td>
    <td bgcolor="#FFFFFF"><div align="center"><span class="Estilo77"><?PHP ECHO $cant;?></span></div></td>
      <td bgcolor="#FFFFFF"><div align="center"><span class="Estilo77">Cantidad estudios</span></div></td>
    <td bgcolor="#FFFFFF"><div align="center"><span class="Estilo77"><?PHP ECHO $cantidad_estudios;?></span></div></td>
  </tr>
</table>
</form>
