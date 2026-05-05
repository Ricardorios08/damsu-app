<?php 

require('../../../drivers/fpdf/fpdf.php');
include ("../../../conexiones/config_pro.php");

$sql = "DELETE FROM tr_stock_contadora_unido";
mysql_query($sql);


switch ($mes){
	
case "01":{$dia = "31";break;}
case "02":{$dia = "28";break;}
case "03":{$dia = "31";break;}
case "04":{$dia = "30";break;}
case "05":{$dia = "31";break;}
case "06":{$dia = "30";break;}
case "07":{$dia = "31";break;}
case "08":{$dia = "31";break;}
case "09":{$dia = "30";break;}
case "10":{$dia = "31";break;}
case "11":{$dia = "30";break;}
case "12":{$dia = "31";break;}
}


switch ($mes){
	case "01":{$periodo = "ENERO 20".$anio;break;}
	case "02":{$periodo = "FEBRERO 20".$anio;break;}
	case "03":{$periodo = "MARZO 20".$anio;break;}
	case "04":{$periodo = "ABRIL 20".$anio;break;}
	case "05":{$periodo = "MAYO 20".$anio;break;}
	case "06":{$periodo = "JUNIO 20".$anio;break;}
	case "07":{$periodo = "JULIO 20".$anio;break;}
	case "08":{$periodo = "AGOSTO 20".$anio;break;}
	case "09":{$periodo = "SETIEMBRE 20".$anio;break;}
	case "10":{$periodo = "OCTUBRE 20".$anio;break;}
	case "11":{$periodo = "NOVIEMBRE 20".$anio;break;}
	case "12":{$periodo = "DICIEMBRE 20".$anio;break;}

}

 

