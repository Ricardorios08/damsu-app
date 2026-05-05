<style type="text/css">
<!--
.Estilo2 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo5 {font-size: 14px}
.Estilo6 {font-weight: bold; font-family: "Trebuchet MS";}
.Estilo7 {font-family: "Trebuchet MS"}
.Estilo8 {font-size: 16}
-->
</style>

<?php 
include ("../../../conexiones/config_pro.php");



$anio = "2010";
$mes = "01";$mes1 = "12";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes1."-31";
$cod_diagnostico = "C50";
$sql="SELECT count(pacientes.documento) as pac , paciente_diagnostico.documento, paciente_diagnostico.cod_diagnostico 
FROM pacientes
INNER JOIN paciente_diagnostico ON paciente_diagnostico.documento = pacientes.documento where pacientes.fecha_ingreso between '$desde' and '$hasta' and paciente_diagnostico.cod_diagnostico = '$cod_diagnostico'";
$result = $db->Execute($sql);
$pac=$result->fields["pac"];
$anio_2010 = $pac;

$anio = "2011";
$mes = "01";$mes1 = "12";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes1."-31";
$cod_diagnostico = "C50";
$sql="SELECT count(pacientes.documento) as pac , paciente_diagnostico.documento, paciente_diagnostico.cod_diagnostico 
FROM pacientes
INNER JOIN paciente_diagnostico ON paciente_diagnostico.documento = pacientes.documento where pacientes.fecha_ingreso between '$desde' and '$hasta' and paciente_diagnostico.cod_diagnostico = '$cod_diagnostico'";
$result = $db->Execute($sql);
$pac=$result->fields["pac"];
$anio_2011 = $pac;

$anio = "2012";
$mes = "01";$mes1 = "12";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes1."-31";
$cod_diagnostico = "C50";
$sql="SELECT count(pacientes.documento) as pac , paciente_diagnostico.documento, paciente_diagnostico.cod_diagnostico 
FROM pacientes
INNER JOIN paciente_diagnostico ON paciente_diagnostico.documento = pacientes.documento where pacientes.fecha_ingreso between '$desde' and '$hasta' and paciente_diagnostico.cod_diagnostico = '$cod_diagnostico'";
$result = $db->Execute($sql);
$pac=$result->fields["pac"];
$anio_2012 = $pac;

$anio = "2013";
$mes = "01";$mes1 = "12";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes1."-31";
$cod_diagnostico = "C50";
$sql="SELECT count(pacientes.documento) as pac , paciente_diagnostico.documento, paciente_diagnostico.cod_diagnostico 
FROM pacientes
INNER JOIN paciente_diagnostico ON paciente_diagnostico.documento = pacientes.documento where pacientes.fecha_ingreso between '$desde' and '$hasta' and paciente_diagnostico.cod_diagnostico = '$cod_diagnostico'";
$result = $db->Execute($sql);
$pac=$result->fields["pac"];
$anio_2013 = $pac;

$anio = "2014";
$mes = "01";$mes1 = "12";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes1."-31";
$cod_diagnostico = "C50";
$sql="SELECT count(pacientes.documento) as pac , paciente_diagnostico.documento, paciente_diagnostico.cod_diagnostico 
FROM pacientes
INNER JOIN paciente_diagnostico ON paciente_diagnostico.documento = pacientes.documento where pacientes.fecha_ingreso between '$desde' and '$hasta' and paciente_diagnostico.cod_diagnostico = '$cod_diagnostico'";
$result = $db->Execute($sql);
$pac=$result->fields["pac"];
$anio_2014 = $pac;

$anio = "2015";
$mes = "01";$mes1 = "12";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes1."-31";
$cod_diagnostico = "C50";
$sql="SELECT count(pacientes.documento) as pac , paciente_diagnostico.documento, paciente_diagnostico.cod_diagnostico 
FROM pacientes
INNER JOIN paciente_diagnostico ON paciente_diagnostico.documento = pacientes.documento where pacientes.fecha_ingreso between '$desde' and '$hasta' and paciente_diagnostico.cod_diagnostico = '$cod_diagnostico'";
$result = $db->Execute($sql);
$pac=$result->fields["pac"];
$anio_2015 = $pac;

