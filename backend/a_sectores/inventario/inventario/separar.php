<?php

$unidades = $_REQUEST['unidades'];
$por = $_REQUEST['por'];
$mes= $_REQUEST['mes'];
$anio= $_REQUEST['anio'];
$inventario= $_REQUEST['inventario'];

$procedencia= $_REQUEST['procedencia'];
$provee= $_REQUEST['provee'];


if ($provee == 12){

include ("../inventario/inventario_ace-noace.php"); // agregar a ace o sacar de ace
exit;
}



if ($procedencia == 3){

include ("../inventario/inv_listados/inventario_contadora_unido.php"); // inventario definitvo para presentar en la cooperadora
exit;
}





if ($procedencia == 4){
include ("inventario_contadora_unido_excel.php");
exit;
}

if ($procedencia == 5){
include ("existencia_droga_final.php");
exit;
}


if ($procedencia == 10){
include ("inventario_contadora_otros.php");
exit;
}

if ($procedencia == 11){
include ("inventario_contadora_otros.php");
exit;
}





switch ($procedencia){
	case "1":{  //po

				switch ($unidades){
						case "1":{include ("existencia_droga_final.php");break;}
						case "2":{
	
							if (($mes == 10) and ($anio == 12)){
									include ("existencia_inicial.php");
							}else{

	if ($inventario == 1){
	include ("../inventario/inv_listados/existencia_droga_final_valor.php"); // controla el stock ingresado por gtin + el unico
	}else
	{


include ("inventario_contadora.php");
	}
		
	}break;}
}


break;
	}



	case "2":{  //unico

switch ($unidades){
case "1":{include ("existencia_droga_final.php");break;}
case "2":{
	
	if (($mes == 10) and ($anio == 12)){

		include ("existencia_inicial_unico.php");
}else{

	if ($inventario == 1){

	include ("existencia_droga_final_valor_unico.php"); // INVENARIO PARA CONTROLAR UNICO
	}else
	{
include ("inventario_contadora_unico.php");
	}
		
	}break;}
}

BREAK;	}
}
