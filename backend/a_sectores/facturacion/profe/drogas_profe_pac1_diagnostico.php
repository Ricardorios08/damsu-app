<?php

 $file = 'pacientes_profe.xls';
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$file");
 


?>

<style type="text/css">
<!--
.Estilo12 {font-family: "Trebuchet MS"; font-size: 10; }
.Estilo13 {font-size: 10}
.Estilo16 {font-family: "Trebuchet MS"; font-size: 10px; }
.Estilo19 {font-family: "Trebuchet MS"; font-size: 12px; }
-->
</style>
<table width="850" border="0" cellpadding="0">
  

  

<?php 

include ("../../../conexiones/config_pro.php");

///////////////
/*
 $sql1 = "select * from tr_ventas_encabezado where nro_os = 10";
$result1 = $db->Execute($sql1);

 

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  
$documento=$result1->fields["documento"];
$nro_factura=$result1->fields["nro_factura"];

 
  $sql = "UPDATE tr_ventas_detalle SET nro_os = '10' WHERE nro_factura = '$nro_factura'";
//$result = $db->Execute($sql);




//echo "<br>";
$cont = $cont + 1;

   $result1->MoveNext();
	}

*/

////////////

 
 $sql1 = "SELECT *  FROM `tr_ventas_encabezado` where nro_os = 10 and fecha > '2012-12-31' group by documento order by fecha";

$result1 = $db->Execute($sql1);


 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  

 $documento=$result1->fields["documento"];
$fecha=$result1->fields["fecha"];
 $dia = substr($fecha,8,2);
  $mes = substr($fecha,5,2);
   $anio = substr($fecha,0,4);

   $fecha = $dia."/".$mes."/".$anio;

 $nro_factura=$result1->fields["nro_factura"];
 


 $sql = "SELECT * FROM pacientes where documento = '$documento'";
$result = $db->Execute($sql);
  $apellido=$result->fields["apellido"];
 
  $nombre=$result->fields["nombre"];
 
 $calle=$result->fields["calle"];
 $puerta=$result->fields["puerta"];
 $departamento=$result->fields["departamento"];
 
 
 $sql = "SELECT * FROM paciente_diagnostico where documento = '$documento' ORDER BY fecha_diagnostico desc";
$result = $db->Execute($sql);
  $cod_diagnostico=rtrim($result->fields["cod_diagnostico"]);
 
  $sql = "SELECT * FROM diagnostico where nro_diagnostico = '$cod_diagnostico'";
$result = $db->Execute($sql);
  $nombre_diagnostico=$result->fields["nombre_diagnostico"];

 $sql = "SELECT * FROM protocolo where nro_diagnostico = '$cod_diagnostico'";
$result = $db->Execute($sql);
  $situacion=$result->fields["situacion"];
  $linea=$result->fields["linea"];
  $plan=$result->fields["plan"];
  $esquema=$result->fields["esquema"];
  $alternativa=$result->fields["alternativa"];
 $ciclos=$result->fields["ciclos"];




$cont = $cont + 1;

?>
<tr>
    <th width="212" bgcolor="#3399FF" scope="col"><span class="Estilo19">Paciente</span></th>
<th width="212" bgcolor="#3399FF" scope="col"><span class="Estilo19">Documento</span></th>
    <th width="177" bgcolor="#3399FF" scope="col"><span class="Estilo19">Direccion </span></th>
    <th width="209" bgcolor="#3399FF" scope="col"><span class="Estilo19">Localidad</span></th>
	    <th width="85" bgcolor="#3399FF" scope="col"><span class="Estilo19">Ingreso</span></th>
		    <th width="85" bgcolor="#3399FF" scope="col"><span class="Estilo19">Diagnóstico</span></th>
			  
	
	<th width="85" bgcolor="#3399FF" scope="col"><span class="Estilo19">Situacion</span></th>
	<th width="85" bgcolor="#3399FF" scope="col"><span class="Estilo19">Linea</span></th>
	<th width="85" bgcolor="#3399FF" scope="col"><span class="Estilo19">Plan</span></th>
	<th width="85" bgcolor="#3399FF" scope="col"><span class="Estilo19">Esquema</span></th>
	 
	<th width="85" bgcolor="#3399FF" scope="col"><span class="Estilo19">Ciclos</span></th>


  </tr>

<tr bgcolor="#F0F0F0">
    <td><div align="left" class="Estilo16"><?php echo $apellido;?> <?php echo $nombre;?> </div></td>
<td><span class="Estilo16"><?php echo $documento;?></span></td>
    <td><span class="Estilo16"><?php echo $calle;?> <?php echo $puerta;?> </span></td>
    <td><span class="Estilo16"><?php echo $departamento;?></span></td>
    <td><div align="center" class="Estilo16"><?php echo $fecha;?></div></td>
    <td><div   class="Estilo16"><?php echo $nombre_diagnostico;?></div></td>
    <td><div   class="Estilo16"><?php echo $situacion;?></div></td>
    <td><div align="center" class="Estilo16"><?php echo $linea;?></div></td>
    <td><div align="center" class="Estilo16"><?php echo $plan;?></div></td>
    <td><div align="center" class="Estilo16"><?php echo $esquema;?></div></td>
  
    <td><div align="center" class="Estilo16"><?php echo $ciclos;?></div></td>




  </tr>
<tr bgcolor="#F0F0F0">
  <td colspan="12"><?php include ("tabla_protocolo.php");?></td>
  </tr>

  

<?php 
   $result1->MoveNext();
	}



?>

<tr>
    <td bgcolor="#3399FF"><span class="Estilo13"></span></td>
    <td bgcolor="#3399FF"><span class="Estilo13"></span></td>
    <td bgcolor="#3399FF"><span class="Estilo13"></span></td>
    <td bgcolor="#3399FF"><span class="Estilo13"></span></td>
  </tr>
  <tr>
    <td><span class="Estilo13"></span></td>
    <td><span class="Estilo13"></span></td>
    <td><div align="right" class="Estilo12">Total</div></td>
    <td><div align="right"><span class="Estilo13"></span><span class="Estilo12"><?php echo $total;?></span></div></td>
  </tr>
  <tr>
    <td><span class="Estilo13"></span></td>
    <td><span class="Estilo13"></span></td>
    <td><div align="right" class="Estilo12">Cant. Entregas </div></td>
    <td><span class="Estilo13"><span class="Estilo12"><?php echo $cont;?></span></span></td>
  </tr>
  <tr>
    <td><span class="Estilo13"></span></td>
    <td><span class="Estilo13"></span></td>
    <td><div align="right" class="Estilo12">Cant. Pacientes </div></td>
    <td><span class="Estilo13"><span class="Estilo12"><?php echo $cont;?></span></span></td>
  </tr>
</table>
