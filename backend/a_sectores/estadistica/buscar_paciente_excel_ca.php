<?php 


 include ("../../conexiones/config_usu.php");

$excel = $_REQUEST['excel'];

$dia_d = $_REQUEST['dia'];
$mes_d = $_REQUEST['mes'];
$anio_d = $_REQUEST['anio'];

$dia_h = $_REQUEST['dia2'];
$mes_h = $_REQUEST['mes2'];
$anio_h = $_REQUEST['anio2'];


$fecha_d = $anio_d."-".$mes_d."-".$dia_d;
$fecha_h = $anio_h."-".$mes_h."-".$dia_h;


$fecha_d1 = $dia_d."-".$mes_d."-".$anio_d;
$fecha_h1 = $dia_h."-".$mes_h."-".$anio_h;


$cod_agrupado1=$_POST["cod_agrupado"];
	for ($i=0;$i<count($cod_agrupado1);$i++)    
	{     
	$cod_agrupado = $cod_agrupado1[$i];  
	
		}


		$laboratorio=$_POST["laboratorios"];
	for ($i=0;$i<count($laboratorio);$i++)    
	{     
	$laboratorios = $laboratorio[$i];  
		
		}


/*

$sql1 = "SELECT * FROM `tr_ventas_encabezado` where cod_diagnostico = '' and fecha between '$fecha_d' and '$fecha_h' ";
 $result1 = $db->Execute($sql1);

if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {


 $documento=$result1->fields["documento"];
  $nro_factura=$result1->fields["nro_factura"];


 $sql = "SELECT * FROM paciente_diagnostico where documento = '$documento'";
 $result = $db->Execute($sql);
$cod_diagnostico=$result->fields["cod_diagnostico"];

 

  $sql = "UPDATE `tr_ventas_encabezado` SET  cod_diagnostico = '$cod_diagnostico' WHERE nro_factura = '$nro_factura'";
$result = $db->Execute($sql);
 


     $result1->MoveNext();
	}



$sql1 = "SELECT * FROM `tr_ventas_detalle` where documento = '' and fecha between '$fecha_d' and '$fecha_h' ";
 $result1 = $db->Execute($sql1);

if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {


 $nro_factura=$result1->fields["nro_factura"];
 $cod_droga=$result1->fields["cod_droga"];
 $cod_detalle=$result1->fields["cod_detalle"];


 $sql = "SELECT * FROM tr_ventas_encabezado where nro_factura = '$nro_factura'";
 $result = $db->Execute($sql);
$documento=$result->fields["documento"];

 

  $sql = "UPDATE `tr_ventas_detalle` SET  `documento` = '$documento' WHERE `cod_detalle` = '$cod_detalle'";
$result = $db->Execute($sql);
 


     $result1->MoveNext();
	}


$sql1 = "SELECT * FROM `tr_ventas_detalle` where cod_diagnostico = '' and fecha between '$fecha_d' and '$fecha_h' ";
 $result1 = $db->Execute($sql1);

if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {


 $nro_factura=$result1->fields["nro_factura"];
 $cod_droga=$result1->fields["cod_droga"];
 $cod_detalle=$result1->fields["cod_detalle"];


 $sql = "SELECT * FROM tr_ventas_encabezado where nro_factura = '$nro_factura'";
 $result = $db->Execute($sql);
$cod_diagnostico=$result->fields["cod_diagnostico"];

 

  $sql = "UPDATE `tr_ventas_detalle` SET  cod_diagnostico = '$cod_diagnostico' WHERE `cod_detalle` = '$cod_detalle'";
$result = $db->Execute($sql);
 


     $result1->MoveNext();
	}


*/
  $sql2 = "select * from drogas where cod_droga = '$laboratorios'";
$result2 = $db->Execute($sql2);

 $denominacion=strtoupper($result2->fields["droga"]);

  $sql2 = "select * from diagnostico where nro_diagnostico = '$cod_agrupado'";
$result2 = $db->Execute($sql2);

 $nombre_diagnostico=strtoupper($result2->fields["nombre_diagnostico"]);

 
$file = "Estadistica_droga_tumo_".$fecha_d1."-".$fecha_h1.".xls";

