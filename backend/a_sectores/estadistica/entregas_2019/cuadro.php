<?php 

$pdf->AddPage();

$pdf->SetXY(1,1);
$pdf->Cell(250,5,"CONSUMIDO MENSUAL",0,0,'C'); 

$pdf->ln();

$v = "blanco.jpg";
$pdf->SetY(20);
$pdf->Image($v,1,1,65);
$pdf->Image($v,60,1,65);
$pdf->Image($v,120,1,65);
$pdf->Image($v,180,1,65);
$pdf->Image($v,240,1,65);
$pdf->SetFont('ARIAL','',12);

$pdf->ln();
$pdf->SetX(30);
$pdf->Cell(250,5,"CONSUMIDO MENSUAL",0,0,'C'); 

$pdf->ln();
$pdf->ln();

 $total_compra_directa11;
 $total_ace = $total_grupo1 + $total_grupo3;


$total_unico_tradicional = $total_prov_papo1 - $total_compra_directa1;
$total_unico_monoclonal = $total_prov_mono - $total_compra_directa3;


$total_unico_trad_mon = $total_unico_tradicional + $total_unico_monoclonal;

$total_compras_trad_mon = $total_compra_directa1 + $total_compra_directa3;

$consumido = $total_unico_trad_mon + $total_compras_trad_mon + $total_ace;


$total_tradicional = $total_unico_tradicional + $total_unico_trad_mon + $total_grupo1;
$total_monoclonal =  $total_unico_monoclonal + $total_compras_trad_mon + $total_grupo3;


$tot_trad = $total_unico_tradicional + $total_compra_directa1 + $total_grupo1;
$tot_mon = $total_unico_monoclonal + $total_compra_directa3 + $total_grupo3;


 $resumen = $tot_trad + $tot_mon;


/*$tot_ingreso = $total_dev1 + $dev_ace1;
$tot_egreso = $total_prov_papo1 + $total_grupo1;

$tot_ingreso_mon = $dev_ace3 + $total_dev3 + $devolucion_ace;
$tot_egreso_mon = $total_grupo3 + $total_prov_mono;


$tot_in = $tot_ingreso + $tot_ingreso_mon;
$tot_eg = $tot_egreso + $tot_egreso_mon;
 
 $tot_uni = ($total_prov_papo1 + $total_prov_mono) - ($total_dev1 + $total_dev3);
$tot_ace = ($total_grupo1 + $total_grupo3) - ($dev_ace1 + $dev_ace3);
$tot_dev_ace = ($devolucion_ace);

$tot_egr_ing = $tot_eg - $tot_in;
*/

$a = $total_dev1 + $dev_ace1;
$b = $total_dev3 + $dev_ace3;
$c = $a + $b;

//$pdf->Line(150, 39, 220, 39);
$pdf->ln();
$pdf->SetX(50);
$pdf->Cell(60,5,"Unico Tradicional: ",0,0,'L');
$pdf->Cell(30,5,number_format($total_unico_tradicional,2),0,0,'R');

$pdf->ln();
$pdf->SetX(50);
$pdf->Cell(60,5,"         Monoclonal: ",0,0,'L'); 
$pdf->Cell(30,5,number_format($total_unico_monoclonal,2),0,0,'R'); 
$pdf->Cell(60,5,"Total $: ",0,0,'R'); 
$pdf->Cell(30,5,number_format($total_unico_trad_mon,2),1,0,'R'); 
$pdf->ln();
$pdf->ln();

$pdf->ln();
$pdf->SetX(50);
$pdf->Cell(60,5,"Compras directas prov. trad: ",0,0,'L');
$pdf->Cell(30,5,number_format($total_compra_directa1,2),0,0,'R');
$pdf->ln();
$pdf->SetX(50);
$pdf->Cell(60,5,"         Monoclonal: ",0,0,'L'); 
$pdf->Cell(30,5,number_format($total_compra_directa3,2),0,0,'R'); 
$pdf->Cell(60,5,"Total: ",0,0,'R'); 
$pdf->Cell(30,5,number_format($total_compras_trad_mon,2),1,0,'R'); 

