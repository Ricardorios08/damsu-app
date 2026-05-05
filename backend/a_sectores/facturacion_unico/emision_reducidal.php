<?php
$nro_paciente;
require('../../../drivers/fpdf/fpdf.php');
require('../../../drivers/fpdf/mc_table.php');
include("../../../conexiones/config.inc.php");

$sql="select * from informe";
$result = $db->Execute($sql);
$caratula=strtoupper($result->fields["caratula"]);
$hoja=strtoupper($result->fields["hoja"]);
$firma=strtoupper($result->fields["firma"]);

$sql="select * from datos_principales";
$result = $db->Execute($sql);
$nombre_laboratorio=strtoupper($result->fields["nombre_laboratorio"]);
$direccion=strtoupper($result->fields["direccion"]);
$localidad=strtoupper($result->fields["localidad"]);
$telefono=strtoupper($result->fields["telefono"]);
$mail=$result->fields["mail"];


$ren1 = $direccion." ".$localidad." ".$telefono;
$ren2 = $mail;


class PDF2 extends FPDF
{

    var $nroPac;
//Page header
function Header()
{
    //Logo

	$a = "5x3 freixas.jpg";
	$a = "sistema.png";

$this->SetY(3);
  $this->Image('../../../logos/'.$a,150,1,50);
//$this->SetTextColor(50,60,100); 
    //Arial bold 15
$this->SetFont('Arial','',8);


$this->ln();
$this->Cell(40,5,'Nº Protocolo: '.$this->getPaciente());
$this->ln();
$this->Cell(40,5,'Fecha: '.$this->getFecha());
$this->ln();
$this->Cell(40,5,'Paciente: '.$this->getNombre());
$this->Sety(25);
$this->Setx(150);
$this->ln();
}

function Footer()
{
	


$this->SetY(-25);
  

    //Select Arial italic 8
    $this->Ln();
    $this->SetFont('Arial','I',8);
    //Print centered page number

  $this->Cell(0,5,$this->getRenglon(),0,0,'C');
$this->Ln();
    $this->Cell(0,5,$this->getRenglon2(),0,0,'C');

$this->Ln();
    $this->Cell(0,5,$this->PageNo(),0,0,'C');


}


function setPaciente($nropac) {
    $this->nroPac = $nropac;
}

function getPaciente() {
    return $this->nroPac;
}


function setFecha($nrofec) {
    $this->nroFec = $nrofec;
}

function getFecha() {
    return $this->nroFec;
}

function setNombre($nom) {
    $this->nroNom = $nom;
}

function getNombre() {
    return $this->nroNom;
}

function setRenglon($ren) {
    $this->nroRen= $ren;
}

function getRenglon() {
    return $this->nroRen;
}


function setRenglon2($ren2) {
    $this->nroRen2= $ren2;
}

function getRenglon2() {
    return $this->nroRen2;
}

var $widths;
var $aligns;

function SetWidths($w)
{
	//Set the array of column widths
	$this->widths=$w;
}

function SetAligns($a)
{
	//Set the array of column alignments
	$this->aligns=$a;
}

function Row($data)
{
	//Calculate the height of the row
	$nb=0;
	for($i=0;$i<count($data);$i++)
		$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	$h=5*$nb;
	//Issue a page break first if needed
	$this->CheckPageBreak($h);
	//Draw the cells of the row
	for($i=0;$i<count($data);$i++)
	{
		$w=$this->widths[$i];
		$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'R';
		//Save the current position
		$x=$this->GetX();
		$y=$this->GetY();
		//Draw the border
//		$this->Rect($x,$y,$w,$h);
		//Print the text
		$this->MultiCell($w,5,$data[$i],0,$a);
		//Put the position to the right of the cell
		$this->SetXY($x+$w,$y);
	}
	//Go to the next line
	$this->Ln($h);
}

function CheckPageBreak($h)
{
	//If the height h would cause an overflow, add a new page immediately
	if($this->GetY()+$h>$this->PageBreakTrigger)
		$this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
	//Computes the number of lines a MultiCell of width w will take
	$cw=&$this->CurrentFont['cw'];
	if($w==0)
		$w=$this->w-$this->rMargin-$this->x;
	$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	$s=str_replace("\r",'',$txt);
	$nb=strlen($s);
	if($nb>0 and $s[$nb-1]=="\n")
		$nb--;
	$sep=-1;
	$i=0;
	$j=0;
	$l=0;
	$nl=1;
	while($i<$nb)
	{
		$c=$s[$i];
		if($c=="\n")
		{
			$i++;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
			continue;
		}
		if($c==' ')
			$sep=$i;
		$l+=$cw[$c];
		if($l>$wmax)
		{
			if($sep==-1)
			{
				if($i==$j)
					$i++;
			}
			else
				$i=$sep+1;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
		}
		else
			$i++;
	}
	return $nl;
}

}

