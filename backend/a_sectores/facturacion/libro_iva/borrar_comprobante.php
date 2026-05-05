 <table width="800" border="1" cellspacing="0">
 <tr bgcolor="#B8B8B8">
	<td width="65"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">CANT</font></div></td>
	<td width="127"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">COD DROGA</font></div></td>
	<td width="178"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">DROGA</font></div></td>
	<td width="54"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">LOTE</font></div></td>
	 <td width="30"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">VTO</font></div></td>
	 <td width="99"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">COD RENGLON</font></div></td>
	<td width="92"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">UNIT</font></div></td>
	<td width="119"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">TOTAL</font></div></td>
	
 </tr>
 
 <?php

Echo "COMPROBANTE ELIMINADO";
echo "<br>";
include("../../../conexiones/config_pro.php");
include ("../../../conexiones/usuario_compra.php");


$nro_factura= $_REQUEST['nro_factura'];
$contra = $_REQUEST['contra'];

 if ($contra == 123){
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


$lote1=strtoupper($result3->fields["lote"]);
$mes_lote=strtoupper($result3->fields["mes_lote"]);
$anio_lote=strtoupper($result3->fields["anio_lote"]);
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


 $tot_prod = $precio_unitario * $cantidad;

//$pdf->SetX(160);
 IF ($tot_prod > 0){
	 $tot_prod = number_format($tot_prod,2);
}


 $sql = "SELECT * FROM existencias  WHERE  cod_mercaderia = '$cod_mercaderia' and lote = '$lote1' and mes_lote = '$mes_lote' and anio_lote = '$anio_lote' ";
$result = $db->Execute($sql);
$existencia_anterior=strtoupper($result->fields["cantidad_ingresada"]);

$exis = $existencia_anterior - $cantidad;

 $sql = "UPDATE `existencias` SET `cantidad_ingresada` = '$exis' WHERE  cod_mercaderia = '$cod_mercaderia' and  lote = '$lote1' and mes_lote = '$mes_lote' and anio_lote = '$anio_lote' limit 1";
$result = $db->Execute($sql);



  $sql = "delete FROM compras_detalle  WHERE  nro_factura = '$nro_factura' and cod_mercaderia = '$cod_mercaderia' and lote = '$lote1' and mes_lote = '$mes_lote' and anio_lote = '$anio_lote' LIMIT 1 ";
$result = $db->Execute($sql);


  $sql = "delete FROM stock  WHERE  nro_comprobante = '$nro_factura' and cod_mercaderia = '$cod_mercaderia' and lote = '$lote1' and mes_lote = '$mes_lote' and anio_lote = '$anio_lote' and cod_movimiento = 3 LIMIT 1 ";
$result = $db->Execute($sql);

?>
 <tr>
	<td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $cantidad;?>
    </font>
    <div align="center"></div></td>
	<td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $cod_droga;?>
    </font>
    <div align="center"></div></td>
	<td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $droga;?>
    </font>
    <div align="center"></div></td>
	<td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $lote1;?>
    </font>
    <div align="center"></div></td>
	<td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $vto_lote;?>
    </font>
    <div align="center"></div></td>
	<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $cod_detalle;?>
        </font>
    </div>
    <div align="center"></div></td>
	<td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $precio_unitario;?>
      </font>
    </div>
    <div align="center"></div></td>
	<td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $tot_prod;?>
      </font>
    </div>
    <div align="center"></div></td>
 </tr>


<?PHP

 $result3->MoveNext();

				}
 

 $sumatoria = $cont;
		$cont = 0;


$sumatoria = 0; 


   $sql = "UPDATE `compras_encabezado` SET `nro_proveedor` = '1' , `total` = '0'  WHERE `nro_factura` = '$nro_factura'  limit 1";
$result = $db->Execute($sql);


?></table>



<?}?>

