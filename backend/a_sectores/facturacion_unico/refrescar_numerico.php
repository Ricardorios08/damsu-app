<?php 
$busca == "SI";

include("../../conexiones/config_pro.php");

/*if ($cod_mercaderia == ""){
$sql = "SELECT monodrogas.*,existencias.* FROM monodrogas,existencias where cantidad_ingresada - cantidad_salida > 0 and monodrogas.cod_barra = existencias.cod_mercaderia order by cod_droga"; 
}
else
{
   $sql = "SELECT monodrogas.*,existencias.* FROM monodrogas,existencias where ((cantidad_ingresada - cantidad_salida > 0 and  troquel like '$cod_mercaderia%' and monodrogas.cod_barra = existencias.cod_mercaderia) or (cantidad_ingresada - cantidad_salida > 0 and  nombre_comercial like '$cod_mercaderia%' and monodrogas.cod_barra = existencias.cod_mercaderia)) order by cantidad_salida desc";
}*/



if ($cod_mercaderia == ""){
exit;
}
else
{
 $sql = "SELECT * FROM existencias where cantidad_ingresada - cantidad_salida > 0 and cod_mercaderia = $cod_mercaderia";
}


$result = $db->Execute($sql);

if (!$result) die("fallo".$db->ErrorMsg());

 while (!$result->EOF) {

$cod_detalle=strtoupper($result->fields["cod_detalle"]);
$descripcion=strtoupper($result->fields["nombre_comercial"]);
$cod_merca=strtoupper($result->fields["cod_mercaderia"]);
$precio_actualizado=strtoupper($result->fields["precio_actualizado"]);
$proveedor=strtoupper($result->fields["proveedor"]);

$cod_detalle=strtoupper($result->fields["cod_detalle"]);
$lote=strtoupper($result->fields["lote"]);
$mes_lote=strtoupper($result->fields["mes_lote"]);
$anio_lote=strtoupper($result->fields["anio_lote"]);
$precio_actualizado=$result->fields["precio_unitario"];

$cantidad_ingresada=$result->fields["cantidad_ingresada"];
$cantidad_salida=$result->fields["cantidad_salida"];

$nro_proveedor=strtoupper($result->fields["proveedor"]);


$sql5="select * from stock where cod_mercaderia = $cod_mercaderia and cod_movimiento = 3 and lote = '$lote' and mes_lote = '$mes_lote' and anio_lote = '$anio_lote'";
$result5 = $db->Execute($sql5);
 

  $nro_comprobante=strtoupper($result5->fields["nro_comprobante"]);
 



$sql5="select * from proveedores where cod_proveedor = $nro_proveedor";
$result5 = $db->Execute($sql5);
$proveedor=strtoupper($result5->fields["denominacion"]);


$sql = "SELECT * FROM `monodrogas`  WHERE  `cod_barra` = '$cod_mercaderia'";
$result5 = $db->Execute($sql);
$nombre_comercial=strtoupper($result5->fields["nombre_comercial"]);
$presentacion=strtoupper($result5->fields["presentacion"]);

 
/*
 $sql1 = "select sum(cantidad_ingresada) - sum( cantidad_salida) as existen from existencias where cod_mercaderia = $cod_merca order by cod_mercaderia ";
$result1 = $db->Execute($sql1);
$existen=strtoupper($result1->fields["existen"]);

if ($existen > 0){
 $sql1="select * from existencias where cod_mercaderia like '$cod_merca'  order by cod_mercaderia, rand()";
$result1 = $db->Execute($sql1);


$cod_merquita=strtoupper($result1->fields["cod_mercaderia"]);
$lote=strtoupper($result1->fields["lote"]);

$mes_lote=strtoupper($result1->fields["mes_lote"]);
$anio_lote=strtoupper($result1->fields["anio_lote"]);
$precio_actualizado=$result1->fields["precio_unitario"];



$nro_proveedor=strtoupper($result1->fields["proveedor"]);
$sql5="select * from proveedores where cod_proveedor = $nro_proveedor";
$result5 = $db->Execute($sql5);
$proveedor=strtoupper($result5->fields["denominacion"]);



$sql18 = "SELECT SUM(cantidad_ingresada) as cant FROM existencias  WHERE  `cod_mercaderia` = '$cod_merquita' and lote = '$lote' and mes_lote = '$mes_lote' and anio_lote = '$anio_lote'";
$result18 = $db->Execute($sql18);
$cantidad_ingresada=strtoupper($result18->fields["cant"]);

$sql18 = "SELECT SUM(cantidad_salida) as salid FROM existencias  WHERE  `cod_mercaderia` = '$cod_merquita' and lote = '$lote' and mes_lote = '$mes_lote' and anio_lote = '$anio_lote'";
$result18 = $db->Execute($sql18);
$cantidad_salida=strtoupper($result18->fields["salid"]);

*/

$vto_lote=$mes_lote."/".$anio_lote;



$cantidad_existente = $cantidad_ingresada - $cantidad_salida;

$precio_actualizado = number_format($precio_actualizado,2);
$contar = $contar + 1;


			?>
    <td height="20" bgcolor="#E6E6E6" class="Estilo61" scope="col"><div align="center"><a href="entrada_factura_4.php?documento=<?php print("$documento");?>&&cod_detalle=<?php print("$cod_detalle");?>&&cod_mercaderia=<?php print("$cod_merca");?>&&operador=<?php print("$operador");?>&&matricula=<?php print("$matricula");?>&&matricula1=<?php print("$matricula");?>&&nro_factura=<?php print("$nro_factura");?>&&dia=<?php print("$dia");?>&&mes=<?php print("$mes");?>&&anio=<?php print("$anio");?>&&producto=<?php print("$descripcion");?>&&nro_os[]=<?php print("$nro_os");?>&&cod_merquita=<?php print("$cod_merquita");?>&&cantidad_existente=<?php print("$cantidad_existente");?>&&cod_merca=<?php print("$cod_merca");?>&&pasada=1&&no_hacer_nada=<?php print("$no_hacer_nada");?>"><?php print("$cod_merca");?>
    
	</a></span>
</div>
    </div></td>
    <td bgcolor="#E6E6E6" scope="col"><span class="Estilo60"><?php echo $nombre_comercial;?></span></td>
    <td bgcolor="#E6E6E6" scope="col"><div align="center" class="Estilo60"><?php echo $presentacion;?></div></td>
    <td bgcolor="#E6E6E6" scope="col"><div align="center" class="Estilo60"><?php echo $lote;?>
</div>
    <div align="center" class="Estilo60"></div></td>
    <td bgcolor="#E6E6E6" scope="col"><div align="center" class="Estilo60"><?php echo $vto_lote;?>
</div>
    <div align="center" class="Estilo60"></div></td>
    <td bgcolor="#E6E6E6" scope="col"><div align="center" class="Estilo60"><?php echo $cantidad_existente;?>
</div>
    <div align="center" class="Estilo60"></div></td>
    <td bgcolor="#E6E6E6" scope="col"><div align="center"><span class="Estilo60">$ <?php echo $precio_actualizado;?></span></div></td>
		 <td bgcolor="#E6E6E6" scope="col"><div align="center" class="Estilo60"><?php echo $nro_comprobante;?> </tr>

<?php 
   $result->MoveNext();
				}
				

 
 
	?>	
</table>