//Instanciation of inherited class
$pdf=new PDF2('L','mm',$hoja); 
$pdf->SetDisplayMode(real,'default'); 

//$pdftest=new PDF2();
$pdf->AliasNbPages();
//$pdf->AddPage();
$pdf->SetFont('Times','',12);

$sql = "SELECT * FROM archivos";
$result = $db->Execute($sql);
$id=$result->fields["id"];


$sql="select * from pacientes where nro_paciente = $nro_paciente";
$result = $db->Execute($sql);
$nombre=$result->fields["nombre"];



$domicilio = $direccion." - ".$localidad." - ".$telefono;
$sql="select * from pacientes where nro_paciente = $nro_paciente";
$result = $db->Execute($sql);

$nro_paciente=$result->fields["nro_paciente"];
$nombre=strtoupper($result->fields["nombre"]);
$nro_os=$result->fields["nro_os"];
$nro_documento=$result->fields["nro_documento"];

$sql1="select * from datos_os where nro_os = '$nro_os'";
$result1 = $db->Execute($sql1);
$nombre_os=strtoupper($result1->fields["sigla"]);


$pdf->setPaciente($cod_grabacion);
$pdf->setFecha($fecha_mostrar);
$pdf->setNombre($nombre);

$pdf->setRenglon($ren1);
$pdf->setRenglon2($ren2);

if ($caratula == "SI"){

$pdf->AddPage();
$pdf->Cell(40,10,'INFORME PACIENTE');
}


#echo $pdftest->getPaciente();
for($i=1;$i<=40;$i++)
//    $pdftest->Cell(0,10,'Printing line number '.$i,0,1);


//$pdf=new PDF('L','mm',$hoja); 





$sql2="select * from ordenes join detalle on (ordenes.cod_grabacion = detalle.cod_grabacion) where ordenes.nro_paciente = $nro_paciente and ordenes.cod_grabacion = $cod_grabacion order by detalle.prioridad, detalle.nro_practica";
$result2 = $db->Execute($sql2);

