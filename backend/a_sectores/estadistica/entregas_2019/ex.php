<?php
require('diag.php');

include ("../../../conexiones/config_pro.php");

 
$hoy=date("d/m/y");

$mes = $_REQUEST['mes'];
$anio = $_REQUEST['anio'];


switch ($mes){
	case "01":{$periodo = "ENERO 20".$anio;break;}
	case "02":{$periodo = "FEBRERO 20".$anio;break;}
	case "03":{$periodo = "MARZO 20".$anio;break;}
	case "04":{$periodo = "ABRIL 20".$anio;break;}
	case "05":{$periodo = "MAYO 20".$anio;break;}
	case "06":{$periodo = "JUNIO 20".$anio;break;}

	case "07":{$periodo = "JULIO 20".$anio;break;}
	case "08":{$periodo = "AGOSTO 20".$anio;break;}
	case "09":{$periodo = "SETIEMBRE 20".$anio;break;}
	case "10":{$periodo = "OCTUBRE 20".$anio;break;}
	case "11":{$periodo = "NOVIEMBRE 20".$anio;break;}
	case "12":{$periodo = "DICIEMBRE 20".$anio;break;}

}




$prov_papo1 = "0";
$prov_mono = "0";
$ne_grupo1 = "0";
$ne_grupo2 = "0";
$ne_grupo3 = "0";
$total_renglon = "0";

$desde = $anio."-".$mes."-01";
$hasta= $anio."-".$mes."-31";

 
$sql = "TRUNCATE TABLE tr_ventas_detalle_entregas";
mysql_query($sql);

$sql = "INSERT INTO tr_ventas_detalle_entregas SELECT * FROM tr_ventas_detalle where fecha between '$desde' and '$hasta'";
mysql_query($sql);

$hoja = "A4";
$pdf=new PDF_Diag('L','mm',$hoja); 

$pdf->SetDisplayMode(real,'default'); 

//$pdftest=new PDF2();
$pdf->AliasNbPages();
//$pdf->AddPage();
$pdf->SetFont('ARIAL','',8);


//$pdf->setPaciente($periodo);



$pdf->AddPage();
include ("entregas.php");



$total_prov_papo_programa1 = $total_prov_papo1;
$total_prov_papo_programa2 = $total_prov_papo2;
$total_prov_mono_programa = $total_prov_mono;

$total_grupo1_programa = $total_grupo1;
$total_grupo2_programa = $total_grupo2;
$total_grupo3_programa = $total_grupo3;


include ("ajustes_positivos.php");

$total_prov_papo_programa1 = $total_prov_papo1;
$total_prov_papo_programa2 = $total_prov_papo2;
$total_prov_mono_programa = $total_prov_mono;

$total_grupo1_programa = $total_grupo1;
$total_grupo2_programa = $total_grupo2;
$total_grupo3_programa = $total_grupo3;

include ("ajustes_negativos.php");


$total_general_programa = $total_prov_papo_programa + $total_prov_mono_programa + $total_grupo1_programa + $total_grupo2_programa + $total_grupo3_programa;

include ("devoluciones.php");



 $total_general = $total_prov_papo1 + $total_prov_papo2 + $total_prov_mono + $total_grupo1 + $total_grupo2 + $total_grupo3;

 $total_grupo1_programa = $total_grupo1 - $dev_ace1;
 $total_grupo2_programa = $total_grupo2 - $dev_ace2;
 $total_grupo3_programa = $total_grupo3 - $dev_ace3;

 $pdf->ln();
 $pdf->ln();

 $papo_1 = $total_prov_papo1 - $total_dev1;
 $papo_2 = $total_prov_papo2 - $total_dev2;
 $papo_3 = $total_prov_mono - $total_dev3;

$ace_1 = $total_grupo1;
$ace_2 = $total_grupo2;
$ace_3 = $total_grupo3;

$total_general = $papo1 + $papo2 + $papo3 + $ace_1 + $ace_2 + $ace_3;


 $total_unico = $papo_1 + $papo_2 + $papo_3;
