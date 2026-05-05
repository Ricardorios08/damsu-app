<?php
require('diag.php');

require_once("../../../conexiones/config_pro.php");

$anio = "2012";
require('meses_cantidad.php');



$pdf = new PDF_Diag();

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



$pdf->Cell(290, 5, $fecha, 0, 0, C);

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();





$data = array('Enero' => $uno, 'Febrero' => $dos, 'Marzo' => $tres , 'Abril' => $cuatro, 'Mayo' => $cinco, 'Junio' => $seis , 'Julio' => $siete, 'Agosto' => $ocho, 'Setiembre' => $nueve , 'Octubre' => $diez, 'Noviembre' => $once, 'Diciembre' => $doce);



//Bar diagram
$pdf->SetFont('Arial', 'BIU', 12);
$pdf->Cell(0, 5, 'CONSUMO POR PACIENTES EN EL AÑO', 0, 0);
$pdf->Ln();
$valX = $pdf->GetX();
$valY = $pdf->GetY();
$pdf->Ln();
$pdf->BarDiagram(190, 90, $data, '%l: %v ', array(250,100,105));
//$pdf->BarDiagram(190, 70, $data, '%l : %v (%p)', array(280,100,105));
 
//$pdf->SetXY($valX, $valY + 50);

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Arial', 'BIU', 12);
$pdf->Cell(0, 5, 'CONSUMO POR PACIENTES POR DEPARTAMENTO EN EL AÑO', 0, 0);

$pdf->SetFont('Arial', '', 10);
$pdf->Ln();
$pdf->Ln();




$pdf->SetX(15);
$pdf->SetFillColor(255,0,0);
   $pdf->SetTextColor(255);
    $pdf->SetDrawColor(128,0,0);
    $pdf->SetLineWidth(.3);
    $pdf->SetFont('','B');

  $pdf->Cell(50,5,'DEPARTAMENTO',1,0,'C',true);

 
$pdf->Cell(10,5,'ENE',1,0,'C',true); 
$pdf->Cell(10,5,'FEB',1,0,'C',true); 
$pdf->Cell(10,5,'MAR',1,0,'C',true); 
$pdf->Cell(10,5,'ABR',1,0,'C',true); 
$pdf->Cell(10,5,'MAY',1,0,'C',true); 
$pdf->Cell(10,5,'JUN',1,0,'C',true); 
$pdf->Cell(10,5,'JUL',1,0,'C',true); 
$pdf->Cell(10,5,'AGO',1,0,'C',true); 
$pdf->Cell(10,5,'SET',1,0,'C',true); 
$pdf->Cell(10,5,'OCT',1,0,'C',true); 
$pdf->Cell(10,5,'NOV',1,0,'C',true); 
$pdf->Cell(10,5,'DIC',1,0,'C',true);
$pdf->Ln();


    $pdf->SetFillColor(224,235,255);
    $pdf->SetTextColor(0);
    $pdf->SetFont('');


 // $pdf->SetTextColor(255);
 $sql7="select departamento from `est_departamento_final` group by departamento";
$result7 = $db->Execute($sql7);

  if (!$result7) die("fallo".$db->ErrorMsg());
  while (!$result7->EOF) {


 $departamento=strtoupper($result7->fields["departamento"]); // numero

include ("meses_cantidad1.php");


$pdf->SetX(15);
$pdf->Cell(50,5,$departamento,1,0,'L'); 
$pdf->Cell(10,5,$uno,1,0,'C'); 
$pdf->Cell(10,5,$dos,1,0,'C'); 
$pdf->Cell(10,5,$tres,1,0,'C'); 
$pdf->Cell(10,5,$cuatro,1,0,'C'); 
$pdf->Cell(10,5,$cinco,1,0,'C'); 
$pdf->Cell(10,5,$seis,1,0,'C'); 
$pdf->Cell(10,5,$siete,1,0,'C'); 
$pdf->Cell(10,5,$ocho,1,0,'C'); 
$pdf->Cell(10,5,$nueve,1,0,'C'); 
$pdf->Cell(10,5,$diez,1,0,'C'); 
$pdf->Cell(10,5,$once,1,0,'C'); 
$pdf->Cell(10,5,$doce,1,0,'C'); 

$total_uno = $total_uno + $uno;
$total_dos = $total_dos + $dos;
$total_tres = $total_tres + $tres;
$total_cuatro = $total_cuatro + $cuatro;
$total_cinco = $total_cinco + $cinco;
$total_seis = $total_seis + $seis;
$total_siete = $total_siete + $siete;
$total_ocho = $total_ocho + $ocho;
$total_nueve = $total_nueve + $nueve;
$total_diez = $total_diez + $diez;
$total_once = $total_once + $once;
$total_doce = $total_doce + $doce;



$pdf->Ln();
$result7->MoveNext();
	}
	
