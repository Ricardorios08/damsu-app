<?php

$gln = "999200480000100021";
$cant= $_REQUEST['cant'];
$cant = 1;

include("../../conexiones/config.inc.php");
 
$sql="select * from gtin_propios order by nro_serie desc";
$result = $db->Execute($sql);

 $nro_serie=$result->fields["nro_serie"]+1;
$nro_serie1=$result->fields["nro_serie"];
$nro_serie1 = $nro_serie1 + $cant;

$nro_serie2=$result->fields["nro_serie"];





require('code128.php');

//require('Barcode.php');

function TextWithRotation($x, $y, $txt, $txt_angle, $font_angle=0)
    {
        $font_angle+=90+$txt_angle;
        $txt_angle*=M_PI/180;
        $font_angle*=M_PI/180;
    
        $txt_dx=cos($txt_angle);
        $txt_dy=sin($txt_angle);
        $font_dx=cos($font_angle);
        $font_dy=sin($font_angle);
    
        $s=sprintf('BT %.2F %.2F %.2F %.2F %.2F %.2F Tm (%s) Tj ET',$txt_dx,$txt_dy,$font_dx,$font_dy,$x*$this->k,($this->h-$y)*$this->k,$this->_escape($txt));
        if ($this->ColorFlag)
            $s='q '.$this->TextColor.' '.$s.' Q';
        $this->_out($s);
    }


$pdf=new PDF_Code128('P','mm','A4');
$pdf->SetDisplayMode(80,'default'); 
 
 $nro_serie2 = $nro_serie1;
