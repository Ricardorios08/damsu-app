<?php // content="text/plain; charset=utf-8"
require_once("../../../conexiones/config_pro.php");
require_once("../../../drivers/fpdf/fpdf.php");
require_once('../../../drivers/jpgraph/src/jpgraph.php');
require_once ('../../../drivers/jpgraph/src/jpgraph_bar.php');
$anio = "2012";

$sql7="select departamento from `est_departamento` group by departamento";
$result7 = $db->Execute($sql7);

  if (!$result7) die("fallo".$db->ErrorMsg());
  while (!$result7->EOF) {


$departamento=strtoupper($result7->fields["departamento"]); // numero

include ("meses_cantidad.php");


// Some data
$datay=array($uno,$dos,$tres,$cuatro,$cinco,$seis,$siete,$ocho,$nueve,$diez,$once, $doce);

// Create the graph and setup the basic parameters 
$graph = new Graph(400,400,'auto');	
$graph->img->SetMargin(40,40,40,40);
$graph->SetScale("textint");
$graph->SetFrame(true,'blue',1); 
$graph->SetColor('lightblue');
$graph->SetMarginColor('lightblue');

// Setup X-axis labels
$a = $gDateLocale->GetShortMonth();
$graph->xaxis->SetTickLabels($a);
$graph->xaxis->SetFont(FF_FONT1);
$graph->xaxis->SetColor('darkblue','black');

// Setup "hidden" y-axis by given it the same color
// as the background (this could also be done by setting the weight
// to zero)
$graph->yaxis->SetColor('lightblue','darkblue');
$graph->ygrid->SetColor('white');

// Setup graph title ands fonts
$graph->title->Set($departamento);
$graph->title->SetFont(FF_FONT2,FS_BOLD);
$graph->xaxis->SetTitle('AÑO'.$anio,'center');
$graph->xaxis->SetTitleMargin(10);
$graph->xaxis->title->SetFont(FF_FONT2,FS_BOLD);

// Add some grace to the top so that the scale doesn't
// end exactly at the max value. 
$graph->yaxis->scale->SetGrace(0);

                              
// Create a bar pot
$bplot = new BarPlot($datay);
$bplot->SetFillColor('darkblue');
$bplot->SetColor('darkblue');
$bplot->SetWidth(0.5);
$bplot->SetShadow('darkgray');

// Setup the values that are displayed on top of each bar
// Must use TTF fonts if we want text at an arbitrary angle
$bplot->value->Show();
$bplot->value->SetFont(FF_ARIAL,FS_NORMAL,8);
$bplot->value->SetFormat('$%d');
$bplot->value->SetColor('darkred');
$bplot->value->SetAngle(45);
$graph->Add($bplot);

// Finally stroke the graph



$result7->MoveNext();
	}
	
	
$graph->Stroke();
	

?>