if ($excel == 1){
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$file");
}



 $sql="select * from  tr_ventas_detalle where (fecha between '$fecha_d' and '$fecha_h' and cod_diagnostico = '$cod_agrupado' and documento > 5000 and cod_droga = '$laboratorios')  group by documento order by fecha";
$result = $db->Execute($sql);



?>
<table width="100%" border="1" cellspacing="0">
  
  <tr bgcolor="#B5B5FB">
    <td colspan="2"><div align="center"><font size="3" face="Trebuchet MS"><strong>CANCER DE <?php echo $cod_agrupado;?> -  <?php echo $nombre_diagnostico;?> </strong></font></div></td>
    <td colspan="2"><div align="center"><font size="3" face="Trebuchet MS"><strong>Desde el: <?php echo $fecha_d1;?> hasta el: <?php echo $fecha_h1;?> </strong></font></div></td>
    <td colspan="2"><div align="center"><font size="3" face="Trebuchet MS"><strong>PROGRAMA ONCOLOGICO </strong></font></div></td>
  </tr>
  <tr bgcolor="#B8B8B8">
    <td width="10%"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Doc.</font></font></div></td>
    <td width="34%"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Nombre </font></font></div></td>
 <td colspan="2"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Medicamento</font></font></div></td>

    <!-- <td width="5%" bgcolor="#F0F0F0"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Localizacion</font></div></td>
<td width="4%" bgcolor="#F0F0F0"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Base</font></font></div></td>
	<td width="7%" bgcolor="#F0F0F0"><div align="center"><font color="#000000" face="Arial, Helvetica, sans-serif"><font size="2">Primario./Multiple</font></font></div></td>
	<!-- <td width="5%"><div align="center"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><font size="2">Borrar</font></font></div></td>
	<td width="3%" bgcolor="#F0F0F0"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Estadio</font></div></td>
    <td width="9%" bgcolor="#F0F0F0"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Fuente</font></div></td> -->
    <td width="16%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Diagnostico</font></div></td>
    <td width="16%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Medicamentos entregados </font></div></td>
    <!-- <td width="4%" bgcolor="#F0F0F0"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Linea</font></div></td>
    <td width="4%" bgcolor="#F0F0F0"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Plan</font></div></td>
    <td width="7%" bgcolor="#F0F0F0"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Esquema</font></div></td> -->
  </tr>


  <?php 
  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

	
$documento=strtoupper($result->fields["documento"]);
$cod_droga1=strtoupper($result->fields["cod_droga"]);

 $sql2="select * from  pacientes where documento = $documento";
$result2 = $db->Execute($sql2);
$nombre=strtoupper($result2->fields["nombre"]);
$apellido=strtoupper($result2->fields["apellido"]);
$departamento=strtoupper($result2->fields["departamento"]);
$nombre_completo = $apellido.", ".$nombre; 



 $sql2="select * from  diagnostico where nro_diagnostico like '$cod_agrupado'";
$result2 = $db->Execute($sql2);
$nombre_diagnostico=strtoupper($result2->fields["nombre_diagnostico"]);

$cod_fuente=strtoupper($result->fields["cod_fuente"]);

 

 $sql2="select count(cod_droga) as cantidad from tr_ventas_detalle where fecha between '$fecha_d' and '$fecha_h' and cod_diagnostico = '$cod_agrupado' and documento = '$documento' and cod_droga = '$laboratorios'"; 
$result2 = $db->Execute($sql2);
$cantidad=strtoupper($result2->fields["cantidad"]);



$tot = $tot + $cantidad;
?> 
<tr>
  <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$documento");?></font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$nombre_completo");?></font></td>
 <td width="5%"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$laboratorios");?></font></td>


     <td width="19%"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$denominacion");?></font></td>
     <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$nombre_diagnostico");?></font></div></td>
        <td><div align="center">
          <font size="4" face="Arial, Helvetica, sans-serif"><?php echo $cantidad;?>
</font> </div></td>
</tr>

  
<?php


$result->MoveNext();
	}

?>

<tr bgcolor="#B8B8B8">
  <td>&nbsp;</td>
  <td><div align="center"><font face="Trebuchet MS">CANTIDAD</font></div></td>
  <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"><?php print("$cont");?></font></td>
   <td><div align="center"></div></td>
  <td><div align="center"><font size="4" face="Arial, Helvetica, sans-serif"><?php print("$tot");?></font></div></td>
</tr>
</table>