$pdf->ln();
$pdf->ln();
$pdf->SetX(50);
$pdf->Cell(60,5,"Ace Tradicional: ",0,0,'L');
$pdf->Cell(30,5,number_format($total_grupo1,2),0,0,'R');
$pdf->ln();
$pdf->SetX(50);
$pdf->Cell(60,5,"         Monoclonal: ",0,0,'L'); 
$pdf->Cell(30,5,number_format($total_grupo3,2),0,0,'R'); 
$pdf->Cell(60,5,"Total: ",0,0,'R'); 
$pdf->Cell(30,5,number_format($total_ace,2),1,0,'R'); 


$pdf->ln();
$pdf->ln();
//$pdf->Line(150, 59, 220, 59);
$pdf->SetX(50);
$pdf->Cell(90,5,"",0,0,'L'); 
$pdf->Cell(60,5,"Total Consumido: ",0,0,'R'); 
$pdf->Cell(30,5,number_format($consumido,2),1,0,'R');


$pdf->ln();
$pdf->ln();
$pdf->SetX(50);
$pdf->Cell(90,5,"Resumen ",0,0,'L'); 
$pdf->ln();
$pdf->SetX(50);

$pdf->Cell(60,5,"   Tradicional: ",0,0,'L'); 
$pdf->Cell(30,5,number_format($tot_trad,2),0,0,'R');
$pdf->ln();
$pdf->SetX(50);
$pdf->Cell(60,5,"   Monoclonal: ",0,0,'L'); 
$pdf->Cell(30,5,number_format($tot_mon,2),0,0,'R');


$pdf->ln();

//$pdf->Line(150, 89, 220, 89);
$pdf->SetX(50);
$pdf->Cell(90,5,"",0,0,'L'); 
$pdf->Cell(60,5,"Total: ",0,0,'R'); 
$pdf->Cell(30,5, number_format($resumen,2),1,0,'R');

$pdf->ln();
$pdf->ln();
$pdf->SetX(50);
$pdf->Cell(90,5,"AJUSTES ",0,0,'L'); 

/*
$pdf->ln();
$pdf->SetX(55);
$pdf->Cell(60,5,"N/C Devoluciones ",0,0,'L'); 
$pdf->Cell(30,5,number_format($devolucion_ace,2),0,0,'R');
*/

$pdf->ln();
$pdf->SetX(55);
$pdf->Cell(60,5,"Recupero Tradicionales ",0,0,'L'); 
$pdf->Cell(30,5,number_format($a,2),0,0,'R');
$pdf->ln();
$pdf->SetX(55);
$pdf->Cell(60,5,"Recupero Monoclonales ",0,0,'L'); 
$pdf->Cell(30,5,number_format($b,2),0,0,'R');
$pdf->ln();
$pdf->ln();
//$pdf->Line(150, 123, 220, 123);
$pdf->SetX(50);
$pdf->Cell(90,5,"",0,0,'L'); 
$pdf->Cell(60,5,"TOTAL AJUSTE ",0,0,'R'); 
$pdf->Cell(30,5,number_format($c,2),1,0,'R');

$pdf->ln();
$pdf->ln();
$pdf->ln();
$pdf->SetX(50);
$pdf->Cell(90,5,"NETO CONSUMIDO ",0,0,'L'); 
$pdf->Cell(30,5,number_format($consumido,2),0,0,'R');

$pdf->ln();
$pdf->SetX(50);
$pdf->Cell(90,5," ",0,0,'L'); 
$pdf->Cell(30,5,"-".number_format($c,2),0,0,'R');

$fin = $consumido - $c;
//$pdf->Line(125, 153, 150, 153);

$pdf->ln();
$pdf->ln();
$pdf->SetX(50);
$pdf->Cell(90,5," ",0,0,'L'); 
$pdf->Cell(30,5,number_format($fin,2),1,0,'R');;