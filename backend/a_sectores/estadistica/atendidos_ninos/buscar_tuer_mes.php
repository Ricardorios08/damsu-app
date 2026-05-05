<style type="text/css">
<!--
.Estilo1 {font-family: "Trebuchet MS"}
.Estilo7 {font-size: 18px}
-->
</style>

<?php 
 function CalculaEdad( $fecha ) {
    list($Y,$m,$d) = explode("-",$fecha);
    return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
}


include ("../../../conexiones/config_usu.php");
$base = "oncologico";


$mes = "01";
 $desde1 = "2012-".$mes."-01";
 $hasta1 = "2012-".$mes."-31";

$desde = "2013-".$mes."-01";
$hasta = "2013-".$mes."-31";



   $sql1 = "SELECT $base.receta.estado, $base.receta.tipo_doc, $base.receta.nro_paciente, $base.receta.fecha, $base.pacientes.fecha_nac FROM $base.receta INNER JOIN $base.pacientes ON $base.receta.nro_paciente = $base.pacientes.documento WHERE $base.receta.fecha between '$desde1' and '$hasta1' GROUP BY $base.receta.nro_paciente";
$result1 = $db->Execute($sql1);


   if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  
$tipo_doc=$result1->fields["tipo_doc"];
$documento=$result1->fields["nro_paciente"];
$fecha_factura=$result1->fields["fecha"];
$fecha_nac=$result1->fields["fecha_nac"];
$estado=$result1->fields["estado"];


$cont = $cont + 1;

 
$edad = calculaEdad($fecha_nac);

if ($edad < 14){
	$menores = $menores + 1;
}else{
$adultos = $adultos + 1;
}

  $result1->MoveNext();
	}


///////////////////////// 2013 //////////////


  $sql1 = "SELECT $base.receta.tipo_doc, $base.receta.nro_paciente, $base.receta.fecha_factura, $base.pacientes.fecha_nac FROM $base.receta INNER JOIN $base.pacientes ON $base.receta.nro_paciente = $base.pacientes.documento WHERE $base.receta.fecha_factura between '$desde' and '$hasta'  GROUP BY $base.receta.nro_paciente";
$result1 = $db->Execute($sql1);


   if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  
$tipo_doc=$result1->fields["tipo_doc"];
$documento=$result1->fields["nro_paciente"];
$fecha_factura=$result1->fields["fecha_factura"];
$fecha_nac=$result1->fields["fecha_nac"];
$cont = $cont + 1;

 
$edad = calculaEdad($fecha_nac);

if ($edad < 14){
	$menores_2013 = $menores_2013 + 1;
}else{
$adultos_2013 = $adultos_2013 + 1;
}

  $result1->MoveNext();
	}




//////////////////////PRESTACIONES     ////////////////
$prestaciones = "prestaciones_pacientes";


 $sql1 = "SELECT $prestaciones.tipo_doc, $prestaciones.documento, $prestaciones.fecha_prestacion, $base.pacientes.fecha_nac FROM $prestaciones INNER JOIN $base.pacientes ON $prestaciones.documento = $base.pacientes.documento WHERE $prestaciones.fecha_prestacion between '$desde1' and '$hasta1' and $prestaciones.cod_prestacion like 'TECO%' GROUP BY $prestaciones.documento"; 
$result1 = $db->Execute($sql1);

   if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  
$tipo_doc=$result1->fields["tipo_doc"];
$documento=$result1->fields["nro_paciente"];
$fecha_factura=$result1->fields["fecha_factura"];
$fecha_nac=$result1->fields["fecha_nac"];
$cont = $cont + 1;

 

$edad = calculaEdad($fecha_nac);

if ($edad < 14){
	$menores_radio = $menores_radio + 1;
}else{
$adultos_radio = $adultos_radio + 1;
}


  $result1->MoveNext();
	}


$sql1 = "SELECT $prestaciones.tipo_doc, $prestaciones.documento, $prestaciones.fecha_prestacion, $base.pacientes.fecha_nac FROM $prestaciones INNER JOIN $base.pacientes ON $prestaciones.documento = $base.pacientes.documento WHERE $prestaciones.fecha_prestacion between '$desde' and '$hasta' and $prestaciones.cod_prestacion like 'TECO%' GROUP BY $prestaciones.documento"; 
$result1 = $db->Execute($sql1);

   if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  
