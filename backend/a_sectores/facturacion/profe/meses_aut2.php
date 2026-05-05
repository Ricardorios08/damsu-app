<?php

$desde  =$anio."-".$mes."-01";
$hasta  =$anio."-".$mes."-31";

$sql1 = "SELECT *  FROM profe_detalle where fecha between '$desde' and '$hasta' and cod_droga = '$cod_droga' and nro_os = 10 and no_profe != 1";
$result11 = $db->Execute($sql1);

 if (!$result11) die("fallo".$db->ErrorMsg());
  while (!$result11->EOF) {

 $cod_detalle=$result11->fields["cod_detalle"];
 $nro_factura=$result11->fields["nro_factura"];
   $fecha=$result11->fields["fecha"];
    $precio_unitario=$result11->fields["precio_unitario"];
	 $documento=$result11->fields["documento"];
 $cod_mercaderia=$result11->fields["cod_mercaderia"];
 $cod_droga=$result11->fields["cod_droga"];

$di = substr($fecha,8,2);
$me = substr($fecha,5,2);
$an = substr($fecha,0,4);


$fecha = $di."/".$me."/".$an;

 $sql = "SELECT * FROM pacientes where documento = '$documento'";
$result = $db->Execute($sql);
  $apellido=$result->fields["apellido"];
 
  $nombre=substr($result->fields["nombre"],0,10);
 $calle=$result->fields["calle"];
 $puerta=$result->fields["puerta"];
 $departamento=$result->fields["departamento"];


 $sql = "SELECT * FROM monodrogas where cod_barra = '$cod_mercaderia'";
$result = $db->Execute($sql);
  $nombre_comercial=$result->fields["nombre_comercial"];
$presentacion=$result->fields["presentacion"];


if (($nro_factura == 167497) and ($cod_mercaderia == '7798035310470') or ($nro_factura == 167497) and ($cod_mercaderia == '7798035310487') OR ($nro_factura == 167677)){

}else{


$total_mes  =$total_mes + $precio_unitario;
$total_droga = $total_droga + $total_mes;

$total_mes1  =$total_mes1 + $precio_unitario;


$pdf->SetFont('ARIAL','',8);
$pdf->Cell(70,5,$apellido.", ".$nombre." (".$documento.")",1,0); 
$pdf->Cell(50,5,$nombre_comercial,1,0); 
$pdf->Cell(20,5,$nro_factura,1,0); 
$pdf->Cell(20,5,$fecha,1,0);  
$pdf->Cell(30,5,number_format($precio_unitario,2),1,0,R); 
$pdf->ln();
$pdf->SetFont('ARIAL','',10);

}


   $result11->MoveNext();
	}


if ($total_mes > 0){
$pdf->ln();

}

$total_mes = '';