$total_ace = $ace_1 + $ace_2;
$total_gastado = $total_unico + $total_ace + $ace_3;
$monoclonales = $papo_3 + $total_grupo3;




$pdf->AddPage();


$pdf->SetX(190);

$tot = $total_prov_papo1 + $total_prov_papo2 + $total_prov_mono + $total_grupo1 + $total_grupo2 + $total_grupo3;
$tot_dev = $total_dev1 + $total_dev2 + $total_dev3 + $dev_ace1 + $dev_ace2 + $dev_ace3;

 $tot_dev222 = $total_dev1 + $total_dev2 + $total_dev3 + $dev_ace1 + $dev_ace3;


$final= $papo_1 + $papo_2 + $papo_3 + $total_grupo1 + $total_grupo2 + $total_grupo3;

if (($mes == "09") and ($anio == "2017")){
$total_grupo1 = $total_grupo + 3598381.66;
$devolucion_ace = $devolucion_ace - 49591.74;
$tot = $tot + 49591.74;

}
 
$pdf->SetX(155);
$pdf->Cell(20,5,"ENTREGAS",0,0,'C');
 $pdf->SetX(185);
 $pdf->Cell(25,5,number_format($total_prov_papo1,2),0,0,'R'); 
//$pdf->Cell(20,5,number_format($total_prov_papo2,2),0,0,'R'); 
$pdf->Cell(20,5,number_format($total_prov_mono,2),0,0,'R'); 
$pdf->Cell(20,5,number_format($total_grupo1,2),0,0,'R');  
//$pdf->Cell(20,5,number_format($total_grupo2,2),0,0,'R'); 
$pdf->Cell(20,5,number_format($total_grupo3,2),0,0,'R'); 
$pdf->Cell(20,5,number_format($tot,2),0,0,'R'); 

$total_grupo1_uni = $total_grupo1;
  $pdf->ln();
  $pdf->SetX(155);
$pdf->Cell(25,5,"RECUPERO DROGAS",0,0,'C'); 
 $pdf->SetX(185);
$pdf->Cell(20,5,"-".number_format($total_dev1,2),0,0,'R'); 
//$pdf->Cell(20,5,"-".number_format($total_dev2,2),0,0,'R'); 
$pdf->Cell(20,5,"-".number_format($total_dev3,2),0,0,'R'); 
$pdf->Cell(20,5,"-".number_format($dev_ace1,2),0,0,'R'); 
//$pdf->Cell(20,5,"-".number_format($dev_ace2,2),0,0,'R'); 
$pdf->Cell(20,5,"-".number_format($dev_ace3,2),0,0,'R'); 
$pdf->Cell(20,5,"-".number_format($tot_dev222,2),0,0,'R'); 
 



  $pdf->ln();
  $pdf->SetX(155);
$pdf->Cell(25,5,"DEVOLUCION A ACE",0,0,'C'); 
 $pdf->SetX(185);
$pdf->Cell(20,5,'',0,0,'R'); 
//$pdf->Cell(20,5,'',0,0,'R'); 
$pdf->Cell(20,5,'',0,0,'R'); 
$pdf->Cell(20,5,"-".number_format($devolucion_ace,2),0,0,'R'); 
$pdf->Cell(20,5,'',0,0,'R'); 
//$pdf->Cell(20,5,'',0,0,'R'); 
$pdf->Cell(20,5,"-".number_format($devolucion_ace,2),0,0,'R'); 

$tot1 = $total_prov_papo1 - $total_dev1;
$tot2 = $total_prov_papo2 - $total_dev2;
$tot3 = $total_prov_mono - $total_dev3;
$tot4 = $total_grupo1 - $dev_ace1 - $devolucion_ace;
$tot5 = $total_grupo2 - $dev_ace2;
$tot6 = $total_grupo3 - $dev_ace3;

$tot_fin = $tot1 + $tot2 + $tot3 + $tot4 + $tot5  + $tot6;

 $pdf->ln();
$pdf->SetX(155);
$pdf->Cell(25,5,"TOTAL",0,0,'C'); 
 $pdf->SetX(185);
