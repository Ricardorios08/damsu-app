<style type="text/css">
<!--
.Estilo2 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.Estilo5 {font-size: 12px}
.Estilo8 {font-size: 14px}
.Estilo19 {font-family: Arial, Helvetica, sans-serif}
-->
</style>
 

 

<body onUnload="window.opener.openedImprimir=0;" onLoad="window.print(); window.close(); cerrar()"> 



<?php 
 

?>
<style type="text/css">
<!--
.Estilo5 {font-family: Arial, Helvetica, sans-serif}
.Estilo8 {
	font-family: Arial, Helvetica, sans-serif;
	color: #FFFFFF;
	font-weight: bold;
}
.Estilo70 {font-family: Arial, Helvetica, sans-serif; font-size: 14px; }
.Estilo72 {font-size: 12px}
.Estilo72 {font-family: Arial, Helvetica, sans-serif}
.Estilo74 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold; }
-->
</style>



<table width="100%" height="108" border="1" cellspacing="0">
  <!--DWLayoutTable-->
<tr valign="middle" bgcolor="#F0F0F0">
    <td height="26" colspan="13"><div align="center" class="Estilo2">
      <div align="center"><span class="Estilo5"><span class="Estilo8">Diario de ENTREGAS del dia: <?php ECHO $fecha_a;?></span> </span></div>
    </div></td>
  </tr>
   <tr bgcolor="#DAFAFC">

   <td width="10%" height="19" bgcolor="#B8B8B8"><div align="center"><span class="Estilo2">Fecha</span>
     <td width="10%" height="19" bgcolor="#B8B8B8"><div align="center"><span class="Estilo2">Entrega</span>
     </div>
     <td width="20%" bgcolor="#B8B8B8"><div align="center"><span class="Estilo2">Mercaderia</span></span></div></td>
   <td width="40%" bgcolor="#B8B8B8"><div align="center"><span class="Estilo2">Comercial</span></span></div></td>
  <td width="40%" bgcolor="#B8B8B8"><div align="center"><span class="Estilo2">Presentación</span></span></div></td>
  
<td width="40%" bgcolor="#B8B8B8" ><div align="center"><span class="Estilo2">Droga</span></span></div></td>
<td width="10%" bgcolor="#B8B8B8" ><div align="center"><span class="Estilo2">Lote </span></div></td>
<td width="20%" bgcolor="#B8B8B8" ><div align="center"><span class="Estilo2">Mes / A&ntilde;o </span></div></td>
<td width="20%" bgcolor="#B8B8B8" ><div align="center"><span class="Estilo2">Serie</span></div></td>
<td width="25%" bgcolor="#B8B8B8" ><div align="center"><span class="Estilo2">GTIN</span></div></td>
 <td width="20%" bgcolor="#B8B8B8" ><div align="center"><span class="Estilo2">ESTADO</span></div></td>
 <td width="18%" bgcolor="#B8B8B8" ><div align="center"><span class="Estilo2">DOCU</span></div></td>
 <td width="45%" bgcolor="#B8B8B8" ><div align="center"><span class="Estilo2">PACIENTE</span></div></td>

   </tr>
   

	 <?php 

include ("../../../conexiones/config_pro.php");

  $sql="select * from tr_ventas_detalle where fecha between '$desde' and '$hasta' and estado = '$estados' ORDER by fecha, fecha desc";
$result = $db->Execute($sql);

  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {
 
$fecha=$result->fields["fecha"];
$nro_factura=$result->fields["nro_factura"];
$cod_detalle=$result->fields["cod_detalle"];

$cod_mercaderia=$result->fields["cod_mercaderia"];
 $descripcion=$result->fields["descripcion"];
$lote=$result->fields["lote"];
$mes_lote=$result->fields["mes_lote"];
$anio_lote=$result->fields["anio_lote"];
$cantidad=$result->fields["cantidad"];
$gtin=$result->fields["gtin"];
$nro_serie=$result->fields["nro_serie"];


$recibido_coir=$result->fields["recibido_coir"];
$recibido_farmacia=$result->fields["recibido_farmacia"];
$recibido_servicio=$result->fields["recibido_servicio"];
$estado_droga=$result->fields["estado"];

$cod_droga=$result->fields["cod_droga"];

  $sql8 = "SELECT * FROM `monodrogas`  WHERE  `cod_barra` = '$cod_mercaderia'";
$result8 = $db->Execute($sql8);

$presentacion=strtoupper($result8->fields["presentacion"]);
$nombre_comercial=strtoupper($result8->fields["nombre_comercial"]);
$cod_droga= $result8->fields["cod_droga"];
$informar=strtoupper($result8->fields["informar"]);


$sql7="select * from drogas where cod_droga = $cod_droga";
$result7 = $db->Execute($sql7);
$drogas=strtoupper($result7->fields["droga"]);

 
$sql7="select * from tr_ventas_encabezado where nro_factura = $nro_factura";
$result7 = $db->Execute($sql7);
$documento=strtoupper($result7->fields["documento"]);


 $sql7="select * from pacientes where documento = $documento";
$result7 = $db->Execute($sql7);
$estado=strtoupper($result7->fields["estado"]);
$fecha_estado=strtoupper($result7->fields["fecha_estado"]);  // letras
$calle=strtoupper($result7->fields["calle"]); // numero
$puerta=strtoupper($result7->fields["puerta"]); // numero
$localidad=strtoupper($result7->fields["localidad"]); // numero
$departamento=strtoupper($result7->fields["departamento"]); // numero
$direccion = $calle." ".$puerta." ".$localidad." ".$departamento;

$apellido=strtoupper($result7->fields["apellido"]); // numero
$nombre=strtoupper($result7->fields["nombre"]); // numero

$nombre_completo = $apellido.", ".$nombre;




?>
<tr>
<td height="21"> <span class="Estilo2"><?php ECHO $fecha;?></span></td>
<td height="21"> <span class="Estilo2"><?php ECHO $nro_factura;?></span></td>
<td height="21"> <span class="Estilo2"><?php ECHO $cod_mercaderia;?></span></td>
<td height="21"> <span class="Estilo2"><?php ECHO $nombre_comercial;?></span></td>
<td height="21"> <span class="Estilo2"><?php ECHO $presentacion;?></span></td>
<td height="21"> <span class="Estilo2"><?php ECHO $drogas;?></span></td>
<td height="21"> <div align="center" class="Estilo5 Estilo19"><?php ECHO $lote;?></div></td>
<td height="21"> <div align="center" class="Estilo2"><?php ECHO $mes_lote;?> / <?php ECHO $anio_lote;?></div></td>
<td height="21"> <div align="center" class="Estilo2"><?php ECHO $nro_serie;?></div></td>
<td height="21"> <span class="Estilo2"><?php ECHO $gtin;?></span></td>
 <td height="21"> <span class="Estilo2"><?php ECHO $estado_droga;?></span></td>
 <td height="21"> <span class="Estilo2"><?php ECHO $documento;?></span></td>
  <td height="21"> <span class="Estilo2"><?php ECHO $nombre_completo;?></span></td>

</tr>





<?php 

$cuenta = "";
	

	$result->MoveNext();
	}


	?>

   
</table>




