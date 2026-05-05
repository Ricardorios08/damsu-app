<?php 

require('../../../drivers/fpdf/fpdf.php');
include ("../../../conexiones/config_pro.php");


$hoy=date("d/m/y");
$mes = 12;
$anio = 12;
$provee = "";


header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$a");


?>
<table width="918" border="1" cellpadding="0" cellspacing="0">
  <tr bgcolor="#FFBC79">
    <td width="8%"  bgcolor="#CCCCCC" scope="col"><div align="center"><span class="Estilo28 Estilo13 Estilo7">aCOD BARRA </span></div></td>

    <td width="36%"  bgcolor="#CCCCCC" scope="col"><div align="center" class="Estilo26 Estilo13 Estilo7">Descripcion / Mercaderia</div></td>
    <td width="23%" bgcolor="#CCCCCC" scope="col"><div align="center" class="Estilo28 Estilo13 Estilo7"> Droga </div></td>
    <td width="11%" bgcolor="#CCCCCC" scope="col"><div align="center" class="Estilo28 Estilo13 Estilo7"> Laboratorio </div></td>
    <td width="3%" bgcolor="#CCCCCC" class="Estilo28" scope="col"><div align="center" class="Estilo14">CANT</div></td>
    <td width="3%" bgcolor="#CCCCCC" class="Estilo28" scope="col"><div align="center" class="Estilo14"><span 
	class="Estilo13">UNI</span></div></td>
	<td width="3%" bgcolor="#CCCCCC" class="Estilo28" scope="col"><div align="center" class="Estilo14"><span 
	class="Estilo13">TOT</span></div></td>
  </tr>
  
  
  <?php 
if ($provee == 1){
$sql1="select * from tr_stock_temp_provisorio1 where mes = '$mes' and anio = '$anio' and cuenta = 110 order by drogas";
}else{
$sql1="select * from tr_stock_temp_provisorio1 where mes = '$mes' and anio = '$anio' order by drogas";
}
$result1 = $db->Execute($sql1);
 
  if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {

 
$fecha=strtoupper($result1->fields["fecha"]);
$cod_movimiento=strtoupper($result1->fields["cod_movimiento"]);
$tipo_fact=strtoupper($result1->fields["tipo_fact"]);
$nro_comprobante=strtoupper($result1->fields["nro_comprobante"]);

$precio_unitario=strtoupper($result1->fields["precio_unitario"]);
$lote=strtoupper($result1->fields["lote"]);
$mes_lote=strtoupper($result1->fields["mes_lote"]);
$anio_lote=strtoupper($result1->fields["anio_lote"]);
$cuenta=strtoupper($result1->fields["cuenta"]);
$tipo_cuenta=strtoupper($result1->fields["tipo_cuenta"]);
$observaciones=strtoupper($result1->fields["observaciones"]);
$documento=strtoupper($result1->fields["documento"]);
$cod_droga=strtoupper($result1->fields["cod_droga"]);
$nro_os=strtoupper($result1->fields["nro_os"]);
$gtin=strtoupper($result1->fields["gtin"]);
$transaccion=strtoupper($result1->fields["transaccion"]);
$nro_serie=strtoupper($result1->fields["nro_serie"]);
$drogas=strtoupper($result1->fields["drogas"]);
$grupo=strtoupper($result1->fields["grupo"]);
$laboratorio=strtoupper($result1->fields["laboratorio"]);
$anterior=strtoupper($result1->fields["anterior"]);
$cantidad=strtoupper($result1->fields["cantidad"]);
$salida=strtoupper($result1->fields["salida"]);
$cod_barra=strtoupper($result1->fields["cod_mercaderia"]);

$precio_anterior =strtoupper($result1->fields["precio_anterior"]);
$precio_ingreso=strtoupper($result1->fields["precio_ingreso"]);
$precio_egreso=strtoupper($result1->fields["precio_egreso"]);

$saldo = $precio_anterior + $precio_ingreso - $precio_egreso;

$suma_saldo = $suma_saldo + $saldo;
$suma_ingresos = $suma_ingresos + $precio_ingreso;
$suma_ingresos = $suma_ingresos + $precio_ingreso;
$suma_egresos = $suma_egresos + $precio_egreso;

$todo = $anterior + $cantidad - $salida;



  $sql="select * from laboratorios where cod_laboratorio = $laboratorio";
$result = $db->Execute($sql);
$laboratorio=strtoupper($result->fields["laboratorio"]);

$sql="select * from monodrogas_31122012 where cod_barra = $cod_barra";
$result = $db->Execute($sql);
$nombre_comercial=strtoupper($result->fields["nombre_comercial"]);
$presentacion=strtoupper($result->fields["presentacion"]);
$troquel=strtoupper($result->fields["troquel"]);
$cant_caja=strtoupper($result->fields["cant_caja"]);
$precio_actualizado=strtoupper($result->fields["precio_actualizado"]);

$sql="select * from inventario_agrupado where cod_mercaderia = $cod_barra";
$result = $db->Execute($sql);
$cantidad_agrupado=strtoupper($result->fields["saldo"]);



if ($laboratorio == ""){
$laboratorio = "UNICO";
}

if ($por == 1){
$nombre_comercial = $nombre_comercial;
}else
	  {
$nombre_comercial = $drogas;
	  }



if ($todo > 0){
$precio_uni = round($saldo / $todo,2);

$total_precio = $todo * $precio_actualizado;

//$precio_uni = round($saldo,2);

?><tr bgcolor="#FFFFFF" >
    <td bgcolor="#FFFFFF" onmouseover="cambiar_color_over(this)" onmouseout="cambiar_color_out(this)" scope="col"><span class="Estilo28 Estilo6 Estilo7"><?php echo $troquel;?></span></td>
   
    <td bgcolor="#FFFFFF" scope="col" onmouseover="cambiar_color_over(this)" onmouseout="cambiar_color_out(this)"><div align="left" class="Estilo13 Estilo7"><span class="Estilo28"><?php echo $nombre_comercial;?></span> <span class="Estilo14"><span class="Estilo26"><?php echo $presentacion;?></span></span></div></td>
    <td bgcolor="#FFFFFF" scope="col" onmouseover="cambiar_color_over(this)" onmouseout="cambiar_color_out(this)"><div align="center" class="Estilo14"><span class="Estilo26"><?php echo $cant_caja;?> </span></div></td>
    <td bgcolor="#FFFFFF" scope="col"><div align="center" class="Estilo14"><span class="Estilo28"><?php echo $laboratorio;?></span></div></td>
    <td width="3%" bgcolor="#FFFFFF" class="Estilo6" onmouseover="cambiar_color_over(this)" onmouseout="cambiar_color_out(this)"><div align="center" class="Estilo14">   <a href="borrar_item.php?cod_operacion=<?php print("$cod_operacion");?>"></a><span class="Estilo28"><?php echo $todo;?></span></div></td>
    <td width="3%" bgcolor="#FFFFFF" class="Estilo6" onmouseover="cambiar_color_over(this)" onmouseout="cambiar_color_out(this)"><div align="center" class="Estilo14"><span class="Estilo28"><?php echo $precio_actualizado;?></span></div></td>
	<td width="3%" bgcolor="#FFFFFF" class="Estilo6" onmouseover="cambiar_color_over(this)" onmouseout="cambiar_color_out(this)"><div align="center" class="Estilo14"><span class="Estilo28"><?php echo $total_precio;?></span></div></td>
  </tr>
<?php 



 

$cant = $cant+ $todo;
$contame = $contame + 1;

}


 





$result1->MoveNext();
	}

 





// 428-7755
