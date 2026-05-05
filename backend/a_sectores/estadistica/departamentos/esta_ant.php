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


 $desde = '2012-01-01';
 $hasta = '2013-05-30';


$base = "oncologico";

  $sql1 = "SELECT $base.receta.tipo_doc, $base.receta.nro_paciente, $base.receta.fecha_factura, $base.pacientes.fecha_nac FROM $base.receta INNER JOIN $base.pacientes ON $base.receta.nro_paciente = $base.pacientes.documento WHERE $base.receta.fecha_factura between '$desde' and '$hasta'"; 
$result1 = $db->Execute($sql1);


 //$sql1="select * from receta where fecha_factura between '$desde' and '$hasta'";



   if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  
$tipo_doc=$result1->fields["tipo_doc"];
$documento=$result1->fields["nro_paciente"];
$fecha_factura=$result1->fields["fecha_factura"];
$fecha_nac=$result1->fields["fecha_nac"];
$cont = $cont + 1;

 

$edad = calculaEdad($fecha_nac);

if ($edad < 14){
	$menores = $menores + 1;
}else{
$adultos = $adultos + 1;
}





  $result1->MoveNext();
	}






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
  <tr>
    <th colspan="3" bgcolor="#FFFFFF" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th colspan="3" bgcolor="#CCCCCC" scope="col">QUIMIOTERAPIA</th>
  </tr>
  <tr>
    <th height="40" bgcolor="#EDEDED" scope="col"><span class="Estilo1">Cantidad Pacientes </span></th>
    <th bgcolor="#EDEDED" scope="col"><span class="Estilo1">Menores a 14 a&ntilde;os </span></th>
    <th bgcolor="#EDEDED" scope="col"><span class="Estilo1">Mayor de 15 a&ntilde;os </span></th>
  </tr>
  <tr>
    <td height="40" scope="col"><div align="center" class="Estilo7"><span class="Estilo1"><?php echo $cont;?></span></div></td>
    <td scope="col"><div align="center" class="Estilo7"><span class="Estilo1"><?php echo $menores;?></span></div></td>
    <td scope="col"><div align="center" class="Estilo7"><span class="Estilo1"><?php echo $adultos;?></span></div></td>
  </tr>
</table>


<?php 

$menores = "";
$adultos = "";
$cont = "";


 $sql1 = "SELECT $base.receta.tipo_doc, $base.receta.nro_paciente, $base.receta.fecha_factura, $base.pacientes.fecha_nac FROM $base.receta INNER JOIN $base.pacientes ON $base.receta.nro_paciente = $base.pacientes.documento WHERE $base.receta.fecha_factura between '$desde' and '$hasta' group by $base.receta.nro_paciente"; 
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
	$menores = $menores + 1;
}else{
$adultos = $adultos + 1;
}





  $result1->MoveNext();
	}


?>




<table width="800" border="0">
  <tr>
    <th colspan="3" bgcolor="#CCCCCC" scope="col">QUIMIOTERAPIA (1 Sola vez por año)  </th>
  </tr>
  <tr>
    <th height="40" bgcolor="#EDEDED" scope="col"><span class="Estilo1">Cantidad Pacientes </span></th>
    <th bgcolor="#EDEDED" scope="col"><span class="Estilo1">Menores a 14 a&ntilde;os </span></th>
    <th bgcolor="#EDEDED" scope="col"><span class="Estilo1">Mayor de 15 a&ntilde;os </span></th>
  </tr>
  <tr>
    <td height="40" scope="col"><div align="center" class="Estilo7"><span class="Estilo1"><?php echo $cont;?></span></div></td>
    <td scope="col"><div align="center" class="Estilo7"><span class="Estilo1"><?php echo $menores;?></span></div></td>
    <td scope="col"><div align="center" class="Estilo7"><span class="Estilo1"><?php echo $adultos;?></span></div></td>
  </tr>
</table>


<?php
$menores = "";
$adultos = "";
$cont = "";




//////////////////////////////////////
$prestaciones = "prestaciones_pacientes";




 $sql1 = "SELECT $prestaciones.tipo_doc, $prestaciones.documento, $prestaciones.fecha_prestacion, $base.pacientes.fecha_nac FROM $prestaciones INNER JOIN $base.pacientes ON $prestaciones.documento = $base.pacientes.documento WHERE $prestaciones.fecha_prestacion between '$desde' and '$hasta'"; 
$result1 = $db->Execute($sql1);


 //$sql1="select * from receta where fecha_factura between '$desde' and '$hasta'";



   if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  
$tipo_doc=$result1->fields["tipo_doc"];
$documento=$result1->fields["documento"];
$fecha_factura=$result1->fields["fecha_prestacion"];
$fecha_nac=$result1->fields["fecha_nac"];
$cont = $cont + 1;

 

$edad = calculaEdad($fecha_nac);

if ($edad < 14){
	$menores = $menores + 1;
}else{
$adultos = $adultos + 1;
}





  $result1->MoveNext();
	}






?>
<BR>
<BR>
<BR>