$anio = "2016";
$mes = "01";$mes1 = "12";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes1."-31";
$cod_diagnostico = "C50";
$sql="SELECT count(pacientes.documento) as pac , paciente_diagnostico.documento, paciente_diagnostico.cod_diagnostico 
FROM pacientes
INNER JOIN paciente_diagnostico ON paciente_diagnostico.documento = pacientes.documento where pacientes.fecha_ingreso between '$desde' and '$hasta' and paciente_diagnostico.cod_diagnostico = '$cod_diagnostico'";
$result = $db->Execute($sql);
$pac=$result->fields["pac"];
$anio_2016 = $pac;

$anio = "2017";
$mes = "01";$mes1 = "12";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes1."-31";
$cod_diagnostico = "C50";
$sql="SELECT count(pacientes.documento) as pac , paciente_diagnostico.documento, paciente_diagnostico.cod_diagnostico 
FROM pacientes
INNER JOIN paciente_diagnostico ON paciente_diagnostico.documento = pacientes.documento where pacientes.fecha_ingreso between '$desde' and '$hasta' and paciente_diagnostico.cod_diagnostico = '$cod_diagnostico'";
$result = $db->Execute($sql);
$pac=$result->fields["pac"];
$anio_2017 = $pac;

$anio = "2018";
$mes = "01";$mes1 = "12";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes1."-31";
$cod_diagnostico = "C50";
$sql="SELECT count(pacientes.documento) as pac , paciente_diagnostico.documento, paciente_diagnostico.cod_diagnostico 
FROM pacientes
INNER JOIN paciente_diagnostico ON paciente_diagnostico.documento = pacientes.documento where pacientes.fecha_ingreso between '$desde' and '$hasta' and paciente_diagnostico.cod_diagnostico = '$cod_diagnostico'";
$result = $db->Execute($sql);
$pac=$result->fields["pac"];
$anio_2018 = $pac;

$anio = "2019";
$mes = "01";$mes1 = "12";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes1."-31";
$cod_diagnostico = "C50";
$sql="SELECT count(pacientes.documento) as pac , paciente_diagnostico.documento, paciente_diagnostico.cod_diagnostico 
FROM pacientes
INNER JOIN paciente_diagnostico ON paciente_diagnostico.documento = pacientes.documento where pacientes.fecha_ingreso between '$desde' and '$hasta' and paciente_diagnostico.cod_diagnostico = '$cod_diagnostico'";
$result = $db->Execute($sql);
$pac=$result->fields["pac"];
$anio_2019 = $pac;

 

?>



 <table width="64%" border="1" cellspacing="0">
  <tr bgcolor="#FFFFCC">
    <td height="47" colspan="11"><div align="center" class="Estilo2 Estilo8">PACIENTES INGRESADOS AL PROGRAMA ONCOLOGICO POR A&Ntilde;O POR DIAGOSTICO  TU.MAMA (C50) </div></td>
  </tr>
  <tr>
    <td width="18%" bgcolor="#FFFFFF"><div align="center" class="Estilo2"></div></td>
    <td width="7%" bgcolor="#CCCCCC"><div align="center" class="Estilo2">
      <div align="center">2010<span class="Estilo2"></span></div>
    </div>
      </td>
    <td width="9%" bgcolor="#CCCCCC"><div align="center" class="Estilo2">
      <div align="center">2011</div>
    </div></td>
    <td width="10%" bgcolor="#CCCCCC"><div align="center"><span class="Estilo2">2012</span></div></td>
    <td width="8%" bgcolor="#CCCCCC"><div align="center"><span class="Estilo2">2013</span></div></td>
    <td width="9%" bgcolor="#CCCCCC"><div align="center" class="Estilo2">
      <div align="center">2014</div>
    </div></td>
    <td width="8%" bgcolor="#CCCCCC"><div align="center"><span class="Estilo2">2015</span></div></td>
    <td width="9%" bgcolor="#CCCCCC"><div align="center"><span class="Estilo2">2016</span></div></td>
    <td width="8%" bgcolor="#CCCCCC"><div align="center"><span class="Estilo2">2017</span></div></td>
    <td width="7%" bgcolor="#CCCCCC"><div align="center"><span class="Estilo2">2018</span></div></td>
    <td width="7%" bgcolor="#CCCCCC"><div align="center"><span class="Estilo2">2019</span></div></td>
  </tr>
  <tr>
    <td><div align="center" class="Estilo5"><span class="Estilo6">INGRESOS</span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $anio_2010;?></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $anio_2011;?></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $anio_2012;?></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $anio_2013;?></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $anio_2014;?></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $anio_2015;?></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $anio_2016;?></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $anio_2017;?></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $anio_2018;?></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $anio_2019;?></span></div></td>
  </tr>
</table>