$tipo_doc=$result1->fields["tipo_doc"];
$documento=$result1->fields["nro_paciente"];
$fecha_factura=$result1->fields["fecha_factura"];
$fecha_nac=$result1->fields["fecha_nac"];
$cont = $cont + 1;

 

$edad = calculaEdad($fecha_nac);

if ($edad < 14){
	$menores_radio_2013 = $menores_radio_2013 + 1;
}else{
$adultos_radio_2013 = $adultos_radio_2013 + 1;
}


  $result1->MoveNext();
	}


/////////////////////// SERVICIOS ////////////////////

$sql1 = "SELECT $prestaciones.tipo_doc, $prestaciones.documento, $prestaciones.fecha_prestacion, $base.pacientes.fecha_nac FROM $prestaciones INNER JOIN $base.pacientes ON $prestaciones.documento = $base.pacientes.documento WHERE $prestaciones.fecha_prestacion between '$desde1' and '$hasta1' and $prestaciones.cod_prestacion NOT like 'TECO%' GROUP BY $prestaciones.documento"; 
$result1 = $db->Execute($sql1);

   if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  
$tipo_doc=$result1->fields["tipo_doc"];
$documento=$result1->fields["nro_paciente"];
$fecha_factura=$result1->fields["fecha_factura"];
$fecha_nac=$result1->fields["fecha_nac"];
$cont = $cont + 1;

 

$edad = calculaEdad($fecha_nac);

if ($edad < 14){
	$menores_prestaciones = $menores_prestaciones + 1;
}else{
$adultos_prestaciones = $adultos_prestaciones + 1;
}


  $result1->MoveNext();
	}


$sql1 = "SELECT $prestaciones.tipo_doc, $prestaciones.documento, $prestaciones.fecha_prestacion, $base.pacientes.fecha_nac FROM $prestaciones INNER JOIN $base.pacientes ON $prestaciones.documento = $base.pacientes.documento WHERE $prestaciones.fecha_prestacion between '$desde' and '$hasta' and $prestaciones.cod_prestacion NOT like 'TECO%' GROUP BY $prestaciones.documento"; 
$result1 = $db->Execute($sql1);

   if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  
$tipo_doc=$result1->fields["tipo_doc"];
$documento=$result1->fields["nro_paciente"];
$fecha_factura=$result1->fields["fecha_factura"];
$fecha_nac=$result1->fields["fecha_nac"];
$cont = $cont + 1;

 

$edad = calculaEdad($fecha_nac);

if ($edad < 14){
	$menores_prestaciones_2013 = $menores_prestaciones_2013 + 1;
}else{
$adultos_prestaciones_2013 = $adultos_prestaciones_2013 + 1;
}


  $result1->MoveNext();
	}

	//////////////////////////

$total_menores = $menores + $menores_radio + $menores_prestaciones;
$total_menores_2013 = $menores_2013 + $menores_radio_2013 + $menores_prestaciones_2013;


$total_adultos = $adultos + $adultos_radio + $adultos_prestaciones;
$total_adultos_2013 = $adultos_2013 + $adultos_radio_2013 + $adultos_prestaciones_2013;



$total_total = $total_menores + $total_menores_2013 + $total_adultos + $total_adultos_2013;


 

$total_quimio = $menores + $menores_2013 + $adultos + $adultos_2013; 
$total_radio  = $menores_radio + $menores_radio_2013 + $adultos_radio + $adultos_radio_2013;
$total_presta = $menores_prestaciones + $menores_prestaciones_2013 + $adultos_prestaciones + $adultos_prestaciones_2013;


	//////////////////////
?>

<table width="800" border="0">
  <tr>
    <th colspan="3" bgcolor="#FFFFFF" scope="col">PROGRAMA ONCOLOGICO PROVINCIAL </th>
  </tr>
  <tr>
    <th colspan="3" bgcolor="#FFFFFF" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th colspan="3" bgcolor="#FFFFFF" scope="col">PERIODO (2012-2013) </th>
  </tr>

    </tr>