for ($i = $nro_serie; $i <= $nro_serie1; $i++) { // matriz

$gln.$i;



$pdf->AddPage();



$pdf->SetFont('Arial','',8);

 

$pdf->Code128(11,10,$gln.$nro_serie2,30,5);
$pdf->SetXY(5,12);
$pdf->Write(10,$gln.$nro_serie2);

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(60,10,$gln.$nro_serie2,30,5);
$pdf->SetXY(54,12);
$pdf->Write(10,$gln.$nro_serie2);

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(105,10,$gln.$nro_serie2,30,5);
$pdf->SetXY(100,12);
$pdf->Write(10,$gln.$nro_serie2);

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(150,10,$gln.$nro_serie2,30,5);
$pdf->SetXY(146,12);
$pdf->Write(10,$gln.$nro_serie2);

$pdf->Ln();
$pdf->Ln();

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(11,30,$gln.$nro_serie2,30,5);
$pdf->SetXY(5,32);
$pdf->Write(10,$gln.$nro_serie2);

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(60,30,$gln.$nro_serie2,30,5);
$pdf->SetXY(54,32);
$pdf->Write(10,$gln.$nro_serie2);

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(105,30,$gln.$nro_serie2,30,5);
$pdf->SetXY(100,32);
$pdf->Write(10,$gln.$nro_serie2);

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(150,30,$gln.$nro_serie2,30,5);
$pdf->SetXY(146,32);
$pdf->Write(10,$gln.$nro_serie2);

$pdf->Ln();
$pdf->Ln();

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(11,50,$gln.$nro_serie2,30,5);
$pdf->SetXY(5,52);
$pdf->Write(10,$gln.$nro_serie2);

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(60,50,$gln.$nro_serie2,30,5);
$pdf->SetXY(54,52);
$pdf->Write(10,$gln.$nro_serie2);

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(105,50,$gln.$nro_serie2,30,5);
$pdf->SetXY(100,52);
$pdf->Write(10,$gln.$nro_serie2);

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(150,50,$gln.$nro_serie2,30,5);
$pdf->SetXY(146,52);
$pdf->Write(10,$gln.$nro_serie2);

$pdf->Ln();
$pdf->Ln();

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(11,70,$gln.$nro_serie2,30,5);
$pdf->SetXY(5,72);
$pdf->Write(10,$gln.$nro_serie2);

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(60,70,$gln.$nro_serie2,30,5);
$pdf->SetXY(54,72);
$pdf->Write(10,$gln.$nro_serie2);

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(105,70,$gln.$nro_serie2,30,5);
$pdf->SetXY(100,72);
$pdf->Write(10,$gln.$nro_serie2);

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(150,70,$gln.$nro_serie2,30,5);
$pdf->SetXY(146,72);
$pdf->Write(10,$gln.$nro_serie2);

$pdf->Ln();
$pdf->Ln();

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(11,90,$gln.$nro_serie2,30,5);
$pdf->SetXY(5,92);
$pdf->Write(10,$gln.$nro_serie2);

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(60,90,$gln.$nro_serie2,30,5);
$pdf->SetXY(54,92);
$pdf->Write(10,$gln.$nro_serie2);

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(105,90,$gln.$nro_serie2,30,5);
$pdf->SetXY(100,92);
$pdf->Write(10,$gln.$nro_serie2);

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(150,90,$gln.$nro_serie2,30,5);
$pdf->SetXY(146,92);
$pdf->Write(10,$gln.$nro_serie2);

$pdf->Ln();
$pdf->Ln();

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(11,110,$gln.$nro_serie2,30,5);
$pdf->SetXY(5,112);
$pdf->Write(10,$gln.$nro_serie2);

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(60,110,$gln.$nro_serie2,30,5);
$pdf->SetXY(54,112);
$pdf->Write(10,$gln.$nro_serie2);

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(105,110,$gln.$nro_serie2,30,5);
$pdf->SetXY(100,112);
$pdf->Write(10,$gln.$nro_serie2);

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(150,110,$gln.$nro_serie2,30,5);
$pdf->SetXY(146,112);
$pdf->Write(10,$gln.$nro_serie2);

$pdf->Ln();
$pdf->Ln();

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(11,130,$gln.$nro_serie2,30,5);
$pdf->SetXY(5,132);
$pdf->Write(10,$gln.$nro_serie2);

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(60,130,$gln.$nro_serie2,30,5);
$pdf->SetXY(54,132);
$pdf->Write(10,$gln.$nro_serie2);

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(105,130,$gln.$nro_serie2,30,5);
$pdf->SetXY(100,132);
$pdf->Write(10,$gln.$nro_serie2);

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(150,130,$gln.$nro_serie2,30,5);
$pdf->SetXY(146,132);
$pdf->Write(10,$gln.$nro_serie2);

$pdf->Ln();
$pdf->Ln();

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(11,150,$gln.$nro_serie2,30,5);
$pdf->SetXY(5,152);
$pdf->Write(10,$gln.$nro_serie2);

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(60,150,$gln.$nro_serie2,30,5);
$pdf->SetXY(54,152);
$pdf->Write(10,$gln.$nro_serie2);

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(105,150,$gln.$nro_serie2,30,5);
$pdf->SetXY(100,152);
$pdf->Write(10,$gln.$nro_serie2);

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(150,150,$gln.$nro_serie2,30,5);
$pdf->SetXY(146,152);
$pdf->Write(10,$gln.$nro_serie2);

$pdf->Ln();
$pdf->Ln();

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(11,170,$gln.$nro_serie2,30,5);
$pdf->SetXY(5,172);
$pdf->Write(10,$gln.$nro_serie2);

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(60,170,$gln.$nro_serie2,30,5);
$pdf->SetXY(54,172);
$pdf->Write(10,$gln.$nro_serie2);

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(105,170,$gln.$nro_serie2,30,5);
$pdf->SetXY(100,172);
$pdf->Write(10,$gln.$nro_serie2);

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(150,170,$gln.$nro_serie2,30,5);
$pdf->SetXY(146,172);
$pdf->Write(10,$gln.$nro_serie2);

$pdf->Ln();
$pdf->Ln();

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(11,190,$gln.$nro_serie2,30,5);
$pdf->SetXY(5,192);
$pdf->Write(10,$gln.$nro_serie2);

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(60,190,$gln.$nro_serie2,30,5);
$pdf->SetXY(54,192);
$pdf->Write(10,$gln.$nro_serie2);

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(105,190,$gln.$nro_serie2,30,5);
$pdf->SetXY(100,192);
$pdf->Write(10,$gln.$nro_serie2);

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(150,190,$gln.$nro_serie2,30,5);
$pdf->SetXY(146,192);
$pdf->Write(10,$gln.$nro_serie2);


$pdf->Ln();
$pdf->Ln();

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(11,210,$gln.$nro_serie2,30,5);
$pdf->SetXY(5,212);
$pdf->Write(10,$gln.$nro_serie2);

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(60,210,$gln.$nro_serie2,30,5);
$pdf->SetXY(54,212);
$pdf->Write(10,$gln.$nro_serie2);

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(105,210,$gln.$nro_serie2,30,5);
$pdf->SetXY(100,212);
$pdf->Write(10,$gln.$nro_serie2);

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(150,210,$gln.$nro_serie2,30,5);
$pdf->SetXY(146,212);
$pdf->Write(10,$gln.$nro_serie2);

$pdf->Ln();
$pdf->Ln();

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(11,230,$gln.$nro_serie2,30,5);
$pdf->SetXY(5,232);
$pdf->Write(10,$gln.$nro_serie2);

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(60,230,$gln.$nro_serie2,30,5);
$pdf->SetXY(54,232);
$pdf->Write(10,$gln.$nro_serie2);

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(105,230,$gln.$nro_serie2,30,5);
$pdf->SetXY(100,232);
$pdf->Write(10,$gln.$nro_serie2);

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(150,230,$gln.$nro_serie2,30,5);
$pdf->SetXY(146,232);
$pdf->Write(10,$gln.$nro_serie2);

$pdf->Ln();
$pdf->Ln();

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(11,250,$gln.$nro_serie2,30,5);
$pdf->SetXY(5,252);
$pdf->Write(10,$gln.$nro_serie2);

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(60,250,$gln.$nro_serie2,30,5);
$pdf->SetXY(54,252);
$pdf->Write(10,$gln.$nro_serie2);

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(105,250,$gln.$nro_serie2,30,5);
$pdf->SetXY(100,252);
$pdf->Write(10,$gln.$nro_serie2);

$nro_serie2 = $nro_serie2 + 1;

$pdf->Code128(150,250,$gln.$nro_serie2,30,5);
$pdf->SetXY(146,252);
$pdf->Write(10,$gln.$nro_serie2);



} // fin matriz

 $sql = "INSERT INTO `gtin_propios` (`nro_serie`) VALUES ('$nro_serie2')";
$result = $db->Execute($sql);


$pdf->Output();

 

?>


