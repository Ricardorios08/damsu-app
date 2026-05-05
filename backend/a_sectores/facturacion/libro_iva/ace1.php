<?php $nro_factura;
$hoy = date("d/m/y");
?>
<style type="text/css">
<!--
.Estilo5 {font-family: Arial, Helvetica, sans-serif}
.Estilo65 {font-size: 12px}
.Estilo65 {font-family: Arial, Helvetica, sans-serif}
.Estilo20 {font-family: "Trebuchet MS"; font-size: 12px; }
.Estilo66 {font-family: "Trebuchet MS"}
-->
</style>

<?PHP

$periodo = $mes."-".$anio; 


$file = "COMPROBANTES_".$periodo;
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$file");
?>

   <!--DWLayoutTable-->


   

   
     <?php 

include ("../../../conexiones/config_pro.php");



$fecha_desde = $anio."-".$mes."-01"; 
$fecha_hasta =$anio."-".$mes."-31";



  ?>
  
  <table width="593" border="1" cellspacing="0">
   <!--DWLayoutTable-->
   
 
   <tr bgcolor="#FFFFFF">
    <td colspan="10" bgcolor="#B8B8B8"><div align="center">PERIODO:   <?php echo $periodo;?></div>    </tr>
   

	<?php


$sql="select * from tr_ventas_detalle where fecha BETWEEN '$fecha_desde' and '$fecha_hasta' and proveedor = 110 group by nro_factura order by nro_factura";
$result = $db->Execute($sql);

  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {


$nro_factura=strtoupper($result->fields["nro_factura"]);


$sql2="select * from tr_ventas_encabezado where nro_factura = $nro_factura";
$result2 = $db->Execute($sql2);

$fecha=strtoupper($result2->fields["fecha"]);
$neto=strtoupper($result2->fields["neto"]);

$dia = substr($fecha,8,2);
$mes= substr($fecha,5,2);
$anio = substr($fecha,0,4);

$fecha = $dia."/".$mes."/".$anio;

$cont = $cont + 1;


?>
 
     <td width="180"><div align="center"><?php echo $nro_factura;?></div></td>
  
       
<?php if ($cont == 10){?>
    
 </tr>

 <?php $cont = 0;

}

   

	$result->MoveNext();
	}

	$condicion = "";  

$cuit = "";
$tipo = "";


?>    
</table>
