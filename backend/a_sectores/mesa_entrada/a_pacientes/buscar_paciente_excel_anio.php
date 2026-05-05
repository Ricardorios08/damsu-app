<?php 

/*$file = "PAC.DIAGNOSTICO_TODOS.XLS";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$file");
*/

$anio = $_REQUEST['anio'];

$desde = "20".$anio."-01-01";
$hasta = "20".$anio."-12-31";


 include ("../../../conexiones/config_usu.php");


/*


$sql1 = "SELECT * FROM `tr_ventas_detalle` where cod_droga = 0";
 $result1 = $db->Execute($sql1);

if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {


 $cod_mercaderia=$result1->fields["cod_mercaderia"];
 $nro_factura=$result1->fields["nro_factura"];
 $cod_droga=$result1->fields["cod_droga"];
 $cod_detalle=$result1->fields["cod_detalle"];



  $sql = "SELECT * FROM monodrogas where cod_barra = '$cod_mercaderia'";
 $result = $db->Execute($sql);
$cod_droga =$result->fields["cod_droga"];

 echo $sql = "SELECT * FROM drogas where cod_droga= '$cod_droga'";
 $result = $db->Execute($sql);
$droga=$result->fields["droga"];



$cod_diagnostico = rtrim($cod_diagnostico);

echo $sql = "UPDATE `tr_ventas_detalle` SET `nombre_droga` = '$droga' , `cod_droga` = '$cod_droga' WHERE `cod_detalle` = '$cod_detalle'";
$result = $db->Execute($sql);
echo "<br>";


     $result1->MoveNext();
	}

exit;
*/

/*$sql1 = "SELECT * FROM `tr_ventas_detalle`";
 $result1 = $db->Execute($sql1);

if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {


 $nro_factura=$result1->fields["nro_factura"];
 $cod_droga=$result1->fields["cod_droga"];
 $cod_detalle=$result1->fields["cod_detalle"];


 $sql = "SELECT * FROM tr_ventas_encabezado where nro_factura = '$nro_factura'";
 $result = $db->Execute($sql);
$documento=$result->fields["documento"];

 $sql = "SELECT * FROM drogas where cod_droga= '$cod_droga'";
 $result = $db->Execute($sql);
$droga=$result->fields["droga"];



$cod_diagnostico = rtrim($cod_diagnostico);

echo $sql = "UPDATE `tr_ventas_detalle` SET `nombre_droga` = '$droga' , `documento` = '$documento' WHERE `cod_detalle` = '$cod_detalle'";
$result = $db->Execute($sql);
echo "<br>";


     $result1->MoveNext();
	}

exit;
 */


/* $sql1 = "SELECT * FROM `tr_ventas_encabezado` where cod_diagnostico = ''";
 $result1 = $db->Execute($sql1);

if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {


 $apellido=$result1->fields["apellido"];
  $nombre=$result1->fields["nombre"];
   $documento=$result1->fields["documento"];
$tipo_doc=$result1->fields["tipo_doc"];
$nro_factura=$result1->fields["nro_factura"];
$departamento=$result1->fields["departamento"];

 $sql = "SELECT * FROM paciente_diagnostico where documento = '$documento' and tipo_doc = '$tipo_doc' ";
 $result = $db->Execute($sql);
$cod_diagnostico=$result->fields["cod_diagnostico"];

 $sql = "SELECT * FROM pacientes where documento = '$documento' and tipo_doc = '$tipo_doc' ";
 $result = $db->Execute($sql);
$departamento=$result->fields["departamento"];



$cod_diagnostico = rtrim($cod_diagnostico);

echo $sql = "UPDATE `tr_ventas_encabezado` SET `cod_diagnostico` = '$cod_diagnostico' , `departamento` = '$departamento' WHERE `nro_factura` = '$nro_factura'";
$result = $db->Execute($sql);


     $result1->MoveNext();
	}

exit;
 */

$hoy = date("d-m-Y");

 

echo  $sql="select * from  tr_ventas_encabezado where (fecha between '$desde' and '$hasta'  and documento > 5000) group by documento order by cod_diagnostico, departamento, denominacion";
$result = $db->Execute($sql);



?>
<table width="100%" border="1" cellspacing="0">
  
  <tr bordercolor="#0066FF" bgcolor="#FF0000">
    <td height="52" bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#F0F0F0"><font size="3" face="Trebuchet MS"><strong>TODOS </strong></font></td>
    <td bgcolor="#F0F0F0">&nbsp;</td>
    <td bgcolor="#F0F0F0"><div align="center"><font size="3" face="Trebuchet MS"><strong>A&Ntilde;O <?php $anio;?> </strong></font></div></td>
    <td bgcolor="#F0F0F0"><font size="3" face="Trebuchet MS"><strong>PROGRAMA ONCOLOGICO </strong></font></td>
    <td bgcolor="#F0F0F0"><div align="center"><font size="2" face="Trebuchet MS"><?php print("$hoy");?></font></div></td>
    <td bgcolor="#F0F0F0">&nbsp;</td>
  </tr>
  <tr bordercolor="#0066FF" bgcolor="#FF0000">
    <td width="5%" height="52" bgcolor="#FFFFFF"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Doc.</font></font></div></td>
    <td width="29%" bgcolor="#F0F0F0"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Nombre </font></font></div></td>
    <td width="13%" bgcolor="#F0F0F0"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Diagnostico</font></font></div></td>
    <td width="13%" bgcolor="#F0F0F0"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Localización </font></font></div></td>

    <!-- <td width="5%" bgcolor="#F0F0F0"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Localizacion</font></div></td>
