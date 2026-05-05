<?php 

echo "factura_pap1.php";
include ("../../../conexiones/config_pro.php");
//$nro_factura= $_REQUEST['nro_factura'];
$operador= $_REQUEST['operador1'];



$dia= $_REQUEST['dia'];
$mes= $_REQUEST['mes'];
$anio= $_REQUEST['anio'];

$fecha= $anio.$mes.$dia;
$producto= $_REQUEST['producto'];
$cod_merquita= $_REQUEST['cod_merquita'];
$cod_proveedor= $_REQUEST['cod_proveedor'];




$sql="select * from usuario where id = '$operador'";
$result = $db->Execute($sql);
$nombre_operador=strtoupper($result->fields["usuario"]); 



$tipo_fact = "x";


$sql = "SELECT * FROM `ventas1_encab_temp`  WHERE  operador = '$operador'";
$result3 = $db->Execute($sql);
$nro_factura=strtoupper($result3->fields["nro_factura"]);
$fecha=strtoupper($result3->fields["fecha"]);
$documento=strtoupper($result3->fields["nro_cuenta"]);



$nro_o=$_REQUEST["nro_os"];
	for ($i=0;$i<count($nro_o);$i++)    
	{     
	$nro_os = $nro_o[$i];    
	}

$sql = "SELECT * FROM `afiliaciones` where nro_os = $nro_os and documento = $documento order  by documento";
$result = $db->Execute($sql);

$nombre_os=strtoupper($result->fields["nombre_os"]);
$nro_afiliado=$result->fields["nro_afiliado"];



$cantidad_existente= $_REQUEST['cantidad_existente'];
$porc_dto= $_REQUEST['porc_dto'];
$tipo_do=$_REQUEST["tipo_doc"];
	for ($i=0;$i<count($tipo_do);$i++)    
	{     
	$tipo_doc = $tipo_do[$i];    
	}





$sql7="select * from pacientes where documento like '$documento'";
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

$sql="select * from paciente_diagnostico where documento = '$documento'";
$result = $db->Execute($sql);
$cod_diagnostico=strtoupper($result->fields["cod_diagnostico"]); 


$sql="select * from diagnostico where nro_diagnostico = '$cod_diagnostico'";
$result = $db->Execute($sql);
$nombre_diagnostico=strtoupper($result->fields["nombre_diagnostico"]); 