if (!$result2) die("fallo".$db->ErrorMsg());
 while (!$result2->EOF) {


$nro_os=strtoupper($result2->fields["nro_os"]);
$nro_paciente=strtoupper($result2->fields["nro_paciente"]);
$periodo=strtoupper($result2->fields["periodo"]);
$marca=strtoupper($result2->fields["marca"]);
$lote=strtoupper($result2->fields["lote"]);
$cod_operacion=strtoupper($result2->fields["cod_operacion"]);
$año=strtoupper($result2->fields["ano"]);
$nro_afiliado=$result2->fields["nro_afiliado"];
$nro_orden=$result2->fields["nro_orden"];
$autorizacion=strtoupper($result2->fields["autorizacion"]);
$operador=strtoupper($result2->fields["operador"]);
$cod_grabacion=strtoupper($result2->fields["cod_grabacion"]);
$fecha_grabacion=strtoupper($result2->fields["fecha_grabacion"]);
$fecha=strtoupper($result2->fields["fecha"]);
$matricula=strtoupper($result2->fields["matricula"]);
$prescriptor=strtoupper($result2->fields["medico"]);
$confirmada=strtoupper($result2->fields["confirmada"]);
$nro_practica=strtoupper($result2->fields["nro_practica"]);



if ($nro_practica == 711){


$pdf->AddPage();

$pdf->Ln();

 $sql11="select * from detalle_orina where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$valor=strtoupper($result11->fields["valor"]);
$referencia=strtoupper($result11->fields["referencia"]);


$densidad=strtoupper($result11->fields["densidad"]);
$color=strtoupper($result11->fields["color"]);
$aspecto=strtoupper($result11->fields["aspecto"]);
$sedimento=strtoupper($result11->fields["sedimento"]);
$reaccion=strtoupper($result11->fields["reaccion"]);
$proteinas=strtoupper($result11->fields["proteinas"]);
$glucosa=strtoupper($result11->fields["glucosa"]);
$biliares=strtoupper($result11->fields["biliares"]);
$cetonicos=strtoupper($result11->fields["cetonicos"]);
$hemoglobina=strtoupper($result11->fields["hemoglobina"]);
$epiteliales=strtoupper($result11->fields["epiteliales"]);
$leucocito=strtoupper($result11->fields["piocitos"]);
$piocitos=strtoupper($result11->fields["piocitos"]);
$hematies=strtoupper($result11->fields["hematies"]);
$cilindros=strtoupper($result11->fields["cilindros"]);
$mucus=strtoupper($result11->fields["mucus"]);
$uratos=strtoupper($result11->fields["uratos"]);
$observaciones_orina =strtoupper($result11->fields["observaciones"]);



 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];


$pdf->SetFont('Arial','BIU',8);
$pdf->Cell(40,10,'DETERMINACION: '.$nro_practica.' - '.$nombre_practica);
$pdf->SetFont('Arial','B',8);
$pdf->ln();


$pdf->Cell(50,5,"EXAMEN FISICO",0);     
$pdf->Cell(50,5,"NORMAL",0);
$pdf->Cell(40,5,"EXAMINADA",0); 
$pdf->Cell(50,5,"EXAMEN QUIMICO",0);

$pdf->Ln();
 $pdf->line(10,50,200,50);

$pdf->Cell(50,5,"Densidad a 15* ",0);     
$pdf->Cell(50,5,"1015-1025",0);
$pdf->Cell(40,5,$densidad,0); 
$pdf->Cell(20,5,"Proteinas",0);
$pdf->Cell(60,5,$proteinas,0);     
$pdf->Ln(); 

$pdf->Cell(50,5,"Color",0);     
$pdf->Cell(50,5,"Am Ambar ",0);
$pdf->Cell(40,5,$color,0); 
$pdf->Cell(20,5,"Glucosa",0);
$pdf->Cell(60,5,$glucosa,0);     
$pdf->Ln(); 

$pdf->Cell(50,5,"Aspecto",0);     
$pdf->Cell(50,5,"Limpido",0);
$pdf->Cell(40,5,$aspecto,0); 
$pdf->Cell(20,5,"Pig. Biliares",0);
$pdf->Cell(60,5,$biliares,0);     
$pdf->Ln(); 

$pdf->Cell(50,5,"Sedimento",0);     
$pdf->Cell(50,5,"Escaso",0);
$pdf->Cell(40,5,$sedimento,0); 
$pdf->Cell(20,5,"Proteinas",0);
$pdf->Cell(60,5,$cetonicos,0);     
$pdf->Ln(); 

$pdf->Cell(50,5,"Reacción",0);     
$pdf->Cell(50,5,"Acida",0);
$pdf->Cell(40,5,$reaccion,0); 
$pdf->Cell(20,5,"Proteinas",0);
$pdf->Cell(60,5,$hemoglobina,0);     
$pdf->Ln(); 

$pdf->Cell(0,10,"EXAMEN MICROSCOPICO DEL SEDIMENTO",0,0,'C');
$pdf->Ln(); 
$pdf->line(10,83,200,83);

$pdf->Cell(50,5,"CELULAS EPITELIALES",0); 
$pdf->Cell(40,5,$epiteliales,0);

$pdf->Ln(); 
$pdf->Cell(50,5,"LEUCOCITOS",0); 
$pdf->Cell(40,5,$leucocito,0);

$pdf->Ln(); 
$pdf->Cell(50,5,"PIOCITOS (pl. de pus) ",0); 
$pdf->Cell(40,5,$piocitos,0);

$pdf->Ln(); 
$pdf->Cell(50,5,"HEMATIES",0); 
$pdf->Cell(40,5,$hematies,0);

$pdf->Ln(); 
$pdf->Cell(50,5,"CILINDROS",0); 
$pdf->Cell(40,5,$cilindros,0);

$pdf->Ln(); 
$pdf->Cell(50,5,"ESTRIAS DE MUCUS ",0); 
$pdf->Cell(40,5,$mucus,0);

$pdf->Ln(); 
$pdf->Cell(50,5,"URATOS AMORFOS",0); 
$pdf->Cell(40,5,$uratos,0);


$pdf->Ln(); 
$pdf->Cell(50,5,"OBSERVACIONES",0);
$pdf->Cell(50,5,$observaciones_orina,0);     


}elseif ($nro_practica == 736){

	$pdf->AddPage();
//include ("enca_pdf.php");

$pdf->Ln();
 $sql11="select * from detalle_fecal where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$metodo_macro=strtoupper($result11->fields["metodo_macro"]);
$macroscopico=strtoupper($result11->fields["macroscopico"]);
$metodo_micro=strtoupper($result11->fields["metodo_micro"]);
$microscopico=strtoupper($result11->fields["microscopico"]);
$observaciones_fecal=strtoupper($result11->fields["observaciones"]);


 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];