$pdf->Cell(20,5,number_format($tot1,2),0,0,'R'); 
//$pdf->Cell(20,5,number_format($tot2,2),0,0,'R'); 
$pdf->Cell(20,5,number_format($tot3,2),0,0,'R'); 
$pdf->Cell(20,5,number_format($tot4,2),0,0,'R');  
//$pdf->Cell(20,5,number_format($tot5,2),0,0,'R'); 
$pdf->Cell(20,5,number_format($tot6,2),0,0,'R'); 
$pdf->Cell(20,5,number_format($tot_fin,2),0,0,'R'); 
 

  $pdf->ln();


$total_gastado = $total_unico + $total_ace + $monoclonales - $devolucion_ace;

$total_ace = $tot4 + $tot5;


$papo_1 = $papo_1 + $papo_2;
$tot4 = $tot4 + $tot5;
  
   
   $pdf->ln();
   $pdf->ln();
 




$sql11 = "SELECT count(nro_factura) AS tot_prog FROM `tr_ventas_encabezado` where (fecha between '$desde' and '$hasta' and cod_movimiento = '1') or (fecha between '$desde' and '$hasta' and cod_movimiento = '10') order by nro_factura ";
$result9 = $db->Execute($sql11);
$tot_prog=strtoupper($result9->fields["tot_prog"]);

$sql11 = "SELECT count(nro_factura) AS tot_deb FROM `tr_ventas_encabezado` where (fecha between '$desde' and '$hasta' and cod_movimiento = '2')   order by nro_factura ";
$result9 = $db->Execute($sql11);
$tot_deb=strtoupper($result9->fields["tot_deb"]);

$sql11 = "SELECT count(nro_factura) AS tot_cred FROM `tr_ventas_encabezado` where (fecha between '$desde' and '$hasta' and cod_movimiento = '3')   order by nro_factura ";
$result9 = $db->Execute($sql11);
$tot_cred=strtoupper($result9->fields["tot_cred"]);

   $sql11 = "SELECT count(nro_factura) AS tot_don FROM `compras_encabezado` where fecha between '$desde' and '$hasta' order by nro_factura";
$result9 = $db->Execute($sql11);
$tot_don=strtoupper($result9->fields["tot_don"]);


$pdf->ln();


$pdf->SetFillColor(255,0,0);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(128,0,0);
$pdf->SetLineWidth(.3);
$pdf->SetFont('','B');

  $pdf->ln();
$pdf->SetX(80);
$pdf->Cell(80,5,"TOTAL ENTREGAS: ",1,0,'C',true); 
$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);
$pdf->SetFont('');


$pdf->Cell(50,5,$tot_prog,1,0,'R'); 
 
  $pdf->ln();

$pdf->SetFillColor(255,0,0);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(128,0,0);
$pdf->SetLineWidth(.3);
$pdf->SetFont('','B');

$pdf->SetX(80);
$pdf->Cell(80,5,"AJUSTES POSITIVOS: ",1,0,'C',true); 
$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);
$pdf->SetFont('');


$pdf->Cell(50,5,$tot_deb,1,0,'R'); 
  $pdf->ln();

$pdf->SetFillColor(255,0,0);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(128,0,0);
$pdf->SetLineWidth(.3);
$pdf->SetFont('','B');


$pdf->SetX(80);
$pdf->Cell(80,5,"AJUSTES NEGATIVOS: ",1,0,'C',true); 
$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);
$pdf->SetFont('');
$pdf->Cell(50,5,$tot_cred,1,0,'R'); 
$pdf->ln();

$pdf->SetFillColor(255,0,0);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(128,0,0);
$pdf->SetLineWidth(.3);
$pdf->SetFont('','B');

$pdf->SetX(80);
$pdf->Cell(80,5,"N/C UNICO: ",1,0,'C',true); 
$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);
$pdf->SetFont('');


$pdf->Cell(50,5,$tot_don,1,0,'R'); 
  $pdf->ln();


$sql11 = "SELECT * FROM `tr_ventas_encabezado` where (fecha between '$desde' and '$hasta') order by nro_factura desc";
$result = $db->Execute($sql11);
$ultima_entrega=$result->fields["nro_factura"];


   $sql11 = "SELECT * FROM `compras_encabezado` where fecha between '$desde' and '$hasta' order by nro_factura desc";
