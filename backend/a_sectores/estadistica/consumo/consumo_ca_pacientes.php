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


$excel = $_REQUEST['excel'];
 $anio = $_REQUEST['anio'];



?>


 <table width="64%" border="1" cellspacing="0">
  <tr bgcolor="#FFFFFF">
    <td height="47" colspan="7"><div align="center" class="Estilo2 Estilo8">PACIENTES INGRESADOS AL PROGRAMA ONCOLOGICO</div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="47"><div align="center"><span class="Estilo2 Estilo8">A&Ntilde;O: </span></div></td>
    <td height="47"><div align="center"><span class="Estilo2 Estilo8"><?PHP echo $anio;?></span></div></td>
    <td height="47"><div align="center"><span class="Estilo2 Estilo8"> DIAGNOSTICO </span></div></td>
    <td height="47"><div align="center"><span class="Estilo2 Estilo8">TU.MAMA (C50). </span></div></td>
    <td height="47">&nbsp;</td>
  <td height="47">&nbsp;</td>
   <td height="47">&nbsp;</td>
  </tr>

  <tr>
    <td width="7%" bgcolor="#CCCCCC"><div align="center" class="Estilo2">
      <div align="center">DOCUMENTO<span class="Estilo2"></span></div>
    </div>
      </td>
    <td width="9%" bgcolor="#CCCCCC"><div align="center" class="Estilo2">
      <div align="center">APELLIDO</div>
    </div></td>
    <td width="40%" bgcolor="#CCCCCC"><div align="center"><span class="Estilo2">NOMBRE</span></div></td>
    <td width="8%" bgcolor="#CCCCCC"><div align="center"><span class="Estilo2">FECHA INGRESO</span></div></td>
    <td width="9%" bgcolor="#CCCCCC"><div align="center" class="Estilo2">
      <div align="center">FECHA DIAGNOSTICO</div>
    </div></td>
   <td width="40%" bgcolor="#CCCCCC"><div align="center" class="Estilo2">
      <div align="center">OBRA SOCIAL</div>
    </div></td>
	   <td width="40%" bgcolor="#CCCCCC"><div align="center" class="Estilo2">
      <div align="center">FUENTE</div>
    </div></td>

  </tr>



<?php 



$cod_agrupado1=$_POST["cod_agrupado"];
	for ($i=0;$i<count($cod_agrupado1);$i++)    
	{     
	$cod_agrupado = $cod_agrupado1[$i];  
	
		}



include ("../../../conexiones/config_pro.php");
 
if ($excel == 1){
 $file = "PACIENTES_".$anio.".XLS";

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$file");
}



$mes = "01";$mes1 = "12";
$desde = $anio."-".$mes."-01";
$hasta = $anio."-".$mes1."-31";
$cod_diagnostico = "C50";
$sql="SELECT pacientes.documento , pacientes.apellido , pacientes.nombre, pacientes.fecha_ingreso ,   paciente_diagnostico.cod_fuente,  paciente_diagnostico.fecha_diagnostico 
FROM pacientes
INNER JOIN paciente_diagnostico ON paciente_diagnostico.documento = pacientes.documento where pacientes.fecha_ingreso between '$desde' and '$hasta' and paciente_diagnostico.cod_diagnostico = '$cod_agrupado'";
$result = $db->Execute($sql);

   if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

$documento=$result->fields["documento"];
$fecha_ingreso=$result->fields["fecha_ingreso"]; 
$apellido=$result->fields["apellido"]; 
$nombre=$result->fields["nombre"]; 
$fecha_diagnostico=$result->fields["fecha_diagnostico"]; 
$cod_fuente=$result->fields["cod_fuente"]; 



$dia1 = substr($fecha_ingreso,8,2);
$mes1 = substr($fecha_ingreso,5,2);
$anio1 = substr($fecha_ingreso,0,4);
$fecha_ingreso = $dia1."-".$mes1."-".$anio1;

$dia11 = substr($fecha_diagnostico,8,2);
$mes11 = substr($fecha_diagnostico,5,2);
$anio11 = substr($fecha_diagnostico,0,4);
$fecha_diagnostico = $dia11."-".$mes11."-".$anio11;


$sql1 = "SELECT * FROM `afiliaciones` WHERE `documento` = '$documento'";
$result1 = $db->Execute($sql1);

$nro_os=$result1->fields["nro_os"]; 


$sql1 = "SELECT * FROM fuentes WHERE nro_fuente = '$cod_fuente'";
$result1 = $db->Execute($sql1);

$nombre_fuente=$result1->fields["nombre_fuente"]; 



if ($nro_os != 2){

$sql1 = " SELECT * FROM `obrasocial` WHERE `nro_os` LIKE '$nro_os'";
$result1 = $db->Execute($sql1);

$nombre_os=$result1->fields["nombre_os"]; 


?>




  <tr>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $documento;?></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $apellido;?></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $nombre;?></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $fecha_ingreso;?></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $fecha_diagnostico;?></span></div></td>
    <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $nombre_os;?></span></div></td>
  <td><div align="center" class="Estilo5"><span class="Estilo7"><?PHP echo $nombre_fuente;?></span></div></td>
  
  <?php }


$result->MoveNext();
	}

	?>


  </tr>
</table>