$pdf->SetFont('Arial','BIU',8);
$pdf->Cell(40,10,'DETERMINACION: '.$nro_practica.' - '.$nombre_practica);
$pdf->SetFont('Arial','B',8);
$pdf->ln();

$pdf->Cell(50,5,"EXAMEN MACROSCOPICO",0);     
$pdf->Cell(40,5,"METODO: ".$metodo_macro,0); 
$pdf->ln();

$pdf->SetX(60);
$pdf->Cell(90,5,"RESULTADO: ".$macroscopico,0); 

$pdf->ln();



$pdf->Cell(50,5,"EXAMEN MICROSCOPICO",0);
$pdf->Cell(40,5,"METODO: ".$metodo_micro,0);     
$pdf->ln();

$pdf->SetX(60);
$pdf->Cell(50,5,"RESULTADO: ".$microscopico,0);  

$pdf->ln();
$pdf->ln();

$pdf->Cell(50,5,"OBSERVACIONES",0);
$pdf->Cell(60,5,$observaciones_fecal,0);     
$pdf->ln();




}elseif ($nro_practica == 475){


$pdf->AddPage();
//include ("enca_pdf.php");



$pdf->Ln();

 $sql11="select * from detalle_hemo where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$hematies=strtoupper($result11->fields["hematies"]);
$hemoglobina=strtoupper($result11->fields["hemoglobina"]);
$hematocrito=strtoupper($result11->fields["hematocrito"]);
$reticulocitos=strtoupper($result11->fields["reticulocitos"]);
$plaquetas=strtoupper($result11->fields["plaquetas"]);
$mcv=strtoupper($result11->fields["mcv"]);
$mch=strtoupper($result11->fields["mch"]);
$mchc=strtoupper($result11->fields["mchc"]);

$leucocitos=strtoupper($result11->fields["leucocitos"]);
$neutro_cayado=strtoupper($result11->fields["neutro_cayado"]);
$neutro_segmentado=strtoupper($result11->fields["neutro_segmentado"]);
$eosinofilos=strtoupper($result11->fields["eosinofilos"]);
$basofilos=strtoupper($result11->fields["basofilos"]);
$linfocitos=strtoupper($result11->fields["linfocitos"]);
$monocitos=strtoupper($result11->fields["monocitos"]);



$carac_plaquetas=strtoupper($result11->fields["carac_plaquetas"]);
$carac_leucocitos=strtoupper($result11->fields["carac_leucocitos"]);
$carac_hematies=strtoupper($result11->fields["carac_hematies"]);

$observaciones =strtoupper($result11->fields["observaciones"]);
$formula =strtoupper($result11->fields["formula"]);


 $absoluto_neutro_cayado = $leucocitos * $neutro_cayado/100;
$absoluto_neutro_segmentado= $leucocitos * $neutro_segmentado/100;
$absoluto_eosinofilos= $leucocitos * $eosinofilos/100;
$absoluto_basofilos= $leucocitos * $basofilos/100;
$absoluto_linfocitos= $leucocitos * $linfocitos/100;
$absoluto_monocitos= $leucocitos * $monocitos/100;

$total_leucocitos = $neutro_cayado + $neutro_segmentado + $eosinofilos + $basofilos + $linfocitos + $monocitos;
$total_absoluto_leucocitos = $absoluto_neutro_cayado + $absoluto_neutro_segmentado + $absoluto_eosinofilos + $absoluto_basofilos + $absoluto_linfocitos + $absoluto_monocitos;


 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];


$pdf->SetFont('Arial','BIU',8);
$pdf->Cell(40,10,'DETERMINACION: '.$nro_practica.' - '.$nombre_practica);
$pdf->SetFont('Arial','',8);

$pdf->SetX(145);
$pdf->Cell(40,10,"VALOR RELATIVO");

if ($formula == "SI"){
	
$pdf->SetX(175);
$pdf->Cell(40,10,"VALOR ABSOLUTO");
}



