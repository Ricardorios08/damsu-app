<?php

/*
clase para reportes 
autor Carlos Belisario
*/
require_once("../../../conexiones/config_pro.php");
require_once("../../../drivers/fpdf/fpdf.php");
require_once('../../../drivers/jpgraph/src/jpgraph.php');
require_once ('../../../drivers/jpgraph/src/jpgraph_bar.php');
$anio = "2012";
include ("meses_cantidad.php");



$datay=array($uno,$dos,$tres,$cuatro,$cinco,$seis,$siete,$ocho,$nueve,$diez,$once, $doce);

$uno1 = "ENE: ".$uno;

// Create the graph. These two calls are always required
$graph = new Graph(850,400,'auto');
$graph->SetScale("textlin");

//$theme_class="DefaultTheme";
//$graph->SetTheme(new $theme_class());

// set major and minor tick positions manually
$graph->yaxis->SetTickPositions(array(0,50,100,150,200,250,300,350,400,450,500,550,600, 650 , 800, 900), array(15,45,75,105,135,165,195,225,255,285,315,345));
$graph->SetBox(false);

//$graph->ygrid->SetColor('gray');
$graph->ygrid->SetFill(false);
$graph->xaxis->SetTickLabels(array($uno1,'FEB','MAR','ABR', 'MAY' ,'JUN' , 'JUL' ,'AGO' ,'SET' , 'OCT' , 'NOV' ,'DIC'));

$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

// Create the bar plots
$b1plot = new BarPlot($datay);

// ...and add it to the graPH
$graph->Add($b1plot);


$b1plot->SetColor("white");
$b1plot->SetFillGradient("#4B0082","white",GRAD_LEFT_REFLECTION);
$b1plot->SetWidth(45);
$graph->title->Set("PACIENTES POR MES");

// Display the graph
$graph->Stroke();