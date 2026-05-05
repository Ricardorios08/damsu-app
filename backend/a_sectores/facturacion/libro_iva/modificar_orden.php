<style type="text/css">
<!--
.Estilo4 {font-family: Geneva, Arial, Helvetica, sans-serif}
-->
</style>
<form action="guardar_modificar.php" method="post"> 

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
-->
</style>

<table width="849" border="1" cellspacing="0">
<tr>
	<td width="238"><div align="center"><span class="Estilo3"><strong><?php echo $denominacion;?>
        </strong>
      </span>
    </div>
    <div align="center" class="Estilo3"></div></td>
	<td width="238"><div align="center"><span class="Estilo3"><strong><?php echo $nro_proveedor;?>
        </strong>
      </span>
    </div>
    <div align="center" class="Estilo3"></div></td>
	<td width="242"><div align="center"><span class="Estilo3"><strong><?php echo $comprobante;?>
        </strong>
      </span>
    </div>
    <div align="center" class="Estilo3"></div></td>
  </tr>
</table>
 
 
 <table width="850">
   <tr bgcolor="#FFFFFF">
     <td colspan="6">
       <div align="right">        </div></td>
     <td><div align="center">
       <input type="submit" name="Submit" value="Guardar">
     </div></td>
   </tr>
   <tr>
     <td height="27" bgcolor="#B8B8B8"><div align="center"><span class="Estilo3">CANT</span></div></td>
     <td bgcolor="#B8B8B8"><div align="center"><span class="Estilo3">DROGA</span></div></td>
     <td bgcolor="#B8B8B8"><div align="center"><span class="Estilo3">CODIGO</span></div></td>
     <td bgcolor="#B8B8B8"><div align="center"><span class="Estilo3">PRESENTACION</span></div></td>
     <td bgcolor="#B8B8B8"><div align="center"><span class="Estilo3">LOTE</span></div></td>
     <td bgcolor="#B8B8B8"><div align="center"><span class="Estilo3">MES</span></div></td>
     <td bgcolor="#B8B8B8"><div align="center"><span class="Estilo3">A&Ntilde;O</span></div></td>
   </tr>
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

//$pdf->SetX(60);


?>
   <tr>
     <td><div align="center"><span class="Estilo3"><?php echo $cantidad;?></span></div></td>
     <td><div align="center"><span class="Estilo3"><?php echo $droga;?></span></div></td>
     <td><div align="center"><span class="Estilo3">  <input name="<?php echo cod_mercaderia.$cod_detalle;?>"  type="text" id="lote" value="<?php echo $cod_mercaderia;?>" size="10"></span></div></td>
     <td><div align="center"><span class="Estilo3"><?php echo $presentacion;?></span></div></td>
     <td><div align="center"><span class="Estilo3">
       <input name="<?php echo lote.$cod_detalle;?>"  type="text" id="lote" value="<?php echo $lote1;?>" size="20">
     </span></div></td>
     <td><div align="center"><span class="Estilo3">
       <input name="<?php echo mes.$cod_detalle;?>" type="text" id="mes" value="<?php echo $mes_lote;?>" size="4" maxlength="2">
     </span></div></td>
     <td><div align="center"><span class="Estilo3">
       <input name="<?php echo anio.$cod_detalle;?>"  type="text" id="anio" value="<?php echo $anio_lote;?>" size="4" maxlength="4">
     </span></div></td>
   </tr>
   <?php
 


$subtotal = $subtotal + $precio_unitario;

 
 



//$contame = $contame + 1;




	 $result3->MoveNext();

				}

 

 $sumatoria = $cont;
		$cont = 0;


$sumatoria = 0;




?>

 <input name="nro_factura"  type="hidden" value="<?php echo $nro_factura;?>">
 </table>
</form>