if (($mes == 10) and ($anio == 12)){
$monodrogas = "monodrogas_30102012";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 11) and ($anio == 12)){
$monodrogas = "monodrogas_30112012";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 12) and ($anio == 12)){
$monodrogas = "monodrogas_31122012";
 $tr_stock_provisorio = "tr_stock_temp_provisorio_21012013";
 $tr_stock_provisorio1 = "tr_stock_temp_provisorio1_21012013";

// Año 2013
}elseif (($mes == 01) and ($anio == 13)){
$monodrogas = "monodrogas_31012013";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 02) and ($anio == 13)){
$monodrogas = "monodrogas_31022013";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 03) and ($anio == 13)){
$monodrogas = "monodrogas_27032013";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 04) and ($anio == 13)){
$monodrogas = "monodrogas_31042013";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 05) and ($anio == 13)){
$monodrogas = "monodrogas_30052013";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 06) and ($anio == 13)){
$monodrogas = "monodrogas_30062013";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 07) and ($anio == 13)){
$monodrogas = "monodrogas_30072013";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 08) and ($anio == 13) or ($mes == 8) and ($anio == 13)){
$monodrogas = "monodrogas_30082013";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 09) and ($anio == 13) or ($mes == 9) and ($anio == 13)){
$monodrogas = "monodrogas_30092013";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 10) and ($anio == 13)){
$monodrogas = "monodrogas_30102013";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 11) and ($anio == 13)){
$monodrogas = "monodrogas_30112013";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 12) and ($anio == 13)){
$monodrogas = "monodrogas_30122013";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 01) and ($anio == 14)){
$monodrogas = "monodrogas_30012014";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";

}elseif (($mes == 02) and ($anio == 14)){
$monodrogas = "monodrogas_30022014";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";

}elseif (($mes == 03) and ($anio == 14)){
$monodrogas = "monodrogas_30032014";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";

}elseif (($mes == 04) and ($anio == 14)){
$monodrogas = "monodrogas_30042014";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 05) and ($anio == 14)){
$monodrogas = "monodrogas_30052014";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 06) and ($anio == 14) or ($mes == 6) and ($anio == 14)){
$monodrogas = "monodrogas_30062014";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 07) and ($anio == 14)){
$monodrogas = "monodrogas_30072014";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 08) and ($anio == 14)  or ($mes == 8) and ($anio == 14)){
$monodrogas = "monodrogas_30082014";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 09) and ($anio == 14) or ($mes == 9) and ($anio == 14)){
$monodrogas = "monodrogas_30092014";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 10) and ($anio == 14)){
$monodrogas = "monodrogas_30102014";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 11) and ($anio == 14)){
$monodrogas = "monodrogas_30112014";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 12) and ($anio == 14)){
$monodrogas = "monodrogas_30122014";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 01) and ($anio == 15)){
$monodrogas = "monodrogas_30012015";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";

}elseif (($mes == 02) and ($anio == 15)){
$monodrogas = "monodrogas_30022015";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";

}elseif (($mes == 03) and ($anio == 15)){
$monodrogas = "monodrogas_30032015";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";

}elseif (($mes == 04) and ($anio == 15)){
$monodrogas = "monodrogas_30042015";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";

}elseif (($mes == 05) and ($anio == 15)){
$monodrogas = "monodrogas_30052015";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";

}elseif (($mes == 06) and ($anio == 15)){
$monodrogas = "monodrogas_30062015";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";

}elseif (($mes == 07) and ($anio == 15)){
$monodrogas = "monodrogas_30072015";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";

}elseif (($mes == 08) and ($anio == 15) or ($mes == 8) and ($anio == 15)){


$monodrogas = "monodrogas_30082015";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";

}elseif (($mes == 09) and ($anio == 15) or ($mes == 9) and ($anio == 15)){
$monodrogas = "monodrogas_30092015";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";


}elseif (($mes == 10) and ($anio == 15)){
$monodrogas = "monodrogas_30102015";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";


}elseif (($mes == 11) and ($anio == 15)){
$monodrogas = "monodrogas_30112015";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";


}elseif (($mes == 12) and ($anio == 15)){
$monodrogas = "monodrogas_30122015";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";


}elseif (($mes == 01) and ($anio == 16)){
$monodrogas = "monodrogas_30012016";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 02) and ($anio == 16)){
$monodrogas = "monodrogas_30022016";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 03) and ($anio == 16)){
$monodrogas = "monodrogas_30032016";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 04) and ($anio == 16)){
$monodrogas = "monodrogas_30042016";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 05) and ($anio == 16)){
$monodrogas = "monodrogas_30052016";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 06) and ($anio == 16)){
$monodrogas = "monodrogas_30062016";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 07) and ($anio == 16)){
$monodrogas = "monodrogas_30072016";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 08) and ($anio == 16) or ($mes == 8) and ($anio == 16)){
$monodrogas = "monodrogas_30082016";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 09) and ($anio == 16)  or ($mes == 9) and ($anio == 16)){
$monodrogas = "monodrogas_30092016";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 10) and ($anio == 16)){
$monodrogas = "monodrogas_30102016";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 11) and ($anio == 16)){
$monodrogas = "monodrogas_30112016";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 12) and ($anio == 16)){
$monodrogas = "monodrogas_30122016";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 01) and ($anio == 17)){
$monodrogas = "monodrogas_30012017";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 02) and ($anio == 17)){
$monodrogas = "monodrogas_30022017";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 03) and ($anio == 17)){
$monodrogas = "monodrogas_30032017";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";

}elseif (($mes == 04) and ($anio == 17)){
$monodrogas = "monodrogas_30042017";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 05) and ($anio == 17)){
$monodrogas = "monodrogas_30052017";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 06) and ($anio == 17)){
$monodrogas = "monodrogas_30062017";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 07) and ($anio == 17)){
$monodrogas = "monodrogas_30072017";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 08) and ($anio == 17)  or ($mes == 8) and ($anio == 17)){
$monodrogas = "monodrogas_30082017";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 09) and ($anio == 17)  or ($mes == 9) and ($anio == 17)){
$monodrogas = "monodrogas_30092017";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 10) and ($anio == 17)){
$monodrogas = "monodrogas_30102017";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 11) and ($anio == 17)){
$monodrogas = "monodrogas_30112017";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 12) and ($anio == 17)){
$monodrogas = "monodrogas_30122017";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";



}elseif (($mes == 01) and ($anio == 18)){
$monodrogas = "monodrogas_30012018";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 02) and ($anio == 18)){
$monodrogas = "monodrogas_30022018";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 03) and ($anio == 18)){
$monodrogas = "monodrogas_30032018";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";

}elseif (($mes == 04) and ($anio == 18)){
$monodrogas = "monodrogas_30042018";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 05) and ($anio == 18)){
$monodrogas = "monodrogas_30052018";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 06) and ($anio == 18)){
$monodrogas = "monodrogas_30062018";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 07) and ($anio == 18)){
$monodrogas = "monodrogas_30072018";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 08) and ($anio == 18)  or ($mes == 8) and ($anio == 18)){
$monodrogas = "monodrogas_30082018";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 09) and ($anio == 18)  or ($mes == 9) and ($anio == 18)){
$monodrogas = "monodrogas_30092018";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 10) and ($anio == 18)){
$monodrogas = "monodrogas_30102018";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 11) and ($anio == 18)){
$monodrogas = "monodrogas_30112018";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 12) and ($anio == 18)){
$monodrogas = "monodrogas_30122018";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";


}elseif (($mes == 01) and ($anio == 19)){
$monodrogas = "monodrogas_30012019";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 02) and ($anio == 19)){
$monodrogas = "monodrogas_30022019";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 03) and ($anio == 19)){
$monodrogas = "monodrogas_30032019";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";

}elseif (($mes == 04) and ($anio == 19)){
$monodrogas = "monodrogas_30042019";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 05) and ($anio == 19)){
$monodrogas = "monodrogas_30052019";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 06) and ($anio == 19)){
$monodrogas = "monodrogas_30062019";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 07) and ($anio == 19)){
$monodrogas = "monodrogas_30072019";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 08) and ($anio == 19)  or ($mes == 8) and ($anio == 19)){
$monodrogas = "monodrogas_30082019";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 09) and ($anio == 19)  or ($mes == 9) and ($anio == 19)){
$monodrogas = "monodrogas_30092019";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 10) and ($anio == 19)){
$monodrogas = "monodrogas_30102019";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 11) and ($anio == 19)){
$monodrogas = "monodrogas_30112019";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 12) and ($anio == 19)){
$monodrogas = "monodrogas_30122019";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 01) and ($anio == 20)){
$monodrogas = "monodrogas_30122019";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}elseif (($mes == 02) and ($anio == 20)){
$monodrogas = "monodrogas_30122019";
$tr_stock_provisorio = "tr_stock_temp_provisorio";
$tr_stock_provisorio1 = "tr_stock_temp_provisorio1";
}


  $provee;