$sql = "SELECT * FROM `ventas1_deta_temp`  WHERE  `nro_factura` = $nro_factura and tipo_fact = '$tipo_fact'";
$result = $db->Execute($sql);
if (!$result) die("fallo".$db->ErrorMsg());

 while (!$result->EOF) {

$cod_mercaderia=strtoupper($result->fields["cod_mercaderia"]);
$cantidad=strtoupper($result->fields["cantidad"]);
//$precio_actualizado=strtoupper($result->fields["precio_unitario"]);
$lote=strtoupper($result->fields["lote"]);

$mes_lote=strtoupper($result->fields["mes_lote"]);
$anio_lote=strtoupper($result->fields["anio_lote"]);
$proveedor=strtoupper($result->fields["proveedor"]);


///////////////////////////////////

$sql = "SELECT * FROM monodrogas  WHERE  troquel = $cod_mercaderia";
$result5 = $db->Execute($sql);
$nombre_comercial=strtoupper($result5->fields["nombre_comercial"]);
$presentacion=strtoupper($result5->fields["presentacion"]);
$cod_droga=strtoupper($result5->fields["cod_droga"]);


//$precio_actualizado=strtoupper($result5->fields["precio_actualizado"]);


$id_tasa=strtoupper($result5->fields["id_tasa"]);



$sql3="select * from existencias where cod_mercaderia = $cod_mercaderia and lote = '$lote' and mes_lote = '$mes_lote' and anio_lote = '$anio_lote' ";
$result3 = $db->Execute($sql3);
$nro_fact_compra=strtoupper($result3->fields["nro_factura"]);
$cantidad_ingresada=strtoupper($result3->fields["cantidad_ingresada"]);
$cantidad_salida=strtoupper($result3->fields["cantidad_salida"]);
$precio_actualizado=strtoupper($result3->fields["precio_unitario"]);

$sql3="select * from tasas where cod_tasa = $id_tasa";
$result3 = $db->Execute($sql3);
$iva_normal=strtoupper($result3->fields["iva_normal"]);


$margendif = 0;


$porce_margendif = (($precio_actualizado * $margendif) /100);
$precio_actualizado = $precio_actualizado + $porce_margendif;




$cod_detalle=strtoupper($result3->fields["cod_detalle"]);
$cantidad_vendida = $cantidad_ingresada - $cantidad;
$cantidad_a_guardar = $cantidad + $cantidad_salida;


$total = round($precio_actualizado * $cantidad,2);




echo $sql = "UPDATE `existencias` SET `cantidad_salida` = '$cantidad_a_guardar' WHERE cod_mercaderia = $cod_mercaderia and mes_lote = '$mes_lote' and anio_lote = '$anio_lote' and lote = '$lote'";
mysql_query($sql);

 echo $sql = "INSERT INTO `stock` ( `cod_mercaderia` , `fecha` ,  `tipo_fact` , `cod_movimiento` , `nro_comprobante` , `cantidad` , `precio_unitario` , `lote` , `mes_lote` , `anio_lote` , `cuenta` ,  `tipo_cuenta` , `cod_operacion`  , `observaciones`  , `documento` , `cod_droga` ) VALUES ('$cod_mercaderia' , '$fecha' , '$tipo_fact' , '6' , '$nro_factura' , '$cantidad' , '$precio_actualizado' , '$lote' , '$mes_lote' , '$anio_lote' , '$proveedor' ,  '$tipo_doc' , '' , '' , '$documento' , '$cod_droga')" ;
mysql_query($sql);


echo $sql = "INSERT INTO `ventas_detalle` ( `nro_factura` , `cod_detalle` , `cod_mercaderia` , `descripcion` , `presentacion` , `lote` , `mes_lote` , `anio_lote` , `cantidad` , `precio_unitario` , `total` , `tipo_fact` , `nro_documento`  )  VALUES ('$nro_factura' , '' ,'$cod_mercaderia' , '$descripcion', '$presentacion' , '$lote' , '$mes_lote' , '$anio_lote' , '$cantidad' , '$precio_actualizado' , '$total' , '$tipo_fact' ,  '$documento' )";
mysql_query($sql);

 $result->MoveNext();
		}


$sql = "INSERT INTO `ventas_encabezado` ( `tipo_fact` , `nro_factura` , `cod_operacion` , `tipo` , `nro_cliente` , `nro_cuenta` , `plan` , `operador` , `denominacion` , `fecha` , `bruto` , `descuento` , `iva` , `retencion` , `neto` , `forma_pago` ) VALUES ( '$tipo_fact' , '$nro_factura' , '1' , '' , '$documento' , '$documento' , '' , '$operador' , '$nombre_completo' , '$fecha' , '$total' ,  '' , '' , '' , '$total' , '' )";
mysql_query($sql);



 $sumatoria = $cont;
		$cont = 0;

$desc_factura1= 0;
$subtotal= 0;

$total_factura = 0;
$neto = 0;
$iva = 0;
 
$sql = "TRUNCATE TABLE ventas1_deta_temp and operador = $operador";
mysql_query($sql);
$sql = "TRUNCATE TABLE ventas1_encab_temp and operador = $operador";
mysql_query($sql);

$total_factura = 0;
$neto = 0;
$iva = 0;

$leyenda  = "SE ACTUALIZO EL STOCK, EXISTENCIA Y FACTURA DE VENTA";
include ("../../../alertas/campo_informacion.php");


?>