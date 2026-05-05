<?php


 $sql11 = "SELECT * FROM `tr_ventas_encabezado` where (fecha between '$desde' and '$hasta' and cod_movimiento = '1') or (fecha between '$desde' and '$hasta' and cod_movimiento = '10') order by nro_factura ";
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
// $fecha=$result->fields["fecha"];
 $forma_pago=$result->fields["forma_pago"];
 $porc_dto=$result->fields["porc_dto"];
 $nombre_operador=$result->fields["nombre_operador"];
 $neto=$result->fields["neto"];
  $tipo_factura=$result->fields["tipo_factura"];
    $observaciones=$result->fields["observaciones"];
 $cod_movimiento=$result->fields["cod_movimiento"];


 
 

 /*

 $pdf->setFecha($fecha);
$pdf->setFactura($nro_fact);



$pdf->setNeto($neto);



*/


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

if ($cod_movimiento == 6) {
$nombre_completo = "ANULADA";
$neto = 0;
}

switch ($cod_movimiento){
case "1":{$tp = "ENT";break;}
case "2":{$tp = "N/D";break;}
case "3":{$tp = "N/C";break;}
case "6":{$tp = "ANU";break;}
case "10":{$tp = "UNI";break;}
}

 $pdf->Cell(20,5,$tp." ".$nro_factura,0); 

 
$pdf->Cell(20,5,$fecha,0); 
$pdf->Cell(100,5,$nombre_completo,0); 

if ($documento == 137){
$devolucion_ace = $devolucion_ace + $neto;
}


$pdf->SetX(150);
$pdf->Cell(20,5,"",0,0,'R'); 
$pdf->Cell(20,5,"",0,0,'R'); 
$pdf->Cell(20,5,"",0,0,'R'); 
$pdf->Cell(20,5,"",0,0,'R'); 
$pdf->Cell(20,5,"",0,0,'R'); 
$pdf->Cell(20,5,"",0,0,'R'); 
$pdf->Cell(20,5,"$ ".number_format($neto,2),1,0,'R'); 
/*$pdf->Cell(20,5,number_format($neto,2),0,0,'R'); 
$pdf->Cell(20,5,number_format($neto,2),0,0,'R');  
$pdf->Cell(20,5,number_format($neto,2),0,0,'R'); 
$pdf->Cell(20,5,number_format($neto,2),0,0,'R'); 
$pdf->Cell(20,5,number_format($neto,2),0,0,'R');  
*/
$pdf->ln();

/*

$pdf->Cell(100,5,"NOMBRE COMERCIAL",0); 
$pdf->SetX(80);
$pdf->Cell(50,5,"PRESENTACION",0); 
$pdf->SetX(180);
$pdf->Cell(50,5,"LABORATORIO",0); 

$pdf->SetX(220);
$pdf->Cell(30,5,"CANTIDAD",0); 
$pdf->Cell(30,5,"PRECIO UNIT",0); 
$pdf->Cell(30,5,"TOTAL",0); 

$pdf->ln();

*/



 $sql3 = "SELECT * FROM `tr_ventas_detalle_entregas`  WHERE  nro_factura = $nro_factura  group by cod_mercaderia order by  cod_mercaderia";
$result3 = $db->Execute($sql3);