$result = $db->Execute($sql11);

$ultima_devolucion=$result->fields["nro_factura"];


$pdf->SetX(80);
$pdf->Cell(80,5,"N° ULTIMA NOTA ENTREGA: ",1,0,'C',true); 
$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);
$pdf->SetFont('');
$pdf->Cell(50,5,$ultima_entrega,1,0,'R'); 
$pdf->ln();

$pdf->SetX(80);
$pdf->Cell(80,5,"N° ULTIMA NOTA DEVOLUCION (N/C): ",1,0,'C',true); 
$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);
$pdf->SetFont('');
$pdf->Cell(50,5,$ultima_devolucion,1,0,'R'); 



//$pdf->AddPage();


$pdf->ln();
$pdf->ln();

$pdf->ln();
$pdf->SetX(120);
$pdf->Cell(60,5,"TRADICIONALES",1,0,'C'); 
$pdf->Cell(60,5,"MONOCLONALES",1,0,'C'); 

$pdf->ln();

$pdf->SetX(30);
$pdf->Cell(90,5,"TIPO",1,0,'C'); 
$pdf->Cell(30,5,"INGRESOS",1,0,'C'); 
$pdf->Cell(30,5,"EGRESOS",1,0,'C'); 
//$pdf->Cell(30,5,"TOTAL",1,0,'C'); 
$pdf->Cell(30,5,"INGRESOS",1,0,'C'); 
$pdf->Cell(30,5,"EGRESOS",1,0,'C'); 
$pdf->Cell(30,5,"Total E-I",1,0,'C'); 
//$pdf->Cell(30,5,"TOTAL ",1,0,'C'); 
$pdf->ln();



$tot_ingreso = $total_dev1 + $dev_ace1;
$tot_egreso = $total_prov_papo1 + $total_grupo1;

$tot_ingreso_mon = $dev_ace3 + $total_dev3 + $devolucion_ace;
$tot_egreso_mon = $total_grupo3 + $total_prov_mono;


$tot_in = $tot_ingreso + $tot_ingreso_mon;
$tot_eg = $tot_egreso + $tot_egreso_mon;
 
 $tot_uni = ($total_prov_papo1 + $total_prov_mono) - ($total_dev1 + $total_dev3);
$tot_ace = ($total_grupo1 + $total_grupo3) - ($dev_ace1 + $dev_ace3);
$tot_dev_ace = ($devolucion_ace);

$tot_egr_ing = $tot_eg - $tot_in;

$pdf->SetX(30);
$pdf->Cell(90,5,"UNICO Y OTROS PROVEEDORES: ",1,0,'C'); 
$pdf->Cell(30,5,number_format($total_dev1,2),1,0,'R'); //ingre
$pdf->Cell(30,5,number_format($total_prov_papo1,2),1,0,'R'); //egresos
//$pdf->Cell(30,5,number_format($a,2),1,0,'R');  ///total 
$pdf->Cell(30,5,number_format($total_dev3,2),1,0,'R'); 
$pdf->Cell(30,5,number_format($total_prov_mono,2),1,0,'R'); 

$pdf->Cell(30,5,number_format($tot_uni,2),1,0,'R'); 
$pdf->ln();
 
$pdf->SetX(30);
$pdf->Cell(90,5,"ACE: ",1,0,'C'); 
$pdf->Cell(30,5,number_format($dev_ace1,2),1,0,'R'); 
$pdf->Cell(30,5,number_format($total_grupo1,2),1,0,'R'); 
//$pdf->Cell(30,5,number_format($a,2),1,0,'R'); 
$pdf->Cell(30,5,number_format($dev_ace3,2),1,0,'R'); 
//$pdf->Cell(30,5,number_format($a,2),1,0,'R'); 
$pdf->Cell(30,5,number_format($total_grupo3,2),1,0,'R'); 
$pdf->Cell(30,5,number_format($tot_ace,2),1,0,'R'); 
  $pdf->ln();
 
