<?php

/*
clase para reportes 
autor Carlos Belisario
*/
//require_once("../../../conexiones/config_pro.php");
require_once("../../drivers/fpdf/fpdf.php");

$uno = 10;
$datay=array($uno);


// Create the graph. These two calls are always required
$graph = new Graph(850,400,'auto');
$graph->SetScale("textlin");

//$theme_class="DefaultTheme";
//$graph->SetTheme(new $theme_class());

// set major and minor tick positions manually
$graph->yaxis->SetTickPositions(array(0,1,2,3,4,5,6,7,8,9,10,20,40, 60 , 80, 100), array(15,45,75,105,135,165,195,225,255,285,315,345));
$graph->SetBox(false);

//$graph->ygrid->SetColor('gray');
$graph->ygrid->SetFill(false);
$graph->xaxis->SetTickLabels(array('ENE','FEB','MAR','ABR', 'MAY' ,'JUN' , 'JUL' ,'AGO' ,'SET' , 'OCT' , 'NOV' ,'DIC'));
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