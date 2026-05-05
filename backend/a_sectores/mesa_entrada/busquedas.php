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

 $busqueda;
	switch ($busqueda)
	{


		

case "modificar":{	include ("a_pacientes/buscar_paciente.php");	break;	}
case "afiliaciones":{	include ("a_pacientes/buscar_afiliaciones.php");	break;	}

case "diagnosticos":{	include ("a_pacientes/buscar_diagnostico.php");	break;	}
case "fuentes":	{	include ("a_pacientes/buscar_fuentes.php");	break;	}
case "obra_social":	{$modifica = "SI";	include ("a_obras sociales/buscar_os.php");	break;	}
case "prestaciones":{$modifica = "SI";	include ("../direccion/buscar_prestaciones.php");	break;	}
case "protocolos":{$modifica = "SI";	include ("a_pacientes/buscar_protocolo.php");break;}
case "monodrogas_sin_lab":{$modifica = "SI";	include ("../monodrogas/mercaderia/buscar_monodrogas_sin_lab.php");break;}
case "monodrogas_sin_dro":{$modifica = "SI";	include ("../monodrogas/mercaderia/buscar_monodrogas_sin_dro.php");break;}
case "monodrogas_cant":{$modifica = "SI";	include ("../monodrogas/mercaderia/buscar_monodrogas_cant.php");break;}
case "monodrogas_repe":{$modifica = "SI";	include ("../monodrogas/mercaderia/buscar_monodrogas_repe.php");break;}

case "monodrogas":{$modifica = "SI";	include ("../monodrogas/mercaderia/buscar_monodrogas1.PHP");break;}
case "monodrogas_precio":{$modifica = "SI";	include ("../monodrogas/mercaderia/buscar_monodrogas_precio.php");break;}
case "monodrogas_entregas":{$modifica = "SI";	include ("../monodrogas/mercaderia/buscar_monodrogas_entregas.php");break;}

case "drogas":{$modifica = "SI";	include ("../monodrogas/mercaderia/buscar_drogas.php");break;}
case "drogas_profe":{$modifica = "SI";	include ("../monodrogas/mercaderia/buscar_drogas_profe.php");break;}
case "laboratorios":{$modifica = "SI";	include ("../monodrogas/mercaderia/buscar_laboratorios.php");break;}
case "proveedores":{$modifica = "SI";	include ("../monodrogas/proveedores/buscar_proveedores.php");break;}


		}

				



