<?php

$prov_papo = "0";
$prov_mono = "0";
$ne_grupo1 = "0";
$ne_grupo2 = "0";
$ne_grupo3 = "0";
$total_renglon = "0";


   $sql11 = "SELECT * FROM `compras_encabezado` where fecha between '$desde' and '$hasta' order by nro_factura";
$result = $db->Execute($sql11);




if (!$result) die("fallo".$db->ErrorMsg());

 while (!$result->EOF) {


$nro_factura=$result->fields["nro_factura"];
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
 //$fecha=$result->fields["fecha"];
 $forma_pago=$result->fields["forma_pago"];
 $porc_dto=$result->fields["porc_dto"];
 $nombre_operador=$result->fields["nombre_operador"];
 $neto=$result->fields["total"];
  $tipo_factura=$result->fields["tipo_factura"];
    $observaciones=$result->fields["observaciones"];
 $cod_operacion=$result->fields["cod_operacion"];



$sql = "SELECT * FROM `afiliaciones` where documento = $documento and tipo_doc = '$tipo_doc' order by documento";
$result9 = $db->Execute($sql);
$nro_os=$result9->fields["nro_os"];
$nro_afiliado=$result9->fields["nro_afiliado"];


$sql = "SELECT * FROM `obrasocial` where nro_os = $nro_os";
$result9 = $db->Execute($sql);

$nombre_os=strtoupper($result9->fields["nombre_os"]);
$sigla=strtoupper($result9->fields["sigla"]);

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
$nombre_completo = $documento." - ".$apellido." ".$nombre;

$sql="select * from paciente_diagnostico where documento = '$documento' and tipo_doc = '$tipo_doc' order by nro_ficha desc";
$result9 = $db->Execute($sql);
$cod_diagnostico=strtoupper($result9->fields["cod_diagnostico"]); 
$nro_ficha=strtoupper($result9->fields["nro_ficha"]); 

$sql="select * from diagnostico where nro_diagnostico = '$cod_diagnostico'";
$result9 = $db->Execute($sql);
$nombre_diagnostico=strtoupper($result9->fields["nombre_diagnostico"]); 

switch ($cod_operacion){
 
case "2":{$tp = "N/C";break;} 
case "6":{$tp = "ANU";break;}
 
}

 $pdf->Cell(20,5,$tp." ".$nro_factura,0); 

 $pdf->Cell(20,5,$nro_factura,0); 
$pdf->Cell(20,5,$fecha,0); 
$pdf->Cell(100,5,$nombre_completo,0); 


$pdf->SetX(150);
$pdf->Cell(20,5,"",0,0,'R'); 
$pdf->Cell(20,5,"",0,0,'R'); 
$pdf->Cell(20,5,"",0,0,'R'); 
$pdf->Cell(20,5,"",0,0,'R'); 
$pdf->Cell(20,5,"",0,0,'R'); 
$pdf->Cell(20,5,"",0,0,'R'); 
$pdf->Cell(20,5,"$ ".number_format($neto,2),1,0,'R');  
 
$pdf->ln();

 

 $sql3 = "SELECT * FROM `compras_detalle`  WHERE  nro_factura = $nro_factura  group by cod_mercaderia order by  cod_mercaderia";
$result3 = $db->Execute($sql3);

if (!$result3) die("fallo".$db->ErrorMsg());

 while (!$result3->EOF) {
$renglon = $renglon + 1;


 $cod_mer = $cod_merca;


  $cod_mercaderia=strtoupper($result3->fields["cod_mercaderia"]);
  $tipo_fact=strtoupper($result3->fields["tipo_fact"]);

$cod_merca=strtoupper($result3->fields["cod_mercaderia"]);
$precio_unitario=strtoupper($result3->fields["precio_unitario"]);



$sql5 = "SELECT sum(cantidad) as cantidad,  sum(total) as total FROM `compras_detalle`  WHERE  cod_mercaderia = $cod_mercaderia and nro_factura = $nro_factura";
$result5 = $db->Execute($sql5);
$cantidad=strtoupper($result5->fields["cantidad"]);

$total=strtoupper($result5->fields["total"]);

  
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
 

$sql = "SELECT * FROM `monodrogas`  WHERE  `cod_barra` = '$cod_mercaderia' or troquel = $cod_mercaderia";
$result9 = $db->Execute($sql);
$cod_mercaderia=strtoupper($result9->fields["troquel"]);
$presentacion=strtoupper($result9->fields["presentacion"]);
$nombre_comercial=strtoupper($result9->fields["nombre_comercial"]);
$cod_droga=strtoupper($result9->fields["cod_droga"]);
$laboratorio=strtoupper($result9->fields["laboratorio"]);
$grupo=strtoupper($result9->fields["grupo"]);

if ($grupo == 2){$grupo = 1;}


switch ($grupo){
			case "1":{$dev_prov_papo1 = $total;$total_dev1 = $total_dev1 + $dev_prov_papo1;break;}
			case "2":{$dev_prov_papo2 = $total;$total_dev2 = $total_dev2 + $dev_prov_papo2;break;}
			case "3":{$dev_prov_papo3 = $total;$total_dev3 = $total_dev3 + $dev_prov_papo3;break;}
}


if (is_numeric ($laboratorio)) { 
$sql = "SELECT * FROM laboratorios  WHERE  cod_laboratorio = '$laboratorio' ";
$result9 = $db->Execute($sql);
$laboratorio=strtoupper($result9->fields["laboratorio"]);
} 


$sql = "SELECT * FROM `drogas`  WHERE  cod_droga = '$cod_droga' ";
$result9 = $db->Execute($sql);
$droga=strtoupper($result9->fields["droga"]);

$nombre_remedio = $droga."  ".$presentacion;

$cont = $cont + 1;

$precio_unitario = str_pad($precio_unitario, 12, " ", STR_PAD_LEFT); 

//$pdf->SetX(60);

$pdf->SetX(5);
$pdf->Cell(5,5,$cantidad,0); 
$pdf->Cell(70,5,$droga,0); 

$pdf->Cell(50,5,$presentacion,0); 

$pdf->Cell(30,5,$laboratorio,0); 



$pdf->SetX(190);

$total_renglon = $total;


$pdf->Cell(20,5,"-".number_format($total,2),1,0,'R'); 
$pdf->Cell(20,5,"-",1,0,'R'); 
//$pdf->Cell(20,5,"-",1,0,'R'); 
//$pdf->Cell(20,5,"-",1,0,'R'); 
$pdf->Cell(20,5,"-",1,0,'R'); 
$pdf->Cell(20,5,"-",1,0,'R'); 
//$pdf->Cell(20,5,"-".number_format($total_renglon,2),0,0,'R'); 


$prov_papo1 = "0";
$prov_papo2 = "0";
$prov_mono = "0";
$ne_grupo1 = "0";
$ne_grupo2 = "0";
$ne_grupo3 = "0";
$total_renglon = "0";


$pdf->ln();
 

$contame = $contame + 1;



	 $result3->MoveNext();

				}
 




$sumatoria = 0;
$contame = "";
$cont = 0;
$canti = "";

	

	 $result->MoveNext();

				}