$pdf->SetX(30);
$pdf->Cell(90,5,"DEVOLUCION ACE: ",1,0,'C'); 
$pdf->Cell(30,5,number_format($a,2),1,0,'R'); 
$pdf->Cell(30,5,number_format($a,2),1,0,'R'); 
//$pdf->Cell(30,5,number_format($a,2),1,0,'R'); 
$pdf->Cell(30,5,number_format($devolucion_ace,2),1,0,'R'); 
//$pdf->Cell(30,5,number_format($a,2),1,0,'R'); 
$pdf->Cell(30,5,number_format($a,2),1,0,'R'); 
$pdf->Cell(30,5,number_format($tot_dev_ace,2),1,0,'R'); 

$pdf->ln();
$pdf->ln();
$pdf->SetX(30);
$pdf->Cell(90,5,"TOTAL: ",1,0,'C'); 
$pdf->Cell(30,5,number_format($tot_ingreso,2),1,0,'R'); 
$pdf->Cell(30,5,number_format($tot_egreso,2),1,0,'R'); 
$pdf->Cell(30,5,number_format($tot_ingreso_mon,2),1,0,'R'); 
$pdf->Cell(30,5,number_format($tot_egreso_mon,2),1,0,'R'); 
$pdf->Cell(30,5,number_format($tot_egr_ing,2),1,0,'R'); 
 
 
 $pdf->ln();
  $pdf->ln();
   $pdf->ln();



$pdf->ln();
$pdf->SetX(30);
$pdf->Cell(120,5,"RECUPERO DE DROGAS: ",1,0,'C'); 

$pdf->ln();
$pdf->SetX(30);
$pdf->Cell(90,5,"EGRESOS: ",1,0,'C'); 
$pdf->Cell(30,5,number_format($tot_eg,2),1,0,'R'); 


$pdf->ln();
$pdf->SetX(30);
$pdf->Cell(90,5,"INGRESOS: ",1,0,'C'); 
$pdf->Cell(30,5,number_format($tot_in,2),1,0,'R'); 


$pdf->ln();
$pdf->SetX(30);
$pdf->Cell(90,5,"TOTAL EGRESOS - INGRESOS: ",1,0,'C'); 
$pdf->Cell(30,5,number_format($tot_egr_ing,2),1,0,'R'); 





















$pdf->AddPage();
$pdf->SetDisplayMode(85,'default'); 

$pdf->SetFont('Arial', '', 10);

$di = date("d");
$me = date("m");
$an = date("Y");

switch ($me){
	case "01":{$mes_letras = "enero";break;}
	case "02":{$mes_letras = "febrero";break;}
	case "03":{$mes_letras = "marzo";break;}
	case "04":{$mes_letras = "abril";break;}
	case "05":{$mes_letras = "mayo";break;}
	case "06":{$mes_letras = "junio";break;}
	case "07":{$mes_letras = "julio";break;}
	case "08":{$mes_letras = "agosto";break;}
	case "09":{$mes_letras = "setiembre";break;}
	case "10":{$mes_letras = "octubre";break;}
	case "11":{$mes_letras = "noviembre";break;}
	case "12":{$mes_letras = "diciembre";break;}

}
$fecha = "Mendoza, ".$di." días del mes de ".$mes_letras." de ".$anio;

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

 

$pdf->Ln();
 
/*$tot_eg = 28734950.91;
$tot_in = 8076714.57;
$tot_egr_ing = 20658236.34;
*/



$data = array('Egresos' => $tot_eg, 'Ingresos' => $tot_in, 'Total' => $tot_egr_ing );



//Bar diagram
$pdf->SetFont('Arial', 'BIU', 12);
$pdf->Cell(0, 5, 'RECUPERO DE DROGAS', 0, 0);
$pdf->Ln();
$valX = $pdf->GetX();
$valY = $pdf->GetY();
$pdf->Ln();
$pdf->BarDiagram(190, 90, $data, '%l: %v ', array(250));
//$pdf->BarDiagram(190, 70, $data, '%l : %v (%p)', array(280,100,105));
 
//$pdf->SetXY($valX, $valY + 50);






 


$pdf->Output();
?>