$pdf->ln();

  $pdf->Cell(50,5,"Hematies",0);     
  $pdf->Cell(40,5,$hematies,0); 
  $pdf->Cell(50,5,"Leucocito",0);
  $pdf->Cell(60,5,$leucocitos." /mm³",0);     
  $pdf->Ln(); //Esto hace un cambio de línea 
  /////////////////////////////
  $pdf->Cell(50,5,"Hemoglobina",0);     
  $pdf->Cell(40,5,$hemoglobina,0); 

$pdf->SetX(120);
  $pdf->Cell(50,5,"FORMULA LEUCOCITARIA CADA 100 LEUCOCITOS",0);
  $pdf->Ln(); //Esto hace un cambio de línea 
  /////////////////////////////
  $pdf->Cell(50,5,"Hematocrito",0);     
  $pdf->Cell(40,5,$hematocrito,0); 
  $pdf->Cell(50,5,"Neutrófilos en cayado",0);
  $pdf->Cell(60,5,$neutro_cayado,0);
 
  $pdf->SetX(160);
  $pdf->Cell(60,5,"%");

if ($formula == "SI"){
$pdf->SetX(185);
$pdf->Cell(60,5,$absoluto_neutro_cayado);
$pdf->SetX(195);
$pdf->Cell(60,5,"mm³");
}

  $pdf->Ln(); //Esto hace un cambio de línea 
  /////////////////////////////
  $pdf->Cell(50,5,"Reticulocitos",0);     
  $pdf->Cell(40,5,$reticulocitos,0); 
  $pdf->Cell(50,5,"Neutrófilos segmentado",0);
  $pdf->Cell(60,5,$neutro_segmentado,0);  
  $pdf->SetX(160);
  $pdf->Cell(60,5,"%");

 if ($formula == "SI"){
$pdf->SetX(185);
$pdf->Cell(60,5,$absoluto_neutro_segmentado);
$pdf->SetX(195);
$pdf->Cell(60,5,"mm³");
}

  $pdf->Ln(); //Esto hace un cambio de línea 
  /////////////////////////////
  $pdf->Cell(50,5,"Plaquetas",0);     
  $pdf->Cell(40,5,$plaquetas,0); 
  $pdf->Cell(50,5,"Eosinofilos",0);
  $pdf->Cell(60,5,$eosinofilos,0);    
  $pdf->SetX(160);
  $pdf->Cell(60,5,"%");
  

   if ($formula == "SI"){
	   
$pdf->SetX(185);
$pdf->Cell(60,5,$absoluto_eosinofilos);
$pdf->SetX(195);
$pdf->Cell(60,5,"mm³");
}

  $pdf->Ln(); //Esto hace un cambio de línea 
  /////////////////////////////
  $pdf->Cell(50,5,"MCV FL(M80-99,f91-99)",0);     
  $pdf->Cell(40,5,$mcv,0); 
  $pdf->Cell(50,5,"Basófilos",0);
  $pdf->Cell(60,5,$basofilos,0);  
  $pdf->SetX(160);
  $pdf->Cell(60,5,"%");
     if ($formula == "SI"){
$pdf->SetX(185);
$pdf->Cell(60,5,$absoluto_basofilos);
$pdf->SetX(195);
$pdf->Cell(60,5,"mm³");
}

  $pdf->Ln(); //Esto hace un cambio de línea 
  /////////////////////////////
  $pdf->Cell(50,5,"MCH pg(MyF 27-31)",0);     
  $pdf->Cell(40,5,$mch,0); 
  $pdf->Cell(50,5,"Linfocitos",0);
  $pdf->Cell(60,5,$linfocitos,0); 
  $pdf->SetX(160);
  $pdf->Cell(60,5,"%");

     if ($formula == "SI"){
$pdf->SetX(185);
$pdf->Cell(60,5,$absoluto_linfocitos);
$pdf->SetX(195);
$pdf->Cell(60,5,"mm³");
}
  $pdf->Ln(); //Esto hace un cambio de línea 
  /////////////////////////////
  $pdf->Cell(50,5,"MCHC g/d1 /MyF 30-35)",0);     
  $pdf->Cell(40,5,$mchc,0); 
  $pdf->Cell(50,5,"Monocitos",0);
  $pdf->Cell(60,5,$monocitos,0);   
  $pdf->SetX(160);
  $pdf->Cell(60,5,"%");