if ($provee == 1){

  $sql = "INSERT into tr_stock_contadora_unido SELECT * FROM $tr_stock_provisorio where mes = $mes and anio = $anio and anterior + cantidad - salida > 0 order by drogas";
mysql_query($sql);


}elseif ($provee == 2){

  $sql = "INSERT into tr_stock_contadora_unido SELECT * FROM $tr_stock_provisorio1 where mes = $mes and anio = $anio and anterior + cantidad - salida > 0  order by drogas";
mysql_query($sql);

$sql = "UPDATE tr_stock_contadora_unido SET `ace` = '3'";
mysql_query($sql);


   $sql = "INSERT into tr_stock_contadora_unido SELECT * FROM $tr_stock_provisorio where mes = $mes and anio = $anio and anterior + cantidad - salida > 0 order by drogas";
 mysql_query($sql);


	}else{

  $sql = "INSERT into tr_stock_contadora_unido SELECT * FROM $tr_stock_provisorio where mes = $mes and anio = $anio and anterior + cantidad - salida > 0 order by drogas";
mysql_query($sql);

  $sql = "INSERT into tr_stock_contadora_unido SELECT * FROM $tr_stock_provisorio1 where mes = $mes and anio = $anio and anterior + cantidad - salida > 0  order by drogas";
mysql_query($sql);
	}







$hoy=date("d/m/y");

class PDF2 extends FPDF
{

