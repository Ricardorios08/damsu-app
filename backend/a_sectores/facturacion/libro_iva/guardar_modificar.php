<?php 
include ("../../../conexiones/config_pro.php");

$hoy=date("d/m/y");
$nro_factura= $_REQUEST['nro_factura'];

$hoja = "A4";

$sql = "SELECT * FROM compras_encabezado where nro_factura = $nro_factura";
$result = $db->Execute($sql);

$tipo_fact=001;
$nro_factura=$result->fields["nro_factura"];
$comprobante=$result->fields["comprobante"];

$fecha=$result->fields["fecha"];
 
$nro_fact = str_pad($nro_factura, 10, "0", STR_PAD_LEFT);

 $dia= substr($fecha,8,2);
$mes= substr($fecha,5,2);
$anio= substr($fecha,0,4);

$fecha= $dia."/".$mes."/".$anio;

 $nro_receta=$result->fields["nro_receta"];
 $nro_proveedor=$result->fields["nro_proveedor"];
 $tipo_doc=$result->fields["tipo_doc"];
 $plan_completo=$result->fields["plan_completo"];
 $operador=$result->fields["operador"];
 $denominacion=$result->fields["denominacion"];
 $fecha=$result->fields["fecha"];
 $forma_pago=$result->fields["forma_pago"];
 $porc_dto=$result->fields["porc_dto"];
 $nombre_operador=$result->fields["nombre_operador"];
 $neto=$result->fields["neto"];
  $tipo_factura=$result->fields["tipo_factura"];
    $observaciones=$result->fields["observaciones"];
 $cod_movimiento=$result->fields["cod_movimiento"];


 $total=$result->fields["total"];


$tipo_comprobante = "COMPRAS";

 


 $sql1="select * from proveedores where cod_proveedor = $nro_proveedor";
$result1 = $db->Execute($sql1);
$denominacion=strtoupper($result1->fields["denominacion"]);
 
 
 

?>
<style type="text/css">
<!--
.Estilo3 {font-family: Geneva, Arial, Helvetica, sans-serif; font-size: 12px; }
.Estilo4 {
	font-size: 18px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
}
-->
</style>

<table width="849" border="1" cellspacing="0">
<tr bgcolor="#B8B8B8">
  <td width="718" colspan="3"><div align="center" class="Estilo4">MODIFICADO</div></td>
  </tr>
</table>
 
 
   <?php
 


 $sql3 = "SELECT * FROM `compras_detalle`  WHERE  nro_factura = $nro_factura order by  cod_detalle desc";
$result3 = $db->Execute($sql3);

if (!$result3) die("fallo".$db->ErrorMsg());

 while (!$result3->EOF) {
$renglon = $renglon + 1;


 $cod_mer = $cod_merca;


  $cod_mercaderia=strtoupper($result3->fields["cod_mercaderia"]);
$cod_merca=strtoupper($result3->fields["cod_mercaderia"]);


if ($cod_mer == ""){
$cod_mer = $cod_merca;
}


 $cantidad=strtoupper($result3->fields["cantidad"]);
$proveedor=strtoupper($result3->fields["proveedor"]);
$presentacion=strtoupper($result3->fields["presentacion"]);
$descripcion=strtoupper($result3->fields["descripcion"]);
$cod_detalle=strtoupper($result3->fields["cod_detalle"]);
$gtin = $result3->fields["gtin"];
$resultado= $result3->fields["resultado"];
$transaccion= $result3->fields["transaccion"];


$lote_guardado=strtoupper($result3->fields["lote"]);
$mes_guardado=strtoupper($result3->fields["mes_lote"]);
$anio_guardado=strtoupper($result3->fields["anio_lote"]);


$vto_lote = $mes_lote."/".$anio_lote;

$gtin=strtoupper($result3->fields["gtin"]);
$precio_unitario=strtoupper($result3->fields["precio_unitario"]);

$sql = "SELECT * FROM `monodrogas`  WHERE  `cod_barra` = '$cod_mercaderia' or troquel = $cod_mercaderia";
$result = $db->Execute($sql);
$cod_mercaderia=strtoupper($result->fields["troquel"]);
$presentacion=strtoupper($result->fields["presentacion"]);
$nombre_comercial=strtoupper($result->fields["nombre_comercial"]);
$cod_droga=strtoupper($result->fields["cod_droga"]);
$laboratorio=strtoupper($result->fields["laboratorio"]);


if (is_numeric ($laboratorio)) { 
$sql = "SELECT * FROM laboratorios  WHERE  cod_laboratorio = '$laboratorio' ";
$result = $db->Execute($sql);
$laboratorio=strtoupper($result->fields["laboratorio"]);
} 


$sql = "SELECT * FROM `drogas`  WHERE  cod_droga = '$cod_droga' ";
$result = $db->Execute($sql);
$droga=strtoupper($result->fields["droga"]);

$nombre_remedio = $droga."  ".$presentacion;

$cont = $cont + 1;

$precio_unitario = str_pad($precio_unitario, 12, " ", STR_PAD_LEFT); 

//$pdf->SetX(60);

 
  $cod_mercaderia=$_POST[cod_mercaderia.$cod_detalle];
  $lote=$_POST[lote.$cod_detalle];
  $mes=$_POST[mes.$cod_detalle];
  $anio=$_POST[anio.$cod_detalle];


  $sql5 = "UPDATE existencias SET `lote` = '$lote' , `mes_lote` = '$mes' ,  `anio_lote` = '$anio'  WHERE `cod_mercaderia` =$cod_mercaderia  AND `lote` LIKE '$lote_guardado' and `mes_lote` LIKE '$mes_guardado' and `anio_lote` LIKE '$anio_guardado'";
 $result5 = $db->Execute($sql5);
 
  $sql5 = "UPDATE compras_detalle SET `lote` = '$lote' , `mes_lote` = '$mes' ,  `anio_lote` = '$anio'  WHERE `cod_mercaderia` =$cod_mercaderia  AND `lote` LIKE '$lote_guardado' and `mes_lote` LIKE '$mes_guardado' and `anio_lote` LIKE '$anio_guardado'";
$result5 = $db->Execute($sql5);
 
  $sql5 = "UPDATE stock SET `lote` = '$lote' , `mes_lote` = '$mes'  ,  `anio_lote` = '$anio'  WHERE `cod_mercaderia` =$cod_mercaderia  AND `lote` LIKE '$lote_guardado' and `mes_lote` LIKE '$mes_guardado' and `anio_lote` LIKE '$anio_guardado'";
$result5 = $db->Execute($sql5);
 

$subtotal = $subtotal + $precio_unitario;

 
 



//$contame = $contame + 1;




	 $result3->MoveNext();

				}

 

 $sumatoria = $cont;
		$cont = 0;


$sumatoria = 0;

?>
 </table>
