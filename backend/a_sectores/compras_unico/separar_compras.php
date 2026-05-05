<?php 

$busca = $_REQUEST['busca'];
$buscador_rapido = $_REQUEST['buscador_rapido'];

$opcione=$_POST["opciones"];
	for ($i=0;$i<count($opcione);$i++)    
	{     
$opciones = $opcione[$i];    
	}


$pla=$_POST["plan"];
	for ($i=0;$i<count($pla);$i++)    
	{     
$plan = $pla[$i];    
	}

if ($plan == ""){
	$plan = 1;
}



include ("compras/buscar_factura_compra.php");

?>