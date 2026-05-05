<?php 

$dia = "01";
$mes = $_REQUEST['mes'];
$anio = $_REQUEST['anio'];
$seleccione = $_REQUEST['seleccione'];

SWITCH ($mes){
	case "01":{$mes22 = "ENERO";break;}
	case "02":{$mes22 = "FEBRERO";break;}
	case "03":{$mes22 = "MARZO";break;}
	case "04":{$mes22 = "ABRIL";break;}
	case "05":{$mes22 = "MAYO";break;}
	case "06":{$mes22 = "JUNIO";break;}
	case "07":{$mes22 = "JULIO";break;}
	case "08":{$mes22 = "AGOSTO";break;}
	case "09":{$mes22 = "SETIEMBRE";break;}
	case "10":{$mes22 = "OCTUBRE";break;}
	case "11":{$mes22 = "NOVIEMBRE";break;}
	case "12":{$mes22 = "DICIEMBRE";break;}
}









$fecha_a = $mes22." 20".$anio;

$fecha_desde = $anio."-".$mes."-01";
$fecha_hasta = $anio."-".$mes."-31";


$fecha_desde_a = $anio."-01-01";
$fecha_hasta_a = $anio."-12-31";


 $seleccione;

switch ($seleccione){
	case "1":{ include ("diario_vta.php");$total_total = 0;?><br><?php include ("devoluciones.php"); break; 	}
	case "2":{ include ("diario_vta.php");$total_total = 0; break; 	}
	case "3":{ include ("devoluciones.php"); break; 	}
	case "4":{ include ("monoclonales.php"); break; 	}
case "5":{ include ("monoclonales_profe.php"); break; 	}
case "6":{ include ("diario_vta_sin_mono.php"); break; 	}

case "7":{ include ("diario_vta_mono.php"); break; 	}
case "8":{ include ("drogas_aut_profe_aut.php"); break; 	}
case "9":{ include ("drogas_aut_profe_aut1.php"); break; 	}
case "10":{ include ("drogas_aut_profe_aut2.php"); break; 	}
case "11":{ include ("diario_vta_sin_mono_anual.php"); break; 	}
}