if (!$result3) die("fallo".$db->ErrorMsg());

 while (!$result3->EOF) {
$renglon = $renglon + 1;


 $cod_mer = $cod_merca;


  $cod_mercaderia=strtoupper($result3->fields["cod_mercaderia"]);
  $tipo_fact=strtoupper($result3->fields["tipo_fact"]);

$cod_merca=strtoupper($result3->fields["cod_mercaderia"]);
$precio_unitario=strtoupper($result3->fields["precio_unitario"]);



 $sql5 = "SELECT sum(cantidad) as cantidad,  sum(precio_unitario) as total FROM `tr_ventas_detalle_entregas`  WHERE  cod_mercaderia = '$cod_mercaderia' and nro_factura = $nro_factura";
$result5 = $db->Execute($sql5);
$cantidad=strtoupper($result5->fields["cantidad"]);

$total=strtoupper($result5->fields["total"]);
//$total = $total * $cantidad;

  
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
//$grupo=strtoupper($result3->fields["grupo"]); 

$sql = "SELECT * FROM `monodrogas`  WHERE  `cod_barra` = '$cod_mercaderia' or troquel = $cod_mercaderia";
$result9 = $db->Execute($sql);
$cod_mercaderia=strtoupper($result9->fields["troquel"]);
$presentacion=strtoupper($result9->fields["presentacion"]);
$nombre_comercial=strtoupper($result9->fields["nombre_comercial"]);
$cod_droga=strtoupper($result9->fields["cod_droga"]);
$laboratorio=strtoupper($result9->fields["laboratorio"]);
$grupo=strtoupper($result9->fields["grupo"]);

/*
echo "****".$nro_factura;
echo "****".$proveedor;
*/


	if ($proveedor == 110){

		switch ($grupo){
			case "1":{$ne_grupo1 = $total;$total_grupo1 = $total_grupo1 + $ne_grupo1;break;}
			case "2":{$ne_grupo2 = $total;$total_grupo2 = $total_grupo2 + $ne_grupo2;break;}
			case "3":{$ne_grupo3 = $total;$total_grupo3 = $total_grupo3 + $ne_grupo3;break;}
					}
$prov_papo1 = "0";
$prov_papo2 = "0";
$prov_mono = "0";

	}else{ // cambia no ace
		switch ($grupo){
			case "1":{$prov_papo1 = $total;$total_prov_papo1 = $total_prov_papo1 + $prov_papo1;$total_prov_papo_grupo1 = $total_prov_papo_grupo1 + $prov_papo;break;}
			case "2":{$prov_papo2 = $total;$total_prov_papo2 = $total_prov_papo2 + $prov_papo2;$total_prov_papo_grupo2 = $total_prov_papo_grupo1 + $prov_papo;break;}
			case "3":{$prov_mono = $total;$total_prov_mono = $total_prov_mono + $prov_mono;break;}
					}

$ne_grupo1 = "0";
$ne_grupo2 = "0";
$ne_grupo3 = "0";

				}
	


 


/*
				
					
						ELSE {//////////
$prov_papo = $total;
$total_prov_papo = $total_prov_papo + $prov_papo;
$ne_grupo1 = "0";
$ne_grupo2 = "0";
$ne_grupo3 = "0";
$prov_mono = "0";


}


}
*/


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

$presentacion = substr($presentacion,0,22);
$pdf->Cell(40,5,$presentacion,0); 
$laboratorio = substr($laboratorio,0,16);
$pdf->Cell(30,5,$laboratorio,0); 




$pdf->SetX(150);

$total_renglon = $prov_papo1 + $prov_papo2 + $prov_mono + $ne_grupo1 + $ne_grupo2 + $ne_grupo3;

if ($prov_papo1 > 0){$prov_papo1 = number_format($prov_papo1,2);}else{$prov_papo1 = "-";}
if ($prov_papo2 > 0){$prov_papo2 = number_format($prov_papo2,2);}else{$prov_papo2 = "-";}
if ($prov_mono > 0){$prov_mono = number_format($prov_mono,2);}else{$prov_mono = "-";}
if ($ne_grupo1 > 0){$ne_grupo1 = number_format($ne_grupo1,2);}else{$ne_grupo1 = "-";}
if ($ne_grupo2 > 0){$ne_grupo2 = number_format($ne_grupo2,2);}else{$ne_grupo2 = "-";}
if ($ne_grupo3 > 0){$ne_grupo3 = number_format($ne_grupo3,2);}else{$ne_grupo3 = "-";}


$pdf->Cell(20,5,$prov_papo1,1,0,'R'); 
$pdf->Cell(20,5,$prov_papo2,1,0,'R'); 
$pdf->Cell(20,5,$prov_mono,1,0,'R'); 
$pdf->Cell(20,5,$ne_grupo1,1,0,'R');  
$pdf->Cell(20,5,$ne_grupo2,1,0,'R'); 
$pdf->Cell(20,5,$ne_grupo3,1,0,'R'); 
//$pdf->Cell(20,5,number_format($total_renglon,2),0,0,'R'); 

/*
$pdf->Cell(20,5,number_format($precio_unitario,2),0,0,'R'); 
$pdf->Cell(20,5,number_format($total,2),0,0,'R'); 
*/

$prov_papo1 = "0";
$prov_papo2 = "0";
$prov_mono = "0";
$ne_grupo1 = "0";
$ne_grupo2 = "0";
$ne_grupo3 = "0";
$total_renglon = "0";


$pdf->ln();
 

$contame = $contame + 1;

/*
if ($contame == 14){
$pdf->AddPage();
$pdf->ln();
$pdf->ln();
$pdf->ln();
$pdf->Cell(18,5,"Paciente: ",0); 
$pdf->SetFont('ARIAL','B',12);
$pdf->Cell(50,5,$nombre_completo,0); 
$pdf->SetFont('ARIAL','',8);

$pdf->SetFont('ARIAL','B',12);
$pdf->SetX(140);
$pdf->Cell(50,5,$tipo_factura1,0); 
$pdf->SetFont('ARIAL','',8);

$pdf->ln();
$pdf->Cell(18,5,"Documento: ",0); 
$pdf->SetFont('ARIAL','B',10);
$pdf->Cell(50,5,$documento,0); 
$pdf->SetFont('ARIAL','',8);
$pdf->SetX(80);
$pdf->Cell(50,5,"Registro de Tumor: ".$nro_ficha,0); 
$pdf->ln();

$pdf->Cell(15.5,5,"Domicilio: ",0); 
$pdf->Cell(50,5,$direccion,0); 


$pdf->SetFont('ARIAL','B',12);
$pdf->SetX(120);

$pdf->Cell(50,5,$nombre_os,0); 
$pdf->SetFont('ARIAL','',8);
$pdf->ln();
$pdf->Cell(15.5,5,"Nota: ",0); 
$pdf->SetFont('ARIAL','B',10);
$pdf->Cell(150,5,$observaciones,0); 
$pdf->SetFont('ARIAL','',8);
$pdf->ln();

$pdf->Image('../../../imagenes/linea.jpg',10,60,180, 'C');

$pdf->ln();

$pdf->Cell(50,5,"CANT    DROGA                 PRESENTACION                                                                             LOTE              VTO                             TOTAL ",0); 
$pdf->ln();

$contame = 1;
}
*/

	 $result3->MoveNext();

				}
 

//$pdf->ln();

$sumatoria = 0;
$contame = "";
$cont = 0;
$canti = "";

	

	 $result->MoveNext();

				}