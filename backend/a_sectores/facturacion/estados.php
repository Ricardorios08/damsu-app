<?php 
 
include ("../../conexiones/config_pro.php");

$nro_factura= $_REQUEST['nro_factura'];
$documento= $_REQUEST['documento'];
$Submit= $_REQUEST['Submit'];


if ($Submit == "GUARDAR"){
$hoy=date("d/m/y");

$sql = "SELECT * FROM `tr_ventas_encabezado` where nro_factura = $nro_factura";
$result = $db->Execute($sql);

$tipo_fact=$result->fields["tipo_fact"];
$nro_factura=$result->fields["nro_factura"];
$fecha=$result->fields["fecha"];
 
$nro_fact = str_pad($nro_factura, 10, "0", STR_PAD_LEFT);

 $dia= substr($fecha,8,2);
$mes= substr($fecha,5,2);
$anio= substr($fecha,0,4);

$fecha= $dia."/".$mes."/".$anio;

 $nro_receta=$result->fields["nro_receta"];
 $documento=$result->fields["documento"];
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
 $enviar=$result->fields["enviar"];

$sql="select * from fuentes where nro_fuente = '$enviar'";
$result = $db->Execute($sql);
$enviar=strtoupper($result->fields["nombre_fuente"]); 


$sql = "SELECT * FROM `afiliaciones` where documento = $documento and tipo_doc = '$tipo_doc' order by documento";
$result = $db->Execute($sql);
$nro_os=$result->fields["nro_os"];
$nro_afiliado=$result->fields["nro_afiliado"];


$sql = "SELECT * FROM `obrasocial` where nro_os = $nro_os";
$result = $db->Execute($sql);

$nombre_os=strtoupper($result->fields["nombre_os"]);
$sigla=strtoupper($result->fields["sigla"]);

if ($nro_os == 1){
$nombre_os="";
}


$sql7="select * from pacientes where documento = $documento and tipo_doc = '$tipo_doc'";
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

$sql="select * from paciente_diagnostico where documento = '$documento' and tipo_doc = '$tipo_doc' order by nro_ficha desc";
$result = $db->Execute($sql);
$cod_diagnostico=strtoupper($result->fields["cod_diagnostico"]); 
$nro_ficha=strtoupper($result->fields["nro_ficha"]); 
$cod_fuente=strtoupper($result->fields["cod_fuente"]); 

$sql="select * from fuentes where nro_fuente = '$cod_fuente'";
$result = $db->Execute($sql);
$fuente=strtoupper($result->fields["nombre_fuente"]); 


$sql="select * from diagnostico where nro_diagnostico = '$cod_diagnostico'";
$result = $db->Execute($sql);
$nombre_diagnostico=strtoupper($result->fields["nombre_diagnostico"]); 

if ($tipo_fact == "002"){
$tipo_factura1 = "PO";
}






 $sql3 = "SELECT * FROM `tr_ventas_detalle`  WHERE  nro_factura = $nro_factura order by  cod_detalle desc";
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




if ($cod_mer == $cod_merca){
	$canti = $canti + 1;
}


 

$cantidad=strtoupper($result3->fields["cantidad"]);
$proveedor=strtoupper($result3->fields["proveedor"]);
$presentacion=strtoupper($result3->fields["presentacion"]);
$descripcion=strtoupper($result3->fields["descripcion"]);
 $cod_detalle=strtoupper($result3->fields["cod_detalle"]);

 $cod_detalle11=$_POST[control.$cod_detalle];

if ($cod_detalle11 == 'on'){
	$estado_guardar = 1;
}else	 {
$estado_guardar = 0;
	 }


$estad=$_POST[estados.$cod_detalle];
for ($i=0;$i<count($estad);$i++)    
{     
$estado11 = $estad[$i];    
}

 
 




if ($estado11 == ""){
$sql="SELECT * FROM `tr_ventas_detalle`  WHERE  cod_detalle = $cod_detalle";
$result = $db->Execute($sql);
$estado11=$result->fields["estado"]; 
}


$gtin = $result3->fields["gtin"];
$resultado= $result3->fields["resultado"];
$transaccion= $result3->fields["transaccion"];
//$estado= $result3->fields["estado"];

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


 
   $sql1 = "UPDATE `tr_ventas_detalle` SET `recibido_coir` = '$estado_guardar', `estado` = '$estado11' WHERE `cod_detalle` = '$cod_detalle'";
$result1 = $db->Execute($sql1);
 
	 $result3->MoveNext();

				}

$bander = 1;
include ("detalle_factura.php");

}ELSE
{
$bander = 1;
$palabra = $documento;
include ("buscar_paciente_general_coir.php");
}
?>