if ($formula == "SI"){
$pdf->SetX(185);
$pdf->Cell(60,5,$absoluto_monocitos);
$pdf->SetX(195);
$pdf->Cell(60,5,"mm³");
}

if ($formula == "SI"){
  $pdf->line(100,85,203,85);
  $pdf->Ln(); 
  }else{
  $pdf->line(100,85,170,85);
  $pdf->Ln(); 
	  }
  /////////////////////////////


$pdf->SetX(150);
$pdf->Cell(60,5,$total_leucocitos);
$pdf->SetX(160);
$pdf->Cell(60,5,"%");


if ($formula == "SI"){
$pdf->SetX(185);
$pdf->Cell(60,5,$total_absoluto_leucocitos);
$pdf->SetX(195);
$pdf->Cell(60,5,"mm³");
}


  $pdf->Ln(); //Esto hace un cambio de línea 
$pdf->Cell(50,6,"PLAQUETAS",0);
$pdf->Cell(60,6,$carac_plaquetas,0); 



$pdf->Ln();

$pdf->Cell(50,6,"LEUCOCITOS",0);
$pdf->Cell(60,6,$carac_leucocitos,0); 
$pdf->Ln();

$pdf->Cell(50,6,"HEMATIES",0);
$pdf->Cell(60,6,$carac_hematies,0); 
$pdf->Ln();

$pdf->Ln();
 $pdf->line(10,112,200,112);
$pdf->Cell(50,6,"OBSERVACIONES",0);
$pdf->Cell(60,6,$observaciones,0); 

}elseif ($nro_practica == 471){

$pdf->AddPage();
//include ("enca_pdf.php");

$pdf->Ln();

 $sql11="select * from detalle_hemoglobina where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$albumina=strtoupper($result11->fields["albumina"]);
$alfa_1=strtoupper($result11->fields["alfa_1"]);
$alfa_2=strtoupper($result11->fields["alfa_2"]);
$beta=strtoupper($result11->fields["beta"]);
$gamma=strtoupper($result11->fields["gamma"]);
$relacion_ag=strtoupper($result11->fields["relacion_ag"]);
$proteinas_totales=strtoupper($result11->fields["proteinas_totales"]);
$observaciones =strtoupper($result11->fields["observaciones"]);



 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);


$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];


$pdf->SetFont('Arial','BIU',8);
$pdf->Cell(40,10,'DETERMINACION: '.$nro_practica.' - '.$nombre_practica);
$pdf->SetFont('Arial','B',8);
$pdf->ln();


$pdf->Cell(50,5,"",0);     
$pdf->Cell(50,5,"VALORES",0);   
$pdf->Cell(50,5,"HALLADOS",0);  
$pdf->Cell(50,5,"",0);  
$pdf->ln();

$pdf->Cell(50,5,"Albumina",0);     
$pdf->Cell(50,5,"0.02",0);   
$pdf->Cell(50,5,$albumina,0);  
$pdf->Cell(50,5,"3.64 A 4.66 GR % [Adultos]",0);  
$pdf->ln();
//////
$pdf->Cell(50,5,"Alfa 1 globulina ",0);     
$pdf->Cell(50,5,"0.02",0);   
$pdf->Cell(50,5,$alfa_1,0);  
$pdf->Cell(50,5,"0.17 A 0.33 GR % [Adultos]",0);  
$pdf->ln();

$pdf->Cell(50,5,"Alfa 2 globulina ",0);     
$pdf->Cell(50,5,"0.02",0);   
$pdf->Cell(50,5,$alfa_2,0);  
$pdf->Cell(50,5,"0.53 A 0.75 GR % [Adultos]",0);  
$pdf->ln();

$pdf->Cell(50,5,"Beta globulina",0);     
$pdf->Cell(50,5,"0.02",0);   
$pdf->Cell(50,5,$beta,0);  
$pdf->Cell(50,5,"0.51 A 0.91 GR % [Adultos]",0);  
$pdf->ln();

$pdf->Cell(50,5,"Gamma globulina",0);     
$pdf->Cell(50,5,"0.02",0);   
$pdf->Cell(50,5,$gamma,0);  
$pdf->Cell(50,5,"0.84 A 1.68 GR % [Adultos] ",0);  
$pdf->ln();

