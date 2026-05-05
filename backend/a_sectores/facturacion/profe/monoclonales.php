<style type="text/css">
<!--
.Estilo2 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.Estilo5 {font-size: 12px}
.Estilo75 {
	font-family: "Trebuchet MS";
	font-size: 12px;
}
.Estilo76 {
	font-size: 36px;
	font-weight: bold;
}
-->
</style>
 



<body onUnload="window.opener.openedImprimir=0;" onLoad="window.print(); window.close(); cerrar()"> 



<?php 


include ("../../../conexiones/config_pro.php");


/// rutina para agregar la fecha al detalle cuando no lo ha guardado en la factura. 16-12-2014
/*
echo  $sql1 = "select * from tr_ventas_detalle where fecha like '0000-00-00' group by nro_factura";
$result1 = $db->Execute($sql1);

 

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  
$documento=$result1->fields["documento"];
$nro_factura=$result1->fields["nro_factura"];

  $sql11 = "select * from tr_ventas_encabezado where nro_factura = '$nro_factura' group by nro_factura";
$result11 = $db->Execute($sql11);
$fecha=$result11->fields["fecha"];

 echo $sql = "UPDATE tr_ventas_detalle SET fecha = '$fecha' WHERE nro_factura = '$nro_factura'";
//$result = $db->Execute($sql);

echo "<br>";


//
$cont = $cont + 1;

   $result1->MoveNext();
	}


*/


// rutina para agregar obra social profe en el detalle

/*
 $sql1 = "select * from tr_ventas_encabezado where nro_os = 10 and fecha > '2014-11-30'";
$result1 = $db->Execute($sql1);

 

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  
$documento=$result1->fields["documento"];
$nro_factura=$result1->fields["nro_factura"];

 
 echo  $sql = "UPDATE tr_ventas_detalle SET nro_os = '10' WHERE nro_factura = '$nro_factura'";
$result = $db->Execute($sql);

echo "<br>";


//echo "<br>";
$cont = $cont + 1;

   $result1->MoveNext();
	}





 $sql1 = "select * from tr_ventas_encabezado where fecha > '2014-10-01'";
$result1 = $db->Execute($sql1);

 

 if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  
$documento=$result1->fields["documento"];
$nro_factura=$result1->fields["nro_factura"];

   $sql11 = "select * from tr_ventas_detalle where nro_factura = '$nro_factura' limit 1";
$result11 = $db->Execute($sql11);
$nro_fac=$result11->fields["nro_factura"];

if ($nro_fac == ""){
echo $nro_factura;
echo "<br>";
}

$cont = $cont + 1;

   $result1->MoveNext();
	}
exit;
*/

$nro_factura;




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



<table width="1098" height="206" border="1" cellspacing="0">
  <!--DWLayoutTable-->
  <tr valign="middle" bgcolor="#000099">
    <td height="26" colspan="8" bgcolor="#CCCCCC"><div align="center" class="Estilo75">CONSUMO POR PACIENTE</div></td>
  </tr>
  <tr valign="middle" bgcolor="#000099">
    <td height="26" colspan="8" bgcolor="#FFFFFF" >
      <div align="center" class="Estilo76">PROFE NO MONOCLONALES <?php ECHO $fecha_a;?></div>
      </div></td>
  </tr>
   <tr bgcolor="#DAFAFC">
     <td width="46" height="21" bgcolor="#B8B8B8"><div align="center"><span class="Estilo2">Fecha</span>
     </div>
     <td width="91" bgcolor="#B8B8B8"><div align="center"><span class="Estilo2">Comprobante</span></span></div></td>
     <!-- <td width="5%"><div align="center"><span class="Estilo6 Estilo2  Estilo5">Proveedor</span></div></td> -->
<td colspan="2" bgcolor="#B8B8B8" ><div align="center"><span class="Estilo2">Paciente</span></span></div></td>
<td width="74" bgcolor="#B8B8B8" ><div align="center"><span class="Estilo2">Documento</span></div></td>
<td width="273" bgcolor="#B8B8B8" ><div align="center"><span class="Estilo2">Comercial</span></div></td>
   <td width="275" bgcolor="#B8B8B8" ><div align="center"><span class="Estilo2">Droga</span></div></td>
   <td width="79" bgcolor="#B8B8B8" ><div align="center"><span class="Estilo2">TOTAL</span></div></td>
   </tr>
   
   

	 <?php 


 $sql="select * from tr_ventas_detalle where fecha between '$fecha_desde' and '$fecha_hasta' and nro_os = 10   ORDER by nro_factura, fecha desc";
$result = $db->Execute($sql);

  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

$cuent = $cuenta;


 $nro_factura=strtoupper($result->fields["nro_factura"]);
 $cod_mercaderia=strtoupper($result->fields["cod_mercaderia"]);
  $cantidad=strtoupper($result->fields["cantidad"]);
 $precio_unitario=strtoupper($result->fields["precio_unitario"]);
