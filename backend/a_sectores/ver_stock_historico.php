<?php 

include ("../conexiones/config_pro.php");




$sql1 = "select * from tr_stock where fecha < '2017-01-01'  order by cod_mercaderia, gtin";
$result11 = $db->Execute($sql1);

  $gtin10=$result11->fields["gtin"];

 
  
echo  $sql = "INSERT INTO `tr_stock_pru` ( `cod_mercaderia` , `fecha` , `cod_movimiento` , `tipo_fact` , `nro_comprobante` , `cantidad` , `precio_unitario` , `lote` ,  `mes_lote` , `anio_lote` , `cuenta` , `tipo_cuenta` ,  `cod_operacion`, `observaciones`, `documento`, `cod_droga`, `nro_os`, `gtin`, `transaccion`, `nro_serie` , `drogas` , `grupo`) VALUES ('$cod_mercaderia' , '$fecha' , '1' ,  'A' , '$nro_factura' , '1' , '$precio_unitario' , '$lote' , '$mes_lote', '$anio_lote' , '$proveedor' , '1' , '' , '', '' , '$cod_droga' , '' ,  '$gtin' , '$transaccion' , '$nro_serie' , '$drogas' , '$tipo')";
//mysql_query($sql);
echo "<br>"; 


}

 


   $result1->MoveNext();
	}


   $result->MoveNext();
	}

echo "<br>"; 
echo $cont;


*/
?>