$pdf->Cell(50,5,"Relacion a/g",0);     
$pdf->Cell(50,5,"0.02",0);   
$pdf->Cell(50,5,$relacion_ag,0);  
$pdf->Cell(50,5,"1.10 A 1.84 GR % [Adultos] ",0);  
$pdf->ln();

$pdf->Ln(); 
 $pdf->line(10,83,200,83);
$pdf->Cell(50,5,"PROTEINAS TOTALES",0);     
$pdf->Cell(50,5,"",0);   
$pdf->Cell(50,5,$proteinas_totales,0);  
$pdf->Cell(50,5,"",0);  
$pdf->ln();



/////////////////////////////

$pdf->Ln();
$pdf->Ln();
 $pdf->line(10,100,200,100);
$pdf->Cell(50,6,"OBSERVACIONES",0);
$pdf->Cell(60,6,$observaciones,0); 



	}else{






$conta_comun = $conta_comun + 1;



IF (($conta_comun == 1) or ($conta_comun == 0)){
$pdf->AddPage();
//include ("enca_pdf.php");

$pdf->ln();


}


//$pdf->Cell(50,5,'conta: '.$conta_comun);

$sql11="select * from detalle_referencia where cod_grabacion = $cod_grabacion and nro_practica = $nro_practica";
$result11 = $db->Execute($sql11);


$valor=$result11->fields["valor"];
$referencia=$result11->fields["referencia"];
$referencia1=$result11->fields["referencia1"];
$referencia2=$result11->fields["referencia2"];
$referencia3=$result11->fields["referencia3"];


$observaciones=strtoupper($result11->fields["observaciones"]);




 $sql11="select * from convenio_practica where cod_practica =  $nro_practica";
$result11 = $db->Execute($sql11);
$nombre_practica=strtoupper($result11->fields["practica"]);
$unidad=$result11->fields["unidad"];

$salto=$result11->fields["salto"];

$metodo=$result11->fields["metodo"];
//$metodo = nl2br( stripslashes( htmlentities($metodo)));



$pdf->SetFont('Arial','BI',8);
$pdf->Cell(100,5,$nro_practica.' - '.$nombre_practica);

$pdf->SetX(101);
$pdf->Cell(100,5,"VALOR HALLADO: ".$valor." ".$unidad);
$pdf->SetFont('Arial','B',8);

//$pdf->Cell(50,5,$valor);
//$pdf->MultiCell(0,5,$html);

if ($metodo != ""){
$pdf->ln();
$pdf->SetX(17);
$pdf->SetFont('Arial','',8);
$pdf->Cell(50,5,'Método: '.$metodo);
$pdf->ln();
}else{
$pdf->ln();
$pdf->SetX(17);
$pdf->SetFont('Arial','',8);
//$pdf->Cell(50,5,'Método: '.$metodo);
$pdf->ln();

}

$pdf->SetFont('Arial','',7);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(46,46,46,46));
//$pdf->SetWidths(array(46,46,46,46));
srand(microtime()*1000000);
$pdf->Row(array($referencia,$referencia1,$referencia2,$referencia3));



/*$pdf->MultiCell(0,3,$header);
$pdf->SetX(60);
$pdf->MultiCell(0,3,$referencia1);
$pdf->SetX(60);
$pdf->MultiCell(0,3,$referencia2);
$pdf->SetX(60);
$pdf->MultiCell(0,3,$referencia4);
*/



/*$html='<table width="600" border="0">
  <tr>
    <td width="263" bgcolor="#DDDDDD"><div align="center" class="Estilo2">'.$pdf->MultiCell(0,3,$referencia).'</div></td>
    <td width="111" bgcolor="#DDDDDD"><div align="center" class="Estilo2">'.$pdf->MultiCell(0,3,$referencia1).'</div></td>
    <td width="111" bgcolor="#DDDDDD"><div align="center" class="Estilo2">'.$pdf->MultiCell(0,3,$referencia2).'</div></td>
    <td width="97" bgcolor="#DDDDDD"><div align="center" class="Estilo2">'.$pdf->MultiCell(0,3,$referencia3).'</div></td>
  </tr>
</table>';

$pdf->WriteHTML($html);
*/


/*

*/






//$pdf->Cell(50,5,'Observaciones: '.$Observaciones); 
//$pdf->ln();



if ($conta_comun == 5){
//$pdf->AddPage();
$conta_comun = 0;
}

}


$result2->MoveNext();

	}



/// fin

if ($firma == "SI"){
include ("firma.php");
}





$pdf->Output();


// 428-7755