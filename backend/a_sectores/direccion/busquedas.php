<?php 

$buscador_rapido=2;

$busqued=$_POST["busqueda"];

	for ($i=0;$i<count($busqued);$i++)    
	{     
	$busqueda = $busqued[$i];    
	}

$orde=$_POST["orden"];

	for ($i=0;$i<count($orde);$i++)    
	{     
	$orden = $orde[$i];    
	}

if ($orden == ""){
$orden = "apellido";
}
$busca=$_POST["busca"];

$palabra = $busca;


	switch ($busqueda)
	{


		


case "diagnosticos":{	include ("a_pacientes/buscar_diagnostico.php");	break;	}
case "fuentes":	{	include ("a_pacientes/buscar_fuentes.php");	break;	}
case "obra_social":	{$modifica = "SI";	include ("a_obras sociales/buscar_os.php");	break;	}
case "prestaciones":{$modifica = "SI";	include ("../direccion/buscar_prestaciones.php");	break;	}
case "protocolos":{$modifica = "SI";	include ("a_pacientes/buscar_protocolo.php");break;}

case "monodrogas":{$modifica = "SI";	include ("../gtin/mercaderia/buscar_monodrogas1.PHP");break;}
case "drogas":{$modifica = "SI";	include ("../gtin/mercaderia/buscar_drogas.php");break;}
case "laboratorios":{$modifica = "SI";	include ("../gtin/mercaderia/buscar_laboratorios.php");break;}
case "proveedores":{$modifica = "SI";	include ("../proveeduria/proveedores/buscar_proveedores.php");break;}


		}

				



