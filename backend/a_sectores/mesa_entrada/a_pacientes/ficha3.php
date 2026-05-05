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
<table width="800" border="0" cellspacing="0">
  <!--DWLayoutTable-->

  <?php 
  
   $sql1="select * from afiliaciones where documento like '$a'";
$result1 = $db->Execute($sql1);
	
	?>

  <?php 
  
   if (!$result1) die("fallo".$db->ErrorMsg());
  while (!$result1->EOF) {
  
$nro_os=$result1->fields["nro_os"];
$nro_afiliado=$result1->fields["nro_afiliado"];
$otros=strtoupper($result1->fields["otros"]);
$nombre_os=strtoupper($result1->fields["nombre_os"]);


$sql2="select * from obrasocial where nro_os = $nro_os";
$result2 = $db->Execute($sql2);
$sigla=strtoupper($result2->fields["sigla"]);


	?>

  <?php $result1->MoveNext();
	}
	
	
	$sql3="select * from paciente_diagnostico where documento like '$documento'";
$result3 = $db->Execute($sql3);


	
	?>
  <tr bordercolor="#FFFFFF" bgcolor="#C9C9C9">
    <td colspan="13"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><strong>DIAGNOSTICOS</strong></font></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <td width="55" valign="top" bgcolor="#CCCCCC"><div align="center"><font size="2" face="Trebuchet MS">Fecha</font></div></td>
    <td colspan="2" valign="top" bgcolor="#CCCCCC"><div align="center"><font color="#000000" size="2" face="Trebuchet MS">Diagnostico</font></div></td>
    <td colspan="3" valign="top" bgcolor="#CCCCCC"><div align="center"><font size="2" face="Trebuchet MS">Localizacion</font></div></td>
    <td width="62" valign="top" bgcolor="#CCCCCC"><div align="center"><font size="2" face="Trebuchet MS"> Multiples </font></div></td>
    <td colspan="2" valign="top" bgcolor="#CCCCCC"><div align="center"><font size="2" face="Trebuchet MS">Estad&iacute;o</font></div></td>
    <td colspan="2" valign="top" bgcolor="#CCCCCC"><div align="center"><font size="2" face="Trebuchet MS">Fuente</font></div></td>
    <td width="91" valign="top" bgcolor="#CCCCCC"><div align="center"><font size="2" face="Trebuchet MS">Bases</font></div></td>
    <td width="85" valign="top" bgcolor="#CCCCCC"><div align="center"><font size="2" face="Trebuchet MS">Matricula </font></div>      <div align="center"></div></td>
  </tr>
  
  <?php 
  
   if (!$result3) die("fallo".$db->ErrorMsg());
  while (!$result3->EOF) {
  
  
  
$nro_ficha=$result3->fields["nro_ficha"];
$documento=$result3->fields["documento"];
$cod_diagnostico=$result3->fields["cod_diagnostico"];
$fecha_diagnostico=fecha_argentina($result3->fields["fecha_diagnostico"]);
$base=$result3->fields["base"];
$cod_fuente=$result3->fields["cod_fuente"];
$matricula=$result3->fields["matricula"];
$observaciones=$result3->fields["observaciones"];
$primario=$result3->fields["primario"];
$estadio=$result3->fields["estadio"];

$sql4="select * from diagnostico where nro_diagnostico like '$cod_diagnostico'";
$result4 = $db->Execute($sql4);

$nombre_diagnostico=$result4->fields["nombre_diagnostico"];


$sql4="select * from fuentes where nro_fuente like '$cod_fuente'";
$result4 = $db->Execute($sql4);

$nombre_fuente=$result4->fields["nombre_fuente"];

?>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <td valign="top" bgcolor="#E6E6E6"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$fecha_diagnostico");?></font></td>
    <td colspan="2" valign="top" bgcolor="#E6E6E6"><div align="right"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$nombre_diagnostico");?></font></div></td>
    <td colspan="2" valign="top" bgcolor="#E6E6E6"><div align="center">
      <div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$localizacion");?></font></div>
    </div></td>
    <td width="1">&nbsp;</td>
    <td valign="top" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$primarios");?></font></div></td>
    <td colspan="2" valign="top" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$estadio");?></font></div></td>
    <td width="38" valign="top" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$nombre_fuente");?></font></div></td>
    <td width="1">&nbsp;</td>
    <td valign="top" bgcolor="#E6E6E6"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$base");?></font></td>
    <td valign="top" bgcolor="#E6E6E6"><div align="center"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$matricula");?></font></div>      <div align="center"></div></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <td colspan="2" bgcolor="#C9C9C9"><div align="center"><font size="2" face="Trebuchet MS">Observaciones</font></div></td>
    <td colspan="11" bgcolor="#E6E6E6"><font color="#000000" size="2" face="Trebuchet MS"><?php print("$observaciones");?></font></td>
  </tr>
  <tr>
    <td></td>
    <td width="91"></td>
    <td width="235"></td>
    <td width="60"></td>
    <td width="8"></td>
    <td></td>
    <td></td>
    <td width="25"></td>
    <td width="19"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  
  <?php 
  
  $result3->MoveNext();
	}
	
	?>
</table>



	<br>
