<?php 
$tipo_busqued=$_POST["tipo_busqueda"];
	for ($i=0;$i<count($tipo_busqued);$i++)    
	{     
	$tipo_busqueda = $tipo_busqued[$i];    
	}


	
	switch ($tipo_busqueda)
	{

	case "BIOQUIMICO":
		{
	include ("bioquimico.php");
	break;
		}

case "BIOQ DPTO":
		{
	include ("bioquimico_dpto.php");
	break;
		}



	case "VITALICIO":
		{
	include ("vitalicio.php");
	break;
		}



	case "FACTURANTE":
		{
	include ("facturante.php");

	break;
		}

	case "LABORATORIO":
		{
		include ("cuenta.php");
	break;
		}


	case "DEPARTAMENTO":
		{
	
	break;
		}

	case "TODOS DEP.":
		{
	include ("cuenta_dpto.php");
	break;
		}

	case "PRESTADORES":
		{
	
	break;
		}

	case "ESPECIALIDAD":
		{
	include ("especialidad.php");
	break;
		}

		case "ORIENTACION":
		{
	include ("orientacion.php");
	break;
		}


}