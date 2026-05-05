<? //caso de valor en arancel
include ("../../conexiones/config_pr.php");
$sql4="select * from convenio_practica where cod_practica = $nro_practica and nro_os = 5073";
$result4 = $db->Execute($sql4);
$categoria=$result4->fields["categoria"];
$toma=$result4->fields["toma"];
$urgencia=$result4->fields["urgencia"];
$mate_desc=$result4->fields["material_descartable"];
$valor=$result4->fields["valor"];
$autorizada=$result4->fields["autorizada"];
//$honorarios=$result4->fields["honorarios"];
//$gastos=$result4->fields["gastos"];