    var $nroPac;


function Header()
{

$hoy = date("d/m/Y");
   $titulo1 = "ASOC. COOP. HOSPITAL CENTRAL";
$titulo = "INVENTARIO DE MEDICAMENTOS PERIODO: 1/2015";

//$this->Image('../../../imagenes/logo_coope1.jpg',10,5,180, 'C');

$titulo = "A INVENTARIO DE MEDICAMENTOS PERIODO ".$this->getPaciente();


 $this->Cell(280,5,$titulo1,0,0,'C'); 
$this->ln();
 $this->SetFont('Arial','',11);
$this->Cell(280,5,$titulo,0,0,'C'); 
 $this->SetFont('Arial','',10);

$this->ln();
$this->Cell(20,5,'TROQUEL',1,0,'C'); 
$this->Cell(70,5,'MONODROGA',1,0,'C'); 

$this->Cell(65,5,'PRESENTACION',1,0,'C'); 

 

$this->Cell(50,5,'LABORATORIO',1,0,'C');  

$this->Cell(30,5,'EXISTENCIA',1,0,'C');  
$this->Cell(20,5,'UNITARIO',1,0,'C'); ; 
$this->Cell(20,5,"VALOR",1,0,'C');  
$this->ln();


 


}

function Footer()
{
    // Go to 1.5 cm from bottom
    $this->SetY(-15);
    // Select Arial italic 8
    $this->SetFont('Arial','I',8);
    // Print centered page number
    $this->Cell(0,10,'Pag: '.$this->PageNo(),0,0,'R');
}



function setPaciente($nropac) {
    $this->nroPac = $nropac;
}

function getPaciente() {
    return $this->nroPac;
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

$hoja = "A4";

$pdf=new PDF2('L','mm',$hoja); 
$pdf->SetDisplayMode(80,'default'); 

//$pdftest=new PDF2();
$pdf->AliasNbPages();
//$pdf->AddPage();
$pdf->SetFont('ARIAL','',8);





$pdf->setPaciente($periodo);




if ($provee == 1){
$titulo = "(ACE)";
}
elseif ($provee == 2){
$titulo = "(OTROS PROVEEDORES)";
}else{
$titulo = "(COMPLETO)";
}
$pdf->AddPage();
$pdf->Cell(275,5,$titulo,1,0,'L');  
$pdf->ln();


if ($provee == 1){
$sql1="select * from tr_stock_contadora_unido where mes = '$mes' and anio = '$anio' and ace = 0 order by drogas";
}elseif ($provee == 2){
 $sql1="select * from tr_stock_contadora_unido where (mes = '$mes' and anio = '$anio' and ace != 0)  OR (mes = '$mes' and anio = '$anio' and ace = 3)  order by drogas";
}else{
$sql1="select * from tr_stock_contadora_unido where mes = '$mes' and anio = '$anio' order by drogas";
}


$result1 = $db->Execute($sql1);
 
  if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {

 
$fecha=strtoupper($result1->fields["fecha"]);
$cod_movimiento=strtoupper($result1->fields["cod_movimiento"]);
$tipo_fact=strtoupper($result1->fields["tipo_fact"]);
$nro_comprobante=strtoupper($result1->fields["nro_comprobante"]);

$precio_unitario=strtoupper($result1->fields["precio_unitario"]);
$lote=strtoupper($result1->fields["lote"]);
$mes_lote=strtoupper($result1->fields["mes_lote"]);
$anio_lote=strtoupper($result1->fields["anio_lote"]);
$cuenta=strtoupper($result1->fields["cuenta"]);
$tipo_cuenta=strtoupper($result1->fields["tipo_cuenta"]);
$observaciones=strtoupper($result1->fields["observaciones"]);
$documento=strtoupper($result1->fields["documento"]);
$cod_droga=strtoupper($result1->fields["cod_droga"]);
$nro_os=strtoupper($result1->fields["nro_os"]);
$gtin=strtoupper($result1->fields["gtin"]);
$transaccion=strtoupper($result1->fields["transaccion"]);
$nro_serie=strtoupper($result1->fields["nro_serie"]);
$drogas=strtoupper($result1->fields["drogas"]);
$grupo=strtoupper($result1->fields["grupo"]);
$laboratorio=strtoupper($result1->fields["laboratorio"]);
$anterior=strtoupper($result1->fields["anterior"]);
$cantidad=strtoupper($result1->fields["cantidad"]);
$salida=strtoupper($result1->fields["salida"]);
$cod_barra=strtoupper($result1->fields["cod_mercaderia"]);

$precio_anterior =strtoupper($result1->fields["precio_anterior"]);
$precio_ingreso=strtoupper($result1->fields["precio_ingreso"]);
$precio_egreso=strtoupper($result1->fields["precio_egreso"]);

$saldo = $precio_anterior + $precio_ingreso - $precio_egreso;

$suma_saldo = $suma_saldo + $saldo;
$suma_ingresos = $suma_ingresos + $precio_ingreso;
$suma_ingresos = $suma_ingresos + $precio_ingreso;
$suma_egresos = $suma_egresos + $precio_egreso;

$todo = $anterior + $cantidad - $salida;




  $sql="select * from laboratorios where cod_laboratorio = $laboratorio";
$result = $db->Execute($sql);
$laboratorio=strtoupper($result->fields["laboratorio"]);

$sql="select * from $monodrogas where cod_barra = $cod_barra";
$result = $db->Execute($sql);
$nombre_comercial=strtoupper($result->fields["nombre_comercial"]);
$presentacion=strtoupper($result->fields["presentacion"]);
$troquel=strtoupper($result->fields["troquel"]);
$cant_caja=strtoupper($result->fields["cant_caja"]);
$precio_actualizado=strtoupper($result->fields["precio_actualizado"]);
$laboratorio=strtoupper($result->fields["laboratorio"]);

  $sql="select * from laboratorios where cod_laboratorio = $laboratorio";
$result = $db->Execute($sql);
$laboratorio=strtoupper($result->fields["laboratorio"]);


 if ($cod_droga == 0){
  $sql="select * from drogas where cod_droga = $cod_barra and tipo = 1";
$result = $db->Execute($sql);
$drogas=strtoupper($result->fields["droga"]);
 }
$pre = $todo * $precio_actualizado;



$suma_saldo1 = $suma_saldo1 + $pre;

//$nombre_comercial = $drogas;




//$precio_uni = round($saldo,2);
$pdf->Cell(20,5,$troquel,1,0,'L'); 	  


$pdf->Cell(70,5,$drogas,1,0,'L'); 
 $pdf->SetX(100);
$pdf->Cell(65,5,$nombre_comercial,1,0,'L'); 

 //$pdf->SetX(155);
//$pdf->Cell(10,5,$cant_caja,1,0,'C'); 

 
 
 $pdf->SetX(165);

IF ($laboratorio == ""){
	$laboratorio = "UNICO";
 $pdf->SetTextColor(5,0,255);
$pdf->Cell(50,5,$laboratorio,1,0,'C'); 
 $pdf->SetTextColor(0);
}
else
	  {
 $pdf->SetTextColor(0);
$pdf->Cell(50,5,$laboratorio,1,0,'C'); 
 $pdf->SetTextColor(0);
	  }
 
$pdf->SetX(215);
//$pdf->Cell(30,5,$anterior,1,0,'C'); 
$pdf->Cell(30,5,$todo,1,0,'C'); 
$pdf->Cell(20,5,$precio_actualizado,1,0,'R'); 
//$pdf->Cell(20,5,number_format($saldo,2),0); 
$pdf->Cell(20,5,number_format($pre,2),1,0,'R'); 

$pdf->ln();




$cant = $todo + $cant;

$contame = $contame + 1;




$result1->MoveNext();
	}




$pdf->ln();


$pdf->SetX(100);
$pdf->Cell(50,5,"TOTAL: ",0); 
$pdf->Cell(50,5,number_format($suma_saldo1,2),0);  

/*$pdf->ln();
$pdf->SetX(100);
$pdf->Cell(50,5,"CANT: ",0); 
$pdf->Cell(50,5,$cant,0);  
*/


$pdf->Output();


// 428-7755