$neto = $cantidad * $precio_unitario;


$sql8 = "SELECT * FROM monodrogas where cod_barra = $cod_mercaderia";
$result8 = $db->Execute($sql8);
$nombre_comercial=$result8->fields["nombre_comercial"];
$cod_droga=$result8->fields["cod_droga"];


$sql11 = "SELECT *  FROM drogas WHERE cod_droga LIKE '$cod_droga'";
$result11 = $db->Execute($sql11);
 $droga=$result11->fields["droga"];

 $sql11 = "SELECT *  FROM drogas_profe WHERE cod_droga LIKE '$cod_droga'";
$result11 = $db->Execute($sql11);
 $drogas_profe=$result11->fields["cod_droga"];


 $sql3="select * from tr_ventas_encabezado where  nro_factura = '$nro_factura'";
$result3 = $db->Execute($sql3);

$cuenta=strtoupper($result3->fields["documento"]);

 $cod_movimiento=strtoupper($result3->fields["cod_movimiento"]);
$forma_pago=strtoupper($result3->fields["forma_pago"]);
$nro_factura=strtoupper($result3->fields["nro_factura"]);

$denominacion=strtoupper($result3->fields["denominacion"]);
$tipo_fact=strtoupper($result3->fields["tipo_fact"]);

$fecha=strtoupper($result3->fields["fecha"]);
$descuento=strtoupper($result3->fields["descuento"]);

$bonificacion=strtoupper($result3->fields["bonificacion"]);
$subtotal=strtoupper($result3->fields["subtotal"]);
$iva=strtoupper($result3->fields["iva"]);
$total=strtoupper($result3->fields["total"]);
$periodo=strtoupper($result3->fields["periodo"]);
$anio=strtoupper($result3->fields["anio"]);
$nro_receta=strtoupper($result3->fields["nro_receta"]);


$documento=strtoupper($result3->fields["documento"]);



$dia = substr($fecha,8,2);
$mes= substr($fecha,5,2);
$anio = substr($fecha,0,4);

$fecha = $dia."/".$mes."/".$anio;





SWITCH ($cod_movimiento){

case "1":{
$entrada = $precio_renglon;
$movimiento = "N/Entrega";
BREAK;
}

case "2":{
$entrada = $precio_renglon;
$movimiento = "NOTA DE DEBITO";
BREAK;
}

case "3":{
$salida = $precio_renglon;
$movimiento = "DEV. PO";


BREAK;
}

case "4":{
$salida = $precio_renglon;
$movimiento = "PAGO POR CAJA";
BREAK;
}


CASE "5":{
$salida = $precio_renglon;
$movimiento = "DESC X LIQUIDACION";
BREAK;
}

CASE "6":{
$salida = ($precio_renglon * -1);
$movimiento = "ANULADA";
BREAK;
}

}







if ($drogas_profe == ""){

	if ($cod_movimiento == 3){
		$total_total = $total_total - $neto;
		}else{
$total_total = $total_total + $neto;
	}



$cant = $cant + 1;
?>
<tr>
  <td height="21"><div align="center" class="Estilo70"><?php print("$fecha");?></div></td>
<td><div align="center" class="Estilo5"> <?php print("$nro_factura");?></div></td>
<td colspan="2"><div align="center" class="Estilo5"> <div align="left"><?php print("$denominacion"); IF ($cod_movimiento == 3){echo " (".$movimiento.")";}?></div>
</div>    </td>



<td><div align="center" class="Estilo75"><?php print("$cuenta");?></div></td>
<td><span class="Estilo70"><?php print("$nombre_comercial");?></span></td>
<td><span class="Estilo70"><?php print("$droga");?></span></td>
<td>

<?php if ($cod_movimiento == 3){?>
  <div align="right">(<?php echo $neto;?>)</div>
  <div align="right"></div></td>
</tr>
<?php } else {?>
  <div align="right"><?php echo $neto;?></div>
  <div align="right"></div></td>
</tr>

<?php

}

}

$cuenta = "";
$drogas_profe = "";
	

	$result->MoveNext();
	}


 


	?>

   <tr>
  <td height="21" colspan="2" bgcolor="#B8B8B8"><span class="Estilo75">
      Cant. Comprobantes: <?php echo $cant;?> 
  </span></td>
  <td height="21" colspan="2" bgcolor="#B8B8B8"><span class="Estilo75"></span></td>
  <td height="21" colspan="4" bgcolor="#B8B8B8"><div align="right"><span class="Estilo75">TOTAL CONSUMO $ </span>    <span class="Estilo75"><?php echo number_format($total_total,2);?></span></div></td>
  </tr>
</table>