<table width="800" border="0">
  <tr>
    <th colspan="3" bgcolor="#CCCCCC" scope="col">PRESTACIONES </th>
  </tr>
  <tr>
    <th height="40" bgcolor="#F0F0F0" scope="col"><span class="Estilo1">Cantidad Pacientes </span></th>
    <th bgcolor="#F0F0F0" scope="col"><span class="Estilo1">Menores a 14 a&ntilde;os </span></th>
    <th bgcolor="#F0F0F0" scope="col"><span class="Estilo1">Mayor de 15 a&ntilde;os </span></th>
  </tr>
  <tr>
    <td height="40" scope="col"><div align="center" class="Estilo7"><span class="Estilo1"><?php echo $cont;?></span></div></td>
    <td scope="col"><div align="center" class="Estilo7"><span class="Estilo1"><?php echo $menores;?></span></div></td>
    <td scope="col"><div align="center" class="Estilo7"><span class="Estilo1"><?php echo $adultos;?></span></div></td>
  </tr>
</table>


<?php 

$menores = "";
$adultos = "";
$cont = "";

 $sql1 = "SELECT $prestaciones.tipo_doc, $prestaciones.documento, $prestaciones.fecha_prestacion, $base.pacientes.fecha_nac FROM $prestaciones INNER JOIN $base.pacientes ON $prestaciones.documento = $base.pacientes.documento WHERE $prestaciones.fecha_prestacion between '$desde' and '$hasta' GROUP BY $prestaciones.documento"; 
$result1 = $db->Execute($sql1);



 //$sql1="select * from receta where fecha_factura between '$desde' and '$hasta'";



   if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  
$tipo_doc=$result1->fields["tipo_doc"];
$documento=$result1->fields["nro_paciente"];
$fecha_factura=$result1->fields["fecha_factura"];
$fecha_nac=$result1->fields["fecha_nac"];
$cont = $cont + 1;

 

$edad = calculaEdad($fecha_nac);

if ($edad < 14){
	$menores = $menores + 1;
}else{
$adultos = $adultos + 1;
}





  $result1->MoveNext();
	}


?>




<table width="800" border="0">
  <tr>
    <th colspan="3" bgcolor="#CCCCCC" scope="col">PRESTACIONES (Pacientes 1 sola vez)</th>
  </tr>
  <tr>
    <th height="40" bgcolor="#F0F0F0" scope="col"><span class="Estilo1">Cantidad Pacientes </span></th>
    <th bgcolor="#F0F0F0" scope="col"><span class="Estilo1">Menores a 14 a&ntilde;os </span></th>
    <th bgcolor="#F0F0F0" scope="col"><span class="Estilo1">Mayor de 15 a&ntilde;os </span></th>
  </tr>
  <tr>
    <td height="40" scope="col"><div align="center" class="Estilo7"><span class="Estilo1"><?php echo $cont;?></span></div></td>
    <td scope="col"><div align="center" class="Estilo7"><span class="Estilo1"><?php echo $menores;?></span></div></td>
    <td scope="col"><div align="center" class="Estilo7"><span class="Estilo1"><?php echo $adultos;?></span></div></td>
  </tr>
</table>


<?php
 

$menores = "";
$adultos = "";
$cont = "";

 $sql1 = "SELECT $prestaciones.tipo_doc, $prestaciones.documento, $prestaciones.fecha_prestacion, $base.pacientes.fecha_nac FROM $prestaciones INNER JOIN $base.pacientes ON $prestaciones.documento = $base.pacientes.documento WHERE $prestaciones.fecha_prestacion between '$desde' and '$hasta' GROUP BY $prestaciones.documento"; 
$result1 = $db->Execute($sql1);



 //$sql1="select * from receta where fecha_factura between '$desde' and '$hasta'";



   if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  
$tipo_doc=$result1->fields["tipo_doc"];
$documento=$result1->fields["nro_paciente"];
$fecha_factura=$result1->fields["fecha_factura"];
$fecha_nac=$result1->fields["fecha_nac"];
$cont = $cont + 1;

 

$edad = calculaEdad($fecha_nac);

if ($edad < 14){
	$menores = $menores + 1;
}else{
$adultos = $adultos + 1;
}





  $result1->MoveNext();
	}


?>




<table width="800" border="0">
  <tr>
    <th colspan="3" bgcolor="#CCCCCC" scope="col">PRESTACIONES (Pacientes 1 sola vez)</th>
  </tr>
  <tr>
    <th height="40" bgcolor="#F0F0F0" scope="col"><span class="Estilo1">Cantidad Pacientes </span></th>
    <th bgcolor="#F0F0F0" scope="col"><span class="Estilo1">Menores a 14 a&ntilde;os </span></th>
    <th bgcolor="#F0F0F0" scope="col"><span class="Estilo1">Mayor de 15 a&ntilde;os </span></th>
  </tr>
  <tr>
    <td height="40" scope="col"><div align="center" class="Estilo7"><span class="Estilo1"><?php echo $cont;?></span></div></td>
    <td scope="col"><div align="center" class="Estilo7"><span class="Estilo1"><?php echo $menores;?></span></div></td>
    <td scope="col"><div align="center" class="Estilo7"><span class="Estilo1"><?php echo $adultos;?></span></div></td>
  </tr>
</table>


<?php
$menores = "";
$adultos = "";
$cont = "";
?>