</table>


<table width="800" border="0">
  
  <tr>
    <th bgcolor="#FFFFFF" scope="col">&nbsp;</th>
    <th height="40" colspan="2" bgcolor="#EDEDED" scope="col"><span class="Estilo1">2012 </span></th>
    <th colspan="2" bgcolor="#EDEDED" scope="col"><span class="Estilo1">Al 31 de Mayo de 2013</span></th>
    <th bgcolor="#EDEDED" scope="col"><span class="Estilo1">TOTAL</span></th>
  </tr>
  <tr>
    <th bgcolor="#EDEDED" scope="col">N&ordm; de Pacientes </th>
    <th height="40" bgcolor="#EDEDED" scope="col">NI&Ntilde;OS</th>
    <th bgcolor="#EDEDED" scope="col">ADULTOS</th>
    <th bgcolor="#EDEDED" scope="col">NI&Ntilde;OS</th>
    <th bgcolor="#EDEDED" scope="col">ADULTOS</th>
    <th bgcolor="#EDEDED" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <td scope="col">Tratamientos Quimioterapicos </td>
    <td height="40" scope="col"><div align="center" class="Estilo7"><span class="Estilo1"><?php echo $menores;?></span></div></td>
    <td height="40" scope="col"><div align="center"><span class="Estilo1"><?php echo $adultos;?></span></div></td>
    <td scope="col"><div align="center" class="Estilo7"><span class="Estilo1"><?php echo $menores_2013;?></span></div></td>
    <td scope="col"><div align="center"><span class="Estilo1"><?php echo $adultos_2013;?></span></div></td>
    <td scope="col"><div align="center" class="Estilo7"><span class="Estilo1"><?php echo $total_quimio;?></span></div></td>
  </tr>
  <tr>
    <td scope="col">Tratamientos Radioterapicos </td>
    <td height="40" scope="col"><div align="center" class="Estilo7"><span class="Estilo1"><?php echo $menores_radio;?></span></div></td>
    <td height="40" scope="col"><div align="center"><span class="Estilo1"><?php echo $adultos_radio;?></span></div></td>
    <td scope="col"><div align="center" class="Estilo7"><span class="Estilo1"><?php echo $menores_radio_2013;?></span></div></td>
    <td scope="col"><div align="center"><span class="Estilo1"><?php echo $adultos_radio_2013;?></span></div></td>
    <td scope="col"><div align="center" class="Estilo7"><span class="Estilo1"><?php echo $total_radio;?></span></div></td>
  </tr>
  <tr>
    <td scope="col">Prestaciones Varias</td>
    <td height="40" scope="col"><div align="center" class="Estilo7"><span class="Estilo1"><?php echo $menores_prestaciones;?></span></div></td>
    <td height="40" scope="col"><div align="center"><span class="Estilo1"><?php echo $adultos_prestaciones;?></span></div></td>
    <td scope="col"><div align="center" class="Estilo7"><span class="Estilo1"><?php echo $menores_prestaciones_2013;?></span></div></td>
    <td scope="col"><div align="center"><span class="Estilo1"><?php echo $adultos_prestaciones_2013;?></span></div></td>
    <td scope="col"><div align="center" class="Estilo7"><span class="Estilo1"><?php echo $total_presta;?></span></div></td>
  </tr>
  <tr>
    <td scope="col">&nbsp;</td>
    <td height="21" colspan="5" scope="col"><hr noshade></td>
  </tr>
  <tr>
    <td scope="col">&nbsp;</td>
    <td height="40" scope="col"><div align="center"><span class="Estilo1"><?php echo $total_menores;?></span></div></td>
    <td height="40" scope="col"><div align="center"><span class="Estilo1"><?php echo $total_adultos;?></span></div></td>
    <td scope="col"><div align="center"><span class="Estilo1"><?php echo $total_menores_2013;?></span></div></td>
    <td scope="col"><div align="center"><span class="Estilo1"><?php echo $total_adultos_2013;?></span></div></td>
    <td scope="col"><div align="center"><span class="Estilo1"><?php echo $total_total;?></span></div></td>
  </tr>
</table>