$pdf->SetX(15);
$pdf->SetFillColor(255,0,0);
   $pdf->SetTextColor(255);
    $pdf->SetDrawColor(128,0,0);
    $pdf->SetLineWidth(.3);
    $pdf->SetFont('','B');

  $pdf->Cell(50,5,'DEPARTAMENTO',1,0,'C',true);

if ($total_uno == 0){$total_uno = "";}
if ($total_dos == 0){$total_dos = "";}
if ($total_tres == 0){$total_tres = "";}
if ($total_cuatro == 0){$total_cuatro = "";}
if ($total_cinco == 0){$total_cinco = "";}
if ($total_seis == 0){$total_seis = "";}
if ($total_siete == 0){$total_siete = "";}
if ($total_ocho == 0){$total_ocho = "";}
if ($total_nueve == 0){$total_nueve = "";}
if ($total_diez == 0){$total_diez = "";}
if ($total_once == 0){$total_once = "";}
if ($total_doce == 0){$total_doce = "";}



$pdf->Cell(10,5,$total_uno,1,0,'C',true);
$pdf->Cell(10,5,$total_dos,1,0,'C',true);
$pdf->Cell(10,5,$total_tres,1,0,'C',true);
$pdf->Cell(10,5,$total_cuatro,1,0,'C',true);
$pdf->Cell(10,5,$total_cinco,1,0,'C',true);
$pdf->Cell(10,5,$total_seis,1,0,'C',true);
$pdf->Cell(10,5,$total_siete,1,0,'C',true);
$pdf->Cell(10,5,$total_ocho,1,0,'C',true);
$pdf->Cell(10,5,$total_nueve,1,0,'C',true);
$pdf->Cell(10,5,$total_diez,1,0,'C',true); 
$pdf->Cell(10,5,$total_once,1,0,'C',true);
$pdf->Cell(10,5,$total_doce,1,0,'C',true);
$pdf->AddPage();


$pdf->Image('diag/mapa.jpg',20,20,170, 'C');


$pdf->SetFont('Arial', 'BIU', 12);
$pdf->Cell(0, 5, 'PACIENTES ATENDIDOS EN EL MES ACTUAL POR DEPARTAMENTO', 0, 0);

$pdf->SetFont('Arial', '', 10);
$pdf->Ln();
$pdf->Ln();



$pdf->SetX(15);
$pdf->SetFillColor(255,0,0);
   $pdf->SetTextColor(255);
    $pdf->SetDrawColor(128,0,0);
    $pdf->SetLineWidth(.3);
    $pdf->SetFont('','B');

  $pdf->Cell(40,5,'DEPARTAMENTO',1,0,'C',true);


$pdf->Cell(20,5,'CANTIDAD',1,0,'C',true); 

$pdf->Ln();


    $pdf->SetFillColor(224,235,255);
    $pdf->SetTextColor(0);
    $pdf->SetFont('');


 // $pdf->SetTextColor(255);
 $sql7="select departamento from `est_departamento_final` group by departamento";
$result7 = $db->Execute($sql7);

  if (!$result7) die("fallo".$db->ErrorMsg());
  while (!$result7->EOF) {


 $departamento=strtoupper($result7->fields["departamento"]); // numero

// $mes1 = date("m");
$sql="select sum(cantidad) as cantidad from `est_departamento_final` where  mes = '$mes1' and anio = '$anio' and departamento = '$departamento' ";
$result = $db->Execute($sql);
$uno=strtoupper($result->fields["cantidad"]); // numero


$pdf->SetX(15);

$pdf->Cell(40,5,$departamento,1,0,'L'); 
$pdf->Cell(20,5,$uno,1,0,'C'); 




$pdf->Ln();
$result7->MoveNext();
	}



$pdf->Output();
?>
