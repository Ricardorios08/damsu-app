<script language="javascript">
function on_load()
{
document.getElementById("documento").focus();
}


function verif_caracter(obj,evt)
{

	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
	if (charCode == 13) 

	{
		switch(obj.id)
		{
				case "documento":
				document.getElementById("tipo_doc").focus();
				break;
				case "tipo_doc":
				document.getElementById("apellido").focus();
				break;
				case "apellido":
				document.getElementById("nombre").focus();
				break;
				case "nombre":
				document.getElementById("estado").focus();
				break;
				case "estado":
				document.getElementById("dia_estado").focus();
				break;
				case "dia_estado":
				document.getElementById("mes_estado").focus();
				break;
				case "mes_estado":
				document.getElementById("anio_estado").focus();
				break;
				case "anio_estado":
				document.getElementById("observaciones").focus();
				break;
				case "observaciones":
				document.getElementById("calle").focus();
				break;
				case "calle":
				document.getElementById("puerta").focus();
				break;

				case "puerta":
				document.getElementById("referencia").focus();
				break;
				case "referencia":
				document.getElementById("departamento").focus();
				break;
				case "departamento":
				document.getElementById("localidad").focus();
				break;
				case "localidad":
				document.getElementById("cod_postal").focus();
				break;
				case "cod_postal":
				document.getElementById("telefono").focus();
				break;
				
				case "telefono":
				document.getElementById("dia").focus();
				break;
				
				
				case "dia":
				document.getElementById("mes").focus();
				break;
				case "mes":
				document.getElementById("anio").focus();
				break;
				case "anio":
				document.getElementById("sexo").focus();
				break;

				case "sexo":
				document.getElementById("lugar_nac").focus();
				break;
				
				case "lugar_nac":
				document.getElementById("estado_civil").focus();
				break;
				
				case "estado_civil":
				document.getElementById("siguiente").focus();
				break;




				case "calle_residencia":
				document.getElementById("puerta_residencia").focus();
				break;

				case "puerta_residencia":
				document.getElementById("referencia_residencia").focus();
				break;
				case "referencia_residencia":
				document.getElementById("localidad_residencia").focus();
				break;
				
				case "localidad_residencia":
				document.getElementById("cod_postal_residencia").focus();
				break;
				case "cod_postal_residencia":
				document.getElementById("telefono_residencia").focus();
				break;
				case "telefono_residencia":
				document.getElementById("celular_residencia").focus();
				break;
				case "celular_residencia":
				document.getElementById("dia").focus();
				break;
				
		}
		return false;
	}
	return true;
}


</script>

<?php $a = $_GET['id'];
$tipo_doc = $_REQUEST['tipo_doc'];
include ("funcion_cambiar_estados.php");
include ("variables.php");
?>

<BODY onload = "on_load()">
<form action="guardar_paciente.php" method="post">

	<br>
 <?php

$sql="select * from prestaciones_pacientes where documento = $documento";
	$result = $db->Execute($sql);
?>
<table width="800" border="1" cellpadding="0" cellspacing="0">
  
  <tr bordercolor="#0066FF" bgcolor="#0000FF"> 


    <td width="3%" bgcolor="#C9C9C9"><div align="center"><font size="2" face="Trebuchet MS">Fecha</font></div></td>
    <td width="3%" bgcolor="#C9C9C9"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">N&ordm;</font></font></div></td>
    <td width="39%" bgcolor="#C9C9C9"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Nombre y Descripcion </font></font></div></td>
    <td width="9%" bgcolor="#C9C9C9"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Precio</font></font></div></td>
    <td width="7%" bgcolor="#C9C9C9"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Cant. </font></font></div></td>
    <td width="7%" bgcolor="#C9C9C9"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Pres. </font></font></div></td>
    <td width="7%" bgcolor="#C9C9C9"><div align="center"><font color="#000000" face="Trebuchet MS"><font size="2">Fuente</font></font></div></td>
 
  </tr>
  <?php 
  if (!$result) die("fallo".$db->ErrorMsg());
  while (!$result->EOF) {

	
$cod_prestacion=strtoupper($result->fields["cod_prestacion"]);

$sql3 = "SELECT * FROM `prestaciones` where cod_prestacion = '$cod_prestacion'";
$result3 = $db->Execute($sql3);

$descripcion=strtoupper($result3->fields["descripcion"]);
$caracteristica=strtoupper($result3->fields["caracteristica"]);


$precio=strtoupper($result->fields["precio"]);
$cupo_mensual=strtoupper($result->fields["nombre_reducido_fuente"]);
$cant_realizado=strtoupper($result->fields["cant_realizado"]);
$observaciones=strtoupper($result->fields["observaciones"]);


$nombre_prestador=strtoupper($result->fields["nombre_prestador"]);
$nombre_fuente=strtoupper($result->fields["nombre_fuente"]);


$cod_operacion=strtoupper($result->fields["cod_operacion"]);
$fecha_prestacion=strtoupper($result->fields["fecha_prestacion"]);
$documento=strtoupper($result->fields["documento"]);

$dia = substr($fecha_prestacion,8,2);
$mes = substr($fecha_prestacion,5,2);
$anio = substr($fecha_prestacion,0,4);
$fecha_prestacion = $dia."-".$mes."-".$anio;


?>

<tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"> 

   
	<td><div align="center"><font size="2" face="Trebuchet MS"><?php print("$fecha_prestacion");?></font></div></td>
    <td><div align="center"><font size="2" face="Trebuchet MS"><?php print("$cod_prestacion");?></font></div></td>
    <td><font size="2" face="Trebuchet MS"><?php print("$descripcion");?> <?php print("$caracteristica");?></font></td>
	    <td><div align="center">
	      <font size="2" face="Trebuchet MS">$ <?php print("$precio");?></font>
	    </div></td>
		<td><div align="center"><font size="2" face="Trebuchet MS"><?php print("$cant_realizado");?></font></div></td>
        <td><div align="center"><font size="2" face="Trebuchet MS"><?php print("$nombre_prestador");?></font></div></td>
        <td><div align="center"><font size="2" face="Trebuchet MS"><?php print("$nombre_fuente");?></font></div></td>
     
</tr>
  <?php 

$result->MoveNext();
	}

?>
</table>