<td width="4%" bgcolor="#F0F0F0"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Base</font></font></div></td>
	<td width="7%" bgcolor="#F0F0F0"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Primario./Multiple</font></font></div></td>
	<!-- <td width="5%"><div align="center"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><font size="2">Borrar</font></font></div></td>
	<td width="3%" bgcolor="#F0F0F0"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Estadio</font></div></td>
    <td width="9%" bgcolor="#F0F0F0"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Fuente</font></div></td> -->
    <td width="11%" bgcolor="#F0F0F0"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Cantidad de Atenciones anuales </font></div></td>
    <td width="11%" bgcolor="#F0F0F0"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Cantidad de Radioterapia</font> <font size="2" face="Trebuchet MS">(TECO) </font></div></td>
    <td width="11%" bgcolor="#F0F0F0"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Medicamentos entregados </font></div></td>
    <!-- <td width="4%" bgcolor="#F0F0F0"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Linea</font></div></td>
    <td width="4%" bgcolor="#F0F0F0"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Plan</font></div></td>
    <td width="7%" bgcolor="#F0F0F0"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Esquema</font></div></td> -->
  </tr>


  <?php 
  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

	$fecha_diagnostico=strtoupper($result->fields["fecha_diagnostico"]);
$documento=strtoupper($result->fields["documento"]);

 $sql2="select * from  pacientes where documento = $documento";
$result2 = $db->Execute($sql2);
$nombre=strtoupper($result2->fields["nombre"]);
$apellido=strtoupper($result2->fields["apellido"]);
$departamento=strtoupper($result2->fields["departamento"]);
$nombre_completo = $apellido.", ".$nombre; 

$cod_diagnostico=strtoupper($result->fields["cod_diagnostico"]);

 $sql2="select * from  diagnostico where nro_diagnostico like '$cod_diagnostico'";
$result2 = $db->Execute($sql2);
$nombre_diagnostico=strtoupper($result2->fields["nombre_diagnostico"]);

$cod_fuente=strtoupper($result->fields["cod_fuente"]);

 $sql2="select * from  fuentes where nro_fuente like '$cod_fuente'";
$result2 = $db->Execute($sql2);
$nombre_reducido_fuente=strtoupper($result2->fields["nombre_reducido_fuente"]);

$localizacion=strtoupper($result->fields["localizacion"]);
$base=strtoupper($result->fields["base"]);
$primario_multiple=strtoupper($result->fields["primario_multiple"]);
$estadio=strtoupper($result->fields["estado"]);


 $sql2="select count(documento) as radio from  prestaciones_pacientes  where documento = $documento and cod_prestacion = 'TECO' and fecha_prestacion  between '$desde' and '$hasta'";
$result2 = $db->Execute($sql2);
$radio=strtoupper($result2->fields["radio"]);
 
if ($radio == 0){$radio = "";}

  $sql2="select sum(neto) as gastado from  tr_ventas_encabezado where documento = $documento and fecha between '$desde' and '$hasta'";
$result2 = $db->Execute($sql2);
$gastado=$result2->fields["gastado"];

$sql2="select count(nro_factura) as cantidad_atenciones from  tr_ventas_encabezado where documento = $documento and fecha between '$desde' and '$hasta'";
$result2 = $db->Execute($sql2);
$cantidad_atenciones=$result2->fields["cantidad_atenciones"];
 
$cont = $cont + 1;
 $total_radio = $total_radio + $radio;
  $total_gastado = $total_gastado + $gastado;
   $total_cantidad_atenciones = $total_cantidad_atenciones + $cantidad_atenciones;



?> 
<tr bordercolor="#FFFFFF" bgcolor="#FFFFCC">
  <td bgcolor="#FFFFFF"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$documento");?></font></div></td>
    <td bgcolor="#F0F0F0"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$nombre_completo");?></font></td>
    <td bgcolor="#F0F0F0"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$nombre_diagnostico");?></font></td>
    <td bgcolor="#F0F0F0"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$departamento");?></font></td>


     <td bgcolor="#F0F0F0"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$cantidad_atenciones");?></font></div></td>
        <td bgcolor="#F0F0F0"><div align="center"><font size="2" face="Trebuchet MS"><?php print("$radio");?></font></div></td>
        <td bgcolor="#F0F0F0"><?php include ("entrega_medicamentos.php");?></td>
</tr>

  
<?php


$result->MoveNext();
	}

?>

<tr bordercolor="#FFFFFF" bgcolor="#FFFFCC">
  <td bgcolor="#FFFFFF">&nbsp;</td>
  <td bgcolor="#F0F0F0"><div align="center"><font face="Trebuchet MS">CANTIDAD DE PACIENTES</font></div></td>
  <td bgcolor="#F0F0F0">&nbsp;</td>
  <td bgcolor="#F0F0F0"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$cont");?></font></td>
   <td bgcolor="#F0F0F0"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$total_cantidad_atenciones");?></font></div></td>
  <td bgcolor="#F0F0F0"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$total_radio");?></font></div></td>
  <td bgcolor="#F0F0F0">&nbsp;</td>
</tr>
</table>


