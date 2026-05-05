<?php

function estados_receta($a){
	switch ($a){
		case "0": {$a = "SIN PREPARAR";break;}
		case "1": {$a = "ARCHIVADO";break;}
		case "2": {$a = "PEDIDO";break;}
		case "3": {$a = "PENDIENTE";break;}
		case "4": {$a = "RECHAZADO";break;}
		case "5": {$a = "PREPARADO";break;}
		case "6": {$a = "FACTURADO";break;}
		case "7": {$a = "ENTREGADO";break;}
	}

	RETURN $a;
}



function fecha_argentina($a){
$dia = substr($a,8,2);
$mes = substr($a,5,2);
$anio = substr($a,0,4);

$a = $dia."/".$mes."/".$anio;

RETURN $a;
}
